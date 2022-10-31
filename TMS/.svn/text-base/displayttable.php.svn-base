<?php

session_start();
require_once('main.php');
//Page Title

Display_Title();


$conn = db_connect();

$username=$_SESSION['username'];

$f=$_GET['f'];
$f=intval($f);


if(($username)||($f==2))
{
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

	$SecID=$_GET['SecID'];
	$SecID=intval($SecID);

	$op=$_GET['op'];
	$op=intval($op);

	$f=$_GET['f'];
	$f=intval($f);
	
	$ProgType=$_GET['ProgType'];
	$ProgType=intval($ProgType);

	//if($frep!=1)

	$year=GetMaxYear();
	//$_SESSION['year'];


if((($uncode1>0)&&($CollegeCode1))&&(($AcadDeg>0)&&($DeptNo>0)))
{
 if($Sem>0)
 {
	//get College Time Slots
	
	$Timeslot=GetCollegeTimeSlot($uncode1,$CollegeCode1,$Sem,$year);
	
	//prepare Table's Header
	
	$HeaderSlot=HeaderTimeSlot($uncode1,$CollegeCode1,$Sem,$year);
	

?>
<table border="0" width="100%" id="table19">
	<tr>
		<td align="center"><span dir="rtl">
				<p align="center"><b><font face="Traditional Arabic" size="2">&#1576;&#1587;&#1605; &#1575;&#1604;&#1604;&#1607; &#1575;&#1604;&#1585;&#1581;&#1605;&#1606; &#1575;&#1604;&#1585;&#1581;&#1610;&#1605;</font></b>
			</span>
		</td>
	
	</tr>
	<tr>
	<td>
	<p align="center"><font face="Traditional Arabic" size="3"><b>
	<span dir="rtl">
	<?php
		echo(GetUniversityName($uncode1));
	?>
	</span></b></font></td>
	</tr>
	<tr>
	<td>
	<p align="center"><font face="Traditional Arabic" size="3"><b><span dir="rtl">
	<?php
		echo(GetCollegeName($uncode1,$CollegeCode1));
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
	<p align="center"><font face="Traditional Arabic" size="3"><b><span dir="rtl">
	<?php
		
		if($SecID>0)
		{
			//Get section name
			$SecName="-".GetSectionName($uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$SecID);
		}
		
		
		if($ProgType==2) //Master
		{
			echo(GetAcadProgType($uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$ProgType));
		}
		else
		{
			echo(GetClassName($uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem).$SecName);
		}
		
	?>
	</span></b></font></td>
	</tr>
	<tr>
		<td dir="rtl">
		 	<div align="center">
		 	<table border="2" width="100%" id="table20" dir="rtl" bordercolorlight="#000000" bordercolordark="#000000" cellspacing="0" cellpadding="0">
				<tr>
		 	<td bordercolor="#003366" align="center" width="1%" height="27" bordercolorlight="#000000" bordercolordark="#000000" bgcolor="#808080" dir="ltr">
		 	<?php
		 		echo("&nbsp;");
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
			
		PrepareReport($year,$mday,$uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem,$SecID);
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
		 		PrepareReport($year,$mday,$uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem,$SecID);
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
		 		PrepareReport($year,$mday,$uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem,$SecID);
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
		 		PrepareReport($year,$mday,$uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem,$SecID);
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
		 		PrepareReport($year,$mday,$uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem,$SecID);
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
		 		PrepareReport($year,$mday,$uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem,$SecID);
		 ?>
	</tr>

	</table>
	</div>
	</td>
	</tr>

</table>
</div>
<div align="right">&nbsp;

<?php
Diplay_RDate();
echo("</div>");
 }//if3
 }//if2
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