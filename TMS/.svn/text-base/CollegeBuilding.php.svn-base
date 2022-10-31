<?php
session_start();
require_once('main.php');
require_once('College_Method.php');

//Page Title

Display_Title();


$username=$_SESSION['username'];

if($username)
{
	//include("header2.php");
	$conn = db_connect();

	//Get UniversityCode
	$uncode = $_GET['uncode'];
	$univCode=intval($uncode);

	//Get CollegeCode
	$CollegeCode = $_GET['CollegeCode'];
	$CollegeCode=intval($CollegeCode);

	//echo("univCode=".$univCode."</br>"."CollegeCode=".$CollegeCode);

	//Get the OP
	$op = $_GET['op'];
	$op=intval($op);

	if((($univCode>0)&&($CollegeCode>0))&&($op>0))
	{
		//display Building Form to select LectureRoom or Labarotory
	?>
	<div align="center">
	<table border="0" width="100%" id="table1" height="246">
		<tr>
			<td>
			<?php

				if ($op==1)
				{
					//display Lecture
					include("ChooseLec.php");
				}
				else
				{
					//Display Lab
					include("ChooseLab.php");
				}
			?>
			</td>
		</tr>
	</table>
</div>
<?php
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