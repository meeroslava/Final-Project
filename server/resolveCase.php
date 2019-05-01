<?php
session_start();
$db = new PDO("mysql:host=127.0.0.1;dbname=final-project", 'root', '123456');
$data = json_decode(file_get_contents('php://input'), true);

$updateDate = date("Y-m-d H:i:s");
$eventId = $data['eventId'];
$user = $_SESSION['email'];


$query = "UPDATE Events SET resolveDate='$updateDate', resolvedBy= '$user' where eventId=$eventId";
$db->exec($query);

?>