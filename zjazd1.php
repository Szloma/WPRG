<?php
// Online PHP compiler to run PHP program online
// Print "Try programiz.pro" message
$owoc = array("Jablko", "Banan", "Jagoda", "Pomarancza");

foreach ($owoc as $x) {
  echo "\n";
  for ($i = strlen($x); $i >=0 ; $i--) {
    echo $x[$i];
    }
}

$zakresDolny = 2;
$zakresGorny = 15;

echo "\n";

for($i = 0; $i <= $zakresGorny; $i++){
    $result = 0;
    if($i % 2 == 0 or $i%3==0 or $i%5==0) echo "" ;
    else{
        echo "$i ";
        
    }
    #echo $i;
}

$n = 20;
$num1 = 0; 
$num2 = 1; 
 
echo "\n";
$fib = array();
$counter = 0; 
while ($counter < $n){ 
    #echo ' '.$num1; 
    $fib[$counter] = $num1;
    $num3 = $num2 + $num1; 
    $num1 = $num2; 
    $num2 = $num3; 
    $counter = $counter + 1; 
} 
$lineCounter = 0;
for($i = 0; $i < count($fib); $i++){
    if ($fib[$i] %2 == 0 && $fib[$i] != 0){
        echo "$lineCounter: $fib[$i] \n";
        $lineCounter++;
    }
}
echo "\n";
$string = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";

$symbole = array(",", ".", "/", ";", ":", "-");

$tablica = explode(" ",$string);
for($i = 0; $i < count($tablica); $i++){
    #$replacement = str_replace($symbole, "", $tablica[$i]);
    #$tablica[$i] = $replacement;
    
    

    echo $tablica[$i];

}

?>