<?php
require './util/database.php';
$db = getDB();
//$db = new PDO("mysql:host=127.0.0.1;dbname=demo", 'root', '');

$name = $_POST['Name'];
$email = $_POST['Email'];
$Role = $_POST['Role'];
///$date = date("Y-m-d H:i:s");

$query = "INSERT INTO users VALUES ('$email', '$name', '$Role')";
$db->exec($query);

header("Location: http://localhost/Final-Project-master/html/AddNewUser.html");

?>