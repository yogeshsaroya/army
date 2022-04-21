<?php
App::uses('Sanitize', 'Utility', 'Model');
class Language extends Model {
    
    
   	
    public $validate = array(
        
        'language' => array('language' => array('rule' => 'notBlank', 'message' => 'Language cannot be left blank.')),
        
        'code' => array('code' => array( 'rule' => 'notBlank', 'message' => 'Language code cannot be left blank.'),
            'isUnique' => array('rule' => 'isUnique','message' => 'Language code already in use.')) );

    public function beforesave($pwd = null) {
        
        if (!empty($this->data['Language']['code'])) {
            $this->data['Language']['code'] = strtolower(trim($this->data['Language']['code']));
        }
        if (!empty($this->data['Language']['language'])) {
            $this->data['Language']['language'] = ucwords(strtolower(trim($this->data['Language']['language'])));
        }
        
    }	
    
    function unbindModelAll() {
        foreach (array(
    'hasOne' => array_keys($this->hasOne),
    'hasMany' => array_keys($this->hasMany),
    'belongsTo' => array_keys($this->belongsTo),
    'hasAndBelongsToMany' => array_keys($this->hasAndBelongsToMany)
        ) as $relation => $model) {
            $this->unbindModel(array($relation => $model));
        }
    }

}