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

	public function motocycle_exhaust()
	{
		$this->set('title_for_layout', 'WEAPONIZED YOUR MOTORCYLE BY THE ARMYTRIX EXHAUST SYSTEMS');
		$page_meta = [
			'des' => 'Best Sounding Aftermarket Exhaust Upgrades. Titanium & Stainless Steel Turbo-back Cat-Back Valvetronic Exhaust Downpipes Tips Headers Decat Test Straight Exhaust Sound',
			'key' => 'armytrix, exhaust, akrapovic, magnaflow, borla, supersprint,  remus, fiexhaust, ipe, milltek, цена, السعر, precio, preis, prix, обзор, مراجعة, Überprüfung, revisión, глушитель'
		];
		$this->set(compact('page_meta'));
	}


	
	public function get_for()
	{
		$this->autoRender = false;
		if ($this->RequestHandler->isAjax() && !empty($this->data)) {
			if ($this->data['type'] == 'car') {
				$str1 = '<option value="">Select Model</option>';
				$str2 = '<option value="">Select Year</option>';
				if (isset($this->data['make_id']) && !empty($this->data['make_id'])) {
					$mList = $this->ItemDetail->find('list', ['conditions' => ['ItemDetail.status' => 1, 'ItemDetail.brand_id' => $this->data['make_id']], 'fields' => ['ItemDetail.id', 'ItemDetail.model_id']]);
					if (!empty($mList)) {
						$mList = array_unique($mList);
						$getModel = $this->Model->find('list', [
							'conditions' => ['Model.id' => $mList, 'Model.brand_id' => $this->data['make_id'], 'Model.status' => 1], 
						'fields' => ['Model.id', 'Model.name'],
						'order'=>['Model.pos'=>'ASC']
					]);
						if (!empty($getModel)) {
							foreach ($getModel as $k => $v) {
								$ttt = str_replace("'", "\'", $v);
								$str1 .= '<option value="' . $k . '">' . htmlspecialchars($ttt) . '</option>';
							}
						}
						echo "<script>$('#" . $this->data['target_id'] . "').html('$str1');</script>";
					}
				} elseif (isset($this->data['model_id']) && !empty($this->data['model_id'])) {
					$pList = $this->ItemDetail->find('list', ['conditions' => ['ItemDetail.status' => 1, 'ItemDetail.model_id' => $this->data['model_id']], 'fields' => ['ItemDetail.id', 'ItemDetail.motor_id']]);
					if (!empty($pList)) {
						$pList = array_unique($pList);
						$getMotor = $this->Motor->find('list', ['conditions' => ['Motor.id' => $pList, 'Motor.model_id' => $this->data['model_id'], 'Motor.status' => 1]]);
						
						if (!empty($getMotor)) {
							foreach ($getMotor as $k => $v) {
								$ttt = str_replace("'", "\'", $v);
								$str2 .= '<option value="' . $k . '">' . htmlspecialchars($ttt) . '</option>';
							}
						}
						echo "<script>$('#" . $this->data['target_id'] . "').html('$str2');</script>";
					}
				}
			} elseif ($this->data['type'] == 'motorcycle') {
				$str1 = '<option value="">Select Model</option>';
				$str2 = '<option value="">Select Year</option>';
				if (isset($this->data['make_id']) && !empty($this->data['make_id'])) {
					$mList = $this->Motorcycle->find('list', ['conditions' => ['Motorcycle.status' => 1, 'Motorcycle.motorcycle_make_id' => $this->data['make_id']], 'fields' => ['Motorcycle.id', 'Motorcycle.motorcycle_model_id']]);
					if (!empty($mList)) {
						$mList = array_unique($mList);
						$getModel = $this->MotorcycleModel->find('list', ['conditions' => ['MotorcycleModel.id' => $mList, 'MotorcycleModel.motorcycle_make_id' => $this->data['make_id'], 'MotorcycleModel.status' => 1], 'fields' => ['MotorcycleModel.id', 'MotorcycleModel.name']]);
						if (!empty($getModel)) {
							foreach ($getModel as $k => $v) {
								$ttt = str_replace("'", "\'", $v);
								$str1 .= '<option value="' . $k . '">' . htmlspecialchars($ttt) . '</option>';
							}
						}
						echo "<script>$('#" . $this->data['target_id'] . "').html('$str1');</script>";
					}
				} elseif (isset($this->data['model_id']) && !empty($this->data['model_id'])) {
					$pList = $this->Motorcycle->find('list', ['conditions' => ['Motorcycle.status' => 1, 'Motorcycle.motorcycle_model_id' => $this->data['model_id']], 'fields' => ['Motorcycle.id', 'Motorcycle.motorcycle_year_id']]);
					if (!empty($pList)) {
						$pList = array_unique($pList);
						$getYear = $this->MotorcycleYear->find('all', ['conditions' => ['MotorcycleYear.id' => $pList, 'MotorcycleYear.motorcycle_model_id' => $this->data['model_id'], 'MotorcycleYear.status' => 1]]);
						if (!empty($getYear)) {
							foreach ($getYear as $year) {
								$ttt = $year['MotorcycleYear']['year_from'] . " - " . (!empty($year['MotorcycleYear']['year_to']) ? $year['MotorcycleYear']['year_to'] : 'persent');
								$str2 .= '<option value="' . $year['MotorcycleYear']['id'] . '">' . htmlspecialchars($ttt) . '</option>';
							}
						}
						echo "<script>$('#" . $this->data['target_id'] . "').html('$str2');</script>";
					}
				}
			}
		}
	}


}
