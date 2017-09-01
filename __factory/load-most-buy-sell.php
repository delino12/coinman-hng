<?php
# invoke Api 
require ("../__config/p_api.php");
require ("../__config/core.php");
require ("../__config/functions.php");

# save trade pair for XMR
$save_trade = new WatchDog();

?>

<div class="container">
	<div class="row">
		<div class="col-md-3">
			<div class="panel-body">
				Current Leading Pairs (Higest Buy)
				<hr />
				<table class="table">
					<tr>
						<th>Pointer</th>
						<th>Value</th>
					</tr>

					<?php
						$save_trade->highest_buy();
					?>
				</table>
			</div>
		</div>
		<div class="col-md-3">
			<div class="panel-body">
				Current Leading Pairs (Higest Sold)
				<hr />
				<table class="table">
					<tr>
						<th>Pointer</th>
						<th>Value</th>
					</tr>

					<?php
						$save_trade->highest_sell();
					?>
				</table>
			</div>
		</div>

		<div class="col-md-3">
			<div class="panel-body">
				DragonGlass Predicts on Buy Tactics
				<hr />
				<ul class="list-group">
					<li class="list-group-item active">Highest Buy Tactics</li>
				</ul>
				<p>
					From the current updates on the Market Table DragonGlass predicted a value holding
					<b><?= $save_trade->highest_buy(); ?></b> 
					is the most buy pair in the crypto-currencies market
				</p>
			</div>
		</div>

		<div class="col-md-3">
			<div class="panel-body">
				DragonGlass Predicts on Sell Tactics
				<hr />
				<ul class="list-group">
					<li class="list-group-item active">Highest Sell Tactics</li>
				</ul>
				<p>
					From the current updates on the Market Table DragonGlass predicted a value holding
					<b><?= $save_trade->highest_sell(); ?></b> 
					is the most sell pair in the crypto-currencies market
				</p>
			</div>
		</div>
	</div>
</div>