<?php

session_start();
require_once('main.php');

//***********************************************************

	//Modifided on : 03/October/2008

	//This page Display Department's Form

	//variable $do used to Delete or Update Registered Depart

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

	
	if($do==1) 
		$header="&#1578;&#1593;&#1583;&#1610;&#1604; &#1576;&#1610;&#1575;&#1606;&#1575;&#1578; &#1575;&#1604;&#1602;&#1587;&#1605;";
	else
	
	if($do==2)	
		$header="&#1581;&#1584;&#1601; &#1576;&#1610;&#1575;&#1606;&#1575;&#1578; &#1575;&#1604;&#1602;&#1587;&#1605;";
	
	else
		$header="&#1578;&#1587;&#1580;&#1610;&#1604; &#1575;&#1604;&#1575;&#1602;&#1587;&#1575;&#1605;";
	
	
	$href="ConfigDept.php?CollegeCode=$CollegeCode&uncode=$uncode";
	
	Href2($href,$header);

	$flag=true;
  

//----------------------------------------- Update Operation ----------------------------
  if($do==1)
  {
  	//Do Update
  	$AcadProgId = $_GET['AcadId'];
  	
  	//Get DeptNo
   	$DeptNo=GetDeptNo($uncode,$CollegeCode,$AcadProgId);

  	if($_POST['B1'])
  	{
  	
  		$DeptName = $_POST['T2'];
   		$AcadProg = $_POST['T3'];
   		$noOfSem = $_POST['T4'];
   		$ProgType=$_POST['DProgType'];

   		   		
   		//[1]update Department Name
   		
   			$res=mysql_query("update Departments set DeptName='$DeptName' where UniversityCode='$uncode' and CollegeCode='$CollegeCode' and DeptNo='$DeptNo' and AcadDegreeId='$AcadProgId'");
   		
   		if($res)
   		{
   			//[2]update AcadProg Name or NoOfSem

			$res=mysql_query("update AcadDegree set AcadDegreeName='$AcadProg', NoOfSemester='$noOfSem', AcadProgType='$ProgType' where AcadDegreeId='$AcadProgId'");
				
			if($res)
			{
				echo("<head>

						<script>
						
						alert('Successfully Update..');
						
						location='ConfigDept.php?CollegeCode=$CollegeCode&uncode=$uncode';
					    
					    </script></head>");

			}
			else
			{
				echo("<head>

						<script>
						
						alert('Sorry , Unable to Update .. ');
						
						location='ConfigDept.php?CollegeCode=$CollegeCode&uncode=$uncode';
					    
					    </script></head>");

			}
   		}
   		else
   		{
   			echo("<head>

					<script>
						
						alert('Sorry , Unable to Update .. ');
						
						location='ConfigDept.php?CollegeCode=$CollegeCode&uncode=$uncode';
					    
					</script></head>");

   		}

  	}//end of POST['B1']
  	else
  	{
  		  		
  		$AcadDetail=GetAcadProg($AcadProgId);

  		$AcadProg=$AcadDetail[0];
  		$noOfSem=$AcadDetail[1];
  		$ProgType=$AcadDetail[2];
  	

  		$DeptName=GetDeptName($uncode,$CollegeCode,$DeptNo);
  	
  		DisplayDept_Form($CollegeCode,$uncode,$DeptName,$AcadProg,$noOfSem,$do,$AcadProgId,$ProgType);

  	}//end of else

  }//end of if(op==1)
 

 //----------------------------------------- Delete Operation ----------------------------
 else
 if($do==2)
 {
 	//Do Delete
  	$AcadProgId = $_GET['AcadId'];
  	
  	//Get DeptNo
   	$DeptNo=GetDeptNo($uncode,$CollegeCode,$AcadProgId);

	if($_POST['B2'])
  	{
  		//delete from Three tables( DeptandSem | Departments | AcadDegree )
  		  
  		$res=mysql_query("delete from DeptandSem  where UniversityCode='$uncode' and CollegeCode='$CollegeCode' and DeptNo='$DeptNo' and AcadDegreeId='$AcadProgId'");
  		  	
  		if($res)
  		{
  		  	$res=mysql_query("delete from Departments where UniversityCode='$uncode' and CollegeCode='$CollegeCode' and DeptNo='$DeptNo' and AcadDegreeId='$AcadProgId'");
  		  	
  		  if($res)
  		  {
  		  	  	$res=mysql_query("delete from AcadDegree where AcadDegreeId='$AcadProgId'");
  		  	  	
  		  	  	if($res)
  		  	  	{
  		  	  		//Successfully Complete
  		  	  		
  		  	  		echo("<head>

							<script>
						
							alert('Successfully Delete..');
						
							location='ConfigDept.php?CollegeCode=$CollegeCode&uncode=$uncode';
					    
					    	</script></head>");

  		  	  		
  		  	  	}
  		  	  	else
  		  	  	{
  		  	  		echo("<head>

					<script>
						
						alert('Sorry , Unable to Delete .. ');
						
						location='ConfigDept.php?CollegeCode=$CollegeCode&uncode=$uncode';
					    
					</script></head>");

  		  	  	}

  		  }
  		  else
  		  {
  		  		echo("<head>

					<script>
						
						alert('Sorry , Unable to Update .. ');
						
						location='ConfigDept.php?CollegeCode=$CollegeCode&uncode=$uncode';
					    
					</script></head>");

  		  }

  		}
  		else
  		{
  			echo("<head>

					<script>
						
						alert('Sorry , Unable to Update .. ');
						
						location='ConfigDept.php?CollegeCode=$CollegeCode&uncode=$uncode';
					    
					</script></head>");
  		}
  		
	}//end of if POST['B2']
	else
	{
		//Display Detail 
		
		$AcadDetail=GetAcadProg($AcadProgId);

  		$AcadProg=$AcadDetail[0];
  		$noOfSem=$AcadDetail[1];
  		$ProgType=$AcadDetail[2];
  	
  		$DeptName=GetDeptName($uncode,$CollegeCode,$DeptNo);
  	
  		DisplayDept_Form($CollegeCode,$uncode,$DeptName,$AcadProg,$noOfSem,$do,$AcadProgId,$ProgType);

	}//end of else
 
 }//end of if do==2
 
  //----------------------------------------- Add New Depart  ----------------------------

  else
  if($_POST['B3'])
  {
  	// create short variable names
 
  	$DeptName = $_POST['T2'];
   	$AcadProg = $_POST['T3'];
   	$noOfSem = $_POST['T4'];
    $ProgType=$_POST['DProgType'];


 	//echo($CollegeCode.$uncode."</br>". $DeptNo ."</br>"."name".$DeptName."</br>"."deg".$AcadProg."</br>NoofSem=".$noOfSem."</br>");
   
   if (!filled_out($_POST))
    {
    	echo("</br>");

			$msg='&#1601;&#1590;&#1604;&#1575; &#1602;&#1605; &#1576;&#1575;&#1583;&#1582;&#1575;&#1604; &#1580;&#1605;&#1610;&#1593; &#1575;&#1604;&#1576;&#1610;&#1575;&#1606;&#1575;&#1578;';
		Display_error_msg($msg,$path);
    	DisplayDept_Form($CollegeCode,$uncode,$DeptName,$AcadProg,$noOfSem,$do,$AcadProgId,$ProgType);
    	$flag=false;
    }
    else
    if(strcmp($AcadProg,"")!=0)
    {
	 if(!(Check_Dept($CollegeCode,$uncode,$DeptName,$AcadProg)))
	     {

	     	echo("</br>");
	      		$msg="&#1578;&#1605; &#1575;&#1583;&#1582;&#1575;&#1604; &#1607;&#1584;&#1575; &#1575;&#1604;&#1602;&#1587;&#1605; &#1605;&#1587;&#1576;&#1602;&#1575;";
	      	Display_error_msg($msg,$path);
	      	$DeptName="";
			DisplayDept_Form($CollegeCode,$uncode,$DeptName,$AcadProg,$noOfSem,$do,$AcadProgId,$ProgType);
			$flag=false;
		}
	}
	else
    if(!ctype_digit($noOfSem))
    {
		// ”ÃÌ· «·»—«„Ã «·«ﬂ«œÌ„Ì…    		
		//$msg="&#1575;&#1604;&#1576;&#1585;&#1575;&#1605;&#1580; &#1575;&#1604;&#1575;&#1603;&#1575;&#1583;&#1610;&#1605;&#1610;&#1577;";
		//DisplayHeader($msg);
				
			$msg='&#1593;&#1583;&#1583; &#1575;&#1604;&#1601;&#1589;&#1608;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1610;&#1577; &#1604;&#1575;&#1576;&#1583; &#1571;&#1606; &#1610;&#1603;&#1608;&#1606; &#1571;&#1585;&#1602;&#1575;&#1605; &#1601;&#1602;&#1591;';

		Display_error_msg($msg,$path);
		
		$noOfSem="";

       	DisplayDept_Form($CollegeCode,$uncode,$DeptName,$AcadProg,$noOfSem,$do,$AcadProgId,$ProgType);
       	
       	$flag=false;

    }

	if($flag==true)
	{
 		//echo("valid data..");
			
		//---------- First insert into academic Prog ------------
			
		$res=mysql_query("select max(AcadDegreeId) from acaddegree");
    			
    	$rows=mysql_fetch_row($res);
    			
    	if(intval($rows[0]==0))
    	{
    		$AcadId=1;
    	}
    	else
    	{
    		$AcadId=intval($rows[0])+1;
    	}

		//echo("</br>Insert AcadProg:</br>Prog Id=".$AcadId."</br>"."name=".$AcadProg."</br>NoofSem=".$noOfSem."</br>");
	
			$res2=mysql_query("insert into acaddegree( `AcadDegreeId` , `AcadDegreeName` , `NoOfSemester`, `AcadProgType`) VALUES ('$AcadId','$AcadProg','$noOfSem','$ProgType')");
				
		if(	$res2)
		{
			
			//(1)prepare the id
			$sql1="select max(DeptNo) from Departments where UniversityCode='$uncode' and  CollegeCode='$CollegeCode'";
			$result1 = mysql_query($sql1);
			if (mysql_num_rows($result1)>0 )
			  {
				$row=mysql_fetch_row($result1);
				$id=$row[0]+1;
			  }
			else
			 {
				$id=1;
			 }
			
			//	echo("</br>insert Depart:</br> id=".$id."</br>coll=".$CollegeCode."</br>univ=".$uncode."</br>AcadId=".$AcadId."</br>dept=".$DeptName);
				
			//---------------------------------------------------------------
			//Insert into following tables:[ Departments, DeptandSem ]
			
			//[1] insert into Department	
			$sql_query3="insert into Departments(DeptNo,CollegeCode,UniversityCode,AcadDegreeId,DeptName) values('$id','$CollegeCode','$uncode','$AcadId','$DeptName')";
	        $result3=mysql_query($sql_query3);

			if($result3)
			{
			 	//[2] insert into table Dept&Sem
				// Get No of Years in this Depart
				
				$NoOFYear=ceil($noOfSem/2);
				
				echo("levels= ".$NoOFYear);
			
				//Get Number of Semester on Each Class Year [Two Semesters]
				$sql333 = "select SemNo,ClassNo from Semester where ClassNo<='$NoOFYear'";
				$result333 = mysql_query($sql333);
				while($row333=mysql_fetch_row($result333))
				{
					//insert the ClassNo and SemNo
						$sql_query33="insert into DeptandSem(UniversityCode,CollegeCode,DeptNo,AcadDegreeId,SemNo,ClassNo,SecID) values('$uncode','$CollegeCode','$id','$AcadId','$row333[0]','$row333[1]','0')";
					$result33=mysql_query($sql_query33);

				}
				
				//Successfully Complete Operation
				$msg="&#1578;&#1605; &#1578;&#1587;&#1580;&#1610;&#1604; &#1575;&#1604;&#1602;&#1587;&#1605; &#1576;&#1606;&#1580;&#1575;&#1581;";
			    DisplaySuccHeader($msg);
			    $DeptName="";
				$AcadProg="";
				$noOfSem="";
				$ProgType=1;
			    DisplayDept_Form($CollegeCode,$uncode,$DeptName,$AcadProg,$noOfSem,$do,$AcadProgId,$ProgType);

			}//end of if
			else
			{
				echo("</br>");
				$msg="&#1578;&#1605; &#1575;&#1583;&#1582;&#1575;&#1604; &#1607;&#1584;&#1575; &#1575;&#1604;&#1602;&#1587;&#1605; &#1605;&#1587;&#1576;&#1602;&#1575;";
				Display_error_msg($msg,$path);
				$DeptName="";
				$AcadProg="";
				$noOfSem="";
				$ProgType=1;
				DisplayDept_Form($CollegeCode,$uncode,$DeptName,$AcadProg,$noOfSem,$do,$AcadProgId,$ProgType);
			}
		
		}//end of insert AcadProg[$res2]
		else
		{
			//echo("AcadProg Not Inserted ..");
				$msg="&#1604;&#1605; &#1610;&#1578;&#1605; &#1578;&#1587;&#1580;&#1610;&#1604; &#1575;&#1604;&#1602;&#1587;&#1605;&#1548; &#1575;&#1604;&#1585;&#1580;&#1575;&#1569; &#1575;&#1604;&#1605;&#1581;&#1575;&#1608;&#1604;&#1577; &#1604;&#1575;&#1581;&#1602;&#1575;";
			Display_error_msg($msg,$path);
			
			$DeptName="";
			$AcadProg="";
			$noOfSem="";
			$ProgType=1;
			DisplayDept_Form($CollegeCode,$uncode,$DeptName,$AcadProg,$noOfSem,$do,$AcadProgId,$ProgType);
			
		}//if not AcadProg inserted 

	}//end of if flag
	
  }//end of main else
  else
  {
  	//Display Depart Form
  		DisplayDept_Form($CollegeCode,$uncode,$DeptName,$AcadProg,$noOfSem,$do,$AcadProgId,$ProgType);

  }
}
else
	{
		include("ErrorPage.php");
	}



?>