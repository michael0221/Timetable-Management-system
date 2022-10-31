<?php

// This page to delete Lecture
session_start();
require_once('main.php');

//Page Title

Display_Title();

Background_Page();
$conn = db_connect();

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


	$BId=$_GET['BId'];
	$BId=intval($BId);

	$SubBId=$_GET['SubBId'];
	$SubBId=intval($SubBId);

	$GId=$_GET['GId'];
	$GId=intval($GId);

	$mday=$_GET['mday'];
	$mday=intval($mday);

	$avTime=$_GET['avTime'];

	$TeacherId=$_GET['TeacherId'];
	$TeacherId=intval($TeacherId);

	$SubCode=$_GET['SubCode'];

	$year=$_GET['year'];

	$flag=$_GET['flag'];
	$flag=intval($flag);
	
	$SecID = $_GET['SecID'];
	$SecID=intval($SecID);



if((($uncode1>0)&&($CollegeCode1))&&(($AcadDeg>0)&&($DeptNo>0)))
{

 	//echo("flag=".$flag);
 	if($flag==1)
 	{
 	// Check agin to delete
	// display Choice : Ok and Cancle
	?>
	<p>&nbsp;</p>
	<div align="center">
	<table border="2" width="60%">
	<tr>
	<td>
	<div align="center">
		<table border="0" width="99%" id="table21">
			<tr>
				<td dir="rtl" bgcolor="#2F446F" colspan="4">
				<p align="right"><b>
				<font face="Traditional Arabic" color="#FFFF00" size="4">&nbsp;</font><font face="Traditional Arabic" color="#FFFF00" size="5">
				&#1578;&#1571;&#1603;&#1610;&#1583; &#1593;&#1605;&#1604;&#1610;&#1577; &#1575;&#1604;&#1581;&#1584;&#1601;</font></b></td>
			</tr>
			<tr>
				<td dir="rtl" colspan="4">
				<div align="right">
				<font face="Traditional Arabic" color="white"><b>
				&#1607;&#1604; &#1578;&#1585;&#1610;&#1583; &#1601;&#1593;&#1604;&#1575; &#1581;&#1584;&#1601; &#1607;&#1584;&#1607;&nbsp; &#1575;&#1604;&#1578;&#1601;&#1575;&#1589;&#1610;&#1604;</b></font></div></td>
			</tr>
			<tr>
				<td dir="rtl" colspan="4" height="4">
				<div align="center">
				<font face="Traditional Arabic" color="white"><b>
				<?php
					$f=1;
					$Display=DeleteDetails($year,$mday,$avTime,$uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem,$TeacherId,$f,$SecID);
					echo($Display);
				?>
				</b></font>
				</div>
				</td>
			</tr>
			<tr>
				<td dir="rtl" width="25%">
				&nbsp;
				</td>

				<td  dir="rtl" bgcolor="#2F446F" bordercolor="#000000" width="23%">
				<p align="center">
				<?php

				echo("<a title='Delete Subject' href='deleteLec.php?AcadDeg=$AcadDeg&Class=$Classno&Sem=$Sem&uncode=$uncode1&CollegeCode=$CollegeCode1&Dept=$DeptNo&avTime=$avTime&mday=$mday&year=$year&BId=$BId&SubBId=$SubBId&GId=$GId&TeacherId=$TeacherId&SubCode=$SubCode&flag=2&SecID=$SecID' target='_self'  align='center' width='40%' height='40%'>");
				?>
				<img border="0" id="img2" src="Background/IMGYES.jpg" height="20" width="100" alt="&#1606;&#1593;&#1605;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 12; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #2F446F" fp-title="&#1606;&#1593;&#1605;">
				</a>
				</td>
				<td width="24%" dir="rtl">
				&nbsp;</td>
			</tr>
		</table>
	</div>
	</td>
	</tr>
	</table>
	</div>
	<?php
	}
	else
	if($flag==2)
	{
		// Now we can Delete the Details of Lecture
		//echo("AcadYNo=".$year."</br>"."MDays=".$mday."</br>"."MTimes=".$avTime."</br>"."BId=".$BId."</br>SubBId=".$SubBId."Un=".$uncode1."</br>"."Co=".$CollegeCode1."</br>".$DeptNo."dept</br>".$AcadDeg.$Sem.$Classno.$SubCode."</br>stupe=".$BId."gid=".$GId."teach=".$TeacherId);

		$conn = db_connect();
		$sql11 = "delete from ManagingLec where
			AcadYNo='$year' and
			MDays='$mday' and
			MTimes='$avTime' and
			BId='$BId' and
			SubBId='$SubBId' and
			UniversityCode='$uncode1' and
			CollegeCode='$CollegeCode1' and
			DeptNo='$DeptNo' and
			AcadDegreeId='$AcadDeg' and
			SemNo='$Sem' and
			ClassNo='$Classno' and
			SecID='$SecID' and 
			SubCode='$SubCode' and
			SubType='$BId' and
			GId='$GId' and
			TeacherId='$TeacherId'";
		$result=mysql_query($sql11);
		if($result)
		{
			//echo("data Successfully deleted..");
			$href="displaytable.php?AcadDeg=$AcadDeg&Class=$Classno&Sem=$Sem&uncode=$uncode1&CollegeCode=$CollegeCode1&Dept=$DeptNo&op=$op&s=$s&SecID=$SecID";

			$header="&#1578;&#1605;&#1578; &#1593;&#1605;&#1604;&#1610;&#1577; &#1575;&#1604;&#1581;&#1584;&#1601; &#1576;&#1606;&#1580;&#1575;&#1581;";

			Href2($href,$header);
		}

	}


 }
 else
  {
 	include("ErrorPage.php");
  }

 }//main if

 else
 {
 	include("ErrorPage.php");
 }
?>