<?php
const DB_HOST = 'localhost';
const DB_USER = 'nevakcinisani';
const DB_PASS = 'Y7pINIJQYFbsdqF';
const DB_NAME = 'nevakcinisani';

try {
    $dbh = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME,
        DB_USER,
        DB_PASS,
        [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"]
    );
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}
