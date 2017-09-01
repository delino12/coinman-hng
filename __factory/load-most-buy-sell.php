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
						<th>Pair</th>
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
						<th>Pair</th>
						<th>Value</th>
					</tr>

					<?php
						$save_trade->highest_sell();
					?>
				</table>
			</div>
		</div>
	</div>
</div>