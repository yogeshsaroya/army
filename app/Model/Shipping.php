<?php
App::uses('Model', 'Model');

class Shipping extends Model {

	public $validate = array(
		
		'for_dealer' => array( array('allowEmpty' => false, 'rule' => '/^[0-9]*\\.?[0-9]+$/', 'message' => 'This must be a positive decimal number'),
				'chk' => array( 'rule' => array('for_dealer'), 'message' => 'Amount must be between 1 and 500' )),
		'for_customer' => array( array('allowEmpty' => false, 'rule' => '/^[0-9]*\\.?[0-9]+$/', 'message' => 'This must be a positive decimal number'),
				'chk' => array( 'rule' => array('for_customer'), 'message' => 'Amount must be between 1 and 500' )),
    );
	
	function for_dealer() {
		if (!empty($this->data['Shipping']['for_dealer'])) {
			if($this->data['Shipping']['for_dealer'] > 0 && $this->data['Shipping']['for_dealer'] <=500){ return true;}
			else{  return false; }
		}else{  return false;}
	}
	function for_customer() {
		if (!empty($this->data['Shipping']['for_customer'])) {
			if($this->data['Shipping']['for_customer'] > 0 && $this->data['Shipping']['for_customer'] <=500){ return true;}
			else{  return false; }
		}else{  return false;}
	}
	
}

