<?php 


function getUpdates($eventId) {
    $db = new PDO('sqlite:../DB/MainDB.db');
    // $subject = $_POST['subject'];
    // $jira = $_POST['jira'];
    // $related = $_POST['related'];
    // $description = $_POST['description'];
    // $createdBy= 'test@oht.com';
    // $date = date("Y-m-d H:i:s");
    
    $query = "select * from Updates t1 INNER join Users t2 on t1.user = t2.email where t1.eventId = $eventId";
    return $db->query($query)->fetch();
}

getUpdates(1);

?>