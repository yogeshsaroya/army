<?php
App::uses('Sanitize', 'Utility', 'Model');
class User extends Model {
	
	
	public $hasOne = array();
    
    public $validate = array(
        'email' => array(
            'email' => array( 'rule' => 'email', 'message' => 'Please provide a valid email address.'),
            'isUnique' => array( 'rule' => 'isUnique','message' => 'Email address already in use.')),
        'first_name' => array( 'first_name' => array('rule' => 'notBlank', 'message' => 'First name cannot be left blank.',),
            'pattern' => array( 'rule' => '/^[A-Za-z ]*$/', 'message' => 'Only letters allowed')),
        'username' => array( 'username' => array( 'rule' => 'notBlank', 'message' => 'User Name cannot be left blank.', ),
            'pattern' => array( 'rule' => '/^[A-Za-z0-9_]*$/', 'message' => 'Only letters and number allowed' ),
            'isUnique' => array( 'rule' => 'isUnique', 'message' => 'User Name already in use.')),
    		
		'middle_name' => array( 'rule'=> array('maxLength', 20), 'message' => 'Middle name should be less than 20 characters', 'allowEmpty' => true ),
        'last_name' => array( 'last_name' => array('rule' => 'notBlank', 'message' => 'Last name cannot be left blank.',),
            'pattern' => array( 'rule' => '/^[A-Za-z ]*$/', 'message' => 'Only letters allowed')),
        
        'password' => array( 'notBlank' => array( 'rule' => array('notBlank'), 'allowEmpty' => false, 'message' => 'Please enter password', ),
       				'minLength' => array( 'rule' => array('minLength', '6'), 'field' => 'login', 'message' => 'Minimum 6 characters' ) ),
        'to' => array( 'rule' => array('inList', array('1', 1, 'true', true, 'on')), 'message' => 'You must agree to the terms and conditions to continue' ),
        'mobile' => array( 'mobile' => array('allowEmpty' => true , 'rule' => array('phone', '/^(\+\s*)?(?=([.,\s()-]*\d){8})([\d(][\d.,\s()-]*)([[:alpha:]#][^\d]*\d.*)?$/'), 'message' => 'Please enter a valid phone eg. +11234567890',),
            'isUnique' => array( 'rule' => 'isUnique', 'message' => 'Mobile number already in use.') ),
    );

    public function beforesave($pwd = null) {
        if (!empty($this->data['User']['password'])) {
            $this->data['User']['password'] = md5($this->data['User']['password']); }
        if (!empty($this->data['User']['first_name'])) {
            $this->data['User']['first_name'] = ucwords(strtolower(trim($this->data['User']['first_name']))); }
        if (!empty($this->data['User']['last_name'])) {
            $this->data['User']['last_name'] = ucwords(strtolower(trim($this->data['User']['last_name']))); }
        if (!empty($this->data['User']['email'])) {
            $this->data['User']['email'] = strtolower(trim($this->data['User']['email'])); }

    }	

    function unbindModelAll() {
        foreach (array(
    'hasOne' => array_keys($this->hasOne),
    'hasMany' => array_keys($this->hasMany),
    'belongsTo' => array_keys($this->belongsTo),
    'hasAndBelongsToMany' => array_keys($this->hasAndBelongsToMany) ) as $relation => $model) { $this->unbindModel(array($relation => $model)); }
    }

}

