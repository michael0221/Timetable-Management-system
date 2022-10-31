<?php

require_once('main.php');
//Page Title

Display_Title();

//Page Title
Display_Title();
$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
//$conn = db_connect();

// Get Values
$CollegeCode = $_GET['CollegeCode'];
$CollegeCode1=intval($CollegeCode);

$uncode=$_GET['uncode'];
$uncode1=intval($uncode);

$value=$_GET['value'];
$value=intval($value);


$Sem = $_GET['Sem'];
$Sem1=intval($Sem);
//check value

$f=$_GET['f'];
$f=intval($f);

$year=$_POST['D1'];

$Sem=$_POST['D2'];

$Select=$_POST['D3'];

if(($uncode1>0)&&($CollegeCode1>0))
{
	$flag=true;

	if (!filled_out($_POST))
	{

		Background_Page();

		include("header2.php");

		// Display College header

		$CollegeName=GetCollegeName($uncode1,$CollegeCode1);

		$href="TMSR.php?uncode=$uncode1&CollegeCode=$CollegeCode1&f=$f";

		Href2($href,$CollegeName);

			$msg='&#1601;&#1590;&#1604;&#1575; &#1602;&#1605; &#1576;&#1575;&#1583;&#1582;&#1575;&#1604; &#1580;&#1605;&#1610;&#1593; &#1575;&#1604;&#1576;&#1610;&#1575;&#1606;&#1575;&#1578;';
		Display_error_msg($msg,$path);

		SelectMForm($uncode1,$CollegeCode1,$year,$Sem1,$Select,$value,$f);

		$flag=false;
    }

    if($flag==true)
	{
	    // valid data
	    
		include("FinDisplay.php");
		
		
    }

}//end of if
else
{
	include("ErrorPage.php");
}

?>