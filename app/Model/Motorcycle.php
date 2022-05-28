<?php
App::uses('Model', 'Model');

class Motorcycle extends Model {
	
	public $belongsTo = ['MotorcycleYear' => ['counterCache' => 'motorcycle_count']];

	public $validate = array(
			'title' => array( 'rule'=> array('maxLength', 250), 'message' => 'Title cannot be left blank.', 'allowEmpty' => false ),
			'url' => array( 'url' => array( 'rule' => 'notBlank', 'message' => 'URL cannot be left blank.'),
					'isUnique' => array( 'rule' => 'isUnique', 'message' => 'Page URL already in use.')),
	);
	
	function unbindModelAll() {
		foreach (array(
				'hasOne' => array_keys($this->hasOne),
				'hasMany' => array_keys($this->hasMany),
				'belongsTo' => array_keys($this->belongsTo),
				'hasAndBelongsToMany' => array_keys($this->hasAndBelongsToMany) ) as $relation => $model) { $this->unbindModel(array($relation => $model)); }
	}
}

