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

	include("header2.php");
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
	
	
	if($_GET['checkit']==1)
	{
		$SecID=$_POST['D2'];
	}
	else
	{
	
		$SecID= $_GET['SecID'];
		$SecID=intval($SecID);
	}
	

	$Sem = $_GET['Sem'];
	$Sem=intval($Sem);

	//College header
	Display_welcomeHeader_College($_SESSION['collegename']);

	//Deptartment Header

	$deptName=GetDeptName($uncode1,$CollegeCode1,$DeptNo);


	$href="ConfigNewYear.php?AcadDeg=$AcadDeg&uncode=$uncode&CollegeCode=$CollegeCode&Dept=$DeptNo&value=2#AcadDeg";
		$header=$deptName."&nbsp;&gt;&nbsp;"."&#1578;&#1581;&#1583;&#1610;&#1583; &#1575;&#1593;&#1583;&#1575;&#1583; &#1575;&#1604;&#1591;&#1604;&#1575;&#1576;";

	$year=$_SESSION['year'];

	$header=$header." &#1604;&#1604;&#1593;&#1575;&#1605; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &nbsp;".$year;

	Href2($href,$header);

	//check if inserted before
	$conn = db_connect();
	$sql = "select NoOfStud,NoOfGroup from StudyPerSem where
			AcadYNo='$year' and
			UniversityCode='$uncode1' and
			CollegeCode='$CollegeCode1' and
			DeptNo='$DeptNo' and
			AcadDegreeId='$AcadDeg' and
			ClassNo='$Classno' and SecID='$SecID' and 			
			SemNo='$Sem'";
	$result = mysql_query($sql);
	$row=mysql_fetch_row($result);
	if($row>0)
	{
		//echo("data had been inserted..");
		$NoOfStud=$row[0];
		$NoOfGroup=$row[1];
		//echo($NoOfStud."</br>".$NoOfGroup);
		DisplayAlter($uncode1,$CollegeCode1,$AcadDeg,$DeptNo,$Classno,$Sem,$year,$NoOfStud,$NoOfGroup,$SecID);
	}
	else
	{
		//display Form
		// Add Data
		$flag=0;
		DisplayRegStudentForm($uncode1,$CollegeCode1,$AcadDeg,$DeptNo,$Classno,$Sem,$year,$NoOfStud,$NoOfGroup,$flag,$SecID);
	}

}
else
{
	include("ErrorPage.php");
}
?>