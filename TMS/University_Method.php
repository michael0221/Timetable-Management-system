
<?php

require_once('Report_Method.php');

//[1] Display University's Registration Form
function display_University_form($univCode,$univName,$logo,$uploaded)
{
?>
<body>

<div align="center">
<table border="0" width="73%" id="table1">
<tr>
	<td align="center">
	<form method="POST" ENCTYPE="multipart/form-data" action="InsertUniversity.php?uploaded=<?php echo($uploaded);?>" >
		<div align="center">
		<table class="aaa" border="0" width="101%" id="table2" dir="rtl" height="165">
		<tr>
			<td width="26%" bordercolorlight="#9999FF" bordercolordark="#6600FF" bgcolor="#5A74A0" dir="ltr" height="30" align="center">
					<p align="center">&nbsp;<img border="0" id="img1" src="InsertUniversity_file/button4.jpg" height="22" width="110" alt="&#1603;&#1608;&#1583; &#1575;&#1604;&#1580;&#1575;&#1605;&#1593;&#1577;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 18; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1603;&#1608;&#1583; &#1575;&#1604;&#1580;&#1575;&#1605;&#1593;&#1577;">
				</p>
			</td>
			
			<td width="67%" dir="ltr" height="30" colspan="2">
				<p align="right">
					<input name="T1" value= "<?php echo($univCode);?>" size="40" dir="rtl" tabindex="1" style="font-size: 12pt; color: #2F446F; font-weight: bold; font-family:Traditional Arabic; ">
				</p>
			</td>
		</tr>

		<tr>
			<td width="26%" bordercolorlight="#9999FF" bordercolordark="#6600FF" bgcolor="#5A74A0" height="25" dir="ltr" align="center">
				<p align="center">
					<img border="0" id="img2" src="InsertUniversity_file/button6.jpg" height="22" width="110" alt="&#1575;&#1587;&#1605; &#1575;&#1604;&#1580;&#1575;&#1605;&#1593;&#1577;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 18; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1575;&#1587;&#1605; &#1575;&#1604;&#1580;&#1575;&#1605;&#1593;&#1577;">
				</p>
			</td>

			<td width="67%" height="25" dir="ltr" colspan="2">
				<p align="right">
						<input type="text" name="T3" value= "<?php echo($univName);?>" size="40" dir="rtl" tabindex="2" style="color: #2F446F; font-size: 12pt; font-weight: bold; font-family:Traditional Arabic">
				</p>
			</td>
		</tr>

		<tr>
			<td width="26%" bordercolorlight="#9999FF" bordercolordark="#6600FF" height="41" dir="ltr" align="center" bgcolor="#5A74A0">
					<img border="0" id="img3" src="InsertUniversity_file/button7.jpg" height="22" width="110" alt="&#1588;&#1593;&#1575;&#1585; &#1575;&#1604;&#1580;&#1575;&#1605;&#1593;&#1577;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 18; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1588;&#1593;&#1575;&#1585; &#1575;&#1604;&#1580;&#1575;&#1605;&#1593;&#1577;">
			</td>
		
			<td width="34%" bordercolorlight="#9999FF" bordercolordark="#6600FF" height="41" dir="ltr" align="center">
				<INPUT TYPE="hidden" name="MAX_FILE_SIZE" value="1000000">
					<INPUT NAME="uploadedfile" TYPE="file" size="25" dir="rtl" tabindex="3" style="font-size: 12pt; color: #2F446F; font-weight: bold; font-family:Traditional Arabic; float:right">
			</td>
			
			<td width="33%" bordercolorlight="#9999FF" bordercolordark="#6600FF" height="41" dir="ltr" align="center">
				<?php
					if($uploaded==1)
					{
						//print('<p><a href="/'.$logo.'">View File</a></p>');
					}
				?>
			</td>
		</tr>
		
		<tr>
			<td width="97%" bordercolorlight="#9999FF" bordercolordark="#6600FF" height="47" dir="ltr" align="center" colspan="3">
					<input name="Submit" type="submit" value="&#1581;&#1601;&#1592;"  tabindex="3" style="color: #FFFFFF; font-size: 14pt; font-weight: bold; font-family: Traditional Arabic; vertical-align: middle; letter-spacing: 2; border: 3px inset #B0CCFF; ; background-color:#5A74A0" dir="rtl">
			</td>
		</tr>
		</table>
		</div>
		</form>
	</td>
	</tr>
	</table>
	<p align="left" >
<?php
}
//---------------------------------------------------------------------------------------------------------------------
//[2] Update University Detail
function UpdateUniv_Form($uncode11,$univCode,$univName,$logo)
{
	//Update University Form
?>
�<div align="center">

<table border="0" width="78%" id="table1">
<tr>
	<td align="center">

	<form method="POST" ENCTYPE="multipart/form-data" action="supdateUniv.php?&uncode11=<?php echo($uncode11); ?>" >
	<div align="center">
	<table class="aaa" border="0" width="83%" id="table2" dir="rtl" height="165">
		<tr>
			<td width="26%" bordercolorlight="#9999FF" bordercolordark="#6600FF" bgcolor="#5A74A0" dir="ltr" height="30" align="center">
				<p align="center">&nbsp;
						<img border="0" id="img1" src="InsertUniversity_file/button4.jpg" height="22" width="110" alt="&#1603;&#1608;&#1583; &#1575;&#1604;&#1580;&#1575;&#1605;&#1593;&#1577;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 18; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1603;&#1608;&#1583; &#1575;&#1604;&#1580;&#1575;&#1605;&#1593;&#1577;">
				</p>
			</td>
			
			<td width="72%" dir="ltr" height="30" colspan="2">
			<p align="right">
					<input name="T1" value= "<?php echo($univCode);?>" size="40" dir="rtl" tabindex="1" style="font-size: 12pt; color: #2F446F; font-weight: bold; font-family:Traditional Arabic; ">
			</p>
			</td>
		</tr>

		<tr>
			<td width="26%" bordercolorlight="#9999FF" bordercolordark="#6600FF" bgcolor="#5A74A0" height="25" dir="ltr" align="center">
				<p align="center">
						<img border="0" id="img2" src="InsertUniversity_file/button6.jpg" height="22" width="110" alt="&#1575;&#1587;&#1605; &#1575;&#1604;&#1580;&#1575;&#1605;&#1593;&#1577;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 18; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1575;&#1587;&#1605; &#1575;&#1604;&#1580;&#1575;&#1605;&#1593;&#1577;">
				</p>
			</td>
			
			<td width="72%" height="25" dir="ltr" colspan="2">
				<p align="right">
						<input type="text" name="T3" value= "<?php echo($univName);?>" size="40" dir="rtl" tabindex="2" style="color: #2F446F; font-size: 12pt; font-weight: bold; font-family:Traditional Arabic">
				</p>
			</td>
		</tr>

		<tr>
			<td width="26%" bordercolorlight="#9999FF" bordercolordark="#6600FF" height="44" dir="ltr" align="center" bgcolor="#5A74A0">
					<img border="0" id="img3" src="InsertUniversity_file/button7.jpg" height="22" width="110" alt="&#1588;&#1593;&#1575;&#1585; &#1575;&#1604;&#1580;&#1575;&#1605;&#1593;&#1577;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 18; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1588;&#1593;&#1575;&#1585; &#1575;&#1604;&#1580;&#1575;&#1605;&#1593;&#1577;">
			</td>
			
			<td width="11%" bordercolorlight="#9999FF" bordercolordark="#6600FF" height="44" dir="ltr" align="center">
				<INPUT TYPE="hidden" name="MAX_FILE_SIZE" value="1000000">
				<img border="0" src="<?php echo($logo);?>" width="54" height="39">
			</td>
			
			<td width="59%" bordercolorlight="#9999FF" bordercolordark="#6600FF" height="44" dir="ltr" align="center">
					<INPUT NAME="uploadedfile"  TYPE="file" size="25" dir="rtl" tabindex="3" style="font-size: 12pt; color: #2F446F; font-weight: bold; font-family:Traditional Arabic; float:right">
			</td>
		</tr>
		<tr>
			<td width="97%" bordercolorlight="#9999FF" bordercolordark="#6600FF" height="46" dir="ltr" align="center" colspan="3">
					<input name="Submit" type="submit" value="&#1578;&#1593;&#1583;&#1610;&#1604;"  tabindex="3" style="color: #FFFFFF; font-size: 14pt; font-weight: bold; font-family: Traditional Arabic; vertical-align: middle; letter-spacing: 2; border: 3px inset #B0CCFF; ; background-color:#5A74A0" dir="rtl">
			</td>
		</tr>
		</table>
		</div>
		</form>
	</td>
</tr>
</table>
<p align="left" >
<?php
}
//------------------------------------------------------ Administrator Reports ----------------------------------------------------------------------------
//[3] Change Time Slots for all Colleges [7:30 am - 8:00 pm] 

