<?php
use SolutionORM\SolutionORM,
    PDO;
if (!interface_exists('JsonSerializable')) {
	interface JsonSerializable {
		function jsonSerialize();
	}
}
require_once dirname(__FILE__) . "/vendor/autoload.php";
ini_set('display_errors', 'On');
error_reporting(E_ALL);

$connection = new PDO("mysql:dbname=testingDB", 'root', 'X8rx812rDH');
new SolutionORM($connection);
print "HERE";