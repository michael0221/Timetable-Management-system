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

	//include("header2.php");
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

	$op=$_GET['op'];
	$op=intval($op);

	$s=$_GET['s'];
	$s=intval($s);

	DeptLec_Form($uncode1,$CollegeCode1,$AcadDeg,$DeptNo,$Classno,$Sem,$op,$s,$year,$LectureName,$mday,$mtime,$msub,$mteach);

}
else
{
	include("ErrorPage.php");
}

?>