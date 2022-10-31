<?php
// This Page to Insert New Location..

//session_start();
require_once('main.php');
require_once('University_Method.php');
//Page Title

Display_Title();


//$username=$_SESSION['username'];

if($univCode>0)
 {

	//Display Header
	$msg3="&#1575;&#1583;&#1582;&#1575;&#1604; &#1601;&#1585;&#1593; (&#1605;&#1608;&#1602;&#1593;) &#1580;&#1583;&#1610;&#1583;";
	DisplayHeader($msg3);

	insert_University_Locations($univCode);
	$location=$_POST['T1'];

	//Validate Data..
	//(1)Validate Integer Values
		  if(ctype_digit($location))
	      {
	      	$msg2="&#1575;&#1587;&#1605; &#1575;&#1604;&#1605;&#1608;&#1602;&#1593; &#1594;&#1610;&#1585; &#1589;&#1581;&#1610;&#1581;";
			Display_error_msg($msg2);
	      }
	      else

	 //(2)Duplicated Entery..
	      if(!SerachForLoc($location,$univCode))
	      {
			$msg2="&#1575;&#1587;&#1605; &#1575;&#1604;&#1601;&#1585;&#1593; (&#1575;&#1604;&#1605;&#1608;&#1602;&#1593;) &#1605;&#1583;&#1582;&#1604; &#1605;&#1587;&#1576;&#1602;&#1575;";
			Display_error_msg($msg2);
	      }
	      else
	      {
			//data Valid
			if((strcmp($location,"")!=0)&& ($univCode>0))
			{
			  //valid data must insert into DB

			  //(1)prepare the id
			  $mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');

				db_connect();

				$sql_get="select count(LocId) from UnivLoc where UniversityCode='$univCode'";
				$result_get = mysqli_query($mysqli,$sql_get);
				if (mysqli_num_rows($result_get)>0 )
				  {
					$row_get=mysqli_fetch_row($result_get);
					$id=$row_get[0]+1;
				  }
				else
				 {
					$id=1;
				 }

			  //(2)Insert Data to Table

				//echo("datavalid="."id=".$id.$location."univcode=".$univCode);
				//echo("datavalid="."id=".$id);
				$sql_query1="insert into UnivLoc values('$id','$univCode','$location') ";
				$result1=mysqli_query($mysqli,$sql_query1);
				$location="";
			 }//end of if
		   }// end of else

 }//end of if
else
{
	include("ErrorPage.php");
}

?>