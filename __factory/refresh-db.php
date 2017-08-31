<?php
# invoke Api 
require ("../__config/p_api.php");
require ("../__config/core.php");
require ("../__config/functions.php");

# save trade pair for XMR
$save_trade = new WatchDog();
$refresh_db = $save_trade->refreshData();
?>