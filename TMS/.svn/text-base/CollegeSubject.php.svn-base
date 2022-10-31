<?php

session_start();
require_once('main.php');
require_once('College_Method.php');

//Page Title

Display_Title();

Background_Page();

$username=$_SESSION['username'];

if($username)
{
	include("header2.php");
	$conn = db_connect();

	$href="welcomeCollege.php?flag=1";

	$header='&#1578;&#1581;&#1583;&#1610;&#1583; &#1575;&#1604;&#1602;&#1575;&#1593;&#1575;&#1578; &#1575;&#1604;&#1578;&#1575;&#1576;&#1593;&#1577; &#1604;&#1604;&#1603;&#1604;&#1610;&#1577;';

	Href2($href,$header);


	//Get UniversityCode
	$uncode = $_GET['uncode'];
	$univCode=intval($uncode);

	//Get CollegeCode
	$CollegeCode = $_GET['CollegeCode'];
	$CollegeCode=intval($CollegeCode);

	//echo("univCode=".$univCode."</br>"."CollegeCode=".$CollegeCode);



}

else
{
   include("ErrorPage.php");
}

?>

