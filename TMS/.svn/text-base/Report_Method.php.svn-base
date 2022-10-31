
<?php

 require_once('db_fns.php');
 
 require_once('Page_layout.php');
 
 //department Method
  require_once('Dept_Method.php');
 
 $conn = db_connect();


//[1] Get all Depart on College

function GetAllDeparts($uncode,$CollegeCode)
{
	//return DeptNo -> $Depts[0]
	
	$result = mysql_query("select DeptNo from Departments where 
							
							UniversityCode='$uncode' and CollegeCode='$CollegeCode'");

	if(mysql_num_rows($result)>0)
	{
		while($row=mysql_fetch_row($result))
		{	
			$Depts[$row[0]]=$row[0];
		}
		
		return $Depts;
		
	}
	else
		return -1;

}//end of method

// Get All College used Specific LectureRoom
function GetAllColleges($year,$univCode,$LecRoom)
{
	
	$result = mysql_query("select distinct(CollegeCode) from usedby where 
							
							AcadYNo='$year' and UniversityCode='$univCode' and BId='1' and SubBId='$LecRoom'");

	if(mysql_num_rows($result)>0)
	{
		$i=1;
		while($row=mysql_fetch_row($result))
		{	
			$Colleges[$i]=$row[0];
			$i++;
		}
		
		return $Colleges;

	}
	else
		return -1;
}

//[2] Check ProgType on each College to display three semester or two 

function CheckToDisplaySem($univCode,$CollegeCode)
{
		
	//-- Get Department on this College
				
	$Depts=GetAllDeparts($univCode,$CollegeCode);
	
	//check to display semester 3 or not
	
	if($Depts != -1)
	{
		foreach($Depts as $DeptNo)
		{	
			//-- Get Acad Prog Type on this College
									
			$AcadProgId=GetAcadDegreeId($univCode,$CollegeCode,$DeptNo);
													
			$AcadProg=GetAcadProg($AcadProgId); 
				
			$NoOfSemester=$AcadProg[1];
												
			$AcadProgType=$AcadProg[2];
									
			if ( ($AcadProgType!=1)&&( ($NoOfSemester==2)||($NoOfSemester==3) ) )
			{
				return true; //display
				break;
			}
			
		}//end of foreach
		
	}//end of if
	else
		return false;

}//end of method 


//[3] Get All DeptSection

function GetDeptSection($univCode,$CollegeCode,$DeptNo,$AcadProgId,$ClassNo)
{	
	//get all SecId on specific Depart 
	
	$result=mysql_query("select SecID from DeptSection where 
    		 	UniversityCode='$univCode' and CollegeCode='$CollegeCode' and 
    		 	DeptNo='$DeptNo' and AcadDegreeId='$AcadProgId' and ClassNo='$ClassNo' ");
    		 	
    
    if(mysql_num_rows($result)>0)
    {
    	while( $row= mysql_fetch_row($result))
    	{
    		$SecID[$row[0]] = $row[0];
    	}
    	
    	return $SecID;
    }
    else
    	return 0;

}

//------------------------------------------- Get Total Hours on [ Lectures ] and [ Labs ]--------------------------------------------------------
//[4] Get the Subject Lecture Hour(s) for each level [1 to 4 or 5] from [ CollegeSubject ]
// Function Description:	   
// Output: return Total Number of Lectures Hour(s) from [ CollegeSubject ] table
 
function GetSubjectHours($univCode,$CollegeCode,$DeptNo,$AcadProgId,$Classno,$SemNo)
{
	$MaxYear=GetMaxYear();
	$LecHours=0;
		
	$sqls="select SubHour , SubTHour from CollegeSubject where
			AcadYNo='$MaxYear' and
			UniversityCode='$univCode' and
			CollegeCode='$CollegeCode' and
			DeptNo='$DeptNo' and
			AcadDegreeId='$AcadProgId' and
			ClassNo='$Classno' and
			SemNo='$SemNo' and
			SubType='1'";
	
	$results = mysql_query($sqls);

	while($rows=mysql_fetch_row($results))
	{
		$LecHours=$LecHours+$rows[0]+ $rows[1];
		
	}

 	return $LecHours;

}//end of function


//[5] Get the Subject Lab Hour(s) for each level [1 to 4 or 5] from [ CollegeSubject ]
// Function Description:
// Output: return Total Number of Labs  Hour(s) from [ CollegeSubject ] table

function GetLabHours($univCode,$CollegeCode,$DeptNo,$AcadProgId,$Classno,$SemNo)
{
	$MaxYear=GetMaxYear();
	
	$LabHours=0;
	
	$Group=1;
			
	$SecIDs=GetDeptSection($univCode,$CollegeCode,$DeptNo,$AcadProgId,$Classno);
						
	if($SecIDs==0)
	{
		//Get Number of Group 
						
		$Group= GetNoOFGroups($CollegeCode,$univCode,$DeptNo,$AcadProgId,$SemNo,$Classno,$MaxYear,0);
				
		$sqls="select SubHour from CollegeSubject where
			AcadYNo='$MaxYear' and
			UniversityCode='$univCode' and
			CollegeCode='$CollegeCode' and
			DeptNo='$DeptNo' and
			AcadDegreeId='$AcadProgId' and
			ClassNo='$Classno' and
			SecID='0' and
			SemNo='$SemNo' and
			SubType='2'";
	
		
		$results = mysql_query($sqls);

		while($rows=mysql_fetch_row($results))
		{
			$LabHours=$LabHours+$rows[0];
		
		}
 		
 		if($Group==0)
 		{
 			$Group=1;
 		}
 		 		
 		return ($LabHours * $Group);
 	
 	}//end of if
 	else
 	{
 		//Get Group on any Section
 		$totLabHours=0;
 							
 		foreach($SecIDs as $SecID)
 		{
 			
 			$Group= GetNoOFGroups($CollegeCode,$univCode,$DeptNo,$AcadProgId,$SemNo,$Classno,$year,$SecID);
 			
 			$sqls="select SubHour from CollegeSubject where
			AcadYNo='$MaxYear' and
			UniversityCode='$univCode' and
			CollegeCode='$CollegeCode' and
			DeptNo='$DeptNo' and
			AcadDegreeId='$AcadProgId' and
			ClassNo='$Classno' and
			SecID='$SecID' and
			SemNo='$SemNo' and
			SubType='2'";
	
			$results = mysql_query($sqls);

			while($rows=mysql_fetch_row($results))
			{
				$LabHours=$LabHours+$rows[0];
		
			}
 			
 			if($Group==0)
 			{
 				$Group=1;
 			}
 			
 			$totLabHours= $totLabHours + ($LabHours *$Group);
 		
 		}//end of foreach	
 		
		return $totLabHours ;	
 						
 	}//end of else
	
	
}//end of method


//----------------------------------------------------------------------------------
// Get Current Hour(s) from Managing Table [Managinglec] 
//----------------------------------------------------------------------------------
//[6] Function Description:

// Output: return Total Number of Lecture Hour(s) from [ CollegeSubject ] table
 
function GetManagSubjectHours($univCode,$CollegeCode,$DeptNo,$AcadProgId,$Classno,$SemNo)
{
	$MaxYear=GetMaxYear();
	$LecHours=0;
	
	
	$sqls="select count(ClassNo) from Managinglec where
			AcadYNo='$MaxYear' and
			UniversityCode='$univCode' and
			CollegeCode='$CollegeCode' and
			DeptNo='$DeptNo' and
			AcadDegreeId='$AcadProgId' and
			ClassNo='$Classno' and
			SemNo='$SemNo' and
			SubType='1'";
	
	
	$results = mysql_query($sqls);

	while($rows=mysql_fetch_row($results))
	{
		$LecHours=$LecHours+($rows[0] * 0.5);
		
	}

 	return $LecHours;

}//end of function

//[7] Function Description 
//Output: Return total numbers of managing Lab's Hours

function GetManagLabHours($univCode,$CollegeCode,$DeptNo,$AcadProgId,$Classno,$SemNo)
{
	$MaxYear=GetMaxYear();
	
	$LabHours=0;
	
	$Group=1;
	
	//Get Sections	
	$SecIDs=GetDeptSection($univCode,$CollegeCode,$DeptNo,$AcadProgId,$Classno);
						
	if($SecIDs==0)
	{
		//Get Number of Group 
						
		$Group= GetNoOFGroups($CollegeCode,$univCode,$DeptNo,$AcadProgId,$SemNo,$Classno,$MaxYear,0);
			
		$sqls="select count(ClassNo) from Managinglec where
			AcadYNo='$MaxYear' and
			UniversityCode='$univCode' and
			CollegeCode='$CollegeCode' and
			DeptNo='$DeptNo' and
			AcadDegreeId='$AcadProgId' and
			ClassNo='$Classno' and
			SecID='0' and
			SemNo='$SemNo' and
			SubType='2'";
	
		
		$results = mysql_query($sqls);

		while($rows=mysql_fetch_row($results))
		{
			
			$LabHours=$LabHours+ ($rows[0] * 0.5);
		
		}
		
 		if($Group==0)
 		{
 			$Group=1;
 		}
 		
 		return  $LabHours;
 	
 	}//end of if
 	else
 	{
 		//Get Group on any Section
 		$totLabHours=1;
 				
 		foreach($SecIDs as $SecID)
 		{
 			
 			 //echo(" in managing SecId= ".$SecID."</br>");

 			$Group= GetNoOFGroups($CollegeCode,$univCode,$DeptNo,$AcadProgId,$SemNo,$Classno,$year,$SecID);
 		 			
 			$sqls="select count(SubType) from Managinglec where
			AcadYNo='$MaxYear' and
			UniversityCode='$univCode' and
			CollegeCode='$CollegeCode' and
			DeptNo='$DeptNo' and
			AcadDegreeId='$AcadProgId' and
			ClassNo='$Classno' and
			SecID='$SecID' and
			SemNo='$SemNo' and
			SubType='2'";
	
			$results = mysql_query($sqls);

			while($rows=mysql_fetch_row($results))
			{
				
				$LabHours=$LabHours + ($rows[0] * 0.5 );
		
			}
 			
 			
 			if($Group==0)
 			{
 				$Group=1;
 			}	
 			
 			$totLabHours=$totLabHours + $LabHours ;
 		
 		}//end of foreach
 		
		return $totLabHours;	
 						
 	}//end of else
	
}//end of method


//------------------------------------------------ General Header of Report ------------------------------------------------------------------

function GeneralHeader($univCode,$CollegeCode,$SemNo)
{
	$year=GetMaxYear();
?>
	<div align="center">
	<table border="0" width="100%">
		<tr>
			<td align="center">
				<p align="center"><b><font face="Traditional Arabic"><?php echo(GetUniversityName($univCode));?></font></b></p>
			</td>
		</tr>
		<tr>
			<td align="center">
				<p align="center"><b><font face="Traditional Arabic"><?php echo(GetCollegeName($univCode,$CollegeCode));?></font></b></p>
			</td>
		</tr>
		<tr>
			<td align="center">
				<p align="center"><b><font face="Traditional Arabic">
				<?php
					switch($SemNo)
					{
							case 1: echo("&#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1575;&#1604;&#1575;&#1608;&#1604; "."<span dir='rtl'>".$year."</span>");
								break;
						
						case 2:
									echo("&#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1575;&#1604;&#1579;&#1575;&#1606;&#1609; "."<span dir='rtl'>".$year."</span>");
								break;
							
						case 3:
									echo("&#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1575;&#1604;&#1579;&#1575;&#1604;&#1579; "."<span dir='rtl'>".$year."</span>");
								break;
					}//end of Switch
					?>
				</font></b></p>
			</td>
		</tr>

		<tr>
			<td><p align="center"><b><font face="Times New Roman"> **** </font></b></td>
		</tr>
		
	</table>
	</div>

	
<?php
}//end of method


//------------------------------------------------  Display Report [1] Header -------------------------------------------------------------------

//Display Report Header

//Function Description :
//output:
// -- Display Header of Table when (option == 1)
// -- Display Data   on Table when (option == 2)

function DisplayReportHeader($AcadProgType,$Classno,$SemNo,$DeptName,$AcadProgName,$Lectures,$Labs,$ToTLec,$ToTLab,$option,$print)
{
	if($print==1)
	{
		//Ready to Print page
		
		$bordercolor='black';
		
		$color='black';
		
		$bgcolor='#C0C0C0';
		
		$Lecolor='#999999';
		
		$mcolor='white';
		
		$Lbcolor='#999999';
		
	}
	else
	{
		$bordercolor='#003366';
		
		$color='white';
		
		$bgcolor='#5A74A0';
		
		$Lecolor='#FFCC99';
		
		$mcolor='#003366';
		
		$Lbcolor='#FFFF99';

	}//end of else
	
	if( $AcadProgType==1 )
	{
		//Display Header	
		if($option==1)
		{
	?>
			<tr>
				<!--Depart Header-->
					<td width="20%" rowspan="3" align="center" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bgcolor="<?php echo($bgcolor);?>" bordercolor="<?php echo($bordercolor);?>">
					<font face="Traditional Arabic" color="<?php echo($color);?>"><b><span lang="ar-sa">&#1575;&#1604;&#1602;&#1587;&#1605;</span></b></font>
				</td>
				
				<!--AcadProg Header-->

					<td width="20%" rowspan="3" align="center" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bgcolor="<?php echo($bgcolor);?>" bordercolor="<?php echo($bordercolor);?>">
						<font face="Traditional Arabic" color="<?php echo($color);?>"><b><span lang="ar-sa">&#1575;&#1604;&#1576;&#1585;&#1606;&#1575;&#1605;&#1580;</span></b></font>
				</td>
			
				
				<!--Managing Lectures Header-->
				
					<td width="50%" colspan="<?php echo($Classno * 2);?>" align="center" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bordercolor="<?php echo($bordercolor);?>">
					<!--<font face="Traditional Arabic" size="4" color="#FFFFFF"><b><span lang="ar-sa">
							&#1575;&#1604;&#1587;&#1575;&#1593;&#1575;&#1578; &#1575;&#1604;&#1605;&#1583;&#1582;&#1604;&#1577; &#1576;&#1575;&#1604;&#1580;&#1583;&#1575;&#1608;&#1604;</span></b></font>-->
					<div align="center">
					
					<table border="0" width="100%" dir="rtl">
					<tr>
						<td width="10%" bgcolor="<?php echo($Lecolor);?>" style="border: 1px solid #000000; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px">&nbsp;</td>
						<td width="20%"><span lang="ar-sa">
							<b>	<font face="Traditional Arabic" color="<?php echo($color);?>">
							<span lang="ar-sa">
							<?php
								if($print==1)
								{
									echo("&#1575;&#1580;&#1605;&#1575;&#1604;&#1609; &#1587;&#1575;&#1593;&#1575;&#1578; &#1575;&#1604;&#1606;&#1592;&#1585;&#1609; &#1608;&#1575;&#1604;&#1593;&#1605;&#1604;&#1609;");								}
								else
								{
										echo("&#1575;&#1580;&#1605;&#1575;&#1604;&#1609; &#1587;&#1575;&#1593;&#1575;&#1578; &#1575;&#1604;&#1606;&#1592;&#1585;&#1609;");
								}
							?>
							</span></b></font>
						</td>
						
						<td width="10%" bgcolor="<?php echo($mcolor);?>" style="border: 1px solid #000000">&nbsp;</td>
						<td width="30%">
							<font face="Traditional Arabic" color="<?php echo($color);?>">
							<b><span lang="ar-sa">
									&#1575;&#1604;&#1587;&#1575;&#1593;&#1575;&#1578; &#1575;&#1604;&#1605;&#1583;&#1582;&#1604;&#1577; &#1576;&#1575;&#1604;&#1580;&#1583;&#1575;&#1608;&#1604;</span></b></font>
						</td>
						<?php
						if($print==0)
						{
						?>
								<td width="10%" bgcolor="<?php echo($Lbcolor);?>" style="border: 1px solid #000000; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px">&nbsp;</td>
							<td width="20%"><span lang="ar-sa">
							<b>	<font face="Traditional Arabic" color="<?php echo($color);?>">&#1575;&#1580;&#1605;&#1575;&#1604;&#1609;</font></b></span>
							<font face="Traditional Arabic" color="<?php echo($color);?>">
							<b><span lang="ar-sa">
							&#1587;&#1575;&#1593;&#1575;&#1578; &#1575;&#1604;&#1593;&#1605;&#1604;&#1609;</span></b></font>
							</td>
					 	<?php
					 	}//end of if
					 	?>
					</tr>
								
					</table>
					</div>

				</td>
		 </tr>
		
		 <tr>
				<!--- Level Headers from [1 - 4] or [1 - 5]--->
				<!-- Level 1 -->
					<td width="10%" colspan="2" align="center" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bgcolor="<?php echo($bgcolor);?>" bordercolor="<?php echo($bordercolor);?>">
						<b><font face="Traditional Arabic" color="<?php echo($color);?>">&#1575;&#1604;&#1587;&#1606;&#1577; &#1575;&#1604;&#1575;&#1608;&#1604;&#1609;</font></b>
				</td>
				
				<!-- Level 2 -->
					<td width="10%" colspan="2" align="center" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bgcolor="<?php echo($bgcolor);?>" bordercolor="<?php echo($bordercolor);?>">
						<b><font face="Traditional Arabic" color="<?php echo($color);?>">&#1575;&#1604;&#1587;&#1606;&#1577; &#1575;&#1604;&#1579;&#1575;&#1606;&#1610;&#1577;</font></b>
				</td>
			
				<!-- Level 3 -->
					<td width="10%" colspan="2" align="center" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bgcolor="<?php echo($bgcolor);?>" bordercolor="<?php echo($bordercolor);?>">
						<b><font face="Traditional Arabic" color="<?php echo($color);?>">&#1575;&#1604;&#1587;&#1606;&#1577; &#1575;&#1604;&#1579;&#1575;&#1604;&#1579;&#1577;</font></b>
				</td>
				
				<!-- Level 4 -->
					<td width="10%" colspan="2" align="center" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bgcolor="<?php echo($bgcolor);?>" bordercolor="<?php echo($bordercolor);?>">
						<b><font face="Traditional Arabic" color="<?php echo($color);?>">&#1575;&#1604;&#1587;&#1606;&#1577; &#1575;&#1604;&#1585;&#1575;&#1576;&#1593;&#1577;</font></b>
				</td>
				
				<?php		
				if($Classno==5)
				{			
				?>	
					<!-- Level 5 -->
					<td width="10%" colspan="2" align="center" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bgcolor="<?php echo($bgcolor);?>" bordercolor="<?php echo($bordercolor);?>">
						<b><font face="Traditional Arabic" color="<?php echo($color);?>">&#1575;&#1604;&#1587;&#1606;&#1577; &#1575;&#1604;&#1582;&#1575;&#1605;&#1587;&#1577;</font></b>
					</td>
				<?php
				}//end of if
				?>
		</tr>
		
		<tr>
			<td width="5%" align="center" bgcolor="<?php echo($bgcolor);?>"><b>
				<font face="Traditional Arabic" color="<?php echo($color);?>">&#1606;&#1592;&#1585;&#1609;</font></b></td>
			<td width="5%" align="center" bgcolor="<?php echo($bgcolor);?>"><b>
				<font face="Traditional Arabic" color="<?php echo($color);?>">&#1593;&#1605;&#1604;&#1609;</font></b></td>
			
			<td width="5%" align="center" bgcolor="<?php echo($bgcolor);?>"><b>
				<font face="Traditional Arabic" color="<?php echo($color);?>">&#1606;&#1592;&#1585;&#1609;</font></b></td>
			<td width="5%" align="center" bgcolor="<?php echo($bgcolor);?>"><b>
				<font face="Traditional Arabic" color="<?php echo($color);?>">&#1593;&#1605;&#1604;&#1609;</font></b></td>
			
			<td width="5%" align="center" bgcolor="<?php echo($bgcolor);?>"><b>
				<font face="Traditional Arabic" color="<?php echo($color);?>">&#1606;&#1592;&#1585;&#1609;</font></b></td>
			<td width="5%" align="center" bgcolor="<?php echo($bgcolor);?>"><b>
				<font face="Traditional Arabic" color="<?php echo($color);?>">&#1593;&#1605;&#1604;&#1609;</font></b></td>
			
			<td width="5%" align="center" bgcolor="<?php echo($bgcolor);?>"><b>
				<font face="Traditional Arabic" color="<?php echo($color);?>">&#1606;&#1592;&#1585;&#1609;</font></b></td>
			<td width="5%" align="center" bgcolor="<?php echo($bgcolor);?>"><b>
				<font face="Traditional Arabic" color="<?php echo($color);?>">&#1593;&#1605;&#1604;&#1609;</font></b></td>
			<?php
			if($Classno==5)
			{	
			?>
				<td width="5%" align="center" bgcolor="<?php echo($bgcolor);?>"><b>
					<font face="Traditional Arabic" color="<?php echo($color);?>">&#1606;&#1592;&#1585;&#1609;</font></b>
				</td>
				
				<td width="5%" align="center" bgcolor="<?php echo($bgcolor);?>"><b>
					<font face="Traditional Arabic" color="<?php echo($color);?>">&#1593;&#1605;&#1604;&#1609;</font></b>
				</td>
			<?php
			}//end of class=5	
		  ?>
			
		</tr>
		
		<?php
		}//end of option=1
		else
		if($option == 2)
		{
			//Display Table Data
			//ÇÌãÇáì ÓÇÚÇÊ ÇáäÙÑí 
			$tot="&#1575;&#1580;&#1605;&#1575;&#1604;&#1609; &#1587;&#1575;&#1593;&#1575;&#1578; &#1575;&#1604;&#1606;&#1592;&#1585;&#1610; ";
			
			$ltot="&#1575;&#1580;&#1605;&#1575;&#1604;&#1609; &#1587;&#1575;&#1593;&#1575;&#1578; &#1593;&#1605;&#1604;&#1609; ";
			
			//<!--- ãÌãæÚ ÇáÓÇÚÇÊ ÇáãÏÎáÉ--->			
				$manag="&#1605;&#1580;&#1605;&#1608;&#1593; &#1575;&#1604;&#1587;&#1575;&#1593;&#1575;&#1578; &#1575;&#1604;&#1605;&#1583;&#1582;&#1604;&#1577; &#1576;&#1575;&#1604;&#1580;&#1583;&#1608;&#1604;";
		?>
		<tr>
				<td width="20%" align="center" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bordercolor="<?php echo($bordercolor);?>">
				<b><font face="Traditional Arabic" color="<?php echo($color);?>"><?php echo($DeptName);?></font></b>
			</td>
			
				<td width="20%" align="center" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bordercolor="<?php echo($bordercolor);?>">
				<b><font face="Traditional Arabic" color="<?php echo($color);?>"><?php echo($AcadProgName);?></font></b>				
			</td>
			
			<!--Level 1-->
				<td width="5%" align="center" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bordercolor="<?php echo($bordercolor);?>">
					<b><div align="right" style="background-color: <?php echo($Lecolor);?>; color:black" title="<?php echo($tot);?>"><u><?php echo(" ".$Lectures[1][0]);?></u></div> 
				<div align="left" title="<?php echo($manag);?>"><?php echo(" ".$Lectures[1][1]);?></div></b>
			</td>
					
				<td width="5%" align="center" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bordercolor="<?php echo($bordercolor);?>">
					<b><div align="right" style="background-color: <?php echo($Lbcolor);?>; color:black" title="<?php echo($ltot);?>"><u><?php echo(" ".$Labs[1][0]);?></u></div> 
				<div align="left" title="<?php echo($manag);?>" ><?php echo(" ".$Labs[1][1]);?></div></b>
			</td>
			
			<!--Level 2-->
				<td width="5%" align="center" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bordercolor="<?php echo($bordercolor);?>">
					<b><div align="right" style="background-color: <?php echo($Lecolor);?>; color:black" title="<?php echo($tot);?>"><u><?php echo($Lectures[2][0]);?></u></div> 
				<div align="left" title="<?php echo($manag);?>" ><?php echo($Lectures[2][1]);?></div></b>
			</td>
					
				<td width="5%" align="center" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bordercolor="<?php echo($bordercolor);?>">
					<b><div align="right" style="background-color: <?php echo($Lbcolor);?>; color:black" title="<?php echo($ltot);?>"><u><?php echo($Labs[2][0]);?></u></div> 
				<div align="left" title="<?php echo($manag);?>" ><?php echo($Labs[2][1]);?></div></b>
			</td>
			
			<!--Level 3-->
				<td width="5%" align="center" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bordercolor="<?php echo($bordercolor);?>">
					<b><div align="right" style="background-color: <?php echo($Lecolor);?>; color:black" title="<?php echo($tot);?>"><u><?php echo($Lectures[3][0]);?></u></div> 
				<div align="left" title="<?php echo($manag);?>"><?php echo($Lectures[3][1]);?></div></b>
			</td>
					
				<td width="5%" align="center" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bordercolor="<?php echo($bordercolor);?>">
					<b><div align="right" style="background-color: <?php echo($Lbcolor);?>; color:black" title="<?php echo($ltot);?>"><u><?php echo($Labs[3][0]);?></u></div> 
				<div align="left" title="<?php echo($manag);?>"><?php echo($Labs[3][1]);?></div></b>
			</td>

			<!--Level 4-->
				<td width="5%" align="center" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bordercolor="<?php echo($bordercolor);?>">
					<b><div align="right" style="background-color: <?php echo($Lecolor);?>; color:black" title="<?php echo($tot);?>"><u><?php echo($Lectures[4][0]);?></u></div> 
				<div align="left" title="<?php echo($manag);?>"><?php echo($Lectures[4][1]);?></div></b>
			</td>
					
				<td width="5%" align="center" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bordercolor="<?php echo($bordercolor);?>">
					<b><div align="right" style="background-color: <?php echo($Lbcolor);?>; color:black" title="<?php echo($ltot);?>"><u><?php echo($Labs[4][0]);?></u></div> 
				<div align="left" title="<?php echo($manag);?>"><?php echo($Labs[4][1]);?></div></b>
			</td>

			<?php 
			if($Classno==5)
			{	
			?>
				<!--Level 5-->
					<td width="5%" align="center" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bordercolor="<?php echo($bordercolor);?>">
						<b><div align="right" style="background-color: <?php echo($Lecolor);?>; color:black" title="<?php echo($tot);?>"><u><?php echo($Lectures[5][0]);?></u></div> 
					<div align="left" title="<?php echo($manag);?>"><?php echo($Lectures[5][1]);?></div></b>
				</td>
					
					<td width="5%" align="center" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bordercolor="<?php echo($bordercolor);?>">
						<b><div align="right" style="background-color: <?php echo($Lbcolor);?>; color:black" title="<?php echo($ltot);?>"><u><?php echo($Labs[5][0]);?></u></div> 
					<div align="left" title="<?php echo($manag);?>"><?php echo($Labs[5][1]);?></div></b>
				</td>

			<?php
			}//end of if
			?>
			
		</tr>
			<?php
		}//end of option =2
		
	}//end of acadprog =1 
	else
	{
		//Diploma or Master Program
		
		if($option==1)
		{
			//Display Header
 			
	?>
			<tr>
				<!--- Depart Header -->
					<td width="10%" rowspan="3" align="center" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bgcolor="<?php echo($bgcolor);?>" bordercolor="<?php echo($bordercolor);?>">
					<font face="Traditional Arabic" color="<?php echo($color);?>"><b><span lang="ar-sa">&#1575;&#1604;&#1602;&#1587;&#1605;</span></b></font>
				</td>
			
				<!--AcadProg Name-->
					<td width="10%" rowspan="3" align="center" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bgcolor="<?php echo($bgcolor);?>" bordercolor="<?php echo($bordercolor);?>">
						<font face="Traditional Arabic" color="<?php echo($color);?>"><b><span lang="ar-sa">&#1575;&#1604;&#1576;&#1585;&#1606;&#1575;&#1605;&#1580;</span></b></font>
				</td>
			
					<td width="40%" colspan="2" align="center" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>"  bordercolor="<?php echo($bordercolor);?>">
					<!-- Managing Header
					<font face="Traditional Arabic" size="4" color="#FFFFFF"><b><span lang="ar-sa">
						&#1575;&#1604;&#1587;&#1575;&#1593;&#1575;&#1578; &#1575;&#1604;&#1605;&#1583;&#1582;&#1604;&#1577; &#1576;&#1575;&#1604;&#1580;&#1583;&#1575;&#1608;&#1604;</span></b></font>
					-->
					<div align="center">
						<table border="0" width="100%" dir="rtl">
							<tr>
									<td width="10%"  bgcolor="<?php echo($Lecolor);?>" style="border: 1px solid #000000; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px">&nbsp;</td>
								<td width="20%"><span lang="ar-sa">
									<b>	<font face="Traditional Arabic" color="<?php echo($color);?>">
									<?php
									if($print==0)
									{
											echo("&#1575;&#1580;&#1605;&#1575;&#1604;&#1609; &#1587;&#1575;&#1593;&#1575;&#1578; &#1575;&#1604;&#1606;&#1592;&#1585;&#1609;");
									}
									else
									{
											echo("&#1575;&#1580;&#1605;&#1575;&#1604;&#1609; &#1587;&#1575;&#1593;&#1575;&#1578; &#1575;&#1604;&#1606;&#1592;&#1585;&#1609; &#1608;&#1575;&#1604;&#1593;&#1605;&#1604;&#1609;");
									}
									?>
									</span></b></font>
								</td>
						
									<td width="10%" bgcolor="<?php echo($mcolor);?>" style="border: 1px solid #000000; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px">&nbsp;</td>
								<td width="30%">
									<font face="Traditional Arabic" color="<?php echo($color);?>"><b><span lang="ar-sa">
										&#1575;&#1604;&#1587;&#1575;&#1593;&#1575;&#1578; &#1575;&#1604;&#1605;&#1583;&#1582;&#1604;&#1577; &#1576;&#1575;&#1604;&#1580;&#1583;&#1575;&#1608;&#1604;</span></b></font>
								</td>
								
								<?php
								if($print==0)
								{
								?>
								<td width="10%" bgcolor="<?php echo($Lbcolor);?>" >&nbsp;</td>
								<td width="20%"><span lang="ar-sa"><b>	<font face="Traditional Arabic" color="<?php echo($color);?>">&#1575;&#1580;&#1605;&#1575;&#1604;&#1609;</font></b></span>
									<font face="Traditional Arabic" color="<?php echo($color);?>">
										<b><span lang="ar-sa">&#1587;&#1575;&#1593;&#1575;&#1578; &#1575;&#1604;&#1593;&#1605;&#1604;&#1609;</span></b></font>
								</td>
								<?php
								}
								?>
							</tr>	
						</table>
						</div>
				</td>
			</tr>
		
			<tr>
					<td width="40%" colspan="2" align="center" bgcolor="<?php echo($bgcolor);?>" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bordercolor="<?php echo($bordercolor);?>">
					<b><font face="Traditional Arabic" color="<?php echo($color);?>">
					<?php
					if($SemNo == 1)
							echo("&#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1575;&#1604;&#1575;&#1608;&#1604;");
					else
					if($SemNo == 2)
							echo("&#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1575;&#1604;&#1579;&#1575;&#1606;&#1609;");
					else
					if($SemNo == 3)
							echo("&#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1575;&#1604;&#1579;&#1575;&#1604;&#1579;");
					?>	
					
					</font></b>
				</td>
			</tr>
		
			<tr>
					<td width="5%" align="center" bgcolor="<?php echo($bgcolor);?>" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bordercolor="<?php echo($bordercolor);?>"><b>
					<font face="Traditional Arabic" color="<?php echo($color);?>">&#1606;&#1592;&#1585;&#1609;</font></b></td>
				
					<td width="5%" align="center" bgcolor="<?php echo($bgcolor);?>" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bordercolor="<?php echo($bordercolor);?>"><b>
					<font face="Traditional Arabic" color="<?php echo($color);?>">&#1593;&#1605;&#1604;&#1609;</font></b></td>

			</tr>	
	
	<?php
		}//end of option=1
		else
		if($option==2)
		{
			//ÇÌãÇáì ÓÇÚÇÊ ÇáäÙÑí 
			$tot="&#1575;&#1580;&#1605;&#1575;&#1604;&#1609; &#1587;&#1575;&#1593;&#1575;&#1578; &#1575;&#1604;&#1606;&#1592;&#1585;&#1610; ";
			
			$ltot="&#1575;&#1580;&#1605;&#1575;&#1604;&#1609; &#1587;&#1575;&#1593;&#1575;&#1578; &#1593;&#1605;&#1604;&#1609; ";
			
			//<!--- ãÌãæÚ ÇáÓÇÚÇÊ ÇáãÏÎáÉ--->			
				$manag="&#1605;&#1580;&#1605;&#1608;&#1593; &#1575;&#1604;&#1587;&#1575;&#1593;&#1575;&#1578; &#1575;&#1604;&#1605;&#1583;&#1582;&#1604;&#1577; &#1576;&#1575;&#1604;&#1580;&#1583;&#1608;&#1604;";
		?>
		<tr>
				<td width="10%" align="center" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bordercolor="<?php echo($bordercolor);?>">
				<b><font face="Traditional Arabic" color="<?php echo($color);?>"><?php echo($DeptName);?></font></b>
			</td>
			
				<td width="10%" align="center" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bordercolor="<?php echo($bordercolor);?>">
				<b><font face="Traditional Arabic" color="<?php echo($color);?>"><?php echo($AcadProgName);?></font></b>				
			</td>
		
			<!--Semester Detail-->
				<td width="5%" align="center" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bordercolor="<?php echo($bordercolor);?>">
					<b><div align="right" style="background-color: <?php echo($Lecolor);?>; color:black" title="<?php echo($tot);?>"><u><?php echo($Lectures[1][0]);?></u></div> 
				<div align="left" title="<?php echo($manag);?>"><?php echo($Lectures[1][1]);?></div></b>
			</td>
					
				<td width="5%" align="center" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bordercolor="<?php echo($bordercolor);?>">
					<b><div align="right" style="background-color: <?php echo($Lbcolor);?>;color:black" title="<?php echo($ltot);?>"><u><?php echo($Labs[1][0]);?></u></div> 
				<div align="left" title="<?php echo($manag);?>"><?php echo($Labs[1][1]);?></div></b>
			</td>
		
		</tr>

		
		<?php
		}//end of option=2		
	}//end of else
}//end of function 

//------------------------------------------------  Display Report [2]  -------------------------------------------------------------------

//Display Report[2] Header

//Function Description :
//output:
// -- Display Header of Table when (option == 1)
// -- Display Data   on Table when (option == 2)
// -- Display Footer of Table when (option == 3)

// -- Display Table Details Based on Report Type:
//  report ==2  >> Display Numbers of Students and Groups

function DisplayReportHeader2($AcadProgType,$Classno,$SemNo,$DeptName,$AcadProgName,$ToTnum,$option,$print,$report)
{
	if($print==1)
	{
		//Ready to Print page
		
		$bordercolor='black';
		
		$color='black';
		
		$bgcolor='#C0C0C0';
		
	}
	else
	{
		$bordercolor='#003366';
		
		$color='white';
		
		$bgcolor='#5A74A0';

	}//end of else
	
	switch($report)
	{
		case 2:{
				// ÚÏÏ ÇáØáÇÈ
				$CellHeader1="&#1593;&#1583;&#1583; &#1575;&#1604;&#1591;&#1604;&#1575;&#1576;";
				
				//ÚÏÏ ÇáãÌãæÚÇÊ
				$CellHeader2="&#1593;&#1583;&#1583; &#1575;&#1604;&#1605;&#1580;&#1605;&#1608;&#1593;&#1575;&#1578;";
				break;
				}

	}
	
	if( $AcadProgType==1 )
	{
		//Display Header	
		if($option==1)
		{
	?>
			<tr>
				<!--Depart Header-->
					<td width="20%" rowspan="3" align="center" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bgcolor="<?php echo($bgcolor);?>" bordercolor="<?php echo($bordercolor);?>">
					<font face="Traditional Arabic" color="<?php echo($color);?>"><b><span lang="ar-sa">&#1575;&#1604;&#1602;&#1587;&#1605;</span></b></font>
				</td>
				
				<!--AcadProg Header-->

					<td width="20%" rowspan="3" align="center" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bgcolor="<?php echo($bgcolor);?>" bordercolor="<?php echo($bordercolor);?>">
						<font face="Traditional Arabic" color="<?php echo($color);?>"><b><span lang="ar-sa">&#1575;&#1604;&#1576;&#1585;&#1606;&#1575;&#1605;&#1580;</span></b></font>
				</td>
		
		   </tr>
		
		   <tr>
				<!--- Level Headers from [1 - 4] or [1 - 5]--->
				<!-- Level 1 -->
					<td width="10%" colspan="2" align="center" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bgcolor="<?php echo($bgcolor);?>" bordercolor="<?php echo($bordercolor);?>">
						<b><font face="Traditional Arabic" color="<?php echo($color);?>">&#1575;&#1604;&#1587;&#1606;&#1577; &#1575;&#1604;&#1575;&#1608;&#1604;&#1609;</font></b>
				</td>
				
				<!-- Level 2 -->
					<td width="10%" colspan="2" align="center" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bgcolor="<?php echo($bgcolor);?>" bordercolor="<?php echo($bordercolor);?>">
						<b><font face="Traditional Arabic" color="<?php echo($color);?>">&#1575;&#1604;&#1587;&#1606;&#1577; &#1575;&#1604;&#1579;&#1575;&#1606;&#1610;&#1577;</font></b>
				</td>
			
				<!-- Level 3 -->
					<td width="10%" colspan="2" align="center" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bgcolor="<?php echo($bgcolor);?>" bordercolor="<?php echo($bordercolor);?>">
						<b><font face="Traditional Arabic" color="<?php echo($color);?>">&#1575;&#1604;&#1587;&#1606;&#1577; &#1575;&#1604;&#1579;&#1575;&#1604;&#1579;&#1577;</font></b>
				</td>
				
				<!-- Level 4 -->
					<td width="10%" colspan="2" align="center" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bgcolor="<?php echo($bgcolor);?>" bordercolor="<?php echo($bordercolor);?>">
						<b><font face="Traditional Arabic" color="<?php echo($color);?>">&#1575;&#1604;&#1587;&#1606;&#1577; &#1575;&#1604;&#1585;&#1575;&#1576;&#1593;&#1577;</font></b>
				</td>
				
				<?php		
				if($Classno==5)
				{			
				?>	
					<!-- Level 5 -->
					<td width="10%" colspan="2" align="center" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bgcolor="<?php echo($bgcolor);?>" bordercolor="<?php echo($bordercolor);?>">
						<b><font face="Traditional Arabic" color="<?php echo($color);?>">&#1575;&#1604;&#1587;&#1606;&#1577; &#1575;&#1604;&#1582;&#1575;&#1605;&#1587;&#1577;</font></b>
					</td>
				<?php
				}//end of if
				?>
		</tr>
		
		<tr>
				<td width="5%" align="center" bgcolor="<?php echo($bgcolor);?>" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bordercolor="<?php echo($bordercolor);?>"> 
				<b><font face="Traditional Arabic" color="<?php echo($color);?>"><?php echo($CellHeader1);?></font></b>
			</td>
			
				<td width="5%" align="center" bgcolor="<?php echo($bgcolor);?>" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bordercolor="<?php echo($bordercolor);?>">
				<b><font face="Traditional Arabic" color="<?php echo($color);?>"><?php echo($CellHeader2);?></font></b>
			</td>
			
				<td width="5%" align="center" bgcolor="<?php echo($bgcolor);?>" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bordercolor="<?php echo($bordercolor);?>">
				<b><font face="Traditional Arabic" color="<?php echo($color);?>"><?php echo($CellHeader1);?></font></b>
			</td>
			
				<td width="5%" align="center" bgcolor="<?php echo($bgcolor);?>" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bordercolor="<?php echo($bordercolor);?>">
				<b><font face="Traditional Arabic" color="<?php echo($color);?>"><?php echo($CellHeader2);?></font></b>
			</td>
			
				<td width="5%" align="center" bgcolor="<?php echo($bgcolor);?>" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bordercolor="<?php echo($bordercolor);?>">
				<b><font face="Traditional Arabic" color="<?php echo($color);?>"><?php echo($CellHeader1);?></font></b>
			</td>
			
				<td width="5%" align="center" bgcolor="<?php echo($bgcolor);?>" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bordercolor="<?php echo($bordercolor);?>">
				<b><font face="Traditional Arabic" color="<?php echo($color);?>"><?php echo($CellHeader2);?></font></b>
			</td>
			
				<td width="5%" align="center" bgcolor="<?php echo($bgcolor);?>" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bordercolor="<?php echo($bordercolor);?>">
				<b><font face="Traditional Arabic" color="<?php echo($color);?>"><?php echo($CellHeader1);?></font></b>
			</td>
			
				<td width="5%" align="center" bgcolor="<?php echo($bgcolor);?>" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bordercolor="<?php echo($bordercolor);?>">
				<b><font face="Traditional Arabic" color="<?php echo($color);?>"><?php echo($CellHeader2);?></font></b>
			</td>
			<?php
			if($Classno==5)
			{	
			?>
					<td width="5%" align="center" bgcolor="<?php echo($bgcolor);?>" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bordercolor="<?php echo($bordercolor);?>">
					<b><font face="Traditional Arabic" color="<?php echo($color);?>"><?php echo($CellHeader1);?></font></b>
				</td>
				
					<td width="5%" align="center" bgcolor="<?php echo($bgcolor);?>" bgcolor="<?php echo($bgcolor);?>" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bordercolor="<?php echo($bordercolor);?>">
					<b><font face="Traditional Arabic" color="<?php echo($color);?>"><?php echo($CellHeader2);?></font></b>
				</td>
			<?php
			}//end of class=5	
		  ?>
			
		</tr>
		
		<?php
		}//end of option=1
		else
		if($option == 2)
		{
			//Display Table Data
			$tot="";
			$group="";
			
		?>
		<tr>
				<td width="20%" align="center" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bordercolor="<?php echo($bordercolor);?>">
				<b><font face="Traditional Arabic" color="<?php echo($color);?>"><?php echo($DeptName);?></font></b>
			</td>
			
				<td width="20%" align="center" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bordercolor="<?php echo($bordercolor);?>">
				<b><font face="Traditional Arabic" color="<?php echo($color);?>"><?php echo($AcadProgName);?></font></b>				
			</td>
			
			<!--Level 1-->
				<td width="5%" align="center" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bordercolor="<?php echo($bordercolor);?>">
				<b>
					<div align="center"><?php echo(" ".$ToTnum[1][0]);?></div>
				</b>
			</td>
					
				<td width="5%" align="center" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bordercolor="<?php echo($bordercolor);?>">
				<b>
					<div align="center"><?php echo(" ".$ToTnum[1][1]);?></div>
				</b>
			</td>
			
			<!--Level 2-->
				<td width="5%" align="center" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bordercolor="<?php echo($bordercolor);?>">
				<b>
					<div align="center"><?php echo(" ".$ToTnum[2][0]);?></div>
				</b>
			</td>
					
				<td width="5%" align="center" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bordercolor="<?php echo($bordercolor);?>">
				<b>
					<div align="center"><?php echo(" ".$ToTnum[2][1]);?></div>
				</b>
			</td>
			
			<!--Level 3-->
				<td width="5%" align="center" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bordercolor="<?php echo($bordercolor);?>">
				<b>
					<div align="center"><?php echo(" ".$ToTnum[3][0]);?></div>
				</b>
			</td>
					
				<td width="5%" align="center" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bordercolor="<?php echo($bordercolor);?>">
				<b>
					<div align="center"><?php echo(" ".$ToTnum[3][1]);?></div>
				</b>
			</td>

			<!--Level 4-->
				<td width="5%" align="center" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bordercolor="<?php echo($bordercolor);?>">
				<b>
					<div align="center"><?php echo(" ".$ToTnum[4][0]);?></div>
				</b>
			</td>
					
				<td width="5%" align="center" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bordercolor="<?php echo($bordercolor);?>">
				<b>
					<div align="center"><?php echo(" ".$ToTnum[4][1]);?></div>
				</b>
			</td>

			<?php 
			if($Classno==5)
			{	
			?>
				<!--Level 5-->
					<td width="5%" align="center" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bordercolor="<?php echo($bordercolor);?>">
					<b>
						<div align="center"><?php echo(" ".$ToTnum[5][0]);?></div>
					</b>
				</td>
					
					<td width="5%" align="center" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bordercolor="<?php echo($bordercolor);?>">
					<b>
						<div align="center"><?php echo(" ".$ToTnum[5][1]);?></div>
					</b>
				</td>

			<?php
			}//end of if
			?>
			
		</tr>
		
		<?php
		}//end of option =2
		
	}//end of acadprog =1 
	else
	{
		//Diploma or Master Program
		
		if($option==1)
		{
			//Display Header
		?>	
			<tr>
				<!--- Depart Header -->
					<td width="10%" rowspan="3" align="center" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bgcolor="<?php echo($bgcolor);?>" bordercolor="<?php echo($bordercolor);?>">
					<font face="Traditional Arabic" color="<?php echo($color);?>"><b><span lang="ar-sa">&#1575;&#1604;&#1602;&#1587;&#1605;</span></b></font>
				</td>
			
				<!--AcadProg Name-->
					<td width="10%" rowspan="3" align="center" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bgcolor="<?php echo($bgcolor);?>" bordercolor="<?php echo($bordercolor);?>">
						<font face="Traditional Arabic" color="<?php echo($color);?>"><b><span lang="ar-sa">&#1575;&#1604;&#1576;&#1585;&#1606;&#1575;&#1605;&#1580;</span></b></font>
				</td>
			
					<td width="40%" colspan="2" align="center" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bgcolor="<?php echo($bgcolor);?>" bordercolor="<?php echo($bordercolor);?>">
					<!-- Managing Header-->
					<div align="center">
						
					</div>
				</td>
				
			</tr>
		
			<tr>
					<td width="40%" colspan="2" align="center"  bgcolor="<?php echo($bgcolor);?>" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bordercolor="<?php echo($bordercolor);?>">
					<b><font face="Traditional Arabic" color="<?php echo($color);?>">
					<?php
					if($SemNo == 1)
							echo("&#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1575;&#1604;&#1575;&#1608;&#1604;");
					else
					if($SemNo == 2)
							echo("&#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1575;&#1604;&#1579;&#1575;&#1606;&#1609;");
					else
					if($SemNo == 3)
							echo("&#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1575;&#1604;&#1579;&#1575;&#1604;&#1579;");
					
					?>
					</font></b>
				</td>
			</tr>
		
			<tr>
					<td width="5%" align="center" bgcolor="<?php echo($bgcolor);?>" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bordercolor="<?php echo($bordercolor);?>">
					<b><font face="Traditional Arabic" color="<?php echo($color);?>"><?php echo($CellHeader1);?></font></b>
				</td>
				
					<td width="5%" align="center" bgcolor="<?php echo($bgcolor);?>" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bordercolor="<?php echo($bordercolor);?>">
					<b><font face="Traditional Arabic" color="<?php echo($color);?>"><?php echo($CellHeader2);?></font></b>
				</td>
				
			</tr>
			
	<?php
		}//end of option=1
		else
		if($option==2)
		{
			
		?>
		<tr>
				<td width="10%" align="center" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bordercolor="<?php echo($bordercolor);?>">
				<b><font face="Traditional Arabic" color="<?php echo($color);?>"><?php echo($DeptName);?></font></b>
			</td>
			
				<td width="10%" align="center" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bordercolor="<?php echo($bordercolor);?>">
				<b><font face="Traditional Arabic" color="<?php echo($color);?>"><?php echo($AcadProgName);?></font></b>				
			</td>
		
			<!--Semester Detail-->
				<td width="5%" align="center" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bordercolor="<?php echo($bordercolor);?>">
					<div align="center"><?php echo(" ".$ToTnum[1][0]);?></div>
			</td>
					
				<td width="5%" align="center" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bordercolor="<?php echo($bordercolor);?>">
					<div align="center"><?php echo(" ".$ToTnum[1][1]);?></div>
			</td>
			
		</tr>

		<?php
		}//end of option=2		
	}//end of else
}//end of function2


//Display Table's Footer

function DisplayReportFooter($AcadProgType,$Classno,$TotalperLevel,$print)
{
	
	//check to print
	if($print==1)
	{
		//Ready to Print page
		
		$bordercolor='black';
		
		$color='black';
		
		$bgcolor='#C0C0C0';
		
	}
	else
	{
		$bordercolor='#003366';
		
		$color='white';
		
		$bgcolor='#5A74A0';

	}//end of else
	

	// Display Total Number of Students per each level
	?>	
	<tr>
				<td  align="middle" width="40%" colspan="2" bgcolor="<?php echo($bgcolor);?>" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bordercolor="<?php echo($bordercolor);?>">
				<font face="Traditional Arabic"><b><span lang="ar-sa">
					&#1575;&#1580;&#1605;&#1575;&#1604;&#1609; &#1575;&#1593;&#1583;&#1575;&#1583; &#1575;&#1604;&#1591;&#1604;&#1575;&#1576;
				</span></b></font>
			</td>
					
	<?php
	if($AcadProgType==1)
	{						
		
		for($j=1;$j<=$Classno;$j++)
		{
			
			if( intval($TotalperLevel[$j])== 0)
				{ $TotalperLevel[$j]='-'; }
		?>				
				<td  align="middle" width="10%" colspan="2"  bgcolor="<?php echo($bgcolor);?>" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bordercolor="<?php echo($bordercolor);?>">
				   <b><?php echo($TotalperLevel[$j]);?> </b>
			</td> 
			
		<?php		   
		}//end of for
			
	}//end of AcadprogType==1
	else
	if($AcadProgType==2)
	{	
		if( intval($TotalperLevel[1])== 0)
				{ $TotalperLevel[1]='-'; }
	?>
			<td  align="middle" width="10%" colspan="2"  bgcolor="<?php echo($bgcolor);?>" bordercolorlight="<?php echo($bordercolor);?>" bordercolordark="<?php echo($bordercolor);?>" bordercolor="<?php echo($bordercolor);?>">
				   <b><?php echo($TotalperLevel[1]);?> </b>
		</td>
		 	
	<?php		 
	}//end of acdaprogtype=2
	
}//end of function


//-------------------------------------------------------- Admin Report [3] ---------------------------------------------------------------

function GetAllTeachers($univCode,$CollegeCode,$SemNo,$year,$Qualif,$status)
{
	
	/*$sqls="select  DISTINCT(TeacherId) from Managinglec,Teachers where
			Managinglec.AcadYNo='$year' and
			Managinglec.UniversityCode='$univCode' and
			Managinglec.CollegeCode='$CollegeCode' and
			Managinglec.SemNo='$SemNo' AND 
			Teachers.Qualif = '$Qualif'
			AND Teachers.Status = '$status'
			ORDER BY `TeacherId` ASC 
			";*/
	
	$sqls="select TeacherId from Teachers where
			AcadYNo='$year' and
			UniversityCode='$univCode' and
			CollegeCode='$CollegeCode' and
			SemNo='$SemNo' and
			Qualif = '$Qualif' and
			Status = '$status'
			ORDER BY `TeacherId` ASC ";

	$results = mysql_query($sqls);
	
	$count=1;
	
	if(mysql_num_rows($results)>0)
	{
		while($row=mysql_fetch_row($results))
		{	
			$teachers[$count]=$row[0];
			$count++;
		}
		
		return $teachers;
		
	}
	else
		return -1;

}//end of methods



function DisplayReportHeader3($Totnum,$TotLec,$TotLab,$print)
{
	
	$JobsDegree = GetJobsDegree();
	
	//prepare to print Report
	if($print==1)
	{
		//Ready to Print page
		
		$bordercolor='black';
		
		$color='black';
		
		$bgcolor='#C0C0C0';
		
	}
	else
	{
		$bordercolor='#003366';
		
		$color='white';
		
		$bgcolor='#5A74A0';

	}//end of else
	
	//display table
}
//
//-------------------------------------------------------------
//  General Reports
//-------------------------------------------------------------


?>