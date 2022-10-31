<?php
session_start();
require_once('main.php');
require_once('University_Method.php');

//Page Title

Display_Title();

Background_Page();
$username=$_SESSION['username'];
if($username)
{
	include("header.php");
	$href="university.php?id=1";
	$header="&#1578;&#1587;&#1580;&#1610;&#1604; &#1575;&#1604;&#1580;&#1575;&#1605;&#1593;&#1575;&#1578; ";
	Href2($href,$header);
	$conn = db_connect();
	echo("</br>");
	$uploaded=0;
	display_University_form($univCode,$univName,$logo,$uploaded);

}


?>