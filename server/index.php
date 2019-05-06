<?php 
require './util/session.php';
restrictAccess();


function getEvents(){
    $db = new PDO("mysql:host=127.0.0.1;dbname=final-project", 'root', '123456');
    $query = "Select * from events left join (select MAX(updateDate) as updateDate, eventId as updateEventId from Updates group by eventId) updates on  events.eventID = updates.updateEventId ORDER BY updateDate DESC, events.openDate DESC
";
    $pdoStatement = $db->query($query);

if(!$pdoStatement) {
    return [];
}

return $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
}

$events = getEvents();
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
            <link href="../css/main.css?v=2.1.1" rel="stylesheet" />

</head>
<body>

<div class="wrapper ">
    <? include './templates/nav.php' ?>
    <div class="main-panel">
        <div class="col-md-12">
            <div class="card card-plain">
                <div class="card-header card-header-primary">
                    <h4 class="card-title mt-0"> Table on Plain Background</h4>
                    <p class="card-category"> Here is a subtitle for this table</p>
                </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="">
                    <th >
                        ID
                    </th>
                    <th class="table-subject">
                        Subject
                    </th>
                    <th>
                        Assigned
                    </th>
                    <th>
                        Status
                    </th>
                    <th>
                        Created
                    </th>
                    <th>
                        Last Update
                    </th>
                    </thead>
                    <tbody>

                    <?php foreach($events as $key => $event): ?>
                    <tr>
                        <td>
                            <?= $key ?>
                        </td>
                        <td>
                            <a href="<?= "./ticket.php?eventId=".$event['eventID'] ?>"><?= $event['subject'] ?></a>
                        </td>
                        <td>
                        <?= $event['assigned'] ?>
                        </td>
                        <td>
                        <?= $event['status']?>
                        </td>
                        <td>
                        <?= $event['openDate'] ?>
                        </td>
                        <td>
                        <?= $event['updateDate'] ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
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

</body>

</html>




