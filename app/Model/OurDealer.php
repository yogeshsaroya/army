<?php
App::uses('Model', 'Model');

class OurDealer extends Model {

	public $validate = array(
		'title' => array( 'rule'=> array('maxLength', 100), 'message' => 'Title cannot be left blank.', 'allowEmpty' => false ),
		'address' => array( 'rule'=> array('maxLength', 500), 'message' => 'Address cannot be left blank.', 'allowEmpty' => false ),
    	'country' => array( 'country' => array('rule' => 'notBlank', 'message' => 'Country cannot be left blank.')),
    	'email' => array('email' => array( 'rule' => 'email', 'message' => 'Please provide a valid email address.')),
		'phone' => array( 'phone' => array('rule' => 'notBlank', 'message' => 'phone cannot be left blank.')),
		'website' => array('allowEmpty' => true, 'rule' => array('url',true), 'message' => 'Website url not correct format.', ),
    );

}

