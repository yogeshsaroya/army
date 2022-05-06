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
		$aR['created'] = DATE;
		$aR['RstrictedCountry'] = $restricted = 2;
		$this->Session->write('arm_co', $aR);
		$this->Session->delete('arm_co');
		$RstrictedCountry = $this->DATA->getrRstrictedCountry();
		$server_name = $_SERVER['SERVER_NAME'];
		$co =  $this->Session->read('arm_co');
		if (empty($co)) {
			if ($server_name == 'localhost') {
				$aR = unserialize(@file_get_contents('http://www.geoplugin.net/php.gp?ip=103.85.205.34'));
			} else {
				$aR = unserialize(@file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $_SERVER['REMOTE_ADDR']));
			}
			if (!empty($aR)) { $aR['created'] = DATE; }
			if (isset($aR['geoplugin_countryCode']) && array_key_exists($aR['geoplugin_countryCode'], $RstrictedCountry)) {
				/* fix exits then No-Price*/
				$aR['RstrictedCountry'] = $restricted = 1;
				$this->Session->write('arm_co', $aR);
				$co = $aR;
			}
		} else {
			if (isset($co['created']) && !empty($co['created'])) {
				$exp_tim = date("Y-m-d H:i:s", strtotime("+1 hour", strtotime($co['created'])));
				if (strtotime(DATE) > strtotime($exp_tim)) {
					$this->Session->delete('arm_co');
				}
			}
		}
		$this->set('restricted', $restricted);
		
		$LabArr = array();
		$LabArr['des'] = 'Following the creed of providing the most sound, more power and true versatility, ARMYTRIX offer high-end performance valvetronic exhaust systems, ecu tuning and power box that are second to none. We foster a culture of innovation. ARMYTRIX not only creates products, ARMYTRIX creates experiences.';
		$LabArr['keys'] = 'cat-back, sports exhaust, muffler, silencer, armytrix systems manifold, us, ferrari, lamborghini, maserati, porsche, benz, bmw, volkswagen, mclaren, mini cooper, audi, nissan gt-r r35, sport cat, cat, manifold, sports manifold, test pipes';

		if($server_name == 'armytrix.com'){
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
		if ($this->RequestHandler->isMobile()) {
			$this->set('IsMobile', 'yes');
		}
		$this->set('LabArr', $LabArr);
		$guest_id = $this->Cookie->read('guest_id');
		if (empty($guest_id)) {
			$tid_time = strtotime(date("Y-m-d H:i:s."));
			$this->Cookie->write('guest_id', $tid_time, false, '60 hour');
		}
		
		$cnd = $getAll = [];
		if (!empty($guest_id)) { $cnd = array('Cart.guest_id' => $guest_id); }

		if (isset($co['RstrictedCountry']) && $co['RstrictedCountry'] == 1 && !empty($cnd)) {
			$dIds = [];
			$rAll = $this->Cart->find('all', array('recursive' => 2, 'conditions' => $cnd));
			if (!empty($rAll)) {
				foreach ($rAll as $rlist) {
					if (isset($rlist['Product']['type']) && in_array($rlist['Product']['type'], array(1, 2, 3, 5))) {
						$dIds[] = $rlist['Cart']['id'];
					}
				}
				if (!empty($dIds)) {
					 $this->Cart->deleteAll( ['Cart.id' => $dIds], false );  
				}
			}
		}
		if (!empty($cnd)) {
			$getAll = $this->Cart->find('all', array('recursive' => 2, 'conditions' => $cnd));
		}
		$this->set(compact('getAll','guest_id'));
		
	}


	function _setErrorLayout()
	{
		if ($this->name == 'CakeError') {
			$this->layout = '404';
		}
	}
	function beforeRender()
	{
		//$this->_setErrorLayout();
	}
}
