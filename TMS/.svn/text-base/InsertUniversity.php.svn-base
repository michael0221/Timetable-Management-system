<?php
session_start();
require_once('main.php');
require_once('University_Method.php');
//Page Title

Display_Title();

Background_Page();
$username=$_SESSION['username'];
$uploaded=0;
if($username)
{
	include("header.php");
	$href="university.php?id=1";
	$header="&#1578;&#1587;&#1580;&#1610;&#1604; &#1575;&#1604;&#1580;&#1575;&#1605;&#1593;&#1575;&#1578; ";
	Href2($href,$header);

	$conn = db_connect();
  // create short variable names

  	$univCode = $_POST['T1'];
  	$univName = $_POST['T3'];

	$uploaded=$_GET['uploaded'];
	$uploaded=intval($uploaded);

	if($uploaded==0)
	{
		$filename="logo/"."un".$univCode;
		$target_path = "/";

		$target_path = $target_path . basename( $_FILES['uploadedfile']['name']);
		$_FILES['uploadedfile']['tmp_name']; // temp file
		$target_path = "logo/"; //for my pc
		$original_file = basename($_FILES['uploadedfile']['name']);
		$pos = strpos($original_file,".",0);
		$ext = trim(substr($original_file,$pos+1,strlen($original_file))," ");
		$newfile = $filename . "." . $ext;

		$target_path = $target_path . basename($newfile);

		//if(basename( $_FILES['uploadedfile']['name']))
		//echo("picture==".$newfile);
		if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path))
		{
			$uploaded=1;

			//$message="The file ". basename( $_FILES['uploadedfile']['name']). " has been uploaded";
			//print('<p><a href="/'.$newfile.'">View File</a></p>');
		}
	 }
	/*else
	//{
	//	$message="There was an error uploading the file, please try again!";
	//}
	//echo $message;
	if($uploaded==1)
		print('<p><a href="upload/'.$newfile.'">View File</a></p>');
	*/
	//echo("pic=".basename( $_FILES['uploadedfile']['name']));
   //$i=0;

   if(!filled_out($_POST))
    {
    	echo("</br>");
		$id=1;
    	$path="InsertUniversity_file/image002.gif";
		$msg='&#1601;&#1590;&#1604;&#1575; &#1602;&#1605; &#1576;&#1575;&#1583;&#1582;&#1575;&#1604; &#1580;&#1605;&#1610;&#1593; &#1575;&#1604;&#1576;&#1610;&#1575;&#1606;&#1575;&#1578;';

		Display_error_msg($msg,$path);
       	display_University_form($univCode,$univName,$newfile,$uploaded);

        //$href="welcomeAdmin.php";
		//Href($href);
      }
     else
	 if(!(ctype_digit($univCode)))
	     {
	     	$id=1;
	     	echo("</br>");
	     	$path="InsertUniversity_file/image001.gif";
	      	$msg='&#1603;&#1608;&#1583; &#1575;&#1604;&#1580;&#1575;&#1605;&#1593;&#1577; &#1594;&#1610;&#1585; &#1589;&#1581;&#1610;&#1581; ( &#1604;&#1575;&#1576;&#1583; &#1605;&#1606; &#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1585;&#1602;&#1575;&#1605; &#1601;&#1602;&#1591;)';
			$univCode="";
	      	Display_error_msg($msg,$path);
	        display_University_form($univCode,$univName,$newfile,$uploaded);
	        // $href="welcomeAdmin.php";
	 		//Href($href);
         }
      else
      if ((ctype_alpha($univName)||ctype_alnum($univName))||ctype_digit($univName))
         {		$id=1;
				echo("</br>");
				$path="InsertUniversity_file/image004.gif";
				$msg='&#1603;&#1608;&#1583; &#1575;&#1604;&#1580;&#1575;&#1605;&#1593;&#1577; &#1605;&#1583;&#1582;&#1604; &#1605;&#1587;&#1576;&#1602;&#1575;&#1611;)';
				$univName="";
				Display_error_msg($msg,$path);
	        	display_University_form($univCode,$univName,$filename,$uploaded);

         }
      else
      if($uploaded!=1)
      {
		$path="InsertUniversity_file/image006.gif";
		$msg='Error upload pic';
		Display_error_msg($msg,$path);
		display_University_form($univCode,$univName,$newfile,$uploaded);

      }
      else{
         	db_connect();
			$sql_query="select * from Universities ";
			$result=mysql_query($sql_query);

			while($row=mysql_fetch_row($result))
			{
			// Check Duplicated Code
			if( $univCode==$row[0])
			{

				$path="InsertUniversity_file/image004.gif";
				$msg='&#1603;&#1608;&#1583; &#1575;&#1604;&#1580;&#1575;&#1605;&#1593;&#1577; &#1605;&#1583;&#1582;&#1604; &#1605;&#1587;&#1576;&#1602;&#1575;&#1611;';
				Display_error_msg($msg,$path);
				display_University_form($univCode,$univName,$newfile,$uploaded);

				$id=1;
				break;
				}
			else
				//Duplicated Name
				if( $univName==$row[1])
				{
					$path="InsertUniversity_file/image005.gif";
				 	$msg='&#1575;&#1587;&#1605; &#1575;&#1604;&#1580;&#1575;&#1605;&#1593;&#1577; &#1605;&#1583;&#1582;&#1604; &#1605;&#1587;&#1576;&#1602;&#1575;&#1611;';
				    Display_error_msg($msg,$path);
				    display_University_form($univCode,$univName,$newfile,$uploaded);

					$id=1;
					break;
				}
			}
			if ($id!=1)
			{
					//echo($newfile);
				    //Display_error_msg($msg,$path);
					//Display_msg($msg,$path);
					$sql_query1="insert into Universities values('$univCode','$univName','$newfile') ";
	         		$result1=mysql_query($sql_query1);
					if($result1)
					{
				    // after insert University data you must
				    // insert the Locations of the University

					$path="InsertUniversity_file/image006.gif";
				 	$msg='&#1578;&#1605; &#1578;&#1587;&#1580;&#1610;&#1604; &#1575;&#1604;&#1580;&#1575;&#1605;&#1593;&#1577; &#1575;&#1604;&#1580;&#1583;&#1610;&#1583;&#1577; &#1576;&#1606;&#1580;&#1575;&#1581;';
				    DisplaySuccHeader($msg);
					$univCode="";
					$univName="";
					$newfile="";
					$uploaded=0;
				    display_University_form($univCode,$univName,$newfile,$uploaded);
				    }
			}
		}//end of else

}
?>