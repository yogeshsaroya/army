<?php
App::uses('Model', 'Model');

class WebSetting extends Model {

	public $validate = array(
	    'email' => array('allowEmpty' =>false, 'rule' => 'email', 'message' => 'email not correct format.' ),
		'mobile' => array('allowEmpty' =>true, 'rule' => array('phone', null, 'us'),'message' => 'Please enter a valid 10 digit phone number eg. 5556668888',),
		'facebook_link' => array('allowEmpty' => true, 'rule' => array('url',true), 'message' => 'Website url not correct format.', ),
        'youtube_link' => array('allowEmpty' => true,'rule' => array('url',true),'message' => 'Website url not correct format.',),
        'instagram_link' => array( 'allowEmpty' => true,'rule' => array('url',true),'message' => 'Website url not correct format.',),
		
	);

}

