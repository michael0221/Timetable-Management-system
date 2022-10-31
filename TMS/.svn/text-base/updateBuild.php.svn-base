<?php
session_start();
require_once('main.php');

//Page Title

Display_Title();

Background_Page();

$username=$_SESSION['username'];

if($username)
{
	include("header.php");

	$href="BuildingForm.php?id=2";
	backto($href);

	$r = $_GET['r'];
	$value=intval($r);

	$univCode = $_GET['univCode'];
	$uncode=intval($univCode);

	$BID = $_GET['BID'];
	$Bid=intval($BID);

	//delete
	$OP=$_GET['op'];
	$OPV=intval($OP);

  	if($OPV!=3)//check if operation=3 then we must delete the data
  	{
		//echo($value."</br>".$uncode."</br>".$Bid);
		if(($value==1)&&($uncode>0))
	  	{
			$msg='&#1578;&#1593;&#1583;&#1610;&#1604; &#1576;&#1610;&#1575;&#1606;&#1575;&#1578; &#1575;&#1604;&#1602;&#1575;&#1593;&#1577;';
			DisplayHeader($msg);
			$conn = db_connect();
	  		$sql = "select SubBName,Capacity  from SubBuildingSeminar where SubBId='$Bid' and BId='$value' and
			UniversityCode='$uncode'";
			$result = mysql_query($sql);
			$row=mysql_fetch_row($result);
	  		Lecture_UpadteForm($value,$uncode,$row[0],$row[1],$Bid);

      	}//end of if
		else
		if(($value==2)&&($uncode>0))
		{
		
			$msg='&#1578;&#1593;&#1583;&#1610;&#1604; &#1576;&#1610;&#1575;&#1606;&#1575;&#1578; &#1575;&#1604;&#1605;&#1593;&#1605;&#1604;';
			DisplayHeader($msg);
			$conn = db_connect();
	  		$sql = "select SubBName,Capacity from SubBuildingSeminar where SubBuildingSeminar.SubBId='$Bid' and SubBuildingSeminar.BId='$value' and
			SubBuildingSeminar.UniversityCode='$uncode'";
			$result = mysql_query($sql);
			$row=mysql_fetch_row($result);
	  		Lab_UpadteForm($value,$uncode,$row[0],$row[1],$Bid);
		}
  }//end of OPV if
  else
  {
	// delete SubBuilding Seminar..
	if($value==1)
	{
		$header='&#1581;&#1584;&#1601; &#1576;&#1610;&#1575;&#1606;&#1575;&#1578; &#1575;&#1604;&#1602;&#1575;&#1593;&#1577;';
	}
	else
	{
		$header='&#1581;&#1584;&#1601; &#1576;&#1610;&#1575;&#1606;&#1575;&#1578; &#1575;&#1604;&#1605;&#1593;&#1605;&#1604;';
	}
	DisplayHeader($header);

	//(1) Get the Name of building
	$conn = db_connect();
	$sql = "select SubBName,UnLoc from SubBuildingSeminar where SubBId='$Bid' and BId='$value' and
	UniversityCode='$uncode'";
	$result = mysql_query($sql);
	$row=mysql_fetch_row($result);

	//(2)delete SubBuilding Seminar
	$conn = db_connect();
	$sql2 = "delete from SubBuildingSeminar where UniversityCode='$uncode' and SubBId='$Bid' and BId='$value' and UnLoc='$row[1]'";
	$result2 = mysql_query($sql2);
	if($result2)
	 {

		if($value==1)
	     {
		  $msg='&#1578;&#1605; &#1581;&#1584;&#1601; &#1575;&#1604;&#1602;&#1575;&#1593;&#1577;  '.$row[0].'   &#1576;&#1606;&#1580;&#1575;&#1581;';
	     }
	    else
	     {
	     	$msg='&#1578;&#1605; &#1581;&#1584;&#1601; &#1575;&#1604;&#1605;&#1593;&#1605;&#1604; '.$row[0].'   &#1576;&#1606;&#1580;&#1575;&#1581;';
	     }
		DisplaySuccHeader($msg);
	 }
  }//end of else
}//end of if
else
{
	include('ErrorPage.php');
}
?>