<?php

?>

<!DOCTYPE html>
<html>

<head>

</head>

<body>
<?php
$db = new PDO('sqlite:../DB/MainDB.db');

$Name = $_POST['Name'];
$Email = $_POST['Email'];
$Role = $_POST['User'];

/*$Name = "testName";
$Email = "test@Mail.com";
$Role = "testRole";*/

$query = "INSERT INTO Users VALUES ('$Email', '$Name', '$Role')";

$db->exec($query);

?>

</body>
</html>