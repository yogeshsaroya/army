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


    

    public function product($id = null)
    {
        $this->set('title_for_layout', 'Valvetronic Exhaust System Weaponzied by ARMYTRIX');
        $page_meta = [
            'des' => 'Best Sounding Aftermarket Exhaust Upgrades. Titanium & Stainless Steel Turbo-back Cat-Back Valvetronic Exhaust Downpipes Tips Headers Decat Test Straight Exhaust Sound',
            'key' => 'armytrix, exhaust, akrapovic, magnaflow, borla, supersprint,  remus, fiexhaust, ipe, milltek, цена, السعر, precio, preis, prix, обзор, مراجعة, Überprüfung, revisión, глушитель'
        ];
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

}
