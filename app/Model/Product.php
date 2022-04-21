<?php
App::uses('Model', 'Model');

class Product extends Model {

	public $belongsTo = array('Library','Brand','Model','Motor');
	
	public $validate = array(
	'price' => array(array('allowEmpty' => false, 'rule' => '/^[0-9]+(\.[0-9]{1,2})?$/','message' => 'Price must be between 1 and 100000'),'chk' => array( 'rule' => array('chk_price'), 'message' => 'Price must be between 1 and 100000')),
	'quantity' => array(array('allowEmpty' => false, 'rule' => '/^[0-9]{1,6}$/i','message' => 'Quantity must be between 0 and 100000'),'chk' => array( 'rule' => array('chk_quantity'), 'message' => 'Quantity must be between 0 and 100000')),
    );
	
	
	function chk_price() {
		if (!empty($this->data['Product']['price'])) {
			if($this->data['Product']['price'] > 0 && $this->data['Product']['price'] <= 100000){ return true;}
			else{  return false; }
		}else{  return false;}
	}
	
	function chk_quantity() {
		
			if($this->data['Product']['quantity'] >= 0 && $this->data['Product']['quantity'] <= 100000){ return true;}
			else{  return false; }
		
	}
}

