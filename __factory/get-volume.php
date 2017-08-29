<?php
# invoke Api 
require ("../__config/p_api.php");

$api_key = ""; // Api Keys here
$api_secret = ""; // Api Secret here

# loadclass
$load_trade = new poloniex($api_key, $api_secret);

?>