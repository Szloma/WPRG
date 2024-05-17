<?php
define('MAX_VISITS', 5);

if(isset($_COOKIE['visits'])) {
    $visits = $_COOKIE['visits'] + 1;
} else {
    $visits = 1;
}
setcookie('visits', $visits, time() + (30 * 24 * 60 * 60));

if($visits >= MAX_VISITS) {
    $currentVisits = MAX_VISITS- $visits;
    echo "Strona odwiedzona o $currentVisits razy za dużo.";

} else {
    echo "Strona odwiedzona $visits razy!";
}
?>