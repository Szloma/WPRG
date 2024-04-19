<?php
function prime($number, &$iterations) {
    $iterations = 0;

    if ($number <= 1) {
        return false;
    }

    for ($i = 2; $i <= sqrt($number); $i++) {
        $iterations++;
        if ($number % $i == 0) {
            return false;
        }
    }

    return true;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $number = $_POST["number"];
    $iterations = 0;

    if (prime($number, $iterations)) {
        echo "$number jest liczbą pierwszą.<br>";
    } else {
        echo "$number nie jest liczbą pierwszą.<br>";
    }

    echo "Liczba iteracji: $iterations";
}
?>