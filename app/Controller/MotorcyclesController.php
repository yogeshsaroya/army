<?php
App::uses('AppController', 'Controller');
class MotorcyclesController extends AppController
{
	public $uses = array(
		'User', 'Brand', 'Model', 'Motor', 'Product', 'Library', 'ItemDetail', 'Cart', 'PromoCode', 'WebSetting', 'Address', 'Order',
		'OrderItem', 'OrderHistory', 'Language', 'String', 'Translation', 'CountryList', 'Motorcycle', 'MotorcycleModel', 'MotorcycleYear'
	);
	public $components = array('Auth', 'Cookie', 'Session', 'RequestHandler', 'DATA', 'Paypal');
	public $meta = array(
		'des' => 'Following the creed of providing the most sound, more power and true versatility, ARMYTRIX offer high-end performance valvetronic exhaust systems, ecu tuning and power box that are second to none. We foster a culture of innovation. ARMYTRIX not only creates products, ARMYTRIX creates experiences.',
		'keys' => 'cat-back, sports exhaust, muffler, silencer, armytrix systems manifold, us, ferrari, lamborghini, maserati, porsche, benz, bmw, volkswagen, mclaren, mini cooper, audi, nissan gt-r r35, sport cat, cat, manifold, sports manifold, test pipes'
	);

	function beforeFilter()
	{
		AppController::beforeFilter();
		$this->Auth->allow();
		$this->guest_id = $this->Cookie->read('guest_id');
		$this->is_price =  $this->Session->read('arm_co');
	}

	public function motorcycle_valvetronic_exhaust()
    {
        $this->set('title_for_layout', 'WEAPONIZED YOUR MOTORCYLE BY THE ARMYTRIX EXHAUST SYSTEMS');
        $page_meta = ['des' => 'Best Sounding Aftermarket Exhaust Upgrades. Titanium & Stainless Steel Turbo-back Cat-Back Valvetronic Exhaust Downpipes Tips Headers Decat Test Straight Exhaust Sound',];
        //$this->render('motorcycle_exhaust_v2');
        
    }

	public function motorcycle_exhaust()
	{
		$this->set('title_for_layout', 'WEAPONIZED YOUR MOTORCYLE BY THE ARMYTRIX EXHAUST SYSTEMS');
		$page_meta = [
			'des' => 'Best Sounding Aftermarket Exhaust Upgrades. Titanium & Stainless Steel Turbo-back Cat-Back Valvetronic Exhaust Downpipes Tips Headers Decat Test Straight Exhaust Sound',
			'key' => 'armytrix, exhaust, akrapovic, magnaflow, borla, supersprint,  remus, fiexhaust, ipe, milltek, цена, السعر, precio, preis, prix, обзор, مراجعة, Überprüfung, revisión, глушитель'
		];
		$this->set(compact('page_meta'));
	}

	public function check_product()
	{
		$this->autoRender = false;
		if ($this->RequestHandler->isAjax() && !empty($this->data)) {
			$getPro = $this->Motorcycle->find('first', array('recursive' => -1, 'conditions' => [
				'Motorcycle.language' => 'eng', 'Motorcycle.status' => 1,
				'Motorcycle.motorcycle_make_id' => $this->data['brand'], 'Motorcycle.motorcycle_model_id' => $this->data['model'], 'Motorcycle.motorcycle_year_id' => $this->data['year']
			]));
			if (isset($getPro['Motorcycle']['url']) && !empty($getPro['Motorcycle']['url'])) {
				echo "<script> window.location.href ='" . SITEURL . "motorcycle/" . $getPro['Motorcycle']['url'] . "';</script>";
			}
		}
		exit;
	}

