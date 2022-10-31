<?php

session_start();
require_once('main.php');

//Page Title
Display_Title();

$username=$_SESSION['username'];
if($username)
{
	$conn = db_connect();

	// Get Values
	$CollegeCode = $_GET['CollegeCode'];
	$CollegeCode1=intval($CollegeCode);

	$uncode=$_GET['uncode'];
	$uncode1=intval($uncode);

	//check value

	if(($uncode1>0)&&($CollegeCode1>0))
	{

		//Get Depts

		$sql2 = "select distinct(DeptName),DeptNo from Departments where UniversityCode='$uncode1' and CollegeCode='$CollegeCode1' group by DeptName order by DeptNo";
		$result2 = mysql_query($sql2);
		?>
		 
		 <div align="center">
			<table border="0" width="100%" id="table1" height="219">
			   <tr>
				  <td height="55">&nbsp;
				  <div align="center">
				  <table border="2" width="80%" bordercolorlight="#003366" bordercolordark="#003366" id="table2" bordercolor="#003366" cellpadding="5" cellspacing="5">
					<tr>
						<td bordercolor="#003366" align="right" bgcolor="#5A74A0" height="31" colspan="4" bordercolorlight="#003366" bordercolordark="#003366">
					    <b>
						<font color="#FFFFFF" size="5" face="Traditional Arabic">&#1578;&#1581;&#1583;&#1610;&#1583; &#1575;&#1593;&#1583;&#1575;&#1583; &#1575;&#1604;&#1591;&#1604;&#1575;&#1576;</font></b></td>
					</tr>
					<tr>
						<td bordercolor="#003366" align="right" bgcolor="#5A74A0" height="31" colspan="4" bordercolorlight="#003366" bordercolordark="#003366">
					    <img border="0" id="img44" src="Depart_Files/button30.jpg" height="27" width="135" alt="&#1575;&#1604;&#1575;&#1602;&#1587;&#1575;&#1605;" fp-style="fp-btn: Embossed Capsule 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 20; fp-font-color-normal: #FFFFFF; fp-font-color-hover: #FFFFFF; fp-font-color-press: #FFFFFF; fp-bgcolor: #5A74A0" fp-title="&#1575;&#1604;&#1575;&#1602;&#1587;&#1575;&#1605;" onmouseover="FP_swapImg(1,0,/*id*/'img44',/*url*/'Depart_Files/button31.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img44',/*url*/'Depart_Files/button30.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img44',/*url*/'Depart_Files/button32.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img44',/*url*/'Depart_Files/button31.jpg')"></td>
						
					</tr>
				<tr>

				<?php

				if (mysql_num_rows($result2)>0 )
				 {
				?>
				  <td bordercolor="#5A74A0" align="center" bgcolor="#5A74A0" height="31" width="19%" bordercolorlight="#003366" bordercolordark="#003366">
				  	<img border="0" id="img48" src="ConfigDept/button35.jpg" height="27" width="135" alt="&#1593;&#1583;&#1583; &#1575;&#1604;&#1601;&#1589;&#1608;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1610;&#1577;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1593;&#1583;&#1583; &#1575;&#1604;&#1601;&#1589;&#1608;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1610;&#1577;">
				  </td>

				  <td bordercolor="#5A74A0" align="center" bgcolor="#5A74A0" height="31" width="30%" bordercolorlight="#003366" bordercolordark="#003366">
				   	<p dir="rtl">
					<img border="0" id="img27" src="Depart_Files/button35.jpg" height="27" width="135" alt="&#1575;&#1604;&#1576;&#1585;&#1606;&#1575;&#1605;&#1580; &#1575;&#1604;&#1575;&#1603;&#1575;&#1583;&#1610;&#1605;&#1609;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1575;&#1604;&#1576;&#1585;&#1606;&#1575;&#1605;&#1580; &#1575;&#1604;&#1575;&#1603;&#1575;&#1583;&#1610;&#1605;&#1609;">
				  </td>

				  <td bordercolor="#5A74A0" align="center" bgcolor="#5A74A0" height="31" width="27%" bordercolorlight="#003366" bordercolordark="#003366">
					  <img border="0" id="img45" src="Depart_Files/button34.jpg" height="27" width="135" alt="&#1575;&#1587;&#1605; &#1575;&#1604;&#1602;&#1587;&#1605;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1575;&#1587;&#1605; &#1575;&#1604;&#1602;&#1587;&#1605;">
				  </td>
				  <td width="19%" bordercolor="#5A74A0" align="center" bgcolor="#5A74A0" height="31" bordercolorlight="#003366" bordercolordark="#003366">
					  <p align="center" dir="rtl">
					 <img border="0" id="img25" src="Depart_Files/button33.jpg" height="27" width="135" alt="&#1585;&#1602;&#1605; &#1575;&#1604;&#1602;&#1587;&#1605;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1585;&#1602;&#1605; &#1575;&#1604;&#1602;&#1587;&#1605;">
				  </td>
				  </tr>
				  <tr>
				 <?php
				  	while($row2=mysql_fetch_row($result2))
				  	{
					  $sql33 = "select NoOfSemester from Departments,AcadDegree where UniversityCode='$uncode1' and CollegeCode='$CollegeCode1' and Departments.DeptName='$row2[0]' and Departments.AcadDegreeId=AcadDegree.AcadDegreeId order by DeptNo";

					  $result33 = mysql_query($sql33);

					  if (mysql_num_rows($result33)>0 )
					  {
					  ?>
					  <td bordercolor="#003366" align="center" width="19%" height="35">
					  <?php
					  	while($row33=mysql_fetch_row($result33))
					  	{
					  	?>
							<font face="Traditional Arabic" color="#FFFFFF" size="3">
					  		<?php
								echo($row33[0]."</br>");
					  		?>
					  		</font>
					  	<?php
					  	}
					  }
					  else
					  {
					  	echo("");
					  }
					  	?>
					  </td>

					  <?php
					  	$sql3 = "select AcadDegreeName,Departments.AcadDegreeId,Departments.DeptNo  from Departments,AcadDegree where UniversityCode='$uncode1' and CollegeCode='$CollegeCode1' and Departments.DeptName='$row2[0]' and Departments.AcadDegreeId=AcadDegree.AcadDegreeId order by DeptNo";
					  $result3 = mysql_query($sql3);

					  if (mysql_num_rows($result3)>0 )
					  {
					  ?>
					  <td bordercolor="#003366" align="center" width="30%" height="35">
					  <?php
					  	while($row3=mysql_fetch_row($result3))
					  	{
					  	?>
			 					<font face="Traditional Arabic" color="#B0CCFF" size="3">
								<a href="ConfigNewYear.php?AcadDeg=<?php echo($row3[1]); ?>&uncode=<?php echo($uncode1);?>&CollegeCode=<?php echo($CollegeCode1);?>&Dept=<?php echo($row3[2]); ?>&value=2#AcadDeg">
								<b>
								<?php
									echo($row3[0]."</br>");
								?>
			 					</b></a></font>
			 			<?php
			 			}
			 		   }
			 		   else
			 		   {
			 		   		echo("");
			 		   }
						?>
					  </td>
					  <td bordercolor="#003366" align="center" width="27%" height="35">
						<font face="Traditional Arabic" color="#FFFFFF" size="3">
						<?php echo($row2[0]);?>
						</font>

					  </td>

					  <td width="19%" bordercolor="#003366" align="center" height="35">
						<font face="Times New Roman" color="#FFFFFF" size="3">
						<?php
						$Count=$Count+1;
						//echo($row2[1]);
						echo($Count);
						?>
						</font>
					  </td>
					  </tr>
					  <tr>
	 				  <?php
					  }//end of while
					} //end of if
				 else
				 	{
					?>
					<td bordercolor="#003366" align="center" width="10%" bgcolor="#5A74A0">
					&nbsp;<span lang="ar-sa">&nbsp;&nbsp; </span>&nbsp;&nbsp;
					
					<a href="InsertDept.php?CollegeCode=<?php echo($CollegeCode1);?>&uncode=<?php echo($uncode1);?>">    
					    <img border="0" id="img49" src="Depart_Files/addNewDepart.jpg" height="27" width="135" alt="&#1573;&#1590;&#1594;&#1591; &#1607;&#1606;&#1575; &#1604;&#1573;&#1590;&#1575;&#1601;&#1577; &#1575;&#1604;&#1575;&#1602;&#1587;&#1575;&#1605;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 11; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1573;&#1590;&#1594;&#1591; &#1607;&#1606;&#1575; &#1604;&#1573;&#1590;&#1575;&#1601;&#1577; &#1575;&#1604;&#1575;&#1602;&#1587;&#1575;&#1605;"><img border="0" src="College_files/Add.gif" width="15" height="15" align="top"></a>
					
					</td>
					<td bordercolor="#003366" align="center" width="63%" bgcolor="#5A74A0" colspan="3">
					<img border="0" id="img42" src="Depart_Files/button36.jpg" height="40" width="200" alt="&#1604;&#1605; &#1610;&#1578;&#1605; &#1573;&#1583;&#1582;&#1575;&#1604; &#1571;&#1609; &#1602;&#1587;&#1605;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1604;&#1605; &#1610;&#1578;&#1605; &#1573;&#1583;&#1582;&#1575;&#1604; &#1571;&#1609; &#1602;&#1587;&#1605;"></td>
					</tr>
					<?php
					}
					?>
				</table>
				</tr>
				</table></div>
			<?php

		$CollegeCode = $_GET['CollegeCode'];
		$CollegeCode1=intval($CollegeCode);

		$uncode=$_GET['uncode'];
		$uncode1=intval($uncode);

		$AcadDeg = $_GET['AcadDeg'];
		$AcadDeg1=intval($AcadDeg);
		?>
		<a name='#AcadDeg'>
			<?php
			if(($uncode1>0)&&($CollegeCode1>0)&&($AcadDeg1>0))
				{
					//here
					include("StudOnAcadDeg.php");
				}
				?>
		</a>
		<?php
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