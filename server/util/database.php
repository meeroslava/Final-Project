<?php

function getDB() {
    $host = 'localhost';
    $dbName= 'final-project';
    $username ='root';
    $password = 'root';
    return new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
}