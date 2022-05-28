<?php
App::uses('Model', 'Model');

class MotorcycleYear extends Model {
	
	public $belongsTo = ['MotorcycleModel' => ['counterCache' => 'motorcycle_year_count']];

}

