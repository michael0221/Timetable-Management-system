<?php
session_start();
require_once('main.php');
require_once('College_Method.php');

$username=$_SESSION['username'];
//Page Title
Display_Title();

if($username)
{
	//Get UniversityCode
	$uncode = $_GET['uncode'];
	$univCode=intval($uncode);

	//Get CollegeCode
	$CollegeCode = $_GET['CollegeCode'];
	$CollegeCode=intval($CollegeCode);

	$op=$_GET['op'];
	$op==intval($op);

	// Get CollegeName Session
	$CollName=$_SESSION['collegename'];

	//(1)select the Location Of College
	$sql = "select UnLoc from Colleges where UniversityCode='$univCode' and CollegeCode='$CollegeCode'";
	$result = mysql_query($sql);
	$row=mysql_fetch_row($result);

	$yyear=$_SESSION['year'];
	// select Building from usedBy Table on MaxYear
	$sql_query332="select BId,SubBId from usedBy where AcadYNo='$yyear' and BId='$op' and UniversityCode='$univCode' and CollegeCode='$CollegeCode'";
	$result332=mysql_query($sql_query332);

	//(2)Then select the Lecture Room at the Same Location
		?>
		<div align="center">
		<table border="0" width="100%" id="table12">
		<tr>
		   <td>
		   <div align="center">
		   <table border="2" width="100%" bordercolorlight="#000000" bordercolordark="#000000" id="table13" bordercolor="#003366">
		    <tr>
		    	<td bordercolor="#5A74A0" align="center" bgcolor="#C0C0C0" height="31" width="80%" bordercolorlight="#000000" bordercolordark="#000000" colspan="3">
		   	 		<div align="right">
		   	 		<font size="4" face="Traditional Arabic">
		   	 		<b><span lang="en-us">
		   	 		<?php
						//Display CollegeName
						echo($CollName."  >>  ");

						if($op==1)
						{
							echo("&#1575;&#1604;&#1602;&#1575;&#1593;&#1575;&#1578; &#1575;&#1604;&#1605;&#1578;&#1575;&#1581;&#1577; &#1604;&#1604;&#1593;&#1575;&#1605; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; ".$yyear);
						}
						else
						if($op==2)
						{
							echo("&#1575;&#1604;&#1605;&#1593;&#1575;&#1605;&#1604; &#1575;&#1604;&#1605;&#1578;&#1575;&#1581;&#1577; &#1604;&#1604;&#1593;&#1575;&#1605; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; ".$yyear);
						}
		   	 		?>
		   	 		</span></b></font></div>
		   	 	</td>
		   	</tr>

		   <tr>
	<?php
	if (mysql_num_rows($result332))
	{
	?>
		<td bordercolor="#5A74A0" align="center" bgcolor="#C0C0C0" height="31" width="14%" bordercolorlight="#000000" bordercolordark="#000000">
			&nbsp;</td>
		<td bordercolor="#5A74A0" align="center" bgcolor="#C0C0C0" height="31" width="44%" bordercolorlight="#000000" bordercolordark="#000000">
			<img border="0" id="img55" src="Depart_Files/capReport.jpg" height="27" width="135" alt="&#1575;&#1604;&#1587;&#1593;&#1577; &#1575;&#1604;&#1603;&#1604;&#1610;&#1577; &#1604;&#1604;&#1591;&#1604;&#1575;&#1576;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #000000; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #C0C0C0" fp-title="&#1575;&#1604;&#1587;&#1593;&#1577; &#1575;&#1604;&#1603;&#1604;&#1610;&#1577; &#1604;&#1604;&#1591;&#1604;&#1575;&#1576;">
		</td>
		<td width="35%" bordercolor="#5A74A0" align="center" bgcolor="#C0C0C0" height="31" bordercolorlight="#000000" bordercolordark="#000000">
			<p align="center" dir="rtl">
		<?php
			if($op==1)
			{

				echo('<img border="0" id="img54" src="Depart_Files/lectReport.jpg" height="27" width="135" alt="&#1575;&#1587;&#1605; &#1575;&#1604;&#1602;&#1575;&#1593;&#1577;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #000000; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #C0C0C0" fp-title="&#1575;&#1587;&#1605; &#1575;&#1604;&#1602;&#1575;&#1593;&#1577;">');
			}
			else
			if($op==2)
			{
				echo('<img border="0" id="img56" src="Depart_Files/labReport.jpg" height="27" width="135" alt="&#1575;&#1587;&#1605; &#1575;&#1604;&#1605;&#1593;&#1605;&#1604;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #000000; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #C0C0C0" fp-title="&#1575;&#1587;&#1605; &#1575;&#1604;&#1605;&#1593;&#1605;&#1604;">');

			}
			?>
		</td>
		</tr>
		<tr>
		<?php
		while($row332=mysql_fetch_row($result332))
		{
			$sql_query33="select SubBName,Capacity from SubBuildingSeminar where BId='$row332[0]' and SubBId='$row332[1]' and UniversityCode='$univCode' and UnLoc='$row[0]'";
			$result33=mysql_query($sql_query33);
			$row33=mysql_fetch_row($result33);
		?>

			<td bordercolor="#003366" align="center" width="14%" height="35" bordercolorlight="#000000" bordercolordark="#000000">
				 <font face="Traditional Arabic">
				 <b>
				 <?php
				 	echo("<a target='_self' href='DelBuilding.php?uncode=$univCode&CollegeCode=$CollegeCode&year=$yyear&BId=$row332[0]&SubBId=$row332[1]&flag=1'>&#1581;&#1584;&#1601;</a>");
				 ?>
				 </b>

				 </font>
			</td>

			<td bordercolor="#003366" align="center" width="44%" height="35" bordercolorlight="#000000" bordercolordark="#000000">

				 <font face="Times New Roman"><span lang="en-us">
				 <?php echo($row33[1]);?>
				 </span></font>
			</td>

			<td width="35%" bordercolor="#003366" align="center" height="35" bordercolorlight="#000000" bordercolordark="#000000">
				 <font face="Traditional Arabic"><span lang="en-us">
				  <?php echo($row33[0]);?>
				 </span></font>
			</td>
			</tr>
			<tr>
		<?php
		}//end while

	}//end if
	else
	{
	//not found
	?>
		<td bordercolor="white" align="center" width="80%" height="35" colspan="3" bgcolor="#5A74A0" bordercolorlight="#000000" bordercolordark="#000000">
		
		<?php
			if($op==1)
			{
					echo('<img border="0" id="img53" src="LectureRoom_files/button4A.jpg"  height="27" width="135" alt="&#1604;&#1605; &#1610;&#1578;&#1605; &#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1604;&#1602;&#1575;&#1593;&#1575;&#1578;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0; fp-orig: 0" fp-title="&#1604;&#1605; &#1610;&#1578;&#1605; &#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1604;&#1602;&#1575;&#1593;&#1575;&#1578;">');
		
			}//end of 
			else
			if($op==2)
			{
		
					echo('<img border="0" id="img53" src="LectureRoom_files/buttonNOLab.jpg"  height="27" width="135" alt="&#1604;&#1605; &#1610;&#1578;&#1605; &#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1604;&#1602;&#1575;&#1593;&#1575;&#1578;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0; fp-orig: 0" fp-title="&#1604;&#1605; &#1610;&#1578;&#1605; &#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1604;&#1602;&#1575;&#1593;&#1575;&#1578;">');
				
				//echo("áã íÊã ÊÍÏíÏ ÇáãÚÇãá");

			}
		?>
		</td>
		</tr>
	<?php
	}
}
else
{
   include("ErrorPage.php");
}


?>