<?php

	require_once('main.php');
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
	$conn = db_connect();
	
	Display_Title();
	
	Background_Page();
	
	include("header2.php");
	
	$f=2;
	$year=GetMaxYear();
	//$uncode1 =111;
	//$CollegeCode1= 222;
	

	MainDisplay($uncode1,$CollegeCode1,$f,$year);//CollegeMethod.php

	
?>
