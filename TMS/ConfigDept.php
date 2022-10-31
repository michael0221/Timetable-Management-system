<?php
session_start();
require_once('main.php');

//Page Title
Display_Title();

$username=$_SESSION['username'];

$year=$_SESSION['year'];

if($username)
{
	//$conn = db_connect();
	Background_Page();

	include("header2.php");

	// Get Values
	$CollegeCode = $_GET['CollegeCode'];
	$CollegeCode1=intval($CollegeCode);

	$uncode=$_GET['uncode'];
	$uncode1=intval($uncode);

	//check value

	if(($uncode1>0)&&($CollegeCode1>0))
	{
		//(1)Get College Name from session CollegeName

		//display Header

		$href="welcomeCollege.php?flag=1";

		$header=$_SESSION['collegename'];

			//$headerYear="&nbsp; - &#1575;&#1604;&#1593;&#1575;&#1605; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609;&nbsp;"."<span dir='rtl'>".$year."</span>";

		//$display=$header.$headerYear;
		
		//Href2($href,$display);
		
		//����� �������
		$header=$header." - "."&#1578;&#1587;&#1580;&#1610;&#1604; &#1575;&#1604;&#1575;&#1602;&#1587;&#1575;&#1605;"; 

		Href2($href,$header);


		
		//(2)Get Depts

			$sql2 = "select distinct(DeptName),DeptNo from Departments where UniversityCode='$uncode1' and CollegeCode='$CollegeCode1' group by DeptName order by DeptNo";
		$result2 = mysqli_query($mysqli,$sql2);
		?>
		 <div align="center">
			<table border="0" width="100%" id="table1" height="219">
			   <tr>
				  <td height="55">&nbsp;
				  <div align="center">
				  <table border="2" width="85%" bordercolorlight="#003366" bordercolordark="#003366" id="table2" bordercolor="#003366" cellpadding="5" cellspacing="5">
					<tr>
						<td bordercolor="#003366" align="right" bgcolor="#5A74A0" height="31" colspan="5" bordercolorlight="#003366" bordercolordark="#003366">
					    <img border="0" id="img44" src="Depart_Files/button30.jpg" height="27" width="135" alt="&#1575;&#1604;&#1575;&#1602;&#1587;&#1575;&#1605;" fp-style="fp-btn: Embossed Capsule 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 20; fp-font-color-normal: #FFFFFF; fp-font-color-hover: #FFFFFF; fp-font-color-press: #FFFFFF; fp-bgcolor: #5A74A0" fp-title="&#1575;&#1604;&#1575;&#1602;&#1587;&#1575;&#1605;" onmouseover="FP_swapImg(1,0,/*id*/'img44',/*url*/'Depart_Files/button31.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img44',/*url*/'Depart_Files/button30.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img44',/*url*/'Depart_Files/button32.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img44',/*url*/'Depart_Files/button31.jpg')"></td>
					</tr>
				<tr>

				<?php

				if (mysqli_num_rows($result2)>0 )
				 {
				?>
				  
				  <td bordercolor="#5A74A0" align="center" bgcolor="#5A74A0" width="30%" bordercolorlight="#003366" bordercolordark="#003366" colspan="2">
				  	<img border="0" id="img48" src="ConfigDept/button35.jpg" height="27" width="135" alt="&#1593;&#1583;&#1583; &#1575;&#1604;&#1601;&#1589;&#1608;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1610;&#1577;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1593;&#1583;&#1583; &#1575;&#1604;&#1601;&#1589;&#1608;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1610;&#1577;" align="right">
				  </td>

				  <td bordercolor="#5A74A0" align="center" bgcolor="#5A74A0" height="31" width="25%" bordercolorlight="#003366" bordercolordark="#003366">
				   	<p dir="rtl">
					<img border="0" id="img27" src="Depart_Files/button35.jpg" height="27" width="135" alt="&#1575;&#1604;&#1576;&#1585;&#1606;&#1575;&#1605;&#1580; &#1575;&#1604;&#1575;&#1603;&#1575;&#1583;&#1610;&#1605;&#1609;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1575;&#1604;&#1576;&#1585;&#1606;&#1575;&#1605;&#1580; &#1575;&#1604;&#1575;&#1603;&#1575;&#1583;&#1610;&#1605;&#1609;">
				  </td>

				  <td bordercolor="#5A74A0" align="center" bgcolor="#5A74A0" height="31" width="25%" bordercolorlight="#003366" bordercolordark="#003366">
					  <img border="0" id="img45" src="Depart_Files/button34.jpg" height="27" width="135" alt="&#1575;&#1587;&#1605; &#1575;&#1604;&#1602;&#1587;&#1605;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1575;&#1587;&#1605; &#1575;&#1604;&#1602;&#1587;&#1605;">
				  </td>
				  <td width="10%" bordercolor="#5A74A0" align="center" bgcolor="#5A74A0" height="31" bordercolorlight="#003366" bordercolordark="#003366">
					  <p align="center" dir="rtl">
					 <img border="0" id="img25" src="Depart_Files/button33.jpg" height="27" width="135" alt="&#1585;&#1602;&#1605; &#1575;&#1604;&#1602;&#1587;&#1605;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1585;&#1602;&#1605; &#1575;&#1604;&#1602;&#1587;&#1605;">
				  </td>
				  </tr>
				  <tr>
				 <?php
				  	while($row2=mysqli_fetch_row($result2))
				  	{
					  	$sql33 = "select AcadDegree.NoOfSemester,AcadDegree.AcadDegreeId from Departments,AcadDegree where UniversityCode='$uncode1' and CollegeCode='$CollegeCode1' and Departments.DeptName='$row2[0]' and Departments.AcadDegreeId=AcadDegree.AcadDegreeId order by DeptNo";

					  $result33 = mysqli_query($mysqli,$sql33);

					  if (mysqli_num_rows($result33)>0 )
					  {
					  	
					  ?>
					 	
					  <td bordercolor="#003366" align="center" width="10%">
					  <?php
					  	$SemNum="";
					  	while($row33=mysqli_fetch_row($result33))
					  	{
					  		$SemNum=$SemNum.'<font face="Times New Roman" color="#FFFFFF" size="3">'.$row33[0].'</font>'."</br>"	
					  	?>
							<font face="Traditional Arabic" color="#FFFFFF" size="3">
					  			<!--update-->
					  				<a href="DeptResult.php?do=1&AcadId=<?php echo($row33[1]); ?>&uncode=<?php echo($uncode1);?>&CollegeCode=<?php echo($CollegeCode1);?>&Dept=<?php echo($row2[1]); ?>"><b><font color="#FFFFFF" face="Traditional Arabic">&#1578;&#1593;&#1583;&#1610;&#1604;</font></b></a>
								&nbsp;&nbsp;
								<!--Delete-->					  			
									<a href="DeptResult.php?do=2&AcadId=<?php echo($row33[1]); ?>&uncode=<?php echo($uncode1);?>&CollegeCode=<?php echo($CollegeCode1);?>&Dept=<?php echo($row2[1]); ?>"><b><font color="#FFFFFF" face="Traditional Arabic">&#1581;&#1584;&#1601;</font></b></a></br>
					  		</font>
					  	<?php
					  	}//end of while
					  }
					  else
					  {
					  	echo("");
					  }
					  	?>
					  </td>

					  <?php
					  	$sql3 = "select AcadDegreeName,Departments.AcadDegreeId,Departments.DeptNo  from Departments,AcadDegree where UniversityCode='$uncode1' and CollegeCode='$CollegeCode1' and Departments.DeptName='$row2[0]' and Departments.AcadDegreeId=AcadDegree.AcadDegreeId order by DeptNo";
					  $result3 = mysqli_query($mysqli,$sql3);

					  if (mysqli_num_rows($result3)>0 )
					  {
					  ?>
					  
					  <td bordercolor="#003366" align="center" width="20%">
					  <?php echo($SemNum);?>
					  </td>

					  <td bordercolor="#003366" align="center" width="25%" height="35">
					  <?php
					  	while($row3=mysqli_fetch_row($result3))
					  	{
					  	?>
			 					<font face="Traditional Arabic" color="#B0CCFF" size="3">
								<a href="ConfigDept.php?AcadDeg=<?php echo($row3[1]); ?>&uncode=<?php echo($uncode1);?>&CollegeCode=<?php echo($CollegeCode1);?>&Dept=<?php echo($row3[2]); ?>#AcadDegree">
								<?php
									echo($row3[0]."</br>");
								?>
			 					</a></font>
			 			<?php
			 			}
			 		   }
			 		   else
			 		   {
			 		   		echo("");
			 		   }
						?>
					  </td>
					  <td bordercolor="#003366" align="center" width="25%" height="35">
						<font face="Traditional Arabic" color="#FFFFFF" size="3">
						<?php echo($row2[0]);?>
						</font>

					  </td>

					  <td width="10%" bordercolor="#003366" align="center" height="35">
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
					<td bordercolor="#003366" align="center" width="73%" bgcolor="#5A74A0" colspan="5">
					<img border="0" id="img42" src="Depart_Files/button36.jpg" height="40" width="200" alt="&#1604;&#1605; &#1610;&#1578;&#1605; &#1573;&#1583;&#1582;&#1575;&#1604; &#1571;&#1609; &#1602;&#1587;&#1605;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1604;&#1605; &#1610;&#1578;&#1605; &#1573;&#1583;&#1582;&#1575;&#1604; &#1571;&#1609; &#1602;&#1587;&#1605;"></td>
					</tr>
					<?php
					}
					?>
				</table>
				<p>
					<a href="InsertDept.php?uncode=<?php echo($uncode1);?>&CollegeCode=<?php echo($CollegeCode1);?>" >
					<img border="0" id="img47" src="ConfigDept/buttonE.jpg" height="22" width="110"  fp-style="fp-btn: Braided Column 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 14; fp-font-color-normal: #FFFFFF; fp-font-color-hover: #FFFFFF; fp-font-color-press: #FFFFFF; fp-bgcolor: #5A74A0" fp-title="&Aring;&Ouml;&Ccedil;&Yacute;&Eacute; &THORN;&Oacute;&atilde;" align="left" onmouseover="FP_swapImg(1,0,/*id*/'img47',/*url*/'ConfigDept/buttonF.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img47',/*url*/'ConfigDept/buttonE.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img47',/*url*/'ConfigDept/button10.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img47',/*url*/'ConfigDept/buttonF.jpg')"></a></div>
				</td>
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
		<a name='#AcadDegree'>
			<?php
			if(($uncode1>0)&&($CollegeCode1>0)&&($AcadDeg1>0))
				{
					include("AcadDegree.php");
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