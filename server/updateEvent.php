<?php
session_start();

$db = new PDO('sqlite:../DB/MainDB.db');

$db = new PDO("mysql:host=127.0.0.1;dbname=final-project", 'root', '123456');
$subject = $_POST['subject'];
$eventId = $_POST['eventId'];
$jira = $_POST['jira'];
$related = $_POST['related'];
$description = $_POST['description'];
$createdBy= $_SESSION['email'];
$date = date("Y-m-d H:i:s");
$cause = $_POST['cause'];
$causeDate = $_POST['cause-date'];
$query = "UPDATE Events SET subject = '$subject',jira = '$jira', related = '$related', description = '$description', cause = '$cause', cause_date = '$causeDate' where eventId= '$eventId'";

$db->exec("SET NAMES 'utf8'");
$db->exec($query);

header("Location: ./ticket.php?eventId=" . $eventId);
