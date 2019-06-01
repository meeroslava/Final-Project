<?php
session_start();

require './util/database.php';

$db = getDB();
$data = json_decode(file_get_contents('php://input'), true);

$updateDate = date("Y-m-d H:i:s");
$eventId = $data['eventId'];
$status = $data['status'];
$user = $_SESSION['email'];

$query = "UPDATE Events SET status = '$status' where eventId=$eventId";
$db->exec($query);

if($status == 'resolved') {
    $query = "UPDATE Events SET resolveDate='$updateDate', resolvedBy= '$user' where eventId=$eventId";
    $db->exec($query);
}