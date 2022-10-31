<?php
session_start();

require_once('main.php');

//Page Title

Display_Title();

$conn = db_connect();
Background_Page();

//Page Title
Display_Title();

$username=$_SESSION['username'];

if($username)
{
	include("header2.php");
	//get variables
	$AcadDeg = $_GET['AcadDeg'];
	$AcadDeg=intval($AcadDeg);

	$Classno = $_GET['Class'];
	$Classno=intval($Classno);

	$CollegeCode = $_GET['CollegeCode'];
	$CollegeCode1=intval($CollegeCode);

	$uncode=$_GET['uncode'];
	$uncode1=intval($uncode);

	$DeptNo = $_GET['Dept'];
	$DeptNo=intval($DeptNo);

	$Sem = $_GET['Sem'];
	$Sem=intval($Sem);
		
	$SecID= $_GET['SecID'];
	$SecID=intval($SecID);
	
	//echo("secid=".$SecID);

	$f = $_GET['f'];
	$f=intval($f);

	$year=$_SESSION['year'];

	$value = $_GET['value'];
	$value=intval($value);
	
	//do update
	$update = $_GET['update'];
	$update=intval($update);


	//College header
	Display_welcomeHeader_College($_SESSION['collegename']);

	//Deptartment Header

	$deptName=GetDeptName($uncode1,$CollegeCode1,$DeptNo);
	//
	if($f==1)
	{
		$href="CollegeManage.php?AcadDeg=$AcadDeg&uncode=$uncode&CollegeCode=$CollegeCode&Dept=$DeptNo#AcadDegree";
		$header=$deptName."&nbsp;&gt;&nbsp;"."&#1578;&#1587;&#1580;&#1610;&#1604; &#1575;&#1604;&#1605;&#1608;&#1575;&#1583;";
		Href2($href,$header);

	}
	else
	{
		$href="ConfigDept.php?AcadDeg=$AcadDeg&uncode=$uncode&CollegeCode=$CollegeCode&Dept=$DeptNo#AcadDegree";
		$head="&nbsp;&#1604;&#1604;&#1593;&#1575;&#1605; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; ".$year;
		$header=$deptName."&nbsp;&gt;&nbsp;"."&#1578;&#1587;&#1580;&#1610;&#1604; &#1575;&#1604;&#1605;&#1608;&#1575;&#1583;".$head;
		Href2($href,$header);
	}
	// Display Menu [Add New || update Subject]

 	DisplaySubjectMenu($uncode1,$CollegeCode1,$AcadDeg,$DeptNo,$Classno,$Sem);

if($value==1)
{
	//Insert New Subject
	if((($uncode1>0)&&($CollegeCode1>0))&&(($AcadDeg>0)&&($DeptNo>0)))
	  {
		if(($Classno>0)&&($Sem>0))
		 {
			$flag=true;
			 // create short variable names

			 $SubCode = $_POST['T3'];
			 $SubName = $_POST['T4'];
			 $SubHour=$_POST['T5'];
			 $SubTHour=$_POST['T6'];//SubTHour
			 $stype= $_POST['T7']; //labhour

			 //echo($SubCode."</br>".$SubName."</br>". $SubHour ."</br>".$SubTHour."</br>".$stype);
			 if (!filled_out($_POST))
			    {
			    	echo("</br>");
						$msg='&#1601;&#1590;&#1604;&#1575; &#1602;&#1605; &#1576;&#1575;&#1583;&#1582;&#1575;&#1604; &#1580;&#1605;&#1610;&#1593; &#1575;&#1604;&#1576;&#1610;&#1575;&#1606;&#1575;&#1578;';
					Display_error_msg($msg,$path);
					Subject_Form($uncode1,$CollegeCode1,$AcadDeg,$DeptNo,$Classno,$Sem,$f,$SubCode,$SubName,$SubHour,$SubTHour,$stype,$SecID);
			    	$flag=false;
    			}
    			//Check fields
    		else
    			//consist Numbers and Letters
    		if((!ctype_alnum($SubCode))&&((!ctype_alpha($SubCode)) || (!ctype_digit($SubCode))))
		 	{
					echo("</br>");
						$msg="&#1603;&#1608;&#1583; &#1575;&#1604;&#1605;&#1575;&#1583;&#1577; &#1610;&#1580;&#1576; &#1575;&#1606; &#1610;&#1581;&#1578;&#1608;&#1609; &#1593;&#1604;&#1609; &#1575;&#1585;&#1602;&#1575;&#1605; &#1608;&#1581;&#1585;&#1608;&#1601; &#1601;&#1602;&#1591;";
					Display_error_msg($msg,$path);
					$SubCode="";
					Subject_Form($uncode1,$CollegeCode1,$AcadDeg,$DeptNo,$Classno,$Sem,$f,$SubCode,$SubName,$SubHour,$SubTHour,$stype,$SecID);
					$flag=false;
    		}
			else
			if(!Check_SubCode($CollegeCode,$uncode,$DeptNo,$AcadDeg,$Sem,$Classno,$SubCode,$year,$SecID))
			{
				echo("</br>");
					$msg="&#1578;&#1605; &#1575;&#1583;&#1582;&#1575;&#1604; &#1603;&#1608;&#1583; &#1575;&#1604;&#1605;&#1575;&#1583;&#1577; &#1605;&#1587;&#1576;&#1602;&#1575;";
				Display_error_msg($msg,$path);
				$SubCode="";
				Subject_Form($uncode1,$CollegeCode1,$AcadDeg,$DeptNo,$Classno,$Sem,$f,$SubCode,$SubName,$SubHour,$SubTHour,$stype,$SecID);
				$flag=false;
			}
			//$SubName= contains arabic Characters & Numbers
			/*else
			if(ctype_alnum($SubName)||ctype_alpha($SubName))
			{
					echo("</br>");
					$msg="&#1575;&#1587;&#1605; &#1575;&#1604;&#1605;&#1575;&#1583;&#1577; &#1594;&#1610;&#1585; &#1589;&#1581;&#1610;&#1581;";
					Display_error_msg($msg,$path);
					$SubName="";
					Subject_Form($uncode1,$CollegeCode1,$AcadDeg,$DeptNo,$Classno,$Sem,$f,$SubCode,$SubName,$SubHour,$SubTHour,$stype,$SecID);
					$flag=false;
			}*/
			else
			if(!Check_SubName($CollegeCode,$uncode,$DeptNo,$AcadDeg,$Sem,$Classno,$SubName,$SecID))
				{
					echo("</br>");
						$msg="&#1578;&#1605; &#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1587;&#1605; &#1575;&#1604;&#1605;&#1575;&#1583;&#1577; &#1605;&#1587;&#1576;&#1602;&#1575;";
					Display_error_msg($msg,$path);
					$SubName="";
					Subject_Form($uncode1,$CollegeCode1,$AcadDeg,$DeptNo,$Classno,$Sem,$f,$SubCode,$SubName,$SubHour,$SubTHour,$stype,$SecID);
					$flag=false;
				}
			else
			//$SubHour=contains Numbers and must be <=6
			if((!ctype_digit($SubHour))||(!(($SubHour>=0)&&($SubHour<=6))))
			{
					echo("</br>");
						$msg="&#1587;&#1575;&#1593;&#1575;&#1578; &#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1577; &#1610;&#1580;&#1576; &#1575;&#1606; &#1578;&#1603;&#1608;&#1606; &#1575;&#1585;&#1602;&#1575;&#1605; &#1605;&#1606; (1 -- 6 ) &#1601;&#1602;&#1591; ";
					Display_error_msg($msg,$path);
					$SubHour="";
					Subject_Form($uncode1,$CollegeCode1,$AcadDeg,$DeptNo,$Classno,$Sem,$f,$SubCode,$SubName,$SubHour,$SubTHour,$stype,$SecID);
					$flag=false;
			}
			else
			//$SubTHour=contains Numbers and must be <=3
			if((!ctype_digit($SubTHour))||(!(($SubTHour>=0)&&($SubTHour<=9))))
			{
					echo("</br>");
						$msg="&#1587;&#1575;&#1593;&#1575;&#1578; &#1575;&#1604;&#1578;&#1605;&#1575;&#1585;&#1610;&#1606; &#1610;&#1580;&#1576; &#1575;&#1606; &#1578;&#1603;&#1608;&#1606; &#1575;&#1585;&#1602;&#1575;&#1605; &#1601;&#1602;&#1591;";
					Display_error_msg($msg,$path);
					$SubTHour="";
					Subject_Form($uncode1,$CollegeCode1,$AcadDeg,$DeptNo,$Classno,$Sem,$f,$SubCode,$SubName,$SubHour,$SubTHour,$stype,$SecID);
					$flag=false;
			}
			else
			//$SubLabHour= contains Numbers (0-9)
			if((!ctype_digit($stype))||(!(($stype>=0)&&($stype<=9))))
			{
					echo("</br>");
						$msg="&#1587;&#1575;&#1593;&#1575;&#1578; &#1575;&#1604;&#1578;&#1605;&#1575;&#1585;&#1610;&#1606; &#1610;&#1580;&#1576; &#1575;&#1606; &#1578;&#1603;&#1608;&#1606; &#1575;&#1585;&#1602;&#1575;&#1605; &#1601;&#1602;&#1591;";
					Display_error_msg($msg,$path);
					$stype="";
					Subject_Form($uncode1,$CollegeCode1,$AcadDeg,$DeptNo,$Classno,$Sem,$f,$SubCode,$SubName,$SubHour,$SubTHour,$stype,$SecID);
					$flag=false;
			}
    		if($flag==true)
			{
 				$year=$_SESSION['year'];
				//echo($year);
 				//echo("valid data..");
				//Note: if(SubType==2) then SubTHour=0
				//now check

			   	 //add new Subject
				 if(($SubTHour>0)||($SubTHour==0))
				 {
						//insert Subject as Lecture
							$sql3 = "insert into CollegeSubject (AcadYNo,DeptNo,CollegeCode,UniversityCode,AcadDegreeId,ClassNo,SecID,SemNo,SubCode,SubName,SubHour,SubTHour,SubType) values ('$year','$DeptNo','$CollegeCode1','$uncode1','$AcadDeg','$Classno','$SecID','$Sem',UCASE('$SubCode'),'$SubName','$SubHour','$SubTHour','1')";
						$result3 = mysql_query($sql3);
						if ($result3)
		  				{
						  //Check LabHour
						  if($stype>0)
						  {
							//that means this Subject has LabHour and
							// you Must inserted it with new Code Like This:
							//(1) Create New SubCode with Letter 'L'

							$SubCode=$SubCode."L";
							$SubHour=$stype;
							$SubTHour=0;

							//echo("Lab = code=".$SubCode."</br>hour=".$SubHour."</br>thour=".$SubTHour);

								$sql33 = "insert into CollegeSubject (AcadYNo,DeptNo,CollegeCode,UniversityCode,AcadDegreeId,ClassNo,SecID,SemNo,SubCode,SubName,SubHour,SubTHour,SubType) values ('$year','$DeptNo','$CollegeCode1','$uncode1','$AcadDeg','$Classno','$SecID','$Sem',UCASE('$SubCode'),'$SubName','$SubHour','$SubTHour','2')";
							$result33 = mysql_query($sql33);
							if ($result33)
		  					{
									$msg="&#1578;&#1605; &#1578;&#1587;&#1580;&#1610;&#1604; &#1576;&#1610;&#1575;&#1606;&#1575;&#1578; &#1575;&#1604;&#1605;&#1575;&#1583;&#1577; &#1576;&#1606;&#1580;&#1575;&#1581;";
								DisplaySuccHeader($msg);

 								$SubCode = "";
								$SubName = "";
								$SubHour="";
								$SubTHour="";
			 					$stype="";
 								
 									Subject_Form($uncode1,$CollegeCode1,$AcadDeg,$DeptNo,$Classno,$Sem,$f,$SubCode,$SubName,$SubHour,$SubTHour,$stype,$SecID);
 							}//if3
 							else
 							{
								//Duplicated Data
 								//echo("Data already Existed..");
 									$msg="&#1578;&#1605; &#1575;&#1583;&#1582;&#1575;&#1604; &#1607;&#1584;&#1607; &#1575;&#1604;&#1576;&#1610;&#1575;&#1606;&#1575;&#1578; &#1605;&#1587;&#1576;&#1602;&#1575;";
 								Display_error_msg($msg,$path);

 								$SubCode = "";
								$SubName = "";
								$SubHour="";
								$SubTHour="";
								$stype="";
 									Subject_Form($uncode1,$CollegeCode1,$AcadDeg,$DeptNo,$Classno,$Sem,$f,$SubCode,$SubName,$SubHour,$SubTHour,$stype,$SecID);

 							}
 						  }//end of if stype
 						  else
 						  {
								$msg="&#1578;&#1605; &#1578;&#1587;&#1580;&#1610;&#1604; &#1576;&#1610;&#1575;&#1606;&#1575;&#1578; &#1575;&#1604;&#1605;&#1575;&#1583;&#1577; &#1576;&#1606;&#1580;&#1575;&#1581;";
								DisplaySuccHeader($msg);

 								$SubCode = "";
								$SubName = "";
								$SubHour="";
								$SubTHour="";
			 					$stype="";
 									Subject_Form($uncode1,$CollegeCode1,$AcadDeg,$DeptNo,$Classno,$Sem,$f,$SubCode,$SubName,$SubHour,$SubTHour,$stype,$SecID);
 						  }

					    }//if1
						else
 						{
 							//Duplicated Data
 							//echo("Data already Existed..");
 								$msg="&#1578;&#1605; &#1575;&#1583;&#1582;&#1575;&#1604; &#1607;&#1584;&#1607; &#1575;&#1604;&#1576;&#1610;&#1575;&#1606;&#1575;&#1578; &#1605;&#1587;&#1576;&#1602;&#1575;";
 							Display_error_msg($msg,$path);

 							$SubCode = "";
							$SubName = "";
							$SubHour="";
							$SubTHour="";
							$stype="";
 								Subject_Form($uncode1,$CollegeCode1,$AcadDeg,$DeptNo,$Classno,$Sem,$f,$SubCode,$SubName,$SubHour,$SubTHour,$stype,$SecID);
 					    }//end of else
				  }//end of if
				
	 	     }//if $flag
	 }
	}//end of if
	else
	{
		include("ErrorPage.php");
	}
 }//end of if $value=1

else
if($value==2)
{
	//Update Subject Details
	//echo("update ..");
	if((($uncode1>0)&&($CollegeCode1>0))&&(($AcadDeg>0)&&($DeptNo>0)))
	  {
		if(($Classno>0)&&($Sem>0))
		 {
			$flag=true;
			 // create short variable names

			 $year = $_POST['D1'];
			 $SubName = $_POST['D2'];

			 //echo($SubName."</br>".$year);
			 if (!filled_out($_POST))
			    {
			    	echo("</br>");
						$msg='&#1601;&#1590;&#1604;&#1575; &#1602;&#1605; &#1576;&#1575;&#1583;&#1582;&#1575;&#1604; &#1580;&#1605;&#1610;&#1593; &#1575;&#1604;&#1576;&#1610;&#1575;&#1606;&#1575;&#1578;';
					Display_error_msg($msg,$path);
					Subject_UpdateForm($uncode1,$CollegeCode1,$AcadDeg,$DeptNo,$Classno,$Sem,$f,$SubName,$year);
			    	$flag=false;
    			}

    		if($flag==true)
			{

 				//echo("valid data..");
				//Now before insert select details of Subject from
				// CollegeSubject table
				//(1)

				$MaxYear=intval($year);

				$oldyear1=$MaxYear-1;
				$oldyear2=$MaxYear-2;

				$oldYear=$oldyear1."/".$oldyear2;

				//echo("old=".$oldYear);
				$counter=0;

				$sql="select SubCode,SubHour,SubTHour,SubType from CollegeSubject where

					UniversityCode='$uncode' and
					CollegeCode='$CollegeCode' and
					DeptNo='$DeptNo' and AcadDegreeId='$AcadDeg' and
					ClassNo='$Classno' and SecID='$SecID' and 
					SubName='$SubName' and AcadYNo='$oldYear'";

				$result = mysql_query($sql);

				$count=mysql_num_rows($result);


			  if($count>0)
			  {
				while($row=mysql_fetch_row($result))
				{
					//Now you insert the subject with all
					$SubCode=$row[0];
					$SubHour=$row[1];
					$SubTHour=$row[2];
					$stype=$row[3];
					//echo("</br>subcode=".$SubCode."subh=".$SubHour."th=".$SubTHour."st=".$stype);
						$sql2 = "insert into CollegeSubject (AcadYNo,DeptNo,CollegeCode,UniversityCode,AcadDegreeId,ClassNo,SecID,SemNo,SubCode,SubName,SubHour,SubTHour,SubType) values ('$year','$DeptNo','$CollegeCode1','$uncode1','$AcadDeg','$Classno','$SecID','$Sem',UCASE('$SubCode'),'$SubName','$SubHour','$SubTHour','$stype')";
					$result2 = mysql_query($sql2);
					$counter=$counter+1;

				}
				if($counter==$count)
				{
					//echo("all data inserted");
						$msg="&#1578;&#1605; &#1578;&#1587;&#1580;&#1610;&#1604; &#1576;&#1610;&#1575;&#1606;&#1575;&#1578; &#1575;&#1604;&#1605;&#1575;&#1583;&#1577; &#1576;&#1606;&#1580;&#1575;&#1581;";
					DisplaySuccHeader($msg);
			 		$SubName ="";
					Subject_UpdateForm($uncode1,$CollegeCode1,$AcadDeg,$DeptNo,$Classno,$Sem,$f,$SubName,$year);
				}
			  }
			  else
			  {
			  	//this means no data
			  	//echo();
			  }


	 	  }//if $flag
	  }
	}//end of if
	else
	{
		include("ErrorPage.php");
	}
  }//end of if value2
  else
  if($update==1)
	{
		// create short variable names
        $oldSubCode=$_GET['SubCode']; //old subcode
		
		$SubCode = $_POST['T3'];
		$SubName = $_POST['T4'];
		$SubHour=$_POST['T5'];
		$SubTHour=$_POST['T6'];//SubTHour
		$SubLHour= $_POST['T7']; //labhour

		//update subject details
					
		//echo("do update..</br>");
					
		//echo("subcode=".$SubCode."</br>Name:".$SubName."</br>hour=".$SubHour."</br>thour=".$SubTHour."</br>Lhour=".$SubLHour);
		
		
		$res = mysql_query("update CollegeSubject set SubName='$SubName',SubHour='$SubHour',SubTHour='$SubTHour',SubCode='$SubCode' where
									AcadYNo='$year' and
									UniversityCode='$uncode' and
									CollegeCode='$CollegeCode' and
									DeptNo='$DeptNo' and AcadDegreeId='$AcadDeg' and
									ClassNo='$Classno' and SecID='$SecID' and 
									SemNo='$Sem' and SubCode='$oldSubCode'");
		
		if($res)
		{
			//update LabHour
			if($SubLHour >0)
			{
				//$SubLCode=$SubCode."L";
				
				$SubLCode=$oldSubCode."L";
				
				if(!Check_SubCode($CollegeCode,$uncode,$DeptNo,$AcadDeg,$Sem,$Classno,$SubLCode,$year,$SecID))
				{
					$res2 = mysql_query("update CollegeSubject set SubName='$SubName',SubHour='$SubLHour' where
									AcadYNo='$year' and
									UniversityCode='$uncode' and
									CollegeCode='$CollegeCode' and
									DeptNo='$DeptNo' and AcadDegreeId='$AcadDeg' and
									ClassNo='$Classno' and SecID='$SecID' and 
									SemNo='$Sem' and SubCode='$SubLCode'");
				}
				else
				{
						$sql2 = "insert into CollegeSubject (AcadYNo,DeptNo,CollegeCode,UniversityCode,AcadDegreeId,ClassNo,SecID,SemNo,SubCode,SubName,SubHour,SubTHour,SubType) values ('$year','$DeptNo','$CollegeCode1','$uncode1','$AcadDeg','$Classno','$SecID','$Sem',UCASE('$SubLCode'),'$SubName','$SubLHour','0','2')";
					$res2 = mysql_query($sql2);
				}	
				
				
			}//end of sublhour>0
			else
			{
				//delete subject
				$SubLCode=$oldSubCode."L";

				$res2 = mysql_query("delete from CollegeSubject where
									AcadYNo='$year' and
									UniversityCode='$uncode' and
									CollegeCode='$CollegeCode' and
									DeptNo='$DeptNo' and AcadDegreeId='$AcadDeg' and
									ClassNo='$Classno' and SecID='$SecID' and 
									SemNo='$Sem' and SubCode='$SubLCode'");

				$check=true;
			}
				
			if (($res2)||($check==true))
			{
			  		echo("<script> alert('Successfully Updated..');</script>");
			  
			  		$SubCode ="";
			  		$SubName ="";
			  		$SubHour="";
		      		$SubTHour="";
		      		$SubLHour="";
			  
 			  		Subject_Form($uncode1,$CollegeCode1,$AcadDeg,$DeptNo,$Classno,$Sem,$f,$SubCode,$SubName,$SubHour,$SubTHour,$SubLHour,$SecID);
			}
			else
			{
				echo("not updated..");
			}
			
		}//end res
			
	}//end if update==1	
}//end of main if
else
	{
		include("ErrorPage.php");
	}
?>