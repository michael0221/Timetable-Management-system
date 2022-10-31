<?php
		
	session_start();
	
	//Logout from Manager Pages

	unset($_SESSION['username']);
  	
	$result_dest = session_destroy();
	
	if($result_dest)
	{
		include("TMS-Manager.php");
	}
		
?>