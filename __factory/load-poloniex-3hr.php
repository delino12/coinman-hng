<?php
# invoke Api 
require ("../__config/p_api.php");
require ("../__config/core.php");
require ("../__config/functions.php");

$api_key = "52P8WQDT-UNTGQINY-A7RUEC8A-PJ7RQCKL"; // Api Keys here
$api_secret = "1d63d60d45b510553c0bc7dd2aa4128e8b36c44d23a47459e03ef077bb5c1d25a098e1139434c7ceb97ed3ab7673164a6f12a67432d5062be08992b5c04e358e"; // Api Secret here

# loadclass
$load_trade = new poloniex($api_key, $api_secret);


$vol = $load_trade->get_volume();
$trade_ticker = $load_trade->get_trading_pairs();
$total_ticker = count($trade_ticker);

$pairs = "BTC_XMR";

$trade_history = $load_trade->get_trade_history($pairs);
$total_trade = count($trade_history);

$coin_type = $pairs;
$coin_rate = $trade_history[4]["rate"];
$coin_status = $trade_history[3]["type"];
$coin_date = $trade_history[2]["date"];

# save trade pair for XMR
$save_trade = new WatchDog($coin_type, $coin_rate, $coin_status, $coin_date);
$save_trade->saveUpdates();

# load last updates
$last_updates = $save_trade->loadLastUpdated();

# total buyer for 
$total_buy_request = $save_trade->getBuyersTotal();
$total_sell_request = $save_trade->getSellersTotal()

?>
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="thumbnail">
				<div class="panel-body">
					Market Watch List 3hr ago
					<hr />
					<table class="table">
						<tr>
							<th>Stack Pair</th>
							<th>Rate </th>
							<th>Rate gap</th>
							<th>% Change</th>
							<th>Type</th>
							<th>Status</th>
							<th>No. Buy</th>
							<th>No. Sell</th>
						</tr>

						<?php
							$rate_gap = calDiffer($last_updates['rate'], $trade_history[4]["rate"]);
							$stat = calStat($last_updates['rate'], $trade_history[4]["rate"]);

							echo '<tr>';
							echo '<td>'.$pairs.'</td>';
							echo '<td>'.$last_updates['rate'].'</td>';
							echo '<td>'.$rate_gap.'</td>';
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
</div>