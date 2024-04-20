<?php

function FibonacciIterative($n){
    $num1 =0;
    $num2 =1;
    $counter =0;
    while($counter < $n){
        echo $num1,' ';
        $num3 = $num2+$num1;
        $num1 = $num2;
        $num2 = $num3;
        $counter = $counter+1;
    }
}

function FibonacciRecursive($n){

    if ($n == 0)
        return 0;
    else if ($n == 1)
        return 1;
    else
        return (FibonacciRecursive($n-1) +
            FibonacciRecursive($n-2));
}

$n=10;
#$wynik = fibonacci($n);
$start = microtime(true);
for ($counter = 0; $counter < $n; $counter++){
    echo FibonacciRecursive($counter),' ';
}
$time_elapsed_secs_recursive = microtime(true) - $start;
echo "funkcja rekursywna: $time_elapsed_secs_recursive";
echo "\r\n";
$start = microtime(true);
FibonacciIterative($n);
$time_elapsed_secs_iterative = microtime(true) - $start;
echo "funkcja iteratywna: $time_elapsed_secs_iterative";
echo "\r\n";
$difference = $time_elapsed_secs_recursive - $time_elapsed_secs_recursive;
echo "Funkcja iteratywna jest szybsza o $difference";
?>