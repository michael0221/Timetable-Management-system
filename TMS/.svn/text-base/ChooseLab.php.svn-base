<?php

session_start();
require_once('main.php');
require_once('College_Method.php');
//Background_Page();

//Page Title
Display_Title();

$username=$_SESSION['username'];

if($username)
{
	//$href="welcomeCollege.php?flag=1";

	//$header='&#1578;&#1581;&#1583;&#1610;&#1583; &#1575;&#1604;&#1605;&#1593;&#1575;&#1605;&#1604; &#1575;&#1604;&#1578;&#1575;&#1576;&#1593;&#1577; &#1604;&#1604;&#1603;&#1604;&#1610;&#1577;';
	//Href2($href,$header);


	$conn = db_connect();

	//Get UniversityCode
	$uncode = $_GET['uncode'];
	$univCode=intval($uncode);

	//Get CollegeCode
	$CollegeCode = $_GET['CollegeCode'];
	$CollegeCode=intval($CollegeCode);

	$op=2;
	$value=4;
	//echo("univCode=".$univCode."</br>"."CollegeCode=".$CollegeCode);
	DisplayLectureBuilding($op,$univCode,$CollegeCode,$value);

	$Year=$_POST['D4'];
	$LabName=$_POST['D5'];

	if (!filled_out($_POST))
		{
			$msg='&#1601;&#1590;&#1604;&#1575; &#1602;&#1605; &#1576;&#1575;&#1583;&#1582;&#1575;&#1604; &#1580;&#1605;&#1610;&#1593; &#1575;&#1604;&#1576;&#1610;&#1575;&#1606;&#1575;&#1578;';
			Display_error_msg($msg);

         }
    else
    {
    	if((strcmp($Year,"")!=0)&&(strcmp($LabName,"")!=0))
    	{
    		//valid data
			$sql3 = "insert into usedBy (AcadYNo,UniversityCode,CollegeCode,BId,SubBId) values ('$Year','$univCode','$CollegeCode','2','$LabName')";
			$result3 = mysql_query($sql3);
			if ($result3)
		  		{
		  			$msg="&#1578;&#1605; &#1578;&#1582;&#1589;&#1610;&#1589; &#1575;&#1604;&#1605;&#1593;&#1605;&#1604; &#1576;&#1606;&#1580;&#1575;&#1581;";
		  			DisplaySuccHeader($msg);
		  		}
			else
			{
				$msg="&#1578;&#1605; &#1575;&#1583;&#1582;&#1575;&#1604; &#1607;&#1584;&#1607; &#1575;&#1604;&#1576;&#1610;&#1575;&#1606;&#1575;&#1578; &#1605;&#1587;&#1576;&#1602;&#1575;";
				Display_error_msg($msg);
			}
		}
    }

  }//end of if
else
{
   include("ErrorPage.php");
}

?>