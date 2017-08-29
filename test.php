<?php


function checkFloat($float1, $float2){
	// Check numbers to 5 digits of precision  
    // $epsilon = 0.00001;  
      
    $float1 = (float)$float1;  
    $float2 = (float)$float2; 

    $result = $float1 - $float2;

    return $result;

}


$a = 0.02869100;
$b = 0.02869200;

echo checkFloat($a, $b);
echo '<br />';
echo bcadd($a, $b);


?>