<?php 
require './util/session.php';
restrictAccess();

function getUpdates($eventId) {
    $db = new PDO("mysql:host=127.0.0.1;dbname=final-project", 'root', '123456');

    // $db = new PDO("mysql:host=127.0.0.1;dbname=final-project", 'admin', '123456');
    // $subject = $_POST['subject'];
    // $jira = $_POST['jira'];
    // $related = $_POST['related'];
    // $description = $_POST['description'];
    // $createdBy= 'test@oht.com';
    // $date = date("Y-m-d H:i:s");
    
    $query = "select * from Updates where eventId = $eventId";
    $pdoStatement = $db->query($query);

    if(!$pdoStatement) {
        return [];
    }

    return $db->query($query)->fetchAll(PDO::FETCH_ASSOC);
}

function getUser($email){
        $db = new PDO("mysql:host=127.0.0.1;dbname=final-project", 'root', '123456');
    // $subject = $_POST['subject'];
    // $jira = $_POST['jira'];
    // $related = $_POST['related'];
    // $description = $_POST['description'];
    // $createdBy= 'test@oht.com';
    // $date = date("Y-m-d H:i:s");
    
    $query = "select * from Users where email=\"$email\"";
    $pdoStatement = $db->query($query);

    if(!$pdoStatement) {
        return [];
    }

    return $pdoStatement->fetchAll()[0];
}


function getEvent($eventId){
    $db = new PDO("mysql:host=127.0.0.1;dbname=final-project", 'root', '123456');
    // $subject = $_POST['subject'];
    // $jira = $_POST['jira'];
    // $related = $_POST['related'];
    // $description = $_POST['description'];
    // $createdBy= 'test@oht.com';
    // $date = date("Y-m-d H:i:s");
    
    $query = "select * from Events where eventId = $eventId";
    $pdoStatement = $db->query($query);

    if(!$pdoStatement) {
        return [];
    }

    return $pdoStatement->fetchAll()[0];
}

$event = getEvent($_GET['eventId']);
$author = getUser($event['createdBy']);

$updates = getUpdates($_GET['eventId']);


?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        One Hour Translation
    </title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

    <!--     Fonts and icons     -->

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <!-- CSS Files -->
    <link href="../css/ticket.css?v=2.1.1" rel="stylesheet" />
    <style>
     #update-event {
         display: none;
     }
    </style>
    <script>

function openDialog(event) {
    document.getElementById('my-dialog').style.visibility = 'visible';
}

function closeDialog(event) {
    document.getElementById('my-dialog').style.visibility = 'hidden';
}

function stopPropogating(event) {
    event.stopPropagation();
}

function submitForm() {
    const subject = document.querySelector('#my-dialog input[name=subject]').value;
    const description = document.querySelector('#my-dialog textarea[name=description]').value;
    const eventId = location.search.match(/eventId=([0-9]+)/)[1];

    fetch('./createUpdate.php', { method: 'POST', body: JSON.stringify({
        subject,
        description,
        eventId
    })})
    closeDialog();
}

 </script>
</head>
<body>

<div class="wrapper ">
    <? include './templates/nav.php' ?>

    <div class="main-panel">
        <form class="form-inline ml-auto">
            <div class="form-group no-border">
                <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-just-icon btn-round">
                <i class="material-icons">search</i>
            </button>
        </form>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Subject: <?= $event['subject'] ?></h4>
                        <p class="category">Created By: <?= $author['name'] ?></p>
                        <p class="category">Date: <?= $event['openDate'] ?></p>
                        <p class="category">Description: <?= $event['description'] ?></p>
                    </div>
                </div>
            </div>

            <button onClick="openDialog()">Add an Update </button>
            <?php foreach($updates as $key => $update): ?>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Update <?= $key ?></h4>
                        <p class="category"><?= $update['subject']?></p>
                    </div>
                    <div class="card-body"><?= $update['details']?></div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>


    </div>
        </div>

        <footer class="footer">
            <div class="container-fluid">
                <nav class="float-left">
                    <ul>

                        <li>
                            <a href="..//about.html">
                                footer1
                            </a>
                        </li>
                        <li>
                            <a href="..//about.html">
                                footer2
                            </a>
                        </li>
                        <li>
                            <a href="..//about.html">
                                footer3
                            </a>
                        </li>
                        <li>
                            <a href="..//about.html">
                                footer4
                            </a>
                        </li>

                    </ul>
                </nav>

            </div>
        </footer>
    </div>
</div>


<div id="my-dialog" onClick="closeDialog()">
    <main onClick="stopPropogating(event)">
        <input name="subject" placeholder="What is the subject?" autocomplete="off"/>
        <textarea name="description" placeholder="Describe the update"></textarea>
        <button onClick=submitForm()>Submit</button>
    </main>
</div>
</body>

</html>




