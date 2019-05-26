<?php
    function isUserExists($email){
        $db = new PDO("mysql:host=my-mysql;dbname=final-project", 'root', '123456');
        $query = "select * from Users where email='$email'";
        $pdoStatement = $db->query($query);

        if(!$pdoStatement) {
            return [];
        }

        $users = $pdoStatement->fetchAll();
        return array_key_exists(0, $users) ? $users[0]: null;
    }

    if(isset($_POST['email']) && isUserExists($_POST['email'])) {
        session_start();
        $_SESSION['email'] = $_POST['email'];
        header("Location: ./index.php");
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Login
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

    <!--     Fonts and icons     -->

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <!-- CSS Files -->
    <link href="../css/main.css?v=2.1.1" rel="stylesheet" />

</head>
<body>


<div id="form-container">
   <div id="title">
       <h2>Welcome</h2>
   </div>

    <form action="./login.php" method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter email">
        </div>

        <div id="button-login">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
    </form>
</div>



</body>
</html>


