<?php
define('MAX_VISITS', 5);

define('MIN_TIME_BETWEEN_VISITS', 60);

if(isset($_COOKIE['visits'])) {
    $visits = $_COOKIE['visits'];
} else {
    $visits = 0;
}

if(isset($_COOKIE['last_visit'])) {
    $lastVisit = $_COOKIE['last_visit'];
} else {
    $lastVisit = 0;
}

$currentVisit = time();

if($currentVisit - $lastVisit > MIN_TIME_BETWEEN_VISITS) {
    $visits++;
    setcookie('last_visit', $currentVisit, time() + (30 * 24 * 60 * 60));
}

setcookie('visits', $visits, time() + (30 * 24 * 60 * 60));

if($visits >= MAX_VISITS) {
    $currentVisits = MAX_VISITS- $visits;
    echo "Strona odwiedzona o $currentVisits razy za dużo.";

} else {
    echo "Strona odwiedzona $visits razy!";
}
?>