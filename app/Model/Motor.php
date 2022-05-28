<?php
App::uses('Model', 'Model');

class Motor extends Model {

	public $belongsTo = ['Model' => ['counterCache' => 'motor_count']];
	
}