function display_AdminChangSlot_form($year,$SemNo,$univCode)
{
?>
<body>

<div align="center">

<table border="0" width="73%" id="table1">
<tr>
	<td align="center">

	<form method="POST" action="AdminChangeStartTime.php" >
		
		<div align="center">

		<table class="aaa" border="0" width="60%" id="slottime" dir="rtl" height="165" cellpadding="3">

		<tr>
			<!-- MaxYear-->
			<td width="26%" bordercolorlight="#9999FF" bordercolordark="#6600FF" bgcolor="#5A74A0" dir="ltr" height="30" align="center">
				<b><font size="4" face="Traditional Arabic" color="#FFFFFF">&#1575;&#1604;&#1593;&#1575;&#1605; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609;
				</font></b>
			</td>

			<td width="67%" dir="ltr" height="30" colspan="2" align="right">

				<select size="1" name="MaxYear" style="color: #2F446F; font-family: Times New Roman; font-size: 12pt; font-weight: bold" tabindex="1" dir="rtl">
					<option value="<?php echo($year);?>" selected> <?php echo($year);?></option>				
			</select>
			</td>
		</tr>
		
		<!-- Semester-->
		<tr>
			<td width="26%" bordercolorlight="#9999FF" bordercolordark="#6600FF" bgcolor="#5A74A0" dir="ltr" height="30" align="center">
				<b><font size="4" face="Traditional Arabic" color="#FFFFFF">
				&#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609;
				</font></b>
			</td>

			<td width="67%" dir="ltr" height="30" colspan="2" align="right">

					<select size="1" name="SemNo" style="color: #2F446F; font-family: Traditional Arabic; font-size: 12pt; font-weight: bold" tabindex="1" dir="rtl">
					
					<option value="1" <?php if($SemNo==1){?> selected <?php }?> > 
							&#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1575;&#1604;&#1575;&#1608;&#1604;
					</option>
					
					<option value="2" <?php if($SemNo==2){?> selected <?php }?> > 
							&#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1575;&#1604;&#1579;&#1575;&#1606;&#1609;
					</option>
				</select>
			</td>
		</tr>

		<tr>
			<!--university name --> 
			<td width="26%" bordercolorlight="#9999FF" bordercolordark="#6600FF" bgcolor="#5A74A0" dir="ltr" height="30" align="center">
				<b><font size="4" face="Traditional Arabic" color="#FFFFFF">&#1575;&#1587;&#1605; &#1575;&#1604;&#1580;&#1575;&#1605;&#1593;&#1577;
				</font></b>
			</td>

			<td width="67%" dir="ltr" height="30" colspan="2" align="right">
				
					<select size="1" name="UnivCode" style="color: #2F446F; font-family: Traditional Arabic; font-size: 12pt; font-weight: bold" tabindex="1" dir="rtl">
					
					<option value="" <?php if(strcmp($univCode,"")==0){?> selected <?php }?> selected> 
						--&#1575;&#1582;&#1578;&#1585; &#1575;&#1604;&#1580;&#1575;&#1605;&#1593;&#1577;---
					</option>
					
					<?php
					//select * Universities Registered on the System
					$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
					$sql = "select UniversityCode,UniversityName from Universities";
					$result = mysqli_query($mysqli,$sql);
					
					while($row = mysqli_fetch_row($result))
					{
					?>
						<option value="<?php echo($row[0]);?>" <?php if($univCode==$row[0]){?> selected <?php }?> > 
							
							<?php echo($row[1]);?>
						
						</option>
					<?php
					
					}//end of while
					
					?>
				</select>
			</td>
		</tr>
		
		<tr>
			<td width="60%" bordercolorlight="#9999FF" bordercolordark="#6600FF" height="47" dir="ltr" align="center" colspan="3">
					<input name="BS" type="submit" value="&#1586;&#1605;&#1606; &#1576;&#1583;&#1575;&#1610;&#1577; &#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578; &#1605;&#1606; 7:30"  tabindex="3" style="color: #FFFFFF; font-size: 14pt; font-weight: bold; font-family: Traditional Arabic; vertical-align: middle; letter-spacing: 2; border: 3px inset #B0CCFF; ; background-color:#5A74A0" dir="rtl">
			</td>
		</tr>
</table>
</div>
</form>
</td>
</tr>
</table>
</div>
<?php
}//end of method

//---------------------------------------------------------- Lecture and Labs ------------------------------------------------------------------------

