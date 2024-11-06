<?php

// download composer
require __DIR__ ."/vendor/autoload.php";
// get the databse connect information from the .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
// connect with database
try {
    $conn = new PDO("mysql:host=".$_ENV['DB_HOST'].";dbname=".$_ENV['DB_NAME'],$_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
    // set how the $conn dealing with the errors
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $exeption ) {
    die("failed database connection : ". $exeption->getMessage());
}


?>