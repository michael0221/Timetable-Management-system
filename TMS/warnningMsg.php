<?php
session_start();
require_once('main.php');
$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
//$conn = db_connect();
$username=$_SESSION['username'];

//Page Title
Display_Title();
Background_Page();

if($username)
{
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
	//echo($Sem);
	//SubCode
	$op = $_GET['op']; //note: op refer to SubCode


	//SubName
	$SubName = $_GET['SubName'];

	//$year=$_GET['year'];
	$year=$_SESSION['year'];
	//echo($year);

	$flag=$_GET['flag'];
	$flag=intval($flag);

	$opl=$op."L"; //if we have SubLabHour
	//echo($opl);

	if(strcmp($op,"")!=0)
	{
		$href="DisplaySubject.php?op=$op&AcadDeg=$AcadDeg&Class=$Classno&Sem=$Sem&uncode=$uncode&CollegeCode=$CollegeCode&Dept=$DeptNo";

		Href2($href,$emheader);

		if($flag!==2)
		{

		//Before you delete you must check:
		//  if this Subject inserted on ManagingLec or not
		// then display warrning message to user
		// if user click on YES that means delete
		//(1)
		// check if Subject has LabHour

		$sql1="select count(SubCode) from ManagingLec where
				AcadYNo='$year' and
				UniversityCode='$uncode' and
				CollegeCode='$CollegeCode' and
				DeptNo='$DeptNo' and AcadDegreeId='$AcadDeg' and
				ClassNo='$Classno' and
				SemNo='$Sem' and SubCode='$op' ";
		$result1 = mysqli_query($mysqli,$sql1);
		$row1=mysqli_fetch_row($result1);
		//echo("no of row=".$row1[0]);
		//check lab
		$sql11="select count(SubCode) from ManagingLec where
						AcadYNo='$year' and
						UniversityCode='$uncode' and
						CollegeCode='$CollegeCode' and
						DeptNo='$DeptNo' and AcadDegreeId='$AcadDeg' and
						ClassNo='$Classno' and
						SemNo='$Sem' and SubCode='$op' ";
		$result11 = mysqli_query($mysqli,$sql11);
		$row11=mysqli_fetch_row($result11);
		if(($row1[0]==0)||($row11[0]==0))
		{

			$BName=GetSubjectName($CollegeCode,$uncode,$DeptNo,$AcadDeg,$Sem,$Classno,$op);
			$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
//			$conn = db_connect();
			$sql="delete from CollegeSubject where
							AcadYNo='$year' and
							UniversityCode='$uncode' and
							CollegeCode='$CollegeCode' and
							DeptNo='$DeptNo' and
							AcadDegreeId='$AcadDeg' and
							ClassNo='$Classno' and
							SemNo='$Sem' and
							SubName='$BName'";
			$result = mysqli_query($mysqli,$sql);
			if($result)
			{
				//echo("subject deleted..");
					$header=$BName." &nbsp;>> &nbsp;"."&#1578;&#1605;&#1578; &#1593;&#1605;&#1604;&#1610;&#1577; &#1575;&#1604;&#1581;&#1584;&#1601; &#1576;&#1606;&#1580;&#1575;&#1581;";
				echo("<div align='center'><font face='Traditional Arabic' color='yellow' size='4'>".$header."</font></div>");
			}
		}//end of if
		else
		if(($row1[0]>0)||($row11[0]>0))
		{
			//echo("error .. not deleted");
			//echo(" are you sure to delet..");

				$header="&#1604;&#1575; &#1610;&#1605;&#1603;&#1606; &#1575;&#1580;&#1585;&#1575;&#1569; &#1593;&#1605;&#1604;&#1610;&#1577; &#1575;&#1604;&#1581;&#1584;&#1601;";

				$BName=GetSubjectName($CollegeCode,$uncode,$DeptNo,$AcadDeg,$Sem,$Classno,$op);

				$display="&#1575;&#1604;&#1605;&#1575;&#1583;&#1577; :".$BName;

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
								echo($header);
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
							echo($display."</br>"." &nbsp;[ &#1578;&#1605;&#1578; &#1593;&#1605;&#1604;&#1610;&#1577; &#1575;&#1604;&#1580;&#1583;&#1608;&#1604;&#1577; &#1604;&#1607;&#1584;&#1607; &#1575;&#1604;&#1605;&#1575;&#1583;&#1577; &nbsp;]");
						?>
						</font>
						</b>
					</div>
					<div align="center">
					<b>
						<font face="Traditional Arabic" color="yellow" size="3">
						<?php
							echo("&#1607;&#1604; &#1578;&#1585;&#1610;&#1583; &#1581;&#1584;&#1601; &#1607;&#1584;&#1607; &#1575;&#1604;&#1605;&#1575;&#1583;&#1577; &#1605;&#1606; &#1575;&#1604;&#1580;&#1583;&#1608;&#1604;&#1577; &#1604;&#1610;&#1578;&#1605; &#1575;&#1604;&#1581;&#1584;&#1601; &#1575;&#1604;&#1603;&#1575;&#1605;&#1604; &#1604;&#1607;&#1575; ");
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
						echo("<a target='_self' href='warnningMsg.php?op=$op&AcadDeg=$AcadDeg&Class=$Classno&Sem=$Sem&uncode=$uncode&CollegeCode=$CollegeCode&Dept=$DeptNo&year=$year&flag=2&SubName=$SubName'>");
					?>
					 <img border="0" id="img2" src="Background/IMGYES.jpg" height="20" width="100" alt="&#1606;&#1593;&#1605;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 12; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #2F446F" fp-title="&#1606;&#1593;&#1605;">
					</a>
					</td>
				</tr>

				</table>
			</div>
		 <?php
		 }
	  }//end of if flag
	  else
	  if($flag==2)
	  {
		$opl=$op."L";
		$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
		//$conn = db_connect();
		$sql="delete from ManagingLec where
				AcadYNo='$year' and
				UniversityCode='$uncode' and
				CollegeCode='$CollegeCode' and
				DeptNo='$DeptNo' and
				AcadDegreeId='$AcadDeg' and
				ClassNo='$Classno' and
				SemNo='$Sem' and
				SubCode='$op' or SubCode='$opl'";
		$result = mysqli_query($mysqli,$sql);
		if($result)
		{
			$f=1;
		}

		if($f==1)
		{

			$opl=$op."L";
			$BName=GetSubjectName($CollegeCode,$uncode,$DeptNo,$AcadDeg,$Sem,$Classno,$op);
			
			$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
			//$conn = db_connect();
			$sql2="delete from CollegeSubject where
					AcadYNo='$year' and
					UniversityCode='$uncode' and
					CollegeCode='$CollegeCode' and
					DeptNo='$DeptNo' and
					AcadDegreeId='$AcadDeg' and
					ClassNo='$Classno' and
					SemNo='$Sem' and
					SubCode='$op' or SubCode='$opl'";
			$result2 = mysqli_query($mysqli,$sql2);
			if($result2)
			{
				$header=$BName." &nbsp;>> &nbsp;"."&#1578;&#1605;&#1578; &#1593;&#1605;&#1604;&#1610;&#1577; &#1575;&#1604;&#1581;&#1584;&#1601; &#1576;&#1606;&#1580;&#1575;&#1581;";
				echo("<div align='center'><font face='Traditional Arabic' color='yellow' size='4'>".$header."</font></div>");
			}
	    }
	  }
	}//end if(op!=0)
	
	
}//end of main if
else
{
	include("ErrorPage.php");
}

?>