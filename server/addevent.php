<?php
session_start();

$db = new PDO('sqlite:../DB/MainDB.db');

$db = new PDO("mysql:host=127.0.0.1;dbname=final-project", 'root', '123456');
$subject = $_POST['subject'];
$jira = $_POST['jira'];
$related = $_POST['related'];
$description = $_POST['description'];
$createdBy= $_SESSION['email'];
$date = date("Y-m-d H:i:s");
$cause = $_POST['cause'];
$causeDate = $_POST['cause-date'];
$query = "INSERT INTO Events (subject, jira, related, description, createdBy, openDate, status, cause, cause_date) VALUES ('$subject', '$jira', '$related', '$description', '$createdBy', '$date', 'open', '$cause', '$causeDate')";
$db->exec("SET NAMES 'utf8'");
$db->exec($query);

$id = $db->lastInsertId();

header("Location: ./ticket.php?eventId=" . $id);

?>