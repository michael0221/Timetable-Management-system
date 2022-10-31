<?php

require_once('main.php');
//Page Title

Display_Title();

$conn = db_connect();

//get variables

$CollegeCode = $_GET['CollegeCode'];
$CollegeCode1=intval($CollegeCode);

$uncode=$_GET['uncode'];
$uncode1=intval($uncode);

$value=$_GET['value'];
$value=intval($value);

//once click on print flagcolor=1
$flagcolor=$_GET['fc'];
$flagcolor=intval($flagcolor);

if($flagcolor==1)
{
	$f=2;
	
	$year=$_GET['year'];
	
	$Sem=$_GET['Sem'];
	
	$Select=$_GET['Select'];
}

if((($uncode1>0)&&($CollegeCode1))&&($value>0))
{
	//get College Time Slots
	
	$Timeslot=GetCollegeTimeSlot($uncode1,$CollegeCode1,$Sem,$year);

	//Prepare Table's Header
	
	$HeaderSlot=HeaderTimeSlot($uncode1,$CollegeCode1,$Sem,$year);


?>
<div align="center">
<table border="0" width="100%" id="table19">
	<tr>
	<td align="center">
	<p align="center"><b><font face="Traditional Arabic" size="2">&#1576;&#1587;&#1605; &#1575;&#1604;&#1604;&#1607; &#1575;&#1604;&#1585;&#1581;&#1605;&#1606; &#1575;&#1604;&#1585;&#1581;&#1610;&#1605;</font></b></td>
	</tr>
	<tr>
	<td>
	<p align="center"><font face="Traditional Arabic" size="3"><b>
	<span lang="en-us">
	<?php
		echo(GetUniversityName($uncode1));
	?>
	</span></b></font></td>
	</tr>
	<tr>
	<td>
	<p align="center"><font face="Traditional Arabic" size="3"><b><span dir="rtl">
	<?php
	 if($Sem==1)
			echo("&#1580;&#1583;&#1608;&#1604; &#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1575;&#1604;&#1575;&#1608;&#1604; &#1604;&#1604;&#1593;&#1575;&#1605; &nbsp;"."<span dir='ltr'>".$year."</span>");
	 else
	 		echo("&#1580;&#1583;&#1608;&#1604; &#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1575;&#1604;&#1579;&#1575;&#1606;&#1609; &#1604;&#1604;&#1593;&#1575;&#1605; &nbsp;"."<span dir='ltr'>".$year."</span>");
	?>
	</span></b></font></td>
	</tr>
	<tr>
	<td>
	<p align="center"><font face="Traditional Arabic" size="3"><b>
	<?php
		if($value==1)
		{
			$TeacherName=GetTeacherName($CollegeCode1,$uncode1,$Select);
			$flagcolor=1;
		?>
		<div align="center">
			<table border="0" width="39%" id="table21">
				<tr>
					<td width="52%" align="center">
					<p align="right"><font face="Traditional Arabic" size="3"><b><?php echo($TeacherName);?></b></font></td>
					<td width="1%" align="center">
					<font face="Times New Roman" size="4"><b>:</b></font></td>
					<td width="43%" align="left"><font face="Traditional Arabic" size="3"><b><span lang="ar-sa">
						<?php echo("&#1575;&#1604;&#1575;&#1587;&#1578;&#1575;&#1584;");?>
					</span></b></font>
					</td>
				</tr>
			</table>
		</div>
		<?php
		}
		else
		if($value==2) //Lecture
		{
			$BId=1;
			$LectureName=GetBuildingName($CollegeCode1,$uncode1,$BId,$Select);
		?>
		<div align="center">
			<table border="0" width="39%" id="table21">
				<tr>
					<td width="51%" align="center">
					<p align="right"><font face="Traditional Arabic" size="3"><b><?php echo($LectureName);?></b></font></td>
					<td width="2%" align="center">
					<font face="Times New Roman" size="4"><b>:</b></font></td>
					<td width="43%" align="left">
					<font face="Traditional Arabic" size="3"><b><span lang="ar-sa">
						<?php echo("&#1575;&#1604;&#1602;&#1575;&#1593;&#1577;");?>
					</span></b></font>
					</td>
				</tr>
			</table>
		</div>
		<?php
		}
		else
		if($value==3) //Lab Lecture
		{
			$BId=2;
			$LabName=GetBuildingName($CollegeCode1,$uncode1,$BId,$Select);
		?>
		<div align="center">
			<table border="0" width="39%" id="table21">
				<tr>
					<td width="51%" align="center">
					<p align="right"><font face="Traditional Arabic" size="3"><b><?php echo($LabName);?></b></font></td>
					<td width="1%" align="center">
					<font face="Times New Roman" size="4"><b>:</b></font></td>
					<td width="42%" align="left">
					<font face="Traditional Arabic" size="3"><b><span lang="ar-sa">
						<?php echo("&#1575;&#1604;&#1605;&#1593;&#1605;&#1604;");?>
					</span></b></font>
					</td>
				</tr>
			</table>
		</div>
		<?php
		}
	?>
	</b></font></td>
	</tr>
	<tr>
		<td dir="rtl">
		 	<div align="center">
		 	<table border="2" width="100%" id="table20" dir="rtl" bordercolorlight="#000000" bordercolordark="#000000" cellspacing="0" cellpadding="0">
			<tr>
		 		<td bordercolor="#003366" align="center" width="1%" height="27" bordercolorlight="#000000" bordercolordark="#000000" bgcolor="#808080" dir="ltr">
		 			<?php
		 			if($flagcolor==0)
		 			{
		 				?><a href="FinDisplay.php?uncode=<?php echo($uncode1);?>&CollegeCode=<?php echo($CollegeCode1);?>&value=<?php echo($value);?>&year=<?php echo($year);?>&Select=<?php echo($Select);?>&Sem=<?php echo($Sem);?>&fc=1" target="_self"><img border="0" src="print.gif" width="32" height="29" alt="&#1575;&#1590;&#1594;&#1591; &#1607;&#1606;&#1575; &#1604;&#1591;&#1576;&#1575;&#1593;&#1577; &#1575;&#1604;&#1580;&#1583;&#1608;&#1604;"/>
		 			</a>
		 			<?php
		 			}
		 			else
		 			{
		 				echo("&nbsp;");
		 			}
		 			?>
		 		</td>
			<td bordercolor="#003366" align="center" width="4%" height="27" bordercolorlight="#000000" bordercolordark="#000000" bgcolor="#808080" dir="ltr">
		 	<b><span lang="en-us"><font size="2"><?php echo("<span dir='rtl'>".$HeaderSlot[0]."</span>");?></font></span></b></td>
		 	
		 	<td bordercolor="#003366" align="center" width="4%" height="27" bordercolorlight="#000000" bordercolordark="#000000" bgcolor="#808080" dir="ltr">
		 	<b><span lang="en-us"><font size="2"><?php echo("<span dir='rtl'>".$HeaderSlot[1]."</span>");?></font></span></b></td>
		 	
		 	<td bordercolor="#003366" align="center" width="4%" height="27" bordercolorlight="#000000" bordercolordark="#000000" bgcolor="#808080" dir="ltr">
		 	<b><span lang="en-us"><font size="2"><?php echo("<span dir='rtl'>".$HeaderSlot[2]."</span>");?></font></span></b></td>
		 	
		 	<td bordercolor="#003366" align="center" width="4%" height="27" bordercolorlight="#000000" bordercolordark="#000000" bgcolor="#808080" dir="ltr">
		 	<b><span lang="en-us"><font size="2"><?php echo("<span dir='rtl'>".$HeaderSlot[3]."</span>");?></font></span></b></td>
		 	
		 	<td bordercolor="#003366" align="center" width="4%" height="27" bordercolorlight="#000000" bordercolordark="#000000" bgcolor="#808080" dir="ltr">
		 	<b><span lang="en-us"> <font size="2"> <?php echo("<span dir='rtl'>".$HeaderSlot[4]."</span>");?></font></span></b></td>
		 
			<td bordercolor="#003366" align="center" width="4%" height="27" bordercolorlight="#000000" bordercolordark="#000000" bgcolor="#808080" dir="ltr">
		 	<b><span lang="en-us"><font size="2"><?php echo("<span dir='rtl'>".$HeaderSlot[5]."</span>");?></font></span></b></td>
		 
			<td bordercolor="#003366" align="center" width="4%" height="27" bordercolorlight="#000000" bordercolordark="#000000" bgcolor="#808080" dir="ltr">
		 	<b><span lang="en-us"><font size="2"><?php echo("<span dir='rtl'>".$HeaderSlot[6]."</span>");?></font></span></b></td>
		 	
		 	
		 	<td bordercolor="#003366" align="center" width="4%" height="27" bordercolorlight="#000000" bordercolordark="#000000" bgcolor="#808080" dir="ltr">
		 	<b><span lang="en-us"><font size="2"><?php echo("<span dir='rtl'>".$HeaderSlot[7]."</span>");?></font></span></b></td>
		 
			<td bordercolor="#003366" align="center" width="4%" height="27" bordercolorlight="#000000" bordercolordark="#000000" bgcolor="#808080" dir="ltr">
		 	<b><span lang="en-us"><font size="2"><?php echo("<span dir='rtl'>".$HeaderSlot[8]."</span>");?></font></span></b></td>
		 	
		 	<td bordercolor="#003366" align="center" width="4%" height="27" bordercolorlight="#000000" bordercolordark="#000000" bgcolor="#808080" dir="ltr">
		 	<b><span lang="en-us"><font size="2"><?php echo("<span dir='rtl'>".$HeaderSlot[9]."</span>");?></font></span></b></td>
		 
			<td bordercolor="#003366" align="center" width="4%" height="27" bordercolorlight="#000000" bordercolordark="#000000" bgcolor="#808080" dir="ltr">
		 	<b><span lang="en-us"><font size="2"><?php echo("<span dir='rtl'>".$HeaderSlot[10]."</span>");?></font></span></b></td>
		 
			<td bordercolor="#003366" align="center" width="4%" height="27" bordercolorlight="#000000" bordercolordark="#000000" bgcolor="#808080" dir="ltr">
		 	<b><span lang="en-us"><font size="2"><?php echo("<span dir='rtl'>".$HeaderSlot[11]."</span>");?></font></span></b></td>
		 	
		 	<!--Continue ..-->
		 	
		 	<td bordercolor="#003366" align="center" width="4%" height="27" bordercolorlight="#000000" bordercolordark="#000000" bgcolor="#808080" dir="ltr">
		 	<b><span lang="en-us"><font size="2"><?php echo("<span dir='rtl'>".$HeaderSlot[12]."</span>");?></font></span></b></td>
		 	
		 	<td bordercolor="#003366" align="center" width="4%" height="27" bordercolorlight="#000000" bordercolordark="#000000" bgcolor="#808080" dir="ltr">
		 	<b><span lang="en-us"><font size="2"><?php echo("<span dir='rtl'>".$HeaderSlot[13]."</span>");?></font></span></b></td>
		 	
		 	<td bordercolor="#003366" align="center" width="4%" height="27" bordercolorlight="#000000" bordercolordark="#000000" bgcolor="#808080" dir="ltr">
		 	<b><span lang="en-us"><font size="2"><?php echo("<span dir='rtl'>".$HeaderSlot[14]."</span>");?></font></span></b></td>
		 	
		 	<td bordercolor="#003366" align="center" width="4%" height="27" bordercolorlight="#000000" bordercolordark="#000000" bgcolor="#808080" dir="ltr">
		 	<b><span lang="en-us"><font size="2"><?php echo("<span dir='rtl'>".$HeaderSlot[15]."</span>");?></font></span></b></td>
		 	
		 	<td bordercolor="#003366" align="center" width="4%" height="27" bordercolorlight="#000000" bordercolordark="#000000" bgcolor="#808080" dir="ltr">
		 	<b><span lang="en-us"><font size="2"><?php echo("<span dir='rtl'>".$HeaderSlot[16]."</span>");?></font></span></b></td>
		 	
		 	<td bordercolor="#003366" align="center" width="4%" height="27" bordercolorlight="#000000" bordercolordark="#000000" bgcolor="#808080" dir="ltr">
		 	<b><span lang="en-us"><font size="2"><?php echo("<span dir='rtl'>".$HeaderSlot[17]."</span>");?></font></span></b></td>
		 	
		 	<td bordercolor="#003366" align="center" width="4%" height="27" bordercolorlight="#000000" bordercolordark="#000000" bgcolor="#808080" dir="ltr">
		 	<b><span lang="en-us"><font size="2"><?php echo("<span dir='rtl'>".$HeaderSlot[18]."</span>");?></font></span></b></td>
		 	
		 	<td bordercolor="#003366" align="center" width="4%" height="27" bordercolorlight="#000000" bordercolordark="#000000" bgcolor="#808080" dir="ltr">
		 	<b><span lang="en-us"><font size="2"><?php echo("<span dir='rtl'>".$HeaderSlot[19]."</span>");?></font></span></b></td>
		 	
		 	<td bordercolor="#003366" align="center" width="4%" height="27" bordercolorlight="#000000" bordercolordark="#000000" bgcolor="#808080" dir="ltr">
		 	<b><span lang="en-us"><font size="2"><?php echo("<span dir='rtl'>".$HeaderSlot[20]."</span>");?></font></span></b></td>
		 	
		 	<td bordercolor="#003366" align="center" width="4%" height="27" bordercolorlight="#000000" bordercolordark="#000000" bgcolor="#808080" dir="ltr">
		 	<b><span lang="en-us"><font size="2"><?php echo("<span dir='rtl'>".$HeaderSlot[21]."</span>");?></font></span></b></td>
		 	
		 	<td bordercolor="#003366" align="center" width="4%" height="27" bordercolorlight="#000000" bordercolordark="#000000" bgcolor="#808080" dir="ltr">
		 	<b><span lang="en-us"><font size="2"><?php echo("<span dir='rtl'>".$HeaderSlot[22]."</span>");?></font></span></b></td>
		 	
		 	<td bordercolor="#003366" align="center" width="4%" height="27" bordercolorlight="#000000" bordercolordark="#000000" bgcolor="#808080" dir="ltr">
		 	<b><span lang="en-us"><font size="2"><?php echo("<span dir='rtl'>".$HeaderSlot[23]."</span>");?></font></span></b></td>

		</tr>
			
			<!--Saterday-->
			<tr>
		 		<td bordercolor="#003366" align="center" width="1%" height="26" bordercolorlight="#000000" bordercolordark="#000000" dir="rtl">
		 			<b><font face="Traditional Arabic">
		 				&#1575;&#1604;&#1587;&#1576;&#1578;
		 			</font></b>
			 	</td>
			 	
				<?php
				//Display Detail
		
				$mday=1;
							
				PrepareTeacherReport($year,$mday,$Sem,$Select,$value,$uncode1,$CollegeCode1,$flagcolor);
				?>
			</tr>

			<!-- Sunday -->
			<tr>
		 		<td bordercolor="#003366" align="center" width="1%" height="26" bordercolorlight="#000000" bordercolordark="#000000" dir="rtl">
			
					<b><font face="Traditional Arabic">
						&#1575;&#1604;&#1575;&#1581;&#1583;
					</font></b>
		 		</td>
		 		<?php
		 		//Display Detail
		 		$mday=2;
		 		PrepareTeacherReport($year,$mday,$Sem,$Select,$value,$uncode1,$CollegeCode1,$flagcolor);

		 		?>
			</tr>

			<!-- Monday -->
			<tr>
		 		<td bordercolor="#003366" align="center" width="1%" height="26" bordercolorlight="#000000" bordercolordark="#000000" dir="rtl">
					<b><font face="Traditional Arabic">
						&#1575;&#1604;&#1575;&#1579;&#1606;&#1610;&#1606;
					</font></b>
		 		</td>
		 		<?php
		 		//Display Detail
		 		$mday=3;
		 		PrepareTeacherReport($year,$mday,$Sem,$Select,$value,$uncode1,$CollegeCode1,$flagcolor);
		 		?>
			</tr>

			<!-- Tuseday -->
			<tr>
		 		<td bordercolor="#003366" align="center" width="1%" height="26" bordercolorlight="#000000" bordercolordark="#000000" dir="rtl">
					<b><font face="Traditional Arabic">
						&#1575;&#1604;&#1579;&#1604;&#1575;&#1579;&#1575;&#1569;
					</font></b>
		 		</td>
		 		<?php
		 		//Display Detail
		 		$mday=4;
		 		PrepareTeacherReport($year,$mday,$Sem,$Select,$value,$uncode1,$CollegeCode1,$flagcolor);
		 		?>
			</tr>

			<!-- Wendesday-->
			<tr>
		 		<td bordercolor="#003366" align="center" width="1%" height="26" bordercolorlight="#000000" bordercolordark="#000000" dir="rtl">
					<b><font face="Traditional Arabic">
						&#1575;&#1604;&#1575;&#1585;&#1576;&#1593;&#1575;&#1569;
					</font></b>
		 		</td>
		 		<?php
		 		//Display Detail
		 		$mday=5;
		 		PrepareTeacherReport($year,$mday,$Sem,$Select,$value,$uncode1,$CollegeCode1,$flagcolor);
		 		?>
			</tr>

			<!-- Thrusday-->		 		
			<tr>
		 		<td bordercolor="#003366" align="center" width="1%" height="26" bordercolorlight="#000000" bordercolordark="#000000" dir="rtl">
					<b><font face="Traditional Arabic">
						&#1575;&#1604;&#1582;&#1605;&#1610;&#1587;
					</font></b>
		 		</td>
		 		<?php
		 		//Display Detail
		 		$mday=6;
		 		PrepareTeacherReport($year,$mday,$Sem,$Select,$value,$uncode1,$CollegeCode1,$flagcolor);
		 		?>
			</tr>
</table>
</div>
</div>
<div align="right">&nbsp;

<?php
Diplay_RDate();
echo("</div>");

}//main if
else
{
	include("ErrorPage.php");
}

?>