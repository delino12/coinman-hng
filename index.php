<!DOCTYPE html>
<html>
<head>
	<title>Coinman</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<!-- Custom Google Web Font -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
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
					<li class="menuItem"><a href="balance/"><i class="fa fa-database"></i> <span id="load-balance"></span> </a></li>
					<li class="menuItem"><a href="profile/"><i class="fa fa-user"></i> Ekpoto </a></li>
					<li class="menuItem"><a href="lesson/"><i class="fa fa-download"></i> Trade Tactics</a></li>
				</ul>	
			</div>
		</div>
	</nav>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="lead">Coin Man</h1>
				<hr />
				<div id="load-all"></div>
			</div>
		</div>
	</div>

	<script type="text/javascript">		
		var refreshFeeds = function (){
			// load students
			$("#load-all").load("__factory/load-poloniex.php");
		};
		window.setInterval(refreshFeeds, 9000);
	</script>
	<script src="js/bootstrap.js"></script>
</body>
</html>