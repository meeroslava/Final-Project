<?php
$db = new PDO('sqlite:../DB/MainDB.db');

$subject = $_POST['subject'];
$jira = $_POST['jira'];
$related = $_POST['related'];
$description = $_POST['description'];
$createdBy= 'test@oht.com';
$date = date("Y-m-d H:i:s");

$query = "INSERT INTO Events (subject, jira, related, description, createdBy, openDate) VALUES ('$subject', '$jira', '$related', '$description', '$createdBy', '$date')";
$db->exec($query);

?>