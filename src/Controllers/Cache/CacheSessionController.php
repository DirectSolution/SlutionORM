<?php

namespace SolutionORM\Controllers\Cache;

use SolutionORM\Interfaces\CacheInterface;

class CacheSessionController implements CacheInterface {

    function load($key) {
        if (!isset($_SESSION["solutionorm"][$key])) {
            return null;
        }
        return $_SESSION["solutionorm"][$key];
    }

    function save($key, $data) {
        $_SESSION["solutionorm"][$key] = $data;
    }

}
