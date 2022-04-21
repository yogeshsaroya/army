<?php
App::uses('Model', 'Model');

class Library extends Model {

	public function afterFind($results, $primary = false) {
		foreach ($results as $key => $val) {
			if (isset($val['Library']['folder']) && isset($val['Library']['file_name'])) {
				$results[$key]['Library']['full_path'] = $val['Library']['folder']."/".$val['Library']['file_name']; 
			}
			
				
		}
		return $results;
	}
}

