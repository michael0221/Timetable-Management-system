<?php
session_start();
require_once('main.php');

//Page Title
Display_Title();

Background_Page();

//Get UniversityCode
	$uncode = $_GET['uncode'];
	$uncode=intval($uncode);

	//Get CollegeCode
	$CollegeCode = $_GET['CollegeCode'];
	$CollegeCode=intval($CollegeCode);
//

if (!filled_out($_POST))
{
	include("header2.php");

	$href="welcomeCollege.php?flag=1";

	$header=$_SESSION['collegename'];

	Href2($href,$header);

	DisplayRegMenu($uncode,$CollegeCode);

 		$msg='&#1601;&#1590;&#1604;&#1575; &#1602;&#1605; &#1576;&#1575;&#1583;&#1582;&#1575;&#1604; &#1580;&#1605;&#1610;&#1593; &#1575;&#1604;&#1576;&#1610;&#1575;&#1606;&#1575;&#1578;';
 	Display_error_msg($msg);

 	DisplayRegNewYearForm($uncode,$CollegeCode);

}
else
{

   $year=$_POST['D1'];

   if(strcmp($year,"")!=0)
   {
	//valid data
	// check if it inserted before
	$sql = "select AcadYNo from AcadYear where AcadYNo='$year' ";
	$result = mysql_query($sql);
	if (mysql_num_rows($result)==0)
	{
		//not inserted
		$sql3 = "insert into AcadYear (AcadYNo) values ('$year')";
		$result3 = mysql_query($sql3);
		if ($result3)
		{
		?>
		<p dir="rtl">&nbsp;</p>
		<p dir="rtl">&nbsp;</p>
		<p dir="rtl">&nbsp;</p>

		<table border="0" width="100%" id="table1">
			<tr>
				<td bgcolor="#5A74A0" bordercolorlight="#B0CCFF" bordercolordark="#5A74A0" align="center" colspan="2">
				&nbsp;</td>
			</tr>
			<tr>
				<td bgcolor="#B0CCFF" align="center" colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td align="center" colspan="2">
					<p align="center">&nbsp;</td>
			</tr>
			<tr>
				<td align="center" width="79%">
				<p align="center">
				<font face="Traditional Arabic" color="#B0CCFF" size="5"><b>
			<?php
			$msg='&#1578;&#1605; &#1578;&#1587;&#1580;&#1610;&#1604; &#1575;&#1604;&#1593;&#1575;&#1605; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609;';
		  	DisplaySuccHeader($msg);
		  	echo("<a href='TMSC.php'>");
					echo("&#1575;&#1590;&#1594;&#1591; &#1607;&#1606;&#1575; &#1604;&#1578;&#1601;&#1593;&#1610;&#1604; &#1575;&#1604;&#1593;&#1575;&#1605; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1608;&#1584;&#1604;&#1603; &#1576;&#1575;&#1604;&#1583;&#1582;&#1608;&#1604; &#1604;&#1604;&#1606;&#1592;&#1575;&#1605; &#1605;&#1606; &#1580;&#1583;&#1610;&#1583;");
			echo("</a>");
			$_SESSION['username']="";
			?>
			</b></font>
			</p>
			</td>
			</tr>
			<tr>
				<td align="center" colspan="2" height="27">
			&nbsp;</td>
			</tr>
			<tr>
			<td align="center" bgcolor="#B0CCFF" colspan="2">
			&nbsp;</td>
			</tr>
			<tr>
			<td align="center" bgcolor="#5A74A0" colspan="2">
			&nbsp;</td>
			</tr>
		</table>
			<?php
		}
	}
	else
	{
		include("header2.php");

		$href="welcomeCollege.php?flag=1";

		$header=$_SESSION['collegename'];

		Href2($href,$header);

		DisplayRegMenu($uncode,$CollegeCode);

			$msg='&#1578;&#1605; &#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1604;&#1593;&#1575;&#1605; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1605;&#1587;&#1576;&#1602;&#1575;';
 		Display_error_msg($msg);
 		DisplayRegNewYearForm($uncode,$CollegeCode);
	}
   }//end of if
}
?>