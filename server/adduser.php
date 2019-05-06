<?php

$db = new PDO('sqlite:../DB/MainDB.db');

$name = $_POST['Name'];
$email = $_POST['Email'];
$UserName = $_POST['UserName'];
$Role = $_POST['User'];

$date = date("Y-m-d H:i:s");
$query = "INSERT INTO Users VALUES ('$email', '$name', '$Role')";
$db->exec($query);

?>
</body>
</html>