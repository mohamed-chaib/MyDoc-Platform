<?php

// download composer
require "./vendor/autoload.php";
// get the databse connect information from the .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
// connect with database
require_once "./Classes/Database.php";
$db = new Database($_ENV['DB_HOST'],$_ENV['DB_NAME'],$_ENV['DB_USER'],$_ENV['DB_PASSWORD']);
$conn= $db->connect();
?>