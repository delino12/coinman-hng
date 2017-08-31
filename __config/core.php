<?php
require ("db.php");
/**
* Processor
*/

/**
* 
*/
class CountTradeRequest extends DBconnect
{
	
	protected $plug;

	function __construct()
	{
		# timer
		# 30 mins duration
		# 3600 / 2 = 1600
		$this->expires = 1800 + time();
		$this->timer = time();

		parent::__construct();
		$this->plug = DBconnect::iConnect();
	}

	public function load_buy_count($pairs)
	{
		$count_buy_request = " SELECT COUNT(*) FROM watchdog WHERE(status = 'buy' ";
		$count_buy_request.= " AND type = '".$pairs."' )";
		$count_buy_request_query = mysqli_query($this->plug, $count_buy_request);
		if(!$count_buy_request_query){
			echo 'Error running count_buy_request_query '.mysqli_error($count_buy_request_query);
		}else{
			while ($result = mysqli_fetch_array($count_buy_request_query)) {
				# code...
				return $result['COUNT(*)'];
			}
		}
	}


	public function load_sell_count($pairs){
		# code...
		$count_sell_request = " SELECT COUNT(*) FROM watchdog WHERE(status = 'sell' ";
		$count_sell_request .= " AND type = '".$pairs."' )";
		$count_sell_request_query = mysqli_query($this->plug, $count_sell_request);
		if(!$count_sell_request_query){
			echo 'Error running count_sell_request_query '.mysqli_error($count_sell_request_query);
		}else{
			while ($result = mysqli_fetch_array($count_sell_request_query)) {
				# code...
				return $result['COUNT(*)'];
			}
		}
	}
}

class WatchDog extends DBconnect
{

	protected $plug;

	protected $expires;
	protected $timer;

	function __construct()
	{
		# timer
		# 30 mins duration
		# 3600 / 2 = 1600
		$this->expires = 1800 + time();
		$this->timer = time();

		parent::__construct();
		$this->plug = DBconnect::iConnect();
	}

	public function saveUpdates($pairs, $coin_rate, $coin_status, $coin_date){

		# check first for differences..

		# save to watch dog
		$save_coin_rates = " INSERT INTO watchdog (type, rate, status, date, time, expire) ";
		$save_coin_rates .= " VALUES('".$pairs."', '".$coin_rate."', ";
		$save_coin_rates .= " '".$coin_status."', '".$coin_date."', ";
		$save_coin_rates .= " '".$this->timer."', '".$this->expires."') ";
		$save_coin_rates_query = mysqli_query($this->plug, $save_coin_rates);
		if(!$save_coin_rates_query){
			echo 'Error running save_coin_rates_query '.mysqli_error($this->plug);
		}
	}

	public function load_trade($pairs)
	{
		# code...
		$load_trade_pairs = " SELECT * FROM watchdog  ";
		$load_trade_pairs .= " WHERE(type = '".$pairs."') LIMIT 1 ";
		$load_trade_pairs_query = mysqli_query($this->plug, $load_trade_pairs);
		if(!$load_trade_pairs_query){
			echo 'Error running loading all trade query '.mysqli_error($this->plug);
		}else{
			while ($results = mysqli_fetch_array($load_trade_pairs_query)) {

				# count numbers of buy request
				$get_count = new CountTradeRequest();
				$total_buy = $get_count->load_buy_count($pairs);
				$total_sell = $get_count->load_sell_count($pairs);

				# code...
				$msg = '
					<tr>
						<td>'.$results['type'].'</td>
						<td>'.$results['rate'].'</td>
						<td> --- </td>
						<td> --- </td>
						<td> --- </td>
						<td>'.$results['status'].'</td>
						<td>'.$total_buy.'</td>
						<td>'.$total_sell.'</td>
					</tr>
				';
				return $msg;
			}
		}
	}

	public function loadLastUpdated(){
		$load_last_updates = " SELECT * FROM watchdog ORDER BY id DESC LIMIT 1 ";
		$load_last_updates_query = mysqli_query($this->plug, $load_last_updates);
		if(!$load_last_updates_query){
			echo 'Error running load_last_updates_query '.mysqli_error($this->plug);
		}else{
			while($results = mysqli_fetch_array($load_last_updates_query)){

				return $results;
			}
		}
	}

	public function getBuyersTotal()
	{
		# code...
		$count_buy_request = " SELECT COUNT(*) FROM watchdog WHERE(status = 'buy') ";
		$count_buy_request_query = mysqli_query($this->plug, $count_buy_request);
		if(!$count_buy_request_query){
			echo 'Error running count_buy_request_query '.mysqli_error($count_buy_request_query);
		}else{
			while ($result = mysqli_fetch_array($count_buy_request_query)) {
				# code...
				return $result['COUNT(*)'];
			}
		}
	}

	public function getSellersTotal()
	{
		# code...
		$count_sell_request = " SELECT COUNT(*) FROM watchdog WHERE(status = 'sell') ";
		$count_sell_request_query = mysqli_query($this->plug, $count_sell_request);
		if(!$count_sell_request_query){
			echo 'Error running count_sell_request_query '.mysqli_error($count_sell_request_query);
		}else{
			while ($result = mysqli_fetch_array($count_sell_request_query)) {
				# code...
				return $result['COUNT(*)'];
			}
		}
	}

	public function refreshData(){
		$resetData = " DELETE FROM watchdog ";
		$resetData_query = mysqli_query($this->plug, $resetData);
		if(!$resetData_query){
			echo 'Fail to run resetData_query '.mysqli_error($this->plug);
		}
			
	}
}
?>