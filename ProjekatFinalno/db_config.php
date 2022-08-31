<?php

define("DB_HOST","localhost");
define("DB_USER","aleksa");
define("DB_PASS","DyIt2JCA6gVsveP");
define("DB_NAME","aleksa");

try {
    $connection = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME,
        DB_USER, DB_PASS,
        [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"]);
    $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}

