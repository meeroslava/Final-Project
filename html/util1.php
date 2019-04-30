<?php
$db = new PDO('sqlite:../DB/MainDB.db');

 function getCasesByUser($user_id){
    $query ="select e.eventID, subject, assigned, Status, openDate, updateDate from Events as e
    join Updates as u on e.eventID=u.eventId and u.updateDate = (Select max(updateDate) from Updates where u.eventId=e.eventID)
    where status = 'Open' or 'In Progress' and assigned = $user_id";
    
    $results= $db->query($query);
    return $casesByUser =$results->fetchall(PDO::FETCH_ASSOC);
}
?>