function display_Building_form()
{$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
	$un= $_POST['D1'];
	$z = $_POST['R1'];
	
	switch($z)
	{
		case '1':
					$t1="checked";
					$t2="";
					break;

		case '2':
					$t1="";
					$t2="checked";
					break;

		default: // By default the 2th selection is selected
					$t1="";
					$t2="";
			break;
	}//end of switch

?>

<div align="center">
<form method="POST" action="Display_Building.php">
	<div align="center">
	<table border="0" width="66%" id="table1">
		<tr>
			<td>
		  	<div align="center">
		  	<table border="0" width="70%" bordercolorlight="#003366" bordercolordark="#003366" id="table4" bordercolor="#003366" height="34">
			<tr>
				<td bordercolor="#003366" align="center" height="30" bordercolorlight="#003366" bordercolordark="#003366">
			    <p align="right">
			    <select size="1" name="D1" dir="rtl" tabindex="1" style="color: #003366; font-family: Traditional Arabic; font-size: 12pt; font-weight: bold">
				<option value="" selected>&#1575;&#1582;&#1578;&#1585; &#1575;&#1604;&#1580;&#1575;&#1605;&#1593;&#1577;</option>
				<?php
				$sql_query="select * from Universities order by UniversityCode";
				$result=mysqli_query($mysqli,$sql_query);
				if (mysqli_num_rows($result))
				 {
				    while($row=mysqli_fetch_row($result))
					{?>

					<option value="<?php
					echo($row[0]);
					?>"
					<?php
					if(strcmp($un,$row[0])==0) { ?> selected <?php }
					?> >
					<?php
					echo($row[1]);
					?></option>
					<?php
					}
					?>
				</select>
				<?php
				 }
				?>
			</p>
			</td>
			<td bordercolor="#003366" align="center" bgcolor="#5A74A0" height="30" bordercolorlight="#003366" bordercolordark="#003366" width="32%">
				<p align="center">
					<img border="0" id="img46" src="LectureRoom_files/button3E.jpg" height="27" width="135" alt="&#1575;&#1587;&#1605; &#1575;&#1604;&#1580;&#1575;&#1605;&#1593;&#1577;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0; fp-orig: 0" fp-title="&#1575;&#1587;&#1605; &#1575;&#1604;&#1580;&#1575;&#1605;&#1593;&#1577;" align="left">
				</p>
			</td>
		</tr>
		</tr>
 		</table>
 			<table border="0" width="55%" id="table5">
				<tr>
					<td bordercolor="#003366" align="right" height="31" bordercolorlight="#003366" bordercolordark="#003366" width="20%">
						<p align="center">
								<input type="submit" value=" &#1575;&#1587;&#1578;&#1593;&#1585;&#1575;&#1590;" name="B2" tabindex="4" style="font-family: Traditional Arabic; font-size: 10pt; font-weight: bold; color: #FFFFFF; background-color: #003366">
						</p>
					</td>

					<td bordercolor="#003366" align="right" height="31" bordercolorlight="#003366" bordercolordark="#003366" width="9%">
			    		<p align="center">
							<input type="radio" value="2" name="R1" <?php echo($t2);?> >
						</p>
					</td>
						
					<td bordercolor="#003366" align="right" height="31" bordercolorlight="#003366" bordercolordark="#003366" width="23%">
			    		<p align="center">
								<img border="0" id="img59" src="LectureRoom_files/button18.jpg" height="20" width="100" alt="&#1575;&#1604;&#1605;&#1593;&#1575;&#1605;&#1604;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1575;&#1604;&#1605;&#1593;&#1575;&#1605;&#1604;">
						</p>
					</td>
					
					<td bordercolor="#003366" align="right" height="31" bordercolorlight="#003366" bordercolordark="#003366" width="6%">
			    		<p align="center">
							<input type="radio" value="1" name="R1" <?php echo($t1);?>>
						</p>
					</td>
					
					<td bordercolor="#003366" align="right" height="31" bordercolorlight="#003366" bordercolordark="#003366" width="37%">
			    		<p align="center">
								<img border="0" id="img58" src="LectureRoom_files/button12.jpg" height="20" width="100" alt="&#1575;&#1604;&#1602;&#1575;&#1593;&#1575;&#1578;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1575;&#1604;&#1602;&#1575;&#1593;&#1575;&#1578;">
						</p>
					</td>
				</tr>
			</table>
			</div>
		</td>
		</tr>
	</table>
	</div>
	</form>
	</div>
<?php
}
//------------------------------------------
//[1] Lecture Room 
function Lecture_Form($value,$uncode,$LectureName,$Capacity,$Loc)
{$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
?>

<div align="center">
<form method="POST" action="IinsertBuilding.php?r=<?php echo($value);?>&uncode=<?php echo($uncode);?>">

	<table border="0" width="57%" id="table10">
	<tr>
		<td>
		<p align="right">
		<select size="1" name="D2" dir="rtl" tabindex="1" style="color: #003366; font-family: Traditional Arabic; font-size: 12pt; font-weight: bold">

		<option  value="" selected>&#1575;&#1582;&#1578;&#1585; &#1605;&#1603;&#1575;&#1606; &#1608;&#1580;&#1608;&#1583; &#1575;&#1604;&#1602;&#1575;&#1593;&#1577;

		</option>
		<?php
		$conn = db_connect();
		$sql_query22="select LocId,UnLoc from UnivLoc where UniversityCode='$uncode'";
		$result22=mysqli_query($mysqli,$sql_query22);
		if (mysqli_num_rows($result22))
		{
			while($row22=mysqli_fetch_row($result22))
			{?>
			<option value="<?php
			echo($row22[1]);
			?>"
			<?php
			if(strcmp($Loc,$row22[1])==0) { ?> selected <?php }
			?> >
			<?php
				echo($row22[1]);
			?>
			</option>
			<?php
			}
			?>
			</select>
		<?php
		}
		?>
		</td>
		<td width="156" bgcolor="#5A74A0">
		<p align="center">
				<img border="0" id="img67" src="Colleges-PAGE/selectLOC.jpg" height="30" width="150" alt="&#1605;&#1608;&#1602;&#1593; &#1575;&#1604;&#1602;&#1575;&#1593;&#1577;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 18; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1605;&#1608;&#1602;&#1593; &#1575;&#1604;&#1602;&#1575;&#1593;&#1577;">
		</td>
		</tr>
		<tr>
		<td>
			<input name="T1" value="<?php echo($LectureName);?>" size="30" style="float: right; color: #003366; font-family: Traditional Arabic; font-size: 12pt; font-weight: bold" tabindex="1" dir="rtl"></td>
			<td width="156" bgcolor="#5A74A0">
			<p align="center">
			<img border="0" id="img55" src="insertLectureRoom_file/button20.jpg" height="30" width="150" alt="&#1575;&#1587;&#1605; &#1575;&#1604;&#1602;&#1575;&#1593;&#1577;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 18; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0; fp-orig: 0" fp-title="&#1575;&#1587;&#1605; &#1575;&#1604;&#1602;&#1575;&#1593;&#1577;" align="right"></td>
		</tr>
		<tr>
			<td>
				<input name="T2" value="<?php echo($Capacity);?>" size="30" style="float: right; color: #003366; font-family: Traditional Arabic; font-size: 12pt; font-weight: bold" tabindex="1" dir="rtl"></td>
			<td width="156" bgcolor="#5A74A0">
				<p align="center">
				<img border="0" id="img56" src="insertLectureRoom_file/button21.jpg" height="30" width="150" alt="&#1575;&#1604;&#1587;&#1593;&#1577; &#1575;&#1604;&#1603;&#1604;&#1610;&#1577; &#1604;&#1604;&#1591;&#1604;&#1575;&#1576;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 18; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0; fp-orig: 0" fp-title="&#1575;&#1604;&#1587;&#1593;&#1577; &#1575;&#1604;&#1603;&#1604;&#1610;&#1577; &#1604;&#1604;&#1591;&#1604;&#1575;&#1576;"></td>
		</tr>
		<tr>
			<td align="center" colspan="2">
				<input type="submit" value="  &#1581;&#1601;&#1592;  " name="B1" tabindex="3" style="color: #FFFFFF; font-size: 14pt; font-family: Traditional Arabic; font-weight: bold; background-color: #5A74A0"></td>
		</tr>
	</table>
	</form>
	</div>
	</td>
	</tr>
	</table>
</div>
<?php
}
//--------------------------------------------------------------------
//[2] Upadte Lecture Room Detail
function Lecture_UpadteForm($value,$uncode,$LectureName,$Capacity,$bid)
{
?>
<div align="center">
	<form method="POST" action="IUBuilding.php?r=<?php echo($value);?>&uncode=<?php echo($uncode);?>&bid=<?php echo($bid);?>">
					<table border="0" width="57%" id="table10">
						<tr>
							<td>
							<input name="T1" value="<?php echo($LectureName);?>" size="30" style="float: right; color: #003366; font-family: Traditional Arabic; font-size: 12pt; font-weight: bold" tabindex="1" dir="rtl"></td>
							<td width="156" bgcolor="#5A74A0">
							<p align="center">
							<img border="0" id="img55" src="insertLectureRoom_file/button20.jpg" height="30" width="150" alt="&#1575;&#1587;&#1605; &#1575;&#1604;&#1602;&#1575;&#1593;&#1577;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 18; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0; fp-orig: 0" fp-title="&#1575;&#1587;&#1605; &#1575;&#1604;&#1602;&#1575;&#1593;&#1577;" align="right"></td>
						</tr>
						<tr>
							<td>
							<input name="T2" value="<?php echo($Capacity);?>" size="30" style="float: right; color: #003366; font-family: Traditional Arabic; font-size: 12pt; font-weight: bold" tabindex="1" dir="rtl"></td>
							<td width="156" bgcolor="#5A74A0">
							<p align="center">
							<img border="0" id="img56" src="insertLectureRoom_file/button21.jpg" height="30" width="150" alt="&#1575;&#1604;&#1587;&#1593;&#1577; &#1575;&#1604;&#1603;&#1604;&#1610;&#1577; &#1604;&#1604;&#1591;&#1604;&#1575;&#1576;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 18; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0; fp-orig: 0" fp-title="&#1575;&#1604;&#1587;&#1593;&#1577; &#1575;&#1604;&#1603;&#1604;&#1610;&#1577; &#1604;&#1604;&#1591;&#1604;&#1575;&#1576;"></td>
						</tr>
						<tr>
							<td align="center" colspan="2">
							<input type="submit" value="  &#1578;&#1593;&#1583;&#1610;&#1604;  " name="B1" tabindex="3" style="color: #FFFFFF; font-size: 14pt; font-family: Traditional Arabic; font-weight: bold; background-color: #5A74A0"></td>
						</tr>
					</table>
				</form>
			</div>
			</td>
		</tr>
	</table>
</div>
<?php
}
//-----------------------------------------------------------------
//[3] Display Lecture Room 
function Display_Lecture($univCode,$r)
{$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
?>
<div align="center">
<table border="0" width="66%" id="table7">
<tr>
   <td colspan="2">
   <div align="center">
   <table border="2" width="83%" bordercolorlight="#003366" bordercolordark="#003366" id="table8" bordercolor="#003366">

	<?php
		$sqll="select distinct(UnLoc) from UnivLoc where UniversityCode='$univCode'";
		$result11 = mysqli_query($mysqli,$sqll);
		if (mysqli_num_rows($result11)>0 )
		{
  			//display
			while($row11=mysqli_fetch_row($result11))
			{
			?>
			<tr>
	 			<td bordercolor="#5A74A0" align="center" bgcolor="#5A74A0" height="31" width="94%" bordercolorlight="#003366" bordercolordark="#003366" colspan="3">
	 			<div align="right">
	 				<font size="4" face="Traditional Arabic" color="#FFFF00"><b>
	 				<?php
							$loc=$row11[0];
	 						echo($row11[0]);
	 				?>
	 				</b></font>
	 			</div>
	 			</td>
			</tr>

			<tr>
			<?php
					$sql2 = "select SubBName,Capacity,SubBId from SubBuildingSeminar where UnLoc='$row11[0]' and UniversityCode='$univCode' and BId='$r'";

					$result2 = mysqli_query($mysqli,$sql2);

					if (mysqli_num_rows($result2)>0 )
					{

      		?>
	 			<td bordercolor="#5A74A0" align="center" bgcolor="#5A74A0" height="31" width="20%" bordercolorlight="#003366" bordercolordark="#003366">
	 			&nbsp;</td>
	 			<td bordercolor="#5A74A0" align="center" bgcolor="#5A74A0" height="31" width="31%" bordercolorlight="#003366" bordercolordark="#003366">
	 					<img border="0" id="img66" src="LectureRoom_files/button9.jpg" height="26" width="130" alt="&#1575;&#1604;&#1587;&#1593;&#1577; &#1575;&#1604;&#1603;&#1604;&#1610;&#1577; &#1604;&#1604;&#1591;&#1604;&#1575;&#1576;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1575;&#1604;&#1587;&#1593;&#1577; &#1575;&#1604;&#1603;&#1604;&#1610;&#1577; &#1604;&#1604;&#1591;&#1604;&#1575;&#1576;"></td>
	 			<td width="43%" bordercolor="#5A74A0" align="center" bgcolor="#5A74A0" height="31" bordercolorlight="#003366" bordercolordark="#003366">
	 				<p align="center" dir="rtl">
	 					<img border="0" id="img51" src="LectureRoom_files/button48.jpg" height="27" width="135" alt="&#1575;&#1587;&#1605; &#1575;&#1604;&#1602;&#1575;&#1593;&#1577;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0; fp-orig: 0" fp-title="&#1575;&#1587;&#1605; &#1575;&#1604;&#1602;&#1575;&#1593;&#1577;"></td>
			</tr>

			<tr>
        	<?php
	   	 			while($row2=mysqli_fetch_row($result2))
	   	 			 {
	   	 	?>
	 			<td bordercolor="#003366" align="center" width="20%" height="35" bgcolor="#5A74A0">
	 			<table border="0" width="91%" id="table11">
				<tr>
					<td>
						<?php $BID=$row2[2];?>
							<a href="updateBuild.php?r=<?php echo($r);?>&univCode=<?php echo($univCode);?>&BID=<?php echo($BID);?>&op=3"><img border="0" src="university_Page/delete.jpg" width="31" height="26" style="color: #003366; background-color: #003366" align="center"></a></td>
					
					<td width="33">
							<?php $BID=$row2[2];?><a href="updateBuild.php?r=<?php echo($r); ?>&univCode=<?php echo($univCode);?>&BID=<?php echo($BID);?>"><img border="0" src="university_Page/update.jpg" alt="&#1578;&#1593;&#1583;&#1610;&#1604;" width="33" height="26" style="color: #003366; background-color: #003366" align="center"></a></td>
				</tr>
				</table>
				</td>

	 			<td bordercolor="#003366" align="center" width="31%" height="35">
	 			<?php echo($row2[1]);?>
	 			</td>

	 			<td width="43%" bordercolor="#003366" align="center" height="35">
	 				<b><font color="#FFFFFF"><span dir="rtl">
						<?php echo($row2[0]);?>
					</span></font></b></td>
	 		</tr>
		<tr>
		<?php
		}//end of while
	    } //end of if
		else
		{
		?>
		<td bordercolor="#003366" align="center" width="87%" height="35" colspan="3" bgcolor="#5A74A0">
	 			<img border="0" id="img53" src="LectureRoom_files/button4A.jpg" height="27" width="135" alt="&#1604;&#1605; &#1610;&#1578;&#1605; &#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1604;&#1602;&#1575;&#1593;&#1575;&#1578;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0; fp-orig: 0" fp-title="&#1604;&#1605; &#1610;&#1578;&#1605; &#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1604;&#1602;&#1575;&#1593;&#1575;&#1578;"></td>
	 	</tr>
		<?php
		}
	    }
	    }
	     else
 		{
		?>
	 		<td bordercolor="#003366" align="center" width="87%" height="35" colspan="3" bgcolor="#5A74A0">
	 				<img border="0" id="img53" src="LectureRoom_files/button4A.jpg" height="27" width="135" alt="&#1604;&#1605; &#1610;&#1578;&#1605; &#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1604;&#1602;&#1575;&#1593;&#1575;&#1578;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0; fp-orig: 0" fp-title="&#1604;&#1605; &#1610;&#1578;&#1605; &#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1604;&#1602;&#1575;&#1593;&#1575;&#1578;"></td>

	 	</tr>
<?php
		}
		?>
 	</table>
	</div>
	</td>
		</tr>
		<tr>
			<td width="19%"><a href="insertBuilding.php?r=<?php echo($r)?>&univCode=<?php echo($univCode);?>">
			<img border="0" id="img54" src="LectureRoom_files/button1A.jpg" height="24" width="121" alt="&#1575;&#1590;&#1575;&#1601;&#1577; &#1602;&#1575;&#1593;&#1577;" fp-style="fp-btn: Braided Row 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-font-color-hover: #FFFFFF; fp-font-color-press: #FFFFFF; fp-bgcolor: #5A74A0" fp-title="&#1575;&#1590;&#1575;&#1601;&#1577; &#1602;&#1575;&#1593;&#1577;" onmouseover="FP_swapImg(1,0,/*id*/'img54',/*url*/'LectureRoom_files/button1B.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img54',/*url*/'LectureRoom_files/button1A.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img54',/*url*/'LectureRoom_files/button1C.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img54',/*url*/'LectureRoom_files/button1B.jpg')"></a></td>
			<td width="80%">&nbsp;</td>

		</tr>
	</table>
</div>
<?php
}
//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//[Lab]:
//[1] Lab Form
function Lab_Form($value,$uncode,$LabName,$Capacity,$Loc)
{$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
?>
<div align="center">
<form method="POST" action="IinsertBuilding.php?r=<?php echo($value);?>&uncode=<?php echo($uncode);?>">

<table border="0" width="57%" id="table10">
			<tr>

				<td>
				<p align="right">
			<select size="1" name="D3" dir="rtl" tabindex="1" style="color: #003366; font-family: Traditional Arabic; font-size: 12pt; font-weight: bold">

			<option selected>&#1575;&#1582;&#1578;&#1585; &#1605;&#1603;&#1575;&#1606; &#1608;&#1580;&#1608;&#1583; &#1575;&#1604;&#1605;&#1593;&#1605;&#1604;

			</option>
			<?php
				$conn = db_connect();
				$sql_query22="select LocId,UnLoc from UnivLoc where UniversityCode='$uncode'";
				$result22=mysqli_query($mysqli,$sql_query22);
				if (mysqli_num_rows($result22))
				{
					while($row22=mysqli_fetch_row($result22))
					{?>
					     <option value="<?php
							echo($row22[1]);
							?>"
						<?php
							if(strcmp($Loc,$row22[0])==0) { ?> selected <?php }
							?> >
							<?php
								echo($row22[1]);
							?>
							</option>
					<?php
						}
					?>
							</select>
				<?php
				} //end of if
				?>
					</td>
				<td width="156" bgcolor="#5A74A0">
				<p align="center">
				<img border="0" id="img68" src="insertLectureRoom_file/labLocation.jpg" height="30" width="150" alt="&#1605;&#1608;&#1602;&#1593; &#1575;&#1604;&#1605;&#1593;&#1605;&#1604;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 18; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1605;&#1608;&#1602;&#1593; &#1575;&#1604;&#1605;&#1593;&#1605;&#1604;"></td>
			</tr>
			<tr>

				<td>
				<input name="T1" value="<?php echo($LabName);?>" size="30" style="float: right; color: #003366; font-family: Traditional Arabic; font-size: 12pt; font-weight: bold" tabindex="1" dir="rtl"></td>
				<td width="156" bgcolor="#5A74A0">
				<p align="center">
				<img border="0" id="img58" src="insertLectureRoom_file/buttonLab.jpg" height="30" width="150" alt="&#1575;&#1587;&#1605; &#1575;&#1604;&#1605;&#1593;&#1605;&#1604;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 18; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1575;&#1587;&#1605; &#1575;&#1604;&#1605;&#1593;&#1605;&#1604;"></td>
			</tr>
			<tr>
				<td>
				<input name="T2" value="<?php echo($Capacity);?>" size="30" style="float: right; color: #003366; font-family: Traditional Arabic; font-size: 12pt; font-weight: bold" tabindex="1" dir="rtl"></td>
				<td width="156" bgcolor="#5A74A0">
				<p align="center">
				<img border="0" id="img56" src="insertLectureRoom_file/button21.jpg" height="30" width="150" alt="&#1575;&#1604;&#1587;&#1593;&#1577; &#1575;&#1604;&#1603;&#1604;&#1610;&#1577; &#1604;&#1604;&#1591;&#1604;&#1575;&#1576;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 18; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0; fp-orig: 0" fp-title="&#1575;&#1604;&#1587;&#1593;&#1577; &#1575;&#1604;&#1603;&#1604;&#1610;&#1577; &#1604;&#1604;&#1591;&#1604;&#1575;&#1576;"></td>
			</tr>
			<tr>
				<td align="center" colspan="2">
				<input type="submit" value="  &#1581;&#1601;&#1592;  " name="B1" tabindex="3" style="color: #FFFFFF; font-size: 14pt; font-family: Traditional Arabic; font-weight: bold; background-color: #5A74A0"></td>
			</tr>
		</table>
	</form>
	</div>
	</td>
	</tr>

	</table>
</div>
<?php
}
//-----------------------------------------------------------
//[2] update Lab detail 
function Lab_UpadteForm($value,$uncode,$LabName,$Capacity,$bid)
{
?>
<div align="center">
	<form method="POST" action="IUBuilding.php?r=<?php echo($value);?>&uncode=<?php echo($uncode);?>&bid=<?php echo($bid);?>">

					<table border="0" width="57%" id="table10">
						<tr>
							<td>
							<input name="T1" value="<?php echo($LabName);?>" size="30" style="float: right; color: #003366; font-family: Traditional Arabic; font-size: 12pt; font-weight: bold" tabindex="1" dir="rtl"></td>
							<td width="156" bgcolor="#5A74A0">
							<p align="center">
							<img border="0" id="img55" src="insertLectureRoom_file/button20.jpg" height="30" width="150" alt="&#1575;&#1587;&#1605; &#1575;&#1604;&#1602;&#1575;&#1593;&#1577;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 18; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0; fp-orig: 0" fp-title="&#1575;&#1587;&#1605; &#1575;&#1604;&#1602;&#1575;&#1593;&#1577;" align="right"></td>
						</tr>
						<tr>
							<td>
							<input name="T2" value="<?php echo($Capacity);?>" size="30" style="float: right; color: #003366; font-family: Traditional Arabic; font-size: 12pt; font-weight: bold" tabindex="1" dir="rtl"></td>
							<td width="156" bgcolor="#5A74A0">
							<p align="center">
							<img border="0" id="img56" src="insertLectureRoom_file/button21.jpg" height="30" width="150" alt="&#1575;&#1604;&#1587;&#1593;&#1577; &#1575;&#1604;&#1603;&#1604;&#1610;&#1577; &#1604;&#1604;&#1591;&#1604;&#1575;&#1576;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 18; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0; fp-orig: 0" fp-title="&#1575;&#1604;&#1587;&#1593;&#1577; &#1575;&#1604;&#1603;&#1604;&#1610;&#1577; &#1604;&#1604;&#1591;&#1604;&#1575;&#1576;"></td>
						</tr>
						<tr>
							<td align="center" colspan="2">
							<input type="submit" value="  &#1578;&#1593;&#1583;&#1610;&#1604;  " name="B1" tabindex="3" style="color: #FFFFFF; font-size: 14pt; font-family: Traditional Arabic; font-weight: bold; background-color: #5A74A0"></td>
						</tr>
					</table>
				</form>
			</div>

<?php
}
//---------------------------------------------------------------------
//[3] Display Labs 
function Display_Lab($univCode,$r)
{$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
?>
<div align="center">
<table border="0" width="66%" id="table7">
<tr>
   <td colspan="2">
   <div align="center">
   <table border="2" width="83%" bordercolorlight="#003366" bordercolordark="#003366" id="table8" bordercolor="#003366">

<?php
$sqll="select distinct(UnLoc) from UnivLoc where UniversityCode='$univCode'";
$result11 = mysqli_query($mysqli,$sqll);
if (mysqli_num_rows($result11)>0 )
{
  //display
while($row11=mysqli_fetch_row($result11))
{
?>
<tr>
	 	<td bordercolor="#5A74A0" align="center" bgcolor="#5A74A0" height="31" width="94%" bordercolorlight="#003366" bordercolordark="#003366" colspan="3">

	 	<div align="right">
	 	<font size="4" face="Traditional Arabic" color="#FFFF00">

	 	<b>
	 	<?php
	 	echo($row11[0]);
	 	?>
	 	</b></font></div>
	 	</td>
	</tr>

	<tr>

<?php
	$sql = "select SubBName,Capacity,SubBId from SubBuildingSeminar where UnLoc='$row11[0]'and UniversityCode='$univCode' and BId=2";

	$result = mysqli_query($mysqli,$sql);

	if (mysqli_num_rows($result)>0 )
	{
      ?>

		 <td bordercolor="#5A74A0" align="center" bgcolor="#5A74A0" height="31" width="20%" bordercolorlight="#003366" bordercolordark="#003366">
		 	&nbsp;</td>
		 <td bordercolor="#5A74A0" align="center" bgcolor="#5A74A0" height="31" width="31%" bordercolorlight="#003366" bordercolordark="#003366">
		 	<img border="0" id="img52" src="LectureRoom_files/button49.jpg" height="27" width="135" alt="&#1575;&#1604;&#1587;&#1593;&#1577; &#1575;&#1604;&#1603;&#1604;&#1610;&#1577; &#1604;&#1604;&#1591;&#1604;&#1575;&#1576;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0; fp-orig: 0" fp-title="&#1575;&#1604;&#1587;&#1593;&#1577; &#1575;&#1604;&#1603;&#1604;&#1610;&#1577; &#1604;&#1604;&#1591;&#1604;&#1575;&#1576;"></td>
				<td width="32%" bordercolor="#5A74A0" align="center" bgcolor="#5A74A0" height="31" bordercolorlight="#003366" bordercolordark="#003366">
				<p align="center" dir="rtl">
				 <img border="0" id="img51" src="LectureRoom_files/buttonLab.jpg" height="27" width="135" alt="&#1575;&#1587;&#1605; &#1575;&#1604;&#1602;&#1575;&#1593;&#1577;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0; fp-orig: 0" fp-title="&#1575;&#1587;&#1605; &#1575;&#1604;&#1602;&#1575;&#1593;&#1577;"></td>

			</tr>

			<tr>
	        <?php
		   	 while($row=mysqli_fetch_row($result))
		   	  {
		    ?>
		 <td bordercolor="#003366" align="center" width="20%" height="35" bgcolor="#5A74A0">
		 	<table border="0" width="91%" id="table11">
				<tr>
					<td>
					<?php $BID=$row[2];?><a href="updateBuild.php?r=<?php echo($r);?>&univCode=<?php echo($univCode);?>&BID=<?php echo($BID);?>&op=3"><img border="0" src="university_Page/delete.jpg" alt="&#1581;&#1584;&#1601;" width="31" height="26" style="color: #003366; background-color: #003366" align="center"></a><a href="Display_Building.php?r=<?php echo($r);?>&univCode=<?php echo($univCode);?>&BID=<?php echo($BID);?>">
					</a></td>
					<td width="33">
					<?php $BID=$row[2];?><a href="updateBuild.php?r=<?php echo($r); ?>&univCode=<?php echo($univCode);?>&BID=<?php echo($BID);?>"><img border="0" src="university_Page/update.jpg" alt="&#1578;&#1593;&#1583;&#1610;&#1604;" width="33" height="26" style="color: #003366; background-color: #003366" align="center">
					</a></td>
				</tr>
			</table>
			</td>

		 <td bordercolor="#003366" align="center" width="31%" height="35">
		 	<?php
		 	echo($row[1]);?>
		 	</td>

		 <td width="43%" bordercolor="#003366" align="center" height="35">
		 	<b><font color="#FFFFFF">
			<?php
			echo($row[0]);
			?>
			</font></td>
		 	</tr>
			<tr>
			<?php
			}//end of while
		    } //end of if
			else
			{
			?>
			<td bordercolor="#003366" align="center" width="95%" height="35" colspan="3" bgcolor="#5A74A0">
			<img border="0" id="img53" src="LectureRoom_files/buttonNOLab.jpg"  height="27" width="135" alt="&#1604;&#1605; &#1610;&#1578;&#1605; &#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1604;&#1602;&#1575;&#1593;&#1575;&#1578;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0; fp-orig: 0" fp-title="&#1604;&#1605; &#1610;&#1578;&#1605; &#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1604;&#1602;&#1575;&#1593;&#1575;&#1578;"></td>

		 	</tr>
			<?php
			}//end of else
		     }//end of while(1)
		     }//end of if(1)
		  else
	 		{
			?>
		 	<td bordercolor="#003366" align="center" width="95%" height="35" colspan="3" bgcolor="#5A74A0">
		 	<img border="0" id="img53" src="LectureRoom_files/buttonNOLab.jpg"  height="27" width="135" alt="&#1604;&#1605; &#1610;&#1578;&#1605; &#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1604;&#1602;&#1575;&#1593;&#1575;&#1578;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0; fp-orig: 0" fp-title="&#1604;&#1605; &#1610;&#1578;&#1605; &#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1604;&#1602;&#1575;&#1593;&#1575;&#1578;">
		 	</td>
			</tr>
		<?php
			}
			?>
	 	</table>
		</div>
			</td>

			</tr>

			<tr>
				<td width="19%"><a href="insertBuilding.php?r=<?php echo($r)?>&univCode=<?php echo($univCode);?>">
				<img border="0" id="img65" src="LectureRoom_files/button56.jpg" height="24" width="121" alt="&#1575;&#1590;&#1575;&#1601;&#1577; &#1605;&#1593;&#1605;&#1604;" onmouseover="FP_swapImg(1,0,/*id*/'img65',/*url*/'LectureRoom_files/button66.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img65',/*url*/'LectureRoom_files/button56.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img65',/*url*/'LectureRoom_files/button76.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img65',/*url*/'LectureRoom_files/button66.jpg')" fp-style="fp-btn: Braided Row 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-font-color-hover: #FFFFFF; fp-font-color-press: #FFFFFF; fp-bgcolor: #5A74A0" fp-title="&#1575;&#1590;&#1575;&#1601;&#1577; &#1605;&#1593;&#1605;&#1604;"></a>
				</td>
				<td width="80%">&nbsp;</td>

			</tr>
		</table>
</div>
<?php
}
//***********************************************
//Admin Reports: 
//New: create on : Saturday 28/2/2009

