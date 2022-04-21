<?php
App::uses('Sanitize', 'Utility', 'Model');
class Address extends Model {
	
    
    public $validate = array(
        'address' => array( 'rule'=> array('maxLength', 500), 'message' => 'Address cannot be left blank.', 'allowEmpty' => true ),
    	'city' => array( 'city' => array('rule' => 'notBlank', 'message' => 'City cannot be left blank.')),
    	'zip' => array( 'zip' => array('rule' => 'notBlank', 'message' => 'Post Code cannot be left blank.')),
    	'country' => array( 'zip' => array('rule' => 'notBlank', 'message' => 'Country cannot be left blank.')),
    	'state' => array( 'zip' => array('rule' => 'notBlank', 'message' => 'State cannot be left blank.')),
    );

    function unbindModelAll() {
        foreach (array(
    'hasOne' => array_keys($this->hasOne),
    'hasMany' => array_keys($this->hasMany),
    'belongsTo' => array_keys($this->belongsTo),
    'hasAndBelongsToMany' => array_keys($this->hasAndBelongsToMany) ) as $relation => $model) { $this->unbindModel(array($relation => $model)); }
    }

}

