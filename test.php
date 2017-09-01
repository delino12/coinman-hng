<?php
$json = '{
	"BTC_BCN":{
		"id":7,
		"last":"0.00000044",
		"lowestAsk":"0.00000044",
		"highestBid":"0.00000043",
		"percentChange":"0.07317073",
		"baseVolume":"580.83307607",
		"quoteVolume":"1386986827.64585733",
		"isFrozen":"0",
		"high24hr":"0.00000047",
		"low24hr":"0.00000037"
	}
}';


$json_array = json_decode($json, TRUE);

foreach ($json_array as $key => $arrays) {
	
	echo $key.' ==> ';
	echo $arrays['id'];
	echo $arrays['last'];
	echo $arrays['lowestAsk'];
	echo $arrays['highestBid'];
	echo $arrays['percentChange'];
	echo $arrays['baseVolume'];
	echo $arrays['quoteVolume'];
	echo $arrays['isFrozen'];
	echo $arrays['high24hr'];
	echo $arrays['low24hr'];
}

echo '<hr />';


$arrayName = array('BTC_BCN' => 898, 'BTC_DOGE' => 998, 'BTC_XMR' => 890);
arsort($arrayName);
foreach ($arrayName as $key => $value) {
	# code...
	echo $key .' '.$value;
	echo '<br />';
}

echo '<hr />';


$test_connection = mysqli_connect('localhost','root','','coinmanhng_db');

	# get highest buying coin
	$get_highest = " SELECT pair, MAX(buy_value) FROM compare LIMIT 1 ";
	$get_highest_query = mysqli_query($test_connection, $get_highest);
	if(!$get_highest_query){
		echo 'Error running get_highest_query '.mysqli_error($test_connection);
	}else{
		while($results = mysqli_fetch_array($get_highest_query)){
			$pair_name = $results['pair'];
			$pair_value = $results['MAX(buy_value)'];

			$data = '
				<tr>
					<td>'.$pair_name.'</td>
					<td>'.$pair_value.'</td>
				</tr>
			';

			echo $data;
		}
	}



?>