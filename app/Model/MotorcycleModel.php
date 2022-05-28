<?php
App::uses('Model', 'Model');

class MotorcycleModel extends Model {
	
	public $belongsTo = ['MotorcycleMake' => ['counterCache' => 'motorcycle_model_count']];

}

