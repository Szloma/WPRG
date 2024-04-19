<?php
    $liczba1 = $_GET['liczba1'];
    $liczba2 = $_GET['liczba2'];
    $znak = $_GET['znak'];

    if ($znak == "+"){
        echo $liczba1+$liczba2;
    }
    if ($znak == "*" && $liczba1 !=0 && $liczba2 !=0){
        echo $liczba1*$liczba2;
    }
    if ($znak == "/" && $liczba1 !=0 && $liczba2 !=0){
        echo $liczba1/$liczba2;
    }
    if ($znak == "-"){
        echo $liczba1-$liczba2;
    }

?>