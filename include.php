<?php

session_start();
$hostname = "localhost";
$dbusername = "root";
$dbprogram = "";


$dbname = "library";
$pdo = new PDO("mysql:host=$hostname;dbname=$dbname", $dbusername, $dbprogram);
if (!$pdo) {
    echo "No connection to Database!!";
    die;
}
?>