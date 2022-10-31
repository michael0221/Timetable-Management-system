<?php
session_start();
require_once('main.php');
$conn = db_connect();
$username=$_SESSION['username'];

//Page Title
Display_Title();
Background_Page();

?>
<!--<body background="pic.gif">-->

<?php
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
	
	$SecID= $_GET['SecID'];
	$SecID=intval($SecID);
	
	//echo("sec=".$SecID);

	//SubCode
	$op = $_GET['op'];

	$year=$_SESSION['year'];


	?>
	<div align="center">

		<table border="2" width="40%" id="table1" style="border-color: #5A74A0">
		<tr>

			<td bordercolor="#003366" align="center" bgcolor="#5A74A0" height="31" width="40%" bordercolorlight="#003366" bordercolordark="#003366" style="border-color: #003366" colspan="3">
			<img border="0" id="img59" src="InsertDept/SUBYear2.jpg" height="40" width="200" alt="&#1575;&#1604;&#1605;&#1608;&#1575;&#1583; &#1575;&#1604;&#1605;&#1602;&#1585;&#1585;&#1577; &#1604;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0; fp-orig: 0" fp-title="&#1575;&#1604;&#1605;&#1608;&#1575;&#1583; &#1575;&#1604;&#1605;&#1602;&#1585;&#1585;&#1577; &#1604;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609;" align="right"></td>
		</tr>

		<tr>
			<td bordercolor="#003366" align="center" bgcolor="#5A74A0" height="31" width="40%" bordercolorlight="#003366" bordercolordark="#003366" style="border-color: #003366" colspan="3">
			<p dir="rtl">
			<img border="0" id="img58" src="Depart_Files/SubName.jpg" height="25" width="125" alt="&#1575;&#1587;&#1605; &#1575;&#1604;&#1605;&#1575;&#1583;&#1577;" fp-style="fp-btn: Simple Arrow 4; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 14; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1575;&#1587;&#1605; &#1575;&#1604;&#1605;&#1575;&#1583;&#1577;" align="right">
		</td>
		</tr>
		<tr>
		<?php

		$sql="select distinct(SubName),SubCode from CollegeSubject where
					AcadYNo='$year' and
					UniversityCode='$uncode' and
					CollegeCode='$CollegeCode' and
					DeptNo='$DeptNo' and AcadDegreeId='$AcadDeg' and
					ClassNo='$Classno' and SecID='$SecID' and
					SemNo='$Sem' and SubType='1'";
		$result = mysql_query($sql);
		if (mysql_num_rows($result)>0 )
		{
		 while($row=mysql_fetch_row($result))
	   	  {
	   	  	//note: op refer to SubCode
	   	  	$SubName=$row[0];
			?>
			<td bordercolor="#003366" align="center" width="2%" bordercolorlight="#5A74A0" bordercolordark="#5A74A0" style="border-color: #003366" bgcolor="#003366" height="30">
				<!--<a href="DisplaySubject.php?op=<?php echo($row[1]);?>&AcadDeg=<?php echo($AcadDeg);?>&Class=<?php echo($Classno);?>&Sem=<?php echo($Sem);?>&uncode=<?php echo($uncode);?>&CollegeCode=<?php echo($CollegeCode);?>&Dept=<?php echo($DeptNo);?>">-->
				<a target="_self" href="warnningMsg.php?op=<?php echo($row[1]);?>&AcadDeg=<?php echo($AcadDeg);?>&Class=<?php echo($Classno);?>&Sem=<?php echo($Sem);?>&uncode=<?php echo($uncode);?>&CollegeCode=<?php echo($CollegeCode);?>&Dept=<?php echo($DeptNo);?>&SecID=<?php echo($SecID);?>&year=<?php echo($year);?>">
				<img border="0" alt="&#1581;&#1584;&#1601;" src="Background/delete.bmp" width="34" height="26">
				</a>
			</td>
			<td bordercolor="#003366" align="center" width="2%" bordercolorlight="#5A74A0" bordercolordark="#5A74A0" style="border-color: #003366" bgcolor="#003366" height="30">
				<p align="center">
					<a  target="_parent" href="subject.php?subcode=<?php echo($row[1]);?>&AcadDeg=<?php echo($AcadDeg);?>&Class=<?php echo($Classno);?>&Sem=<?php echo($Sem);?>&uncode=<?php echo($uncode);?>&CollegeCode=<?php echo($CollegeCode);?>&Dept=<?php echo($DeptNo);?>&SecID=<?php echo($SecID);?>&year=<?php echo($year);?>&update=1">
					<img border="0" src="Background/update.bmp" width="34" height="26">
				</a>
		  </td>
		  <td bordercolor="#003366" align="right" width="36%" bordercolorlight="#5A74A0" bordercolordark="#5A74A0" style="border-color: #003366" height="30">
				<b>
				<font color="#FFFFFF" face="Traditional Arabic" size="2">
				<?php
	   	  		echo("<span dir='RTL'>".$row[0]."</span>");
	   	  		?>
				</font></b>
			</td>
			</tr>
			<tr>
		 <?php
	   	  }//end of while
		}//end of if
		else
		{//there is no data to show
		?>
			<td bordercolor="#003366" align="center" width="40%" bordercolorlight="#5A74A0" bordercolordark="#5A74A0" style="border-color: #003366" bgcolor="#5A74A0" height="30" colspan="3">
			 <img border="0" id="img60" src="Depart_Files/SubNotIns.jpg" height="24" width="119" alt="&#1604;&#1605; &#1610;&#1578;&#1605; &#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1604;&#1605;&#1608;&#1575;&#1583;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 12; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1604;&#1605; &#1610;&#1578;&#1605; &#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1604;&#1605;&#1608;&#1575;&#1583;"></td>
			</tr>
		<?php
		}
		?>
	</table>
	</div>
<?php
}
else
{
	include("ErrorPage.php");
}
?><!--</body>-->