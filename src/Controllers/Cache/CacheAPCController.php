<?php

namespace SolutionORM\Controllers\Cache;

use SolutionORM\Interfaces\Cache;

class CacheAPCController implements Cache {
	
	function load($key) {
		$return = apc_fetch("solutionorm.$key", $success);
		if (!$success) {
			return null;
		}
		return $return;
	}
	
	function save($key, $data) {
		apc_store("solutionorm.$key", $data);
	}
	
}