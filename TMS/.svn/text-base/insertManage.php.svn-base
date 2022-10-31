<?php
session_start();
require_once('main.php');

$conn = db_connect();
//Page Title

Display_Title();

Background_Page();

$username=$_SESSION['username'];

//Page Title
Display_Title();

if($username)
{

	//get variables
	$AcadDeg = $_GET['AcadDeg'];
	$AcadDeg=intval($AcadDeg);

	$Classno = $_GET['Class'];
	$Classno=intval($Classno);

	$CollegeCode = $_GET['CollegeCode'];
	$CollegeCode1=intval($CollegeCode);

	$uncode=$_GET['uncode'];
	$uncode1=intval($uncode);

	$DeptNo = $_GET['Dept'];
	$DeptNo=intval($DeptNo);

	$Sem = $_GET['Sem'];
	$Sem=intval($Sem);

	$op=$_GET['op']; //BID
	$op=intval($op);

	$SubBid=$_GET['SubBid'];//SubBId
	$SubBid=intval($SubBid);

	$year=$_GET['year'];

	if((($uncode1>0)&&($CollegeCode1>0))&&(($AcadDeg>0)&&($DeptNo>0)))
	  {
		if(($Classno>0)&&($Sem>0))
		 {
			echo("</br>");
			ManageForm($uncode1,$CollegeCode1,$AcadDeg,$DeptNo,$Classno,$Sem,$op,$mday,$mtime,$msub,$mteach);

			//echo("Please insert subjects..");

		 }
	  }
	else
		{
		  include("ErrorPage.php");
		}
}
else
{
	include("ErrorPage.php");
}
?>