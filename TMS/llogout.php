<?php
		
	session_start();
	
	//Logout from College Page

	unset($_SESSION['username']);
  	
  	unset($_SESSION['year']);

	$result_dest = session_destroy();
	
	if($result_dest)
	{
		include("TMS-College.php");
	}
		
?>