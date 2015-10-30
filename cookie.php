<?php

if(isset($_COOKIE['counter'])) {
    $count = $_COOKIE['counter'];
}
else {
    $count = 0;
}
$count = $count + 1;

//for testing locally just set the domain to ''
//setting the expiry to 0 effectively means we have a session cookie i.e. it expires when the browser is closed
    //setcookie('counter', $count, 0,'/', '', false, false); //session cookie

    setcookie('counter', $count, time() + 24*3600,'/', '', false, false); //persistent cookie for 24 hrs
    
    echo "<span>count is ".$count."</span>"


?>