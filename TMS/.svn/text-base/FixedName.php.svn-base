<html dir="rtl">

<?php

//Fix the Duplication of Teacher name
//Teacher Form
function DisplayFixedTeacherForm($uncode1,$SelectedCollege,$CollTeacherName,$AssistCollege,$AssistTeacher)
{
?>
</br></br>
<div align="center">
<table border="0" width="100%" id="table22" dir="rtl">
	
	<form name="f1" method="POST"  action="doFixed.php">
		
	<tr>
		<td bordercolor="#003366" align="right" bgcolor="#2F446F" height="4">
			<font face="Traditional Arabic" color="yellow" size="4"><b>
			<span dir="rtl">
			<?php
					 echo("&nbsp;&#1578;&#1593;&#1583;&#1610;&#1604; &#1578;&#1603;&#1585;&#1575;&#1585; &#1575;&#1587;&#1605;&#1575;&#1569; &#1575;&#1604;&#1575;&#1587;&#1575;&#1578;&#1584;&#1577;");
			?>
			 </span>
			 </b></font>
		</td>
	</tr>
				
	<tr>
		<td bordercolor="#003366" align="right" bgcolor="#5A74A0" height="15" bordercolorlight="#B0CCFF" bordercolordark="#B0CCFF">
			<table border="0" width="100%" id="table26">
					
					<?php
						$conn = db_connect();

						//Teacher on Specific College
						
						$result = mysql_query("select distinct(CollegeCode),CollegeName from Colleges where 
							
								UniversityCode='$uncode1' order by CollegeName");
						
						if(mysql_num_rows($result)>0)
						{
		
					?>
					<tr>
					   <td height="28%" width="99%" colspan="2">						
						</td>
				   </tr>
					<tr>
					   <td height="28%" width="24%">
							<p align="center"><span dir="rtl"><b>
							<font color="#FFFFFF" face="Traditional Arabic">&#1575;&#1604;&#1603;&#1604;&#1610;&#1577;</font></b>

					  		</span>

					  	</td>
					
						<td height="28%" width="75%">
							<span dir="rtl">
							<!-- Select Colleges--->
							
									<select size="1" name="DCollege" dir="rtl" style="color: #003366; font-family: Traditional Arabic; font-size: 12pt; font-weight: bold" tabindex="1" onchange="javascript:document.f1.action='doFixed.php';javascript:document.f1.submit();">
								
										<option value="" selected>&#1575;&#1582;&#1578;&#1585; &#1575;&#1604;&#1603;&#1604;&#1610;&#1577;</option>

								<?php
									while($row=mysql_fetch_row($result))
									{	
								?>
										<option value="<?php echo($row[0]);?>" <?php if($SelectedCollege == $row[0]){?> selected <?php }?> >
											<?php 
												echo($row[1]); 
												$c++;
											?>
										</option>
								<?php
									}//end of while
								?>
								<!--other option : Teacher from other univerities-->
									<option value="-1" <?php if($SelectedCollege == -1){?> selected<?php }?> >
										&#1575;&#1582;&#1585;&#1609;
									</option>


							</select>
		
						</span>
		
						</td>
				   
				   </tr>
					<?php
						
					}//end of if
					?>
					<tr>
					   <td height="28%" width="24%">
					  		<p align="center">
					  		<span dir="rtl">
					  				<img border="0" id="img69" src="Colleges-PAGE/pTeacherNam.jpg" height="24" width="118" alt="&#1575;&#1587;&#1605; &#1575;&#1604;&#1575;&#1587;&#1578;&#1575;&#1584;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 14; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1575;&#1587;&#1605; &#1575;&#1604;&#1575;&#1587;&#1578;&#1575;&#1584;"><font color="#FFFF00">*</font>
									<b><font color="#FFFF00" face="Traditional Arabic">(&#1575;&#1587;&#1578;&#1575;&#1584; &#1576;&#1575;&#1604;&#1603;&#1604;&#1610;&#1577;)
					  		</font></b>
					  		</span>
					  </td>
					
					<td height="28%" width="75%">
					
							<span dir="rtl">
					
							<select size="4" name="D1" dir="rtl" style="color: #003366; font-family: Traditional Arabic; font-size: 12pt; font-weight: bold" tabindex="2" onchange="javascript:document.f1.action='doFixed.php';javascript:document.f1.submit();">
						<option value="" selected>&#1575;&#1582;&#1578;&#1585; &#1575;&#1604;&#1575;&#1587;&#1578;&#1575;&#1584;</option>
						<?php
								
						//ÇÓÊÇÐ ÈÇáßáíÉ	
						$sqls_query8 = "select TeacherNo,TeacherName from Teachers where UniversityCode='$uncode1' and CollegeCode='$SelectedCollege' and Status='0' order by TeacherName ";						
						$results8=mysql_query($sqls_query8);
						if (mysql_num_rows($results8))
						{
							while($rows8=mysql_fetch_row($results8))
							{?>
								<option value="<?php echo($rows8[0]);?>" <?php if(strcmp($CollTeacherName,$rows8[0])==0){ ?> selected <?php }?> >
								<?php
									echo($rows8[1]);
								?>
								</option>
							<?php
							}//end of while
							?>
						</select>
						<?php
						}//end of if
						?>
				 </span>
				 </td>
				</tr>
				<?php
				if($SelectedCollege)
				{
				?>	
				<tr>
					   <td height="28%" width="24%">
						  	<p align="center"><span dir="rtl"><b>
						  	<font color="#FFFFFF" face="Traditional Arabic">
						  		&#1605;&#1578;&#1593;&#1575;&#1608;&#1606; &#1605;&#1593; &#1603;&#1604;&#1610;&#1577;
							</font></b>
					  		</b>
					  		</span>
					  	</td>
					
						<td height="28%" width="75%">
							<span dir="rtl">
								<select size="1" name="AssistCollege" dir="rtl" style="color: #003366; font-family: Traditional Arabic; font-size: 12pt; font-weight: bold" tabindex="3" onchange="javascript:document.f1.action='doFixed.php';javascript:document.f1.submit();">
								<option value="" selected>&#1575;&#1582;&#1578;&#1585; &#1575;&#1604;&#1603;&#1604;&#1610;&#1577;</option>

								<?php
									$result = mysql_query("select distinct(CollegeCode),CollegeName from Colleges where 
							
									UniversityCode='$uncode1' order by CollegeName");

									while($row=mysql_fetch_row($result))
									{	
								?>
										<option value="<?php echo($row[0]);?>" <?php if($AssistCollege== $row[0]){?> selected <?php }?> >
											<?php 
												echo($row[1]); 
												$c++;
											?>
										</option>
								<?php
									}//end of while
								?>
								<!--other option : Teacher from other univerities-->
									<option value="-1" <?php if($AssistCollege== -1){?> selected <?php }?> >
										&#1575;&#1582;&#1585;&#1609;
									</option>


							</select>

						</span>

						</td>
						
					</tr>
					<tr>
					   <td height="28%" width="24%">
								<p align="center">
								<span dir="rtl">
								<font face="Traditional Arabic" color="#FFFFFF">
									<b>&#1575;&#1604;&#1575;&#1587;&#1605; &#1575;&#1604;&#1605;&#1583;&#1582;&#1604; &#1576;&#1575;&#1604;&#1603;&#1604;&#1610;&#1577;

								</b></font>

								</span>

						</td>
					
						<td height="28%" width="75%">
							<span dir="rtl">
							<select size="4" name="D2" dir="rtl" style="color: #003366; font-family: Traditional Arabic; font-size: 12pt; font-weight: bold" tabindex="4">
						<option value="" selected>&#1575;&#1582;&#1578;&#1585; &#1575;&#1604;&#1575;&#1587;&#1578;&#1575;&#1584;</option>
						<?php
								
						//ÇÓÊÇÐ ÈÇáßáíÉ	
						$sqls_query8 = "select TeacherNo,TeacherName from Teachers where UniversityCode='$uncode1' and CollegeCode='$_POST[AssistCollege]' and Status='1' order by TeacherName ";						
						$results8=mysql_query($sqls_query8);
						if (mysql_num_rows($results8))
						{
							while($rows8=mysql_fetch_row($results8))
							{?>
								<option value="<?php echo($rows8[0]);?>" <?php if(strcmp($AssistTeacher,$rows8[0])==0){ ?> selected <?php }?> >
								<?php
									echo($rows8[1]);
								?>
								</option>
							<?php
							}//end of while
							?>
						</select>
						<?php
						}//end of if
						?>
						
						</span>
						
						</td>
						
				</tr>
				<?php
				}//end of post
				?>
				</table>
				 </td>
				</tr>
				<tr>
					<td bordercolor="#003366" align="center" width="93%" bgcolor="#2F446F" bordercolorlight="#2F446F" bordercolordark="#2F446F">
					<span dir="rtl">
					<input type="submit" value="   &#1581;&#1601;&#1592;  " name="B3" style="color: #FFFFFF; font-family: Traditional Arabic; font-size: 14pt; font-weight: bold; background-color: #5A74A0" tabindex="5"></span></td>
					</tr>
					</table>
			
				</div>
			
				</form>
				</div>
			</td>
	</tr>
</table>
<?php
}//end of Teacher Form