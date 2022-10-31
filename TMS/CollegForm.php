<?php
session_start();
require_once('main.php');
$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
//$conn = db_connect();
require_once('College_Method.php');;
//Page Title

Display_Title();

Background_Page();

$username=$_SESSION['username'];

if($username)
{
	// Get University Code
	$uncode1 = $_GET['uncode'];//universityCode
	$uncode=intval($uncode1);

	// Get University Name
	//$conn = db_connect();
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
	$sql2 = "select UniversityName from Universities where UniversityCode='$uncode'";
	$result2 = mysqli_query($mysqli,$sql2);
	$row2=mysqli_fetch_row($result2);

	$header=$row2[0];

	if($uncode>0)
	 {
		//$_SESSION['UnivCode']=$uncode;
		include("header.php");

		//
		$href="university.php?id=1&uncode=$uncode#college";
		Href2($href,$header);
		$_SESSION['UnivName']=$header;
		//
		//$conn = db_connect();
		// Check Locations
		$sql = "select UnLoc from UnivLoc where UniversityCode='$uncode'";
		$result = mysqli_query($mysqli,$sql);
		if (mysqli_num_rows($result)>0)
		{
			$msg="&#1578;&#1587;&#1580;&#1610;&#1604; &#1575;&#1604;&#1603;&#1604;&#1610;&#1575;&#1578;";
			DisplayHeader($msg);

			$_SESSION['UnivCode']=$uncode;

			display_College_form($colLoc,$colCode,$colName,$colUName,$colPass);
		}
		else
		{
		?>
		 <p align="center">
		 <span style="text-decoration: overline">
			<a href="UnivLocation.php?uncode=<?php echo($uncode);?>">
			<font color="#B0CCFF" size="4" face="Traditional Arabic"><b>
		<?php
			echo("&#1601;&#1590;&#1604;&#1575; &#1602;&#1605; &#1576;&#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1604;&#1601;&#1585;&#1608;&#1593; (&#1575;&#1604;&#1605;&#1608;&#1575;&#1602;&#1593;) &#1575;&#1604;&#1578;&#1575;&#1576;&#1593;&#1577; &#1604;&#1604;&#1580;&#1575;&#1605;&#1593;&#1577; &#1575;&#1608;&#1604;&#1575; &#1548; &#1579;&#1605; &#1576;&#1593;&#1583; &#1584;&#1604;&#1603; &#1602;&#1605; &#1576;&#1575;&#1580;&#1585;&#1575;&#1569; &#1593;&#1605;&#1604;&#1610;&#1577; &#1575;&#1604;&#1578;&#1587;&#1580;&#1610;&#1604; &#1604;&#1604;&#1603;&#1604;&#1610;&#1575;&#1578;");
		?>
			</b></font></a></span></p>
		<?php
		}

	 }
	else
	{
			include("ErrorPage.php");

	}
}
else
{
		include("ErrorPage.php");
}


?>