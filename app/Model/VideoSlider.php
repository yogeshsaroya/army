<?php
App::uses('Model', 'Model');

class VideoSlider extends Model {

	public $validate = array(
		'heading' => array( 'rule'=> array('maxLength', 100), 'message' => 'Heading cannot be left blank.', 'allowEmpty' => false ),
		'button_title' => array( 'rule'=> array('maxLength', 50), 'message' => 'Button title can not be left blank.', 'allowEmpty' => false ),
    	'url' => array('allowEmpty' => false, 'rule' => array('url',true), 'message' => 'Button action url can not be left blank.' ),
		'video_for_pc' => array('allowEmpty' => false, 'rule' => array('url',true), 'message' => 'Pleae add video link for PC device' ),
		'poster_for_pc' => array('allowEmpty' => false, 'rule' => array('url',true), 'message' => 'Pleae add poster link for PC device.' ),
		'video_for_mob' => array('allowEmpty' => true, 'rule' => array('url',true), 'message' => 'Pleae add video link for mobile device.' ),
		'poster_for_mob' => array('allowEmpty' => true, 'rule' => array('url',true), 'message' => 'Pleae add poster link for mobile device.' ),
    );

}

