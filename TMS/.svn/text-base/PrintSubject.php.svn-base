<?php
session_start();
require_once('main.php');
//Page Title

Display_Title();


$username=$_SESSION['username'];
if($username)
{
	$conn = db_connect();
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

	$year=$_SESSION['year'];
	//echo($year);
	//check value

	if((($uncode1>0)&&($CollegeCode1>0))&&(($AcadDeg>0)&&($DeptNo>0)))
	{
		if(($Classno>0)&&($Sem>0))
		 {
		 	//Get Dept Name
				$sql2 = "select DeptName from Departments where
						UniversityCode='$uncode1' and
						CollegeCode='$CollegeCode1' and
						DeptNo='$DeptNo' and AcadDegreeId='$AcadDeg'";
				$result2 = mysql_query($sql2);
				$row2=mysql_fetch_row($result2);

			//Get Acadmic Name
				$sql3 = "select AcadDegreeName from AcadDegree where
				   	AcadDegreeId='$AcadDeg'";
				$result3 = mysql_query($sql3);
				$row3=mysql_fetch_row($result3);

			//Display ClassName & SemName
				$sql4 = "select ClassName,SemName from Semester,ClassYear
				where Semester.ClassNo='$Classno' and
				ClassYear.ClassNo=Semester.ClassNo and
				Semester.SemNo='$Sem'";
				$result4 = mysql_query($sql4);
				$row4=mysql_fetch_row($result4);

		 ?>
		 <div align="center">
			<table border="0" width="94%" id="table14">
				<tr>
				 <td>
					 <div align="center">
					<table border="2" width="98%" bordercolorlight="#000000" bordercolordark="#000000" id="table15" bordercolor="#003366" cellpadding="5" cellspacing="5">
					<tr>
						<td bordercolor="#C0C0C0" align="center" bgcolor="#C0C0C0" height="31" width="94%" bordercolorlight="#000000" bordercolordark="#000000" colspan="5">

				 		<div align="right">
				 		<font size="4" face="Traditional Arabic">

				 		<b>
				 		<?php echo($row2[0]."&nbsp;&nbsp;"."-"." &nbsp;&nbsp;".$row4[0]);?>
				 		</b></font></div>
				 		</td>
				 	</tr>
				  	<tr>
				 		<td bordercolor="#5A74A0" align="center" bgcolor="#C0C0C0" height="31" width="94%" bordercolorlight="#000000" bordercolordark="#000000" colspan="5">
						<font size="4" face="Traditional Arabic">
				 		<p align="right">
				 		<b><?php echo($row3[0]);?></b></font></td>
				 	</tr>

					<tr>
				 		<td bordercolor="#5A74A0" align="center" bgcolor="#C0C0C0" height="31" width="94%" bordercolorlight="#000000" bordercolordark="#000000" colspan="5">
						<font size="4" face="Traditional Arabic">
				 		<p align="right"><b>
				 		<?php echo("&#1605;&#1608;&#1575;&#1583;&nbsp;".$row4[1]."&nbsp;&#1604;&#1604;&#1593;&#1575;&#1605; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609;&nbsp;"."<span dir='rtl'>".$year."</span>");?></b></font></td>
				 	</tr>
					<tr>
		 <?php
		 	$sql="select SubCode,SubName,SubHour,SubTHour from CollegeSubject where
								AcadYNo='$year' and
								UniversityCode='$uncode' and
								CollegeCode='$CollegeCode' and
								DeptNo='$DeptNo' and AcadDegreeId='$AcadDeg' and
								ClassNo='$Classno' and
								SemNo='$Sem' and SubType='1'";
			$result = mysql_query($sql);
			if (mysql_num_rows($result)>0 )
			{
			?>
				<td bordercolor="#5A74A0" align="center" bgcolor="#C0C0C0" height="31" width="18%" bordercolorlight="#000000" bordercolordark="#000000">
					<img border="0" id="img73" src="Colleges-PAGE/butTOFLabHours.jpg" height="27" width="135" alt="&#1587;&#1575;&#1593;&#1575;&#1578; &#1575;&#1604;&#1593;&#1605;&#1604;&#1609;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #000000; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #C0C0C0" fp-title="&#1587;&#1575;&#1593;&#1575;&#1578; &#1575;&#1604;&#1593;&#1605;&#1604;&#1609;"></td>

				<td bordercolor="#5A74A0" align="center" bgcolor="#C0C0C0" height="31" width="18%" bordercolorlight="#000000" bordercolordark="#000000">
					<img border="0" id="img72" src="Colleges-PAGE/NoOfHourH.jpg" height="27" width="135" alt="&#1587;&#1575;&#1593;&#1575;&#1578; &#1575;&#1604;&#1578;&#1605;&#1575;&#1585;&#1610;&#1606;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #000000; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #C0C0C0" fp-title="&#1587;&#1575;&#1593;&#1575;&#1578; &#1575;&#1604;&#1578;&#1605;&#1575;&#1585;&#1610;&#1606;" align="center"></td>

				<td bordercolor="#5A74A0" align="center" bgcolor="#C0C0C0" height="31" width="20%" bordercolorlight="#000000" bordercolordark="#000000">
					<img border="0" id="img71" src="Colleges-PAGE/NoOfLecHours.jpg" height="27" width="135" alt="&#1587;&#1575;&#1593;&#1575;&#1578; &#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1577;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #000000; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #C0C0C0" fp-title="&#1587;&#1575;&#1593;&#1575;&#1578; &#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1577;"></td>

				<td bordercolor="#5A74A0" align="center" bgcolor="#C0C0C0" height="31" width="30%" bordercolorlight="#000000" bordercolordark="#000000">
					<img border="0" id="img69" src="Depart_Files/subbname.jpg" height="27" width="135" alt="&#1575;&#1587;&#1605; &#1575;&#1604;&#1605;&#1575;&#1583;&#1577;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #000000; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #C0C0C0" fp-title="&#1575;&#1587;&#1605; &#1575;&#1604;&#1605;&#1575;&#1583;&#1577;">
				</td>

				<td width="19%" bordercolor="#5A74A0" align="center" bgcolor="#C0C0C0" height="31" bordercolorlight="#000000" bordercolordark="#000000">
					<p align="center" dir="rtl">
					<img border="0" id="img70" src="Depart_Files/subbcode.jpg" height="27" width="135" alt="&#1603;&#1608;&#1583; &#1575;&#1604;&#1605;&#1575;&#1583;&#1577;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #000000; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #C0C0C0" fp-title="&#1603;&#1608;&#1583; &#1575;&#1604;&#1605;&#1575;&#1583;&#1577;">
				</td>

				</tr>
				<tr>
			<?php
				while($row=mysql_fetch_row($result))
	   	  		 {
				?>
					<td bordercolor="#5A74A0" align="center" height="31" width="18%" bordercolorlight="#000000" bordercolordark="#000000">
					<?php
						//no of lab hours
						//Now Get the LabHour
						$SubName=$row[1];
						$sqls="select SubHour from CollegeSubject where
								AcadYNo='$year' and
								UniversityCode='$uncode' and
								CollegeCode='$CollegeCode' and
								DeptNo='$DeptNo' and AcadDegreeId='$AcadDeg' and
								ClassNo='$Classno' and
								SemNo='$Sem' and SubType='2' and
								SubName='$SubName'";
						$results = mysql_query($sqls);
						$rows=mysql_fetch_row($results);
						if($rows)
							echo($rows[0]);
						else
							echo("0");
					?>
					</td>
					<td bordercolor="#5A74A0" align="center" height="31" width="18%" bordercolorlight="#000000" bordercolordark="#000000">
						<?php echo($row[3]);?>
					</td>
					<td bordercolor="#5A74A0" align="center" height="31" width="20%" bordercolorlight="#000000" bordercolordark="#000000">
						<?php echo($row[2]);?>
					</td>
					<td bordercolor="#5A74A0" align="center" height="31" width="30%" bordercolorlight="#000000" bordercolordark="#000000">
						<font size="3" face="Traditional Arabic"><span dir="rtl">
							<?php echo($row[1]);?>
						</span></font>
					</td>
					<td width="19%" bordercolor="#5A74A0" align="center" height="31" bordercolorlight="#000000" bordercolordark="#000000">
					<font size="3" face="Traditional Arabic">
						<?php echo($row[0]);?>
					</font>
					</td>
					</tr>
					<tr>
				<?php
	   	  		 }
	   	  	}//end of if
			else
			{
			?>
			<td bordercolor="#003366" align="center" width="95%" height="35" colspan="5" bgcolor="#5A74A0">
				<img border="0" id="img68" src="Depart_Files/NotInsert.jpg" height="27" width="135" alt="&#1604;&#1605; &#1610;&#1578;&#1605; &#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1604;&#1576;&#1610;&#1575;&#1606;&#1575;&#1578;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0; fp-orig: 0" fp-title="&#1604;&#1605; &#1610;&#1578;&#1605; &#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1604;&#1576;&#1610;&#1575;&#1606;&#1575;&#1578;">
			</td>
			<?php
			}
		 }

	}//end of if
	else
	{
		include("ErrorPage.php");
	}

}//end of if

else
{
		include("ErrorPage.php");
}
?>