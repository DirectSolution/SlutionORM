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

$connection = new PDO("mysql:dbname=prod_portal; host=89.151.79.10", 'hsdirect', '9Etr8F*uBr');
$a = new SolutionORM($connection);

foreach($a->mast_users->order("username")->limit(100) AS $user){
    print "<pre>";
    var_dump($user['username']);
    print "</pre>";
}

print "HERE";