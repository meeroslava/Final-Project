<?php
session_start();
require './util/database.php';

$db = getDB();
$data = json_decode(file_get_contents('php://input'), true);

$updateDate = date("F j, Y, g:i a"); 
$eventId = $data['eventId'];
$user = $_SESSION['email'];
$details = $data['description'];
$subject= $data['subject'];

$query = "INSERT INTO Updates (updateDate, eventId, user, details, subject) VALUES ('$updateDate', '$eventId', '$user', '$details', '$subject')";
$db->exec($query);

?>