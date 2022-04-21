<?php
App::uses('Model', 'Model');

class EmailTemplate extends Model {
	
	public $validate = array(
			'type' => array( 'type' => array('rule' => 'notBlank','message' => 'Email type cannot be left blank.'),
					'alphaNumeric' => array('rule' => 'alphaNumeric','message' => 'only alphaNumeric.'),
					'isUnique' => array('rule' => 'isUnique','message' => 'Email type already in use.')),
	
			'sender_name' => array('sender_name' => array('rule' => 'notBlank','message' => 'Sender name cannot be left blank.',),
					'pattern'=>array('rule'=> '/^[A-Za-z0-9 ]*$/','message'   => 'only alphaNumeric value allowed') ),
	
			'subject' => array(
					'subject' => array('rule' => 'notBlank','message' => 'Subject cannot be left blank.',),
					),
			'email' => 'email',
			'message' => array('rule' => 'notBlank','message' => 'This field cannot be left blank.',),
			'email' => array('email' => array('rule' => 'email','message' => 'please provide a valid email address.',),
					'notBlank' => array('rule' => 'notBlank','message' => 'This field cannot be left blank.')),
	);
    
}

