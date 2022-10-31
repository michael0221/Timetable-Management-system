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
	//universityCode

	$uncode=$_SESSION['UnivCode'];
	$header=$_SESSION['UnivName'];

	include("header.php");

	$href="university.php?id=1&uncode=$uncode#college";
	Href2($href,$header);
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
//	$conn = db_connect();


  // create short variable names

  	$colLoc= $_POST['D2'];
  	$colCode = $_POST['T1'];
  	$colName = $_POST['T3'];
  	$colUName = $_POST['T4'];
	$colPass = $_POST['T5'];

	
    if (!filled_out($_POST))
    {
    	$msg="&#1578;&#1587;&#1580;&#1610;&#1604; &#1575;&#1604;&#1603;&#1604;&#1610;&#1575;&#1578;";
		DisplayHeader($msg);
    	//echo("</br>");
			$msg='&#1601;&#1590;&#1604;&#1575; &#1602;&#1605; &#1576;&#1575;&#1583;&#1582;&#1575;&#1604; &#1580;&#1605;&#1610;&#1593; &#1575;&#1604;&#1576;&#1610;&#1575;&#1606;&#1575;&#1578;';

		Display_error_msg($msg,$path);

       	display_College_form($colLoc,$colCode,$colName,$colUName,$colPass);

    }
    else
    if ((ctype_alpha($colName)||ctype_alnum($colName))||ctype_digit($colName))
         {
         		$msg="&#1578;&#1587;&#1580;&#1610;&#1604; &#1575;&#1604;&#1603;&#1604;&#1610;&#1575;&#1578;";
				DisplayHeader($msg);

				//echo("</br>");
				//$path="InsertCollege_file/image008.gif";
					$msg='&#1575;&#1587;&#1605; &#1575;&#1604;&#1603;&#1604;&#1610;&#1577; &#1581;&#1585;&#1608;&#1601; &#1593;&#1585;&#1576;&#1610;&#1577;';
				$colName="";
				Display_error_msg($msg,$path);
	        	display_College_form($colLoc,$colCode,$colName,$colUName,$colPass);
         }
     else
		// all Characters.
      if (!ctype_alpha($colUName))
         {
				$msg="&#1578;&#1587;&#1580;&#1610;&#1604; &#1575;&#1604;&#1603;&#1604;&#1610;&#1575;&#1578;";
				DisplayHeader($msg);
    			//echo("</br>");
				//$path="InsertCollege_file/image008.gif";
					$msg="&#1575;&#1587;&#1605; &#1575;&#1604;&#1605;&#1587;&#1578;&#1582;&#1583;&#1605; &#1610;&#1580;&#1576; &#1575;&#1606; &#1610;&#1581;&#1578;&#1608;&#1609; &#1593;&#1604;&#1609; &#1581;&#1585;&#1608;&#1601; &#1575;&#1606;&#1580;&#1604;&#1610;&#1586;&#1610;&#1577; &#1601;&#1602;&#1591;";
				$colUName="";
				Display_error_msg($msg,$path);
	        	display_College_form($colLoc,$colCode,$colName,$colUName,$colPass);
         }
       else
       if (strlen($colPass)>16 || strlen($colPass)<4)
         {
         		$msg="&#1578;&#1587;&#1580;&#1610;&#1604; &#1575;&#1604;&#1603;&#1604;&#1610;&#1575;&#1578;";
				DisplayHeader($msg);

				//echo("</br>");
				//$path="InsertCollege_file/image004.gif";
					$msg="&#1603;&#1604;&#1605;&#1577; &#1575;&#1604;&#1605;&#1585;&#1608;&#1585; &#1610;&#1580;&#1576; &#1575;&#1606; &#1578;&#1581;&#1578;&#1608;&#1609; &#1593;&#1604;&#1609; 4 &#1581;&#1585;&#1608;&#1601; &#1601;&#1575;&#1603;&#1579;&#1585;";
				$colPass="";
				Display_error_msg($msg,$path);
	       		display_College_form($colLoc,$colCode,$colName,$colUName,$colPass);
         }

		// Validation College Data
         else
         {
         	// Check College Code
			/*if(!ValidCollCode($colCode,$uncode,$colLoc))
				{
					$msg="&#1578;&#1587;&#1580;&#1610;&#1604; &#1575;&#1604;&#1603;&#1604;&#1610;&#1575;&#1578;";
					DisplayHeader($msg);
					//$path="InsertCollege_file/image05.gif";
					$msg='&#1603;&#1608;&#1583; &#1575;&#1604;&#1603;&#1604;&#1610;&#1577; &#1605;&#1583;&#1582;&#1604; &#1605;&#1587;&#1576;&#1602;&#1575;&#1614;';
					$colCode="";
					Display_error_msg($msg,$path);
					display_College_form($colLoc,$colCode,$colName,$colUName,$colPass);
				}
			else*/
			// Check College Name

			if(!ValidCollName($colName,$uncode,$colLoc))
				{
					$msg="&#1578;&#1587;&#1580;&#1610;&#1604; &#1575;&#1604;&#1603;&#1604;&#1610;&#1575;&#1578;";
					DisplayHeader($msg);

					//$path="InsertCollege_file/image07.gif";
					$msg='&#1575;&#1587;&#1605; &#1575;&#1604;&#1603;&#1604;&#1610;&#1577; &#1605;&#1583;&#1582;&#1604; &#1605;&#1587;&#1576;&#1602;&#1575;&#1614;';
					$colName="";
					Display_error_msg($msg,$path);
					display_College_form($colLoc,$colCode,$colName,$colUName,$colPass);

				 }
			else
			// Check College UserName

			if(!ValidCollUserName($colUName,$uncode,$colLoc))
				{
					$msg="&#1578;&#1587;&#1580;&#1610;&#1604; &#1575;&#1604;&#1603;&#1604;&#1610;&#1575;&#1578;";
					DisplayHeader($msg);

					//$path="InsertCollege_file/image06.gif";
					$msg='&#1575;&#1587;&#1605; &#1575;&#1604;&#1605;&#1587;&#1578;&#1582;&#1583;&#1605; &#1594;&#1610;&#1585; &#1605;&#1578;&#1608;&#1601;&#1585;';
					$colUName="";
					Display_error_msg($msg,$path);
					display_College_form($colLoc,$colCode,$colName,$colUName,$colPass);
				}
			else
				{
					// Valid data..
					//echo("valid data ..");
					//echo("</br>".$colLoc."</br>".$colCode."</br>".$uncode."</br>".$colName."</br>".$colUName."</br>".$colPass);

					$msg="&#1578;&#1587;&#1580;&#1610;&#1604; &#1575;&#1604;&#1603;&#1604;&#1610;&#1575;&#1578;";
					DisplayHeader($msg);

					$sql_query1="insert into Colleges values('$colCode','$uncode','$colName','$colUName','$colPass','$colLoc') ";
					$result1=mysqli_query($mysqli,$sql_query1);
					if($result1)
						 {
							//echo("Successful...");
								$succMsg="&#1578;&#1605; &#1578;&#1587;&#1580;&#1610;&#1604; &#1575;&#1604;&#1603;&#1604;&#1610;&#1577; &#1575;&#1604;&#1580;&#1583;&#1610;&#1583;&#1577; &#1576;&#1606;&#1580;&#1575;&#1581;";
							DisplaySuccHeader($succMsg);
							
							$colLoc="";
						    $colCode="";
							$colName="";
							$colUName="";
							$colPass="";
							display_College_form($colLoc,$colCode,$colName,$colUName,$colPass);
							//document.form.submit();
				   		}

				}

		 }//end of else

}//end of if

else
{
	include("ErrorPage.php");
}
?>