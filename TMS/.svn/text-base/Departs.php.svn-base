<?php

session_start();

require_once('main.php');


//Page Title

Display_Title();

Background_Page();

$id = $_GET['id'];
$value=intval($id);

$uncode1 = $_GET['uncode'];//universityCode
$uncode11=intval($uncode1);

$CollegeCode1 = $_GET['CollegeCode'];// CollegeCode
$CollegeCode11=intval($CollegeCode1);
$Count=0;
if (strcmp($_SESSION['username'],"")!=0)
{

  if($value==1)
{
	if(($uncode11>0)&&($CollegeCode11>0))
		{
			$conn = db_connect();

			 $sql1 = "select CollegeName from Colleges where UniversityCode='$uncode11' and CollegeCode='$CollegeCode11'";
			 $result1 = mysql_query($sql1);


			 //
		   $sql2 = "select distinct(DeptName),DeptNo from Departments,AcadDegree where UniversityCode='$uncode11' and CollegeCode='$CollegeCode11' and Departments.AcadDegreeId=AcadDegree.AcadDegreeId group by DeptName order by DeptNo";
		   $result2 = mysql_query($sql2);

		 ?>
		 <div align="center">
			<table border="0" width="78%" id="table1" height="219">
			   <tr>
				  <td height="55">&nbsp;
				  <div align="center">
				  <table border="2" width="95%" bordercolorlight="#003366" bordercolordark="#003366" id="table2" bordercolor="#003366" cellpadding="5" cellspacing="5">
					<tr>
						<td bordercolor="#003366" align="right" bgcolor="#5A74A0" height="31" colspan="3" bordercolorlight="#003366" bordercolordark="#003366">
					    <p align="center"><b>
						<font face="Traditional Arabic" color="#FFFFFF" size="4">
						<?php
						if (mysql_num_rows($result1)>0 )
						 {
						   $row1=mysql_fetch_row($result1);
						   DisplaySuccHeader($row1[0]);

						 }
					    ?>
						</font></b></td>
					</tr>
					<tr>
						<td bordercolor="#003366" align="right" bgcolor="#5A74A0" height="31" colspan="3" bordercolorlight="#003366" bordercolordark="#003366">
					    <img border="0" id="img44" src="Depart_Files/button30.jpg" height="27" width="135" alt="&#1575;&#1604;&#1575;&#1602;&#1587;&#1575;&#1605;" fp-style="fp-btn: Embossed Capsule 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 20; fp-font-color-normal: #FFFFFF; fp-font-color-hover: #FFFFFF; fp-font-color-press: #FFFFFF; fp-bgcolor: #5A74A0" fp-title="&#1575;&#1604;&#1575;&#1602;&#1587;&#1575;&#1605;" onmouseover="FP_swapImg(1,0,/*id*/'img44',/*url*/'Depart_Files/button31.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img44',/*url*/'Depart_Files/button30.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img44',/*url*/'Depart_Files/button32.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img44',/*url*/'Depart_Files/button31.jpg')"></td>
					</tr>
				<tr>

				<?php

				if (mysql_num_rows($result2)>0 )
				 {
				?>
				  <td bordercolor="#5A74A0" align="center" bgcolor="#5A74A0" height="31" width="26%" bordercolorlight="#003366" bordercolordark="#003366">
				   	<p dir="rtl">
					<img border="0" id="img27" src="Depart_Files/button35.jpg" height="27" width="135" alt="&#1575;&#1604;&#1576;&#1585;&#1606;&#1575;&#1605;&#1580; &#1575;&#1604;&#1575;&#1603;&#1575;&#1583;&#1610;&#1605;&#1609;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1575;&#1604;&#1576;&#1585;&#1606;&#1575;&#1605;&#1580; &#1575;&#1604;&#1575;&#1603;&#1575;&#1583;&#1610;&#1605;&#1609;">
				  </td>

				  <td bordercolor="#5A74A0" align="center" bgcolor="#5A74A0" height="31" width="46%" bordercolorlight="#003366" bordercolordark="#003366">
					  <img border="0" id="img45" src="Depart_Files/button34.jpg" height="27" width="135" alt="&#1575;&#1587;&#1605; &#1575;&#1604;&#1602;&#1587;&#1605;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1575;&#1587;&#1605; &#1575;&#1604;&#1602;&#1587;&#1605;">
				  </td>
				  <td width="24%" bordercolor="#5A74A0" align="center" bgcolor="#5A74A0" height="31" bordercolorlight="#003366" bordercolordark="#003366">
					  <p align="center" dir="rtl">
					 <img border="0" id="img25" src="Depart_Files/button33.jpg" height="27" width="135" alt="&#1585;&#1602;&#1605; &#1575;&#1604;&#1602;&#1587;&#1605;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1585;&#1602;&#1605; &#1575;&#1604;&#1602;&#1587;&#1605;">
				  </td>
				  </tr>
				  <tr>
				  <?php
				  	while($row2=mysql_fetch_row($result2))
				  	{
				  	?>

					  <td bordercolor="#003366" align="center" width="26%" height="35">
						<p dir="rtl">
						<span lang="ar-sa">
						<font face="Traditional Arabic" color="#FFFFFF" size="3">
						<?php
						//echo($row2[0]);
						$sql3 = "select AcadDegreeName from Departments,AcadDegree where UniversityCode='$uncode11' and CollegeCode='$CollegeCode11' and Departments.DeptName='$row2[0]' and Departments.AcadDegreeId=AcadDegree.AcadDegreeId order by DeptNo";
			 			$result3 = mysql_query($sql3);
			 			$c=mysql_num_rows($result3);
			 			if (mysql_num_rows($result3)>0 )
			 			{
			 				while($row3=mysql_fetch_row($result3))
			 				{
			 				?>

			 				<font face="Traditional Arabic" color="#B0CCFF" size="3">
			 					<?php
			 					echo($row3[0]."</br>");
			 					?>
			 				</font>
			 				<?php
			 				}

			 			}

						?>
						</font></a></font></span>
					  </td>
					  <td bordercolor="#003366" align="center" width="46%" height="35">
						<font face="Traditional Arabic" color="#FFFFFF" size="3">
						<?php echo($row2[0]);?>
						</font>

					  </td>

					  <td width="24%" bordercolor="#003366" align="center" height="35">
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
					<td bordercolor="#003366" align="center" width="73%" bgcolor="#5A74A0" colspan="3">
					<img border="0" id="img42" src="Depart_Files/button36.jpg" height="40" width="200" alt="&#1604;&#1605; &#1610;&#1578;&#1605; &#1573;&#1583;&#1582;&#1575;&#1604; &#1571;&#1609; &#1602;&#1587;&#1605;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1604;&#1605; &#1610;&#1578;&#1605; &#1573;&#1583;&#1582;&#1575;&#1604; &#1571;&#1609; &#1602;&#1587;&#1605;"></td>
					</tr>
					<?php
					}
					?>
				</tr>
				</table>
				</div>
				</td>
				</tr>
				</table></div>
			<?php
		}//end of if
     }//end of if
}//end of if

else
{
	include("ErrorPage.php");
}

