<?php
session_start();
require_once('main.php');

//Page Title

Display_Title();

Background_Page();

if (strcmp($_SESSION['username'],"")!=0)
{
	include("header.php");

	$href="BuildingForm.php?id=2";
	backto($href);

	$r = $_GET['r'];
	$value=intval($r);

	$uncode = $_GET['uncode'];
	$univcode=intval($uncode);


	if(($value==1)&&($univcode>0))
	{

		$Loc=$_POST['D2'];
		$LectureName=$_POST['T1'];
    	$Capacity=$_POST['T2'];

		if (!filled_out($_POST))
		  {

			$msg='&#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1604;&#1602;&#1575;&#1593;&#1575;&#1578;';
			DisplayHeader($msg);

				$msg='&#1601;&#1590;&#1604;&#1575; &#1602;&#1605; &#1576;&#1575;&#1583;&#1582;&#1575;&#1604; &#1580;&#1605;&#1610;&#1593; &#1575;&#1604;&#1576;&#1610;&#1575;&#1606;&#1575;&#1578;';
			Display_error_msg($msg);
			Lecture_Form($value,$univcode,$LectureName,$Capacity,$Loc);
          }
        else
		// enable english name for Lecture Room
		// ctype_alpha($LectureName)||
		/*if (ctype_alnum($LectureName))
		  {

			 $msg='&#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1604;&#1602;&#1575;&#1593;&#1575;&#1578;';
			 DisplayHeader($msg);

			 	$msg='&#1575;&#1587;&#1605; &#1575;&#1604;&#1602;&#1575;&#1593;&#1577; &#1604;&#1575;&#1576;&#1583; &#1575;&#1606; &#1610;&#1581;&#1578;&#1608;&#1609; &#1593;&#1604;&#1609; &#1581;&#1585;&#1608;&#1601; &#1593;&#1585;&#1576;&#1610;&#1577; &#1608;&#1575;&#1585;&#1602;&#1575;&#1605; &#1601;&#1602;&#1591;';
			 $LectureName="";
			 Display_error_msg($msg);
			 Lecture_Form($value,$univcode,$LectureName,$Capacity,$Loc);
          }
         else
         */
         //check [Duplicate] if the LectureRoom Insert into the same Location
         if(!(checkLName($LectureName,$univcode,$value,$Loc)))
         {

			$msg='&#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1604;&#1602;&#1575;&#1593;&#1575;&#1578;';
			DisplayHeader($msg);

			$msg='&#1575;&#1587;&#1605; &#1575;&#1604;&#1602;&#1575;&#1593;&#1577; &#1605;&#1583;&#1582;&#1604; &#1605;&#1587;&#1576;&#1602;&#1575;';
			//$msg="error name";
			$LectureName="";
			Display_error_msg($msg);
			Lecture_Form($value,$univcode,$LectureName,$Capacity,$Loc);
         }
         else
         if(!(ctype_digit($Capacity)))
		 {

			 $msg='&#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1604;&#1602;&#1575;&#1593;&#1575;&#1578;';
			 DisplayHeader($msg);

			 	$msg='&#1575;&#1604;&#1587;&#1593;&#1577; &#1575;&#1604;&#1603;&#1604;&#1610;&#1577;  &#1604;&#1575;&#1576;&#1583; &#1605;&#1606; &#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1585;&#1602;&#1575;&#1605; &#1601;&#1602;&#1591;';
			 $Capacity="";
			 Display_error_msg($msg);
			 Lecture_Form($value,$univcode,$LectureName,$Capacity,$Loc);
          }
          else
          {
			//valid data must insert into DB

			//(1)prepare the id
			$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');

			//$conn = db_connect();
			$sql1="select max(SubBId) from SubBuildingSeminar where UniversityCode='$univcode' and BId='$value'";
			$result1 = mysqli_query($mysqli,$sql1);
			if (mysqli_num_rows($result1)>0 )
			  {
				$row=mysqli_fetch_row($result1);
				$id=$row[0]+1;
			  }
			else
			 {
				$id=1;
			 }
			 $mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
			//(2)Insert Data to Table
		//	$conn = db_connect();
			$sql3 = "insert into SubBuildingSeminar (UniversityCode,BId,SubBId,SubBName,Capacity,UnLoc) values ('$univcode','1','$id','$LectureName','$Capacity','$Loc')";
			$result3 = mysqli_query($mysqli,$sql3);
		  	if ($result3)
		  	{
				//Successfully Insereted
				
				$msg='&#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1604;&#1602;&#1575;&#1593;&#1575;&#1578;';
				DisplayHeader($msg);

					$msg2='&#1578;&#1605; &#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1604;&#1602;&#1575;&#1593;&#1577; &#1575;&#1604;&#1580;&#1583;&#1610;&#1583;&#1577; &#1576;&#1606;&#1580;&#1575;&#1581;';
				DisplaySuccHeader($msg2);

				$LectureName="";
				$Capacity="";
				$Loc="";
          		Lecture_Form($value,$univcode,$LectureName,$Capacity,$Loc);
          	}
          	else
          	{
          		echo("Data not Inserted..");
          			$msger='&#1604;&#1605; &#1610;&#1578;&#1605; &#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1604;&#1576;&#1610;&#1575;&#1606;&#1575;&#1578; &#1575;&#1604;&#1585;&#1580;&#1575;&#1569; &#1575;&#1604;&#1605;&#1581;&#1575;&#1608;&#1604;&#1607; &#1604;&#1575;&#1581;&#1602;&#1575;';
				DisplaySuccHeader($msger);
          	}
          	
          }//end of else

	 }//end of if

//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

	 //Labaratories
	 if(($value==2)&&($univcode>0))
	 {

	 	$Loc=$_POST['D3'];
	 	$LabName=$_POST['T1'];
		$Capacity=$_POST['T2'];

		if (!filled_out($_POST))
		 {

			$msg='&#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1604;&#1605;&#1593;&#1575;&#1605;&#1604;';
			DisplayHeader($msg);


				$msg='&#1601;&#1590;&#1604;&#1575; &#1602;&#1605; &#1576;&#1575;&#1583;&#1582;&#1575;&#1604; &#1580;&#1605;&#1610;&#1593; &#1575;&#1604;&#1576;&#1610;&#1575;&#1606;&#1575;&#1578;';
			Display_error_msg($msg);
			Lab_Form($value,$univcode,$LabName,$Capacity,$Loc);
		  }
		/*else
		if (ctype_alpha($LabName)||ctype_alnum($LabName))
		  {

			$msg='&#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1604;&#1605;&#1593;&#1575;&#1605;&#1604;';
			DisplayHeader($msg);


				$msg='&#1575;&#1587;&#1605; &#1575;&#1604;&#1605;&#1593;&#1605;&#1604; &#1604;&#1575;&#1576;&#1583; &#1575;&#1606; &#1610;&#1581;&#1578;&#1608;&#1609; &#1593;&#1604;&#1609;  &#1581;&#1585;&#1608;&#1601; &#1593;&#1585;&#1576;&#1610;&#1577; &#1608;&#1575;&#1585;&#1602;&#1575;&#1605; &#1601;&#1602;&#1591;';
			$LabName="";
			Display_error_msg($msg);
			Lab_Form($value,$univcode,$LabName,$Capacity,$Loc);
		  }*/
	   else
	   if(!(checkLName($LabName,$univcode,$value,$Loc)))
		    {

			   $msg='&#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1604;&#1605;&#1593;&#1575;&#1605;&#1604;';
			   DisplayHeader($msg);

			   $msg='&#1575;&#1587;&#1605; &#1575;&#1604;&#1605;&#1593;&#1605;&#1604; &#1605;&#1583;&#1582;&#1604; &#1605;&#1587;&#1576;&#1602;&#1575;';
			   $LabName="";
			   Display_error_msg($msg);
			   Lab_Form($value,$univcode,$LabName,$Capacity,$Loc);
		    }
		else
		if(!(ctype_digit($Capacity)))
		  {

			$msg='&#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1604;&#1605;&#1593;&#1575;&#1605;&#1604;';
			DisplayHeader($msg);

				$msg='&#1575;&#1604;&#1587;&#1593;&#1577; &#1575;&#1604;&#1603;&#1604;&#1610;&#1577; &#1604;&#1575;&#1576;&#1583; &#1605;&#1606; &#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1585;&#1602;&#1575;&#1605; &#1601;&#1602;&#1591;';
			$Capacity="";
			Display_error_msg($msg);
		    Lab_Form($value,$univcode,$LabName,$Capacity,$Loc);
		   }
		 else
		     {
				//valid data must insert into DB

				//(1)prepare the id
				$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
				//$conn = db_connect();
				$sql1="select max(SubBId) from SubBuildingSeminar where UniversityCode='$univcode' and BId='$value'";
				$result1 = mysqli_query($mysqli,$sql1);
				if (mysqli_num_rows($result1)>0 )
				{
					$row=mysqli_fetch_row($result1);
					$id=$row[0]+1;
				}
				else
				{
					$id=1;
				}

				//(2)Insert Data to Table

				$sql2 = "insert into SubBuildingSeminar (UniversityCode,BId,SubBId,SubBName,Capacity,UnLoc) values ($univcode,2,$id,'$LabName',$Capacity,'$Loc')";
				$result2 = mysqli_query($mysqil,$sql2);
				if ($result2)
				{
					$msg='&#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1604;&#1605;&#1593;&#1575;&#1605;&#1604;';
					DisplayHeader($msg);

						$msg2='&#1578;&#1605; &#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1604;&#1605;&#1593;&#1605;&#1604; &#1575;&#1604;&#1580;&#1583;&#1610;&#1583; &#1576;&#1606;&#1580;&#1575;&#1581;';
					DisplaySuccHeader($msg2);

					$LabName="";
					$Capacity="";
		          	$Loc="";
		          	Lab_Form($value,$univcode,$LabName,$Capacity,$Loc);
		        }
		        else
		        {
		          	//echo("Data not Inserted..");
		          		$msg2='&#1604;&#1605; &#1610;&#1578;&#1605; &#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1604;&#1576;&#1610;&#1575;&#1606;&#1575;&#1578; &#1575;&#1604;&#1585;&#1580;&#1575;&#1569; &#1575;&#1604;&#1605;&#1581;&#1575;&#1608;&#1604;&#1607; &#1604;&#1575;&#1581;&#1602;&#1575;';
					DisplaySuccHeader($msg2);
		        }
		  }//end of else
	 }

}
else
{
	include("ErrorPage.php");
}
?>