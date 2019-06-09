<?php 
require './util/session.php';
require './util/database.php';
restrictAccess();

function getAllUsers(){
    $db = getDB();
    $query = "select * from Users";
    $pdoStatement = $db->query($query);

    if(!$pdoStatement) {
        return [];
    }

    return $pdoStatement->fetchAll();
  
}

function getEvents(){
    $createdBy = $_GET['created-by'] ? '%'.$_GET['created-by'].'%' : '%';
    $created = $_GET['created'];
    $closed = $_GET['closed'];
    $assigned = $_GET['assigned'] ? '%'.$_GET['assigned'].'%' : '%';
    $status = $_GET['status'] ? '%'.$_GET['status'].'%' : '%';
    $search = $_GET['search'] ? '%'.$_GET['search'].'%' : '%';

    $db = getDB();
    $query = "Select * from Events left join (select MAX(updateDate) as updateDate, eventId as updateEventId from Updates group by eventId) Updates on Events.eventID = Updates.updateEventId where Events.status like '$status' and IFNULL(Events.assigned, '') like '$assigned' and Events.createdBy like '$createdBy' and Events.openDate >= '$created' and IFNULL(Events.resolveDate, '2050-01-01') >= '$closed' and (IFNULL(Events.subject, '') like '$search' or IFNULL(Events.description, '') like '$search') ORDER BY Events.openDate ASC";

    $pdoStatement = $db->query($query);

    if(!$pdoStatement) {
        return [];
    }

return $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
}

$users = getAllUsers();
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
            <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.4/lodash.min.js"></script>
<style>
.inputs * {
    margin-right: 15px;
}

.inputs {
    display: flex;
    align-items: center;
}

.filters h4 {
    margin-top: 20px;
}

</style>
</head>
<body>

<div class="wrapper ">
    <?= require './templates/nav.php' ?>
    
    <div class="main-panel">
        <div class="col-md-12">
            <div class="card card-plain">
                <div class="card-header card-header-primary">
                    <h4 class="card-title mt-0"> Search</h4>
                </div>

                <div class="filters">
                    <h4>Filter Results:</h4>
                      <!-- created by-->
                    <div class="inputs">
        
                  <!--Assigned to-->
                  <div class="form-group"> 
                    <label for="created-by">Created By</label>
                    <select name="created-by" name="created-by" class="form-control created-by">
                    <option value="">*</option>
                    <?php foreach($users as $user): ?>
                        <option <?= $user['email'] == $_GET['created-by'] ? 'selected': ''?>  value="<?= $user['email'] ?>"><?= $user['email'] ?></option>
                    <?php endforeach;?>
                  </select>
                  </div>

                  <div class="form-group"> 
                    <label for="assigned">Assigned to</label>
                    <select name="assigned" name="assigned" class="form-control assigned">
                    <option value="">*</option>
                    <?php foreach($users as $user): ?>
                        <option <?= $user['email'] == $_GET['assigned'] ? 'selected': ''?> value="<?= $user['email'] ?>"><?= $user['email'] ?></option>
                    <?php endforeach;?>
                  </select>
                  </div>

                  <!--created-->
                  <div class="form-group"> 
                    <label for="created">Created After</label>
                    <input type="date" value="<?= empty($_GET['created']) ? "1970-01-01": $_GET['created'] ?>" id="created" class="form-control created" class="datepicker ui fluid" placeholder="Created at">
                  </div>

                  <div class="form-group"> 
                    <label for="closed">Closed After</label>
                    <input type="date"  value="<?= empty($_GET['closed']) ? "1970-01-01" : $_GET['closed']?>" id="closed" class="form-control closed" class="datepicker ui fluid" placeholder="Closed at">
                  </div>
                
                  <div class="form-group"> 
                    <label for="status">Status</label>
                    <select name="status" name="status" class="form-control status">
                    <option value="">*</option>
                    <option value="open" <?= $_GET['status'] === 'open' ? 'selected': '' ?>>Open</option>
                    <option value="progress" <?= $_GET['status'] === 'progress' ? 'selected': '' ?>>In Progress</option>
                    <option value="resolved" <?= $_GET['status'] === 'resolved' ? 'selected': '' ?>>Resolved</option>
                    <option value="false-alarm" <?= $_GET['status'] === 'false-alarm' ? 'selected': '' ?>>False Alarm</option>
                    <option value="canceled" <?= $_GET['status'] === 'canceled' ? 'selected': '' ?>>Canceled</option>
                  </select>
                  </div>

                  <div class="form-group"> 
                    <label for="search">Search</label>
                    <input type="text" autocomplete="off"  value="<?= $_GET['search'] ?>" id="search" class="form-control closed search"  placeholder="*">
                  </div>
                  <!--closed-->
                  <!---search-->
                    </div> 
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
                            <?= $event['eventID'] ?>
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
                    <a href="https://www.creative-tim.com">
                        Creative Tim
                    </a>
                </li>
                <li>
                    <a href="https://creative-tim.com/presentation">
                        About Us
                    </a>
                </li>
                <li>
                    <a href="http://blog.creative-tim.com">
                        Blog
                    </a>
                </li>
                <li>
                    <a href="https://www.creative-tim.com/license">
                        Licenses
                    </a>
                </li>
            </ul>
        </nav>
        <div class="copyright float-right">
            &copy;
            <script>
                document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by
            <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
        </div>
    </div>


  </footer>
    </div>
</div>
<script>
function send() {
   const createdBy = $('.created-by').val();
   const createdAfter = $('.created').val();
   const closedAfter = $('.closed').val();
   const assignedTo = $('.assigned').val();
   const status = $('.status').val();
   const search = $('.search').val();

   window.location.search = `?created-by=${createdBy}&created=${createdAfter}&closed=${closedAfter}&assigned=${assignedTo}&status=${status}&search=${search}`
}

$('.filters').on('change keyup', _.debounce(send, 500));

</script>
</body>

</html>




