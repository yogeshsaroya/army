<?php
App::uses('Model', 'Model');

class World extends Model {

	public $validate = array(
			
			'name' => array( 'name' => array('rule' => 'notBlank', 'message' => 'Country name cannot be left blank.',),
					'pattern' => array( 'rule' => '/^[A-Za-z ]*$/', 'message' => 'Only letters allowed')),
			
		'cat_back_user' => array( array('allowEmpty' => false, 'rule' => '/^[0-9]*\\.?[0-9]+$/', 'message' => 'This must be a positive decimal number'),'chk' => array( 'rule' => array('for_dealer','cat_back_user'), 'message' => 'Amount must be between 1 and 500' )),
		'cat_back_dealer' => array( array('allowEmpty' => false, 'rule' => '/^[0-9]*\\.?[0-9]+$/', 'message' => 'This must be a positive decimal number'),'chk' => array( 'rule' => array('for_dealer','cat_back_dealer'), 'message' => 'Amount must be between 1 and 500' )),
		'catalytic_user' => array( array('allowEmpty' => false, 'rule' => '/^[0-9]*\\.?[0-9]+$/', 'message' => 'This must be a positive decimal number'),'chk' => array( 'rule' => array('for_dealer','catalytic_user'), 'message' => 'Amount must be between 1 and 500' )),
		'catalytic_dealer' => array( array('allowEmpty' => false, 'rule' => '/^[0-9]*\\.?[0-9]+$/', 'message' => 'This must be a positive decimal number'),'chk' => array( 'rule' => array('for_dealer','catalytic_dealer'), 'message' => 'Amount must be between 1 and 500' )),
		'tuning_box_user' => array( array('allowEmpty' => false, 'rule' => '/^[0-9]*\\.?[0-9]+$/', 'message' => 'This must be a positive decimal number'),'chk' => array( 'rule' => array('for_dealer','tuning_box_user'), 'message' => 'Amount must be between 1 and 500' )),
		'tuning_box_dealer' => array( array('allowEmpty' => false, 'rule' => '/^[0-9]*\\.?[0-9]+$/', 'message' => 'This must be a positive decimal number'),'chk' => array( 'rule' => array('for_dealer','tuning_box_dealer'), 'message' => 'Amount must be between 1 and 500' )),
		'extra_user' => array( array('allowEmpty' => false, 'rule' => '/^[0-9]*\\.?[0-9]+$/', 'message' => 'This must be a positive decimal number'),'chk' => array( 'rule' => array('for_dealer','extra_user'), 'message' => 'Amount must be between 1 and 500' )),
		'extra_dealer' => array( array('allowEmpty' => false, 'rule' => '/^[0-9]*\\.?[0-9]+$/', 'message' => 'This must be a positive decimal number'),'chk' => array( 'rule' => array('for_dealer','extra_dealer'), 'message' => 'Amount must be between 1 and 500' )),
			
			
		
    );

	function for_dealer($field = array(), $name = null){
		$t = false;
		if( isset( $field[$name] )){
			if( $field[$name] > 0 && $field[$name] <=500){ $t =  true;}
		}
		return $t;
	}

	
}

