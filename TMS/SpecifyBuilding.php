<?php
session_start();
require_once('main.php');
require_once('College_Method.php');

//Page Title

Display_Title();

if (strcmp($_SESSION['username'],"")!=0)
{
	$conn = db_connect();
	
	Background_Page();
	include("header2.php");
	
	//return to ConfigNewYear
	
	//Get UniversityCode
	$uncode = $_GET['uncode'];
	$univcode=intval($uncode);

	//Get CollegeCode
	$CollegeCode = $_GET['CollegeCode'];
	$CollegeCode=intval($CollegeCode);
	
	//
	$op = $_GET['op'];//refer to op[ (1 >>Lecture) || (2 >> Lab)]
	$op=intval($op);
	
	$tabval = $_GET['tab'];//choice of Tab on page

	
	$href="ConfigNewYear.php?uncode=$univcode&CollegeCode=$CollegeCode&op=$op&value=$tabval";
	
	if($op==1)
			$header="&#1578;&#1587;&#1580;&#1610;&#1604; &#1575;&#1604;&#1602;&#1575;&#1593;&#1575;&#1578; &#1575;&#1604;&#1605;&#1578;&#1575;&#1581;&#1577; &#1604;&#1604;&#1603;&#1604;&#1610;&#1577;";
	else
	if($op==2)
		$header="	&#1578;&#1587;&#1580;&#1610;&#1604; &#1575;&#1604;&#1605;&#1593;&#1575;&#1605;&#1604; &#1575;&#1604;&#1605;&#1578;&#1575;&#1581;&#1577; &#1604;&#1604;&#1603;&#1604;&#1610;&#1577;";

	
	Href2($href,$header);
	
	if($_POST['B1'])
	{
		//Get Form's Field
		
		$Loc=$_POST['D2'];
		
		$BuildName=$_POST['T1'];

    	$Capacity=$_POST['T2'];
		
		//echo("loc=".$Loc."</br> BuildName=".$BuildName."</br>capacity=".$Capacity);
		
		//--------------------------------------------------------------------
	 	// Lectures
		//--------------------------------------------------------------------

		if(($op==1)&&($univcode>0))
		{
			if (!filled_out($_POST))
		 	 {

				$msg='&#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1604;&#1602;&#1575;&#1593;&#1575;&#1578;';
				DisplayHeader($msg);

					$msg='&#1601;&#1590;&#1604;&#1575; &#1602;&#1605; &#1576;&#1575;&#1583;&#1582;&#1575;&#1604; &#1580;&#1605;&#1610;&#1593; &#1575;&#1604;&#1576;&#1610;&#1575;&#1606;&#1575;&#1578;';
				Display_error_msg($msg);
				
				CollegeLecture_Form($op,$univcode,$BuildName,$Capacity,$Loc,$CollegeCode,$tabval);
          	}
        	else
         	//check if the LectureRoom Insert into
         	// the same Location
         	if((checkLName($BuildName,$univcode,$op,$Loc)==false))
         	{

				$msg='&#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1604;&#1602;&#1575;&#1593;&#1575;&#1578;';
				DisplayHeader($msg);

					$msg='&#1575;&#1587;&#1605; &#1575;&#1604;&#1602;&#1575;&#1593;&#1577; &#1605;&#1583;&#1582;&#1604; &#1605;&#1587;&#1576;&#1602;&#1575;';
				//$msg="error name";
				$BuildName="";
				Display_error_msg($msg);
				CollegeLecture_Form($op,$univcode,$BuildName,$Capacity,$Loc,$CollegeCode,$tabval);
         	}
         	else
         	if(!(ctype_digit($Capacity)))
		 	{

			 	$msg='&#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1604;&#1602;&#1575;&#1593;&#1575;&#1578;';
			 	DisplayHeader($msg);

			 		$msg='&#1575;&#1604;&#1587;&#1593;&#1577; &#1575;&#1604;&#1603;&#1604;&#1610;&#1577;  &#1604;&#1575;&#1576;&#1583; &#1605;&#1606; &#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1585;&#1602;&#1575;&#1605; &#1601;&#1602;&#1591;';
			 	$Capacity="";
			 	Display_error_msg($msg);
				CollegeLecture_Form($op,$univcode,$BuildName,$Capacity,$Loc,$CollegeCode,$tabval);
          	}
          	else
          	{
				//valid data must insert into DB
				
				//(1)prepare the id

				$conn = db_connect();
				$sql1="select max(SubBId) from SubBuildingSeminar where UniversityCode='$univcode' and BId='$op'";
				$result1 = mysqli_query($mysqli,$sql1);
				if (mysqli_num_rows($result1)>0 )
			  	{
					$row=mysqli_fetch_row($result1);
					$id=$row[0]+1;
					//echo("id= ".$id);
			  	}
				else
			 	{
					$id=1;
			 	}
			
			
			//(2)Insert Data to Table
			
			//echo("</br>univ=".$univcode."</br> BID".$id."</br> ".$BuildName."</br>cap= ".$Capacity."</br> loc=".$Loc);
			
			
				$sql3 = "insert into SubBuildingSeminar (UniversityCode,BId,SubBId,SubBName,Capacity,UnLoc) values ('$univcode','1','$id','$BuildName','$Capacity','$Loc')";
			$result3 = mysqli_query($mysqli,$sql3);
		  	if ($result3)
		  	{
				$msg='&#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1604;&#1602;&#1575;&#1593;&#1575;&#1578;';
				DisplayHeader($msg);

					$msg2='&#1578;&#1605; &#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1604;&#1602;&#1575;&#1593;&#1577; &#1575;&#1604;&#1580;&#1583;&#1610;&#1583;&#1577; &#1576;&#1606;&#1580;&#1575;&#1581;';
				DisplaySuccHeader($msg2);

				$BuildName="";
				$Capacity="";
				$Loc="";
				CollegeLecture_Form($op,$univcode,$BuildName,$Capacity,$Loc,$CollegeCode,$tabval);
          	}
          	else
          	{
          		//echo("Data not Inserted..");
          			$msger='&#1604;&#1605; &#1610;&#1578;&#1605; &#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1604;&#1576;&#1610;&#1575;&#1606;&#1575;&#1578; &#1575;&#1604;&#1585;&#1580;&#1575;&#1569; &#1575;&#1604;&#1605;&#1581;&#1575;&#1608;&#1604;&#1607; &#1604;&#1575;&#1581;&#1602;&#1575;';
				DisplaySuccHeader($msger);
          	}
          	
          }//end of else

	 }//end of if value=1
	else
	
	 //--------------------------------------------------------------------
	 // Labaratories
	 //--------------------------------------------------------------------
	
	if(($op==2)&&($univcode>0))
		{
			if (!filled_out($_POST))
		 	 {

				$msg='&#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1604;&#1605;&#1593;&#1575;&#1605;&#1604;';
				DisplayHeader($msg);

					$msg='&#1601;&#1590;&#1604;&#1575; &#1602;&#1605; &#1576;&#1575;&#1583;&#1582;&#1575;&#1604; &#1580;&#1605;&#1610;&#1593; &#1575;&#1604;&#1576;&#1610;&#1575;&#1606;&#1575;&#1578;';
				Display_error_msg($msg);
				
				CollegeLecture_Form($op,$univcode,$BuildName,$Capacity,$Loc,$CollegeCode,$tabval);
          	}
        	else
         	//check if the LectureRoom Insert into
         	// the same Location
         	if((checkLName($BuildName,$univcode,$op,$Loc)==false))
         	{

				$msg='&#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1604;&#1605;&#1593;&#1575;&#1605;&#1604;';
				DisplayHeader($msg);

					$msg='&#1575;&#1587;&#1605; &#1575;&#1604;&#1605;&#1593;&#1605;&#1604; &#1605;&#1583;&#1582;&#1604; &#1605;&#1587;&#1576;&#1602;&#1575;&#1611;';
				
				//$msg="error name";
				$BuildName="";
				Display_error_msg($msg);
				CollegeLecture_Form($op,$univcode,$BuildName,$Capacity,$Loc,$CollegeCode,$tabval);
         	}
         	else
         	if(!(ctype_digit($Capacity)))
		 	{

			 	$msg='&#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1604;&#1605;&#1593;&#1575;&#1605;&#1604;';
			 	DisplayHeader($msg);

			 		$msg='&#1575;&#1604;&#1587;&#1593;&#1577; &#1575;&#1604;&#1603;&#1604;&#1610;&#1577;  &#1604;&#1575;&#1576;&#1583; &#1605;&#1606; &#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1585;&#1602;&#1575;&#1605; &#1601;&#1602;&#1591;';
			 	$Capacity="";
			 	Display_error_msg($msg);
				CollegeLecture_Form($op,$univcode,$BuildName,$Capacity,$Loc,$CollegeCode,$tabval);
          	}
          	else
          	{
				//valid data must insert into DB
				
				//(1)prepare the id

				$conn = db_connect();
				$sql1="select max(SubBId) from SubBuildingSeminar where UniversityCode='$univcode' and BId='$op'";
				$result1 = mysqli_query($mysqli,$sql1);
				if (mysqli_num_rows($result1)>0 )
			  	{
					$row=mysqli_fetch_row($result1);
					$id=$row[0]+1;
					//echo("id= ".$id);
			  	}
				else
			 	{
					$id=1;
			 	}
			
			
			//(2)Insert Data to Table
			
			//echo("</br>univ=".$univcode."</br> BID".$id."</br> ".$BuildName."</br>cap= ".$Capacity."</br> loc=".$Loc);
			
			
				$sql3 = "insert into SubBuildingSeminar (UniversityCode,BId,SubBId,SubBName,Capacity,UnLoc) values ('$univcode','2','$id','$BuildName','$Capacity','$Loc')";
			$result3 = mysqli_query($Mysqli,$sql3);
		  	if ($result3)
		  	{
				$msg='&#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1604;&#1605;&#1593;&#1575;&#1605;&#1604;';
				DisplayHeader($msg);

					$msg2='&#1578;&#1605; &#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1604;&#1605;&#1593;&#1605;&#1604; &#1576;&#1606;&#1580;&#1575;&#1581;';
				DisplaySuccHeader($msg2);

				$BuildName="";
				$Capacity="";
				$Loc="";
				CollegeLecture_Form($op,$univcode,$BuildName,$Capacity,$Loc,$CollegeCode,$tabval);
          	}
          	else
          	{
          		//echo("Data not Inserted..");
          			$msger='&#1604;&#1605; &#1610;&#1578;&#1605; &#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1604;&#1576;&#1610;&#1575;&#1606;&#1575;&#1578; &#1575;&#1604;&#1585;&#1580;&#1575;&#1569; &#1575;&#1604;&#1605;&#1581;&#1575;&#1608;&#1604;&#1607; &#1604;&#1575;&#1581;&#1602;&#1575;';
				DisplaySuccHeader($msger);
          	}
          	
          }//end of else

	 }//end of if value=2

	 //
	}//end of Post[B1]
	else
	{
		//Display Form
		CollegeLecture_Form($op,$univcode,$BuildName,$Capacity,$Loc,$CollegeCode,$tabval);
	}

}//end of main if
else
{
	include("ErrorPage.php");
}
?>