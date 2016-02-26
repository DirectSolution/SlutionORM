<?php

namespace SolutionORM\Controllers;

abstract class AbstractController {

    protected $connection, $driver, $structure, $cache;
    protected $solutionORM, $table, $primary, $rows, $referenced = array();
    protected $debug = false;
    protected $debugTimer;
    protected $freeze = false;
    protected $rowClass = 'Row';
    protected $jsonAsArray = false;


    protected function access($key, $delete = false) {
        
    }

}
