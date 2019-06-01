<?php 

function getDB() {
    $host = 'my-mysql';
    $dbName= 'final-project';
    $username ='root';
    $password = '123456';
    return new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
}