	public function product($id = null, $type = null)
	{
		$slider = $page_meta = $data = $gallery = $products = null;

		$this->Motorcycle->bindModel(['belongsTo' => ['MotorcycleMake', 'MotorcycleModel', 'MotorcycleYear'], 'hasMany' => ['Video' => ['limit' => 15, 'order' => ['Video.pos' => 'ASC']]]], false);
		$data = $this->Motorcycle->find('first', array('recursive' => 2, 'conditions' => array('Motorcycle.url' => $id, 'Motorcycle.status' => 1)));
		$pid = null;
		$langArr = [];
		if ($data['Motorcycle']['language'] == 'eng') {
			$pid = $data['Motorcycle']['id'];
		} else {
			$pid = $data['Motorcycle']['motorcycle_id'];
		}
		if (!empty($data)) {
			if ($data['Motorcycle']['language'] == 'eng') {
				$Adata = $data;
				$item_detail_id = $data['Motorcycle']['id'];
			} else {
				$Adata = $this->Motorcycle->find('first', array('recursive' => 2, 'conditions' => array('Motorcycle.id' => $data['Motorcycle']['motorcycle_id'], 'Motorcycle.status' => 1)));
				$item_detail_id = $data['Motorcycle']['motorcycle_id'];
			}

			if (!empty($pid)) {
				$allLang = $this->Language->find('list', ['fields' => ['code', 'language']]);
				if (!empty($allLang)) {
					$this->Motorcycle->bindModel(['hasMany' => ['ProLang' => [
						'className' => 'Motorcycle', 'foreignKey' => 'motorcycle_id',
						'conditions' => ['ProLang.status' => 1, 'ProLang.url !=' => ''],
						'fields' => ['ProLang.id', 'ProLang.language', 'ProLang.status', 'ProLang.url']
					]]], false);

					$this->Motorcycle->unbindModel(['hasMany' => ['Video']]);
					$l_data = $this->Motorcycle->find('first', [
						'recursive' => 1,
						'conditions' => ['Motorcycle.id' => $pid, 'Motorcycle.status' => 1],
						'fields' => ['Motorcycle.id', 'Motorcycle.language', 'Motorcycle.status', 'Motorcycle.url']
					]);
					if (!empty($l_data['ProLang'])) {
						$langArr[($l_data['Motorcycle']['language'] == 'eng' ? "English" : $l_data['Motorcycle']['language'])] = $l_data['Motorcycle']['url'];
						foreach ($l_data['ProLang'] as $l) {
							$langArr[$allLang[$l['language']]] = $l['url'];
						}
					}
				}
			}

			$product_ids = explode(',', $Adata['Motorcycle']['product_ids']);
			
			$products = $this->Product->find('all', array('conditions' => array('Product.id' => $product_ids, 'Product.status' => 1)));
			

			$this->set('title_for_layout', $data['Motorcycle']['meta_title']);
			$page_meta = array('des' => $data['Motorcycle']['meta_description'], 'key' => null);

			$sArr = explode(',', trim($Adata['Motorcycle']['slider']));
			if (isset($sArr[0]) && !empty($sArr[0])) {
				$slider = $this->Library->find('all', array('conditions' => array('Library.id' => $sArr), 
				'order'=>array('FIELD(Library.id,' . $Adata['Motorcycle']['slider'] . ')') 
				));
			}

			$gArr = explode(',', $Adata['Motorcycle']['gallery']);
			if (isset($gArr[0]) && !empty($gArr[0])) {
				$gallery = $this->Library->find('all', array('conditions' => array('Library.id' => $gArr), 'limit' => 15, 
				'order'=>array('FIELD(Library.id,' . $Adata['Motorcycle']['gallery'] . ')')
			));
			}
			
			
			$string = $this->String->find('list', array('order' => array('String.id' => 'ASC'), 'fields' => array('String.id', 'String.text')));
			$tran = $this->Translation->find('list', array('conditions' => array('Translation.code' => $data['Motorcycle']['language']), 'fields' => array('Translation.string_id', 'Translation.name')));
			$txt = array('String' => $string, 'Translation' => $tran);
			$act_lng = 'english';
			if( isset($allLang[ $data['Motorcycle']['language'] ] ) ){
				$act_lng = strtolower($allLang[$data['Motorcycle']['language']]);
			}
			$this->set(compact('page_meta', 'data', 'Adata', 'txt', 'slider', 'gallery', 'products','langArr','act_lng'));
			//$this->render('product_v2');
		} else {
			$this->layout = '404';
		}
	}

}