//[7] Admin Reports includes:

// 1 > Current Hours for specific College [Lectures] and [Labs]
// 2 > Number of Teachers on specific College [Teachers] and [Assistant Teachers]
// 3 > Number of [students] and [Groups] 

//****************************************************

function display_AdminReport_form($year,$SemNo,$univCode,$CollegeCode,$report)
{$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
?>
<body>

<div align="center">

<table border="0" width="73%" id="table1">
<tr>
	<td align="center">
	
		<form method="POST" action="AdminReport.php?#Report1" name="f1">
		
		<div align="center">

		<table class="aaa" border="0" width="60%" id="slottime" dir="rtl" height="165" cellpadding="3">

		<tr>
			<!-- MaxYear-->
			<td width="26%" bordercolorlight="#9999FF" bordercolordark="#6600FF" bgcolor="#5A74A0" dir="ltr" height="30" align="center">
				<b><font size="4" face="Traditional Arabic" color="#FFFFFF">&#1575;&#1604;&#1593;&#1575;&#1605; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609;
				</font></b>
			</td>

			<td width="67%" dir="ltr" height="30" align="right">

				<select size="1" name="MaxYear" style="color: #2F446F; font-family: Times New Roman; font-size: 12pt; font-weight: bold" tabindex="1" dir="rtl">
					<option value="<?php echo($year);?>" selected> <?php echo($year);?></option>				
			</select>
			</td>
		</tr>
	
		<tr>
			<!--university name --> 
			<td width="26%" bordercolorlight="#9999FF" bordercolordark="#6600FF" bgcolor="#5A74A0" dir="ltr" height="30" align="center">
				<b><font size="4" face="Traditional Arabic" color="#FFFFFF">&#1575;&#1587;&#1605; &#1575;&#1604;&#1580;&#1575;&#1605;&#1593;&#1577;
				</font></b>
			</td>

			<td width="67%" dir="ltr" height="30" align="right">
				
					<select size="1" name="UnivCode" style="color: #2F446F; font-family: Traditional Arabic; font-size: 12pt; font-weight: bold" tabindex="3" dir="rtl" onchange="javascript:document.f1.action='AdminReport.php?#Report1';document.f1.submit();">
					
					<option value="" <?php if(strcmp($univCode,"")==0){?> selected <?php }?> selected> 
						--&#1575;&#1582;&#1578;&#1585; &#1575;&#1604;&#1580;&#1575;&#1605;&#1593;&#1577;---
					</option>
					
					<?php
					//select * Universities Registered on the System
					
					$sql = "select UniversityCode,UniversityName from Universities";
					$result = mysqli_query($mysqli,$sql);
					
					while($row = mysqli_fetch_row($result))
					{
					?>
						<option value="<?php echo($row[0]);?>" <?php if($univCode==$row[0]){?> selected <?php }?> > 
							
							<?php echo($row[1]);?>
						
						</option>
					<?php
					
					}//end of while
					
					?>
				</select>
			</td>
		</tr>
		
		<tr>
			<!--College Code-->
			<?php
			
			if($_POST['UnivCode']> 0)
			{
				$sql = "select CollegeCode,CollegeName from Colleges where UniversityCode='$univCode' ";
				$result = mysqli_query($mysqli,$sql);
				
				if( mysqli_num_rows($result)>0 )
				{
			?>
				 	<td width="26%" bordercolorlight="#9999FF" bordercolordark="#6600FF" bgcolor="#5A74A0" dir="ltr" height="33" align="center">
							<b><font size="4" face="Traditional Arabic" color="#FFFFFF">&#1575;&#1604;&#1603;&#1604;&#1610;&#1577;</font></b><font size="4" face="Traditional Arabic" color="#FFFFFF"><b>
						</b></font>
					</td>
					
				 	<td width="67%" dir="ltr" height="15" align="right" rowspan="2">
														
							<select size="4" name="CollegeCode" style="color: #2F446F; font-family: Traditional Arabic; font-size: 12pt; font-weight: bold" tabindex="4" dir="rtl" onchange="javascript:document.f1.action='AdminReport.php?#Report1';document.f1.submit();" >
			
							<option value="0" <?php if($CollegeCode==0) {?> selected <?php }?> >
							-- &#1575;&#1582;&#1578;&#1585; &#1575;&#1604;&#1603;&#1604;&#1610;&#1577;  --
							</option> 
						
						<?php
							while($rowc = mysqli_fetch_row($result))
							{
						?>
					 				<option value="<?php echo($rowc[0]);?>" <?php if($CollegeCode==$rowc[0]){ ?> selected <?php }?> >
									<?php 
										echo($rowc[1]); 
									?>
								</option>				
						<?php
				
							}//end of while
						?>
							
						</select>

					</td>
			<?php
				}//end of if
				
			
			?>
			</tr>
		
			<tr>
				<td width="26%" bordercolorlight="#9999FF" bordercolordark="#6600FF" dir="ltr" height="73" align="center">
					&nbsp;</td>
			</tr>
		
			<?php
			
			if ( $_POST['CollegeCode']> 0) 
			{
				//Display Semster [one] and [two] as a default
			?>
			<!-- Semester-->
			<tr>
				<td width="26%" bordercolorlight="#9999FF" bordercolordark="#6600FF" bgcolor="#5A74A0" dir="ltr" height="30" align="center">
					<b><font size="4" face="Traditional Arabic" color="#FFFFFF">
						&#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609;
					</font></b>
				</td>

				<td width="67%" dir="ltr" height="30" align="right">

						<select size="1" name="SemNo" style="color: #2F446F; font-family: Traditional Arabic; font-size: 12pt; font-weight: bold" tabindex="4" dir="rtl">
					
						<option value="1" <?php if($SemNo==1){?> selected <?php }?> > 
							&#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1575;&#1604;&#1575;&#1608;&#1604;
						</option>
					
						<option value="2" <?php if($SemNo==2){?> selected <?php }?> > 
							&#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1575;&#1604;&#1579;&#1575;&#1606;&#1609;
						</option>
					
						<?php
							//check to display semester 3
							
							if( CheckToDisplaySem($univCode,$CollegeCode) )
							{
							?>
								<option value="3" <?php if($SemNo==3){?> selected <?php }?> > 
											&#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1575;&#1604;&#1579;&#1575;&#1604;&#1579;
								</option>

							<?php
							
							}//end of if
					?>
					</select>
					
			</td>
		</tr>
		<tr>
				<!--Report Type-->
				<td width="26%" bordercolorlight="#9999FF" bordercolordark="#6600FF" bgcolor="#5A74A0" dir="ltr" height="30" align="center">
					<b><font size="4" face="Traditional Arabic" color="#FFFFFF">
						&#1606;&#1608;&#1593; &#1575;&#1604;&#1578;&#1602;&#1585;&#1610;&#1585; 
					</font></b>
				</td>
				
				<td width="67%" dir="ltr" height="30" align="right">

						<select size="1" name="report" style="color: #2F446F; font-family: Traditional Arabic; font-size: 12pt; font-weight: bold" tabindex="4" dir="rtl">
						<!--������ ����� ������ �������-->
						<option value="1" <?php if($report==1){?> selected <?php }?> > 
								&#1575;&#1580;&#1605;&#1575;&#1604;&#1609; &#1587;&#1575;&#1593;&#1575;&#1578; &#1575;&#1604;&#1606;&#1592;&#1585;&#1609; &#1608;&#1575;&#1604;&#1593;&#1605;&#1604;&#1609;
						</option>
						
						<!--����� ������-->
						<option value="2" <?php if($report==2){?> selected <?php }?> > 
						&#1575;&#1593;&#1583;&#1575;&#1583; &#1575;&#1604;&#1591;&#1604;&#1575;&#1576;
						</option>
						
						<!--�����  �������� -->
						<option value="3" <?php if($report==3){?> selected <?php }?> > 
						&#1575;&#1593;&#1583;&#1575;&#1583; &#1575;&#1604;&#1575;&#1587;&#1575;&#1578;&#1584;&#1577;
						</option>


					</select>
				</td>
		</tr>
		<?php

			}//end of post Collcode
		
		}//end of post univcode
		?>
		<tr>
			<td width="60%" bordercolorlight="#9999FF" bordercolordark="#6600FF" height="93" dir="ltr" align="center" colspan="2">
					<input name="BS" type="submit" value="&#1575;&#1587;&#1578;&#1593;&#1585;&#1575;&#1590;"  tabindex="3" style="color: #FFFFFF; font-size: 14pt; font-weight: bold; font-family: Traditional Arabic; vertical-align: middle; letter-spacing: 2; border: 3px inset #B0CCFF; ; background-color:#5A74A0" dir="rtl">
			</td>
		</tr>
</table>
</div>
</form>
</td>
</tr>
</table>
</div>
<?php
}//end of method

