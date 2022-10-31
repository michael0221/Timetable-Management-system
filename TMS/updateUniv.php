<?php
session_start();
require_once('main.php');
require_once('University_Method.php');
//Page Title

Display_Title();

Background_Page();
$username=$_SESSION['username'];
if($username)
{
  $op = $_GET['op'];
  $choise=intval($op);

 	//universityCode
    $uncode1 = $_GET['uncode'];
	$uncode11=intval($uncode1);

	if(($op==1)&&($uncode11>0))
	{
		include("header.php");
		$href="university.php?id=1";
		Href($href);
		$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
		//		$conn = db_connect();
		$sql = "select UniversityName,UniversityCode,Logo from Universities where UniversityCode='$uncode11'";
		$result = mysqli_query($mysqli,$sql);
		if (mysqli_num_rows($result)>0 )
		{
			$row=mysqli_fetch_row($result);
			//echo("</br>");
			UpdateUniv_Form($uncode11,$row[1],$row[0],$row[2]);

		}
	}
}
else
{
	include("ErrorPage.php");
}
?>