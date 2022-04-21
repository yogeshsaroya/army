<?php
App::uses('Model', 'Model');

class Faq extends Model {
	
	public $validate = array(
			'category_id' => array( 'category_id' => array('rule' => 'notBlank','message' => 'Category cannot be left blank.')),
			'title' => array( 'title' => array('rule' => 'notBlank','message' => 'Title cannot be left blank.')),
			'description' => array('rule' => 'notBlank','message' => 'This field cannot be left blank.')
			
	);
    
}

