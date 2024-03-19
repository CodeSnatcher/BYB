<?php
/*
*	STEP 2
*   connection file
*/
class DB_CONNECT
{
	//constructor
	function __construct()
	{
			// include db_config file
			require "db_config.php";
	}
	
	//destructor
	function __destruct()
	{
	}
	
	public function connect()
	{
	
		// connect to database 
		$conn=mysqli_connect(host,username,password,db) or die("Error in connecting database");
      	mysqli_set_charset($conn,"utf8mb4");
		return $conn;
	}
	
}
?>