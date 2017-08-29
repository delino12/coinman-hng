<?php
/**
* Setup 
*/
class DBconnect
{
	protected $host;
	protected $user;
	protected $pass;
	protected $db;

	function __construct()
	{
		# code...
		$this->host = "localhost";
		$this->user = "id2735871_coinmanhng";
		$this->pass = "coinmanhng";
		$this->db = "id2735871_coinmanhng_db";
	}

	public function iConnect(){
		$connection = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
		if(mysqli_connect_errno())
		{
			return "Error creating connection ! <br />".mysqli_connect_error();
		}
		return $connection;
	}
}
?>