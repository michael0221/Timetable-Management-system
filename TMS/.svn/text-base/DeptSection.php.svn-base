<?php

	session_start();
	require_once('main.php');

	//Page Title

	Display_Title();

	$username=$_SESSION['username'];
	if($username)
	{

		$conn = db_connect();
		Background_Page();
		include("header2.php");


		$CollegeCode = $_GET['CollegeCode'];
		$CollegeCode=intval($CollegeCode);

		$uncode=$_GET['uncode'];
		$uncode=intval($uncode);

 		//echo($CollegeCode.$uncode);
 		$href="ConfigDept.php?CollegeCode=$CollegeCode&uncode=$uncode";
		$header="CollegeCode=$CollegeCode&uncode=$uncode";
		
		//Href2($href,$header);
		Href2Dept($href,$header); //found on Method.php
		$FlagSec=0;
		DeptSection_Form($CollegeCode,$uncode,$DeptNo,$SecName,$ClassNo,$FlagSec,$do);

	}
	else
	{
		include("ErrorPage.php");
	}


	?>




