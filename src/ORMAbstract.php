<?php

namespace SolutionORM\Source;


 class ORMAbstract {

	protected $connection, $driver, $structure, $cache;
	protected $solutionORM, $table, $primary, $rows, $referenced = array();
	
	protected $debug = false;
	protected $debugTimer;
	protected $freeze = false;
	protected $rowClass = 'Row';
	protected $jsonAsArray = false;
	
        public function __construct(){
            print "here";
        }


        protected function access($key, $delete = false) {
            
	}
	
}