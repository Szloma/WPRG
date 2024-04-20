<?php
setlocale(LC_ALL, 'pl_PL');
function replace_weekday($string){
    $string = str_replace('Monday', 'poniedziałek', $string);
    $string = str_replace('Tuesday', 'wtorek', $string);
    $string = str_replace('Wednesday', 'środa', $string);
    $string = str_replace('Thursday', 'czwartek', $string);
    $string = str_replace('Friday', 'piątek', $string);
    $string = str_replace('Saturday', 'sobota', $string);
    $string = str_replace('Sunday', 'niedziela', $string);
    return $string;
}
function get_next_birthday($birthday) {
    $date = new DateTime($birthday);
    $date->modify('+' . date('Y') - $date->format('Y') . ' years');
    if($date < new DateTime()) {
        $date->modify('+1 year');
    }

    return $date->format('Y-m-d');
}

    $data_urodzenia = date($_GET['data_urodzenia']);
    $dzien_urodzenia = replace_weekday(date('l', strtotime($data_urodzenia)));
    $ukonczone_lat = date("Y") -date('Y', strtotime($data_urodzenia)) ;
    $następne_urodziny = get_next_birthday($data_urodzenia);
    echo "Dzień urodzenia: $dzien_urodzenia</br>";
    echo "ukonczone lata: $ukonczone_lat</br>";
    echo "następne urodziny: $następne_urodziny<br>"
?>