<?php
App::uses('Sanitize', 'Utility', 'Controller', 'Controller');
App::uses('Controller', 'Controller');

class AppController extends Controller
{
	var $uses = array('Cart', 'Video');
	public $components = array('Auth', 'Cookie', 'Session', 'RequestHandler', 'DATA');
	public $helpers = array('Html', 'Form', 'JqueryEngine', 'Session', 'Text', 'Time');

	function beforeFilter()
	{
		$server_name = null;
		$server_name = $_SERVER['SERVER_NAME'];

		//$this->Session->delete('set_region');
		$get_region =  $this->Session->read('set_region');
		if (isset($get_region['ip']) && $get_region['ip'] !=  $_SERVER['REMOTE_ADDR']) {
			$this->Session->delete('set_region');
			$get_region = null;
		}

		if (!empty($get_region)) {
			if (isset($get_region['created']) && !empty($get_region['created'])) {
				$exp_tim = date("Y-m-d H:i:s", strtotime("+6 hour", strtotime($get_region['created'])));
				if (strtotime(DATE) > strtotime($exp_tim)) {
					$this->Session->delete('set_region');
					$get_region = null;
				}
			}
		}
		if (empty($get_region)) {
			if (!is_bot($_SERVER['HTTP_USER_AGENT'])) {
				if ($server_name == 'localhost') {
					$aR['geoplugin_countryCode'] = 'IN';
				} else {
					$aR = unserialize(@file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $_SERVER['REMOTE_ADDR']));
				}
			}
			$get_region['ip'] = $_SERVER['REMOTE_ADDR'];
			$get_region['created'] = DATE;
			$get_region['country_code'] = null;
			$get_region['geo_data'] = null;
			if (isset($aR['geoplugin_countryCode'])) {
				$get_region['country_code'] = $aR['geoplugin_countryCode'];
				$get_region['geo_data'] = $aR;
			}
			$this->Session->write('set_region', $get_region);
		}

		/* Redirect to www and https */
		if (in_array($server_name, ['armytrix.com', 'www.armytrix.com'])) {
			if ($this->params['controller'] != 'crons') {
				$url = Router::url(null, true);
				$pos = strpos($url, 'www');
				if ($pos === false) {
					$this->redirect('https://www.' . env('SERVER_NAME') . $this->here, ['status' => 301]);
				} else {
					if (!$this->RequestHandler->isSSL()) {
						$this->redirect('https://' . env('SERVER_NAME') . $this->here, ['status' => 301]);
					}
				}
			}
		}

		if ($this->Auth->user('id') != "") {
			if (!defined('ME')) {
				define("ME", $this->Auth->user('id'));
				$userData = $this->DATA->getUserData(ME);
				$this->Session->write('userData', $userData);
			}
		} else {
			if (!defined('ME')) {
				define("ME", null);
			}
		}
		if (isset($this->params['prefix']) && $this->params['prefix'] == 'lab') {
			/* If in admin zone Optional: Switch to admin layout */
			$this->layout = 'lab';
			if ($this->Auth->user('id') != "") {
				if ($this->Auth->User('role') != 1) {
					unset($this->params['prefix']);
					$this->redirect('/');
				}
			}
		}

		$guest_id = $this->Cookie->read('guest_id');
		if (empty($guest_id)) {
			$tid_time = strtotime(date("Y-m-d H:i:s."));
			$this->Cookie->write('guest_id', $tid_time, false, '60 hour');
		}

		/* Get Cart items and update based on region */
		$cnd = $getAll = [];
		if (!empty($guest_id)) {
			$cnd = array('Cart.guest_id' => $guest_id);
		}

		/*check region and remove product from cart if its in No Price region*/
		if (!empty($cnd) && isset($get_region['country_code']) && !empty($get_region['country_code'])) {
			$rm_cars = $rm_biles = [];
			$rAll = $this->Cart->find('all', array('recursive' => 2, 'conditions' => $cnd));
			
			if (!empty($rAll)) {
				$region_arr = $this->DATA->getRegion($get_region['country_code']);
				if (isset($region_arr['CountryList']['region']) && $region_arr['CountryList']['region'] == 2) {
					foreach ($rAll as $rlist) {
						if (isset($rlist['Product']['type']) && in_array($rlist['Product']['type'], [2,3,5] )) {
							$rm_cars[] = $rlist['Cart']['id'];
						}
					}
					if (!empty($rm_cars)) { $this->Cart->deleteAll(['Cart.id' => $rm_cars], false); }	
				}
				if (isset($region_arr['CountryList']['bike_region']) && $region_arr['CountryList']['bike_region'] == 2) {
					foreach ($rAll as $rlist) {
						if (isset($rlist['Product']['type']) && in_array($rlist['Product']['type'], [6] )) {
							$rm_biles[] = $rlist['Cart']['id'];
						}
					}
					if (!empty($rm_biles)) { $this->Cart->deleteAll(['Cart.id' => $rm_biles], false); }	
				}
			}
		}

		if (!empty($cnd)) {
			$getAll = $this->Cart->find('all', array('recursive' => 2, 'conditions' => $cnd));
		}
		/* end */

		$LabArr = [];
		$LabArr['des'] = 'Following the creed of providing the most sound, more power and true versatility, ARMYTRIX offer high-end performance valvetronic exhaust systems, ecu tuning and power box that are second to none. We foster a culture of innovation. ARMYTRIX not only creates products, ARMYTRIX creates experiences.';
		$LabArr['keys'] = 'cat-back, sports exhaust, muffler, silencer, armytrix systems manifold, us, ferrari, lamborghini, maserati, porsche, benz, bmw, volkswagen, mclaren, mini cooper, audi, nissan gt-r r35, sport cat, cat, manifold, sports manifold, test pipes';

		if ($this->RequestHandler->isMobile()) {
			$this->set('IsMobile', 'yes');
		}
		$this->set(compact('getAll', 'guest_id', 'server_name', 'LabArr', 'get_region'));
	}


	function _setErrorLayout()
	{
		if ($this->name == 'CakeError') {
			$this->layout = '404';
		}
	}
	function beforeRender()
	{
		$this->_setErrorLayout();
	}
}
