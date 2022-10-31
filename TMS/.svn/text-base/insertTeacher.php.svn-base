<?php

//Insert Teachers 

session_start();

require_once('main.php');

//Page Title

Display_Title();


Background_Page();

$username=$_SESSION['username'];

if($username)
{
	include("header2.php");

	$uncode1 = $_GET['uncode'];//universityCode
	$uncode1=intval($uncode1);

	$CollegeCode = $_GET['CollegeCode'];
	$CollegeCode1=intval($CollegeCode);

	$href="welcomeCollege.php?flag=1";

	$header=$_SESSION['collegename'];

	//Page Name: Teachers
	$header=$header."- &#1575;&#1593;&#1590;&#1575;&#1569; &#1607;&#1610;&#1574;&#1577; &#1575;&#1604;&#1578;&#1583;&#1585;&#1610;&#1587;";
	Href2($href,$header);

	DisplayTeacherMenu($uncode1,$CollegeCode1);

	if(($uncode1>0)&&($CollegeCode1>0))
	{
		//Display Menu
		$value = $_GET['value'];
		$value=intval($value);
		
		//do update
		$doupdate=$_GET['doupdate'];
		$doupdate=intval($doupdate);
		
		if(($value==1)||($value==2))
		{
			// Display RegTeacher Form
			DisplayTeacherForm($uncode1,$CollegeCode1,$value,$TName,$TQ,$status);	
		}
		else
		{
			// Display Update Teacher Form
			if($doupdate==1)
			{
				$TNo = $_GET['TNo'];
				$TNo=intval($TNo);
				$year=$_GET['year'];
				
				$TName=GetTeacherName($CollegeCode1,$uncode1,$TNo);
				
				$TQ=GetTeacherQualification($CollegeCode1,$uncode1,$TNo);
				
				$status=GetTeacherStatus($CollegeCode1,$uncode1,$TNo);

				UpdateTeacherForm($uncode1,$CollegeCode1,$TNo,$TName,$TQ,$status,$doupdate);
			}
		}//end of else	
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