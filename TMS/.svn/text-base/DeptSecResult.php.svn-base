<?php

session_start();
require_once('main.php');

//***********************************************************

	//Modifided on : 08/November/2008

	//This page Display DeptSection Form

	//variable $do used to Delete or Update Registered Section

	//$do ==1 > Update

	//$do ==2 > Delete

//**********************************************************

//Page Title

Display_Title();

Background_Page();

$username=$_SESSION['username'];

if($username)
{
	include("header2.php");

	$conn = db_connect();

	//get variable
	
	$CollegeCode = $_GET['CollegeCode'];
	$CollegeCode=intval($CollegeCode);

	$uncode=$_GET['uncode'];
	$uncode=intval($uncode);
	

	$do = $_GET['do'];
	$chit=$_GET['chit'];
	
	if($chit==1)
	{
		
		$DeptNo = $_POST['D1'];
		
		//echo("in chit..".$DeptNo );
		
		//[1] get AcadDegreeId
		
		$AcadProgId=GetAcadDegreeId($uncode,$CollegeCode,$DeptNo);
	
		//echo("Acadprog=".$AcadProgId);
		//[2] get Number of Semester
		$ClassNo=GetNumberOfClasses($AcadProgId);
		
		//echo("classno".$ClassNo);
	
	}
	
	

	//prepare page's Header
	
	$href="ConfigDept.php?CollegeCode=$CollegeCode&uncode=$uncode";
	
	$header="CollegeCode=$CollegeCode&uncode=$uncode";
		
	//Href2($href,$header);
	Href2Dept($href,$header); //found on Method.php

	$flag=true;
  
  //----------------------------------------- Add New Section  ----------------------------

 
  if( ( $_POST['B3'] ) )
  {
  	// create short variable names
 
  	$DeptNo = $_POST['D1'];
   	
   	$FlagSec = $_POST['D2'];
   	
   	
   	if($FlagSec==0)
   		$SecName =""; //No Section
   	else
   		$SecName=$_POST['T1'];

    
    //[1] get AcadDegreeId
		
	$AcadProgId=GetAcadDegreeId($uncode,$CollegeCode,$DeptNo);
	
	//[2] get Number of Class(Final year)
	
	$ClassNo=GetNumberOfClasses($AcadProgId);

 	//echo($CollegeCode.$uncode."</br>". $DeptNo ."</br>"."name".$DeptName."</br>"."deg".$AcadProg."</br>NoofSem=".$noOfSem."</br>");
   
   if ( ($FlagSec==1) &&(strcmp($SecName,"")==0))
    {
    	echo("</br>");

			$msg='&#1601;&#1590;&#1604;&#1575; &#1602;&#1605; &#1576;&#1575;&#1583;&#1582;&#1575;&#1604; &#1580;&#1605;&#1610;&#1593; &#1575;&#1604;&#1576;&#1610;&#1575;&#1606;&#1575;&#1578;';
		Display_error_msg($msg,$path);
    	DeptSection_Form($CollegeCode,$uncode,$DeptNo,$SecName,$ClassNo,$FlagSec,$do);
    	$flag=false;
    }
  
	if($flag==true)
	{
 		
 		//echo("valid data..");
			
		//---------- First insert into academic Prog ------------
		
		
    	//DeptSection_Form($CollegeCode,$uncode,$DeptNo,$SecName,$ClassNo,$FlagSec,$do);
    	
    	
    	//[1] insert into DeptSection Tabel
    	
    		//get Max SecID
    		 if($FlagSec==1)
    		 {
    		 	//there is a section
    		 	
    		 	$result=mysql_query("select max(SecID) from DeptSection where 
    		 	UniversityCode='$uncode' and CollegeCode='$CollegeCode' and 
    		 	DeptNo='$DeptNo' and AcadDegreeId='$AcadProgId' and ClassNo='$ClassNo' ");
    		 	
    		 	$row=mysql_fetch_row($result);
    		 	if($row[0]==0)
    		 	{
    		 		$SecID=1;
    		 	}
    		 	else
    		 	{
    		 		$SecID=$row[0]+1;
    		 	}
					
					$sql_query3="insert into DeptSection (UniversityCode,CollegeCode,DeptNo,AcadDegreeId,ClassNo,SecID,SecName) values('$uncode','$CollegeCode','$DeptNo','$AcadProgId','$ClassNo','$SecID','$SecName')";
	        	$result3=mysql_query($sql_query3);
	        	
	        	if($result3)
	        	{
					//Successfully Inserted..
					
					//[2] Then update SecId on DeptandSem Tabel
					
					$sql_query="update DeptandSem set SecID='$SecID' where
								UniversityCode='$uncode' and CollegeCode='$CollegeCode' and 
    		 					DeptNo='$DeptNo' and AcadDegreeId='$AcadProgId' and ClassNo='$ClassNo' ";
					$resultsec=mysql_query($sql_query);

	        		if($resultsec)
	        		{
							$msg="&#1578;&#1605; &#1578;&#1587;&#1580;&#1610;&#1604; &#1575;&#1604;&#1578;&#1582;&#1589;&#1589; &#1604;&#1604;&#1602;&#1587;&#1605; &nbsp;&#1576;&#1606;&#1580;&#1575;&#1581;";
			    		DisplaySuccHeader($msg);
			    	
			    		//	echo("coll=".$CollegeCode." uncode=".$uncode."</br>dept=". $DeptNo ."</br>degid=".$AcadProgId."</br>ClassNo=".$ClassNo."</br>Flagsec=".$FlagSec."<br>secId=".$SecID);
			    		
			    		$SecName="";
			    		$FlagSec=1;
			    		$do=0;
			    	
			    		DeptSection_Form($CollegeCode,$uncode,$DeptNo,$SecName,$ClassNo,$FlagSec,$do);
					}
	        	}
	        	else
	        	{
	        		echo(" <head>
					<script>
						
						alert('Sorry, not inserted ..');
						
					</script></head>");
					
					$SecName="";
			    	$FlagSec=0;
			    	$do=0;
			    	DeptSection_Form($CollegeCode,$uncode,$DeptNo,$SecName,$ClassNo,$FlagSec,$do);
	        	}
			
			}//end of if flagsec=1
			else
			if($FlagSec==0)
			{
				//there no section inserted
				//delete from DeptSection
				 
				 $SecID=0; 
				 
				 $sql_query="delete from DeptandSem where
								UniversityCode='$uncode' and CollegeCode='$CollegeCode' and 
    		 					DeptNo='$DeptNo' and AcadDegreeId='$AcadProgId' and ClassNo='$ClassNo' ";
				 $resultsec=mysql_query($sql_query);
				if($resultsec)
				{
	        		$sql_query="delete from DeptSection where 
								UniversityCode='$uncode' and CollegeCode='$CollegeCode' and 
    		 					DeptNo='$DeptNo' and AcadDegreeId='$AcadProgId' and ClassNo='$ClassNo' ";
    		 		$resultsec=mysql_query($sql_query);
    		 	
	        		if($resultsec)
	        		{
	        				$sql_query3="insert into DeptandSem (UniversityCode,CollegeCode,DeptNo,AcadDegreeId,ClassNo,SecID,SemNo) values
	        				('$uncode','$CollegeCode','$DeptNo','$AcadProgId','$ClassNo','0','1'),
	        				('$uncode','$CollegeCode','$DeptNo','$AcadProgId','$ClassNo','0','2')";
	        			$result3=mysql_query($sql_query3);
	        			if($result3)
	        			{
	        				//cancle all Dept Sections	
	        					$msg="&#1578;&#1605; &#1581;&#1584;&#1601; &#1575;&#1604;&#1578;&#1582;&#1589;&#1589;&#1575;&#1578; &#1575;&#1604;&#1578;&#1609; &#1578;&#1605; &#1578;&#1581;&#1583;&#1610;&#1583;&#1607;&#1575; &#1576;&#1575;&#1604;&#1602;&#1587;&#1605;";
			    			DisplaySuccHeader($msg);
			    			
							//display DeptSection Form
							$FlagSec=0;
							DeptSection_Form($CollegeCode,$uncode,$DeptNo,$SecName,$ClassNo,$FlagSec,$do);
	        			
			    		}
	        		}
				}
			}

	}//end of if flag
	
  }//end of B3
   
   
   //----------------------------------------- Update Section  ----------------------------
  else
  if( ( $_POST['B1'] ) )
  {
  		//update section
  		
  		
  
  }//end of update
  
  else
  {
  	//Display DepartSection Form
    	DeptSection_Form($CollegeCode,$uncode,$DeptNo,$SecName,$ClassNo,$FlagSec,$do);
  }
}
else
{
	include("ErrorPage.php");
}

?>