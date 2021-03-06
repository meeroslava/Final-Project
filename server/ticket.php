<?php 
require './util/session.php';
require './util/database.php';

restrictAccess();

if(!isset($_GET['eventId'])) {
    header("Location: ./index.php");
    die();
}

function getUpdates($eventId) {
    $db = getDB();

    // $db = new PDO("mysql:host=my-mysql;dbname=final-project", 'admin', '123456');
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
    $db = getDB();
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
    $db = getDB();
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

        function goToEditPage() {
            window.location.href = "./edit.php?eventId=<?= $_GET['eventId'] ?>";
        }

function openDialog(event) {
    document.getElementById('my-dialog').style.visibility = 'visible';
}

function closeDialog(event) {
    document.getElementById('my-dialog').style.visibility = 'hidden';
}

function stopPropogating(event) {
    event.stopPropagation();
}


function openStatusDialog(event) {
    document.getElementById('status-dialog').style.visibility = 'visible';
}

function closeStatusDialog(event) {
    document.getElementById('status-dialog').style.visibility = 'hidden';
}

function sendAnUpdate({subject, description}) {
    fetch('./createUpdate.php', { method: 'POST', body: JSON.stringify({
        subject,
        description,
        eventId: location.search.match(/eventId=([0-9]+)/)[1]
    })}).then(() => {
        window.location.reload();
})
}
function submitForm() {
    const subject = document.querySelector('#my-dialog input[name=subject]').value;
    const description = document.querySelector('#my-dialog textarea[name=description]').value;
    sendAnUpdate({subject, description});

    closeDialog();
}

function sendStatus() {
    const eventId = location.search.match(/eventId=([0-9]+)/)[1];
    const status = document.querySelector('#status-dialog select').value;

    fetch('./updateStatus.php', { method: 'POST', body: JSON.stringify({
        eventId,
        status
    })}).then(() => {
        sendAnUpdate({subject: '<h3 style="color: rgb(255, 165, 0);margin: 0;">Ticket status has been change</h2>', description: "The ticket status changed to " + status})
});

}
 </script>
</head>
<body>

<div class="wrapper ">
    <?= include './templates/nav.php' ?>

    <div class="main-panel">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><font color="#A940B6" ><strong>Subject:</strong> </font><?= $event['subject'] ?></h4>
                        <p class="category"><font color="#A940B6" ><strong>ID:</strong> </font><?= $event['eventID'] ?></p>
                        <p class="category"><font color="#A940B6" ><strong>Created By:</strong></font> <?= $author['name'] ?></p>
                        <p class="category"><font color="#A940B6" ><strong>Date:</strong> </font><?= $event['openDate'] ?></p>
                        <p class="category"><font color="#A940B6" ><strong>Description:</strong></font> <?= $event['description'] ?></p>
                        <p class="category"><font color="#A940B6" ><strong>Status:</strong> </font><?= strtoupper($event['status']) ?> <p>
                        <p class="category"><font color="#A940B6" ><strong>Assigned To:</strong></font> <?= $event['assigned'] ?></p>
                        <p class="category"><font color="#A940B6" ><strong>Resolve Date:</strong> </font><?= empty($event['resolveDate']) ? 'Unresolved' : $event['resolveDate'] ?> <p>
                        <p class="category"><font color="#A940B6" ><strong>Related to another ticker:</strong> </font><?= strtoupper($event['related']) ?> <p>
                    </div>
                 
                        <div class="actions" style="    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 10px;"> 
                            <button onClick="openStatusDialog()" style="margin-right: 10px;">Change Status</button>
                            <button onClick="goToEditPage()" style="margin-right: 10px;">Edit the Ticket </button>
                            <button onClick="openDialog()">Add an Update </button>
                        </div>

                </div>
            </div>

            <?php foreach($updates as $key => $update): ?>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><?= $update['subject']?></h4>
                        <p class="category">
                            Update #<strong><?= $key ?></strong>, created by <strong><?= $update['user']  ?></strong> on <strong><?= $update['updateDate']  ?></strong>
                        </p>
                    </div>
                    <div class="card-body"><?= $update['details']?></div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>


    </div>
        </div>

    </div>
</div>


<div class="dialog" id="my-dialog" onClick="closeDialog()">
    <main onClick="stopPropogating(event)">
        <p>Add an update for this event:</p>
        <input name="subject" placeholder="What is the subject?" autocomplete="off"/>
        <textarea name="description" placeholder="Describe the update"></textarea>
        <button onClick=submitForm()>Create an Update</button>
    </main>
</div>

<div class="dialog" id="status-dialog" onClick="closeStatusDialog()">
    <main onClick="stopPropogating(event)">
        <p>Select a status: </p>
        <select>
            <option value="open">Open</option>
            <option value="progress">In Progress</option>
            <option value="resolved">Resolved</option>
            <option value="false-alarm">False Alarm</option>
            <option value="canceled">Canceled</option>
        </select>
        <button onClick=sendStatus()>Update Status</button>
    </main>
</div>


</body>

</html>




