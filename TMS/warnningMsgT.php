<?php
session_start();
require_once('main.php');
$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
//$conn = db_connect();
$username=$_SESSION['username'];

//Page Title from PageLayout.php
Display_Title();
Background_Page();

//-------------------------------------------------------------
// This page Used to Delete Teacher by displaying Warring Message: 

// [YES] : that means Delete Teacher and All his Managing Lectures 
// [NO]  : that means DO NO THINGs or Cancle

//--------------------------------------------------------------

if($username)
{

	$CollegeCode = $_GET['CollegeCode'];
	$CollegeCode=intval($CollegeCode);

	$uncode=$_GET['uncode'];
	$uncode=intval($uncode);

	$TNo = $_GET['TNo'];
	$TNo=intval($TNo);

	$TName = $_GET['TName'];

	$year=$_GET['year'];

	$flag=$_GET['flag'];
	$flag=intval($flag);
	
	if($TNo>0)
	{
		$href="DisplayTeachers.php?uncode=$uncode&CollegeCode=$CollegeCode";

		Href2($href,$emheader);

		//Prepare to Delete
		if($flag!==2)
		{

		//Before you delete you must check:
		//  if the teacher's Subject(s) inserted on ManagingLec or not
		// then display warrning message to user
		// if user click on YES that means delete
		//(1)

		$sql1="select count(TeacherId) from ManagingLec where
				AcadYNo='$year' and
				UniversityCode='$uncode' and
				CollegeCode='$CollegeCode' and
				TeacherId='$TNo'";

		$result1 = mysqli_query($mysqli,$sql1);
		$row1=mysqli_fetch_row($result1);
		if($row1[0]==0)
		{
			$TName=GetTeacherName($CollegeCode,$uncode,$TNo);
			$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
	//		$conn = db_connect();
			$sql="delete from Teachers where
							AcadYNo='$year' and
							TeacherNo='$TNo' and
							UniversityCode='$uncode' and
							CollegeCode='$CollegeCode'";
			$result = mysqli_query($mysqli,$sql);
			if($result)
			{
				//echo("subject deleted..");
					$header=$TName." &nbsp;>> &nbsp;"."&#1578;&#1605;&#1578; &#1593;&#1605;&#1604;&#1610;&#1577; &#1575;&#1604;&#1581;&#1584;&#1601; &#1576;&#1606;&#1580;&#1575;&#1581;";

				echo("<div align='center'><font face='Traditional Arabic' color='yellow' size='4'>".$header."</font></div>");
			}
		}//end of if
		else
		if($row1[0]>0)
		{
			//echo("error .. not deleted");
			//echo(" are you sure to delete ..");
			$TName=GetTeacherName($CollegeCode,$uncode,$TNo);

				$header="&#1604;&#1575; &#1610;&#1605;&#1603;&#1606; &#1575;&#1580;&#1585;&#1575;&#1569; &#1593;&#1605;&#1604;&#1610;&#1577; &#1575;&#1604;&#1581;&#1584;&#1601;";

				$display="&#1575;&#1604;&#1575;&#1587;&#1578;&#1575;&#1584; :".$TName;

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
							echo($display."</br>"." &nbsp;[ &#1578;&#1605; &#1578;&#1581;&#1583;&#1610;&#1583; &#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578; &#1604;&#1607;&#1584;&#1575; &#1575;&#1604;&#1575;&#1587;&#1578;&#1575;&#1584; &nbsp;]");
						?>
						</font>
						</b>
					</div>
					<div align="center">
					<b>
						<font face="Traditional Arabic" color="yellow" size="3">
						<?php
							echo("&#1607;&#1604; &#1578;&#1585;&#1610;&#1583; &#1581;&#1584;&#1601; &#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578; &#1605;&#1606; &#1575;&#1604;&#1580;&#1583;&#1608;&#1604; &#1604;&#1610;&#1578;&#1605; &#1581;&#1584;&#1601; &#1607;&#1584;&#1575; &#1575;&#1604;&#1575;&#1587;&#1578;&#1575;&#1584;");
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
						echo("<a target='_self' href='warnningMsgT.php?TNo=$TNo&TName=$TName&uncode=$uncode&CollegeCode=$CollegeCode&year=$year&flag=2'>");
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
		// when Accept the Delete operation 
		//[1]: Delete Teacher's Subject(s) from Managing Lectures Table
		
		$TName=GetTeacherName($CollegeCode,$uncode,$TNo);
		$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
		//$conn = db_connect();
		$sql="delete from ManagingLec where
				AcadYNo='$year' and
				TeacherId='$TNo' and
				UniversityCode='$uncode' and
				CollegeCode='$CollegeCode'";
		$result = mysqli_query($mysqli,$sql);
		if($result)
		{
			$f=1;
		}

		if($f==1)
		{
			//[2] Delete the Teacher Details from Teacher Table
			
			$BName=GetSubjectName($CollegeCode,$uncode,$DeptNo,$AcadDeg,$Sem,$Classno,$op);
			$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
			//$conn = db_connect();
			$sql2="delete from Teachers where
					AcadYNo='$year' and
					TeacherNo='$TNo' and
					UniversityCode='$uncode' and
					CollegeCode='$CollegeCode'";
			$result2 = mysqli_query($mysqli,$sql2);
			if($result2)
			{
					$header=$TName." &nbsp;>> &nbsp;"."&#1578;&#1605;&#1578; &#1593;&#1605;&#1604;&#1610;&#1577; &#1575;&#1604;&#1581;&#1584;&#1601; &#1576;&#1606;&#1580;&#1575;&#1581;";
				echo("<div align='center'><font face='Traditional Arabic' color='yellow' size='4'>".$header."</font></div>");
			}
	    }
	  }
	}
}
else
{
	include("ErrorPage.php");
}

?>