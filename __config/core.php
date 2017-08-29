<?php
require ("db.php");
/**
* Processor
*/
class WatchDog extends DBconnect
{
	protected $coin_type;
	protected $coin_rate;
	protected $coin_date;
	protected $coin_status;

	protected $plug;

	function __construct($coin_type, $coin_rate, $coin_status, $coin_date)
	{
		# code...
		$this->coin_type = $coin_type;
		$this->coin_rate = $coin_rate;
		$this->coin_date = $coin_date;
		$this->coin_status = $coin_status;

		parent::__construct();
		$this->plug = DBconnect::iConnect();
	}

	public function saveUpdates(){

		# check first for differences..

		# save to watch dog
		$save_coin_rates = " INSERT INTO watchdog (type, rate, status, date) ";
		$save_coin_rates .= " VALUES('".$this->coin_type."', '".$this->coin_rate."', ";
		$save_coin_rates .= " '".$this->coin_status."', '".$this->coin_date."') ";
		$save_coin_rates_query = mysqli_query($this->plug, $save_coin_rates);
		if(!$save_coin_rates_query){
			echo 'Error running save_coin_rates_query '.mysqli_error($this->plug);
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
}


?>