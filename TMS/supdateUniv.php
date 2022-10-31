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
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
	//$conn = db_connect();
	$flag=true;
  // create short variable names
  	$uncode11 = $_GET['uncode11'];
  	$uncode=intval($uncode11);
	//echo($uncode);
	if($uncode>0)
	{
		//back to prevoius Page
		$href="university.php?id=1";
		backto($href);

		$univCode = $_POST['T1'];
		$univName = $_POST['T3'];
		$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
//		$conn = db_connect();
		$sql = "select Logo,UniversityName,UniversityCode from Universities where UniversityCode='$uncode'";
		$result = mysqli_query($mysqli,$sql);
		$row=mysqli_fetch_row($result);
		//real Data from DB
		$logo=$row[0];
		$unName=$row[1];
		$code=$row[2];

		if(strcmp(basename($_FILES['uploadedfile']['name']),"")!=0)
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
			if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
			$uploaded=1;
			$message="The file ". basename( $_FILES['uploadedfile']['name']). " has been uploaded";
			}
			else{
			$message="There was an error uploading the file, please try again!";
			}
			//echo $message;
			//if($uploaded==1)
			//print('<p><a href="upload/'.$newfile.'">View File</a></p>');
	    }//end of if
	    else
	    {
	    	$newfile=$logo;

	    }
	   // if(univcode==$row[2])

   //echo($univCode."</br>".$univName ."</br>".$newfile);
    if (((strcmp($univCode,"")==0)||(strcmp($univName,"")==0))||(strcmp($newfile,"")==0))
    {
    	//$path="InsertUniversity_file/image002.gif";
		$msg='&#1601;&#1590;&#1604;&#1575; &#1602;&#1605; &#1576;&#1575;&#1583;&#1582;&#1575;&#1604; &#1580;&#1605;&#1610;&#1593; &#1575;&#1604;&#1576;&#1610;&#1575;&#1606;&#1575;&#1578;';
		Display_error_msg($msg);
       	UpdateUniv_Form($uncode,$univCode,$univName,$newfile);
       	$flag=false;
     }
     else

     if(($univCode!=$code)||(strcmp($univName,$unName)!=0))
     {
	 	if($univCode!=$code)
	 	{
	 		if(checkUniversityCode($univCode))
	  		{
	  	 	//$path="InsertUniversity_file/image004.gif";
	  	 	$msg='&#1603;&#1608;&#1583; &#1575;&#1604;&#1580;&#1575;&#1605;&#1593;&#1577; &#1605;&#1583;&#1582;&#1604; &#1605;&#1587;&#1576;&#1602;&#1575;&#1611;';
	  	 	Display_error_msg($msg);
	  	 	UpdateUniv_Form($uncode,$univCode,$univName,$newfile);
		 	$flag=false;
	  		}
	  	}
	 	else
	   	if(!(ctype_digit($univCode)))
	  	{
	  	  $msg='&#1603;&#1608;&#1583; &#1575;&#1604;&#1580;&#1575;&#1605;&#1593;&#1577; &#1594;&#1610;&#1585; &#1589;&#1581;&#1610;&#1581; ( &#1604;&#1575;&#1576;&#1583; &#1605;&#1606; &#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1585;&#1602;&#1575;&#1605; &#1601;&#1602;&#1591;)';
	  	  $univCode="";
	  	  Display_error_msg($msg);
	  	  UpdateUniv_Form($uncode,$univCode,$univName,$newfile);
	  	  $flag=false;
	  	}

	  	else
      	if(strcmp($univName,$unName)!=0)
	  	{
      		if(checkUniversityName($univName))
	  		{
	  	   	$msg='&#1575;&#1587;&#1605; &#1575;&#1604;&#1580;&#1575;&#1605;&#1593;&#1577; &#1605;&#1583;&#1582;&#1604; &#1605;&#1587;&#1576;&#1602;&#1575;&#1611;';
	  	   	Display_error_msg($msg);
	  	   	UpdateUniv_Form($uncode,$univCode,$univName,$newfile);
	  		$flag=false;
	  		}
	  	}
      	else
      	if ((ctype_alpha($univName)||ctype_alnum($univName))||ctype_digit($univName))
       	{
			$msg='&#1603;&#1608;&#1583; &#1575;&#1604;&#1580;&#1575;&#1605;&#1593;&#1577; &#1605;&#1583;&#1582;&#1604; &#1605;&#1587;&#1576;&#1602;&#1575;&#1611;)';
			$univName="";
			Display_error_msg($msg);
	   	 	UpdateUniv_Form($uncode,$univCode,$univName,$newfile);
			$flag=false;
       	}
      }
      	//else
		if($flag==true)
		{
			//valid data must be inserted ..

		    $msg='&#1578;&#1605; &#1578;&#1593;&#1583;&#1610;&#1604; &#1575;&#1604;&#1580;&#1575;&#1605;&#1593;&#1577; &#1576;&#1606;&#1580;&#1575;&#1581;';
			DisplaySuccHeader($msg);
			//echo($univCode."</br>".$univName ."</br>".$newfile);

            //(1)update Code
			$sql_query1="update Universities set UniversityCode='$univCode' where UniversityCode='$uncode'";
	        $result1=mysqli_query($mysqli,$sql_query1);

         	//(2)Update Name
         	$sql_query2="update Universities set UniversityName='$univName' where UniversityCode='$uncode'";
	        $result2=mysqli_query($mysqli,$sql_query2);

	        //(3) update Logo
	        $sql_query3="update Universities set  Logo='$newfile' where UniversityCode='$uncode'";
	        $result3=mysqli_query($mysqli,$sql_query3);

			//(4) Update UniversityCode on UnivLoc Table
			$sql_query4="update UnivLoc set UniversityCode='$univCode' where UniversityCode='$uncode'";
			$result4=mysqli_query($mysqli,$sql_query4);
			//

		 }//end of else

  }
}
else
{
}
?>