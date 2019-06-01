<?php
require './util/database.php';
$db = getDB();

$email = $_POST['Email'];
$name = $_POST['Name'];
$role = $_POST['Role'];
//$date = date("Y-m-d H:i:s");

$query = "UPDATE users SET name='$name', role='$role' WHERE email='$email'";
$db->exec($query);

header("Location: http://localhost/Final-Project-master/server/UserTable.php");
?>