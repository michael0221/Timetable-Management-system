<?php
session_start();
require_once('main.php');
$conn = db_connect();
$username=$_SESSION['username'];

//Page Title
//Display_Title();
Background_Page();

if($username)
{
	/*$AcadDeg = $_GET['AcadDeg'];
	$AcadDeg=intval($AcadDeg);

	$Classno = $_GET['Class'];
	$Classno=intval($Classno);

	$CollegeCode = $_GET['CollegeCode'];
	$CollegeCode=intval($CollegeCode);

	$uncode=$_GET['uncode'];
	$uncode=intval($uncode);

	$DeptNo = $_GET['Dept'];
	$DeptNo=intval($DeptNo);

	$Sem = $_GET['Sem'];
	$Sem=intval($Sem);
	
	$SecID= $_GET['SecID'];
	$SecID=intval($SecID);*/
	
	//echo("sec=".$SecID);

	$year=$_SESSION['year'];
	

	//Get Selected Subject Code
	
	$subcode=$_POST['D4'];
	
	$SecID=$_POST['DSec'];

	
	//echo("secid=".$SecID);
	

	//Get Num of Classes
	if(GetNumberOfClasses($AcadDeg)==$Classno)
	{
		//[1]check if there any Section inserted on this Depart
		
		//echo("secid=".$SecID);
		
		$result=mysql_query("select SecID,SecName from DeptSection  where 
							UniversityCode='$uncode1' and 
							CollegeCode='$CollegeCode1' and 
    		 				DeptNo='$DeptNo' and 
    		 				AcadDegreeId ='$AcadDeg' and 
    		 				ClassNo ='$Classno' and SecID!='$SecID'");
    	if( mysql_num_rows($result)>0)
    	{
    		//Display other Sections
    	?>
			<div align="center" style="overflow:scroll;width:50%">
	
				<table border="0" width="50%" style="border-color: #5A74A0">

				<?php
				//Get same Classno from other Departs
				$numsec=0;
				$id=0;
				$notfound=0;
		
    			while($row=mysql_fetch_row($result))
    			{
    				//Note: Check if this SubjectCode($subcode) on the other depart
	
					$resultd=mysql_query("select SubCode from collegesubject where 
    		 							AcadYNo='$year' and 
    		 							UniversityCode='$uncode1' and 
    		 							CollegeCode='$CollegeCode1' and 
    		 							DeptNo='$DeptNo' and 
    		 							ClassNo='$Classno' and  SemNo='$Sem' and SubCode='$subcode' and SecID ='$row[0]'");
    			
    				if( mysql_num_rows($resultd)>0)
    				{
    					//check if there are available session for 
						$secid='Sec'.$id;
						$secid2='Secv'.$id;
						//get checkbox values
					?>
						<tr>
								<td bordercolor="#003366" align="center" bgcolor="#5A74A0" height="31" width="40%" bordercolorlight="#003366" bordercolordark="#003366" style="border:2px solid #003366; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" colspan="3">
								<p align="right">
							     	<input type="checkbox" name="<?php echo($secid);?>" value="ON" style="float: right" <?php if ($_POST[$secid]=='ON') { ?> checked <?php }?>>
								<input type="hidden" name="<?php echo($secid2);?>" value="<?php echo($row[0]);?>"/>
								<?php echo($row[1]."</br>");?>
							</td>
						</tr>
					<?php
										
						$getBoxValue[$id]=$row[0];
						//echo("boxvalue=".$getBoxValue[$id]);
						$id=$id+1;
					
						$notfound++;
					}//end of if
				
    			}//end of main while
    		?>
    		<!--get Total number of checkbox-->
    		<input type="hidden" name="numbox" value="<?php echo($id);?>"/>
    	
    		</table>
    		<?php
    		//if subcode not found on other Sections
			if($notfound==0)
    		{
    			//echo("Subject not registered on other Depart..");
    			echo('<div style="width:90%;text-align:right;color:yellow;">');
    				echo("&#1575;&#1604;&#1605;&#1575;&#1583;&#1577; &#1575;&#1604;&#1578;&#1609; &#1578;&#1605; &#1578;&#1581;&#1583;&#1610;&#1583;&#1607;&#1575; &#1594;&#1610;&#1585; &#1605;&#1587;&#1580;&#1604;&#1577; &#1576;&#1575;&#1604;&#1578;&#1582;&#1589;&#1589;&#1575;&#1578; &#1575;&#1604;&#1575;&#1582;&#1585;&#1609;");
    			echo('</div>');
    		}
    		?>
    		</div>
		    	
		<?php
		}//end of if 
		else
		{	
		
			//[2] check the other Departs	
			$result=mysql_query("select DeptNo,DeptName,AcadDegreeId from departments  where 
    		 	UniversityCode='$uncode1' and CollegeCode='$CollegeCode1' and 
    		 	DeptNo!='$DeptNo'");
    		
    		if( mysql_num_rows($result)>0)
    		{
    		//Display other Departs
    	?>
			<div align="center" style="overflow:scroll;width:50%">
	
				<table border="0" width="50%" style="border-color: #5A74A0">

				<?php
				//Get same Classno from other Departs
				$numsec=0;
				$id=0;
				$notfound=0;
		
    			while($row=mysql_fetch_row($result))
    			{
    				//Note: Check if this SubjectCode($subcode) on the other depart
	
					$resultd=mysql_query("select SubCode from collegesubject where 
    		 							AcadYNo='$year' and 
    		 							UniversityCode='$uncode1' and 
    		 							CollegeCode='$CollegeCode1' and 
    		 							DeptNo='$row[0]' and 
    		 							ClassNo='$Classno' and  SemNo='$Sem' and SubCode='$subcode'");
    			
    				if( mysql_num_rows($resultd)>0)
    				{
    					//check if there are available session for 
						$secid='Sec'.$id;
						$secid2='Secv'.$id;
						//get checkbox values
					?>
						<tr>
								<td bordercolor="#003366" align="center" bgcolor="#5A74A0" height="31" width="40%" bordercolorlight="#003366" bordercolordark="#003366" style="border:2px solid #003366; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" colspan="3">
								<p align="right">
							     	<input type="checkbox" name="<?php echo($secid);?>" value="ON" style="float: right" <?php if ($_POST[$secid]=='ON') { ?> checked <?php }?>>
								<input type="hidden" name="<?php echo($secid2);?>" value="<?php echo($row[0]);?>"/>
								<?php echo($row[1]."</br>");?>
							</td>
						</tr>
					<?php
										
						$getBoxValue[$id]=$row[0];
						//echo("boxvalue=".$getBoxValue[$id]);
						$id=$id+1;
					
						$notfound++;
					}//end of if
				
    			}//end of main while
    		?>
    		<!--get Total number of checkbox-->
    		<input type="hidden" name="numbox" value="<?php echo($id);?>"/>
    	
    		</table>
    		<?php
    		//if subcode not found on other Sections
			if($notfound==0)
    		{
    			//echo("Subject not registered on other Depart..");
    			echo('<div style="width:90%;text-align:right;color:yellow;">');
    				echo("&#1575;&#1604;&#1605;&#1575;&#1583;&#1577; &#1575;&#1604;&#1578;&#1609; &#1578;&#1605; &#1578;&#1581;&#1583;&#1610;&#1583;&#1607;&#1575; &#1594;&#1610;&#1585; &#1605;&#1587;&#1580;&#1604;&#1577; &#1576;&#1575;&#1604;&#1575;&#1602;&#1587;&#1575;&#1605; &#1575;&#1604;&#1575;&#1582;&#1585;&#1609;");
    			echo('</div>');
    		}
    		?>
    		</div>	
		<?php	
		}//end of if
	   }//end of else
	}//end of main if
	else
	{
		//Classno from [1-3] or [1-4]
		//if Classno != Final Year
		//echo("here..");
		
		?>
		<div align="center" style="overflow:scroll;width:50%">
	
			<table border="0" width="50%" style="border-color: #5A74A0">

		<?php
		//Get same Classno from other Departs
		$numsec=0;
		$id=0;
		$notfound=0;
		
		$result=mysql_query("select DeptNo,DeptName,AcadDegreeId from departments  where 
    		 	UniversityCode='$uncode1' and CollegeCode='$CollegeCode1' and 
    		 	DeptNo!='$DeptNo'");
    		
    	while($row=mysql_fetch_row($result))
    	{
    		//Note: Check if this SubjectCode($subcode) on the other depart
	
			$resultd=mysql_query("select SubCode from collegesubject where 
    		 	AcadYNo='$year' and 
    		 	UniversityCode='$uncode1' and 
    		 	CollegeCode='$CollegeCode1' and 
    		 	DeptNo='$row[0]' and 
    		 	ClassNo='$Classno' and  SemNo='$Sem' and SubCode='$subcode'");
    			
    			if( mysql_num_rows($resultd)>0)
    			{
    				//check if there are available session for 
					$secid='Sec'.$id;
					$secid2='Secv'.$id;
					//get checkbox values
					?>
						<tr>
								<td bordercolor="#003366" align="center" bgcolor="#5A74A0" height="31" width="40%" bordercolorlight="#003366" bordercolordark="#003366" style="border:2px solid #003366; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" colspan="3">
								<p align="right">
							     	<input type="checkbox" name="<?php echo($secid);?>" value="ON" style="float: right" <?php if ($_POST[$secid]=='ON') { ?> checked <?php }?>>
								<input type="hidden" name="<?php echo($secid2);?>" value="<?php echo($row[0]);?>"/>
								<?php echo($row[1]."</br>");?>
							</td>
						</tr>
					<?php
										
					$getBoxValue[$id]=$row[0];
					//echo("boxvalue=".$getBoxValue[$id]);
					$id=$id+1;
					
					$notfound++;
				}
				
    	}//end of main while
    	?>
    	<!--get Total number of checkbox-->
    	<input type="hidden" name="numbox" value="<?php echo($id);?>"/>
    	
    	</table>
    	<?php
    	//if subcode not found on other depart
		if($notfound==0)
    	{
    		//echo("Subject not registered on other Depart..");
    		echo('<div style="width:90%;text-align:right;color:yellow;">');
    			echo("&#1575;&#1604;&#1605;&#1575;&#1583;&#1577; &#1575;&#1604;&#1578;&#1609; &#1578;&#1605; &#1578;&#1581;&#1583;&#1610;&#1583;&#1607;&#1575; &#1594;&#1610;&#1585; &#1605;&#1587;&#1580;&#1604;&#1577; &#1576;&#1575;&#1604;&#1575;&#1602;&#1587;&#1575;&#1605; &#1575;&#1604;&#1575;&#1582;&#1585;&#1609;");
    		echo('</div>');
    	}
    
    	?>
    	</div>
	<?php
	}//end of else

}
else
{
	include("ErrorPage.php");
}

?><!--</body>-->