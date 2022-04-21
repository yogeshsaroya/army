<?php
App::uses('Model', 'Model');

class Cart extends Model {

	public $belongsTo = array('Product');
	
}

