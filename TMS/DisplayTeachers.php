<?php
session_start();

require_once('main.php');
require_once('ExportToWord.php');
$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
//$conn = db_connect();
//Page Title

Display_Title();


Background_Page();

$username=$_SESSION['username'];

if($username)
{

	$uncode1 = $_GET['uncode'];//universityCode
	$uncode1=intval($uncode1);

	$CollegeCode = $_GET['CollegeCode'];
	$CollegeCode1=intval($CollegeCode);

	$flag = $_GET['flag'];
	$flag=intval($flag);

	$year=$_SESSION['year'];
	
	//delete prevoius stored files
	
		$path="../TMS/PrintReports/";
	
		DeleteAllFiles($path);

	//export to word
		$filename=$path.date("d-m-Y-h-m-s-")."Print.doc";
		
	//prepare Report's Header
	//--------------------------------------
	$univHeader="<div align='center' dir='rtl'><font size='4' face='Traditional Arabic'><b>".GetUniversityName($uncode1)."</b></font></div>";
	ExportToMsWord($filename,$univHeader,0);

		$collHeader="<div align='center' dir='rtl'><font size='4' face='Traditional Arabic'><b>".GetCollegeName($uncode1,$CollegeCode1)."</b></font><div align='center'>***</div></div>";
	ExportToMsWord($filename,$collHeader);
	
	//---------------------------------------
	
	$txt="<div align='center'><table border='2' width='85%' dir='rtl'><thead>
						<th width='30%' bgcolor='#C0C0C0'>&#1575;&#1604;&#1575;&#1587;&#1605;</th>
							<th width='20%' bgcolor='#C0C0C0'>&#1575;&#1604;&#1583;&#1585;&#1580;&#1577; &#1575;&#1604;&#1608;&#1592;&#1610;&#1601;&#1610;&#1577;</th>
						<th width='35%' bgcolor='#C0C0C0'>&#1605;&#1604;&#1575;&#1581;&#1592;&#1575;&#1578;</th>
				</thead>";
	
	
?>
	<div align="center">

		<table border="2" width="100%" id="table1" style="border-color: #5A74A0">
		<tr>

			<td bordercolor="#003366" align="center" bgcolor="#5A74A0" height="31" width="88%" bordercolorlight="#003366" bordercolordark="#003366" style="border-color: #003366" colspan="3">
			<font face="Traditional Arabic" color="yellow" size="4"><b>
			<?php
					$header="&#1575;&#1593;&#1590;&#1575;&#1569; &#1575;&#1604;&#1578;&#1583;&#1585;&#1610;&#1587; &#1604;&#1604;&#1593;&#1575;&#1605; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609;"."<span dir='ltr'>".$year."</span>";
				echo($header);
				
				$thead="<div align='center' dir='rtl'><font size='4' face='Traditional Arabic'><b>".$header."</b></font></div>";
				ExportToMsWord($filename,$thead);

			?>
			</b></font>
			</td>
		</tr>

		<tr>
		<td bordercolor="#003366" align="center" bgcolor="#5A74A0" height="31" width="88%" bordercolorlight="#003366" bordercolordark="#003366" style="border-color: #003366" colspan="3">
			
			<div align="left">
					<a href="<?php echo($filename);?>" target="_blank" style="text-decoration:none">
					<font face="Traditional Arabic" color="#FFFF00" size="3"><b>
					&#1591;&#1576;&#1575;&#1593;&#1577; &#1575;&#1604;&#1578;&#1602;&#1585;&#1610;&#1585;
					</b></font>
					</a>
			</div>
			<font face="Traditional Arabic" color="white" size="4"><b>
			<div dir="rtl">
			<?php
				$header="&#1575;&#1604;&#1575;&#1587;&#1605;";
				echo($header);
			?>
			</div></b></font>
			
		</td>
		</tr>
		<tr>
		<?php

		$sql="select TeacherNo,TeacherName,Qualif,Status from Teachers where UniversityCode='$uncode1' and CollegeCode='$CollegeCode1'
			and AcadYNo='$year' order by Qualif";
		$result = mysqli_query($mysqli,$sql);
		if (mysqli_num_rows($result)>0 )
		{
		 while($row=mysqli_fetch_row($result))
	   	  {
			?>
			<td bordercolor="#003366" align="center" width="2%" bordercolorlight="#5A74A0" bordercolordark="#5A74A0" style="border-color: #003366" bgcolor="#003366" height="30">

				<a target="_self" href="warnningMsgT.php?TNo=<?php echo($row[0]);?>&TName=<?php echo($row[1]);?>&uncode=<?php echo($uncode1);?>&CollegeCode=<?php echo($CollegeCode1);?>&year=<?php echo($year);?>&flag=1">

				<img border="0" alt="&#1581;&#1584;&#1601;" src="Background/delete.bmp" width="40" height="26">
				</a>
			</td>

				<td bordercolor="#003366" align="center" width="2%" bordercolorlight="#5A74A0" bordercolordark="#5A74A0" style="border-color: #003366" bgcolor="#003366" height="30">

					<a target="_parent" href="insertTeacher.php?TNo=<?php echo($row[0]);?>&TName=<?php echo($row[1]);?>&uncode=<?php echo($uncode1);?>&CollegeCode=<?php echo($CollegeCode1);?>&year=<?php echo($year);?>&doupdate=1">
					<!--update data-->
					<img border="0" src="Background/update.bmp" width="40" height="26">
				</a>
			</td>

				<td bordercolor="#003366" align="right" width="75%" bordercolorlight="#5A74A0" bordercolordark="#5A74A0" style="border-color: #003366" height="30">
				<b>
				<font color="#FFFFFF" face="Traditional Arabic">
				<?php
	   	  		echo($row[1]);
	   	  		?>
				</font></b>
			</td>
			</tr>
			<tr>
		 <?php
		 
		 	$txt=$txt."<tr>
		 				<td width='30%'><p style='text-align:right;direction:rtl'><span dir='rtl'>".$row[1]."</span></p></td>".
		 			   		"<td width='20%'><p style='text-align:center;direction:rtl'><span dir='rtl'>".GetQualifCode($row[2])."</span></p></td>";
	   	  
	   	  	//check teacher status
	   	  	if(intval($row[3])==1)
	   	  			$txt=$txt."<td width='35%'><p style='text-align:center;direction:rtl'><span dir='rtl'>&#1605;&#1578;&#1593;&#1575;&#1608;&#1606; &#1605;&#1606; &#1603;&#1604;&#1610;&#1577; &#1575;&#1582;&#1585;&#1609; </span></p></td></tr>";
	   	  	else
	   	  		$txt=$txt."<td width='35%'><p style='text-align:right;direction:rtl'><span dir='rtl'> </span></p></td></tr>";

	   	  }//end of while
		}//end of if
		else
		{//there is no data to show
		?>
			<td bordercolor="#003366" align="center" width="88%" bordercolorlight="#5A74A0" bordercolordark="#5A74A0" style="border-color: #003366" bgcolor="#5A74A0" height="30" colspan="3">
			<font face="Traditional Arabic" color="white" size="4"><b>
			<?php
				echo("&#1604;&#1605; &#1610;&#1578;&#1605; &#1575;&#1583;&#1582;&#1575;&#1604; &#1576;&#1610;&#1575;&#1606;&#1575;&#1578;");
				
					$txt=$txt."<tr>&#1604;&#1605; &#1610;&#1578;&#1605; &#1575;&#1583;&#1582;&#1575;&#1604; &#1576;&#1610;&#1575;&#1606;&#1575;&#1578;</tr>";

			?>
			</b></font>
			</td>
			</tr>
		<?php
		}
		
		$txt=$txt."</table></div>";
		
		ExportToMsWord($filename,$txt);
		
		?>
	</table>
	</div>
<?php
}
else
 {
 	include("ErrorPage.php");
 }

?>