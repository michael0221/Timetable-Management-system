<?php

session_start();

require_once('main.php');

//Page Title & Background

Display_Title();

Background_Page();


$flag = $_GET['flag'];
$flag=intval($flag);

$conn = db_connect();

if($flag!=1)
{
	//College's Welcome Page[once user login]
	 
	$username=$_POST['T1'];

	$Passwd=$_POST['T2'];

	$year=$_POST['D3'];

	
	if ((((strcmp($username,"")!=0)&&(strcmp($Passwd,"")!=0)))&&(strcmp($year,"")!=0))
	{

 		if (CheckCollege($username,$Passwd))
 		{

			$_SESSION['username']=$username;
			$_SESSION['Passwd']=$Passwd;

			$_SESSION['year']=$year;

			$headerYear="&nbsp; - &#1575;&#1604;&#1593;&#1575;&#1605; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609;&nbsp;"."<span dir='rtl'>".$year."</span>";

			include("header2.php");

			$sql = "select CollegeName,CollegeCode,UniversityCode from Colleges where UserName='$username' and Passwd='$Passwd'";
			$result = mysql_query($sql);

			$row=mysql_fetch_row($result);

			//create sessin for College Name

			$_SESSION['collegename']=$row[0];

			$header=$row[0]."&nbsp;".$headerYear;

			Display_welcomeHeader_College($header);
			
			Display_College_Menu1($row[1],$row[2]);

			Display_College_Menu2($row[1],$row[2]);//selections
		}
		else
		{
			include("errorUser.php");
		}
	}//end if2
	else
	{
		include("ErrorPage.php");
	}
}//enf flag
else
{
	//check if user already login
	if ((strcmp($_SESSION['username'],"")!=0) && (strcmp($_SESSION['Passwd'],"")!=0))
	{
		include("header2.php");

		$username=$_SESSION['username'];
		
		$Passwd=$_SESSION['Passwd'];

		$year=$_SESSION['year'];

		$sql = "select CollegeCode,UniversityCode from Colleges where UserName='$username' and Passwd='$Passwd'";
		$result = mysql_query($sql);

		$row=mysql_fetch_row($result);

		//create sessin for College Name

		$headerYear=" - &#1575;&#1604;&#1593;&#1575;&#1605; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609;&nbsp;"."<span dir='rtl'>".$year."</span>";

		$header=$_SESSION['collegename']."&nbsp;".$headerYear;

		Display_welcomeHeader_College($header);

		Display_College_Menu1($row[0],$row[1]);

		Display_College_Menu2($row[0],$row[1]);//selections
	 }
  	else
  	{
		include("errorUser.php");
  	 }
 }

?>
</body>