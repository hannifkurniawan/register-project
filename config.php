<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "password";
$db_name = "register_project";

try {    
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
} catch(PDOException $e) {
    die("Error: " . $e->getMessage());
}
