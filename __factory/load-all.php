<?php
# invoke Api 
require ("../__config/p_api.php");
require ("../__config/core.php");
require ("../__config/functions.php");

$api_key = "52P8WQDT-UNTGQINY-A7RUEC8A-PJ7RQCKL"; // Api Keys here
$api_secret = "1d63d60d45b510553c0bc7dd2aa4128e8b36c44d23a47459e03ef077bb5c1d25a098e1139434c7ceb97ed3ab7673164a6f12a67432d5062be08992b5c04e358e"; // Api Secret here

# loadclass
$load_trade = new poloniex($api_key, $api_secret);
$load_ticker = $load_trade->get_ticker();
$total_ticker = count($load_ticker);

?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<?php
				foreach ($load_ticker as $key => $value) {
					# code...
					echo $key.' <br /> ';
				}
			?>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel-body">
				Market Watch List
				<hr />
				<table class="table">
					<tr>
						<th>Coin</th>
						<th>ID</th>
						<th>Last</th>
						<th>Lower Ask</th>
						<th>Highest Bid</th>
						<th>% Change</th>
						<th>Base Volume</th>
						<th>Qoute Volume</th>
						<th>Frozen</th>
						<th>High 24hr</th>
						<th>Low 24hr</th>
					</tr>
					<tr>
					<?php foreach ($load_ticker as $key => $value):  ?>
						
						


							<td><?php echo $key; ?></td>
						


					<?php endforeach; ?>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>