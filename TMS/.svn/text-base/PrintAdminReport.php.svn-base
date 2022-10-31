<?php

session_start();

require_once('main.php');

require_once('Report_Method.php');

//-------------------------------------------------------------------------
//>> This page used to Print the Current Status of Managing Lectures for each College on specific University

//>> Create on : Saturday- 28/2/2009

//>> Creater: Hind from SUST

//>> Copywrite : @SUST@2009
//-------------------------------------------------------------------------

Display_Title();

if (strcmp($_SESSION['username'],"")!=0)
{
	
	$conn = db_connect();
	
	$univCode=$_GET['UnivCode'];
	$univCode=intval($univCode);
		
	$year=GetMaxYear();
		
	$CollegeCode=$_GET['CollegeCode'];
		
	$SemNo=$_GET['SemNo'];
	
	$report=$_GET['report'];
	
	$print=1;

	//[3] Get all Depart on specific College and make paging Mechanism
		
	$Depts=GetAllDeparts($univCode,$CollegeCode);
		
	$option=1;
		
	if($Depts != -1)
	{
			
		//General Header[University - College - Semester - AcadYear]
			
		GeneralHeader($univCode,$CollegeCode,$SemNo);
		
		switch($report)
		{
				case 1:{
							//Display Current Managed Hours
							echo("<a name='#Report1'>");
							include('AdReport1.php');
							echo("</a>");
							break;
					   }
					   
				case 2:{
							//Display Numbers of Students and Groups
							echo("<a name='#Report1'>");
							include('AdReport2.php');
							echo("</a>");
							break;
					   }
					   
				case 3:{
							//Display Numbers of [Teachers] on each College
							echo("<a name='#Report1'>");
							//include('AdReport3.php');
							echo("</a>");
							break;
					   }

					   
		}//end of switch
			
		
		Diplay_RDate();//page's foooter
	
	}//end of if
	
}//end of session
else
{
	include("ErrorPage.php");
}
?>