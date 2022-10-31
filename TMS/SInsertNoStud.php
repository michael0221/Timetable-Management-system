<?php
session_start();

require_once('main.php');
//Page Title

Display_Title();


Background_Page();

//Page Title
Display_Title();

$username=$_SESSION['username'];

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

	$Sem = $_GET['Sem'];
	$Sem=intval($Sem);
	
	$SecID= $_GET['SecID'];
	$SecID=intval($SecID);
	
	$f = $_GET['f'];
	$f=intval($f);

	//College header
	Display_welcomeHeader_College($_SESSION['collegename']);

	//Deptartment Header

	$deptName=GetDeptName($uncode1,$CollegeCode1,$DeptNo);

	//Back
	$href="ConfigNewYear.php?AcadDeg=$AcadDeg&uncode=$uncode&CollegeCode=$CollegeCode&Dept=$DeptNo&value=2#AcadDeg";
	$header=$deptName."&nbsp;&gt;&nbsp;"."&#1578;&#1581;&#1583;&#1610;&#1583; &#1575;&#1593;&#1583;&#1575;&#1583; &#1575;&#1604;&#1591;&#1604;&#1575;&#1576;";

	$year=$_SESSION['year'];

	$header=$header." &#1604;&#1604;&#1593;&#1575;&#1605; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &nbsp;".$year;

	Href2($href,$header);

	if((($uncode1>0)&&($CollegeCode1>0))&&(($AcadDeg>0)&&($DeptNo>0)))
	  {
		if(($Classno>0)&&($Sem>0))
		 {
			$flag=true;
			 // create short variable names
			 $year = $_POST['D1'];
			 $NoOfStud = $_POST['T1'];
			 $NoOfGroup=$_POST['T2'];

			 //echo($year."</br>".$NoOfStud."</br>". $NoOfGroup);
			 if (!filled_out($_POST))
			 {
			    echo("</br>");
					$msg='&#1601;&#1590;&#1604;&#1575; &#1602;&#1605; &#1576;&#1575;&#1583;&#1582;&#1575;&#1604; &#1580;&#1605;&#1610;&#1593; &#1575;&#1604;&#1576;&#1610;&#1575;&#1606;&#1575;&#1578;';
				Display_error_msg($msg,$path);
				DisplayRegStudentForm($uncode1,$CollegeCode1,$AcadDeg,$DeptNo,$Classno,$Sem,$year,$NoOfStud,$NoOfGroup,$f,$SecID);
			    $flag=false;
    		}
    		//Check fields
    		else
    		//consist Numbers
			//$NoOfStud=contains Numbers and must be >0
			if((!ctype_digit($NoOfStud))||($NoOfStud==0))
			{
					echo("</br>");
					$msg="&#1593;&#1583;&#1583; &#1575;&#1604;&#1591;&#1604;&#1575;&#1576; &#1610;&#1580;&#1576; &#1575;&#1606; &#1610;&#1581;&#1578;&#1608;&#1609; &#1593;&#1604;&#1609; &#1575;&#1585;&#1602;&#1575;&#1605; &#1601;&#1602;&#1591;";
					Display_error_msg($msg,$path);
					$NoOfStud="";
					DisplayRegStudentForm($uncode1,$CollegeCode1,$AcadDeg,$DeptNo,$Classno,$Sem,$year,$NoOfStud,$NoOfGroup,$f,$SecID);
					$flag=false;
			}
			else
			//$NoOfGroup=contains Numbers and must be >0
			if((!ctype_digit($NoOfGroup))||($NoOfGroup==0))
			{
					echo("</br>");
					$msg="&#1593;&#1583;&#1583; &#1575;&#1604;&#1605;&#1580;&#1605;&#1608;&#1593;&#1575;&#1578; &#1610;&#1580;&#1576; &#1575;&#1606; &#1610;&#1581;&#1578;&#1608;&#1609; &#1593;&#1604;&#1609; &#1575;&#1585;&#1602;&#1575;&#1605; &#1601;&#1602;&#1591;";
					Display_error_msg($msg,$path);
					$NoOfGroup="";
					DisplayRegStudentForm($uncode1,$CollegeCode1,$AcadDeg,$DeptNo,$Classno,$Sem,$year,$NoOfStud,$NoOfGroup,$f,$SecID);
					$flag=false;
			}
    		if($flag==true)
			{
 				//echo("valid data..");
 				//echo("univ=".$uncode1."</br>College=".$CollegeCode1."</br>AcdDeg=".$AcadDeg."</br>dept=".$DeptNo."</br>class=".$Classno."</br>sem=".$Sem."</br>year=".$year."</br>nostud=".$NoOfStud."</br>noGroup=".$NoOfGroup);

				//First: insert into table StudyPerSem
				$conn = db_connect();
					$sql = "insert into StudyPerSem (AcadYNo,UniversityCode,CollegeCode,DeptNo,AcadDegreeId,SemNo,ClassNo,SecID,NoOfStud,NoOfGroup) values ('$year','$uncode1','$CollegeCode1','$DeptNo','$AcadDeg','$Sem','$Classno','$SecID','$NoOfStud','$NoOfGroup')";
				$result = mysqli_query($mysqli,$sql);
				if ($result)
		  		{
		  			// Second: Insert  Groups on table GroupPerSem

		  		   $conn = db_connect();
		  		   $count=1;
		  		   while($count<=$NoOfGroup)
		  		   {
		  		   		$GName="&#1605;&#1580;&nbsp;".$count;
		  					$sql2 = "insert into GroupPerSem (AcadYNo,UniversityCode,CollegeCode,DeptNo,AcadDegreeId,SemNo,ClassNo,SecID,GId,GName) values ('$year','$uncode1','$CollegeCode1','$DeptNo','$AcadDeg','$Sem','$Classno','$SecID','$count','$GName')";
						$result2 = mysqli_query($mysqli,$sql2);
						if ($result2)
		  				{
							//echo("insert ".$GName);
						}
						else
						{
							//echo("not inserted..");
						}
						$count=$count+1;
				   }//end of while

					if($count>$NoOfGroup)
					{
						$msg="&#1578;&#1605; &#1575;&#1583;&#1582;&#1575;&#1604; &#1593;&#1583;&#1583; &#1575;&#1604;&#1591;&#1604;&#1575;&#1576; &#1576;&#1606;&#1580;&#1575;&#1581;";
						DisplaySuccHeader($msg);


						$NoOfStud="";
			 			$NoOfGroup="";

						DisplayRegStudentForm($uncode1,$CollegeCode1,$AcadDeg,$DeptNo,$Classno,$Sem,$year,$NoOfStud,$NoOfGroup,$f,$SecID);
					}

 				}
 				else
 				{
 					//Duplicated Data
 					//echo("Data already Existed..");
 						$msg="&#1578;&#1605; &#1575;&#1583;&#1582;&#1575;&#1604; &#1607;&#1584;&#1607; &#1575;&#1604;&#1576;&#1610;&#1575;&#1606;&#1575;&#1578; &#1605;&#1587;&#1576;&#1602;&#1575;";
 					Display_error_msg($msg,$path);


					$NoOfStud="";
			 		$NoOfGroup="";

					DisplayRegStudentForm($uncode1,$CollegeCode1,$AcadDeg,$DeptNo,$Classno,$Sem,$year,$NoOfStud,$NoOfGroup,$f,$SecID);
 				}

 			}//end of if
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