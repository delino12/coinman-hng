<?php
# invoke Api 
require ("../__config/p_api.php");
require ("../__config/core.php");
require ("../__config/functions.php");

$resetTable = new Delete();
$resetTable->resetTable();
?>