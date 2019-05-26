<?php
session_start();

$db = new PDO('sqlite:../DB/MainDB.db');

$db = new PDO("mysql:host=my-mysql;dbname=final-project", 'root', '123456');
$subject = $_POST['subject'];
$jira = $_POST['jira'];
$related = $_POST['related'];
$description = $_POST['description'];
$createdBy= $_SESSION['email'];
$date = date("Y-m-d H:i:s");
$cause = $_POST['cause'];
$causeDate = $_POST['cause-date'];
$assigned = $_POST['assigned'];
$query = "INSERT INTO Events (subject, jira, related, description, createdBy, openDate, status, cause, cause_date, assigned) VALUES ('$subject', '$jira', '$related', '$description', '$createdBy', '$date', 'open', '$cause', '$causeDate', '$assigned')";
$db->exec("SET NAMES 'utf8'");
$db->exec($query);

$id = $db->lastInsertId();

header("Location: ./ticket.php?eventId=" . $id);

?>