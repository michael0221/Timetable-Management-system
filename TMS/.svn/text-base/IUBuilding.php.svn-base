<?php
session_start();
require_once('main.php');

//Page Title

Display_Title();

Background_Page();

if (strcmp($_SESSION['username'],"")!=0)
{
	include("header.php");
	$r = $_GET['r'];
	$value=intval($r);

	$uncode = $_GET['uncode'];
	$univcode=intval($uncode);

	$bid = $_GET['bid'];
	$Bid=intval($bid);

	//(1) update Lecture
	
	if(($value==1)&&($univcode>0)&&($Bid>0))
	{

		$LectureName=$_POST['T1'];

    	$Capacity=$_POST['T2'];

		//Get The Location Name
		$loc=GetLocName($LectureName,$univcode,$value,$Bid);
		///echo("loc= ".$loc);

		if (!filled_out($_POST))
		  {

			$href="BuildingForm.php";
			backto($href);
			$msg='&#1578;&#1593;&#1583;&#1610;&#1604; &#1576;&#1610;&#1575;&#1606;&#1575;&#1578; &#1575;&#1604;&#1602;&#1575;&#1593;&#1577;';
			DisplayHeader($msg);

		    //$path="InsertUniversity_file/image002.gif";
				$msg='&#1601;&#1590;&#1604;&#1575; &#1602;&#1605; &#1576;&#1575;&#1583;&#1582;&#1575;&#1604; &#1580;&#1605;&#1610;&#1593; &#1575;&#1604;&#1576;&#1610;&#1575;&#1606;&#1575;&#1578;';
			Display_error_msg($msg);
			Lecture_UpadteForm($value,$univcode,$LectureName,$Capacity,$Bid);
          }
        /*
        else
		if (ctype_alpha($LectureName)||ctype_alnum($LectureName))
		  {
			 $href="BuildingForm.php";
			 backto($href);

			 $msg='&#1578;&#1593;&#1583;&#1610;&#1604; &#1576;&#1610;&#1575;&#1606;&#1575;&#1578; &#1575;&#1604;&#1602;&#1575;&#1593;&#1577;';
			 DisplayHeader($msg);


				 $msg='&#1575;&#1587;&#1605; &#1575;&#1604;&#1602;&#1575;&#1593;&#1577; &#1604;&#1575;&#1576;&#1583; &#1575;&#1606; &#1610;&#1581;&#1578;&#1608;&#1609; &#1593;&#1604;&#1609; &#1581;&#1585;&#1608;&#1601; &#1593;&#1585;&#1576;&#1610;&#1577; &#1608;&#1575;&#1585;&#1602;&#1575;&#1605; &#1601;&#1602;&#1591;';
			 $LectureName="";
			 Display_error_msg($msg);
			 Lecture_UpadteForm($value,$univcode,$LectureName,$Capacity,$Bid);
          }
		
		else

		 if(!checkLName($LectureName,$univcode,$value,$loc))
		  {
			$href="BuildingForm.php";
			backto($href);

			$msg='&#1578;&#1593;&#1583;&#1610;&#1604; &#1576;&#1610;&#1575;&#1606;&#1575;&#1578; &#1575;&#1604;&#1602;&#1575;&#1593;&#1577;';
			DisplayHeader($msg);

			//$path="msg_files/image004.gif";
			$msg='&#1575;&#1587;&#1605; &#1575;&#1604;&#1602;&#1575;&#1593;&#1577; &#1605;&#1583;&#1582;&#1604; &#1605;&#1587;&#1576;&#1602;&#1575;';
			$LectureName="";
			Display_error_msg($msg);
			Lecture_UpadteForm($value,$univcode,$LectureName,$Capacity,$Bid);
		  }*/


		  else
		  
		  if(!(ctype_digit($Capacity)))
		    {
		  	  $href="BuildingForm.php";
			  backto($href);

			  $msg='&#1578;&#1593;&#1583;&#1610;&#1604; &#1576;&#1610;&#1575;&#1606;&#1575;&#1578; &#1575;&#1604;&#1602;&#1575;&#1593;&#1577;';
			  DisplayHeader($msg);


		  	    $msg='&#1575;&#1604;&#1587;&#1593;&#1577; &#1575;&#1604;&#1603;&#1604;&#1610;&#1577;  &#1604;&#1575;&#1576;&#1583; &#1605;&#1606; &#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1585;&#1602;&#1575;&#1605; &#1601;&#1602;&#1591;';
		  	  $Capacity="";
		  	  Display_error_msg($msg);
		  	  Lecture_UpadteForm($value,$univcode,$LectureName,$Capacity,$Bid);
            }
          else
		    {
		  	
		  	//valid data must insert into DB

		  	//prepare the update data

		  	$sql2 = "update SubBuildingSeminar set SubBName='$LectureName',Capacity='$Capacity' where UniversityCode='$univcode' and BId='$value' and SubBId='$Bid'";
		  	$result2 = mysql_query($sql2);
		  
		  	if ($result2)
		  	{
		  		$href="BuildingForm.php";
				backto($href);

				$msg='&#1578;&#1593;&#1583;&#1610;&#1604; &#1576;&#1610;&#1575;&#1606;&#1575;&#1578; &#1575;&#1604;&#1602;&#1575;&#1593;&#1577;';
				DisplayHeader($msg);


		  			$msg2='&#1578;&#1605; &#1578;&#1593;&#1583;&#1610;&#1604; &#1576;&#1610;&#1575;&#1606;&#1575;&#1578; &#1575;&#1604;&#1602;&#1575;&#1593;&#1577; &#1576;&#1606;&#1580;&#1575;&#1581;';
		  		DisplaySuccHeader($msg2);
		  			
		  		$LectureName="";
		  		$Capacity="";

		     }
		     else
		     {
					$href="BuildingForm.php";
					backto($href);
						$msg='&#1604;&#1575;&#1610;&#1605;&#1603;&#1606; &#1575;&#1580;&#1585;&#1575;&#1569; &#1575;&#1604;&#1578;&#1593;&#1583;&#1610;&#1604; &#1575;&#1604;&#1585;&#1580;&#1575;&#1569; &#1575;&#1604;&#1605;&#1581;&#1575;&#1608;&#1604;&#1577; &#1604;&#1575;&#1581;&#1602;&#1575;';
				    DisplayHeader($msg);
		     }
          
          }//end of else
     
     }//end of if

//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

	//(2) update Lab
	if(($value==2)&&($univcode>0)&&($Bid>0))
	{
			$LabName=$_POST['T1'];

			$Capacity=$_POST['T2'];

			//Get The Location Name
			$loc=GetLocName($LabName,$univcode,$value,$Bid);

			if (!filled_out($_POST))
			 {

				$href="BuildingForm.php";
				backto($href);
				$msg="&#1578;&#1593;&#1583;&#1610;&#1604; &#1576;&#1610;&#1575;&#1606;&#1575;&#1578; &#1575;&#1604;&#1605;&#1593;&#1605;&#1604;";
				DisplayHeader($msg);

					$msg='&#1601;&#1590;&#1604;&#1575; &#1602;&#1605; &#1576;&#1575;&#1583;&#1582;&#1575;&#1604; &#1580;&#1605;&#1610;&#1593; &#1575;&#1604;&#1576;&#1610;&#1575;&#1606;&#1575;&#1578;';
				Display_error_msg($msg);
				Lab_UpadteForm($value,$univcode,$LabName,$Capacity,$Bid);

			  }
			/*else
			if (ctype_alpha($LabName)||ctype_alnum($LabName))
				{
				  $href="BuildingForm.php";
				  backto($href);
				  $msg="&#1578;&#1593;&#1583;&#1610;&#1604; &#1576;&#1610;&#1575;&#1606;&#1575;&#1578; &#1575;&#1604;&#1605;&#1593;&#1605;&#1604;";
				  DisplayHeader($msg);


				  	$msg='&#1575;&#1587;&#1605; &#1575;&#1604;&#1605;&#1593;&#1605;&#1604; &#1604;&#1575;&#1576;&#1583; &#1575;&#1606; &#1610;&#1581;&#1578;&#1608;&#1609; &#1593;&#1604;&#1609; &#1581;&#1585;&#1608;&#1601; &#1593;&#1585;&#1576;&#1610;&#1577; &#1608;&#1575;&#1585;&#1602;&#1575;&#1605; &#1601;&#1602;&#1591;';
				  $LabName="";
				  Display_error_msg($msg);
				  Lab_UpadteForm($value,$univcode,$LabName,$Capacity,$Bid);
				}
			else
			if(!checkLName($LabName,$univcode,$value,$loc))
				{

					$href="BuildingForm.php";
					backto($href);
					$msg="&#1578;&#1593;&#1583;&#1610;&#1604; &#1576;&#1610;&#1575;&#1606;&#1575;&#1578; &#1575;&#1604;&#1605;&#1593;&#1605;&#1604;";
					DisplayHeader($msg);

					//$path="msg_files/image008.gif";
					$msg='&#1575;&#1587;&#1605; &#1575;&#1604;&#1605;&#1593;&#1605;&#1604; &#1605;&#1583;&#1582;&#1604; &#1605;&#1587;&#1576;&#1602;&#1575;';
					$LabName="";
					Display_error_msg($msg);
					Lab_UpadteForm($value,$univcode,$LabName,$Capacity,$Bid);
				}*/
			else
			if(!(ctype_digit($Capacity)))
				  {
					$href="BuildingForm.php";
					backto($href);
					$msg="&#1578;&#1593;&#1583;&#1610;&#1604; &#1576;&#1610;&#1575;&#1606;&#1575;&#1578; &#1575;&#1604;&#1605;&#1593;&#1605;&#1604;";
					DisplayHeader($msg);

						$msg='&#1575;&#1604;&#1587;&#1593;&#1577; &#1575;&#1604;&#1603;&#1604;&#1610;&#1577;  &#1604;&#1575;&#1576;&#1583; &#1605;&#1606; &#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1585;&#1602;&#1575;&#1605; &#1601;&#1602;&#1591;';
					$Capacity="";
					Display_error_msg($msg);
					Lab_UpadteForm($value,$univcode,$LabName,$Capacity,$Bid);
		          }
			else
			  {
				//valid data must insert into DB

				//prepare the update data

				$sql2 = "update SubBuildingSeminar set SubBName='$LabName',Capacity='$Capacity' where UniversityCode=$univcode and BId=$value and SubBId=$Bid";
				$result2 = mysql_query($sql2);

				if ($result2)
				 {
					$href="BuildingForm.php";
					backto($href);

					$msg="&#1578;&#1593;&#1583;&#1610;&#1604; &#1576;&#1610;&#1575;&#1606;&#1575;&#1578; &#1575;&#1604;&#1605;&#1593;&#1605;&#1604;";
					DisplayHeader($msg);

					//$msg2='&#1578;&#1605; &#1578;&#1593;&#1583;&#1610;&#1604; &#1576;&#1610;&#1575;&#1606;&#1575;&#1578; &#1575;&#1604;&#1605;&#1593;&#1605;&#1604;';
						$msg2='&#1578;&#1605; &#1578;&#1593;&#1583;&#1610;&#1604; &#1576;&#1610;&#1575;&#1606;&#1575;&#1578; &#1575;&#1604;&#1605;&#1593;&#1605;&#1604; &#1576;&#1606;&#1580;&#1575;&#1581;';
					DisplaySuccHeader($msg2);
					$LectureName="";
					$Capacity="";
				}
				else
				 {
					$href="BuildingForm.php";
					backto($href);

					$msg="&#1578;&#1593;&#1583;&#1610;&#1604; &#1576;&#1610;&#1575;&#1606;&#1575;&#1578; &#1575;&#1604;&#1605;&#1593;&#1605;&#1604;";
					DisplayHeader($msg);

					//echo("Data not updated..");
				 }
              }//end of else

	 }//end of if

}//end of if
else
{
	include("ErrorPage.php");
}
?>