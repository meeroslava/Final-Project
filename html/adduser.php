
<?php
$db = new PDO('sqlite:../DB/MainDB.db');

$Name = $_POST['Name'];
$Email = $_POST['Email'];
$Role = $_POST['Role'];

/*$Name = "testName";
$Email = "test@Mail.com";
$Role = "testRole";*/

$query = "INSERT INTO Users (email, name, role) VALUES ('$Email', '$Name', '$Role')";
$db->exec($query);

?>

