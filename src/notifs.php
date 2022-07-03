<?php
    include "database-funs.php";
    include_once "session.php";

    
    $notifs = getNotifs($_SESSION['stud_id']);
    while($notif = mysqli_fetch_assoc($notifs)){
        echo "<div class='notif'>
        <div class='icon-container'>
        <i class='bx bx-message-alt-detail bx-border-circle'></i>   
        </div>
        <div class='notif-main'>
        <div class='heading'>APPLICATION</div>
        <div class='notif-text'>".$notif['notification']."</div>
        <div class='notif-period'>".humanTiming($notif['date'])."</div>
        </div></div>";  
    }

function humanTiming ($time)
{
    $time = strtotime($time);
    $time = time() - $time;
    $time = ($time<1)? 1 : $time;
    $time = $time-3600;
    $tokens = array (
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'minute',
        1 => 'second'
    );

    foreach ($tokens as $unit => $text) {
        if ($time < $unit) continue;
        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
    }

}
?>