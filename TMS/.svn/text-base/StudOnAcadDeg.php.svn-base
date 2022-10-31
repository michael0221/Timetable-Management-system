<?php
session_start();

require_once('main.php');

//Page Title

Display_Title();

$conn = db_connect();

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

	   	//(1)get NO of Semester

	   	$sql3 = "select NoOfSemester,AcadDegreeName from AcadDegree where
	   	AcadDegreeId='$AcadDeg'";
	 	$result3 = mysql_query($sql3);
	  	$row3=mysql_fetch_row($result3);
		//echo($row3[0]);

	   	//(2) Get No of Yearsin the Depart

	   	$NoOFYear=$row3[0]/2;
		//echo("years=".$NoOFYear);

		//***********
		// Important Note:
		//we suppose that more than 6 belong to Master course..

		
	   		$sql11 = "select ClassName,ClassNo from ClassYear where ClassNo<='$NoOFYear'";
	   		$result11 = mysql_query($sql11);
			if (mysql_num_rows($result11)>0 )
			{
			?>
			</br>
			<div align="center">
			<table border="0" width="100%" id="table12">
			<tr>
			   <td>
			   <div align="center">
			   <table border="2" width="76%" bordercolorlight="#003366" bordercolordark="#003366" id="table13" bordercolor="#003366" cellpadding="4" cellspacing="4" >
				  <tr>
					 <td bordercolor="#5A74A0" align="center" bgcolor="#5A74A0"  width="82%" bordercolorlight="#003366" bordercolordark="#003366" colspan="2">
					 	<?php
				 	$msg=$row3[1];
					DisplayHeader($msg);
				 	?>
					</td>

				  </tr>
				  <tr>
					 <td bordercolor="#5A74A0" align="center" bgcolor="#5A74A0" height="31" width="58%" bordercolorlight="#003366" bordercolordark="#003366">
					 	<img border="0" id="img67" src="Depart_Files/ClassYear.jpg" height="27" width="135" alt="&#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609;"></td>
					 <td bordercolor="#5A74A0" align="center" bgcolor="#5A74A0" height="31" width="34%" bordercolorlight="#003366" bordercolordark="#003366">
						<img border="0" id="img66" src="Depart_Files/AcadminYears.jpg" height="27" width="135" alt="&#1575;&#1604;&#1587;&#1606;&#1577; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1610;&#1577;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1575;&#1604;&#1587;&#1606;&#1577; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1610;&#1577;"></td>

				  </tr>
					<tr>

				  <?php
				  while($row11=mysql_fetch_row($result11))
				  {
					$SemName="";
				  	$sql22 = "select SemName,SemNo from Semester where ClassNo='$row11[1]'";
				  	$result22 = mysql_query($sql22);
				  	while($row22=mysql_fetch_row($result22))
				  	{
				  		//here

						$SemName=$SemName."<a href='InsertNoStud.php?AcadDeg=$AcadDeg&Class=$row11[1]&Sem=$row22[1]&uncode=$uncode1&CollegeCode=$CollegeCode1&Dept=$DeptNo'>"."<font color='#B0CCFF'>".$row22[0]."</font>"."</a>"."</br>"."</br>";
				  	}//end while2
				  	?>
					 <td bordercolor="#003366" align="center" width="58%" height="37" title="&#1610;&#1605;&#1603;&#1606;&#1603; &#1578;&#1581;&#1583;&#1610;&#1583; &#1575;&#1593;&#1583;&#1575;&#1583; &#1575;&#1604;&#1591;&#1604;&#1575;&#1576; &#1593;&#1606;&#1583; &#1575;&#1604;&#1590;&#1594;&#1591; &#1593;&#1604;&#1609; &#1575;&#1609; &#1601;&#1589;&#1604; &#1583;&#1585;&#1575;&#1587;&#1609; ">
					 <font face="Traditional Arabic"  size="3">
					 <b align="right">
					 	<?php
					 		//color="#B0CCFF";
					 		echo($SemName);?>
					 		</b></font>
					 </td>
					 <td width="34%" bordercolor="#003366" align="center" height="37">
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