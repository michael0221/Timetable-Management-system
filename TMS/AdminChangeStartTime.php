<?php

session_start();

require_once('main.php');

//-------------------------------------------------------------------------
//This page used to Change the StartTime on each College on each University

//Create on : Wendseday-18/2/2009

//Creater: Hind from SUST

//Copywrite : @SUST
//-------------------------------------------------------------------------

//Page Title

Display_Title();

Background_Page();

if (strcmp($_SESSION['username'],"")!=0)
{

	include("header.php");
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
	
	//$conn = db_connect();
	
	//return Menu
	$href="welcomeAdmin.php";
	Href($href);
	
	$StartSlot=4;

	if($_POST['BS'])
	{
		$univCode=$_POST['UnivCode'];
		$univCode=intval($univCode);
		
		$year=$_POST['MaxYear'];
		
		$SemNo=$_POST['SemNo'];

	
		//[1] get Univerity Code
	
		//[2] Select all Colleges on University
	
		$sql2 = "select CollegeCode,CollegeName from Colleges where UniversityCode='$univCode' order by CollegeCode";
		$result2 = mysqli_query($mysqli,$sql2);

		while($rowc = mysqli_fetch_row($result2))
		{
			$CollegeCode=$rowc[0];
			
			$CollegeName=$rowc[1];
			
			//if already inserted 
			
			$res=mysqli_query($mysqli,"select TSID from CollegeStartTime where AcadYNo='$year' and 
									CollegeCode='$CollegeCode' and 
									UniversityCode='$univCode' and 
									SemNo='$SemNo'");
			
			$slot=mysqli_fetch_row($res);
			
			if($slot[0]!= $StartSlot)
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
					
				//check the Category of start time if it 
				if($slot[0]==1) //refer to 7:30-8:30
				{
					$i=0;
				}
				else
				if ($slot[0]==2)//refer to 8:00-9:00
				{
					$i=1;
				}
				else
				if ($slot[0]==3)//refer to 8:30-9:30
				{
					$i=2;
				}

				$j=0;
				
				while(($i<=22)&&($j<=11))
				{				 
					
					//calculate time with a half-hours
					
					$currslot=$CurrTimeslot[$i];
					$currslot2=$CurrTimeslot[++$i];
						
					//get lecture detail on previous slot					
					
						$result=mysqli_query($mysqli,"select * from managinglec where AcadYNo='$year' and CollegeCode='$CollegeCode' and UniversityCode='$univCode' and SemNo='$SemNo' and MTimes='$PrevTimeslot[$j]'")or die($mysql_error());
						
					while($mrow=mysqli_fetch_row($result))
					{
						
						//update PreviousSlot with the CurrSlot 
								
							$sql33 = "update managinglec set MTimes='$currslot' where MTimes='$PrevTimeslot[$j]' and AcadYNo='$year' and CollegeCode='$CollegeCode' and UniversityCode='$univCode' and SemNo='$SemNo'";
						$result33 = mysqli_query($mysqli,$sql33);
								
						if($result33)
						{
							//after update Time slot[1]
										
							//insert Time slot[2]
							
								$sql333 = "insert into managinglec values ('$mrow[0]',$mrow[1],'$currslot2',$mrow[3],$mrow[4],$mrow[5],$mrow[6],$mrow[7],$mrow[8],$mrow[9],$mrow[10],$mrow[11],'$mrow[12]',$mrow[13],$mrow[14],$mrow[15])";
							$result333 = mysqli_query($mysqli,$sql333)or die($mysql_error());
		
						}//end of if
								
					}//end of sub-while
					
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
			  	
			  	$msg=$msg."<br/>".$CollegeName."</br>";
			  	
			  	DisplaySuccHeader($msg);
			  		
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
			  	
			  		$msg=$msg."<br/>".$CollegeName."</br>";
			  		DisplaySuccHeader($msg);
			   
			   }//end of else
			   
		}//end of while-College
	
		display_AdminChangSlot_form($year,$SemNo,$univCode);
	
	}//end of POST[BS]
	else
	{
		$SemNo=1;
		$year=GetMaxYear();
		
		display_AdminChangSlot_form($year,$SemNo,$univCode);
	}
	
}//end of session
else
{
	include("ErrorPage.php");
}
?>