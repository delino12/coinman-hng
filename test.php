<?php


function checkFloat($float1, $float2){
	// Check numbers to 5 digits of precision  
    // $epsilon = 0.00001;  
      
    $float1 = (float)$float1;  
    $float2 = (float)$float2; 

    $result = $float1 - $float2;

    return $result;

}


$a = 0.02869200;
$b = 0.02869100;

$c = $a - $b;
$c = floatval($c);
echo $c.'<br />';

$epsilon = 0.00001;
if(abs($a-$b) < $epsilon) {
    echo "true";
}else{
	echo "false";
}


?>