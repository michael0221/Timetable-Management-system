<?php

session_start();
require_once('main.php');
require_once('College_Method.php');

//Page Title

Display_Title();

Background_Page();

$username=$_SESSION['username'];

if($username)
{
	include("header2.php");
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
//	$conn = db_connect();

	//Get UniversityCode
	$uncode = $_GET['uncode'];
	$univCode=intval($uncode);

	//Get CollegeCode
	$CollegeCode = $_GET['CollegeCode'];
	$CollegeCode=intval($CollegeCode);

	$href="welcomeCollege.php?flag=1";

	$header=$_SESSION['collegename'];
	
		$header=$header." - "."&#1573;&#1593;&#1583;&#1575;&#1583;&#1575;&#1578; &#1575;&#1604;&#1593;&#1575;&#1605; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1575;&#1604;&#1580;&#1583;&#1610;&#1583;"; //�������

	Href2($href,$header);

	//echo("univCode=".$univCode."</br>"."CollegeCode=".$CollegeCode);

	DisplayRegMenu($univCode,$CollegeCode);


	if(($univCode>0)&&($CollegeCode>0))
	{
		$value = $_GET['value'];
		$value=intval($value);
		if($value==1)
		{
	?>
		<a name="RegNewYear">
			<?php
		 	include("RegYear.php");
			?>
		</a>
		<?php
		} //end of if
		else
		if($value==2)
		{
		?>
		<a name="RegNoOfStud">
			<?php
				include("NoOFStud.php");
			?>
		</a>

	<?php
		}//end of else
		else
		//Lecture
		if($value==3)
		{
		?>
		<a name="RegLec">
			<?php
				include("CollegeBuilding.php");
			?>
		</a>

		<?php
		}//end of else
		else
		//Lab
		if($value==4)
		{
		?>
		 <a name="RegLab">
		 <?php
				include("CollegeBuilding.php");
		 ?>
		 </a>

		<?php
		}//end of value=4
		else
		//CollegeStartTime
		if($value==5)
		{?>
			 <a name="CollegeStartTime">
		 	<?php
				include("CollegeStartTime.php");
		 	?>
		 </a>
		<?php
		}//end of value=5

	}//end of main if
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