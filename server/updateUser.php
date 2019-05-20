<?php

$db = new PDO('sqlite:../DB/MainDB.db');


$email = $_POST['Email'];
$name = $_POST['Name'];
$role = $_POST['Role'];

$date = date("Y-m-d H:i:s");

$query = "UPDATE Users SET name='$name', role='$role' WHERE email=$email";
$db->exec($query);

?>
