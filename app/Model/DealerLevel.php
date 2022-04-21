<?php
App::uses('Model', 'Model');

class DealerLevel extends Model {

	public $validate = array(
		'title' => array(
            'isUnique' => array( 'rule' => 'isUnique', 'message' => 'Promo code already in use.'),
			'notEmpty' => array('rule' => 'notBlank', 'message' => 'Promo code cannot be left blank.'),
			'pattern' => array('rule' => '/^[A-Za-z0-9]*$/','message' => 'Only letters,number and space allowed')),
			
		'offer_1' => array( 
				array('allowEmpty' => false, 'rule' => '/^[0-9]*\\.?[0-9]+$/', 'message' => 'This must be a positive decimal number'),
				'chk' => array( 'rule' => array('chk_num'), 'message' => 'Discount must be between 0 and 30' )),
		
			'offer_2' => array(
					array('allowEmpty' => false, 'rule' => '/^[0-9]*\\.?[0-9]+$/', 'message' => 'This must be a positive decimal number'),
					'chk' => array( 'rule' => array('chk_min'), 'message' => 'Min amount must be between 0 and 30' )),
    );
	
	function chk_num() {
		if (!empty($this->data['DealerLevel']['offer_1'])) {
			if($this->data['DealerLevel']['offer_1'] >= 0 && $this->data['DealerLevel']['offer_1'] <=30){ return true;}
			else{  return false; }
		}else{  return false;}
	}
	
	function chk_min() {
		if (!empty($this->data['DealerLevel']['offer_2'])) {
			if($this->data['DealerLevel']['offer_2'] >= 0 && $this->data['DealerLevel']['offer_2'] <=30){ return true;}
			else{  return false; }
		}else{  return false;}
	}
	
}

