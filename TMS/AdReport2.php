<?php
	//Admin Report[2]: Display Number of [ Students ] and [ Groups ]

	//Start New Table
		echo('<div align="center" dir="rtl">
				<table border="1" width="100%" id="Report1">');
		
		if (($print==0)&&($option==1))
		{?>
				<tr>
					<td width="100%" align="center" bordercolorlight="#003366" bordercolordark="#5A74A0" bordercolor="#003366" colspan="14">
						<p align="right">
							<a style="cursor: pointer" onclick="javascript:window.open('PrintAdminReport.php?UnivCode=<?php echo($univCode);?>&CollegeCode=<?php echo($CollegeCode);?>&SemNo=<?php echo($SemNo);?>&report=2','','resizable=yes,scrollbars=yes,menubar=yes,width=600,height=500');" target="_blank">
							<span lang="ar-sa">	<font face="Traditional Arabic"><b>
								<span style="text-decoration: none">&#1591;&#1576;&#1575;&#1593;&#1577; &#1575;&#1604;&#1578;&#1602;&#1585;&#1610;&#1585;</span></b></font></span><img border="0" src="print.gif" width="37" height="28"></a></p>
					</td>
				</tr>	
		<?php
		}//end of if	
		
		//initialize Total per level
		//-----------------------------------------
		for($j=1;$j<=5;$j++)
		{
			$TotalperLevel[$j] ='0'; //total number of student per level
		}
		
		$stflag=4;
		//-------------------------------------------
		foreach($Depts as $DeptNo)
		{	
				//-- Get AcadProg
				
				$AcadProgId=GetAcadDegreeId($univCode,$CollegeCode,$DeptNo);
				
				$AcadProg=GetAcadProg($AcadProgId); 
				
				$NoOfSemester=$AcadProg[1];
												
				$AcadProgType=$AcadProg[2];
				
				//-------------------------------------------- Academic Program --------------------------------------------
				if($AcadProgType==1)
				{
					$Levels=GetNumberOfClasses($AcadProgId);
					
					//specfied level
						
						if(($Levels==4)||($Levels==5))
							$stflag=$Levels;
					
					if($option==1)
					{
						DisplayReportHeader2($AcadProgType,$Levels,$SemNo,$DeptName,$AcadProgName,$ToTnum,1,$print,$report);
						$option++;
					}
					//-----------------------------------
							
					$DeptName=GetDeptName($univCode,$CollegeCode,$DeptNo);
						
					$AcadProgName=$AcadProg[0];
						
					//------------------------------------	
					
					$Classno=1;
					
					//----------initialize Arrays-------
					for($j=1;$j<=5;$j++)
					{
						$ToTnum[$j][0]='-'; //number of student
						$ToTnum[$j][1]='-'; //number of groups
					
					}//end of for
					//----------------------------------
					while($Classno<=$Levels)
					{
						$tot=0; $group=1;
						
						$Group=0;
						$NumStud=0;
						
						//[1] get Total number of [Students ] [Groups]
						
						$SecIDs=GetDeptSection($univCode,$CollegeCode,$DeptNo,$AcadProgId,$Classno);
						
						if($SecIDs==0)
						{
							//Get Number of Students
							
							 $NumStud=GetNoOFStudent($CollegeCode,$univCode,$DeptNo,$AcadProgId,$SemNo,$Classno,$year,0);
							 
							//Get Number of Group 
						
							$Group= GetNoOFGroups($CollegeCode,$univCode,$DeptNo,$AcadProgId,$SemNo,$Classno,$year,0);

						}
						else
						{
							foreach($SecIDs as $SecID)
 							{
 			
 								$NumStud=$NumStud + GetNoOFStudent($CollegeCode,$univCode,$DeptNo,$AcadProgId,$SemNo,$Classno,$year,$SecID);

 								$Group= $Group + GetNoOFGroups($CollegeCode,$univCode,$DeptNo,$AcadProgId,$SemNo,$Classno,$year,$SecID);
 							
 							}//end of foreach

						}//end of else
						
						
						//Check if it [zero] >> not inserted
						
						$NumStud= intval($NumStud);
						$Group= intval($Group);

						if( $NumStud == 0 )
							 $NumStud='-';
			
						if( $Group == 0 )
							$Group='-';
							
						$ToTnum[$Classno][$tot]=  $NumStud;
						$ToTnum[$Classno][$group]= $Group;
									
						$Classno++;
						
					}//end of while
				
					//Display Tabel Data
					
					DisplayReportHeader2($AcadProgType,$Levels,$SemNo,$DeptName,$AcadProgName,$ToTnum,2,$print,$report);
					
					//Get Total Number per each level
					
					for($j=1;$j<=sizeof($ToTnum);$j++)
					{
						$TotalperLevel[$j]=$TotalperLevel[$j]+$ToTnum[$j][0];
					}
					
				}//end of if
				//-------------------------------------------- Academic Program :[Deploma] or [Master] ----------------------------------------- 
				else
				{
					//if AcadProg Type : Master or Deploma
					
					$DeptName=GetDeptName($univCode,$CollegeCode,$DeptNo);
						
					$AcadProgName=$AcadProg[0];

					if($option==1)
					{
						//Display Table's Header [option==1]
						
						DisplayReportHeader2($AcadProgType,$Levels,$SemNo,$DeptName,$AcadProgName,$ToTnum,1,$print,$report);
						
						$option++;
 					}
					
					//Define Classno based on Semester
					if ( ( ($NoOfSemester==2) || ($NoOfSemester==3)) && ($SemNo!=3) )
					{
						$Classno=1;
						
					}
					else
					if ( ($NoOfSemester==3)&& ($SemNo==3) )
					{
						$Classno=2;
							
						$SemNo=1;

					}
					
					//Get Sections 
					$SecIDs=GetDeptSection($univCode,$CollegeCode,$DeptNo,$AcadProgId,$Classno);
						
					if($SecIDs==0)
					{
							//Get Number of Students
							
							 $NumStud=GetNoOFStudent($CollegeCode,$univCode,$DeptNo,$AcadProgId,$SemNo,$Classno,$year,0);
							
							//Get Number of Group 
						
							$Group= GetNoOFGroups($CollegeCode,$univCode,$DeptNo,$AcadProgId,$SemNo,$Classno,$year,0);

					}
					else
					{
						foreach($SecIDs as $SecID)
 						{
 			
 								$NumStud=$NumStud + GetNoOFStudent($CollegeCode,$univCode,$DeptNo,$AcadProgId,$SemNo,$Classno,$year,$SecID);

 								$Group= $Group + GetNoOFGroups($CollegeCode,$univCode,$DeptNo,$AcadProgId,$SemNo,$Classno,$year,$SecID);
 							
 						}//end of foreach

					}//end of else
						
					
					$NumStud= intval($NumStud);
					$Group= intval($Group);

					if( $NumStud == 0 )
							 $NumStud='-';
							 
					if( $Group == 0 )
							$Group='-';
						
					$ToTnum[1][0]=  $NumStud;
					$ToTnum[1][1]=  $Group;

					//Display Table Data [option== 2]
						
						DisplayReportHeader2($AcadProgType,$Classno,$SemNo,$DeptName,$AcadProgName,$ToTnum,2,$print,$report);
					
					
					//Get Total Number per each level
					
						$TotalperLevel[1]=$TotalperLevel[1]+$ToTnum[1][0];

				}//end of else			
			
		}//end foreach
		
		//Display Table's Footer
		
		$Classno=$stflag;
		
		DisplayReportFooter($AcadProgType,$Classno,$TotalperLevel,$print);	
		
		echo("</table></div></br>");

?>