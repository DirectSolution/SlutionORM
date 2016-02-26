<?php

namespace SolutionORM\Controllers\Cache;

use SolutionORM\Interfaces\Cache;

class CacheSessionController implements Cache {

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
