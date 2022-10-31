<?php
session_start();
require_once('main.php');

//Page Title
Display_Title();


if (!($_POST['B2']))
{

	CollegeStartTimeForm($univCode,$CollegeCode,$SemNo,$StartSlot);
}
else
{
	
	Background_Page();

	include("header2.php");

	$href="welcomeCollege.php?flag=1";

	$header=$_SESSION['collegename'];

	Href2($href,$header);

	
	//Get UniversityCode
	$uncode = $_GET['uncode'];
	$univCode=intval($uncode);

	//Get CollegeCode
	$CollegeCode = $_GET['CollegeCode'];
	$CollegeCode=intval($CollegeCode);
		
	DisplayRegMenu($univCode,$CollegeCode);

	//Form data
	 
	$year=$_POST['D1'];
	
	$SemNo=$_POST['D2'];

	$StartSlot=$_POST['D3'];
	
	$GetSlot=$_POST['D3'];

	
	if (strcmp($StartSlot,"")==0)
	{
 			$msg='&#1601;&#1590;&#1604;&#1575; &#1548; &#1581;&#1583;&#1583; &#1586;&#1605;&#1606; &#1575;&#1604;&#1576;&#1583;&#1575;&#1610;&#1577; &#1604;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578;';
 		Display_error_msg($msg);
 		
 		CollegeStartTimeForm($univCode,$CollegeCode,$SemNo,$StartSlot);

	}
	else
	{
		//valid data
		
		//prepare all value [1 or 2] to be >> 7:30
		if(($StartSlot==1)||($StartSlot==2))
		{
			$StartSlot=4;
		}
		
		//Get The SlotName
		switch($GetSlot)
		{
			case 1:
			{
				$GetSlot="7:30";
				break;
			}
			case 2:
			{
				$GetSlot="8:00";
				break;
			}

		}
		
		//get start slot
		
		$slotres=mysqli_query($mysqli,"select Slot1 from TimeSlots where TSID='$StartSlot'");
		$slotrow=mysqli_fetch_row($slotres);

		//insert into
		 
			$sql3 = "insert into collegestarttime (AcadYNo,CollegeCode,UniversityCode,SemNo,TSID) values ('$year','$CollegeCode','$univCode','$SemNo','$StartSlot')";
		$result3 = mysqli_query($mysqli,$sql3);
		if ($result3)
		{
			if($SemNo==1)
			{			
					$msg='&#1578;&#1605; &#1578;&#1581;&#1583;&#1610;&#1583; &#1586;&#1605;&#1606; &#1576;&#1583;&#1575;&#1610;&#1577; &#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578; &#1604;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1575;&#1604;&#1575;&#1608;&#1604; >> '.$GetSlot;
		  	}
		  	else
			if($SemNo==2)
			{
					$msg='&#1578;&#1605; &#1578;&#1581;&#1583;&#1610;&#1583; &#1586;&#1605;&#1606; &#1576;&#1583;&#1575;&#1610;&#1577; &#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578; &#1604;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1575;&#1604;&#1579;&#1575;&#1606;&#1609; >> '.$GetSlot;
			}
		  	
		  	DisplaySuccHeader($msg);
		  	
		  	$StartSlot="";
		  	CollegeStartTimeForm($univCode,$CollegeCode,$SemNo,$StartSlot);

		}
		else
		{
			//if already inserted 
			
			$res=mysqli_query($mysqli,"select TSID from CollegeStartTime where AcadYNo='$year' and 
									CollegeCode='$CollegeCode' and 
									UniversityCode='$univCode' and 
									SemNo='$SemNo'");
			
		  
			$slot=mysqli_fetch_row($res);
			if($slot!= $StartSlot)
			{
				$PrevTimeslot=GetCollegeTimeSlot($univCode,$CollegeCode,$SemNo,$year);
					$sql3 = "update CollegeStartTime set TSID='$StartSlot' where AcadYNo='$year' and CollegeCode='$CollegeCode' and UniversityCode='$univCode' and SemNo='$SemNo'";
		   		$result3 = mysqli_query($mysqli,$sql3);
			}
			
			//update data
		   	
		   if ($result3)
		   {
	
				//Check data on Tabel ManageLec 
				
				$CurrTimeslot=GetCollegeTimeSlot($univCode,$CollegeCode,$SemNo,$year);
				$i=0;
				while($i<=22)
				{				 
					//echo("prev=".$PrevTimeslot[$i]."</br>");	
					
						$sql33 = "update managinglec set MTimes='$CurrTimeslot[$i]'  where AcadYNo='$year' and CollegeCode='$CollegeCode' and UniversityCode='$univCode' and SemNo='$SemNo' and MTimes='$PrevTimeslot[$i]'";
					$result33 = mysqli_query($mysqli,$sql33);
					if($result33)
					{
						//echo("ok");
					}
					$i++;

				}
				//-----------------------------
				if($SemNo==1)
				{			
						$msg='&#1578;&#1605; &#1578;&#1581;&#1583;&#1610;&#1583; &#1586;&#1605;&#1606; &#1576;&#1583;&#1575;&#1610;&#1577; &#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578; &#1604;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1575;&#1604;&#1575;&#1608;&#1604; >> '.$GetSlot;
		  		}
		  		else
				if($SemNo==2)
				{
						$msg='&#1578;&#1605; &#1578;&#1581;&#1583;&#1610;&#1583; &#1586;&#1605;&#1606; &#1576;&#1583;&#1575;&#1610;&#1577; &#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578; &#1604;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1575;&#1604;&#1579;&#1575;&#1606;&#1609; >> '.$GetSlot;
				}
		  	
		  		DisplaySuccHeader($msg);
		  		
		  		$StartSlot="";
		  		CollegeStartTimeForm($univCode,$CollegeCode,$SemNo,$StartSlot);
		   }//end of if
		   else
		   {
		   		//echo("data not updated..");
		   	
		   		if($SemNo==1)
				{			
						$msg='&#1578;&#1605; &#1578;&#1581;&#1583;&#1610;&#1583; &#1586;&#1605;&#1606; &#1576;&#1583;&#1575;&#1610;&#1577; &#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578; &#1604;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1575;&#1604;&#1575;&#1608;&#1604; >> '.$GetSlot;
		  		}
		  		else
				if($SemNo==2)
				{
						$msg='&#1578;&#1605; &#1578;&#1581;&#1583;&#1610;&#1583; &#1586;&#1605;&#1606; &#1576;&#1583;&#1575;&#1610;&#1577; &#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578; &#1604;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1575;&#1604;&#1579;&#1575;&#1606;&#1609; >> '.$GetSlot;
				}
		  	
		  		DisplaySuccHeader($msg);
		  		
		  		$StartSlot="";
		  		CollegeStartTimeForm($univCode,$CollegeCode,$SemNo,$StartSlot);

		   }

		}//end of elses
	
	}//end of Main-else

}//end of else

?>


<?php
//--------------------------------------------------------------------------------------------------------------------------------------------
//This Code to change time slot from each college to 7:30

/*
session_start();
require_once('main.php');

//Page Title
Display_Title();


if (!($_POST['B2']))
{

	CollegeStartTimeForm($univCode,$CollegeCode,$SemNo,$StartSlot);
}
else
{
	
	Background_Page();

	include("header2.php");

	$href="welcomeCollege.php?flag=1";

	$header=$_SESSION['collegename'];

	Href2($href,$header);

	
	//Get UniversityCode
	$uncode = $_GET['uncode'];
	$univCode=intval($uncode);

	//Get CollegeCode
	$CollegeCode = $_GET['CollegeCode'];
	$CollegeCode=intval($CollegeCode);
		
	DisplayRegMenu($univCode,$CollegeCode);

	//Form data
	 
	$year=$_POST['D1'];
	
	$SemNo=$_POST['D2'];

	$StartSlot=$_POST['D3'];

	//echo("year=".$year."</br>SemNo=".$SemNo."</br>StartSlot=".$StartSlot);
	
	if (strcmp($StartSlot,"")==0)
	{
 			$msg='&#1601;&#1590;&#1604;&#1575; &#1548; &#1581;&#1583;&#1583; &#1586;&#1605;&#1606; &#1575;&#1604;&#1576;&#1583;&#1575;&#1610;&#1577; &#1604;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578;';
 		Display_error_msg($msg);
 		
 		CollegeStartTimeForm($univCode,$CollegeCode,$SemNo,$StartSlot);

	}
	else
	{
		//valid data
		
		//get start slot
		
		$slotres=mysql_query("select Slot1 from TimeSlots where TSID='$StartSlot'");
		$slotrow=mysql_fetch_row($slotres);

		//insert into 
			$sql3 = "insert into collegestarttime (AcadYNo,CollegeCode,UniversityCode,SemNo,TSID) values ('$year','$CollegeCode','$univCode','$SemNo','$StartSlot')";
		$result3 = mysql_query($sql3);
		if ($result3)
		{
			if($SemNo==1)
			{			
					$msg='&#1578;&#1605; &#1578;&#1581;&#1583;&#1610;&#1583; &#1586;&#1605;&#1606; &#1576;&#1583;&#1575;&#1610;&#1577; &#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578; &#1604;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1575;&#1604;&#1575;&#1608;&#1604; >> '.$slotrow[0];
		  	}
		  	else
			if($SemNo==2)
			{
					$msg='&#1578;&#1605; &#1578;&#1581;&#1583;&#1610;&#1583; &#1586;&#1605;&#1606; &#1576;&#1583;&#1575;&#1610;&#1577; &#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578; &#1604;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1575;&#1604;&#1579;&#1575;&#1606;&#1609; >> '.$slotrow[0];
			}
		  	
		  	DisplaySuccHeader($msg);
		  	
		  	$StartSlot="";
		  	CollegeStartTimeForm($univCode,$CollegeCode,$SemNo,$StartSlot);

		}
		else
		{
			//if already inserted 
			
			$res=mysql_query("select TSID from CollegeStartTime where AcadYNo='$year' and 
									CollegeCode='$CollegeCode' and 
									UniversityCode='$univCode' and 
									SemNo='$SemNo'");
			
		  
			$slot=mysql_fetch_row($res);
			
			if($slot[0]!= $StartSlot)
			{
				$PrevTimeslot=GetCollegeTimeSlot($univCode,$CollegeCode,$SemNo,$year);
					$sql3 = "update CollegeStartTime set TSID='$StartSlot' where AcadYNo='$year' and CollegeCode='$CollegeCode' and UniversityCode='$univCode' and SemNo='$SemNo'";
		   		$result3 = mysql_query($sql3);
			}
			
			//update data
		   	
		   if ($result3)
		   {
				//Rechange This code
				
				//Check data on Tabel ManageLec 
				
				$CurrTimeslot=GetCollegeTimeSlot($univCode,$CollegeCode,$SemNo,$year);
				
				//check the Category of start time if it 
				if($slot[0]==1) //refer to 7:30-8:30
				{
					$i=0;
				}
				else
				if($slot[0]==2)//refer to 8:00-9:00
				{
					$i=1;
				}
				$j=0;
				while(($i<=22)&&($j<=11))
				{				 
				
					//calculate time with a half-hours
					$currslot=$CurrTimeslot[$i];
					
					//get next slot
					$currslot2=$CurrTimeslot[++$i];
					
					echo("Prev=".$PrevTimeslot[$j]."</br>cslot1=".$currslot."<br/>cslot2=".$currslot2."<br/>");
					
					//get lecture detail on previous slot					
						$result=mysql_query("select * from managinglec where AcadYNo='$year' and CollegeCode='$CollegeCode' and UniversityCode='$univCode' and SemNo='$SemNo' and MTimes='$PrevTimeslot[$j]'")or die(mysql_error());
					
					while($mrow=mysql_fetch_row($result))
					{
						//update PreviousSlot with the CurrSlot 
						
							$sql33 = "delete from managinglec where MTimes='$PrevTimeslot[$j]' and AcadYNo='$year' and CollegeCode='$CollegeCode' and UniversityCode='$univCode' and SemNo='$SemNo'";
						$result33 = mysql_query($sql33);
						
						//echo($sql33."<br/>");
						
						if($result33)
						{
							//insert next slot
						
								$sql333 = "insert into managinglec values ('$mrow[0]',$mrow[1],'$currslot',$mrow[3],$mrow[4],$mrow[5],$mrow[6],$mrow[7],$mrow[8],$mrow[9],$mrow[10],$mrow[11],'$mrow[12]',$mrow[13],$mrow[14],$mrow[15])";
							$result333 = mysql_query($sql333)or die(mysql_error());
							
							echo($sql333."</br>");
														
								$sql333 = "insert into managinglec values ('$mrow[0]',$mrow[1],'$currslot2',$mrow[3],$mrow[4],$mrow[5],$mrow[6],$mrow[7],$mrow[8],$mrow[9],$mrow[10],$mrow[11],'$mrow[12]',$mrow[13],$mrow[14],$mrow[15])";
							$result333 = mysql_query($sql333)or die(mysql_error());

								
							echo($sql333."</br>");
						}
					}//end of sub-while
					
					echo("---------------------------------------------------------------</br>");
					
					$i=$i+1;
					$j++;

				}//end of while
				
				//-----------------------------
				if($SemNo==1)
				{			
						$msg='&#1578;&#1605; &#1578;&#1581;&#1583;&#1610;&#1583; &#1586;&#1605;&#1606; &#1576;&#1583;&#1575;&#1610;&#1577; &#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578; &#1604;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1575;&#1604;&#1575;&#1608;&#1604; >> '.$slotrow[0];
		  		}
		  		else
				if($SemNo==2)
				{
						$msg='&#1578;&#1605; &#1578;&#1581;&#1583;&#1610;&#1583; &#1586;&#1605;&#1606; &#1576;&#1583;&#1575;&#1610;&#1577; &#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578; &#1604;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1575;&#1604;&#1579;&#1575;&#1606;&#1609; >> '.$slotrow[0];
				}
		  	
		  		DisplaySuccHeader($msg);
		  		
		  		$StartSlot="";
		  		CollegeStartTimeForm($univCode,$CollegeCode,$SemNo,$StartSlot);
		   }//end of if
		   else
		   {
		   	//echo("data not updated..");
		   	
		   		if($SemNo==1)
				{			
						$msg='&#1578;&#1605; &#1578;&#1581;&#1583;&#1610;&#1583; &#1586;&#1605;&#1606; &#1576;&#1583;&#1575;&#1610;&#1577; &#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578; &#1604;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1575;&#1604;&#1575;&#1608;&#1604; >> '.$slotrow[0];
		  		}
		  		else
				if($SemNo==2)
				{
						$msg='&#1578;&#1605; &#1578;&#1581;&#1583;&#1610;&#1583; &#1586;&#1605;&#1606; &#1576;&#1583;&#1575;&#1610;&#1577; &#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578; &#1604;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1575;&#1604;&#1579;&#1575;&#1606;&#1609; >> '.$slotrow[0];
				}
		  	
		  		DisplaySuccHeader($msg);
		  		
		  		$StartSlot="";
		  		CollegeStartTimeForm($univCode,$CollegeCode,$SemNo,$StartSlot);

		   }

		}//end of elses
	}//end of else

}//end of else
*/
?>