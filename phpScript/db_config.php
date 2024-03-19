<?php
/*
*	STEP 1
*   db_config
*/
@ob_start();
@session_start();

$server="online"; // Change value to go online

if($server=="offline")
{
	@define("host","localhost");
	@define("username","root");
	@define("password","");
	@define("db","db_delta",true);
	@define("base_url","localhost/delta/",true);
}
// Online Web Configuration
else
{
	@define("host","localhost");
	@define("username","bringyourbuddy_user");
	@define("password","yaRS8FfY5CAP");
	@define("db","bringyourbuddy_db",true);
	@define("base_url","localhost/buddy",true);
	
}	



?>