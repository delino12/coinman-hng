<!DOCTYPE html>
<html>
<head>
	<title>HNG Coinman</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="js/jquery.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<nav class="navbar-default" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="">HNG CoinMan</a>
			</div>

			<div class="collapse navbar-collapse navbar-right navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<li class="menuItem"><a href="index.php"><i class="fa fa-database"></i> Home </a></li>
					<li class="menuItem"><a href=""><i class="fa fa-user"></i> DragonGlass </a></li>
					<li class="menuItem"><a href="all"><i class="fa fa-download"></i> Trade Tactics</a></li>
				</ul>	
			</div>
		</div>
	</nav>

	<div class="container">
		<h2>HGN CoinMan Trade Strategy predict</h2>
		<p>This strategy show transaction gap between each crypto-currencies, buy transaction rate, sell transaction rate and trade activity details. </p>

		<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#home">Current Updates </a></li>
			<li><a data-toggle="tab" href="#menu1">Last 1 min of trade</a></li>
			<li><a data-toggle="tab" href="#menu2">Last 3 mins of trade</a></li>
			<li><a data-toggle="tab" href="#menu3">Last 24 mins of trade</a></li>
		</ul>

		<div class="tab-content">
			<div id="home" class="tab-pane fade in active">
				<div id="load-all"></div>
			</div>
			<div id="menu1" class="tab-pane fade">
				<div id="load-all-1hr"></div>
			</div>
			<div id="menu2" class="tab-pane fade">
				<div id="load-all-3hr"></div>
			</div>
			<div id="menu3" class="tab-pane fade">
				<div id="load-all-24hr"></div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div id="trade-history"></div>
			</div>
		</div>
	</div>

	<script type="text/javascript">		
		var refreshFeeds = function (){
			// load students
			$("#load-all").load("__factory/load-all.php");
			//$("#load-all-1hr").load("__factory/load-poloniex-1hr.php");
			//$("#load-all-3hr").load("__factory/load-poloniex-3hr.php");
			//$("#load-all-24hr").load("__factory/load-poloniex-24hr.php");
			//$("#trade-history").load("__factory/load-trade-history.php");
		};
		window.setInterval(refreshFeeds, 6000);
	</script>
	<script src="js/bootstrap.js"></script>
</body>
</html>