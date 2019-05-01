<?php
session_start();
$db = new PDO("mysql:host=127.0.0.1;dbname=final-project", 'root', '123456');
$data = json_decode(file_get_contents('php://input'), true);

$updateDate = date("F j, Y, g:i a"); 
$eventId = $data['eventId'];
$user = $_SESSION['email'];
$details = $data['description'];
$subject= $data['subject'];

$query = "INSERT INTO Updates (updateDate, eventId, user, details, subject) VALUES ('$updateDate', '$eventId', '$user', '$details', '$subject')";
$db->exec($query);

?>