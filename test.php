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

?>