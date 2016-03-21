<?php

namespace SolutionORM\Controllers\Cache;

use SolutionORM\Interfaces\CacheInterface;

class CacheMemcacheController implements CacheInterface {
	private $memcache;
	
	function __construct(Memcache $memcache) {
		$this->memcache = $memcache;
	}
	
	function load($key) {
		$return = $this->memcache->get("solutionorm.$key");
		if ($return === false) {
			return null;
		}
		return $return;
	}
	
	function save($key, $data) {
		$this->memcache->set("solutionorm.$key", $data);
	}
	
}
