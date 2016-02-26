<?php

namespace SolutionORM\Controllers\Cache;

use SolutionORM\Interfaces\CacheInterface;

class CacheAPCController implements CacheInterface {
	
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