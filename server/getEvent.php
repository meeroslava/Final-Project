<?php 

function getEvent($eventId) {
    $db = new PDO('sqlite:../DB/MainDB.db');
    
    $query = "select * from Events where eventId = $eventId";
    return $db->query($query)->fetch();
}
?>