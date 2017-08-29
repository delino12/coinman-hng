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

	}
}


?>