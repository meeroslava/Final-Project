<?php
$db = new PDO('sqlite:mainDB.sqlite');

$subject = $_POST['subject'];
$jira = $_POST['jira'];
$related = $_POST['related'];
$description = $_POST['description'];


echo $subject;
echo $jira;
echo $related;
echo $description;
?>