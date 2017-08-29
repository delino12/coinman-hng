<?php
# invoke Api 
require ("../__config/p_api.php");

$api_key = "U5ZUDL9X-20HYGDKV-MZ4D7300-Z6UZTFHE"; // Api Keys here
$api_secret = "3f5705466251ff4ea9e5a744b38265295382190792435b63b9102a69e85d5ceaf1cbe06116000125f667520d825190705d067d7ae0feaf641d021cdc4bcd5ea9"; // Api Secret here

# loadclass
$load_trade = new poloniex($api_key, $api_secret);
//$total_btc_balance = $load_trade->get_total_btc_balance();

?>

