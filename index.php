<?php
if (!interface_exists('JsonSerializable')) {
	interface JsonSerializable {
		function jsonSerialize();
	}
}
require_once dirname(__FILE__) . "/vendor/autoload.php";