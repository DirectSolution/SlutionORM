
Requirements:
PHP 5.1+
any database supported by PDO (tested with MySQL, SQLite, PostgreSQL, MS SQL, Oracle)

Usage:

This all needs chnaging have changed everything to be namespaced, also using composer Autoloader by default...

<?php
include "NotORM.php";
$connection = new PDO("mysql:dbname=software");
$software = new NotORM($connection);

foreach ($software->application()->order("title") as $application) { // get all applications ordered by title
    echo "$application[title]\n"; // print application title
    echo $application->author["name"] . "\n"; // print name of the application author
    foreach ($application->application_tag() as $application_tag) { // get all tags of $application
        echo $application_tag->tag["name"] . "\n"; // print the tag name
    }
}
?>
