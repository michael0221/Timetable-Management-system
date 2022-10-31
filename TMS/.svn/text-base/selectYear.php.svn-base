<?php

session_start();
require_once('main.php');
//Page Title

Display_Title();


Background_Page();

$conn = db_connect();

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

//if ($f==1)> Administrator
//if ($f==2)> users


$f=$_GET['f'];
$f=intval($f);

$frep=$_GET['frep'];
$frep=intval($frep);

$ProgType=$_GET['ProgType'];
$ProgType=intval($ProgType);


$username=$_SESSION['username'];
if($username)
{
	include("header2.php");
	// Display College header

	$CollegeName=GetCollegeName($uncode1,$CollegeCode1);

	Display_welcomeHeader_College($CollegeName);


	if((($uncode1>0)&&($CollegeCode1>0))&&(($AcadDeg>0)&&($DeptNo>0)))
	{
		SelectYear($uncode1,$CollegeCode1,$AcadDeg,$Classno,$Sem,$DeptNo,$f,$year,$ProgType);
	}
	else
	{

		include("ErrorPage.php");
	}
}//end of main if

else
{

	include("ErrorPage.php");
}
?>