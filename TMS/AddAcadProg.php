<?php

	session_start();
	require_once('main.php');

	//Page Title

	Display_Title();

	$username=$_SESSION['username'];
	if($username)
	{
		$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
	//	$conn = db_connect();
		Background_Page();
		include("header2.php");

		$CollegeCode = $_GET['CollegeCode'];
		$CollegeCode=intval($CollegeCode);

		$uncode=$_GET['uncode'];
		$uncode=intval($uncode);

 		//echo($CollegeCode.$uncode);
 		
 		$href="InsertDept.php?CollegeCode=$CollegeCode&uncode=$uncode";
			$header="&#1578;&#1587;&#1580;&#1610;&#1604; &#1575;&#1604;&#1576;&#1585;&#1575;&#1605;&#1580; &#1575;&#1604;&#1575;&#1603;&#1575;&#1583;&#1610;&#1605;&#1610;&#1577; &#1575;&#1604;&#1578;&#1575;&#1576;&#1593;&#1577; &#1604;&#1604;&#1603;&#1604;&#1610;&#1577;";
		Href2($href,$header);
		
		// Form's variable

  		$AcadProgName= $_POST['T1'];
  		$NoofSem = $_POST['T2'];
  		
  		if($_POST['B2'])
  		{
  			if (!filled_out($_POST))
    		{
    			//$msg="&#1575;&#1604;&#1576;&#1585;&#1575;&#1605;&#1580; &#1575;&#1604;&#1575;&#1603;&#1575;&#1583;&#1610;&#1605;&#1610;&#1577;";
				//DisplayHeader($msg);
				
					$msg='&#1601;&#1590;&#1604;&#1575; &#1602;&#1605; &#1576;&#1575;&#1583;&#1582;&#1575;&#1604; &#1580;&#1605;&#1610;&#1593; &#1575;&#1604;&#1576;&#1610;&#1575;&#1606;&#1575;&#1578;';

				Display_error_msg($msg,$path);

       			AddAcadProgram($uncode,$CollegeCode,$AcadProgName,$NoofSem);

    		}
    		else
    		if(!ctype_digit($NoofSem))
    		{
				//����� ������� ����������    		
				//$msg="&#1575;&#1604;&#1576;&#1585;&#1575;&#1605;&#1580; &#1575;&#1604;&#1575;&#1603;&#1575;&#1583;&#1610;&#1605;&#1610;&#1577;";
				//DisplayHeader($msg);
				
					$msg='&#1593;&#1583;&#1583; &#1575;&#1604;&#1601;&#1589;&#1608;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1610;&#1577; &#1604;&#1575;&#1576;&#1583; &#1571;&#1606; &#1610;&#1603;&#1608;&#1606; &#1571;&#1585;&#1602;&#1575;&#1605; &#1601;&#1602;&#1591;';

				Display_error_msg($msg,$path);

       			AddAcadProgram($uncode,$CollegeCode,$AcadProgName,$NoofSem);

    		}
    		else
    		{
    			//valid data
    			//get Max AcadYear
    			
    			//echo("valid =".$AcadProgName."</br>noofsem=".$NoofSem);
    			
    			//[1] Get max AcadDegreeId 
    			
    			$res=mysqli_query($mysqli,"select max(AcadDegreeId) from acaddegree");
    			
    			$rows=mysqli_fetch_row($res);
    			
    			if(intval($rows[0]==0))
    			{
    				$AcadId=1;
    			}
    			else
    			{
    				$AcadId=intval($rows[0])+1;
    			}
    			
    			
    			
				//[2] insert into table acaddegree
				
					$res2=mysqli_query($mysqli,"insert into acaddegree( `AcadDegreeId` , `AcadDegreeName` , `NoOfSemester` ) VALUES ('$AcadId','$AcadProgName','$NoofSem')");
				
				if(	$res2)
				{
					//successfully inserted..
					
						$succMsg="&#1578;&#1605; &#1578;&#1587;&#1580;&#1610;&#1604; &#1575;&#1604;&#1576;&#1585;&#1606;&#1575;&#1605;&#1580; &#1575;&#1604;&#1575;&#1603;&#1575;&#1583;&#1610;&#1605;&#1609; &#1576;&#1606;&#1580;&#1575;&#1581;";
					DisplaySuccHeader($succMsg);
					
					$AcadProgName="";
					
					$NoofSem="";
					
					AddAcadProgram($uncode,$CollegeCode,$AcadProgName,$NoofSem);
				}
				else
				{
					
					//not inserted 
						$msg='&#1604;&#1605; &#1610;&#1578;&#1605; &#1578;&#1587;&#1580;&#1610;&#1604; &#1575;&#1604;&#1576;&#1585;&#1606;&#1575;&#1605;&#1580; &#1575;&#1604;&#1575;&#1603;&#1575;&#1583;&#1610;&#1605;&#1609;';

					Display_error_msg($msg,$path);
					
					$AcadProgName="";
					
					$NoofSem="";
					
					AddAcadProgram($uncode,$CollegeCode,$AcadProgName,$NoofSem);

				}//end of not insert

    	
    		}

		}//end of post[B2]
		
		else
		{
			//Display Form
			AddAcadProgram($uncode,$CollegeCode,$AcadProgName,$NoofSem);
		}


		
	}//end of check username
	else
	{
		include("ErrorPage.php");
	}


	?>




