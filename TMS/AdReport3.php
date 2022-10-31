<?php
	//Admin Report[3]: Display Number of [ Teachers ] on each College

	//Start New Table
		echo('<div align="center" dir="rtl">
				<table border="1" width="100%" id="Report1">');
		
		if (($print==0)&&($option==1))
		{?>
				<tr>
					<td width="100%" align="center" bordercolorlight="#003366" bordercolordark="#5A74A0" bordercolor="#003366" colspan="14">
						<p align="right">
							<a style="cursor: pointer" onclick="javascript:window.open('PrintAdminReport.php?UnivCode=<?php echo($univCode);?>&CollegeCode=<?php echo($CollegeCode);?>&SemNo=<?php echo($SemNo);?>&report=3','','resizable=yes,scrollbars=yes,menubar=yes,width=600,height=500');" target="_blank">
							<span lang="ar-sa">	<font face="Traditional Arabic"><b>
								<span style="text-decoration: none">&#1591;&#1576;&#1575;&#1593;&#1577; &#1575;&#1604;&#1578;&#1602;&#1585;&#1610;&#1585;</span></b></font></span><img border="0" src="print.gif" width="37" height="28"></a></p>
					</td>
				</tr>	
		<?php
		}//end of if	
		
		//initialize Total numbers of teacher
		//-----------------------------------------
		for($j=1;$j<=9;$j++)
		{
			$TotalperLevel[$j] ='0'; //total number of teacher Based on There Job Degrees per each  College
		}
		
		//-------------------------------------------
		//Get all Teachers from Managing Lectures Table
		
		$AllTeachers=;
		
		
		//Display Table's Footer
		
		echo("</table></div></br>");

?>