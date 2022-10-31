<?php
session_start();

require_once('main.php');

//Page Title

Display_Title();

$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
//$conn = db_connect();

$CollegeCode = $_GET['CollegeCode'];
$CollegeCode1=intval($CollegeCode);

$uncode=$_GET['uncode'];
$uncode1=intval($uncode);

//DeptNo

$DeptNo = $_GET['Dept'];
$DeptNo=intval($DeptNo);

$AcadDeg = $_GET['AcadDeg'];
$AcadDeg=intval($AcadDeg);

//echo($AcadDeg1);
$username=$_SESSION['username'];

if($username)
{
	if((($uncode1>0)&&($CollegeCode1>0))&&(($AcadDeg>0)&&($DeptNo>0)))
	{
		//

	   	//(1)get NO of Semester
	   	$sql3 = "select NoOfSemester,AcadDegreeName from AcadDegree where
	   	AcadDegreeId='$AcadDeg'";
	 	$result3 = mysqli_query($mysqli,$sql3);
	  	$row3=mysqli_fetch_row($result3);


	   	//(2) Get No of Yearsin the Depart
	   	$NoOFYear=ceil($row3[0]/2);

		
	   		$sql11 = "select ClassName,ClassNo from ClassYear where ClassNo<='$NoOFYear'";
	   		$result11 = mysqli_query($mysqli,$sql11);
			if (mysqli_num_rows($result11)>0 )
			{
			?>
			<div align="center">
			<table border="0" width="85%" id="table12">
			<tr>
			   <td>
			   <div align="center">
			   <table border="2" width="83%" bordercolorlight="#003366" bordercolordark="#003366" id="table13" bordercolor="#003366" cellpadding="5" cellspacing="5">
				<tr>
				 	<td bordercolor="#5A74A0" align="center" bgcolor="#5A74A0" height="31" width="94%" bordercolorlight="#003366" bordercolordark="#003366" colspan="2">

				 	<div align="right">
				 	<font size="4" face="Traditional Arabic" color="#FFFF00">

				 	<b>
				 	<?php
				 	$deptname=GetDeptName($uncode1,$CollegeCode1,$DeptNo);
					$msg=$deptname."&nbsp;- &nbsp;".$row3[1];
					echo($msg);

				 	//$msg=$row3[1];
					//DisplayHeader($msg);
				 	?>
				 	</b></font></div>
				 	</td>
				 </tr>
				  <tr>
					 <td bordercolor="#5A74A0" align="center" bgcolor="#5A74A0" height="31" width="53%" bordercolorlight="#003366" bordercolordark="#003366">
					 	<img border="0" id="img67" src="Depart_Files/ClassYear.jpg" height="27" width="135" alt="&#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609;"></td>
					 <td width="44%" bordercolor="#5A74A0" align="center" bgcolor="#5A74A0" height="31" bordercolorlight="#003366" bordercolordark="#003366">
							<p align="center" dir="rtl">
						<img border="0" id="img66" src="Depart_Files/AcadminYears.jpg" height="27" width="135" alt="&#1575;&#1604;&#1587;&#1606;&#1577; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1610;&#1577;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1575;&#1604;&#1587;&#1606;&#1577; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1610;&#1577;"></td>

				  </tr>
					<tr>

				  <?php
				  while($row11=mysqli_fetch_row($result11))
				  {
					$SemName="";
				  	$sql22 = "select SemName,SemNo from Semester where ClassNo='$row11[1]'";
				  	$result22 = mysqli_query($mysqli, $sql22);
				  	while($row22=mysqli_fetch_row($result22))
				  	{
				  		$SemName=$SemName."<a target='_blank' href='PrintSubject.php?AcadDeg=$AcadDeg&Class=$row11[1]&Sem=$row22[1]&uncode=$uncode1&CollegeCode=$CollegeCode1&Dept=$DeptNo' width='80' height='60'>"." <img src='print.gif' width='37' height='28' align='left' alt='&#1591;&#1576;&#1575;&#1593;&#1577; &#1575;&#1604;&#1605;&#1608;&#1575;&#1583;' >"."</a>"."<a href='subject.php?AcadDeg=$AcadDeg&Class=$row11[1]&Sem=$row22[1]&uncode=$uncode1&CollegeCode=$CollegeCode1&Dept=$DeptNo&value=1' align='center' title='&#1575;&#1590;&#1594;&#1591; &#1607;&#1606;&#1575; &#1604;&#1578;&#1587;&#1580;&#1610;&#1604; &#1575;&#1604;&#1605;&#1608;&#1575;&#1583;' target='_BLANK' width='80' height='60'>".$row22[0]."</a>"."</br>"."</br>";
				  	}//end while2
				  	?>
					 <td bordercolor="#003366" align="center" width="53%" height="35" title="&#1610;&#1605;&#1603;&#1606;&#1603; &#1575;&#1587;&#1578;&#1593;&#1585;&#1575;&#1590; &#1575;&#1604;&#1605;&#1608;&#1575;&#1583; &#1575;&#1604;&#1605;&#1602;&#1585;&#1585;&#1577; &#1593;&#1606;&#1583; &#1575;&#1604;&#1590;&#1594;&#1591; &#1593;&#1604;&#1609; &#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609;">
					 <font face="Traditional Arabic" color="#FFFFFF" size="3">
					 <b>
					 	<?php
					 		//color="#B0CCFF";
					 		echo($SemName);?>
					 		</b></font></td>
					 <td width="44%" bordercolor="#003366" align="center" height="35">
					 	<b>
					 	<font face="Traditional Arabic" color="#FFFFFF" size="3">
						<b>
						<?php echo($row11[0]);?>
						</b></font>
					 </td>
					 </tr>
					 <tr>
					<?php

					}//end while1
			//}//end of if
			//else
			//{
			?>
			<!--
			<td bordercolor="#003366" align="center" width="95%" height="35" colspan="2" bgcolor="#5A74A0">
				<img border="0" id="img68" src="Depart_Files/NotInsert.jpg" height="27" width="135" alt="&#1604;&#1605; &#1610;&#1578;&#1605; &#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1604;&#1576;&#1610;&#1575;&#1606;&#1575;&#1578;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1604;&#1605; &#1610;&#1578;&#1605; &#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1604;&#1576;&#1610;&#1575;&#1606;&#1575;&#1578;">
			</td>-->
			<?php
			//}
			?>
			</tr>
			</table>
			</div>
			</td>

			</tr>

			</table>
			</div>
			<?php
		 }//end of if

		//else
		//{
			// Master Semester
		?>
		<!--
		<div align="center">
		<table border="0" width="85%" id="table12"  >
		<tr>
		   <td>
		   <div align="center">
		   <table border="2" width="96%" bordercolorlight="#003366" bordercolordark="#003366" id="table2" bordercolor="#003366" cellpadding="5" cellspacing="5">
			<tr>
			 	<td bordercolor="#5A74A0" align="center" bgcolor="#5A74A0" height="31" width="94%" bordercolorlight="#003366" bordercolordark="#003366">

			 	<div align="right">
			 	<font size="4" face="Traditional Arabic" color="#FFFF00">

			 	<b>
			 	Master </b></font></div>
			 	</td>
			</tr>

			<tr>
				 <td bordercolor="#5A74A0" align="center" bgcolor="#5A74A0" height="31" width="53%" bordercolorlight="#003366" bordercolordark="#003366">
				 	<img border="0" id="img67" src="Depart_Files/ClassYear.jpg" height="27" width="135" alt="&#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609;" align="right"></td>

				</tr>

					<tr>

				 <td bordercolor="#003366" align="center" width="53%" height="35">
				 	<font color="#FFFFFF">First semester </font>
				 	</td>

				 	</tr>

				 	<td bordercolor="#003366" align="center" width="95%" height="35" bgcolor="#5A74A0">
				 	<img border="0" id="img68" src="Depart_Files/NotInsert.jpg" height="27" width="135" alt="&#1604;&#1605; &#1610;&#1578;&#1605; &#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1604;&#1576;&#1610;&#1575;&#1606;&#1575;&#1578;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1604;&#1605; &#1610;&#1578;&#1605; &#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1604;&#1576;&#1610;&#1575;&#1606;&#1575;&#1578;">
				 	</td>
					</tr>
				</table>
				</div>
					</td>

					</tr>

					</table>
		</div>
		-->
		<?php
		//}//end of else

		$CollegeCode = $_GET['CollegeCode'];
		$CollegeCode1=intval($CollegeCode);

		$uncode=$_GET['uncode'];
		$uncode1=intval($uncode);

		$AcadDeg = $_GET['AcadDeg'];
		$AcadDeg=intval($AcadDeg);

		$DeptNo = $_GET['Dept'];
		$DeptNo=intval($DeptNo);

		$Classno = $_GET['Class'];
		$Classno=intval($Classno);

		$Sem = $_GET['Sem'];
		$Sem=intval($Sem);


		if((($uncode1>0)&&($CollegeCode1>0))&&(($AcadDeg>0)&&($DeptNo>0)))
			{
			 if(($Classno>0)&&($Sem>0))
				{
					//include("Subject.php");
				}
			}
			else
			{
				include("ErrorPage.php");
			}
	}//end of if2
	else
	{
		include("ErrorPage.php");
	}

}//end of if (username)
else
{
	include("ErrorPage.php");
}
?>