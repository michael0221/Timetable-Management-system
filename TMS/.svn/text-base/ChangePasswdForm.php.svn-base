<?php
session_start();

require_once('main.php');

//Page Title

Display_Title();
Background_Page();

$username=$_SESSION['username'];

$passwd=$_SESSION['passwd'];

if($username)
{

	include("header.php");

	$href="welcomeAdmin.php";
	Href($href);

	$conn = db_connect();
	Display_Admin_Menu3();
	display_password_form();

}
else
{
	include("ErrorPage.php");
}


?>