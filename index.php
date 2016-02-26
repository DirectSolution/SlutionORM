<?php
use SolutionORM\SolutionORM;
if (!interface_exists('JsonSerializable')) {
	interface JsonSerializable {
		function jsonSerialize();
	}
}
require_once dirname(__FILE__) . "/vendor/autoload.php";
ini_set('display_errors', 'On');
error_reporting(E_ALL);

$connection = new \PDO("mysql:dbname=software");

new SolutionORM($connection);


print "HER";