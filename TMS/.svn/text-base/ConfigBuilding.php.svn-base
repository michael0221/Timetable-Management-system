<?php
session_start();
require_once('main.php');
//Page Title

Display_Title();


$username=$_SESSION['username'];
if($username)
{
	include("header2.php");
	Background_Page();
	$op=$_POST['R1'];
	ChooseBuilding($op);
	if($op==1)
	{
		DisplayChooseBuilding($username);
	}
}
else
{
	include("ErrorPage.php");
}

?>