<?php
App::uses('Model', 'Model');

class PromoCode extends Model {

	public $validate = array(
		'code' => array(
            'isUnique' => array( 'rule' => 'isUnique', 'message' => 'Promo code already in use.'),
			'notEmpty' => array('rule' => 'notBlank', 'message' => 'Promo code cannot be left blank.'),
			'pattern' => array('rule' => '/^[A-Za-z0-9]*$/','message' => 'Only letters,number allowed')),
			
		'discount' => array( 
				array('allowEmpty' => false, 'rule' => '/^[0-9]*\\.?[0-9]+$/', 'message' => 'This must be a positive decimal number'),
				'chk' => array( 'rule' => array('chk_num'), 'message' => 'Discount must be between 1 and 300' )),
		
			'min_amount' => array(
					array('allowEmpty' => false, 'rule' => '/^[0-9]*\\.?[0-9]+$/', 'message' => 'This must be a positive decimal number'),
					'chk' => array( 'rule' => array('chk_min'), 'message' => 'Min amount must be between 1 and 10000' )),
			
		'days' => array(array('allowEmpty' => false, 'rule' => '/^[0-9]{1,3}$/i','message' => 'This must be a positive decimal number'),
		'chk' => array( 'rule' => array('chk_days'), 'message' => 'Days must be between 1 and 30' )),
    );
	
	function chk_num() {
		if (!empty($this->data['PromoCode']['discount'])) {
			if($this->data['PromoCode']['discount'] > 0 && $this->data['PromoCode']['discount'] <=300){ return true;}
			else{  return false; }
		}else{  return false;}
	}
	
	function chk_min() {
		if (!empty($this->data['PromoCode']['min_amount'])) {
			if($this->data['PromoCode']['min_amount'] > 0 && $this->data['PromoCode']['min_amount'] <=10000){ return true;}
			else{  return false; }
		}else{  return false;}
	}
	
	function chk_days() {
		if (!empty($this->data['PromoCode']['days'])) {
			if($this->data['PromoCode']['days'] > 0 && $this->data['PromoCode']['days'] <= 30){ return true;}
			else{  return false; }
		}else{  return false;}
	}
}

