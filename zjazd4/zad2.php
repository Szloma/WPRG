<?php
$counter_name = "counter.txt";
if (!file_exists(($counter_name))){
    $f = fopen($counter_name, "w");
    fwrite($f, "0");
    fclose($f);
}

$f = fopen($counter_name, "r");
$counterValue = fread($f, filesize($counter_name));
fclose($f);

$counterValue++;
$f = fopen($counter_name, "w");
fwrite($f, $counterValue);
fclose($f);
echo "jesteś gościem nr: $counterValue";