<?php
# invoke Api 
require ("../__config/p_api.php");
require ("../__config/core.php");
require ("../__config/functions.php");

$api_key = "52P8WQDT-UNTGQINY-A7RUEC8A-PJ7RQCKL"; // Api Keys here
$api_secret = "1d63d60d45b510553c0bc7dd2aa4128e8b36c44d23a47459e03ef077bb5c1d25a098e1139434c7ceb97ed3ab7673164a6f12a67432d5062be08992b5c04e358e"; // Api Secret here

# loadclass
$load_trade = new poloniex($api_key, $api_secret);
$trade_ticker = $load_trade->get_trading_pairs();

# bitcion pairs
$BTC_BCN = "BTC_BCN";
$BTC_BELA = "BTC_BELA";
$BTC_DOGE = "BTC_DOGE";
$BTC_DASH = "BTC_DASH";
$BTC_DGB = "BTC_DGB";
$BTC_XBC = "BTC_XBC";
$BTC_XMR = "BTC_XMR";
$BTC_MAID = "BTC_MAID";
$BTC_OMNI = "BTC_OMNI";
$BTC_XEM = "BTC_XEM";


# bitcoin trade history
$bcn_trade_history = $load_trade->get_trade_history($BTC_BCN);
$bela_trade_history = $load_trade->get_trade_history($BTC_BELA);
$doge_trade_history = $load_trade->get_trade_history($BTC_DOGE);
$dash_trade_history = $load_trade->get_trade_history($BTC_DASH);
$dgb_trade_history = $load_trade->get_trade_history($BTC_DGB);
$xbc_trade_history = $load_trade->get_trade_history($BTC_XBC);
$xmr_trade_history = $load_trade->get_trade_history($BTC_XMR);
$maid_trade_history = $load_trade->get_trade_history($BTC_MAID);
$omni_trade_history = $load_trade->get_trade_history($BTC_OMNI);
$xem_trade_history = $load_trade->get_trade_history($BTC_XEM);

# bcn coin details
$bcn_coin_rate = $bcn_trade_history[4]["rate"];
$bcn_coin_status = $bcn_trade_history[3]["type"];
$bcn_coin_date = $bcn_trade_history[2]["date"];

# bela coin details
$bella_coin_rate = $bela_trade_history[4]["rate"];
$bella_coin_status = $bela_trade_history[3]["type"];
$bella_coin_date = $bela_trade_history[2]["date"];

# doge coin details
$doge_coin_rate = $doge_trade_history[4]["rate"];
$doge_coin_status = $doge_trade_history[3]["type"];
$doge_coin_date = $doge_trade_history[2]["date"];

# dash coin details
$dash_coin_rate = $dash_trade_history[4]["rate"];
$dash_coin_status = $dash_trade_history[3]["type"];
$dash_coin_date = $dash_trade_history[2]["date"];

# bcn coin details
$dgb_coin_rate = $dgb_trade_history[4]["rate"];
$dgb_coin_status = $dgb_trade_history[3]["type"];
$dgb_coin_date = $dgb_trade_history[2]["date"];

# bcn coin details
$xbc_coin_rate = $xbc_trade_history[4]["rate"];
$xbc_coin_status = $xbc_trade_history[3]["type"];
$xbc_coin_date = $xbc_trade_history[2]["date"];


# save trade pair for XMR
$save_trade = new WatchDog();
$save_bcn_trade_history = $save_trade->saveUpdates($BTC_BCN, $bcn_coin_rate, $bcn_coin_status, $bcn_coin_date); // normal details
$save_bela_trade_history = $save_trade->saveUpdates($BTC_BELA, $bela_coin_rate, $bela_coin_status, $bela_coin_date);
$save_doge_trade_history = $save_trade->saveUpdates($BTC_DOGE, $doge_coin_rate, $doge_coin_status, $doge_coin_date);
$save_dash_trade_history = $save_trade->saveUpdates($BTC_DASH, $dash_coin_rate, $dash_coin_status, $dash_coin_date);
$save_dgb_trade_history = $save_trade->saveUpdates($BTC_DGB, $dgb_coin_rate, $dgb_coin_status, $dgb_coin_date);
$save_xbc_trade_history = $save_trade->saveUpdates($BTC_XBC, $xbc_coin_rate, $xbc_coin_status, $xbc_coin_date);

//$save_xmr_trade_history = $save_trade->saveUpdates();
//$save_maid_trade_history = $save_trade->saveUpdates();
//$save_omni_trade_history = $save_trade->saveUpdates();
//$save_xem_trade_history = $save_trade->saveUpdates();


?>


<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="panel-body">
				Market Watch List
				<hr />
				<table class="table">
					<tr>
						<th>Stack Pair</th>
						<th>Rate </th>
						<th>Rate gap</th>
						<th>% Change</th>
						<th>Transaction</th>
						<th>Status</th>
						<th>No. Buy</th>
						<th>No. Sell</th>
					</tr>

					<?php
						//$rate_gap = $last_updates['rate'] - ;
						//$stat = calStat($last_updates['rate'], $trade_history[4]["rate"]);

						echo '<tr>';
						echo '<td>'.$pairs.'</td>';
						echo '<td>'.$last_updates['rate'].'</td>';
						echo '<td>--</td>';
						echo '<td>none</td>';
						echo '<td>'.$last_updates['status'].'</td>';
						echo '<td>---</td>';
						echo '<td>'.$total_buy_request.'</td>';
						echo '<td>'.$total_sell_request.'</td>';
						echo '</tr>';
					?>
				</table>
			</div>
		</div>
	</div>
</div>