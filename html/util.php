<?php


 function getCasesByUser($user_id, $db){
    $query ="select e.eventID, subject, assigned, Status, openDate, updateDate from Events as e
    join Updates as u on e.eventID=u.eventId and u.updateDate = (Select max(updateDate) from Updates where u.eventId=e.eventID) where e.status = 'Open' or 'In Progress' and e.assigned = '". $user_id . "'";
    //var_dump($db->query($query));
    $results= $db->query($query);
    return $results->fetchAll(PDO::FETCH_ASSOC);


}
?>