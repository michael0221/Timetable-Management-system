<?php
// This page to delete Building (Lecture or Lab)

session_start();
require_once('main.php');
//Page Title

Display_Title();

Background_Page();
$conn = db_connect();

$username=$_SESSION['username'];
if($username)
{
	include("header2.php");


	$uncode=$_GET['uncode'];
	$uncode1=intval($uncode);

	$CollegeCode = $_GET['CollegeCode'];
	$CollegeCode1=intval($CollegeCode);

	$BId=$_GET['BId'];
	$BId=intval($BId);

	$SubBId=$_GET['SubBId'];
	$SubBId=intval($SubBId);

	$year=$_GET['year'];

	$flag=$_GET['flag'];
	$flag=intval($flag);


	//echo($year."  ".$uncode1." ".$CollegeCode1."  ".$BId." ".$SubBId);

  if((($uncode1>0)&&($CollegeCode1>0))&&(($BId>0)&&($SubBId>0)))
  {
	if(strcmp($year,"")!=0)
	{
	  $BName=GetBuildingName($CollegeCode1,$uncode1,$BId,$SubBId);
	  if($flag==1)
	  {
	  	//echo(" are you sure to delet..");
	  	$href="BuildingReport.php?uncode=$uncode1&CollegeCode=$CollegeCode1&op=$BId";

		$header="&#1578;&#1571;&#1603;&#1610;&#1583; &#1593;&#1605;&#1604;&#1610;&#1577; &#1575;&#1604;&#1581;&#1584;&#1601;";

		Href2($href,$header);
	?>
	<p>&nbsp;</p>
	<div align="center">
	<table border="2" width="60%">
	<tr>
	<td>
	<div align="center">
		<table border="0" width="99%" id="table21">
			<tr>
				<td dir="rtl" bgcolor="#2F446F" colspan="4">
				<p align="right"><b>
				<font face="Traditional Arabic" color="#FFFF00" size="4">&nbsp;</font><font face="Traditional Arabic" color="#FFFF00" size="5">
				&#1578;&#1571;&#1603;&#1610;&#1583; &#1593;&#1605;&#1604;&#1610;&#1577; &#1575;&#1604;&#1581;&#1584;&#1601;
				</font></b></td>
			</tr>
			<tr>
				<td dir="rtl" colspan="4">
				<div align="right">
				<font face="Traditional Arabic" color="white"><b>
				&#1607;&#1604; &#1578;&#1585;&#1610;&#1583; &#1601;&#1593;&#1604;&#1575; &#1581;&#1584;&#1601; &#1607;&#1584;&#1607;&nbsp; &#1575;&#1604;&#1578;&#1601;&#1575;&#1589;&#1610;&#1604;</b></font></div></td>
			</tr>
			<tr>
				<td dir="rtl" colspan="4" height="4">
				<div align="center">
				<font face="Traditional Arabic" color="white"><b>
				<?php
					if($BId==1)

						echo("&#1575;&#1604;&#1602;&#1575;&#1593;&#1577; :".$BName);
					else
						echo("&#1575;&#1604;&#1605;&#1593;&#1605;&#1604; :".$BName);
				?>
				</b></font>
				</div>
				</td>
			</tr>
			<tr>
				<td dir="rtl" width="25%">
				&nbsp;
				</td>
				<td  dir="rtl" bgcolor="#2F446F" bordercolor="#000000" width="23%">
				<p align="center">
				<?php
					echo("<a target='_self' href='DelBuilding.php?uncode=$uncode1&CollegeCode=$CollegeCode1&year=$year&BId=$BId&SubBId=$SubBId&flag=2'>");
				?>
				<img border="0" id="img2" src="Background/IMGYES.jpg" height="20" width="100" alt="&#1606;&#1593;&#1605;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 12; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #2F446F" fp-title="&#1606;&#1593;&#1605;">
				</a>
				</td>
				<td width="24%" dir="rtl">
				&nbsp;</td>
			</tr>
		</table>
	</div>
	</td>
	</tr>
	</table>
	</div>
	<?php
	}
	 else
	 if($flag==2)
      {
		//before delete you Must :
		//(1) check if this Building use on ManagingLec Table
		$conn = db_connect();
		$Mang_query1 = "select count(SubBId) from ManagingLec where
			AcadYNo='$year' and
			UniversityCode='$uncode1' and
			CollegeCode='$CollegeCode1' and
			BId='$BId' and
			SubBId='$SubBId'";

		$Mresult1=mysql_query($Mang_query1);
		$mrow1=mysql_fetch_row($Mresult1);

    	if($mrow1[0]==0)
    	{
    		//not used and you can delete it
			$sqld = "delete from usedBy where
					AcadYNo='$year' and
					UniversityCode='$uncode1' and
					CollegeCode='$CollegeCode1' and
					BId='$BId' and
					SubBId='$SubBId'";
			$resultd=mysql_query($sqld);
			if($resultd)
			{

				$href="BuildingReport.php?uncode=$uncode1&CollegeCode=$CollegeCode1&op=$BId";

				$header=$BName." &nbsp;>> &nbsp;"."&#1578;&#1605;&#1578; &#1593;&#1605;&#1604;&#1610;&#1577; &#1575;&#1604;&#1581;&#1584;&#1601; &#1576;&#1606;&#1580;&#1575;&#1581;";

				Href2($href,$header);
			}
			else
			{
				echo("not delete..");
			}
    	}
    	else
    	{
    		//that means this Building used in ManagingLec
    		$href="BuildingReport.php?uncode=$uncode1&CollegeCode=$CollegeCode1&op=$BId";

			$header="&#1604;&#1575;&#1610;&#1605;&#1603;&#1606; &#1575;&#1580;&#1585;&#1575;&#1569; &#1593;&#1605;&#1604;&#1610;&#1577; &#1575;&#1604;&#1581;&#1584;&#1601;";

			Href2($href,$header);

    		$BName;
    		//echo("sorry this Building used Before.. ");
			if($BId==1)
			{
				$display="&#1575;&#1604;&#1602;&#1575;&#1593;&#1577; :".$BName."</br>"."&#1578;&#1605;&#1578; &#1593;&#1605;&#1604;&#1610;&#1577; &#1575;&#1604;&#1580;&#1583;&#1608;&#1604;&#1577; &#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578; &#1576;&#1607;&#1584;&#1607; &#1575;&#1604;&#1602;&#1575;&#1593;&#1577; &#1605;&#1587;&#1576;&#1602;&#1575;";
			}
			else
			if($BId==2)
			{
				$display="&#1575;&#1604;&#1605;&#1593;&#1605;&#1604; :".$BName."</br>"."&#1578;&#1605;&#1578; &#1593;&#1605;&#1604;&#1610;&#1577; &#1575;&#1604;&#1580;&#1583;&#1608;&#1604;&#1577; &#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578; &#1576;&#1607;&#1584;&#1575; &#1575;&#1604;&#1605;&#1593;&#1605;&#1604; &#1605;&#1587;&#1576;&#1602;&#1575;";
			}
			?>
			</br>
			<div align="center">
				<table border="2" width="80%">
					<tr>
						<td dir="rtl" bgcolor="#2F446F">
						<p align="center">
						<b>
						<font face="Traditional Arabic" color="white" size="4">
						<?php
							echo($display);
						?>
						</font>
						</b>
						</td>
					</tr>
				</table>
			</div>

			<?php
    	}
	   }//end of flag=2
	 }//end of nested if
   }//end of main if
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