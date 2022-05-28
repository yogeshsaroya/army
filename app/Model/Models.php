<?php
App::uses('Model', 'Model');

class Models extends Model
{
	public $belongsTo = ['Brand' => ['counterCache' => 'model_count']];
}
