<?php

session_start();

require_once('main.php');

//Page Title

Display_Title();

Background_Page();


if (strcmp($_SESSION['username'],"")!=0)
{

	include("header.php");
	$href="welcomeAdmin.php";
	Href($href);
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
	//	$conn = db_connect();

?>

<div align="center">&nbsp;</div>
<div align="center">
	<table border="2" width="70%" id="table33" cellpadding="5" cellspacing="6" bordercolorlight="#2F446F" bordercolordark="#2F446F" bordercolor="#003366">
	<?php
		//display all universities with their Colleges
		$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
//		$conn = db_connect();
		$sql1 = "select UniversityCode,UniversityName from Universities";
		$result=mysqli_query($mysqli,$sql1);
		if (mysqli_num_rows($result))
		{
			while($row=mysqli_fetch_row($result))
			{
				$collegename="";
				$sql2 = "select CollegeCode,CollegeName,UserName,Passwd from Colleges where
						UniversityCode='$row[0]' ";
				$result2=mysqli_query($mysqli,$sql2);
				if (mysqli_num_rows($result2))
				{
				?>
					<tr>
						<td dir="rtl" align="right" width="95%" bordercolorlight="#2F446F" bordercolordark="#2F446F" colspan="4" bgcolor="#2F446F">
						<p align="center">
						<b>
						<font size="5" face="Traditional Arabic" color="#FFFF00">&#1575;&#1604;&#1603;&#1604;&#1610;&#1575;&#1578; &#1575;&#1604;&#1605;&#1615;&#1587;&#1580;&#1604;&#1577; &#1576;&#1575;&#1604;&#1606;&#1592;&#1575;&#1605; 
						</font><font size="5" face="Traditional Arabic"></span>
						<font color="#FFFFFF">[ <span lang="ar-sa">&#1575;&#1604;&#1605;&#1587;&#1578;&#1582;&#1583;&#1605;&#1610;&#1606; </span>]</font>						
						</font></font></font></b></td>
					</tr>
					<tr>
						<td dir="rtl" align="right" width="95%" bordercolorlight="#2F446F" bordercolordark="#2F446F" colspan="4" bgcolor="#2F446F">
						<b><font size="4" face="Traditional Arabic" color="#FFFFFF">
						<?php echo($row[1]);?>
						</font></b>
						</td>
					</tr>
					<tr>
						
						<td dir="rtl" align="center" width="15%" bordercolorlight="#2F446F" bordercolordark="#2F446F" bgcolor="#2F446F">
						<b>
						<font face="Traditional Arabic" size="4" color="#FFFFFF">&#1603;&#1604;&#1605;&#1577; &#1575;&#1604;&#1605;&#1585;&#1608;&#1585;
						</font></b>
						</td>

						<td dir="rtl" align="center" width="15%" bordercolorlight="#2F446F" bordercolordark="#2F446F" bgcolor="#2F446F">
						<span lang="ar-sa"><b>
						<font face="Traditional Arabic" size="4" color="#FFFFFF">
						&#1575;&#1587;&#1605; &#1575;&#1604;&#1605;&#1587;&#1578;&#1582;&#1583;&#1605;</font></b></span></td>

						<td dir="rtl" align="center" width="45%" bordercolorlight="#2F446F" bordercolordark="#2F446F" bgcolor="#2F446F">
						<b>
						<font face="Traditional Arabic" size="4" color="#FFFFFF">
						&#1575;&#1604;&#1603;&#1604;&#1610;&#1577;</font></b></td>

					<td width="15%" dir="rtl" align="center" bordercolorlight="#2F446F" bordercolordark="#2F446F" bgcolor="#2F446F">
					<font face="Traditional Arabic" color="#FFFFFF" size="4"><b>
					<span lang="ar-sa">&#1603;&#1608;&#1583; &#1575;&#1604;&#1603;&#1604;&#1610;&#1577;</span></b></font></td>
					</tr>
				<?php
					//Display Regiseted Colleges
					while($row2=mysqli_fetch_row($result2))
					{
					?>
					<tr>
						<td dir="rtl" align="center" width="15%" bordercolorlight="#2F446F" bordercolordark="#2F446F">
						<font face="Traditional Arabic" color="white"><b>
						<?php
							echo($row2[3]);
						?>
						<td dir="rtl" align="center" width="15%" bordercolorlight="#2F446F" bordercolordark="#2F446F">
						<font face="Traditional Arabic" color="white"><b>
						<?php
							echo($row2[2]);
						?>
						</b></font>
					</td>

						<td dir="rtl" align="center" width="45%" bordercolorlight="#2F446F" bordercolordark="#2F446F">
						<font face="Traditional Arabic"><b>
						<?php
							echo($row2[1]);
						?>
						</b></font></td>

						<td width="15%" dir="rtl" align="center" bordercolorlight="#2F446F" bordercolordark="#2F446F" bgcolor="#2F446F">
						<font face="Traditional Arabic" color="#FFFFFF"><b>
						<span lang="ar-sa">
						<?php
							echo($row2[0]);
						?>
						</span></b></font>
						</td>
					</tr>
				<?php
				}//end of while 2
			   }//end of if 2
				else
				{
					//if no College Inserted
				?>
					<tr>
						<td dir="rtl" align="right" width="95%" bordercolorlight="#2F446F" bordercolordark="#2F446F" colspan="4" bgcolor="#2F446F">
						<b><font size="4" face="Traditional Arabic" color="#FFFFFF">
						<?php echo($row[1]);?>
						</font></b>
						</td>
					</tr>
					<tr>
						<td dir="rtl" align="center" colspan="4">
							<font face="Traditional Arabic" color="white">
							<b>
							<?php
								//there is no Colleges inserted
								echo("&#1604;&#1605; &#1610;&#1578;&#1605; &#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1604;&#1603;&#1604;&#1610;&#1575;&#1578;");
							?>
							</b>
							</font>
						</td>
					</tr>
				<?php
				}//end of else
			}//end of while
		}//end of main if
		else
		{
			//echo("no data to show ");
		?>	
			<tr>
						<td dir="rtl" align="center" colspan="4">
							<font face="Traditional Arabic" color="white">
							<b>
							<?php
								//there is no Colleges inserted
								echo("&#1604;&#1605; &#1610;&#1578;&#1605; &#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1604;&#1603;&#1604;&#1610;&#1575;&#1578;");
							?>
							</b>
							</font>
						</td>
					</tr>
		<?php
		}
		?>
	</table>
</div>

<?php
}//end of if
else
{
	include("ErrorPage.php");
}

?>