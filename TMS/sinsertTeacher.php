<?php

session_start();

require_once('main.php');

//Page Title

Display_Title();

$conn = db_connect();

Background_Page();

$username=$_SESSION['username'];

if($username)
{
	include("header2.php");

	$uncode1 = $_GET['uncode'];//universityCode
	$uncode1=intval($uncode1);

	$CollegeCode = $_GET['CollegeCode'];
	$CollegeCode1=intval($CollegeCode);

	$value = $_GET['value'];
	$value=intval($value);
	
	//do update
	$doupdate=$_GET['doupdate'];
	$doupdate=intval($doupdate);
	

	$href="welcomeCollege.php?flag=1";

	$header=$_SESSION['collegename'];

	Href2($href,$header);

	DisplayTeacherMenu($uncode1,$CollegeCode1);

 	if(($uncode1>0)&&($CollegeCode1>0))
	{
		$flag=true;
		
		if($value==1)
		{
			//Add New Teacher
			
			$pre=$_POST['pre'];
			
			$TName=$_POST['T1'];
			
			$TQ=$_POST['D1'];
			
			$status=$_POST['DS'];
			
			//Check Teacher Form Fields
			
			if (!filled_out($_POST))
			{
				echo("</br>");
					$msg='&#1601;&#1590;&#1604;&#1575; &#1602;&#1605; &#1576;&#1575;&#1583;&#1582;&#1575;&#1604; &#1580;&#1605;&#1610;&#1593; &#1575;&#1604;&#1576;&#1610;&#1575;&#1606;&#1575;&#1578;';
				Display_error_msg($msg,$path);
				DisplayTeacherForm($uncode1,$CollegeCode1,$value,$TName,$TQ,$status);
				$flag=false;
    		}
    		else
			//if insert digit
			if(ctype_digit($TName))
			{
				echo("</br>");
				$msg='&#1575;&#1604;&#1575;&#1587;&#1605; &#1594;&#1610;&#1585; &#1589;&#1581;&#1610;&#1581;';
				Display_error_msg($msg,$path);
				$TName="";
				DisplayTeacherForm($uncode1,$CollegeCode1,$value,$TName,$TQ,$status);
				$flag=false;
			}

			//$TName= Must contains arabic Characters
			else
			 if ((ctype_alpha($TName)||ctype_alnum($TName))||ctype_digit($TName))
			{
				echo("</br>");
				$msg='&#1575;&#1604;&#1575;&#1587;&#1605; &#1594;&#1610;&#1585; &#1589;&#1581;&#1610;&#1581;';
				Display_error_msg($msg,$path);
				$TName="";
				DisplayTeacherForm($uncode1,$CollegeCode1,$value,$TName,$TQ,$status);
				$flag=false;
			}
			else
			if(!checkTeacherName($TName,$uncode1,$CollegeCode1))
			{
				echo("</br>");
					$msg='&#1578;&#1605; &#1575;&#1583;&#1582;&#1575;&#1604; &#1607;&#1584;&#1575; &#1575;&#1604;&#1575;&#1587;&#1605; &#1605;&#1587;&#1576;&#1602;&#1575;';
				Display_error_msg($msg,$path);
				$TName="";
				DisplayTeacherForm($uncode1,$CollegeCode1,$value,$TName,$TQ,$status);
				$flag=false;
			}
			if($flag==true)
			{
 				//echo("valid data..");
 				$year=$_SESSION['year'];

 				//before insert you must Get the Max TeacherID

 				$sql = "select max(TeacherNo) from Teachers";
 				$results=mysql_query($sql);
 				$rows=mysql_fetch_row($results);
 				if($rows[0]==0)
 				 	$max=1;
 				else
 					$max=$rows[0]+1;
				
				$TName=$pre.$TName;
				// Now you can insert New Teacher
 					$sql2 = "insert into Teachers (AcadYNo,TeacherNo,UniversityCode,CollegeCode,TeacherName,Qualif,Status) values ('$year','$max','$uncode1','$CollegeCode1','$TName','$TQ','$status')";
				$result2 = mysql_query($sql2);
				if ($result2)
				{
						$msg="&#1578;&#1605; &#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1604;&#1576;&#1610;&#1575;&#1606;&#1575;&#1578; &#1576;&#1606;&#1580;&#1575;&#1581;";
					DisplaySuccHeader($msg);
					$TName="";
					$TQ="";
					$value=1;
					DisplayTeacherForm($uncode1,$CollegeCode1,$value,$TName,$TQ,$status);
				}
				else
 				{
 					//Duplicated Data
 					//echo("Data already Existed..");
 						$msg="&#1578;&#1605; &#1575;&#1583;&#1582;&#1575;&#1604; &#1607;&#1584;&#1607; &#1575;&#1604;&#1576;&#1610;&#1575;&#1606;&#1575;&#1578; &#1605;&#1587;&#1576;&#1602;&#1575;";
 					Display_error_msg($msg,$path);
 					$TName="";
					$TQ="";
					$value=1;
					DisplayTeacherForm($uncode1,$CollegeCode1,$value,$TName,$TQ,$status);
 			    }
			}
		}
		else
		if($value==2)
		{
			//Move Teachers from previous Year to Current year
			if($_GET['f']==1)
			{
				//Submit Status of Teacher
				$status=$_POST['DS'];
				
				$selectedCollege=$_POST['DCollege'];
			
				$_SESSION['SelectedCollege']=$selectedCollege;

				DisplayTeacherForm($uncode1,$CollegeCode1,$value,$TName,$TQ,$status);

			}
			else 
			{
				//Get Teacher Form Fields
				$flag=true;
				$TName=$_POST['D2'];
				$status=$_POST['DS'];
				
				$selectedCollege=$_POST['DCollege'];
			
				$_SESSION['SelectedCollege']=$selectedCollege;
			
				if (!filled_out($_POST))
				{
					echo("</br>");
						$msg='&#1601;&#1590;&#1604;&#1575; &#1602;&#1605; &#1576;&#1575;&#1583;&#1582;&#1575;&#1604; &#1580;&#1605;&#1610;&#1593; &#1575;&#1604;&#1576;&#1610;&#1575;&#1606;&#1575;&#1578;';
					Display_error_msg($msg,$path);
					DisplayTeacherForm($uncode1,$CollegeCode1,$value,$TName,$TQ,$status);
					$flag=false;
    			}
		   
		  	 	if($flag==true)
		   		{
					//use data had inserted before
					//(1) get the detail of teacher

					$year=$_SESSION['year'];

					$sql = "select TeacherName,Qualif,Status from Teachers where TeacherNo='$TName' group by TeacherNo";
					$results=mysql_query($sql);
 					$rows=mysql_fetch_row($results);
 					$TeacherName=$rows[0];
 					$Qualif=$rows[1];
 					
 					//check Teacher
 					if($status==0)
 						 $status=$rows[2]; //on college
 					else
 						$status= 1; //assistant Teacher
 					
					//(2)Then insert Data

						$sql2 = "insert into Teachers (AcadYNo,TeacherNo,UniversityCode,CollegeCode,TeacherName,Qualif,Status) values ('$year','$TName','$uncode1','$CollegeCode1','$TeacherName','$Qualif','$status')";
					$result2 = mysql_query($sql2);
					if ($result2)
					{
							$msg="&#1578;&#1605; &#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1604;&#1576;&#1610;&#1575;&#1606;&#1575;&#1578; &#1576;&#1606;&#1580;&#1575;&#1581;";
						DisplaySuccHeader($msg);
						$TName="";
						$value=2;
						DisplayTeacherForm($uncode1,$CollegeCode1,$value,$TName,$TQ,$status);
					}
					else
 					{
 						//Duplicated Data
 						//echo("Data already Existed..");
 							$msg="&#1578;&#1605; &#1575;&#1583;&#1582;&#1575;&#1604; &#1607;&#1584;&#1607; &#1575;&#1604;&#1576;&#1610;&#1575;&#1606;&#1575;&#1578; &#1605;&#1587;&#1576;&#1602;&#1575;";
 						Display_error_msg($msg,$path);
 						$TName="";
						$value=2;
						DisplayTeacherForm($uncode1,$CollegeCode1,$value,$TName,$TQ,$status);
 			   	    }
		  		 }//end of if true
		  
		  }//end of else
		
		}//end of newelse*
		else
		if($doupdate==1)
		{
			//*New :Prepare to update Teacher Details
			
			$TNo = $_GET['TNo'];
			$TNo=intval($TNo);
			
			$year=$_GET['year'];
			
			$TName=$_POST['T1'];
			
			$TQ=$_POST['D1'];
						
			$status=$_POST['DS'];
			
			//Check Teacher Form Fields
			
			if (!filled_out($_POST))
			{
				echo("</br>");
					$msg='&#1601;&#1590;&#1604;&#1575; &#1602;&#1605; &#1576;&#1575;&#1583;&#1582;&#1575;&#1604; &#1580;&#1605;&#1610;&#1593; &#1575;&#1604;&#1576;&#1610;&#1575;&#1606;&#1575;&#1578;';
				Display_error_msg($msg,$path);
				UpdateTeacherForm($uncode1,$CollegeCode1,$TNo,$TName,$TQ,$status,$doupdate);
				$flag=false;
    		}
    		else
			//if insert digit
			if(ctype_digit($TName))
			{
				echo("</br>");
				$msg='&#1575;&#1604;&#1575;&#1587;&#1605; &#1594;&#1610;&#1585; &#1589;&#1581;&#1610;&#1581;';
				Display_error_msg($msg,$path);
				$TName="";
				UpdateTeacherForm($uncode1,$CollegeCode1,$TNo,$TName,$TQ,$status,$doupdate);
				$flag=false;
			}

			//$TName= Must contains arabic Characters
			else
			 if ((ctype_alpha($TName)||ctype_alnum($TName))||ctype_digit($TName))
			{
				echo("</br>");
				$msg='&#1575;&#1604;&#1575;&#1587;&#1605; &#1594;&#1610;&#1585; &#1589;&#1581;&#1610;&#1581;';
				Display_error_msg($msg,$path);
				$TName="";
				UpdateTeacherForm($uncode1,$CollegeCode1,$TNo,$TName,$TQ,$status,$doupdate);
				$flag=false;
			}
			
			if($flag==true)
			{
 				//echo("valid data..");
 				$year=$_SESSION['year'];
				 
				//update Teacher Based on CollegeCode 
					$results=mysql_query("update Teachers set TeacherName='$TName',Qualif='$TQ',Status='$status' where TeacherNo='$TNo' and UniversityCode='$uncode1' and CollegeCode='$CollegeCode1' and  AcadYNo='$year'");
							
				if($results)
				{
					//do update
					$TNo=0;
					$TName="";
					$TQ="";
					$status="";
					$value=1;
					echo("<script>alert('Successfully updated ..');</script>");
					DisplayTeacherForm($uncode1,$CollegeCode1,$value,$TName,$TQ,$status);
				}
				else
				{
					echo("<script> alert('Sorry, Try again Data not updated');</script>");
				}
				
			}//end of true			
			
		}//end of doupdate
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