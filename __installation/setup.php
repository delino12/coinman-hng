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
		$this->user = "coinmanhng";
		$this->pass = "coinmanhng";
		$this->db = "coinmanhng_db";
	}
}
?>