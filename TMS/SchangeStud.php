<?php
session_start();
require_once('main.php');

//$conn = db_connect();
$username=$_SESSION['username'];

//Page Title
Display_Title();
Background_Page();

if($username)
{
	include("header2.php");
	$AcadDeg = $_GET['AcadDeg'];
	$AcadDeg=intval($AcadDeg);

	$Classno = $_GET['Class'];
	$Classno=intval($Classno);

	$CollegeCode = $_GET['CollegeCode'];
	$CollegeCode=intval($CollegeCode);

	$uncode=$_GET['uncode'];
	$uncode=intval($uncode);

	$DeptNo = $_GET['Dept'];
	$DeptNo=intval($DeptNo);

	$Sem = $_GET['Sem'];
	$Sem=intval($Sem);
	
	$SecID= $_GET['SecID'];
	$SecID=intval($SecID);


	//College header
	Display_welcomeHeader_College($_SESSION['collegename']);

	$deptName=GetDeptName($uncode,$CollegeCode,$DeptNo);

	//Back
	$href="InsertNoStud.php?AcadDeg=$AcadDeg&uncode=$uncode&CollegeCode=$CollegeCode&Dept=$DeptNo&Class=$Classno&Sem=$Sem&SecID=$SecID";
		$header=$deptName."&nbsp;&gt;&nbsp;"."&#1578;&#1593;&#1583;&#1610;&#1604; &#1575;&#1593;&#1583;&#1575;&#1583; &#1575;&#1604;&#1591;&#1604;&#1575;&#1576;";

	$year=$_SESSION['year'];

	$header=$header." &#1604;&#1604;&#1593;&#1575;&#1605; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &nbsp;".$year;

	Href2($href,$header);

	$f = $_GET['f'];
	$f=intval($f);
	//echo($f);
	if($f!=2)
	{
		$flag=true;
		// create short variable names
		$year = $_POST['D1'];
		$NoOfStud = $_POST['T1'];
		$NoOfGroup=$_POST['T2'];

		//echo($year."</br>".$NoOfStud."</br>". $NoOfGroup."</br>secid=".$SecID);
		if (!filled_out($_POST))
		{
			echo("</br>");
				$msg='&#1601;&#1590;&#1604;&#1575; &#1602;&#1605; &#1576;&#1575;&#1583;&#1582;&#1575;&#1604; &#1580;&#1605;&#1610;&#1593; &#1575;&#1604;&#1576;&#1610;&#1575;&#1606;&#1575;&#1578;';
			Display_error_msg($msg,$path);
			$f=1;
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
			$f=1;
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
			$f=1;
			DisplayRegStudentForm($uncode1,$CollegeCode1,$AcadDeg,$DeptNo,$Classno,$Sem,$year,$NoOfStud,$NoOfGroup,$f,$SecID);
			$flag=false;
		}

		if($flag==true)
		{
		 //echo("valid data..");

			//DisplayRegStudentForm($uncode,$CollegeCode,$AcadDeg,$DeptNo,$Classno,$Sem,$year,$NoOfStud,$NoOfGroup,$flag);
			// this means Delete
			//(1) check if inserted on managingLec or not
			$Mang_query1 = "select * from ManagingLec where
			AcadYNo='$year' and
			SemNo='$Sem' and
			UniversityCode='$uncode' and
			CollegeCode='$CollegeCode' and
			DeptNo='$DeptNo' and
			AcadDegreeId='$AcadDeg' and
			ClassNo='$Classno' and SecID='$SecID'";
			$Mresult1=mysqli_query($mysqli,$Mang_query1);

    		$mrow1=mysqli_fetch_row($Mresult1);

    		//echo($mrow1);
    		if(mysqli_num_rows($Mresult1)>0)
    		{

    		?>
			<div>&nbsp;</div>
			<div align="center">
			<table border="0" width="100%">
			<tr>
			<td dir="rtl" bgcolor="#2F446F">
			<p align="right">
			<b>
				<font face="Traditional Arabic" color="yellow" size="4">
			<?php
				echo("&#1604;&#1575;&#1610;&#1605;&#1603;&#1606; &#1575;&#1580;&#1585;&#1575;&#1569; &#1593;&#1605;&#1604;&#1610;&#1577; &#1575;&#1604;&#1578;&#1593;&#1583;&#1610;&#1604;");
			?>
				</font>
			</b>
			</td>
			</tr>
			<tr>
			<td>
				<div align="center">
				<b>
				<font face="Traditional Arabic" color="white" size="3">
				<?php
					echo("&#1578;&#1605;&#1578; &#1593;&#1605;&#1604;&#1610;&#1577; &#1580;&#1583;&#1608;&#1604;&#1577; &#1576;&#1575;&#1604;&#1575;&#1593;&#1583;&#1575;&#1583; &#1575;&#1604;&#1605;&#1583;&#1582;&#1604;&#1577; &#1605;&#1587;&#1576;&#1602;&#1575;");
				?>
				</font>
				</b>
				</div>
				<div align="center">
				<b>
					<font face="Traditional Arabic" color="yellow" size="3">
					<?php
						echo("&#1607;&#1604; &#1578;&#1585;&#1610;&#1583; &#1581;&#1584;&#1601; &#1607;&#1584;&#1607; &#1575;&#1604;&#1580;&#1583;&#1608;&#1604;&#1577; &#1604;&#1578;&#1578;&#1605; &#1593;&#1605;&#1604;&#1610;&#1577; &#1575;&#1604;&#1578;&#1593;&#1583;&#1610;&#1604; &#1604;&#1604;&#1575;&#1593;&#1583;&#1575;&#1583;");
					?>
					</font>
				</b>
				</div>
		  	</td>
			</tr>
			<tr>
			<td>
				<p align="center">
				<?php
					echo("<a target='_self' href='SchangeStud.php?AcadDeg=$AcadDeg&uncode=$uncode&CollegeCode=$CollegeCode&Dept=$DeptNo&Class=$Classno&Sem=$Sem&f=2&year=$year&NoOfStud=$NoOfStud&NoOfGroup=$NoOfGroup&SecID=$SecID'>");
				?>
				 <img border="0" id="img2" src="Background/IMGYES.jpg" height="20" width="100" alt="&#1606;&#1593;&#1605;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 12; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #2F446F" fp-title="&#1606;&#1593;&#1605;">
				</a>
			</td>
			</tr>
			</table>
			</div>
			<?php
    		}//end of if flag
    		else
    		{
				//(1)delete from GroupPerSem
				$Mang_query2 = "delete from GroupPerSem where
							AcadYNo='$year' and
							SemNo='$Sem' and
							UniversityCode='$uncode' and
							CollegeCode='$CollegeCode' and
							DeptNo='$DeptNo' and
							AcadDegreeId='$AcadDeg' and
							ClassNo='$Classno' and SecID='$SecID'";
				$Mresult2=mysqli_query($mysqli,$Mang_query2);
				if($Mresult2)
				{
					//(2)delete from StudyPerSem
					$Mang_query2 = "delete from StudyPerSem where
							AcadYNo='$year' and
							SemNo='$Sem' and
							UniversityCode='$uncode' and
							CollegeCode='$CollegeCode' and
							DeptNo='$DeptNo' and
							AcadDegreeId='$AcadDeg' and
							ClassNo='$Classno' and SecID='$SecID'";
					$Mresult2=mysqli_query($mysqli,$Mang_query2);
				}
			//First: insert into table StudyPerSem

				$sql = "insert into StudyPerSem (AcadYNo,UniversityCode,CollegeCode,DeptNo,AcadDegreeId,SemNo,ClassNo,SecID,NoOfStud,NoOfGroup) values ('$year','$uncode','$CollegeCode','$DeptNo','$AcadDeg','$Sem','$Classno','$SecID','$NoOfStud','$NoOfGroup')";
			$result = mysqli_query($mysqli,$sql);
			if ($result)
		  	{
		  			// Second: Insert  Groups on table GroupPerSem

		  		   $conn = db_connect();
		  		   $count=1;
		  		   while($count<=$NoOfGroup)
		  		   {
		  		   		$GName="&#1605;&#1580;&nbsp;".$count;
		  					$sql2 = "insert into GroupPerSem (AcadYNo,UniversityCode,CollegeCode,DeptNo,AcadDegreeId,SemNo,ClassNo,SecID,GId,GName) values ('$year','$uncode','$CollegeCode','$DeptNo','$AcadDeg','$Sem','$Classno','$SecID','$count','$GName')";
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
						echo("<script>
								alert('successfully updated..');
									location='InsertNoStud.php?AcadDeg=$AcadDeg&uncode=$uncode&CollegeCode=$CollegeCode&Dept=$DeptNo&Class=$Classno&Sem=$Sem&SecID=$SecID';
						</script>");

					}

 			}
    	   }//end of else

		}// end if true
	  }
	  else
	  if($f==2)
		{
			//echo("here");
			// now you can delete
			//(1) delete from managingLec
			$conn = db_connect();
			$Mang_query1 = "delete from ManagingLec where
			AcadYNo='$year' and
			SemNo='$Sem' and
			UniversityCode='$uncode' and
			CollegeCode='$CollegeCode' and
			DeptNo='$DeptNo' and
			AcadDegreeId='$AcadDeg' and
			ClassNo='$Classno' and SecID='$SecID'";
			$Mresult1=mysqli_query($mysqli,$Mang_query1);
			if($Mresult1)
			{
				//(2)delete from GroupPerSem
				$Mang_query2 = "delete from GroupPerSem where
							AcadYNo='$year' and
							SemNo='$Sem' and
							UniversityCode='$uncode' and
							CollegeCode='$CollegeCode' and
							DeptNo='$DeptNo' and
							AcadDegreeId='$AcadDeg' and
							ClassNo='$Classno' and SecID='$SecID'";
				$Mresult2=mysqli_query($mysqli,$Mang_query2);
				if($Mresult2)
				{
					//(3)delete from StudyPerSem
					$Mang_query2 = "delete from StudyPerSem where
							AcadYNo='$year' and
							SemNo='$Sem' and
							UniversityCode='$uncode' and
							CollegeCode='$CollegeCode' and
							DeptNo='$DeptNo' and
							AcadDegreeId='$AcadDeg' and
							ClassNo='$Classno' and SecID='$SecID'";
					$Mresult2=mysqli_query($mysqli,$Mang_query2);
				}
			}

			$year = $_POST['D1'];
			$NoOfStud = $_POST['T1'];
			$NoOfGroup=$_POST['T2'];
			//First: insert into table StudyPerSem

				$sql = "insert into StudyPerSem (AcadYNo,UniversityCode,CollegeCode,DeptNo,AcadDegreeId,SemNo,ClassNo,SecID,NoOfStud,NoOfGroup) values ('$year','$uncode','$CollegeCode','$DeptNo','$AcadDeg','$Sem','$Classno','$SecID','$NoOfStud','$NoOfGroup')";
			$result = mysqli_query($mysqli,$sql);
			if ($result)
		  	{
		  			// Second: Insert  Groups on table GroupPerSem

		  		   $conn = db_connect();
		  		   $count=1;
		  		   while($count<=$NoOfGroup)
		  		   {
		  		   		$GName="&#1605;&#1580;&nbsp;".$count;
		  					$sql2 = "insert into GroupPerSem (AcadYNo,UniversityCode,CollegeCode,DeptNo,AcadDegreeId,SemNo,ClassNo,SecID,GId,GName) values ('$year','$uncode','$CollegeCode','$DeptNo','$AcadDeg','$Sem','$Classno','$SecID','$count','$GName')";
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

					}

 			}

		}

}
else
{
	include("ErrorPage.php");
}

?>