//----------------------------------------------------------------------------
//New[May 2009]: Free Cells on Lecture Room
function display_FreeCellReport_form($year,$SemNo,$univCode,$UnivLoc,$LecRoom)
{$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
?>
<body>

<div align="center">

<table border="0" width="75%" id="table1">
<tr>
	<td align="center">
	
		<form method="POST" action="LectureRoom.php#Lec" name="FreeCells">
		
		<div align="center">

		<table class="aaa" border="0" width="60%" id="freecell" dir="rtl" cellpadding="3">

		<tr>
			<!-- MaxYear-->
			<td width="20%" bordercolorlight="#9999FF" bordercolordark="#6600FF" bgcolor="#5A74A0" dir="ltr" align="center">
					<b><font size="4" face="Traditional Arabic" color="#FFFFFF">&#1575;&#1604;&#1593;&#1575;&#1605; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609;
				</font></b>
			</td>

			<td width="40%" dir="ltr" align="right">

					<select size="1" name="MaxYear" style="color: #2F446F; font-family: Times New Roman; font-size: 12pt; font-weight: bold" tabindex="1" dir="rtl">
					<option value="<?php echo($year);?>" selected> <?php echo($year);?></option>				
				</select>
			</td>
		</tr>
	
		<tr>
			<!--university name --> 
			<td width="20%" bordercolorlight="#9999FF" bordercolordark="#6600FF" bgcolor="#5A74A0" dir="ltr" align="center">
					<b><font size="4" face="Traditional Arabic" color="#FFFFFF">&#1575;&#1587;&#1605; &#1575;&#1604;&#1580;&#1575;&#1605;&#1593;&#1577;
				</font></b>
			</td>

			<td width="40%" dir="ltr" align="right">
				
					<select size="1" name="UnivCode" style="color: #2F446F; font-family: Traditional Arabic; font-size: 12pt; font-weight: bold" tabindex="3" dir="rtl" onchange="javascript:document.FreeCells.action='LectureRoom.php#Lec';document.FreeCells.submit();">
					
					<option value="" <?php if(strcmp($univCode,"")==0){?> selected <?php }?> selected> 
						--&#1575;&#1582;&#1578;&#1585; &#1575;&#1604;&#1580;&#1575;&#1605;&#1593;&#1577;---
					</option>
					
					<?php
					//select * Universities Registered on the System
					
					$sql = "select UniversityCode,UniversityName from Universities";
					$result = mysqli_query($mysqli,$sql);
					
					while($row = mysqli_fetch_row($result))
					{
					?>
						<option value="<?php echo($row[0]);?>" <?php if($univCode==$row[0]){?> selected <?php }?> > 
							
							<?php echo($row[1]);?>
						
						</option>
					<?php
					
					}//end of while
					
					?>
				</select>
			</td>
		</tr>
		
		<tr>

			<!--University's Locations-->
			<?php
			
			if($_POST['UnivCode']> 0)
			{
				$sql = "select UnLoc from univloc where UniversityCode='$univCode' ";
				$result = mysqli_query($mysqli,$sql);
				
				if( mysqli_num_rows($result)>0 )
				{
			?>
				 	<td width="20%" bordercolorlight="#9999FF" bordercolordark="#6600FF" bgcolor="#5A74A0" dir="ltr" align="center">
						<font size="4" face="Traditional Arabic" color="#FFFFFF">
							<b>&#1575;&#1604;&#1605;&#1608;&#1602;&#1593;</b>
						</font>
					</td>
					
				 	<td width="40%" dir="ltr" align="right">
														
							<select size="1" name="UnivLoc" style="color: #2F446F; font-family: Traditional Arabic; font-size: 12pt; font-weight: bold" tabindex="3" dir="rtl" onchange="javascript:document.FreeCells.action='LectureRoom.php#Lec';document.FreeCells.submit();" >
			
							<option value="0" <?php if($UnivLoc==0) {?> selected <?php }?> >
							-- &#1575;&#1582;&#1578;&#1585; &#1575;&#1604;&#1605;&#1608;&#1602;&#1593;  --
							</option> 
						
						<?php
							while($rowc = mysqli_fetch_row($result))
							{
						?>
					 				<option value="<?php echo($rowc[0]);?>" <?php if(strcmp($UnivLoc,$rowc[0])==0){ ?> selected <?php }?> >
									<?php 
										echo($rowc[0]); 
									?>
								</option>				
						<?php
				
							}//end of while
						?>
							
						</select>

					</td>
					</tr>
				<?php
					}//end of numrow
							
			
			if ( $_POST['UnivLoc']) 
			{
				//Display Semster [one] and [two] as a default
				
					$sql = "select distinct(SubBId),SubBName from subbuildingseminar where UniversityCode='$univCode' and BId='1' and UnLoc='$_POST[UnivLoc]' order by SubBName";
				$result = mysqli_query($mysqli,$sql);

			?>
			<!-- LectureRooms-->
		
			<tr>
				<td width="20%" bordercolorlight="#9999FF" bordercolordark="#6600FF" bgcolor="#5A74A0" dir="ltr" align="center">
					<b><font size="4" face="Traditional Arabic" color="#FFFFFF">
						&#1575;&#1604;&#1602;&#1575;&#1593;&#1577;
					</font></b>
				</td>
					
				 	<td width="40%" dir="ltr" align="right">
						<select size="1" name="LecRoom" style="color: #2F446F; font-family: Traditional Arabic; font-size: 12pt; font-weight: bold" tabindex="3" dir="rtl" onchange="javascript:document.FreeCells.action='LectureRoom.php#Lec';document.FreeCells.submit();" >
			
							<option value="0" <?php if($LecRoom==0) {?> selected <?php }?> >
							-- &#1575;&#1582;&#1578;&#1585; &#1575;&#1604;&#1602;&#1575;&#1593;&#1577;  --
							</option> 
						
						<?php
							while($rowc = mysqli_fetch_row($result))
							{
						?>
					 				<option value="<?php echo($rowc[0]);?>" <?php if($LecRoom==$rowc[0]){ ?> selected <?php }?> >
									<?php 
										echo($rowc[1]); 
									?>
								</option>				
						<?php
				
							}//end of while
						?>
							
						</select>
									
					</td>
			</tr>
		
			<!-- Semester-->
			<tr>
				<td width="20%" bordercolorlight="#9999FF" bordercolordark="#6600FF" bgcolor="#5A74A0" dir="ltr" align="center">
					<b><font size="4" face="Traditional Arabic" color="#FFFFFF">
						&#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609;
					</font></b>
				</td>

				<td width="40%" dir="ltr" align="right">

						<select size="1" name="SemNo" style="color: #2F446F; font-family: Traditional Arabic; font-size: 12pt; font-weight: bold" tabindex="4" dir="rtl">
					
						<option value="1" <?php if($SemNo==1){?> selected <?php }?> > 
							&#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1575;&#1604;&#1575;&#1608;&#1604;
						</option>
					
						<option value="2" <?php if($SemNo==2){?> selected <?php }?> > 
							&#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1575;&#1604;&#1579;&#1575;&#1606;&#1609;
						</option>
					</select>
					
				</td>
				
			</tr>
			
			<tr>
				<td width="60%" bordercolorlight="#9999FF" bordercolordark="#6600FF" dir="ltr" align="center" colspan="2">
						<input name="BS" type="submit" value="&#1575;&#1587;&#1578;&#1593;&#1585;&#1575;&#1590;"  tabindex="3" style="color: #FFFFFF; font-size: 14pt; font-weight: bold; font-family: Traditional Arabic; vertical-align: middle; letter-spacing: 2; border: 3px inset #B0CCFF; ; background-color:#5A74A0" dir="rtl">
				</td>
			</tr>
			
			<?php
			}//end of Post UnivLoc
		
			}//end of post UnivCode
		  ?>
			</td>
			</tr>
			</table>
	</div>
	</form>
	</td>
	</tr>
</table>
</div>
</body>

<?php
}//end of method
?>