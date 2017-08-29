<?php
# invoke Api 
require ("../__config/p_api.php");
require ("../__config/core.php");

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
?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="thumbnail">
				<div class="panel-body">
					Today's on HNG Coinman Wallstreet Trade History
					<span class="pull-right">Total Trade <?= $total_trade; ?></span>
					<hr />
					<table class="table">
						<tr>
							<th>Global Trade ID</th>
							<th>Trade Id</th>
							<th>Date</th>
							<th>Type</th>
							<th>Rate</th>
							<th>Amount</th>
							<th>Total</th>
						</tr>
						
							<?php
								foreach ($trade_history as $new_trade_history) {
									# code...
									echo '<tr>';
									echo '<td>'.$new_trade_history["globalTradeID"].'</td>';
									echo '<td>'.$new_trade_history["tradeID"].'</td>';
									echo '<td>'.$new_trade_history["date"].'</td>';
									echo '<td>'.$new_trade_history["type"].'</td>';
									echo '<td>'.$new_trade_history["rate"].'</td>';
									echo '<td>'.$new_trade_history["amount"].'</td>';
									echo '<td>'.$new_trade_history["total"].'</td>';
									echo '</tr>';
								}

								$coin_type = $pairs;
								$coin_rate = $trade_history[4]["rate"];
								$coin_status = $trade_history[3]["type"];
								$coin_date = $trade_history[2]["date"];

								# save trade pair for XMR
								$save_trade = new WatchDog($coin_type, $coin_rate, $coin_status, $coin_date);
								$save_trade->saveUpdates();
							?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="container">
	<div class="row">
		<div class="col-md-6">
			<div class="thumbnail">
				<div class="panel-body">
					Open Trade
					<hr />
					<?php //echo $load_trade->get_open_orders($pairs); ?>
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="thumbnail">
				<div class="panel-body">
					Your Trade Balance is:
					<hr />
				</div>
			</div>
		</div>
	</div>
</div>
