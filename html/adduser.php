<?php

?>

<!DOCTYPE html>
<html>

<head>

</head>

<body>
<?php
$con = mysqli_connect("localhost", "root", "", "test");
if (mysqli_connect_errno()) {
    echo "Connection failed: " . mysqli_connect_error();
}

$name=$_REQUEST['Name'];
$Username=$_REQUEST['UserName'];
$user=$_REQUEST['User'];
$email=$_REQUEST['Email'];

$sql = "INSERT INTO users  (username,firstname, lastname, email) VALUES ( '" .$name. "','" . $Username ."','".  $User. "','".  $email  ."')";

mysqli_close($con);

#    echo '<script> top.window.location = "../index.php";</script>';
?>
</body>
</html>