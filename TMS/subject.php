<?php
session_start();
require_once('main.php');


//$conn = db_connect();

//Page Title

Display_Title();

Background_Page();

$username=$_SESSION['username'];

$year=$_SESSION['year'];

//Page Title
Display_Title();

if(($username)&&($year))
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

	$Sem = $_GET['Sem'];
	$Sem=intval($Sem);
	
	$SecID=$_POST['D1'];
	
	$f = $_GET['f'];
	$f=intval($f);

	$value = $_GET['value'];
	$value=intval($value);

	//College header
	Display_welcomeHeader_College($_SESSION['collegename']);

	//Deptartment Header

	$deptName=GetDeptName($uncode1,$CollegeCode1,$DeptNo);

	//Subject Header
	if($f==1)
	{
		$href="CollegeManage.php?AcadDeg=$AcadDeg&uncode=$uncode&CollegeCode=$CollegeCode&Dept=$DeptNo#AcadDegree";
		$header=$deptName."&nbsp;&gt;&nbsp;"."&#1578;&#1587;&#1580;&#1610;&#1604; &#1575;&#1604;&#1605;&#1608;&#1575;&#1583;";
		Href2($href,$header);

	}
	else
	{
		$href="ConfigDept.php?AcadDeg=$AcadDeg&uncode=$uncode&CollegeCode=$CollegeCode&Dept=$DeptNo#AcadDegree";
		$head="&nbsp;&#1604;&#1604;&#1593;&#1575;&#1605; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; "."<span dir='rtl'>".$year."</span>";
		$header=$deptName."&nbsp;&gt;&nbsp;"."&#1578;&#1587;&#1580;&#1610;&#1604; &#1575;&#1604;&#1605;&#1608;&#1575;&#1583;".$head;
		Href2($href,$header);
	}

	// Display Menu [Add New || update Subject]

 	DisplaySubjectMenu($uncode1,$CollegeCode1,$AcadDeg,$DeptNo,$Classno,$Sem);

	if((($uncode1>0)&&($CollegeCode1>0))&&(($AcadDeg>0)&&($DeptNo>0)))
	  	{
			if(($Classno>0)&&($Sem>0))
		 	{
			
				//add New Subject
				if($value==1)
				{
					
					echo("</br>");
					
					Subject_Form($uncode1,$CollegeCode1,$AcadDeg,$DeptNo,$Classno,$Sem,$f,$SubCode,$SubName,$SubHour,$SubPerWeek,$stype,$SecID);
				}
				else
				//Get Subject fro previous Year
				if($value==2)
				{
					echo("</br>");
					Subject_UpdateForm($uncode1,$CollegeCode1,$AcadDeg,$DeptNo,$Classno,$Sem,$f,$SubName,$year);
				}
				else
				{
					//update Subject Detail
					//check if we click on update
	
					$update = $_GET['update'];
					$update=intval($update);

					if($update==1)
					{
				
						$SubCode = $_GET['subcode'];
						
						$SecID=$_GET['SecID'];
				
						//$SubName = $_GET['SubName'];
						
						$SubName = GetSubjecttName($CollegeCode,$uncode,$DeptNo,$AcadDeg,$Sem,$Classno,$SubCode,$year,$SecID);

				
						$year= $_GET['year'];
				
						//get subject details [lecture]
				
						$res = mysqli_query($mysqli,"select SubHour,SubTHour from CollegeSubject where
									AcadYNo='$year' and
									UniversityCode='$uncode' and
									CollegeCode='$CollegeCode' and
									DeptNo='$DeptNo' and AcadDegreeId='$AcadDeg' and
									ClassNo='$Classno' and SecID='$SecID' and
									SemNo='$Sem' and SubCode='$SubCode'");
				
						$rows=mysqli_fetch_row($res);
				
						$SubHour=$rows[0];
						$SubTHour=$rows[1];
				
						//get subject details [lab]
				
						$SubLCode=$SubCode."L";
						$res = mysqli_query($mysqli,"select SubHour from CollegeSubject where
									AcadYNo='$year' and
									UniversityCode='$uncode' and
									CollegeCode='$CollegeCode' and
									DeptNo='$DeptNo' and AcadDegreeId='$AcadDeg' and
									ClassNo='$Classno' and SecID='$SecID' and
									SemNo='$Sem' and SubCode='$SubLCode'");
				
						if(mysqli_num_rows($res)==0)
							$SubLHour=0;
						else
						{
							$rows=mysqli_fetch_row($res);

							$SubLHour=$rows[0];
						}
						echo("</br>");
						//update Subject Detail
							UpdateSubDetail_Form($uncode1,$CollegeCode1,$AcadDeg,$DeptNo,$Classno,$Sem,$f,$SubCode,$SubName,$SubHour,$SubTHour,$SubLHour,$SecID);

    				}//end update
    					
				}
			}//end if
		 }//end if
	  
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