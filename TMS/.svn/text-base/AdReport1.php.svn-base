<?php
	//Admin Report[1]: Display Current Hours [ Lectures ] and [ Labs ]

	//Start New Table
		echo('<div align="center" dir="rtl">
				<table border="1" width="100%" id="Report1">');
					
		if (($print==0)&&($option==1))
		{?>
				<tr>
					<td width="100%" align="center" bordercolorlight="#003366" bordercolordark="#5A74A0" bordercolor="#003366" colspan="14">
						<p align="right">
							<a style="cursor: pointer" onclick="javascript:window.open('PrintAdminReport.php?UnivCode=<?php echo($univCode);?>&CollegeCode=<?php echo($CollegeCode);?>&SemNo=<?php echo($SemNo);?>&report=1','','resizable=yes,scrollbars=yes,menubar=yes,width=600,height=500');" target="_blank">
							<span lang="ar-sa">	<font face="Traditional Arabic"><b>
								<span style="text-decoration: none">&#1591;&#1576;&#1575;&#1593;&#1577; &#1575;&#1604;&#1578;&#1602;&#1585;&#1610;&#1585;</span></b></font></span><img border="0" src="print.gif" width="37" height="28"></a></p>
					</td>
				</tr>	
		<?php
		}//end of if		
			
		foreach($Depts as $DeptNo)
		{	
				//-- Get AcadProg
				
				$AcadProgId=GetAcadDegreeId($univCode,$CollegeCode,$DeptNo);
				
				$AcadProg=GetAcadProg($AcadProgId); 
				
				$NoOfSemester=$AcadProg[1];
												
				$AcadProgType=$AcadProg[2];
				
				if($AcadProgType==1)
				{
					$Levels=GetNumberOfClasses($AcadProgId);
					
					if($option==1)
					{
						DisplayReportHeader($AcadProgType,$Levels,$SemNo,$DeptName,$AcadProgName,$Lectures,$Labs,$ToTLec,$ToTLab,1,$print);
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
						$Lectures[$j][0]=0;
						$Lectures[$j][1]=0;
						
						$Labs[$j][0]=0;
						$Labs[$j][1]=0;
					}//end of for
					//----------------------------------
					while($Classno<=$Levels)
					{
						$tot=0; $manag=1;
						
						//[1] get Total Lecture's Hours [TotalHours ] [ManagingHours]
						
						$LectureHours=GetSubjectHours($univCode,$CollegeCode,$DeptNo,$AcadProgId,$Classno,$SemNo);
						
						$ManagLectureHours = GetManagSubjectHours($univCode,$CollegeCode,$DeptNo,$AcadProgId,$Classno,$SemNo);
						
						
						$Lectures[$Classno][$tot]=$LectureHours;
						$Lectures[$Classno][$manag]=$ManagLectureHours;
						
						
						//[2] Get Total Lab's Hours [TotalHours ] [ManagingHours]
						
						$LabHours= GetLabHours($univCode,$CollegeCode,$DeptNo,$AcadProgId,$Classno,$SemNo);
						
						$ManagLabHours= GetManagLabHours($univCode,$CollegeCode,$DeptNo,$AcadProgId,$Classno,$SemNo);
						
						$Labs[$Classno][$tot]=$LabHours;
						$Labs[$Classno][$manag]=$ManagLabHours;
												
						
						//[3] get Total Hours of All Managing Lectures and Labs
						
						$ToTLec=$ToTLec + $ManagLectureHours;
						
						$ToTLab=$ToTLab + $ManagLabHours;
						
												
						$Classno++;
						
					  }//end of while
				
					//Display Tabel Data
					
					DisplayReportHeader($AcadProgType,$Levels,$SemNo,$DeptName,$AcadProgName,$Lectures,$Labs,$ToTLec,$ToTLab,2,$print);
					
					$ToTLec=0;
					$ToTLab=0;
					
				}//end of if
				else
				{
					$Lectures[1][0]=0;
					$Lectures[1][1]=0;
						
					$Labs[1][0]=0;
					$Labs[1][1]=0;

					//if AcadProg Type : Master or Deploma
					
					$DeptName=GetDeptName($univCode,$CollegeCode,$DeptNo);
						
					$AcadProgName=$AcadProg[0];

					if($option==1)
					{
						//Display Table's Header [option==1]
						
						DisplayReportHeader($AcadProgType,$Levels,$SemNo,$DeptName,$AcadProgName,$Lectures,$Labs,$ToTLec,$ToTLab,1,$print);
						
						$option++;
 					}
					
					//Define Classno Based on Semester
					if ( ( ($NoOfSemester==2) || ($NoOfSemester==3)) && ($SemNo!=3) )
					{
						$Classno=1;
					}
					else
					if ( ($NoOfSemester==3)&& ($SemNo==3))
					{
						$Classno=2;
							
						$SemNo=1;
					
					}//end of else	
						
					
					//[1] Get Lectures Hours 
						
						$LectureHours=GetSubjectHours($univCode,$CollegeCode,$DeptNo,$AcadProgId,$Classno,$SemNo);
						$ManagLectureHours = GetManagSubjectHours($univCode,$CollegeCode,$DeptNo,$AcadProgId,$Classno,$SemNo);
						
						$Lectures[1][0]=$LectureHours;
						$Lectures[1][1]=$ManagLectureHours;
						
					//[2] Get Labs Hours
						
						$LabHours= GetLabHours($univCode,$CollegeCode,$DeptNo,$AcadProgId,$Classno,$SemNo);
						$ManagLabHours= GetManagLabHours($univCode,$CollegeCode,$DeptNo,$AcadProgId,$Classno,$SemNo);
						
						$Labs[1][0]=$LabHours;
						$Labs[1][1]=$ManagLabHours;
						
						
					//[3] Get Total Managing Hours
						
						$ToTLec=$ToTLec + $ManagLectureHours;
						
						$ToTLab=$ToTLab + $ManagLabHours;

					//Display Table Data [option== 2]
						
						DisplayReportHeader($AcadProgType,$Classno,$SemNo,$DeptName,$AcadProgName,$Lectures,$Labs,$ToTLec,$ToTLab,2,$print);

					
					$ToTLec=0;
					$ToTLab=0;
						
				}//end of else			
			
		}//end foreach
			
		echo("</table></div>");

?>