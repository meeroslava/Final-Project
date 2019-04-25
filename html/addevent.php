<?php
$db = new PDO('sqlite:../DB/MainDB.db');
/*$db = new SQLite3('MainDB.db');*/

$subject = $_POST['subject'];
$jira = $_POST['jira'];
$related = $_POST['related'];
$description = 'test';
$createdBy= 'test@oht.com';
$date = date("Y-m-d H:i:s");

echo $subject;
echo $jira;
echo $related;
echo $description;
echo $createdBy;
echo $date;

/*$query = "INSERT INTO Events (subject, jira, related, description, createdBy, openDate) VALUES (1, 2, 3, 'as', 'test@oht.com' , '2019-04-22 17:28:01')";
$db->exec($query);*/

$query = $db->prepare(
    "INSERT INTO Events (subject, jira, related, description, createdBy, openDate) VALUES (?, ?, ?, ?, ?, ?)");
$query->exec(array($subject, $jira, $related, $description, $createdBy, $date)); 
?>

