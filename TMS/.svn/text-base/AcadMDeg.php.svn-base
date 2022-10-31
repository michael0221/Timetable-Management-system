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
			   <table border="2" width="100%" bordercolorlight="#003366" bordercolordark="#003366" id="table13" bordercolor="#003366" cellpadding="5" cellspacing="5">
				  <tr>
					 <td bordercolor="#5A74A0" align="center" bgcolor="#5A74A0" height="31" width="91%" bordercolorlight="#003366" bordercolordark="#003366" colspan="2">
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
					 <td bordercolor="#5A74A0" align="center" bgcolor="#5A74A0" height="31" width="66%" bordercolorlight="#003366" bordercolordark="#003366">
					 	<img border="0" id="img67" src="Depart_Files/ClassYear.jpg" height="27" width="135" alt="&#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609;"></td>
					 <td bordercolor="#5A74A0" align="center" bgcolor="#5A74A0" height="31" width="28%" bordercolorlight="#003366" bordercolordark="#003366">
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
				  		//$SemName=$SemName."<font color='#FFFFFF'>".$row22[0]."</font>"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."<font color='#FFFF00'><a href='DeptManage.php?AcadDeg=$AcadDeg&Class=$row11[1]&Sem=$row22[1]&uncode=$uncode1&CollegeCode=$CollegeCode1&Dept=$DeptNo&op=2'>"."&#1580;&#1583;&#1608;&#1604;&#1577; &#1575;&#1604;&#1605;&#1593;&#1575;&#1605;&#1604;"."</a>"."&nbsp;&nbsp;&nbsp;&nbsp;"."<a href='DeptManage.php?AcadDeg=$AcadDeg&Class=$row11[1]&Sem=$row22[1]&uncode=$uncode1&CollegeCode=$CollegeCode1&Dept=$DeptNo&op=1'>"."&#1580;&#1583;&#1608;&#1604;&#1577; &#1575;&#1604;&#1602;&#1575;&#1593;&#1575;&#1578;"."</a></font>"."</br>"."</br>";
						$SemName=$SemName."<font color='#FFFFFF'>".$row22[0]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."&#1580;&#1583;&#1608;&#1604;&#1577; &#1575;&#1604;&#1602;&#1575;&#1593;&#1575;&#1578;&nbsp;&nbsp;"."</font>"."<font color='#FFFF00'>"."<a href='DeptManage.php?AcadDeg=$AcadDeg&Class=$row11[1]&Sem=$row22[1]&uncode=$uncode1&CollegeCode=$CollegeCode1&Dept=$DeptNo&op=1&s=1'>"."[ &nbsp;&nbsp;&#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578;&nbsp;&nbsp;]"."</a>"."&nbsp;&nbsp;&nbsp&nbsp;"."<a href='DeptManage.php?AcadDeg=$AcadDeg&Class=$row11[1]&Sem=$row22[1]&uncode=$uncode1&CollegeCode=$CollegeCode1&Dept=$DeptNo&op=1&s=2'>"."[&nbsp;&nbsp;&#1578;&#1605;&#1575;&#1585;&#1610;&#1606;&nbsp;&nbsp;]"."</a></font>"."&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;"."<font color='#FFFFFF'>"."<a href='DeptManage.php?AcadDeg=$AcadDeg&Class=$row11[1]&Sem=$row22[1]&uncode=$uncode1&CollegeCode=$CollegeCode1&Dept=$DeptNo&op=2'>"."&#1580;&#1583;&#1608;&#1604;&#1577; &#1575;&#1604;&#1605;&#1593;&#1575;&#1605;&#1604;"."</a>"."</font>"."</br>"."</br>";
				  	}//end while2
				  	?>
					 <td bordercolor="#003366" align="center" width="70%" height="35" title="&#1610;&#1605;&#1603;&#1606;&#1603; &#1575;&#1580;&#1585;&#1575;&#1569; &#1575;&#1604;&#1580;&#1583;&#1608;&#1604;&#1577; &#1604;&#1603;&#1604; &#1601;&#1589;&#1604; &#1583;&#1585;&#1575;&#1587;&#1609;">
					 <font face="Traditional Arabic"  size="3">
					 <b align="right">
					 	<?php
					 		//color="#B0CCFF";
					 		echo($SemName);?>
					 		</b></font>
					 </td>
					 <td width="20%" bordercolor="#003366" align="center" height="35">
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