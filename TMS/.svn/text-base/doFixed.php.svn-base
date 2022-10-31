<?php

	session_start();
	
	require_once('main.php');

	require_once('FixedName.php');

	$conn = db_connect();

	//Page Title

	Display_Title();

	Background_Page();

	$uncode1=111;

	//Get Form Fields

	if(!($_POST['B3']))
	{
		$SelectedCollege=$_POST['DCollege'];

		$CollTeacherName=$_POST['D1'];

		$AssistCollege=$_POST['AssistCollege'];
					
		$AssistTeacher=$_POST['D2'];
		
	}
	else
	{
		$SelectedCollege=$_POST['DCollege'];

		$CollTeacherName=$_POST['D1'];

		$AssistCollege=$_POST['AssistCollege'];
					
		$AssistTeacher=$_POST['D2'];
		
		//echo("Coll1= ".$SelectedCollege." CollT=".$CollTeacherName."</br> Coll2= ".$AssistCollege."assitColl=".$AssistTeacher);
		
		//prepare to update teacher
				
		//[1] update Managing Lecture according to selected Teacher
		
		$result = mysql_query("update managinglec set TeacherId='$CollTeacherName' where  TeacherId='$AssistTeacher' and 
							   CollegeCode='$AssistCollege' and UniversityCode='$uncode1'");
		
			
		if($result)
		{
			
			//[2] Update table Teacher

			$TName=GetTeacherName($SelectedCollege,$uncode1,$CollTeacherName);

			$result2 = mysql_query("update Teachers set TeacherNo='$CollTeacherName',TeacherName='$TName' where TeacherNo='$AssistTeacher' and 
									CollegeCode='$AssistCollege' and UniversityCode='$uncode1'");
			
			if($result2)
			{
				//echo("Successfully Updated...");
				
					echo("<div align='center' border='sold'><font size='4' color='yellow' face='Traditional Arabic'>
								<b>&#1578;&#1605;&#1578; &#1593;&#1605;&#1604;&#1610;&#1577; &#1578;&#1593;&#1583;&#1610;&#1604; &#1578;&#1603;&#1585;&#1575;&#1585; &#1575;&#1604;&#1575;&#1587;&#1605; &#1576;&#1606;&#1580;&#1575;&#1581;</b>
							</font></div>");
				
				$SelectedCollege="";

				$CollTeacherName="";
		
				$AssistCollege="";
							
				$AssistTeacher="";
			}
			else
			{
				//nothing to do
				echo("sorry, Operation Not Complete ..");

			}
			
		}
		else
		{
			echo("sorry, Operation Not Complete ..");
		}

	}

	DisplayFixedTeacherForm($uncode1,$SelectedCollege,$CollTeacherName,$AssistCollege,$AssistTeacher);

?>
