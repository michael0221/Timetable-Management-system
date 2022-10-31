<?php
$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
//$conn = db_connect();
require_once('main.php');

?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<script type="text/javascript">
	function openWin()
	{	
		//Used on the Subject Form	
			var msg="&#1610;&#1587;&#1578;&#1601;&#1575;&#1583; &#1605;&#1606;&#1607;&#1575; &#1601;&#1609; &#1581;&#1575;&#1604;&#1577; &#1578;&#1602;&#1587;&#1610;&#1605; &#1575;&#1604;&#1591;&#1604;&#1575;&#1576; &#1604;&#1605;&#1580;&#1605;&#1608;&#1593;&#1575;&#1578; &#1575;&#1579;&#1606;&#1575;&#1569; &#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578;";
		myWindow=window.open('','TMS','width=400,height=100');
		myWindow.document.write(msg);
	}
</script>

</head>

<?php

//Department Form
function DisplayDept_Form($CollegeCode,$uncode,$DeptName,$AcadProg,$noOfSem,$do,$AcadProgId,$ProgType)
{
?>
<form method="POST" action="DeptResult.php?uncode=<?php echo($uncode);?>&CollegeCode=<?php echo($CollegeCode);?>&do=<?php echo($do);?>&AcadId=<?php echo($AcadProgId);?>">
				<div align="center">

				  <table border="2" width="51%" bordercolorlight="#003366" bordercolordark="#003366" id="table1" bordercolor="#003366" bgcolor="#5A74A0" height="142">
				<?php
				if (($do==1)||($do==2))
				{
				}
				else
				{
				?>
				<tr>
						<td bordercolor="#003366" align="right" bgcolor="#B0CCFF" height="43" colspan="2" bordercolorlight="#003366" bordercolordark="#003366">
					    <img border="0" id="img46" src="Depart_Files/DepartReg.jpg" height="29" width="147"  fp-style="fp-btn: Embossed Capsule 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 20; fp-font-color-normal: #FFFFFF; fp-font-color-hover: #FFFFFF; fp-font-color-press: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #B0CCFF" alt="&#1575;&#1590;&#1575;&#1601;&#1577; &#1602;&#1587;&#1605;" fp-title="&#1575;&#1590;&#1575;&#1601;&#1577; &#1602;&#1587;&#1605;"></td>
				</tr>
	 			<?php
	 			}
	 			?>
	 			<tr>
						<td bordercolor="#5A74A0" align="right" width="71%" bgcolor="#5A74A0" height="31" bordercolorlight="#003366" bordercolordark="#003366">
						<p align="center">
							<input type="text" name="T2" value="<?php echo($DeptName);?>" size="47" style="float: right; font-size:12pt; color:#003366; font-family:Traditional Arabic; font-weight:bold" tabindex="1" dir="rtl"></td>
						<td bordercolor="#5A74A0" align="right" width="26%" bgcolor="#5A74A0" height="31" bordercolorlight="#003366" bordercolordark="#003366">
						<p align="center">
							<img border="0" id="img48" src="InsertDept/button4E.jpg" height="27" width="135"  fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" ></td>
				</tr>
	 			
	 			<tr>
					<td align="center" width="70%" valign="bottom" bordercolorlight="#003366" bordercolordark="#003366" bgcolor="#5A74A0">
						<input  type="text" name="T3" value="<?php echo($AcadProg);?>" size="47" style="float: right; font-size:12pt; color:#003366; font-family:Traditional Arabic; font-weight:bold" tabindex="2" dir="rtl">
					
					</td>

					<td bordercolor="#003366" align="right" width="26%" bgcolor="#5A74A0" bordercolorlight="#003366" bordercolordark="#003366">
					<p align="center">	<b>
						<font color="#FFFFFF" face="Traditional Arabic" size="4">
					&#1575;&#1604;&#1576;&#1585;&#1606;&#1575;&#1605;&#1580; &#1575;&#1604;&#1575;&#1603;&#1575;&#1583;&#1610;&#1605;&#1610;</font></b></td>
				</tr>
	 			
	 			<tr>
					<td align="center" width="70%" valign="bottom" bordercolorlight="#003366" bordercolordark="#003366" bgcolor="#5A74A0">
						<p align="right">
						<!--specify the Type of program
						
							1 ->  BC.s
							2 ->  Master
							3 ->  Deploma
						-->
							<select size="1" name="DProgType" dir="rtl" tabindex="3" style="color: #000066; font-family: Traditional Arabic; font-size: 12pt; font-weight: bold">
								<option value="1" <?php if (($ProgType==1)||($do==0)){?> selected <?php }?> >&#1576;&#1603;&#1575;&#1604;&#1608;&#1585;&#1610;&#1608;&#1587;</option>
								<option value="2" <?php if ($ProgType==2){?> selected <?php }?> >&#1605;&#1575;&#1580;&#1587;&#1578;&#1610;&#1585;</option>
								<option value="3" <?php if ($ProgType==3){?> selected <?php }?> >&#1583;&#1576;&#1604;&#1608;&#1605; &#1593;&#1575;&#1604;&#1609;</option>
								
						</select>
					</td>

					<td bordercolor="#003366" align="right" width="26%" bgcolor="#5A74A0" bordercolorlight="#003366" bordercolordark="#003366">
					<p align="center"><b>
					<font color="#FFFFFF" face="Traditional Arabic" size="4">
					&#1578;&#1589;&#1606;&#1610;&#1601; &#1575;&#1604;&#1576;&#1585;&#1606;&#1575;&#1605;&#1580; &#1575;&#1604;&#1575;&#1603;&#1575;&#1583;&#1610;&#1605;&#1609;</font></b></td>
				</tr>
	 			
	 			<tr>
					<td align="center" width="70%" bordercolorlight="#003366" bordercolordark="#003366" bgcolor="#5A74A0">
							<p align="right">
							<input type="text" name="T4" value="<?php echo($noOfSem);?>" size="10" style="float: right; color:#003366; font-family:Traditional Arabic; font-weight:bold; font-size:12pt" tabindex="4" dir="rtl"><font size="2">
							</font>
							<font face="Traditional Arabic" color="#FFFF00"><b>
						<span dir ="rtl"><font size="2">&#1605;&#1579;&#1604;&#1575;: 8 &#1548; 10 (&#1601;&#1589;&#1608;&#1604; 
							&#1583;&#1585;&#1575;&#1587;&#1610;&#1577;)
							</font>

					</span>
							</b></font>
					</td>

					<td bordercolor="#003366" align="right" width="26%" bgcolor="#5A74A0" bordercolorlight="#003366" bordercolordark="#003366">
						<p align="center"><b>
							<font color="#FFFFFF" face="Traditional Arabic" size="4">
						&#1593;&#1583;&#1583; &#1575;&#1604;&#1601;&#1589;&#1608;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1610;&#1577;
						</font></b>
					</td>
				</tr>
	 				  
	 			<tr>
						<td bordercolor="#003366" align="center" width="92%" valign="bottom" colspan="2" bgcolor="#B0CCFF" bordercolorlight="#003366" bordercolordark="#003366">

						<?php
						if($do==1)
						{
							//do update
						?>					
								<input name="B1" type="submit" value="   &#1578;&#1593;&#1583;&#1610;&#1604;    "  tabindex="6" style="color: #FFFFFF; font-size: 14pt; font-weight: bold; font-family: Traditional Arabic; vertical-align: middle; letter-spacing: 2; border: 3px inset #B0CCFF; ; background-color:#5A74A0" dir="rtl">
						<?php
						}
						else
						if($do==2)
						{
							//do Delete
						?>
						
								<input name="B2" type="submit" value="   &#1581;&#1584;&#1601;    "  tabindex="7" style="color: #FFFFFF; font-size: 14pt; font-weight: bold; font-family: Traditional Arabic; vertical-align: middle; letter-spacing: 2; border: 3px inset #B0CCFF; ; background-color:#5A74A0" dir="rtl">

						<?php
						}
						else
						{
						//save
						?>
								<input name="B3" type="submit" value="   &#1581;&#1601;&#1592;    "  tabindex="5" style="color: #FFFFFF; font-size: 14pt; font-weight: bold; font-family: Traditional Arabic; vertical-align: middle; letter-spacing: 2; border: 3px inset #B0CCFF; ; background-color:#5A74A0" dir="rtl">

						<?php
						}//end of else
						?>
					</td>
				</tr>

				</table>
					</div>

	</form>

<?php
}

// ** Check Methods **
//----------------------------------------------------------------------------------------------------------------------------------------
function Check_Dept($CollegeCode,$uncode,$DeptName,$AcadDeg)
{
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
$sql2 = "select  DeptName from Departments where UniversityCode='$uncode'
		and CollegeCode='$CollegeCode' and DeptName='$DeptName' and AcadDegreeId='$AcadDeg'";
	   	$result2 = mysqli_query($mysqli, $sql2);

	  if (mysqli_num_rows($result2)==1 )
		{

	   	    return false;
	   	 }
	 else
		{

		return true;

		}
}

//check Duplicated Subject insert on Depart
function Check_SubCode($CollegeCode,$uncode,$DeptNo,$AcadDeg,$Sem,$Classno,$SubCode,$year,$SecID)
{
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
	$flag=true;
	$sql="select SubCode from CollegeSubject where
			AcadYNo='$year' and
			UniversityCode='$uncode' and
			CollegeCode='$CollegeCode' and
			DeptNo='$DeptNo' and AcadDegreeId='$AcadDeg' and
			ClassNo='$Classno' and SecID='$SecID' and 
			SemNo='$Sem' and SubCode='$SubCode'";
	$result = mysqli_query($mysqli,$sql);
	if (mysqli_num_rows($result)>0 )
		{

	   	    $flag=false;
	   	 }
 	return $flag;
}
//Check SubName
function Check_SubName($CollegeCode,$uncode,$DeptNo,$AcadDeg,$Sem,$Classno,$SubName,$year,$SecID)
{
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
	$flag=true;
	$sql="select SubName from CollegeSubject where
			AcadYNo='$year' and
			UniversityCode='$uncode' and
			CollegeCode='$CollegeCode' and
			DeptNo='$DeptNo' and AcadDegreeId='$AcadDeg' and
			ClassNo='$Classno' and SecID='$SecID' and 
			SemNo='$Sem' and SubName='$SubName'";
	$result = mysqli_query($mysqli,$sql);
	if (mysqli_num_rows($result)>0 )
		{

	   	    $flag=false;
	   	 }
 	return $flag;
}

//----------------------------------------------------------------------------------------------------------------------------------------

//*************************************************************************

//----------------------------------------------------------------------------------------------------------------------------------------
// Important Methods: RETURN Get METHODS

//[1] return University Name

function GetUniversityName($uncode1)
{
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
	//$conn = db_connect();
	$sqls = "select UniversityName from Universities  where
	UniversityCode='$uncode1'";

	$results = mysqli_query($mysqli, $sqls);
	$rows=mysqli_fetch_row($results);

	$UnivName=$rows[0];

	return $UnivName;

}

//[2] return College Name

function GetCollegeName($uncode1,$CollegeCode1)
{
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
	//$conn = db_connect();
	$sqls = "select CollegeName from Colleges  where
	UniversityCode='$uncode1' and
	CollegeCode='$CollegeCode1'";

	$results = mysqli_query($mysqli, $sqls);
	$rows=mysqli_fetch_row($results);

	$CollName=$rows[0];

	return $CollName;

}

//[3]return DeptName

function GetDeptName($uncode1,$CollegeCode1,$DeptNo)
{
	//Deptartment Header
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
	//$conn = db_connect();
	$sqls = "select DeptName,AcadDegreeId from Departments where UniversityCode='$uncode1' and CollegeCode='$CollegeCode1' and DeptNo='$DeptNo'";
	$results = mysqli_query($mysqli,$sqls);
	$rows=mysqli_fetch_row($results);
	$dept=$rows[0];

	return $dept;

}

//[4] Get AcadProg name

function GetAcadProg($AcadId)
{
	//[0] -> AcadProgName
	//[1] -> NoOfSemester
	//[2] -> AcadProgType
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
	//$conn = db_connect();
	$sqls = "select AcadDegreeName,NoOfSemester,AcadProgType from AcadDegree where AcadDegreeId='$AcadId'";
	$results = mysqli_query($mysqli,$sqls);
	$rows=mysqli_fetch_row($results);
	$AcadProg=$rows;

	return $AcadProg;

}


//[5] Get DeptNo

function GetDeptNo($uncode,$CollegeCode,$AcadId)
{
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
	//$conn = db_connect();
	$sqls = "select DeptNo from Departments where UniversityCode='$uncode' and CollegeCode='$CollegeCode' and AcadDegreeId='$AcadId'";
	$results = mysqli_query($mysqli,$sqls);
	$rows=mysqli_fetch_row($results);
	$DeptNo=$rows[0];

	return $DeptNo;

}

//[6] return Class Name into two Forms 

// (1) with Details [Depart + AcadProg + ClassName]

function GetClassName($uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem)
{
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
	//$conn = db_connect();
	//Get Dept Name
	$sql2 = "select DeptName from Departments where
			UniversityCode='$uncode1' and
			CollegeCode='$CollegeCode1' and
			DeptNo='$DeptNo' and AcadDegreeId='$AcadDeg'";
	$result2 = mysqli_query($mysqli, $sql2);
	$row2=mysqli_fetch_row($result2);
	$dept=$row2[0]."-";

	//Get Acadmic Name
	$sql3 = "select AcadDegreeName from AcadDegree where
	   		 AcadDegreeId='$AcadDeg'";
	$result3 = mysqli_query($mysqli, $sql3);
	$row3=mysqli_fetch_row($result3);

	$AcadProgram=$row3[0];

	//Display ClassName & SemName
	$sql4 = "select ClassName from Semester,ClassYear
	where Semester.ClassNo='$Classno' and
	ClassYear.ClassNo=Semester.ClassNo and
	Semester.SemNo='$Sem'";
	$result4 = mysqli_query($mysqli,$sql4);
	$row4=mysqli_fetch_row($result4);

	$className=$row4[0];

	$msg=$className."&nbsp;".$dept.$AcadProgram;
	return $msg;
}

//(2) Return Classname in [short name] as follow : [Depart + AcadProg + ClassName]
function GetShortClassName($uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem)
{
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
	//$conn = db_connect();
	//Get Dept Name
	$sql2 = "select DeptName from Departments where
			UniversityCode='$uncode1' and
			CollegeCode='$CollegeCode1' and
			DeptNo='$DeptNo' and AcadDegreeId='$AcadDeg'";
	$result2 = mysqli_query($mysqli, $sql2);
	$row2=mysqli_fetch_row($result2);
	$dept=$row2[0];

	//Get Acadmic Name
	$sql3 = "select AcadDegreeName from AcadDegree where
	   		 AcadDegreeId='$AcadDeg'";
	$result3 = mysqli_query($mysqli,$sql3);
	$row3=mysqli_fetch_row($result3);

	$AcadProgram=$row3[0];

	//Display ClassName & SemName
	
	$sql4 = "select ClassName from Semester,ClassYear
	where Semester.ClassNo='$Classno' and
	ClassYear.ClassNo=Semester.ClassNo and
	Semester.SemNo='$Sem'";
	
	$result4 = mysqli_query($mysqli,$sql4);
	$row4=mysqli_fetch_row($result4);

	$className=$row4[0];

	$msg=$className."&nbsp;".$dept; //Here.$AcadProgram;
	return $msg;


}

//[7] Return AcadProgType
function GetAcadProgType($uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$ProgType)
{
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
	//$conn = db_connect();
	//Get Dept Name
	$sql2 = "select DeptName from Departments where
			UniversityCode='$uncode1' and
			CollegeCode='$CollegeCode1' and
			DeptNo='$DeptNo' and AcadDegreeId='$AcadDeg'";
	$result2 = mysqli_query($mysqli, $sql2);
	$row2=mysqli_fetch_row($result2);
	$dept=$row2[0]."-";
	
	
	//Get Acadmic Name
	$sql3 = "select AcadDegreeName from AcadDegree where
	   		 AcadDegreeId='$AcadDeg' and  AcadProgType='$ProgType' ";
	$result3 = mysqli_query($mysqli,$sql3);
	$row3=mysqli_fetch_row($result3);

	$AcadProgram=$row3[0];
	$msg=$dept."&nbsp;".$AcadProgram;
	return $msg;


}


//[8] return SubjectName
function GetSubjectName($CollegeCode1,$uncode1,$DeptNo,$AcadDeg,$Sem,$Classno,$SubCode)
{
	$MaxYear=$_SESSION['year'];
	//echo("year=".$MaxYear);
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
	//$conn = db_connect();
	$sqls="select SubName from CollegeSubject where
			AcadYNo='$MaxYear' and
			UniversityCode='$uncode1' and
			CollegeCode='$CollegeCode1' and
			DeptNo='$DeptNo' and
			AcadDegreeId='$AcadDeg' and
			ClassNo='$Classno' and
			SemNo='$Sem' and
			SubCode='$SubCode'";

	$results = mysqli_query($mysqli,$sqls);

	$rows=mysqli_fetch_row($results);

	$SubName=$rows[0];

 	return $SubName;
}

//[9] return Teacher Name

function GetTeacherName($CollegeCode1,$uncode1,$TeacherNo)
{
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
//	$conn = db_connect();
		
	$sqlt="select TeacherName from Teachers where
			UniversityCode='$uncode1' and
			CollegeCode='$CollegeCode1' and
			TeacherNo ='$TeacherNo'";

	$resultt = mysqli_query($mysqli,$sqlt);

	$rowt=mysqli_fetch_row($resultt);

	$TeacherName=$rowt[0];

 	return $TeacherName;
}

//[10] Get Teacher Qualifications
function GetQualifCode($Qualif)
{
	//--------------------------------------------------
	/*$jobsDegree[1]= '&#1575;&#1587;&#1578;&#1575;&#1584;';
	
	$jobsDegree[2]= '&#1575;&#1587;&#1578;&#1575;&#1584; &#1605;&#1588;&#1575;&#1585;&#1603;';
	
	$jobsDegree[3]= '&#1575;&#1587;&#1578;&#1575;&#1584; &#1605;&#1587;&#1575;&#1593;&#1583;';

	$jobsDegree[4]= '&#1605;&#1581;&#1575;&#1590;&#1585;';
	
	$jobsDegree[5]= '&#1605;&#1587;&#1575;&#1593;&#1583; &#1578;&#1583;&#1585;&#1610;&#1587;';
	
	$jobsDegree[6]= '&#1603;&#1576;&#1610;&#1585; &#1605;&#1583;&#1585;&#1587;&#1610;&#1606;';

	$jobsDegree[7]= '&#1605;&#1583;&#1585;&#1587; &#1571;&#1608;&#1604;';
	
	$jobsDegree[8]= '&#1605;&#1583;&#1585;&#1587;';
	
	$jobsDegree[9]= '&#1605;&#1581;&#1575;&#1590;&#1585; &#1578;&#1603;&#1606;&#1608;&#1604;&#1608;&#1580;&#1609;';

	return $jobsDegree;*/
	
	//----------- Qualifications  Degree -----------
	
	switch($Qualif)
	{
		case 1:{
				 //Austaz
				 $TeacherQualif="&#1575;&#1587;&#1578;&#1575;&#1584;";
				 break;
			   }
		
		case 2:{
				// Co.Austaz
				 $TeacherQualif="&#1575;&#1587;&#1578;&#1575;&#1584; &#1605;&#1588;&#1575;&#1585;&#1603;";
				 break;
			   }
		
		case 3:{
				// Assistant.Austaz
				$TeacherQualif="&#1575;&#1587;&#1578;&#1575;&#1584; &#1605;&#1587;&#1575;&#1593;&#1583;";
				 break;
			   }
		
		case 4:{
				// Lectural
				$TeacherQualif="&#1605;&#1581;&#1575;&#1590;&#1585;";
				 break;
			   }
		
		case 5:{
				// Teaching Assistant
				$TeacherQualif="&#1605;&#1587;&#1575;&#1593;&#1583; &#1578;&#1583;&#1585;&#1610;&#1587;";
				 break;
			   }
		case 6:{
				// Kapeer.Teacher[Modares] 
				$TeacherQualif="&#1603;&#1576;&#1610;&#1585; &#1605;&#1583;&#1585;&#1587;&#1610;&#1606;";
				 break;
			   }
		
		case 7:{
				// First.Teacher[Modares] 
				$TeacherQualif="&#1605;&#1583;&#1585;&#1587; &#1571;&#1608;&#1604;";
				 break;
			   }
			   
		case 8:{
				// Teacher[Modares] 
				$TeacherQualif="&#1605;&#1583;&#1585;&#1587;";
				 break;
			   }
		
		case 9:{
				// Technical Lectural
				$TeacherQualif="&#1605;&#1581;&#1575;&#1590;&#1585; &#1578;&#1603;&#1606;&#1608;&#1604;&#1608;&#1580;&#1609;";
				 break;
			   }

	}//end of switch
	
	return $TeacherQualif;
	//--------------------------------------------------
}

//
function GetTeacherQualification($CollegeCode1,$uncode1,$TeacherNo)
{
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
	//$conn = db_connect();
		
	$sqlt="select Qualif from Teachers where
			UniversityCode='$uncode1' and
			CollegeCode='$CollegeCode1' and
			TeacherNo ='$TeacherNo'";

	$resultt = mysqli_query($mysqli, $sqlt);

	$rowt=mysqli_fetch_row($resultt);

	$TeacherQualif=$rowt[0];
	
	 return $TeacherQualif;

	//----------------------------------------------------------
}

//[11] Get Teacher status
function GetTeacherStatus($CollegeCode1,$uncode1,$TeacherNo)
{
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
	//0 refer to teacher on College
	//1 refer to assisstant from other college
	$conn = db_connect();
		
	$sqlt="select Status from Teachers where
			UniversityCode='$uncode1' and
			CollegeCode='$CollegeCode1' and
			TeacherNo ='$TeacherNo'";

	$resultt = mysqli_query($mysqli,$sqlt);

	$rowt=mysqli_fetch_row($resultt);

	$TeacherStatus=$rowt[0];

 	return $TeacherStatus;
}

//return Building Name

function GetBuildingName($CollegeCode1,$uncode1,$BId,$LectureName)
{	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
	//$conn = db_connect();

	$sqlt="select SubBName from SubBuildingSeminar where
	BId='$BId' and
	SubBId='$LectureName' and
	UniversityCode='$uncode1'";

	$resultt = mysqli_query($mysqli,$sqlt);

	$rowt=mysqli_fetch_row($resultt);

	$BName=$rowt[0];

 	return $BName;
}

function GetNoOFStudent($CollegeCode1,$uncode1,$DeptNo,$AcadDeg,$Sem,$Classno,$MaxYear,$SecID)
{
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
	//$conn = db_connect();
	if(strcmp($MaxYear,"")==0)
	{
		$MaxYear=$_SESSION['year'];
	}
	// Display Number of student on this Semester
	$sql_query31="select NoOfStud from StudyPerSem where
					AcadYNo='$MaxYear' and
					UniversityCode='$uncode1' and
					CollegeCode='$CollegeCode1' and
					DeptNo='$DeptNo' and
					AcadDegreeId='$AcadDeg'and
					SemNo='$Sem' and
					ClassNo='$Classno' and SecID='$SecID'";
	$result31=mysqli_query($mysqli,$sql_query31);
	$row31=mysqli_fetch_row($result31);
	$NoStud=$row31[0];

	if($NoStud > 0)
		return $NoStud;
	else
		return 0;

}

function GetNoOFGroups($CollegeCode1,$uncode1,$DeptNo,$AcadDeg,$Sem,$Classno,$MaxYear,$SecID)
{
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
	//$conn = db_connect();
	//$MaxYear=$_SESSION['year'];
	$MaxYear=GetMaxYear();
	
    // Display Number of student on this Semester
	
	$sql_query31="select NoOfGroup from StudyPerSem where
					AcadYNo='$MaxYear' and
					UniversityCode='$uncode1' and
					CollegeCode='$CollegeCode1' and
					DeptNo='$DeptNo' and
					AcadDegreeId='$AcadDeg'and
					SemNo='$Sem' and
					ClassNo='$Classno' and SecID='$SecID'";
	
	
	$result31=mysqli_query($mysqli,$sql_query31);
	$row31=mysqli_fetch_row($result31);
	$NoGroup=$row31[0];
	
	if($NoGroup > 0)
		return $NoGroup;
	else
		return 0;
}

//Get Group Name

function GetGroup($CollegeCode1,$uncode1,$DeptNo,$AcadDeg,$Sem,$Classno,$MaxYear,$GId,$SecID)
{
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
	//$conn = db_connect();
	$sql_query31="select GName from GroupPerSem where
					AcadYNo='$MaxYear' and
					UniversityCode='$uncode1' and
					CollegeCode='$CollegeCode1' and
					DeptNo='$DeptNo' and
					AcadDegreeId='$AcadDeg'and
					SemNo='$Sem' and
					ClassNo='$Classno' and SecID='$SecID' and
					GId='$GId'";
	$result31=mysqli_query($mysqli,$sql_query31);
	$row31=mysqli_fetch_row($result31);
	$GroupName=$row31[0];
	return $GroupName;
}

function GetMaxYear()
{
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
	// $conn = db_connect();
 	$sql_query6="select max(AcadYNo) from AcadYear";
	$result6=mysqli_query($mysqli, $sql_query6);
	$row6=mysqli_fetch_row($result6);
	$MaxYear=$row6[0];
	return $MaxYear;
}

//Modified on 08/11/2008
//used on Add  Depart Sections's Form

//[1]Get AcadProgId base on Depart

function GetAcadDegreeId($uncode,$CollegeCode,$DeptNo)
{
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
	//$conn = db_connect();
	$results = mysqli_query($mysqli, "select AcadDegreeId from Departments where 
								UniversityCode='$uncode' and 
								CollegeCode='$CollegeCode' and 
								DeptNo='$DeptNo'");
	$rows=mysqli_fetch_row($results);
	
	$AcadProgId=$rows[0];

	return $AcadProgId;
}

//[2]Get Number of Semester on AcadProgId

function GetNumberOfClasses($AcadProgId)
{
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
	//$conn = db_connect();

	$results = mysqli_query($mysqli, "select NoOfSemester from AcadDegree where AcadDegreeId='$AcadProgId'");

	$rows=mysqli_fetch_row($results);

	$NumberOfClasses=round($rows[0]/2);
	
	return $NumberOfClasses;

}

//[3] Check if there any Sections of Depart

function CheckDeptSection($uncode,$CollegeCode,$DeptNo,$AcadProgId,$ClassNo)
{
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
	//$conn = db_connect();
	
	$result=mysqli_query($mysqli, "select SecID from DeptSection where 
    		 	UniversityCode='$uncode' and CollegeCode='$CollegeCode' and 
    		 	DeptNo='$DeptNo' and AcadDegreeId='$AcadProgId' and ClassNo='$ClassNo' ");
    		 	
    
    if(mysqli_num_rows($result)==0)
    	return false;
    else
    	return true;

}


//Get DepartSection

function GetSectionName($uncode,$CollegeCode,$DeptNo,$AcadProgId,$ClassNo,$SecID)
{$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
	//$conn = db_connect();
	
	$result=mysqli_query($mysqli,"select SecName from DeptSection where 
    		 	UniversityCode='$uncode' and CollegeCode='$CollegeCode' and 
    		 	DeptNo='$DeptNo' and AcadDegreeId='$AcadProgId' and ClassNo='$ClassNo' and SecID='$SecID'");
    		 	
    
    $row=mysqli_fetch_row($result);
    	return $row[0];
}

//-------------------------------------------
//Get College Time Slot per Semester
//modified on 11/11/2008
function GetCollegeTimeSlot($uncode1,$CollegeCode1,$Sem,$year)
{
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
	//$conn = db_connect();
	$sql_query6="select TSID from collegestarttime where 
				AcadYNo='$year' and 
				CollegeCode='$CollegeCode1' and
				UniversityCode='$uncode1' and 
				SemNo='$Sem'";
	$result6=mysqli_query($mysqli,$sql_query6);
	
	if(mysqli_num_rows($result6)>0)
	{
		$trow=mysqli_fetch_row($result6);
		
		//get Time Slots
		$res6=mysqli_query($mysqli, "select * from TimeSlots where TSID='$trow[0]'");
		$slot=mysqli_fetch_row($res6);

		//----- prepare Time Slots --------
		
		$Timeslot[0]=$slot[1].'-'.$slot[2];
		$Timeslot[1]=$slot[2].'-'.$slot[3];
		$Timeslot[2]=$slot[3].'-'.$slot[4];
		$Timeslot[3]=$slot[4].'-'.$slot[5];
		$Timeslot[4]=$slot[5].'-'.$slot[6];
		$Timeslot[5]=$slot[6].'-'.$slot[7];
		$Timeslot[6]=$slot[7].'-'.$slot[8];
		$Timeslot[7]=$slot[8].'-'.$slot[9];
		$Timeslot[8]=$slot[9].'-'.$slot[10];
		$Timeslot[9]=$slot[10].'-'.$slot[11];
		$Timeslot[10]=$slot[11].'-'.$slot[12];
		$Timeslot[11]=$slot[12].'-'.$slot[13];
		$Timeslot[12]=$slot[13].'-'.$slot[14];
		$Timeslot[13]=$slot[14].'-'.$slot[15];
		$Timeslot[14]=$slot[15].'-'.$slot[16];
		$Timeslot[15]=$slot[16].'-'.$slot[17];
		$Timeslot[16]=$slot[17].'-'.$slot[18];
		$Timeslot[17]=$slot[18].'-'.$slot[19];
		$Timeslot[18]=$slot[19].'-'.$slot[20];
		$Timeslot[19]=$slot[20].'-'.$slot[21];
		$Timeslot[20]=$slot[21].'-'.$slot[22];
		$Timeslot[21]=$slot[22].'-'.$slot[23];
		$Timeslot[22]=$slot[23].'-'.$slot[24];
		$Timeslot[23]=$slot[24].'-'.$slot[25];
		//$Timeslot[24]=$slot[25].'-'.$slot[26];

		
		//-----------------------------------
	
		return $Timeslot;
	}
	else
	{
		return "";
	}

}//

//[2] Display SlotTime table's Header to (&frac12;)

function HeaderTimeSlot($uncode1,$CollegeCode1,$Sem,$year)
{
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
	//$conn = db_connect();
	$sql_query6="select TSID from collegestarttime where 
				AcadYNo='$year' and 
				CollegeCode='$CollegeCode1' and
				UniversityCode='$uncode1' and 
				SemNo='$Sem'";
	$result6=mysqli_query($mysqli,$sql_query6);
	
	if(mysqli_num_rows($result6)>0)
	{
		$trow=mysqli_fetch_row($result6);
		
		//get Time Slots
		$res6=mysqli_query($mysqli,"select * from TimeSlots where TSID='$trow[0]' ");
		$slot=mysqli_fetch_row($res6);
		
		
		//--- prepare Header Time Slots ---
		$i=1;
		$j=0;
		
		while($i<=24)  //before:12
		{
				$btslot=$slot[$i];
				$beslot=$slot[++$i];
				
					
				$tslot=intval($btslot);
				$eslot=intval($beslot);
				
				if ( preg_match(":30",$btslot) || preg_match(":30",$beslot) )
				{
					if ( preg_match(":30",$btslot))
						$tslot="&frac12;".$tslot;
					
					if ( preg_match(":30",$beslot))
						$eslot="&frac12;".$eslot;
		
					$Headerslot[$j]= $tslot." - ".$eslot;
				}
				
				else
				{
					$Headerslot[$j]= $tslot." - ".$eslot;
				}
				$j++;
				
		}
		
		if($i > 0)
	 	{
			return $Headerslot;
	 	}
		else
		{
			return "";
		}

	 }//end of if
	else
	{
		return "";
	}
		
}//end of method


//Used to Display Header on SubForm

function HeaderSubForm($uncode1,$CollegeCode1,$Sem,$year)
{
	
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
	//$conn = db_connect();
	$sql_query6="select TSID from collegestarttime where 
				AcadYNo='$year' and 
				CollegeCode='$CollegeCode1' and
				UniversityCode='$uncode1' and 
				SemNo='$Sem'";
	$result6=mysqli_query($mysqli,$sql_query6);
	
	if(mysqli_num_rows($result6)>0)
	{
		$trow=mysqli_fetch_row($result6);
		
		//get Time Slots
		$res6=mysqli_query($mysqli,"select * from TimeSlots where TSID='$trow[0]' ");
		$slot=mysqli_fetch_row($res6);
		
		
		//--- prepare Header Time Slots ---
		$i=1;
		$j=0;
		
		while($i<=24)  
		{
				$btslot=$slot[$i];
				$beslot=$slot[++$i];
									
				$tslot=intval($btslot);
				$eslot=intval($beslot);
				
				if ( preg_match(":30",$btslot) || preg_match(":30",$beslot) )
				{
					if ( preg_match(":30",$btslot))
						$tslot="&frac12;".$tslot;
					
					if ( preg_match(":30",$beslot))
						$eslot="&frac12;".$eslot;
		
					$Headerslot[$j]= $tslot."</br>"." | "."</br>".$eslot;
				}
				
				else
				{
					$Headerslot[$j]= $tslot."</br>"." | "."</br>".$eslot;
				}
				
				$j++;
				
		}
		
		if($i > 0)
	 	{
			return $Headerslot;
	 	}
		else
		{
			return "";
		}

	 }//end of if
	else
	{
		return "";
	}
		
}//end of method
 

//[3] VERY IMPORTANT : Merge Table according to the Repetition of SubCode

function PrepareReport($year,$mday,$uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem,$SecID)
{
	//This Method used to Merege Tabel's cells
	//Created on : 14-December-2008
	//Time 		 : 05:24PM
		
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
	//$conn = db_connect();
	$details="&nbsp;";  //set default value
	
	$i=0;
	$j=0;
	
	//[1] Get Time Slot
	
	$TimeSlot=GetCollegeTimeSlot($uncode1,$CollegeCode1,$Sem,$year);
	
	//[2] get Lectures details
	
	while($i<=23) //before:11
	{
		$detail[$j]=FinalReports($year,$mday,$TimeSlot[$i],$uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem,$SecID);
		//echo("</br>".$detail[$j]);
		$j++;
		$i++;

  	}//end while
  	
  	
  	//[3] Prepaere to Merege by Compare Details
  
  	$i=0;
  	$counter=1; //set default values of counter
  	
  	while($i<=23)
	{
		if(strcmp($detail[$i],"&nbsp;")!=0)
		{
			
			if( strcmp($detail[$i],$detail[++$i])==0)
			{
				//get Number of repeatitions
				$counter++;
			}
			else
			{
				//return to previous cell
				
				$ibefore=$i-1;
				
				?>
					<td bordercolor="#003366" align="center" width="4%" bordercolorlight="#000000" bordercolordark="#000000" dir="rtl" colspan="<?php echo($counter);?>">
					
						<font size="3" face="Traditional Arabic">
							<b> <?php echo($detail[$ibefore]);?> </b> 
						</font>
					
				</td>
	
				<?php
				$counter=1; //set default values of counter
				$ibefore=0;
			}//end of else
			
		}//end of if 
		else
		{
			//if there is no lecture
			echo('<td bordercolor="#003366" align="center" width="4%" bordercolorlight="#000000" bordercolordark="#000000" dir="rtl">&nbsp;</td>');
			$counter=1; //set default values of counter
			$ibefore=0;
			$i++;
		}
		
	}//end of while
	 
}//end of method

//--------------------------------------------------------------------
//This Method use to Insert lecture on another Departs 
//--------------------------------------------------------------------
function InsertOnOtherDepart($numbox,$otherDept,$year,$mday,$Timeslot,$op,$LecNo,$uncode1,$CollegeCode1,$Sem,$Classno,$SecID,$msub,$GId,$mteach,$AcadDeg,$DeptNo)
{
	
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
	if($SecID==0)
	{
		//insert same lecture on many Departs
		for($j=0;$j<$numbox;$j++)
		{
			if($otherDept[$j]!==-1)
			{
				$OthDept=$otherDept[$j];
				
				//Get other Departs
				$OthAcadDeg=GetAcadDegreeId($uncode1,$CollegeCode1,$OthDept);
				
							
							
				//Valid data inserted..
					$ssql = "insert into ManagingLec (AcadYNo,MDays,MTimes,BId,SubBId,UniversityCode,CollegeCode,DeptNo,AcadDegreeId,SemNo,ClassNo,SecID,SubCode,SubType,GId,TeacherId) values
						('$year','$mday','$Timeslot','$op','$LecNo','$uncode1','$CollegeCode1','$OthDept','$OthAcadDeg','$Sem','$Classno','$SecID','$msub','$op','$GId','$mteach')";
				$results = mysqli_query($mysqli, $ssql);
							
				if ($results)
		  		{
					//echo("Sucess");
				
				}
			}//end of otherdept
		}//end of for
	}
	else
	if($SecID>0)
	{
		//insert same lecture on other Section
		for($j=0;$j<$numbox;$j++)
		{
			if($otherDept[$j]!==-1)
			{
				$OthSec=$otherDept[$j];
				//echo("othersec=".$OthSec);
				
										
				//Valid data inserted..
					$ssql = "insert into ManagingLec (AcadYNo,MDays,MTimes,BId,SubBId,UniversityCode,CollegeCode,DeptNo,AcadDegreeId,SemNo,ClassNo,SecID,SubCode,SubType,GId,TeacherId) values
						('$year','$mday','$Timeslot','$op','$LecNo','$uncode1','$CollegeCode1','$DeptNo','$AcadDeg','$Sem','$Classno','$OthSec','$msub','$op','$GId','$mteach')";
				$results = mysqli_query($mysqli,$ssql);
							
				if ($results)
		  		{
					//echo("Sucess");
				
				}
			}//end of otherdept
		}//end of for

	}//end of if
}//end of fuction
//-------------------------------------------------------------------

//****************************************************************************
//this method use on FinalDetail Method:
// return SubjectName
function GetSubjecttName($CollegeCode1,$uncode1,$DeptNo,$AcadDeg,$Sem,$Classno,$SubCode,$year,$SecID)
{
	
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
//	$conn = db_connect();
	$sqls="select SubName from CollegeSubject where
			AcadYNo='$year' and
			UniversityCode='$uncode1' and
			CollegeCode='$CollegeCode1' and
			DeptNo='$DeptNo' and
			AcadDegreeId='$AcadDeg' and
			ClassNo='$Classno'  and SecID='$SecID' and
			SemNo='$Sem' and
			SubCode='$SubCode'";

	$results = mysqli_query($mysqli,$sqls);

	$rows=mysqli_fetch_row($results);

	$SubName=$rows[0];

 	return $SubName;
}

//******************************************************************************
//

function Subject_Form($uncode1,$CollegeCode1,$AcadDeg,$DeptNo,$Classno,$Sem,$f,$SubCode,$SubName,$SubHour,$SubTHour,$stype,$SecID)
{
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
	//stype:refer to SubLabHour
	//Get Dept Name
	$sql2 = "select DeptName from Departments where
			UniversityCode='$uncode1' and
			CollegeCode='$CollegeCode1' and
			DeptNo='$DeptNo' and AcadDegreeId='$AcadDeg'";
	$result2 = mysqli_query($mysqli,$sql2);
	$row2=mysqli_fetch_row($result2);

	//Get Acadmic Name
	$sql3 = "select AcadDegreeName from AcadDegree where
	   	AcadDegreeId='$AcadDeg'";
	$result3 = mysqli_query($mysqli,$sql3);
	$row3=mysqli_fetch_row($result3);

	//Display ClassName & SemName
	$sql4 = "select ClassName,SemName from Semester,ClassYear
	where Semester.ClassNo='$Classno' and
	ClassYear.ClassNo=Semester.ClassNo and
	Semester.SemNo='$Sem'";
	$result4 = mysqli_query($mysqli,$sql4);
	$row4=mysqli_fetch_row($result4);
	
	//echo("sec=".$SecID);

?>
<div align="center">

<table border="0" width="96%" id="table3">
<tr>
<td align="center">

<iframe name="I1" width="60%" height="299" src="DisplaySubject.php?AcadDeg=<?php echo($AcadDeg);?>&Class=<?php echo($Classno);?>&Sem=<?php echo($Sem);?>&uncode=<?php echo($uncode1);?>&CollegeCode=<?php echo($CollegeCode1);?>&Dept=<?php echo($DeptNo);?>&SecID=<?php echo($SecID);?>" scrolling="auto">
Your browser does not support inline frames or is currently configured not to display inline frames.
</iframe></td>
<td align="center" width="435">

<form  name="fr"  method="POST"  action="SSubject.php?AcadDeg=<?php echo($AcadDeg);?>&Class=<?php echo($Classno);?>&Sem=<?php echo($Sem);?>&uncode=<?php echo($uncode1);?>&CollegeCode=<?php echo($CollegeCode1);?>&Dept=<?php echo($DeptNo);?>&SecID=<?php echo($SecID);?>&f=<?php echo($f);?>&value=1" >
<div align="center">

	<table class="aaa" border="2" width="85%" id="table4" dir="rtl" height="373" bordercolorlight="#2F446F" bordercolordark="#2F446F">

		<tr>
		<td width="84%" bordercolorlight="#2F446F" bordercolordark="#2F446F" bgcolor="#5A74A0" dir="ltr" height="28" style="font-family: Traditional Arabic; font-size: 14pt; color: #FFFFFF; font-weight: bold" colspan="3" align="right">
		<font color="#FFFF00" size="5">&#1578;&#1587;&#1580;&#1610;&#1604; &#1580;&#1583;&#1610;&#1583; &#1604;&#1604;&#1605;&#1608;&#1575;&#1583;</font></td>

		</tr>

		<tr>
		<td width="44%" bordercolorlight="#2F446F" bordercolordark="#2F446F" bgcolor="#5A74A0" dir="ltr" height="28" style="font-family: Traditional Arabic; font-size: 14pt; color: #FFFFFF; font-weight: bold">
		<p align="center">
		<img border="0" id="img7" src="Colleges-PAGE/DEptName4.jpg" height="22" width="110" alt="&#1575;&#1587;&#1605; &#1575;&#1604;&#1602;&#1587;&#1605;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1575;&#1587;&#1605; &#1575;&#1604;&#1602;&#1587;&#1605;"></td>

		<td width="40%" dir="ltr" height="28" colspan="2" bordercolorlight="#2F446F" bordercolordark="#2F446F">

		<p align="right"><font face="Traditional Arabic" color="#FFFFFF"><b><span lang="en-us">
		<?php
		//DeptName
		echo($row2[0]);
		?>
		</span></b></font></td>
		</tr>

		<tr>
		<td width="44%" bordercolorlight="#2F446F" bordercolordark="#2F446F" bgcolor="#5A74A0" dir="ltr" height="28" style="font-family: Traditional Arabic; font-size: 14pt; color: #FFFFFF; font-weight: bold">
		<p align="center">
		<img border="0" id="img50" src="Depart_Files/ACDYEARS.jpg" height="22" width="110" alt="&#1575;&#1604;&#1587;&#1606;&#1577; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1610;&#1577;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1575;&#1604;&#1587;&#1606;&#1577; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1610;&#1577;"></td>

		<td width="40%" dir="ltr" height="28" colspan="2" bordercolorlight="#2F446F" bordercolordark="#2F446F">

		<p align="right"><font face="Traditional Arabic" color="#FFFFFF"><b>
		<span lang="en-us">
		<?php
		//Class Year
		echo($row4[0]);
		?>
		</span></b></font></td>
		</tr>

		<tr>
		<td width="44%" bordercolorlight="#2F446F" bordercolordark="#2F446F" bgcolor="#5A74A0" dir="ltr" height="30" style="font-family: Traditional Arabic; font-size: 14pt; color: #FFFFFF; font-weight: bold">
		<p align="center">&nbsp;<img border="0" id="img8" src="Colleges-PAGE/Acadmic.jpg" height="22" width="110" alt="&#1575;&#1604;&#1576;&#1585;&#1606;&#1575;&#1605;&#1580; &#1575;&#1604;&#1575;&#1603;&#1575;&#1583;&#1610;&#1605;&#1609;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1575;&#1604;&#1576;&#1585;&#1606;&#1575;&#1605;&#1580; &#1575;&#1604;&#1575;&#1603;&#1575;&#1583;&#1610;&#1605;&#1609;">
		</td>

		<p align="right">
		<td width="40%" dir="ltr" height="30" colspan="2" bordercolorlight="#2F446F" bordercolordark="#2F446F">

		<p align="right">

		<font face="Traditional Arabic" color="#FFFFFF"><b><span lang="en-us">
		<?php
		//Acadmic Program Name
			echo($row3[0]);
		?>
		</span></b></font></td>
		</tr>

		<tr>
		<td width="92%" bordercolorlight="#2F446F" bordercolordark="#2F446F" bgcolor="#B0CCFF" dir="ltr" height="30" style="font-family: Traditional Arabic; font-size: 14pt; color: #FFFFFF; font-weight: bold" colspan="3">
		<p align="right">
		<?php
			//SemesterName
			$head="&#1605;&#1608;&#1575;&#1583;"."&nbsp;";
			echo($head.$row4[1]);
		?>
		</td>

		</tr>

		<?php
		//check if (ClassNo=Final year) based on AcadProg
		//$AcadDeg,$DeptNo,$Classno
		
		$NumClasses=GetNumberOfClasses($AcadDeg);
		
		if($NumClasses==$Classno)
		{
			//check if there any section on depart
			//$uncode1,$CollegeCode1,$AcadDeg,$DeptNo,$Classno,
			if(CheckDeptSection($uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno))
			{
				//display
				//$SecID=$_POST['D1'];				
		?>
		<tr>
		<td width="44%" bordercolorlight="#2F446F" bordercolordark="#2F446F" bgcolor="#5A74A0" height="34" dir="ltr">
		<p align="center">
			<img border="0" id="img77" src="Colleges-PAGE/DeptSeciont.jpg" height="22" width="110"  fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" >
		</td>

		<td width="40%" height="34" dir="ltr" colspan="2" bordercolorlight="#2F446F" bordercolordark="#2F446F">
		<p align="right">
				<select size="1" name="D1" dir="rtl" style="font-family: Traditional Arabic; font-size: 12pt; color: #003366; font-weight: bold" onchange="javascript:document.fr.action='subject.php?AcadDeg=<?php echo($AcadDeg);?>&Class=<?php echo($Classno);?>&Sem=<?php echo($Sem);?>&uncode=<?php echo($uncode1);?>&CollegeCode=<?php echo($CollegeCode1);?>&Dept=<?php echo($DeptNo);?>&value=1';javascript:document.fr.submit();">
				<option value="" <?php if( strcmp($SecID,"")==0 ){ ?>selected <?php }?>>
				&#1601;&#1590;&#1604;&#1575; &#1602;&#1605; &#1576;&#1578;&#1581;&#1583;&#1610;&#1583; &#1575;&#1604;&#1578;&#1582;&#1589;&#1589;</option>
				<!-- $DeptSection-->
						<?php
						
							//Display all Sections
							
							//$SecID=$_POST['D1'];
							$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
//							$conn = db_connect();
							
							$result=mysqli_query($mysqli,"select SecID,SecName from DeptSection where 
    		 									UniversityCode='$uncode1' and CollegeCode='$CollegeCode1' and 
    		 									DeptNo='$DeptNo' and AcadDegreeId='$AcadDeg' and ClassNo='$Classno'");
								
							if(mysqli_num_rows($result)>0)
							{
								
								while($row=mysqli_fetch_row($result))
								{
						?>
								<option <?php if( strcmp($SecID,$row[0])==0 ){?> selected <?php }?> value="<?php echo($row[0]);?>">
								<?php 
									//depart name
									echo($row[1]);
									$ch++;
								?>
								</option>
						<?php
								}//end of while
							}//end of if
						?>
						</select>
		

		</p>
	
		</td>

		</tr>
		<?php
			}
		}//end of if
		?>
		
		<tr>
		<td width="44%" bordercolorlight="#2F446F" bordercolordark="#2F446F" bgcolor="#5A74A0" height="34" dir="ltr">
		<p align="center">
		<img border="0" id="img9" src="Colleges-PAGE/subjCode.jpg" height="22" width="110" alt="&#1603;&#1608;&#1583; &#1575;&#1604;&#1605;&#1575;&#1583;&#1577;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1603;&#1608;&#1583; &#1575;&#1604;&#1605;&#1575;&#1583;&#1577;"></td>

		<p align="right">

		<td width="40%" height="34" dir="ltr" colspan="2" bordercolorlight="#2F446F" bordercolordark="#2F446F">

		<p align="right">

		&nbsp;
		<!--webbot bot="Validation" s-data-type="String" b-allow-letters="TRUE" b-value-required="TRUE" i-minimum-length="5" i-maximum-length="6" --><input type="text" name="T3" value="<?php echo($SubCode);?>" size="19" dir="rtl" tabindex="1" style="color: #2F446F; font-size: 12pt; font-weight: bold; font-family:Traditional Arabic; text-transform:uppercase" maxlength="6">
		</td>

		</tr>

	<tr>
	<td width="44%" bordercolorlight="#2F446F" bordercolordark="#2F446F" height="34" dir="ltr" bgcolor="#5A74A0">
	<p align="center">
	<img border="0" id="img10" src="Colleges-PAGE/SubjName.jpg" height="22" width="110" alt="&#1575;&#1587;&#1605; &#1575;&#1604;&#1605;&#1575;&#1583;&#1577;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1575;&#1587;&#1605; &#1575;&#1604;&#1605;&#1575;&#1583;&#1577;"></td>

	<td width="40%" bordercolorlight="#2F446F" bordercolordark="#2F446F" height="34" dir="ltr" colspan="2">
		<p align="right">
		<input name="T4" value="<?php echo($SubName);?>" size="27" dir="rtl" tabindex="2" style="color: #2F446F; font-size: 12pt; font-weight: bold; font-family:Traditional Arabic; "></td>
	</tr>

	<tr>
	<td width="44%" bordercolorlight="#2F446F" bordercolordark="#2F446F" height="32" dir="ltr" bgcolor="#5A74A0">
	<p align="center">
	<img border="0" id="img11" src="Colleges-PAGE/SubHours.jpg" height="22" width="110" alt="&#1587;&#1575;&#1593;&#1575;&#1578; &#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1577;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1587;&#1575;&#1593;&#1575;&#1578; &#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1577;"></td>
	<td width="40%" bordercolorlight="#2F446F" bordercolordark="#2F446F" height="32" dir="ltr" colspan="2">

		<p align="right">

		<input name="T5" value="<?php echo($SubHour);?>" size="19" dir="rtl" tabindex="3" style="font-size: 12pt; color: #2F446F; font-weight: bold; font-family:Traditional Arabic; float:right"></td>
	</tr>

	<tr>
	<td width="44%" bordercolorlight="#2F446F" bordercolordark="#2F446F" height="32" dir="ltr" bgcolor="#5A74A0">
	<p align="center">
			<img border="0" id="img12" src="Colleges-PAGE/NoOfTech.jpg" height="22" width="110" alt="&#1610;&#1615;&#1587;&#1578;&#1601;&#1575;&#1583; &#1605;&#1606;&#1607;&#1575; &#1601;&#1609; &#1581;&#1575;&#1604;&#1577; &#1578;&#1602;&#1587;&#1610;&#1605; &#1575;&#1604;&#1591;&#1604;&#1575;&#1576; &#1604;&#1605;&#1580;&#1605;&#1608;&#1593;&#1575;&#1578; &#1576;&#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1587;&#1575;&#1593;&#1575;&#1578; &#1575;&#1604;&#1578;&#1605;&#1575;&#1585;&#1610;&#1606;"></td>
	<td width="40%" bordercolorlight="#2F446F" bordercolordark="#2F446F" height="32" dir="ltr" colspan="2">

		<p align="right">

		<input name="T6" value="<?php echo($SubTHour);?>" size="19" dir="rtl" tabindex="4" style="font-size: 12pt; color: #2F446F; font-weight: bold; font-family:Traditional Arabic; float:right"><b><span lang="ar-sa"><font size="2" face="Traditional Arabic" color="#000066"><span style="background-color: #FFFF00"><a onclick="javascript:openWin()">&#1605;&#1604;&#1581;&#1608;&#1592;&#1577;*</a></span></font></span></b></td>
	</tr>

	<tr>
	<td width="44%" bordercolorlight="#2F446F" bordercolordark="#2F446F" height="32" dir="ltr" bgcolor="#5A74A0">
	<p align="center">
	<img border="0" id="img76" src="Colleges-PAGE/NoOFLabH.jpg" height="22" width="110" alt="&#1587;&#1575;&#1593;&#1575;&#1578; &#1575;&#1604;&#1593;&#1605;&#1604;&#1609;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1587;&#1575;&#1593;&#1575;&#1578; &#1575;&#1604;&#1593;&#1605;&#1604;&#1609;"></td>
	<td width="40%" bordercolorlight="#2F446F" bordercolordark="#2F446F" height="32" dir="ltr" colspan="2">

		<p align="right">

		<input name="T7" value="<?php echo($stype);?>" size="19" dir="rtl" tabindex="4" style="font-size: 12pt; color: #2F446F; font-weight: bold; font-family:Traditional Arabic; float:right"></td>
	</tr>


	<tr>
	<td width="44%" bordercolorlight="#5A74A0" bordercolordark="#5A74A0" height="35%" bgcolor="#B0CCFF">
	<p align="center">&nbsp;</td>
	<td width="16%" bordercolorlight="#5A74A0" bordercolordark="#5A74A0" height="35%" bgcolor="#5A74A0">
	<input name="Submit" type="submit" value="  &#1581;&#1601;&#1592;  "  tabindex="8" style="color: #FFFFFF; font-size: 14pt; font-weight: bold; font-family: Traditional Arabic; vertical-align: middle; letter-spacing: 2; border: 3px inset #B0CCFF; ; background-color:#5A74A0; float:left" dir="rtl"></td>
	<td width="21%" bordercolorlight="#5A74A0" bordercolordark="#5A74A0" height="35%" bgcolor="#B0CCFF">
	&nbsp;</td>
	</tr>
</table>
</div>
</form>
</td>
</tr>
</table>
</div>
<?php
}

//update Subject Detail
//modified on : 25/10/2008

function UpdateSubDetail_Form($uncode1,$CollegeCode1,$AcadDeg,$DeptNo,$Classno,$Sem,$f,$SubCode,$SubName,$SubHour,$SubTHour,$SubLHour,$SecID)
{
	//stype:refer to SubLabHour
	//Get Dept Name
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
	$sql2 = "select DeptName from Departments where
			UniversityCode='$uncode1' and
			CollegeCode='$CollegeCode1' and
			DeptNo='$DeptNo' and AcadDegreeId='$AcadDeg'";
	$result2 = mysqli_query($mysqli,$sql2);
	$row2=mysqli_fetch_row($result2);

	//Get Acadmic Name
	$sql3 = "select AcadDegreeName from AcadDegree where
	   	AcadDegreeId='$AcadDeg'";
	$result3 = mysqli_query($mysqli,$sql3);
	$row3=mysqli_fetch_row($result3);

	//Display ClassName & SemName
	$sql4 = "select ClassName,SemName from Semester,ClassYear
	where Semester.ClassNo='$Classno' and
	ClassYear.ClassNo=Semester.ClassNo and
	Semester.SemNo='$Sem'";
	$result4 = mysqli_query($mysqli,$sql4);
	$row4=mysqli_fetch_row($result4);

?>
<div align="center">

<table border="0" width="96%" id="table4">
<tr>
<td align="center">

<iframe name="I1" width="61%" height="299" src="DisplaySubject.php?AcadDeg=<?php echo($AcadDeg);?>&Class=<?php echo($Classno);?>&Sem=<?php echo($Sem);?>&uncode=<?php echo($uncode1);?>&CollegeCode=<?php echo($CollegeCode1);?>&Dept=<?php echo($DeptNo);?>&SecID=<?php echo($SecID);?>" scrolling="auto">
Your browser does not support inline frames or is currently configured not to display inline frames.
</iframe></td>

<td align="center" width="435">

<form method="POST"  action="SSubject.php?AcadDeg=<?php echo($AcadDeg);?>&Class=<?php echo($Classno);?>&Sem=<?php echo($Sem);?>&uncode=<?php echo($uncode1);?>&CollegeCode=<?php echo($CollegeCode1);?>&Dept=<?php echo($DeptNo);?>&SecID=<?php echo($SecID);?>&f=<?php echo($f);?>&update=1&SubCode=<?php echo($SubCode);?>" >
<div align="center">

	<table class="aaa" border="2" width="85%" id="table4" dir="rtl" height="373" bordercolorlight="#2F446F" bordercolordark="#2F446F">

		<tr>
		<td width="84%" bordercolorlight="#2F446F" bordercolordark="#2F446F" bgcolor="#5A74A0" dir="ltr" height="28" style="font-family: Traditional Arabic; font-size: 14pt; color: #FFFFFF; font-weight: bold" colspan="3" align="right">
		<font color="#FFFF00" size="5">&#1578;&#1593;&#1583;&#1610;&#1604; &#1578;&#1587;&#1580;&#1610;&#1604; &#1575;&#1604;&#1605;&#1608;&#1575;&#1583;</font></td>

		</tr>

		<tr>
		<td width="44%" bordercolorlight="#2F446F" bordercolordark="#2F446F" bgcolor="#5A74A0" dir="ltr" height="28" style="font-family: Traditional Arabic; font-size: 14pt; color: #FFFFFF; font-weight: bold">
		<p align="center">
		<img border="0" id="img7" src="Colleges-PAGE/DEptName4.jpg" height="22" width="110" alt="&#1575;&#1587;&#1605; &#1575;&#1604;&#1602;&#1587;&#1605;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1575;&#1587;&#1605; &#1575;&#1604;&#1602;&#1587;&#1605;"></td>

		<td width="40%" dir="ltr" height="28" colspan="2" bordercolorlight="#2F446F" bordercolordark="#2F446F">

		<p align="right"><font face="Traditional Arabic" color="#FFFFFF"><b><span lang="en-us">
		<?php
		//DeptName
		echo($row2[0]);
		?>
		</span></b></font></td>
		</tr>

		<tr>
		<td width="44%" bordercolorlight="#2F446F" bordercolordark="#2F446F" bgcolor="#5A74A0" dir="ltr" height="28" style="font-family: Traditional Arabic; font-size: 14pt; color: #FFFFFF; font-weight: bold">
		<p align="center">
		<img border="0" id="img50" src="Depart_Files/ACDYEARS.jpg" height="22" width="110" alt="&#1575;&#1604;&#1587;&#1606;&#1577; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1610;&#1577;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1575;&#1604;&#1587;&#1606;&#1577; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1610;&#1577;"></td>

		<td width="40%" dir="ltr" height="28" colspan="2" bordercolorlight="#2F446F" bordercolordark="#2F446F">

		<p align="right"><font face="Traditional Arabic" color="#FFFFFF"><b>
		<span lang="en-us">
		<?php
		//Class Year
		echo($row4[0]);
		?>
		</span></b></font></td>
		</tr>

		<tr>
		<td width="44%" bordercolorlight="#2F446F" bordercolordark="#2F446F" bgcolor="#5A74A0" dir="ltr" height="30" style="font-family: Traditional Arabic; font-size: 14pt; color: #FFFFFF; font-weight: bold">
		<p align="center">&nbsp;<img border="0" id="img8" src="Colleges-PAGE/Acadmic.jpg" height="22" width="110" alt="&#1575;&#1604;&#1576;&#1585;&#1606;&#1575;&#1605;&#1580; &#1575;&#1604;&#1575;&#1603;&#1575;&#1583;&#1610;&#1605;&#1609;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1575;&#1604;&#1576;&#1585;&#1606;&#1575;&#1605;&#1580; &#1575;&#1604;&#1575;&#1603;&#1575;&#1583;&#1610;&#1605;&#1609;">
		</td>

		<p align="right">
		<td width="40%" dir="ltr" height="30" colspan="2" bordercolorlight="#2F446F" bordercolordark="#2F446F">

		<p align="right">

		<font face="Traditional Arabic" color="#FFFFFF"><b><span lang="en-us">
		<?php
		//Acadmic Program Name
			echo($row3[0]);
		?>
		</span></b></font></td>
		</tr>

		<tr>
		<td width="92%" bordercolorlight="#2F446F" bordercolordark="#2F446F" bgcolor="#B0CCFF" dir="ltr" height="30" style="font-family: Traditional Arabic; font-size: 14pt; color: #FFFFFF; font-weight: bold" colspan="3">
		<p align="right">
		<?php
			//SemesterName
			$head="&#1605;&#1608;&#1575;&#1583;"."&nbsp;";
			echo($head.$row4[1]);
		?>
		</td>

		</tr>
		
		<tr>
		<td width="44%" bordercolorlight="#2F446F" bordercolordark="#2F446F" bgcolor="#5A74A0" height="34" dir="ltr">
		<p align="center">
		<img border="0" id="img9" src="Colleges-PAGE/subjCode.jpg" height="22" width="110" alt="&#1603;&#1608;&#1583; &#1575;&#1604;&#1605;&#1575;&#1583;&#1577;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1603;&#1608;&#1583; &#1575;&#1604;&#1605;&#1575;&#1583;&#1577;"></td>

		<p align="right">

		<td width="40%" height="34" dir="ltr" colspan="2" bordercolorlight="#2F446F" bordercolordark="#2F446F">

		<p align="right">

		&nbsp;
		<!--webbot bot="Validation" s-data-type="String" b-allow-letters="TRUE" b-value-required="TRUE" i-minimum-length="5" i-maximum-length="6" --><input type="text" name="T3" value="<?php echo($SubCode);?>" size="19" dir="rtl" tabindex="1" style="color: #2F446F; font-size: 12pt; font-weight: bold; font-family:Traditional Arabic; text-transform:uppercase" maxlength="6">
		</td>

		</tr>

	<tr>
	<td width="44%" bordercolorlight="#2F446F" bordercolordark="#2F446F" height="34" dir="ltr" bgcolor="#5A74A0">
	<p align="center">
	<img border="0" id="img10" src="Colleges-PAGE/SubjName.jpg" height="22" width="110" alt="&#1575;&#1587;&#1605; &#1575;&#1604;&#1605;&#1575;&#1583;&#1577;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1575;&#1587;&#1605; &#1575;&#1604;&#1605;&#1575;&#1583;&#1577;"></td>

	<td width="40%" bordercolorlight="#2F446F" bordercolordark="#2F446F" height="34" dir="ltr" colspan="2">
		<p align="right">
		<input name="T4" value="<?php echo($SubName);?>" size="27" dir="rtl" tabindex="2" style="color: #2F446F; font-size: 12pt; font-weight: bold; font-family:Traditional Arabic; "></td>
	</tr>

	<tr>
	<td width="44%" bordercolorlight="#2F446F" bordercolordark="#2F446F" height="32" dir="ltr" bgcolor="#5A74A0">
	<p align="center">
	<img border="0" id="img11" src="Colleges-PAGE/SubHours.jpg" height="22" width="110" alt="&#1587;&#1575;&#1593;&#1575;&#1578; &#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1577;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1587;&#1575;&#1593;&#1575;&#1578; &#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1577;"></td>
	<td width="40%" bordercolorlight="#2F446F" bordercolordark="#2F446F" height="32" dir="ltr" colspan="2">

		<p align="right">

		<input name="T5" value="<?php echo($SubHour);?>" size="19" dir="rtl" tabindex="3" style="font-size: 12pt; color: #2F446F; font-weight: bold; font-family:Traditional Arabic; float:right"></td>
	</tr>

	<tr>
	<td width="44%" bordercolorlight="#2F446F" bordercolordark="#2F446F" height="32" dir="ltr" bgcolor="#5A74A0">
	<p align="center">
	<img border="0" id="img12" src="Colleges-PAGE/NoOfTech.jpg" height="22" width="110" alt="&#1587;&#1575;&#1593;&#1575;&#1578; &#1575;&#1604;&#1578;&#1605;&#1575;&#1585;&#1610;&#1606;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1587;&#1575;&#1593;&#1575;&#1578; &#1575;&#1604;&#1578;&#1605;&#1575;&#1585;&#1610;&#1606;"></td>
	<td width="40%" bordercolorlight="#2F446F" bordercolordark="#2F446F" height="32" dir="ltr" colspan="2">

		<input name="T6" value="<?php echo($SubTHour);?>" size="19" dir="rtl" tabindex="4" style="font-size: 12pt; color: #2F446F; font-weight: bold; font-family:Traditional Arabic; float:right"></td>
	</tr>

	<tr>
	<td width="44%" bordercolorlight="#2F446F" bordercolordark="#2F446F" height="32" dir="ltr" bgcolor="#5A74A0">
	<p align="center">
	<img border="0" id="img76" src="Colleges-PAGE/NoOFLabH.jpg" height="22" width="110" alt="&#1587;&#1575;&#1593;&#1575;&#1578; &#1575;&#1604;&#1593;&#1605;&#1604;&#1609;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1587;&#1575;&#1593;&#1575;&#1578; &#1575;&#1604;&#1593;&#1605;&#1604;&#1609;"></td>
	<td width="40%" bordercolorlight="#2F446F" bordercolordark="#2F446F" height="32" dir="ltr" colspan="2">

		<p align="right">

		<input name="T7" value="<?php echo($SubLHour);?>" size="19" dir="rtl" tabindex="4" style="font-size: 12pt; color: #2F446F; font-weight: bold; font-family:Traditional Arabic; float:right"></td>
	</tr>


	<tr>
	<td width="44%" bordercolorlight="#5A74A0" bordercolordark="#5A74A0" height="35%" bgcolor="#B0CCFF">
	<p align="center">&nbsp;</td>
	<td width="16%" bordercolorlight="#5A74A0" bordercolordark="#5A74A0" height="35%" bgcolor="#5A74A0">
	<input name="Submit" type="submit" value="  &#1578;&#1593;&#1583;&#1610;&#1604;  "  tabindex="8" style="color: #FFFFFF; font-size: 14pt; font-weight: bold; font-family: Traditional Arabic; vertical-align: middle; letter-spacing: 2; border: 3px inset #B0CCFF; ; background-color:#5A74A0; float:left" dir="rtl"></td>
	<td width="21%" bordercolorlight="#5A74A0" bordercolordark="#5A74A0" height="35%" bgcolor="#B0CCFF">
	&nbsp;</td>
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

// Display Depart Form to manage Lecture.
// just test
function DeptLec_Form($uncode1,$CollegeCode1,$AcadDeg,$DeptNo,$Classno,$Sem,$op,$s,$year,$LectureName,$mday,$msub,$mteach,$StudGroup,$SecID)
{
	
	$LectureName=$_POST['D2'];

	$msub=$_POST['D4'];
	
	$mday=$_POST['D3'];

	$mteach=$_POST['D5'];
	
	if($_POST['DSec'])
	{
		$SecID=$_POST['DSec'];
	}
	
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
	//$conn = db_connect();
	//Get Dept Name
		$sql2 = "select DeptName from Departments where
				UniversityCode='$uncode1' and
				CollegeCode='$CollegeCode1' and
				DeptNo='$DeptNo' and AcadDegreeId='$AcadDeg'";
		$result2 = mysqli_query($mysqli,$sql2);
		$row2=mysqli_fetch_row($result2);

	//Get Acadmic Name
		$sql3 = "select AcadDegreeName from AcadDegree where
		   	AcadDegreeId='$AcadDeg'";
		$result3 = mysqli_query($mysqli,$sql3);
		$row3=mysqli_fetch_row($result3);

	//Display ClassName & SemName
		$sql4 = "select ClassName,SemName from Semester,ClassYear
		where Semester.ClassNo='$Classno' and
		ClassYear.ClassNo=Semester.ClassNo and
		Semester.SemNo='$Sem'";
		$result4 = mysqli_query($mysqli,$sql4);
		$row4=mysqli_fetch_row($result4);

	// select the MaxYear registered

	  $MaxYear=$_SESSION['year'];
	  
	  $NumClasses=GetNumberOfClasses($AcadDeg);

	// Display Number of student on this Semester based on SecID

		if($Classno==$NumClasses)
		{
		
			$NoStud=GetNoOFStudent($CollegeCode1,$uncode1,$DeptNo,$AcadDeg,$Sem,$Classno,$MaxYear,$SecID);
			
			//echo("stud=".$NoStud);
			$NoGroups=GetNoOFGroups($CollegeCode1,$uncode1,$DeptNo,$AcadDeg,$Sem,$Classno,$MaxYear,$SecID);
		}
		else
		{
			//based on Section Id
			$NoStud=GetNoOFStudent($CollegeCode1,$uncode1,$DeptNo,$AcadDeg,$Sem,$Classno,$MaxYear,0);
			
			//echo("stud=".$NoStud);
			$NoGroups=GetNoOFGroups($CollegeCode1,$uncode1,$DeptNo,$AcadDeg,$Sem,$Classno,$MaxYear,0);

		}


	//calculate :No of students on one Group
	if(($NoStud>0)&&($NoGroups>0))
		$CapGroup=round($NoStud/$NoGroups);

	//echo("CapGroup=".$CapGroup);
	?>
	<div align="center">

	<table border="0" width="85%" id="table7">
	<tr>
	<td align="center" width="88%" height="243">
	    <form  name="fmanage" method="POST"  action="DepttManage.php?AcadDeg=<?php echo($AcadDeg);?>&Class=<?php echo($Classno);?>&Sem=<?php echo($Sem);?>&uncode=<?php echo($uncode1);?>&CollegeCode=<?php echo($CollegeCode1);?>&Dept=<?php echo($DeptNo);?>&op=<?php echo($op);?>&s=<?php echo($s);?>&SecID=<?php echo($SecID);?>#subform">
	<div align="center">

		<table class="aaa" border="2" width="83%" id="table8" dir="rtl" height="212" bordercolorlight="#2F446F" bordercolordark="#2F446F">

			<tr>
			<td width="81%" bordercolorlight="#2F446F" bordercolordark="#2F446F" dir="ltr" height="28" style="font-family: Traditional Arabic; font-size: 14pt; color: #FFFFFF; font-weight: bold" colspan="3">
			<p align="right">
			<?php
			//deptName
				echo($row4[0]."&nbsp;".$row2[0]);
			?>
			</td>
			</tr>
			<tr>
			<td width="81%" bordercolorlight="#2F446F" bordercolordark="#2F446F" dir="ltr" height="30" style="font-family: Traditional Arabic; font-size: 14pt; color: #FFFFFF; font-weight: bold" colspan="3">
			<p align="right">
			<?php
				//AcadDegree
				echo($row3[0]);
			?>
			</td>
			</tr>

			<tr>
			<td width="82%" bordercolorlight="#2F446F" bordercolordark="#2F446F" dir="ltr" height="30" style="font-family: Traditional Arabic; font-size: 14pt; color: #FFFFFF; font-weight: bold" colspan="3">
			<p align="right">
			<font color="#FFFFFF">
			<?php
				//SemesterName
				if($NoStud>0)
				{
					if(($op==1)&&($s==1))
						echo($row4[1]." >> &#1593;&#1583;&#1583; &#1575;&#1604;&#1591;&#1604;&#1575;&#1576; = &nbsp;".$NoStud." &#1591;&#1575;&#1604;&#1576;");
					else
					if((($op==1)&&($s==2))||($op==2))
						echo($row4[1]." >> &#1593;&#1583;&#1583; &#1575;&#1604;&#1591;&#1604;&#1575;&#1576; &#1576;&#1603;&#1604; &#1605;&#1580;&#1605;&#1608;&#1593;&#1577;  = &nbsp;".$CapGroup." &#1591;&#1575;&#1604;&#1576;");
				}
				else
				{
					echo($row4[1]);
				}
			?>
			</font>
			</td>
			</tr>
			<tr>
			<td width="33%" bordercolorlight="#2F446F" bordercolordark="#2F446F" bgcolor="#5A74A0" height="34" dir="ltr">
				<p align="center">
					<img border="0" id="img59" src="Depart_Files/yearacad.jpg" height="22" width="110" alt="&#1575;&#1604;&#1593;&#1575;&#1605; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1575;&#1604;&#1593;&#1575;&#1605; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609;">
			</td>
				<p align="right">

			<td width="64%" height="34" dir="ltr" bordercolorlight="#2F446F" bordercolordark="#2F446F" colspan="2">

			<p align="right">

			<select size="1" name="D1" dir="rtl" style="color: #003366; font-family: Traditional Arabic; font-size: 12pt; font-weight: bold" tabindex="1">

			 <option value="<?php echo($MaxYear);?>" selected >
			  <?php
					echo($MaxYear);
			  ?>
			  </option>
			</select>

			</td>
		</tr>
			
			<?php
			
			//check if (ClassNo=Final year) based on AcadProg

			if($NumClasses==$Classno)
			{
			//check if there any section on depart
			//$uncode1,$CollegeCode1,$AcadDeg,$DeptNo,$Classno,
			if(CheckDeptSection($uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno))
			{
				
				
			?>
			<tr>
			<td width="33%" bordercolorlight="#2F446F" bordercolordark="#2F446F" bgcolor="#5A74A0" height="34" dir="ltr">
			<p align="center">
				<img border="0" id="img77" src="Colleges-PAGE/DeptSeciont.jpg" height="22" width="110"  fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" />
			</td>

			<td width="64%" height="34" dir="ltr" bordercolorlight="#2F446F" bordercolordark="#2F446F" colspan="2">
				<p align="right">
					<select size="1" name="DSec" dir="rtl" style="font-family: Traditional Arabic; font-size: 12pt; color: #003366; font-weight: bold" onchange="javascript:document.fmanage.action='DeptManage.php?AcadDeg=<?php echo($AcadDeg);?>&Class=<?php echo($Classno);?>&Sem=<?php echo($Sem);?>&uncode=<?php echo($uncode1);?>&CollegeCode=<?php echo($CollegeCode1);?>&Dept=<?php echo($DeptNo);?>&op=<?php echo($op);?>&s=<?php echo($s);?>&checkit=1';javascript:document.fmanage.submit();">
						<option value="" <?php if( strcmp($SecID,"")==0 ){ ?>selected <?php }?>>
						&#1601;&#1590;&#1604;&#1575; &#1602;&#1605; &#1576;&#1578;&#1581;&#1583;&#1610;&#1583; &#1575;&#1604;&#1578;&#1582;&#1589;&#1589;</option>
					<!-- $DeptSection-->
						<?php
						
							//Display all Sections
							$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
							//$conn = db_connect();
							
							$result=mysqli_query($mysqli,"select SecID,SecName from DeptSection where 
    		 									UniversityCode='$uncode1' and CollegeCode='$CollegeCode1' and 
    		 									DeptNo='$DeptNo' and AcadDegreeId='$AcadDeg' and ClassNo='$Classno'");
								
							if(mysqli_num_rows($result)>0)
							{
								
								while($row=mysqli_fetch_row($result))
								{
						?>
								<option <?php if( strcmp($SecID,$row[0])==0 ){?> selected <?php }?> value="<?php echo($row[0]);?>">
								<?php 
									//depart name
									echo($row[1]);
									
								?>
								</option>
						<?php
								}//end of while
							}//end of if
							
						?>
						</select>
					</p>
			</td>
			</tr>
			<?php
				}//end of if
			}//end of main if
			?>
		<tr>
		<td width="33%" bordercolorlight="#2F446F" bordercolordark="#2F446F" bgcolor="#5A74A0" height="34" dir="ltr">

		<p align="center">
		<?php
			if($op==1)
			{
			?>
				<img border="0" id="img37" src="Colleges-PAGE/chLecct.jpg" height="24" width="118" alt="&#1575;&#1587;&#1605; &#1575;&#1604;&#1602;&#1575;&#1593;&#1577;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 14; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0; fp-orig: 0" fp-title="&#1575;&#1587;&#1605; &#1575;&#1604;&#1602;&#1575;&#1593;&#1577;"></td>
			<?php
			}
			else
			if($op==2)
			{
			?>
				<img border="0" id="img47" src="Colleges-PAGE/chLabs.jpg" height="24" width="118" alt="&#1575;&#1587;&#1605; &#1575;&#1604;&#1605;&#1593;&#1605;&#1604;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 14; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1575;&#1587;&#1605; &#1575;&#1604;&#1605;&#1593;&#1605;&#1604;">
			<?php
			}
			?>
		</td>
		<td width="64%" bordercolorlight="#2F446F" bordercolordark="#2F446F" height="34" dir="ltr" colspan="2">
			<p align="right">
			<?php

$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
				//$conn = db_connect();
				//(1)select the Location Of College

				$sql = "select UnLoc from Colleges where UniversityCode='$uncode1' and CollegeCode='$CollegeCode1'";
				$result = mysqli_query($mysqli,$sql);
				$row=mysqli_fetch_row($result);

				//Get the Number Of Student to choose suitable Lecture
				//Lecuter
				if(($op==1)&&($s==1))
				{
				  if(strcmp($NoStud,"")!=0)
				  {
					$sql_query33="select usedBy.SubBId,SubBuildingSeminar.SubBName,SubBuildingSeminar.Capacity from usedBy,SubBuildingSeminar where
					usedBy.BId=1 and
					SubBuildingSeminar.BId=1 and
					usedBy.AcadYNo='$MaxYear' and
					usedBy.SubBId=SubBuildingSeminar.SubBId and
					usedBy.UniversityCode='$uncode1' and
					usedBy.CollegeCode='$CollegeCode1' and
					SubBuildingSeminar.UnLoc='$row[0]' and
					SubBuildingSeminar.Capacity>='$NoStud'";

					$result33=mysqli_query($mysqli,$sql_query33);

					if (mysqli_num_rows($result33)>0)
					{
					?>
					<select size="1" name="D2" dir="rtl" style="color: #003366; font-family: Traditional Arabic; font-size: 12pt; font-weight: bold" tabindex="2">
						<option value="" selected>&#1575;&#1582;&#1578;&#1585; &#1575;&#1604;&#1602;&#1575;&#1593;&#1577; &#1575;&#1604;&#1605;&#1582;&#1589;&#1589;&#1577; &#1604;&#1604;&#1603;&#1604;&#1610;&#1577;</option>
					<?php
					  while($row33=mysqli_fetch_row($result33))
					   {?>
						<option value="<?php echo($row33[0]);?>"
						<?php
						if(strcmp($LectureName,$row33[0])==0)
						{ ?> selected <?php }
						?> >
						<?php
							echo($row33[1]."&nbsp; [ &#1575;&#1604;&#1587;&#1593;&#1577; &nbsp;:".$row33[2]."&nbsp; ] &nbsp;");
						?></option>
						<?php
						}//end of while
						?>
						</select>
			    	<?php
					 }//end of if
					else
					 {
					 	$result33=mysqli_query($mysqli,"select BId,SubBId from  usedby  where 
					 							AcadYNo='$MaxYear' and 
					 							UniversityCode='$uncode1' and 
					 							CollegeCode='$CollegeCode1' and BId=1");
					 	if (mysqli_num_rows($result33)>0)
					 	{
								echo("&#1575;&#1604;&#1602;&#1575;&#1593;&#1575;&#1578; &#1575;&#1604;&#1605;&#1578;&#1575;&#1581;&#1577; &#1604;&#1575; &#1578;&#1587;&#1593; &#1607;&#1584;&#1575; &#1575;&#1604;&#1593;&#1583;&#1583; &#1605;&#1606; &#1575;&#1604;&#1591;&#1604;&#1575;&#1576;");
					 	}
					 	else
					 	{
					 		echo("<a href='ConfigNewYear.php?uncode=$uncode1&CollegeCode=$CollegeCode1&value=3&op=1'>");
					 			echo("&#1601;&#1590;&#1604;&#1575; &#1548; &#1602;&#1605; &#1576;&#1578;&#1581;&#1583;&#1610;&#1583; &#1575;&#1604;&#1602;&#1575;&#1593;&#1575;&#1578; &#1575;&#1604;&#1605;&#1582;&#1589;&#1589;&#1607; &#1604;&#1604;&#1603;&#1604;&#1610;&#1577;");
					 		echo("</a>");					 		

					 	}

					 }
				  }//end of if1
				 else
				  {
				  
					//echo("Error You Must Registered Number of student for the NewYear.. ");
					echo("<a target='_BLANK' href='InsertNoStud.php?AcadDeg=$AcadDeg&Class=$Classno&Sem=$Sem&uncode=$uncode1&CollegeCode=$CollegeCode1&Dept=$DeptNo'>&#1601;&#1590;&#1604;&#1575; &#1602;&#1605; &#1576;&#1578;&#1581;&#1583;&#1610;&#1583; &#1593;&#1583;&#1583; &#1575;&#1604;&#1591;&#1604;&#1575;&#1576; &#1604;&#1610;&#1578;&#1605; &#1593;&#1585;&#1590; &#1575;&#1604;&#1602;&#1575;&#1593;&#1575;&#1578; &#1575;&#1604;&#1605;&#1578;&#1575;&#1581;&#1577;".'</a>');
				  }
			}//end of if
			else
			//Toutorial
			if(($op==1)&&($s==2))
			{
				if(strcmp($CapGroup,"")!=0)
				  {
					$sql_query33="select usedBy.SubBId,SubBuildingSeminar.SubBName,SubBuildingSeminar.Capacity from usedBy,SubBuildingSeminar where
					usedBy.BId=1 and
					SubBuildingSeminar.BId=1 and
					usedBy.AcadYNo='$MaxYear' and
					usedBy.SubBId=SubBuildingSeminar.SubBId and
					usedBy.UniversityCode='$uncode1' and
					usedBy.CollegeCode='$CollegeCode1' and
					SubBuildingSeminar.UnLoc='$row[0]' and
					SubBuildingSeminar.Capacity>='$CapGroup'";

					$result33=mysqli_query($mysqli,$sql_query33);

					if (mysqli_num_rows($result33)>0)
					{
					?>
					<select size="1" name="D2" dir="rtl" style="color: #003366; font-family: Traditional Arabic; font-size: 12pt; font-weight: bold" tabindex="2">
					<option value="" selected>&#1575;&#1582;&#1578;&#1585; &#1575;&#1604;&#1602;&#1575;&#1593;&#1577; &#1575;&#1604;&#1605;&#1582;&#1589;&#1589;&#1577; &#1604;&#1604;&#1603;&#1604;&#1610;&#1577;</option>
					<?php
					  while($row33=mysqli_fetch_row($result33))
					   {?>
						<option value="<?php echo($row33[0]);?>"
						<?php
						if(strcmp($LectureName,$row33[0])==0)
						{ ?> selected <?php }
						?> >
						<?php
							echo($row33[1]."&nbsp; [ &#1575;&#1604;&#1587;&#1593;&#1577; &nbsp;:".$row33[2]."&nbsp; ] &nbsp;");
						?></option>
						<?php
						}//end of while
						?>
						</select>
			    	<?php
					 }//end of if
					else
					 {
					 	$result33=mysqli_query($mysqli,"select BId,SubBId from  usedby  where 
					 							AcadYNo='$MaxYear' and 
					 							UniversityCode='$uncode1' and 
					 							CollegeCode='$CollegeCode1' and BId=1");
					 	if (mysqli_num_rows($result33)>0)
					 	{

								echo("&#1575;&#1604;&#1602;&#1575;&#1593;&#1575;&#1578; &#1575;&#1604;&#1605;&#1578;&#1575;&#1581;&#1577; &#1604;&#1575; &#1578;&#1587;&#1593; &#1607;&#1584;&#1575; &#1575;&#1604;&#1593;&#1583;&#1583; &#1605;&#1606; &#1575;&#1604;&#1591;&#1604;&#1575;&#1576;");
						}
						
						else
					 	{
					 		echo("<a href='ConfigNewYear.php?uncode=$uncode1&CollegeCode=$CollegeCode1&value=3&op=1'>");
					 			echo("&#1601;&#1590;&#1604;&#1575; &#1548; &#1602;&#1605; &#1576;&#1578;&#1581;&#1583;&#1610;&#1583; &#1575;&#1604;&#1602;&#1575;&#1593;&#1575;&#1578; &#1575;&#1604;&#1605;&#1582;&#1589;&#1589;&#1607; &#1604;&#1604;&#1603;&#1604;&#1610;&#1577;");
					 		echo("</a>");					 		

					 	}

					 }
				  }//end of if1
				 else
				  {
				 
					//echo("Error You Must Registered Number of student for the NewYear.. ");
						echo("<a href='InsertNoStud.php?AcadDeg=$AcadDeg&Class=$Classno&Sem=$Sem&uncode=$uncode1&CollegeCode=$CollegeCode1&Dept=$DeptNo'>&#1601;&#1590;&#1604;&#1575; &#1602;&#1605; &#1576;&#1578;&#1581;&#1583;&#1610;&#1583; &#1593;&#1583;&#1583; &#1575;&#1604;&#1591;&#1604;&#1575;&#1576; &#1604;&#1610;&#1578;&#1605; &#1593;&#1585;&#1590; &#1575;&#1604;&#1602;&#1575;&#1593;&#1575;&#1578; &#1575;&#1604;&#1605;&#1578;&#1575;&#1581;&#1577;".'</a>');
				  }
			}//end of if
			else
			//Lab
			if($op==2)
			{
				//if Lab
			  if(strcmp($CapGroup,"")!=0)
			   {
				$sql_query33="select usedBy.SubBId,SubBuildingSeminar.SubBName,SubBuildingSeminar.Capacity from usedBy,SubBuildingSeminar where
					usedBy.BId=2 and
					SubBuildingSeminar.BId=2 and
					usedBy.AcadYNo='$MaxYear' and
					usedBy.SubBId=SubBuildingSeminar.SubBId and
					usedBy.UniversityCode='$uncode1' and
					usedBy.CollegeCode='$CollegeCode1' and
					SubBuildingSeminar.UnLoc='$row[0]'";

					//SubBuildingSeminar.Capacity>'$CapGroup'";

					$result33=mysqli_query($mysqli,$sql_query33);

					if (mysqli_num_rows($result33))
					{
					?>
					<select size="1" name="D2" dir="rtl" style="color: #003366; font-family: Traditional Arabic; font-size: 12pt; font-weight: bold" tabindex="2">
					<option value="" selected>&#1575;&#1582;&#1578;&#1585; &#1575;&#1604;&#1605;&#1593;&#1605;&#1604; &#1575;&#1604;&#1605;&#1582;&#1589;&#1589; &#1604;&#1604;&#1603;&#1604;&#1610;&#1577;</option>
					<?php
					  while($row33=mysqli_fetch_row($result33))
					   {?>
						<option value="<?php echo($row33[0]);?>"
						<?php
						if(strcmp($LectureName,$row33[0])==0)
						{ ?> selected <?php }
						?> >
						<?php
							echo($row33[1]."&nbsp; [ &#1575;&#1604;&#1587;&#1593;&#1577; &nbsp;:".$row33[2]."&nbsp; ] &nbsp;");
						?></option>
						<?php
						}
						?>
						</select>
			    	<?php
					 }//end of if
					else
					 {
					 	//Lab Capacity not allowed

					 	$result33=mysqli_query($mysqli,"select BId,SubBId from  usedby  where 
					 							AcadYNo='$MaxYear' and 
					 							UniversityCode='$uncode1' and 
					 							CollegeCode='$CollegeCode1' and BId=2");
					 	if (mysqli_num_rows($result33)>0)
					 	{

					 			echo("&#1575;&#1604;&#1605;&#1593;&#1575;&#1605;&#1604; &#1575;&#1604;&#1605;&#1578;&#1575;&#1581;&#1577; &#1604;&#1575; &#1578;&#1587;&#1593; &#1607;&#1584;&#1575; &#1575;&#1604;&#1593;&#1583;&#1583; &#1605;&#1606; &#1575;&#1604;&#1591;&#1604;&#1575;&#1576;");
						}
						else
						{
							echo("<a href='ConfigNewYear.php?uncode=$uncode1&CollegeCode=$CollegeCode1&value=4&op=2'>");
							
								echo("&#1601;&#1590;&#1604;&#1575; &#1548; &#1602;&#1605; &#1576;&#1578;&#1581;&#1583;&#1610;&#1583; &#1575;&#1604;&#1605;&#1593;&#1575;&#1605;&#1604; &#1575;&#1604;&#1605;&#1578;&#1575;&#1581;&#1577; &#1604;&#1604;&#1603;&#1604;&#1610;&#1577;");
							
							echo("</a>");
						}
					 }
				  }//end of if1
				 else
				  {
				  //$CollegeCode1,$uncode1,$DeptNo,$AcadDeg,$Sem,$Classno
					//echo("Error You Must Registered Number of student for the NewYear.. ");
					echo("<a target='_BLANK' href='InsertNoStud.php?AcadDeg=$AcadDeg&Class=$Classno&Sem=$Sem&uncode=$uncode1&CollegeCode=$CollegeCode1&Dept=$DeptNo'>&#1601;&#1590;&#1604;&#1575; &#1602;&#1605; &#1576;&#1578;&#1581;&#1583;&#1610;&#1583; &#1593;&#1583;&#1583; &#1575;&#1604;&#1591;&#1604;&#1575;&#1576; &#1604;&#1610;&#1578;&#1605; &#1593;&#1585;&#1590; &#1575;&#1604;&#1602;&#1575;&#1593;&#1575;&#1578; &#1575;&#1604;&#1605;&#1578;&#1575;&#1581;&#1577;".'</a>');
				  }
			}//end of if
			    ?>
			</tr>
			<?php
			if((($op==1)&&($s==2))||($op==2))
			{
			?>
				<tr>
				<td width="33%" bordercolorlight="#2F446F" bordercolordark="#2F446F" bgcolor="#5A74A0" height="34" dir="ltr">

				<p align="center">
				<img border="0" id="img74" src="Colleges-PAGE/GroupNoH.jpg" height="24" width="118" alt="&#1585;&#1602;&#1605; &#1575;&#1604;&#1605;&#1580;&#1605;&#1608;&#1593;&#1577;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 14; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1585;&#1602;&#1605; &#1575;&#1604;&#1605;&#1580;&#1605;&#1608;&#1593;&#1577;">

				</td>

				<td width="64%" bordercolorlight="#2F446F" bordercolordark="#2F446F" height="34" dir="ltr" colspan="2">
				<p align="right">

				<select size="1" name="D8" dir="rtl" style="color: #003366; font-family: Traditional Arabic; font-size: 12pt; font-weight: bold" tabindex="3">
				<option value="" selected>&#1575;&#1582;&#1578;&#1585; &#1575;&#1604;&#1605;&#1580;&#1605;&#1608;&#1593;&#1577;</option>
				<?php
					//check
					if(strcmp($CapGroup,"")!=0)
			   		{
						$conn = db_connect();
						//(1) check if there is Tutorial lecture

						if(($op==1)&&($s==2))
						{
							$sqls_query = "select SubCode,SubName,SubTHour from CollegeSubject where  AcadYNo='$MaxYear' and UniversityCode='$uncode1' and CollegeCode='$CollegeCode1' and DeptNo='$DeptNo' and AcadDegreeId='$AcadDeg' and ClassNo='$Classno' and SecID='$SecID' and SemNo='$Sem' and SubType=1 and SubTHour!=0";
						}
						else
						if($op==2)
						{
							$sqls_query = "select SubCode,SubName,SubHour from CollegeSubject where  AcadYNo='$MaxYear' and UniversityCode='$uncode1' and CollegeCode='$CollegeCode1' and DeptNo='$DeptNo' and AcadDegreeId='$AcadDeg' and ClassNo='$Classno' and SecID='$SecID' and SemNo='$Sem' and SubType=2 and SubHour!=0";
						}

						$results=mysqli_query($mysqli,$sqls_query);

						if(mysqli_num_rows($results))
						{
						  while($rowss=mysqli_fetch_row($results))
						   {
						   //(2) select the Groups Inserted
							$sql_query88="select GId,GName from GroupPerSem where
							AcadYNo='$MaxYear' and
							UniversityCode='$uncode1' and
							CollegeCode='$CollegeCode1' and
							DeptNo='$DeptNo' and
							AcadDegreeId='$AcadDeg'and
							SemNo='$Sem' and
							ClassNo='$Classno' and SecID='$SecID'";
							$result88=mysqli_query($mysqli,$sql_query88);
							if (mysqli_num_rows($result88))
							{
							  while($row88=mysqli_fetch_row($result88))
							   {
							   	//(3)check if SubCode Inserted Before or not
							   	$checkSub=CheckSubCodeIns($uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem,$op,$row88[0],$rowss[0],$rowss[2],$SecID);

						       	if(($checkSub==0)||( ($checkSub/2) < $rowss[2]))
						       	{
						       		$subGroup=$row88[0]."+".$rowss[0];
						       	?>
							   		<option value="<?php echo($subGroup);?>"
									<?php
									if(strcmp($StudGroup,$subGroup)==0)
									{ ?> selected <?php }
									?> >
									<?php
									echo($rowss[1]." - ".$row88[1]);
									?></option>
								<?php
								}
							   }//end of while2
							}//end of if
						  }//end of while
						}//end of if
						else
						{
							echo("There is no Tutorial Lectures..");
						}
						?>
						</select>
						<?php
						} //end of if
						else
				  		{
							//echo("Error You Must Registered Number of student for the NewYear.. ");
							echo("<a href='InsertNoStud.php?AcadDeg=$AcadDeg&Class=$Classno&Sem=$Sem&uncode=$uncode1&CollegeCode=$CollegeCode1&Dept=$DeptNo'>&#1601;&#1590;&#1604;&#1575; &#1602;&#1605; &#1576;&#1578;&#1581;&#1583;&#1610;&#1583; &#1593;&#1583;&#1583; &#1575;&#1604;&#1591;&#1604;&#1575;&#1576; &#1604;&#1610;&#1578;&#1605; &#1593;&#1585;&#1590; &#1575;&#1604;&#1602;&#1575;&#1593;&#1575;&#1578; &#1575;&#1604;&#1605;&#1578;&#1575;&#1581;&#1577;".'</a>');
				  		}

						?>
						</tr>
			  <?php
				} //end of if

			?>
		<tr>
		<td width="33%" bordercolorlight="#2F446F" bordercolordark="#2F446F" bgcolor="#5A74A0" height="34" dir="ltr">

		<p align="center">
		<img border="0" id="img68" src="Depart_Files/ManDays.jpg" height="30" width="150" alt="&#1575;&#1604;&#1610;&#1608;&#1605;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0; fp-orig: 0" fp-title="&#1575;&#1604;&#1610;&#1608;&#1605;"></td>
		<td width="64%" bordercolorlight="#2F446F" bordercolordark="#2F446F" height="34" dir="ltr" colspan="2">
			 		<p align="right">
					<select size="1" name="D3" tabindex="4" style="font-size: 12pt; color:#003366; font-family:Traditional Arabic; font-weight:bold" dir="rtl">
					<option value="" selected
					<?php
						if(strcmp($mday,"")==0)
						{ ?> selected <?php }
					?> >&#1575;&#1582;&#1578;&#1585; &#1575;&#1604;&#1610;&#1608;&#1605;</option>
					<option value="1"
					<?php
						if(strcmp($mday,"1")==0)
						{ ?> selected <?php }
					?> >&#1575;&#1604;&#1587;&#1576;&#1578;</option>
					<option value="2"
					<?php
						if(strcmp($mday,"2")==0)
						{ ?> selected <?php }
					?> >&#1575;&#1604;&#1575;&#1581;&#1583;</option>
					<option value="3"
					<?php
						if(strcmp($mday,"3")==0)
						{ ?> selected <?php }
					?> >&#1575;&#1604;&#1575;&#1579;&#1606;&#1610;&#1606;</option>
					<option value="4"
					<?php
						if(strcmp($mday,"4")==0)
						{ ?> selected <?php }
					?> >&#1575;&#1604;&#1579;&#1604;&#1575;&#1579;&#1575;&#1569;</option>
					<option value="5"
					<?php
						if(strcmp($mday,"5")==0)
						{ ?> selected <?php }
					?> >&#1575;&#1604;&#1575;&#1585;&#1576;&#1593;&#1575;&#1569;</option>
					<option value="6"
					<?php
						if(strcmp($mday,"6")==0)
						{ ?> selected <?php }
					?> >&#1575;&#1604;&#1582;&#1605;&#1610;&#1587;</option>
					</select>
				</td>


		<?php
		if(($op==1)&&($s==1))
		{
		?>
		<tr>
		<td width="33%" bordercolorlight="#2F446F" bordercolordark="#2F446F" bgcolor="#5A74A0" height="34" dir="ltr">

		<p align="center">

		 	<img border="0" id="img66" src="Depart_Files/ManSuBs.jpg" height="30" width="150" alt="&#1575;&#1604;&#1605;&#1575;&#1583;&#1577;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0; fp-orig: 0" fp-title="&#1575;&#1604;&#1605;&#1575;&#1583;&#1577;" align="center"></td>
		<td width="64%" bordercolorlight="#2F446F" bordercolordark="#2F446F" height="34" dir="ltr" colspan="2">
		<p align="right">
		<?php
		// check Subject
		$noofsub1=CheckNoSubject("ManagingLec",$uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem,$op);
		$noofsub2=CheckNoSubject("CollegeSubject",$uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem,$op);
		echo("managing=".$noofsub1."subject=".$noofsub2);

		//if(($noofsub1!=0)&&($noofsub2!=0))
		//{
		//	echo("managing=".$noofsub1."subject=".$noofsub2);
		
		//$year,$LectureName,$mday,$msub,$mteach,$StudGroup
			
		?>
			<select size="1" name="D4" tabindex="5" style="font-size: 12pt; color:#003366; font-family:Traditional Arabic; font-weight:bold" dir="rtl" onchange="javascript:document.fmanage.action='DeptManage.php?AcadDeg=<?php echo($AcadDeg);?>&Class=<?php echo($Classno);?>&Sem=<?php echo($Sem);?>&uncode=<?php echo($uncode1);?>&CollegeCode=<?php echo($CollegeCode1);?>&Dept=<?php echo($DeptNo);?>&op=<?php echo($op);?>&s=<?php echo($s);?>#otherDept';javascript:document.fmanage.submit();">
				<?php
				// Here:check Subject

				if(($noofsub1>0)&&($noofsub2>0))
				{
				 ?>
					 <!--&#1578;&#1605;&#1578; &#1575;&#1604;&#1580;&#1583;&#1608;&#1604;&#1577; &#1604;&#1580;&#1605;&#1610;&#1593; &#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578;-->

					 <option value="" selected>&#1578;&#1605;&#1578; &#1575;&#1604;&#1580;&#1583;&#1608;&#1604;&#1577; &#1604;&#1580;&#1605;&#1610;&#1593; &#1575;&#1604;&#1605;&#1608;&#1575;&#1583;</option> 
				<?php
				}
				else
				{
				?>
				<option value="" selected>&#1575;&#1582;&#1578;&#1585; &#1575;&#1604;&#1605;&#1575;&#1583;&#1577;</option>
				<?php

					$conn = db_connect();
						$sqls_query7 = "select SubCode,SubName,SubHour from CollegeSubject where AcadYNo='$MaxYear' and UniversityCode='$uncode1' and CollegeCode='$CollegeCode1' and DeptNo='$DeptNo' and AcadDegreeId='$AcadDeg' and ClassNo='$Classno' and SecID='$SecID' and SemNo='$Sem' and SubType=1 and SubHour!=0";

					$results7=mysqli_query($mysqli,$sqls_query7);
					if (mysqli_num_rows($results7)>0)
					{
					  while($rows7=mysqli_fetch_row($results7))
					  {

						// check SubCode store on ManagingLec Table
							//if op==1

								$sqls_query77 = "select count(MTimes) from ManagingLec where AcadYNo='$MaxYear' and SubCode='$rows7[0]' and UniversityCode='$uncode1' and CollegeCode='$CollegeCode1' and DeptNo='$DeptNo' and AcadDegreeId='$AcadDeg' and ClassNo='$Classno' and SecID='$SecID' and SemNo='$Sem' and SubType=1 and GId=0";
							$results77=mysqli_query($mysqli,$sqls_query77);

						    $rows77=mysqli_fetch_row($results77);

							// if not inserted
								if( ($rows77[0]/2) <$rows7[2])
								{ //not found
									//echo("count=".$rows77[0]);

								?>
								<option value="<?php echo($rows7[0]);?>"
								<?php
								if(strcmp($msub,$rows7[0])==0)
								{ ?> selected <?php }
								?> >
								<?php
									echo($rows7[1]);

								?>
								</option>
								<?php
						    	} //end of if
						    	//
						    	else
						   		{
						   		//Duplicated Entry

						   			$sqls_queryd = "select count(SubCode) from ManagingLec where AcadYNo='$MaxYear' and SubCode='$rows7[0]' and UniversityCode='$uncode1' and CollegeCode='$CollegeCode1' and DeptNo='$DeptNo' and AcadDegreeId='$AcadDeg' and ClassNo='$Classno' and SecID='$SecID' and SemNo='$Sem'";
								$resultsd=mysqli_query($mysqli,$sqls_queryd);
								$rowsd=mysqli_fetch_row($resultsd);

								//remender= ActuallHours- InsertedHour
								$remender=$rows7[2]-($rowsd[0]/2);
								if($remender>0)
								{
								?>
									<option value="<?php echo($rows7[0]);?>"
									<?php
										if(strcmp($msub,$rows7[0])==0)
									{ ?> selected <?php }
									?> >
									<?php
										echo($rows7[1]);
									?>
									</option>

									<?php

						    	}//end of if


						   		}//end of else


						}// end of while
						?>
					</select>
					<?php
					}//end of if
					}
			/*}//end of main if
			else
			{
			 	echo("<div align='right' style='color:yellow;font-size:14pt;font-style:bold'>");
			 		echo("&#1578;&#1605;&#1578; &#1575;&#1604;&#1580;&#1583;&#1608;&#1604;&#1577; &#1604;&#1580;&#1605;&#1610;&#1593; &#1575;&#1604;&#1605;&#1608;&#1575;&#1583;");
			 	echo("</div>");
			 }*/
			?>
			</tr>
		<?php
		}
		?>
		<tr>

		<td width="33%" bordercolorlight="#2F446F" bordercolordark="#2F446F" bgcolor="#5A74A0" height="34" dir="ltr">

		<p align="center">

		 	<img border="0" id="img67" src="Depart_Files/ManTeach.jpg" height="30" width="150" alt="&#1575;&#1604;&#1575;&#1587;&#1578;&#1575;&#1584;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0; fp-orig: 0" fp-title="&#1575;&#1604;&#1575;&#1587;&#1578;&#1575;&#1584;" align="center"></td>
		<td width="64%" bordercolorlight="#2F446F" bordercolordark="#2F446F" height="34" dir="ltr" colspan="2">
		<p align="right">

				<select size="4" name="D5" tabindex="6" style="font-size: 12pt; color:#003366; font-family:Traditional Arabic; font-weight:bold" dir="rtl" onchange="javascript:document.fmanage.action='DeptManage.php?AcadDeg=<?php echo($AcadDeg);?>&Class=<?php echo($Classno);?>&Sem=<?php echo($Sem);?>&uncode=<?php echo($uncode1);?>&CollegeCode=<?php echo($CollegeCode1);?>&Dept=<?php echo($DeptNo);?>&op=<?php echo($op);?>&s=<?php echo($s);?>#otherDept';javascript:document.fmanage.submit();">
			
				<option value="" selected>&#1575;&#1582;&#1578;&#1585; &#1575;&#1604;&#1575;&#1587;&#1578;&#1575;&#1584;</option>
			
			<?php
				//if it open lab without Teacher
				if($op==2)
				{
				?>
						<option value="-1" <?php if (strcmp($mteach,"-1")==0){?> selected <?php } ?> > -- &#1576;&#1583;&#1608;&#1606; &#1575;&#1587;&#1578;&#1575;&#1584; -- </option>
				<?php
				}//end of op==2
				$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
				//$conn = db_connect();
					$sqls_query8 = "select TeacherNo,TeacherName from Teachers where AcadYNo='$MaxYear' and UniversityCode='$uncode1' and CollegeCode='$CollegeCode1' ORDER BY TeacherName";
				$results8=mysqli_query($mysqli,$sqls_query8);
				if (mysqli_num_rows($results8))
				{
					while($rows8=mysqli_fetch_row($results8))
					{?>
						<option value="<?php echo($rows8[0]);?>"
						<?php
							if(strcmp($mteach,$rows8[0])==0)
							{ ?> selected <?php }
						?> >
						<?php
							echo($rows8[1]);
						?>
						</option>
					<?php
					}
					?>
					</select>
				<?php
				}//end of if
				?>
			</tr>
		<tr>

		<td width="97%" bordercolorlight="#2F446F" bordercolordark="#2F446F" bgcolor="#5A74A0" height="34" dir="ltr" colspan="3">
		<p align="right">
		<?php
			//check if lecture share or not
			
			$notshare=$_POST['anysection'];

		?>
		
		<select size="1" name="anysection" tabindex="7" style="font-size: 12pt; color:#003366; font-family:Traditional Arabic; font-weight:bold" dir="rtl" onchange="javascript:document.fmanage.action='DeptManage.php?AcadDeg=<?php echo($AcadDeg);?>&Class=<?php echo($Classno);?>&Sem=<?php echo($Sem);?>&uncode=<?php echo($uncode1);?>&CollegeCode=<?php echo($CollegeCode1);?>&Dept=<?php echo($DeptNo);?>&op=<?php echo($op);?>&s=<?php echo($s);?>&subcode=<?php echo($_POST[D4]);?>#otherDept';javascript:document.fmanage.submit();">	
				<option value="0" <?php if($notshare==0){?> selected <?php }?>>
				&#1604;&#1575;&#1610;&#1608;&#1580;&#1583; &#1578;&#1588;&#1575;&#1585;&#1603; &#1576;&#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1577; &#1605;&#1593; &#1575;&#1604;&#1575;&#1602;&#1587;&#1575;&#1605; &#1575;&#1604;&#1575;&#1582;&#1585;&#1609;</option>
				<option value="1" <?php if($notshare==1){?> selected <?php }?>>
				&#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1577; &#1605;&#1588;&#1578;&#1585;&#1603;&#1577; &#1605;&#1593; &#1575;&#1604;&#1575;&#1602;&#1587;&#1575;&#1605; &#1575;&#1604;&#1575;&#1582;&#1585;&#1609;</option>
		</select>
		<span dir="ltr"><font color="red" size="4">*</font></span>
		</p>
		<?php
		if($notshare==1)
		{
			//display all Depart
		?>
		<a name="#otherDept">
		<div align="center" style="text-align:center; overflow:scroll">
			
			<?php include("DisplayDeptSec.php");?>
	
		</div>
		</a>
		<?php
		}
		?>
		</td>
		</tr>
		<tr>
		<td width="33%" bordercolorlight="#2F446F" bordercolordark="#2F446F" bgcolor="#B0CCFF" height="34" dir="ltr">
		<p align="center">
		<?php
			// Display table
		?>
		<a href="displaytable.php?AcadDeg=<?php echo($AcadDeg);?>&Class=<?php echo($Classno);?>&Sem=<?php echo($Sem);?>&uncode=<?php echo($uncode1);?>&CollegeCode=<?php echo($CollegeCode1);?>&Dept=<?php echo($DeptNo);?>&op=<?php echo($op);?>&s=<?php echo($s);?>&SecID=<?php echo($SecID);?>" target="_blank" width="80%" height="40%" >
		<img border="0" id="img71" src="Depart_Files/DisplayFTable.jpg" height="30" width="150" alt="&#1575;&#1587;&#1578;&#1593;&#1585;&#1575;&#1590; &#1575;&#1604;&#1580;&#1583;&#1608;&#1604;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFF00; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1575;&#1587;&#1578;&#1593;&#1585;&#1575;&#1590; &#1575;&#1604;&#1580;&#1583;&#1608;&#1604;"></a></td>
		<td width="32%" bordercolorlight="#2F446F" bordercolordark="#2F446F" bgcolor="#B0CCFF" height="34" dir="ltr">

		<input name="Submit" type="submit" value=" &#1575;&#1587;&#1578;&#1593;&#1585;&#1575;&#1590; &#1575;&#1604;&#1575;&#1586;&#1605;&#1606;&#1577;"  tabindex="6" style="color: #FFFFFF; font-size: 14pt; font-weight: bold; font-family: Traditional Arabic; vertical-align: middle; letter-spacing: 2; border: 3px inset #B0CCFF; ; background-color:#5A74A0; float:right" dir="rtl"></td>
		<td width="32%" bordercolorlight="#2F446F" bordercolordark="#2F446F" bgcolor="#B0CCFF" height="34" dir="ltr">

		<p align="center">
		<a href="displaytable.php?AcadDeg=<?php echo($AcadDeg);?>&Class=<?php echo($Classno);?>&Sem=<?php echo($Sem);?>&uncode=<?php echo($uncode1);?>&CollegeCode=<?php echo($CollegeCode1);?>&Dept=<?php echo($DeptNo);?>&op=<?php echo($op);?>&s=<?php echo($s);?>&ch=1&SecID=<?php echo($SecID);?>" target="_blank">
		<img border="0" id="img75" src="Depart_Files/DeleteTMSC.jpg" height="30" width="150" alt="&#1581;&#1584;&#1601; &#1575;&#1604;&#1580;&#1583;&#1608;&#1604;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFF00; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1581;&#1584;&#1601; &#1575;&#1604;&#1580;&#1583;&#1608;&#1604;"></a></td>
		</table>
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
}
//(2)Important: this form used to insert Lecture's sessions or labs sessions
function sub_Form($uncode1,$CollegeCode1,$AcadDeg,$DeptNo,$Classno,$Sem,$op,$s,$year,$LectureName,$mday,$msub,$mteach,$GId,$SecID)
{

	//(1) get Subject Hour
	$MaxYear=$year;
	
	// Check Subject Type (Lecture| Lab | Tutorial )
	if((($op==1)&&($s==1))||($op==2))
	{
		$conn = db_connect();
		$sql11 = "select SubName,SubHour from CollegeSubject where
		AcadYNo='$MaxYear' and
		UniversityCode='$uncode1' and
		CollegeCode='$CollegeCode1' and
		DeptNo='$DeptNo' and
		AcadDegreeId='$AcadDeg' and
		ClassNo='$Classno' and
		SecID='$SecID' and
		SemNo='$Sem' and SubType='$op' and
		SubCode='$msub'";
	}
	else
	{
		$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
	
		//$conn = db_connect();
		$sql11 = "select SubName,SubTHour from CollegeSubject where
		AcadYNo='$MaxYear' and
		UniversityCode='$uncode1' and
		CollegeCode='$CollegeCode1' and
		DeptNo='$DeptNo' and
		AcadDegreeId='$AcadDeg' and
		ClassNo='$Classno' and
		SecID='$SecID' and
		SemNo='$Sem' and SubType='$op' and
		SubCode='$msub'";
	}

	$result11 = mysqli_query($mysqli,$sql11);
	if (mysqli_num_rows($result11))
	{
		$row11=mysqli_fetch_row($result11);
		$subname=$row11[0];
		$shour=$row11[1];

		// if we insert Subject on ManagingLec table we Must
		// Check the (actual no of hour)

		// check SubCode store on ManagingLec Table
		//display Header
		$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
		//$conn = db_connect();
		//Lecture
		if(($op==1)&&($s==1))
		{
			$asqls_query = "select count(SubCode) from ManagingLec where
			AcadYNo='$MaxYear' and
			UniversityCode='$uncode1' and
			CollegeCode='$CollegeCode1' and
			DeptNo='$DeptNo' and
			AcadDegreeId='$AcadDeg' and
			ClassNo='$Classno' and
			SecID='$SecID' and
			SemNo='$Sem' and
			SubCode='$msub' and
			SubType=1 and
			GId=0";
		}
		//Toturial
		else
		if(($op==1)&&($s==2))
		{
			$asqls_query = "select count(SubCode) from ManagingLec where
			AcadYNo='$MaxYear' and
			UniversityCode='$uncode1' and
			CollegeCode='$CollegeCode1' and
			DeptNo='$DeptNo' and
			AcadDegreeId='$AcadDeg' and
			ClassNo='$Classno' and
			SecID='$SecID' and
			SemNo='$Sem' and
			SubCode='$msub' and
			SubType=1 and
			GId='$GId'";
		}
		else
		//Lab
		if($op==2)
		{
			$asqls_query = "select count(SubCode) from ManagingLec where
			AcadYNo='$MaxYear' and
			UniversityCode='$uncode1' and
			CollegeCode='$CollegeCode1' and
			DeptNo='$DeptNo' and
			AcadDegreeId='$AcadDeg' and
			ClassNo='$Classno' and
			SecID='$SecID' and
			SemNo='$Sem' and
			SubCode='$msub' and
			SubType=2 and
			GId='$GId'";
		}

		$aresults=mysqli_query($mysqli,$asqls_query);

		$arows=mysqli_fetch_row($aresults);

		//if $arows==0 // not insert before

		if(($op==1)&&($s==2)||($op==2))
		{
			$GroupName=GetGroup($CollegeCode1,$uncode1,$DeptNo,$AcadDeg,$Sem,$Classno,$year,$GId,$SecID);
			$subname=$subname." - ".$GroupName;
		}
	

		if(($arows[0]/2)< $shour)
		{
				if($arows[0]==0)
				{
					$msg=$subname."&nbsp; >> &nbsp;"."&#1593;&#1583;&#1583; &#1575;&#1604;&#1587;&#1575;&#1593;&#1575;&#1578;: ".$shour;
					$_SESSION['subHour']=$shour;
				}
				else
				{
					$remender=$shour-($arows[0]/2);
					if($remender>0)
					{
						// session
						$_SESSION['subHour']=$remender;
						
						if($remender==0.5)
								$msg=$subname."&nbsp; >> &nbsp;"."&#1593;&#1583;&#1583; &#1575;&#1604;&#1587;&#1575;&#1593;&#1575;&#1578;[ &#1575;&#1604;&#1605;&#1578;&#1576;&#1602;&#1610;&#1577;] : ".$remender." -- &#1606;&#1589;&#1601; &#1587;&#1575;&#1593;&#1577; --";
						else
								$msg=$subname."&nbsp; >> &nbsp;"."&#1593;&#1583;&#1583; &#1575;&#1604;&#1587;&#1575;&#1593;&#1575;&#1578;[ &#1575;&#1604;&#1605;&#1578;&#1576;&#1602;&#1610;&#1577;] : ".$remender;
					}
				}
		}
		else
		if(($arows[0]/2)==$shour)
		{
				// this condition will occur when all Hours Inserted
				// session
				$_SESSION['subHour']=-1;	
					$msg=$subname."&nbsp; >> &nbsp;"."&#1593;&#1583;&#1583; &#1575;&#1604;&#1587;&#1575;&#1593;&#1575;&#1578;(&#1575;&#1604;&#1605;&#1583;&#1582;&#1604;&#1577;) : ".$shour;
		}


	?>
	<div align="center">
	<form action="" method="post">
	<table border="0" width="100%" id="table16">
	<tr>
	<?php
	//get College Start Time per Semester
		
	$slot=GetCollegeTimeSlot($uncode1,$CollegeCode1,$Sem,$year);
	if(strcmp($slot,"")!=0)
	{
		//prepare Table's Header
	
		$HeaderSlot=HeaderSubForm($uncode1,$CollegeCode1,$Sem,$year);
	?>	
   	<td>
   	<div align="center">
   	<table border="2" width="100%" bordercolorlight="#003366" bordercolordark="#003366" id="table17" bordercolor="#003366" cellspacing="4" cellpadding="4" dir="rtl">

		 	<tr>
		 	<td bordercolor="#003366" align="center" width="100%" height="29" bordercolorlight="#003366" bordercolordark="#003366" colspan="3">
		 	<p align="right" style="color:white; font-size:14pt; font-style:bold; font-family:Times New Roman">
				<?php
				//echo($subname."&nbsp; >> &nbsp;"."&#1593;&#1583;&#1583; &#1575;&#1604;&#1587;&#1575;&#1593;&#1575;&#1578; : ".$shour);
				echo($msg);
				?>
			</td>
			</tr>
			<tr>
		
		 		<td bordercolor="#003366" align="center" width="100%" height="40" bordercolorlight="#003366" bordercolordark="#003366" bgcolor="#5A74A0" colspan="3">
		 		<p align="right">
					<img border="0" id="img70" src="Colleges-PAGE/availableTime.jpg" height="30" width="150" alt="&#1575;&#1604;&#1575;&#1586;&#1605;&#1606;&#1577; &#1575;&#1604;&#1605;&#1578;&#1575;&#1581;&#1577;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1575;&#1604;&#1575;&#1586;&#1605;&#1606;&#1577; &#1575;&#1604;&#1605;&#1578;&#1575;&#1581;&#1577;">
					<font color="#FFFFFF"><b>
					<font face="Traditional Arabic">
					<span lang="ar-sa"><font size="4">&#1605;&#1604;&#1581;&#1608;&#1592;&#1577;: ( &#1575;&#1604;&#1575;&#1586;&#1605;&#1606;&#1577; &#1575;&#1604;&#1605;&#1608;&#1590;&#1581;&#1577; &#1575;&#1583;&#1606;&#1575;&#1607; 
					&#1578;&#1615;&#1578;&#1610;&#1581; &#1578;&#1582;&#1589;&#1610;&#1589; &#1580;&#1605;&#1610;&#1593; &#1575;&#1586;&#1605;&#1606;&#1577; &#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578; &#1604;&#1580;&#1605;&#1610;&#1593; &#1575;&#1604;&#1603;&#1604;&#1610;&#1575;&#1578;&#1548; &#1575;&#1609; &#1575;&#1604;&#1603;&#1604;&#1610;&#1575;&#1578; 
					&#1575;&#1604;&#1578;&#1609; &#1578;&#1576;&#1583;&#1571; &#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578; &#1576;&#1607;&#1575; &#1605;&#1606; &#1575;&#1604;&#1587;&#1575;&#1593;&#1577; 
					</font> </span></font>
					</b></font><font size="4">
					<font face="Times New Roman" color="#FFFF00"><span lang="en-us"><b>7:30</b></span></font><font color="#FFFFFF"><b><font face="Traditional Arabic"> 
					&#1608;&#1575;&#1610;&#1590;&#1575; &#1575;&#1604;&#1578;&#1609; &#1578;&#1576;&#1583;&#1571; &#1605;&#1606; &#1575;&#1604;&#1587;&#1575;&#1593;&#1577; </font>
					</b></font></font><font face="Times New Roman">
					<font color="#FFFF00" size="4"><span lang="en-us"><b>8:00</b></span></font><font color="#FFFFFF"><b><font size="4">)
					</font></b></font>
				</td>
			</tr>
		
		<!--Display The Standard Time 7:30-8 (per half-Hour) etc.. -->
		<tr>
		 	<td bordercolor="#003366" align="center" width="100%" height="20" bordercolorlight="#003366" bordercolordark="#003366" colspan="3">
		 	<table border="2" width="100%" id="table18" dir="rtl" bordercolorlight="#003366" bordercolordark="#003366">
			<tr>
		 	<td bordercolor="#003366" align="center" width="4%" height="27" bordercolorlight="#003366" bordercolordark="#003366" bgcolor="#5A74A0" dir="ltr">
		 	<font color="#FFFFFF" size="2" face="Time New Roman"><b><span dir="rtl"><?php echo($HeaderSlot[0]);?></span></b></font></td>
		 
			<td bordercolor="#003366" align="center" width="4%" height="27" bordercolorlight="#003366" bordercolordark="#003366" bgcolor="#5A74A0" dir="ltr">
		 	<font color="#FFFFFF" size="2" face="Time New Roman"><b><span dir="rtl"><?php echo($HeaderSlot[1]);?></span></b></font></td>
		 
			<td bordercolor="#003366" align="center" width="4%" height="27" bordercolorlight="#003366" bordercolordark="#003366" bgcolor="#5A74A0" dir="ltr">
		 	<font color="#FFFFFF" size="2" face="Time New Roman"><b><span dir="rtl"><?php echo($HeaderSlot[2]);?></span></b></font></td>
		 
			<td bordercolor="#003366" align="center" width="4%" height="27" bordercolorlight="#003366" bordercolordark="#003366" bgcolor="#5A74A0" dir="ltr">
		 	<font color="#FFFFFF" size="2" face="Time New Roman"><b><span dir="rtl"><?php echo($HeaderSlot[3]);?></span></b></font></td>
		 
			<td bordercolor="#003366" align="center" width="4%" height="27" bordercolorlight="#003366" bordercolordark="#003366" bgcolor="#5A74A0" dir="ltr">
		 	<font color="#FFFFFF" size="2" face="Time New Roman"><b><span dir="rtl"><?php echo($HeaderSlot[4]);?></span></b></font></td>
		 	
		 	<td bordercolor="#003366" align="center" width="4%" height="27" bordercolorlight="#003366" bordercolordark="#003366" bgcolor="#5A74A0" dir="ltr">
			<font color="#FFFFFF" size="2" face="Time New Roman"><b><span dir="rtl"><?php echo($HeaderSlot[5]);?></span></b></font></td>

		 	<td bordercolor="#003366" align="center" width="4%" height="27" bordercolorlight="#003366" bordercolordark="#003366" bgcolor="#5A74A0" dir="ltr">
		 	<font color="#FFFFFF" size="2" face="Time New Roman"><b><span dir="rtl"><?php echo($HeaderSlot[6]);?></span></b></font></td>
		 	
		 	<td bordercolor="#003366" align="center" width="4%" height="27" bordercolorlight="#003366" bordercolordark="#003366" bgcolor="#5A74A0" dir="ltr">
		 	<font color="#FFFFFF" size="2" face="Time New Roman"><b><span dir="rtl"><?php echo($HeaderSlot[7]);?></span></b></font></td>
		 
		 	<td bordercolor="#003366" align="center" width="4%" height="27" bordercolorlight="#003366" bordercolordark="#003366" bgcolor="#5A74A0" dir="ltr">
		 	<font color="#FFFFFF" size="2" face="Time New Roman"><b><span dir="rtl"><?php echo($HeaderSlot[8]);?></span></b></font></td>
		 	
		 	<td bordercolor="#003366" align="center" width="4%" height="27" bordercolorlight="#003366" bordercolordark="#003366" bgcolor="#5A74A0" dir="ltr">
		 	<font color="#FFFFFF" size="2" face="Time New Roman"><b><span dir="rtl"><?php echo($HeaderSlot[9]);?></span></b></font></td>
		 	
		 	<td bordercolor="#003366" align="center" width="4%" height="27" bordercolorlight="#003366" bordercolordark="#003366" bgcolor="#5A74A0" dir="ltr">
		 	<font color="#FFFFFF" size="2" face="Time New Roman"><b><span dir="rtl"><?php echo($HeaderSlot[10]);?></span></b></font></td>
		 	
		 	<td bordercolor="#003366" align="center" width="4%" height="27" bordercolorlight="#003366" bordercolordark="#003366" bgcolor="#5A74A0" dir="ltr">
		 		<font color="#FFFFFF" size="2" face="Time New Roman"><b><span dir="rtl"><?php echo($HeaderSlot[11]);?></span></b></font><font size="2">
				</font>
		 	</td>
		
			<td bordercolor="#003366" align="center" width="4%" height="27" bordercolorlight="#003366" bordercolordark="#003366" bgcolor="#5A74A0" dir="ltr">
		 		<font color="#FFFFFF" size="2" face="Time New Roman"><b><span dir="rtl"><?php echo($HeaderSlot[12]);?></span></b></font><font size="2">
				</font>
		 	</td>
		 	
		 	<td bordercolor="#003366" align="center" width="4%" height="27" bordercolorlight="#003366" bordercolordark="#003366" bgcolor="#5A74A0" dir="ltr">
		 		<font color="#FFFFFF" size="2" face="Time New Roman"><b><span dir="rtl"><?php echo($HeaderSlot[13]);?></span></b></font><font size="2">
				</font>
		 	</td>
		 	
		 	<td bordercolor="#003366" align="center" width="4%" height="27" bordercolorlight="#003366" bordercolordark="#003366" bgcolor="#5A74A0" dir="ltr">
		 		<font color="#FFFFFF" size="2" face="Time New Roman"><b><span dir="rtl"><?php echo($HeaderSlot[14]);?></span></b></font><font size="2">
				</font>
		 	</td>

			<td bordercolor="#003366" align="center" width="4%" height="27" bordercolorlight="#003366" bordercolordark="#003366" bgcolor="#5A74A0" dir="ltr">
		 		<font color="#FFFFFF" size="2" face="Time New Roman"><b><span dir="rtl"><?php echo($HeaderSlot[15]);?></span></b></font><font size="2">
				</font>
		 	</td>

			<td bordercolor="#003366" align="center" width="4%" height="27" bordercolorlight="#003366" bordercolordark="#003366" bgcolor="#5A74A0" dir="ltr">
		 		<font color="#FFFFFF" size="2" face="Time New Roman"><b><span dir="rtl"><?php echo($HeaderSlot[16]);?></span></b></font><font size="2">
				</font>
		 	</td>

			<td bordercolor="#003366" align="center" width="4%" height="27" bordercolorlight="#003366" bordercolordark="#003366" bgcolor="#5A74A0" dir="ltr">
		 		<font color="#FFFFFF" size="2" face="Time New Roman"><b><span dir="rtl"><?php echo($HeaderSlot[17]);?></span></b></font><font size="2">
				</font>
		 	</td>
		 	
		 	<td bordercolor="#003366" align="center" width="4%" height="27" bordercolorlight="#003366" bordercolordark="#003366" bgcolor="#5A74A0" dir="ltr">
		 		<font color="#FFFFFF" size="2" face="Time New Roman"><b><span dir="rtl"><?php echo($HeaderSlot[18]);?></span></b></font><font size="2">
				</font>
		 	</td>
			
			<td bordercolor="#003366" align="center" width="4%" height="27" bordercolorlight="#003366" bordercolordark="#003366" bgcolor="#5A74A0" dir="ltr">
		 		<font color="#FFFFFF" size="2" face="Time New Roman"><b><span dir="rtl"><?php echo($HeaderSlot[19]);?></span></b></font><font size="2">
				</font>
		 	</td>

			<td bordercolor="#003366" align="center" width="4%" height="27" bordercolorlight="#003366" bordercolordark="#003366" bgcolor="#5A74A0" dir="ltr">
		 		<font color="#FFFFFF" size="2" face="Time New Roman"><b><span dir="rtl"><?php echo($HeaderSlot[20]);?></span></b></font><font size="2">
				</font>
		 	</td>
			
			<td bordercolor="#003366" align="center" width="4%" height="27" bordercolorlight="#003366" bordercolordark="#003366" bgcolor="#5A74A0" dir="ltr">
		 		<font color="#FFFFFF" size="2" face="Time New Roman"><b><span dir="rtl"><?php echo($HeaderSlot[21]);?></span></b></font><font size="2">
				</font>
		 	</td>
			
			<td bordercolor="#003366" align="center" width="4%" height="27" bordercolorlight="#003366" bordercolordark="#003366" bgcolor="#5A74A0" dir="ltr">
		 		<font color="#FFFFFF" size="2" face="Time New Roman"><b><span dir="rtl"><?php echo($HeaderSlot[22]);?></span></b></font><font size="2">
				</font>
		 	</td>
			
			<td bordercolor="#003366" align="center" width="4%" height="27" bordercolorlight="#003366" bordercolordark="#003366" bgcolor="#5A74A0" dir="ltr">
		 		<font color="#FFFFFF" size="2" face="Time New Roman"><b><span dir="rtl"><?php echo($HeaderSlot[23]);?></span></b></font><font size="2">
				</font>
		 	</td>
		 	
		</tr>
		<tr>
		 	<td bordercolor="#003366" align="center" width="4%" height="28" bordercolorlight="#003366" bordercolordark="#003366" dir="rtl">
		 	<?php
		 	$avTime=$slot[0];
		 	$status1="";
		 	$display1="";
			//$BId=CheckSubjectType($year,$mday,$avTime,$LectureName,$Sem);
			$BId=$op;
			
		 		if ( (!CheckTime2($BId,$year,$LectureName,$mday,$avTime,$GId,$uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem,$op,$msub,$mteach,$SecID)) || (!CheckTeacher($uncode1,$CollegeCode1,$year,$mday,$mteach,$avTime,$Sem)) )
		 	 {
		 		 	$status1='disabled';
		 		 	//check the type of Subject[lecture]||[lab]

		 		 	if($BId==1)
		 		 	{
		 		 		$color1='#FF0000'; //red:Lecture
		 		 	}
		 		 	else
		 		 	if($BId==2)
					{
						$color1='orange'; //green:Lab
		 		 	}
		 		 	$display1=1;


		 		}

		 		?>
		 	
		 		 <input type="checkbox" name="C1" value="ON" tabindex="1"  <?php echo($status1);?> style="background-color:<?php echo($color1);?>" <?php if($_POST['C1']) { echo('checked');}?>>
		 	
		 		<div align="center">
		 			<?php
		 			if($display1==1)
		 			{
		 			?>
		 				<a onclick="window.open('showDetail.php?BId=<?php echo($op);?>&year=<?php echo($year);?>&LN=<?php echo($LectureName);?>&mday=<?php echo($mday);?>&avt=<?php echo($avTime);?>&sem=<?php echo($Sem);?>&curteach=<?php echo($mteach);?>&uncode=<?php echo($uncode1);?>&Coll=<?php echo($CollegeCode1);?>&DeptNo=<?php echo($DeptNo);?>&AcadDeg=<?php echo($AcadDeg);?>&Classno=<?php echo($Classno);?>&SecID=<?php echo($SecID);?>&GId=<?php echo($GId);?>',false,'scrollbars=yes');">
						<img border="0" src="Background/update.gif" width="15" height="15" align="right" alt="&#1578;&#1601;&#1575;&#1589;&#1610;&#1604; &#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578; &#1576;&#1607;&#1584;&#1575;&#1575;&#1604;&#1586;&#1605;&#1606;">
					</a>
					<?php
					}
					else
						echo("&nbsp;");
					?>
		 		</div>
		 	</td>
		 	<td bordercolor="#003366" align="center" width="4%" height="28" bordercolorlight="#003366" bordercolordark="#003366" dir="rtl">
		 	<?php
		 		$avTime=$slot[1];
				$status2="";
				$display2="";

				//check the type of Subject[lecture]||[lab]
					//$BId=CheckSubjectType($year,$mday,$avTime,$LectureName,$Sem);
					$BId=$op;

				if ((!CheckTime2($BId,$year,$LectureName,$mday,$avTime,$GId,$uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem,$op,$msub,$mteach,$SecID) || !CheckTeacher($uncode1,$CollegeCode1,$year,$mday,$mteach,$avTime,$Sem)))
		 		//||(!Checkdept($uncode1,$CollegeCode1,$AcadDeg,$DeptNo,$Classno,$Sem,$year,$mday,$avTime)))
				{
					$status2='disabled';

					if($BId==1)
		 		 	{
		 		 		$color2='#FF0000'; //red:Lecture
		 		 	}
		 		 	else
		 		 	if($BId==2)
					{
						$color2='orange'; //green:Lab
		 		 	}
		 		 	$display2=1;


				}
			?>
		 		<input type="checkbox" name="C2" value="ON" tabindex="2"  <?php echo($status2);?> style="background-color:<?php echo($color2);?>" <?php if($_POST['C2']) { echo('checked');}?>>
		 	<div align="center">
		 			<?php
		 			if($display2==1)
		 			{
		 			?>
		 				<a onclick="window.open('showDetail.php?BId=<?php echo($op);?>&year=<?php echo($year);?>&LN=<?php echo($LectureName);?>&mday=<?php echo($mday);?>&avt=<?php echo($avTime);?>&sem=<?php echo($Sem);?>&curteach=<?php echo($mteach);?>&uncode=<?php echo($uncode1);?>&Coll=<?php echo($CollegeCode1);?>&DeptNo=<?php echo($DeptNo);?>&AcadDeg=<?php echo($AcadDeg);?>&Classno=<?php echo($Classno);?>&SecID=<?php echo($SecID);?>&GId=<?php echo($GId);?>',false,'scrollbars=yes');">
						<img border="0" src="Background/update.gif" width="15" height="15" align="right" alt="&#1578;&#1601;&#1575;&#1589;&#1610;&#1604; &#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578; &#1576;&#1607;&#1584;&#1575;&#1575;&#1604;&#1586;&#1605;&#1606;">
					</a>
					<?php
					}
					else
						echo("&nbsp;");
					?>
		 		</div>

		 	</td>
		 	<td bordercolor="#003366" align="center" width="4%" height="28" bordercolorlight="#003366" bordercolordark="#003366" dir="rtl">
			<?php
				$avTime=$slot[2];

				$status3="";
				$display3="";

				//check the type of Subject[lecture]||[lab]
				//$BId=CheckSubjectType($year,$mday,$avTime,$LectureName,$Sem);
				$BId=$op;

				if ((!CheckTime2($BId,$year,$LectureName,$mday,$avTime,$GId,$uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem,$op,$msub,$mteach,$SecID) || !CheckTeacher($uncode1,$CollegeCode1,$year,$mday,$mteach,$avTime,$Sem)))
		 		
		 		{
					$status3='disabled';
					//check the type of Subject[lecture]||[lab]

					if($BId==1)
		 		 	{
		 		 		$color3='#FF0000'; //red:Lecture
		 		 	}
		 		 	else
		 		 	if($BId==2)
					{
						$color3='orange'; //green:Lab
		 		 	}

		 		 	$display3=1;
				}
			?>
		 		<input type="checkbox" name="C3" value="ON" tabindex="3" <?php echo($status3);?> style="background-color:<?php echo($color3);?>" <?php if($_POST['C3']) { echo('checked');}?> >
		 	<div align="center">
		 			<?php
		 			if($display3==1)
		 			{
		 			?>
		 				<a onclick="window.open('showDetail.php?BId=<?php echo($op);?>&year=<?php echo($year);?>&LN=<?php echo($LectureName);?>&mday=<?php echo($mday);?>&avt=<?php echo($avTime);?>&sem=<?php echo($Sem);?>&curteach=<?php echo($mteach);?>&uncode=<?php echo($uncode1);?>&Coll=<?php echo($CollegeCode1);?>&DeptNo=<?php echo($DeptNo);?>&AcadDeg=<?php echo($AcadDeg);?>&Classno=<?php echo($Classno);?>&SecID=<?php echo($SecID);?>&GId=<?php echo($GId);?>',false,'scrollbars=yes');">
							<img border="0" src="Background/update.gif" width="15" height="15" align="right" alt="&#1578;&#1601;&#1575;&#1589;&#1610;&#1604; &#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578; &#1576;&#1607;&#1584;&#1575;&#1575;&#1604;&#1586;&#1605;&#1606;">
					</a>
					<?php
					}
					else
						echo("&nbsp;");
					?>
		 		</div>

		 	</td>
		 	
		 	<td bordercolor="#003366" align="center" width="4%" height="28" bordercolorlight="#003366" bordercolordark="#003366" dir="rtl">
			<?php
				$avTime=$slot[3];
				$status4="";
				$display4="";

				//check the type of Subject[lecture]||[lab]
				//$BId=CheckSubjectType($year,$mday,$avTime,$LectureName,$Sem);
				$BId=$op;

					if ((!CheckTime2($BId,$year,$LectureName,$mday,$avTime,$GId,$uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem,$op,$msub,$mteach,$SecID) || !CheckTeacher($uncode1,$CollegeCode1,$year,$mday,$mteach,$avTime,$Sem)))
				{
					$status4='disabled';

					//check the type of Subject[lecture]||[lab]

		 		 	if($BId==1)
		 		 	{
		 		 		$color4='#FF0000'; //red:Lecture
		 		 	}
		 		 	else
		 		 	if($BId==2)
					{
						$color4='orange'; //green:Lab
		 		 	}
		 		 	$display4=1;
				}
			?>
		 		<input type="checkbox" name="C4" value="ON" tabindex="4"  <?php echo($status4);?> style="background-color:<?php echo($color4);?>" <?php if($_POST['C4']) { echo('checked');}?>>
		 	<div align="center">
		 			<?php
		 			if($display4==1)
		 			{
		 			?>
		 				<a onclick="window.open('showDetail.php?BId=<?php echo($op);?>&year=<?php echo($year);?>&LN=<?php echo($LectureName);?>&mday=<?php echo($mday);?>&avt=<?php echo($avTime);?>&sem=<?php echo($Sem);?>&curteach=<?php echo($mteach);?>&uncode=<?php echo($uncode1);?>&Coll=<?php echo($CollegeCode1);?>&DeptNo=<?php echo($DeptNo);?>&AcadDeg=<?php echo($AcadDeg);?>&Classno=<?php echo($Classno);?>&SecID=<?php echo($SecID);?>&GId=<?php echo($GId);?>',false,'scrollbars=yes');">
							<img border="0" src="Background/update.gif" width="15" height="15" align="right" alt="&#1578;&#1601;&#1575;&#1589;&#1610;&#1604; &#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578; &#1576;&#1607;&#1584;&#1575;&#1575;&#1604;&#1586;&#1605;&#1606;">
					</a>
					<?php
					}
					else
						echo("&nbsp;");

					?>
		 		</div>

		 	</td>
		 	<td bordercolor="#003366" align="center" width="4%" height="28" bordercolorlight="#003366" bordercolordark="#003366" dir="rtl">
			<?php
				$avTime=$slot[4];
				$status5="";
				$display5="";
				//check the type of Subject[lecture]||[lab]
				//$BId=CheckSubjectType($year,$mday,$avTime,$LectureName,$Sem);
				$BId=$op;

				if ((!CheckTime2($BId,$year,$LectureName,$mday,$avTime,$GId,$uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem,$op,$msub,$mteach,$SecID) || !CheckTeacher($uncode1,$CollegeCode1,$year,$mday,$mteach,$avTime,$Sem)))
				{
					$status5='disabled';

					if($BId==1)
		 		 	{
		 		 		$color5='#FF0000'; //red:Lecture
		 		 	}
		 		 	else
		 		 	if($BId==2)
					{
						$color5='orange'; //green:Lab
		 		 	}
		 		 	$display5=1;
				}
			?>
		 		<input type="checkbox" name="C5" value="ON" tabindex="5"  <?php echo($status5);?> style="background-color:<?php echo($color5);?>" <?php if($_POST['C5']) { echo('checked');}?>>
		 	<div align="center">
		 			<?php
		 			if($display5==1)
		 			{
		 			?>
		 				<a onclick="window.open('showDetail.php?BId=<?php echo($op);?>&year=<?php echo($year);?>&LN=<?php echo($LectureName);?>&mday=<?php echo($mday);?>&avt=<?php echo($avTime);?>&sem=<?php echo($Sem);?>&curteach=<?php echo($mteach);?>&uncode=<?php echo($uncode1);?>&Coll=<?php echo($CollegeCode1);?>&DeptNo=<?php echo($DeptNo);?>&AcadDeg=<?php echo($AcadDeg);?>&Classno=<?php echo($Classno);?>&SecID=<?php echo($SecID);?>&GId=<?php echo($GId);?>',false,'scrollbars=yes');">
							<img border="0" src="Background/update.gif" width="15" height="15" align="right" alt="&#1578;&#1601;&#1575;&#1589;&#1610;&#1604; &#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578; &#1576;&#1607;&#1584;&#1575;&#1575;&#1604;&#1586;&#1605;&#1606;">
					</a>
					<?php
					}
					else
						echo("&nbsp;");

					?>
		 		</div>
		 	</td>
		 	<td bordercolor="#003366" align="center" width="4%" height="28" bordercolorlight="#003366" bordercolordark="#003366" dir="rtl">
			<?php
				$avTime=$slot[5];
				$status6="";
				$display6="";

				//check the type of Subject[lecture]||[lab]
				//$BId=CheckSubjectType($year,$mday,$avTime,$LectureName,$Sem);
				$BId=$op;

					if ((!CheckTime2($BId,$year,$LectureName,$mday,$avTime,$GId,$uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem,$op,$msub,$mteach,$SecID) || !CheckTeacher($uncode1,$CollegeCode1,$year,$mday,$mteach,$avTime,$Sem)))
				{
					$status6='disabled';

					if($BId==1)
		 		 	{
		 		 		$color6='#FF0000'; //red:Lecture
		 		 	}
		 		 	else
		 		 	if($BId==2)
					{
						$color6='orange'; //green:Lab
		 		 	}
		 		 	$display6=1;
				}
			?>
		 		<input type="checkbox" name="C6" value="ON" tabindex="6"  <?php echo($status6);?> style="background-color:<?php echo($color6);?>" <?php if($_POST['C6']) { echo('checked');}?>>
		 	<div align="center">
		 			<?php
		 			if($display6==1)
		 			{
		 			?>
							<a onclick="window.open('showDetail.php?BId=<?php echo($op);?>&year=<?php echo($year);?>&LN=<?php echo($LectureName);?>&mday=<?php echo($mday);?>&avt=<?php echo($avTime);?>&sem=<?php echo($Sem);?>&curteach=<?php echo($mteach);?>&uncode=<?php echo($uncode1);?>&Coll=<?php echo($CollegeCode1);?>&DeptNo=<?php echo($DeptNo);?>&AcadDeg=<?php echo($AcadDeg);?>&Classno=<?php echo($Classno);?>&SecID=<?php echo($SecID);?>&GId=<?php echo($GId);?>',false,'scrollbars=yes');">
								<img border="0" src="Background/update.gif" width="15" height="15" align="right" alt="&#1578;&#1601;&#1575;&#1589;&#1610;&#1604; &#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578; &#1576;&#1607;&#1584;&#1575;&#1575;&#1604;&#1586;&#1605;&#1606;">
						</a>
					<?php
					}
					else
						echo("&nbsp;");

					?>
		 		</div>

		 	</td>
		 	
		 	<td bordercolor="#003366" align="center" width="4%" height="28" bordercolorlight="#003366" bordercolordark="#003366" dir="rtl">
			<?php
				$avTime=$slot[6];
				$status7="";
				$display7="";

				//check the type of Subject[lecture]||[lab]
				//$BId=CheckSubjectType($year,$mday,$avTime,$LectureName,$Sem);
				$BId=$op;

					if ((!CheckTime2($BId,$year,$LectureName,$mday,$avTime,$GId,$uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem,$op,$msub,$mteach,$SecID) || !CheckTeacher($uncode1,$CollegeCode1,$year,$mday,$mteach,$avTime,$Sem)))
				{
					$status7='disabled';

					if($BId==1)
		 		 	{
		 		 		$color7='#FF0000'; //red:Lecture
		 		 	}
		 		 	else
		 		 	if($BId==2)
					{
						$color7='orange'; //green:Lab
		 		 	}
		 		 	$display7=1;
				}
			?>

		 		<input type="checkbox" name="C7" value="ON" tabindex="7"  <?php echo($status7);?> style="background-color:<?php echo($color7);?>" <?php if($_POST['C7']) { echo('checked');}?>>
		 	<div align="center">
		 			<?php
		 			if($display7==1)
		 			{
		 			?>
		 				<a onclick="window.open('showDetail.php?BId=<?php echo($op);?>&year=<?php echo($year);?>&LN=<?php echo($LectureName);?>&mday=<?php echo($mday);?>&avt=<?php echo($avTime);?>&sem=<?php echo($Sem);?>&curteach=<?php echo($mteach);?>&uncode=<?php echo($uncode1);?>&Coll=<?php echo($CollegeCode1);?>&DeptNo=<?php echo($DeptNo);?>&AcadDeg=<?php echo($AcadDeg);?>&Classno=<?php echo($Classno);?>&SecID=<?php echo($SecID);?>&GId=<?php echo($GId);?>',false,'scrollbars=yes');">
							<img border="0" src="Background/update.gif" width="15" height="15" align="right" alt="&#1578;&#1601;&#1575;&#1589;&#1610;&#1604; &#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578; &#1576;&#1607;&#1584;&#1575;&#1575;&#1604;&#1586;&#1605;&#1606;">
					</a>
					<?php
					}
					else
						echo("&nbsp;");
					?>
		 		</div>

		 	</td>
		 	<td bordercolor="#003366" align="center" width="4%" height="28" bordercolorlight="#003366" bordercolordark="#003366" dir="rtl">
			<?php
				$avTime=$slot[7];
				$status8="";
				$display8="";

				//check the type of Subject[lecture]||[lab]
				//$BId=CheckSubjectType($year,$mday,$avTime,$LectureName,$Sem);
				$BId=$op;

					if ((!CheckTime2($BId,$year,$LectureName,$mday,$avTime,$GId,$uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem,$op,$msub,$mteach,$SecID) || !CheckTeacher($uncode1,$CollegeCode1,$year,$mday,$mteach,$avTime,$Sem)))
				{
					$status8='disabled';
					if($BId==1)
		 		 	{
		 		 		$color8='#FF0000'; //red:Lecture
		 		 	}
		 		 	else
		 		 	if($BId==2)
					{
						$color8='orange'; //green:Lab
		 		 	}
		 		 	$display8=1;
				}
			?>
		 		<input type="checkbox" name="C8" value="ON" tabindex="8"  <?php echo($status8);?> style="background-color:<?php echo($color8);?>" <?php if($_POST['C8']) { echo('checked');}?>>
		 	<div align="center">
		 			<?php
		 			if($display8==1)
		 			{
		 			?>
		 					<a onclick="window.open('showDetail.php?BId=<?php echo($op);?>&year=<?php echo($year);?>&LN=<?php echo($LectureName);?>&mday=<?php echo($mday);?>&avt=<?php echo($avTime);?>&sem=<?php echo($Sem);?>&curteach=<?php echo($mteach);?>&uncode=<?php echo($uncode1);?>&Coll=<?php echo($CollegeCode1);?>&DeptNo=<?php echo($DeptNo);?>&AcadDeg=<?php echo($AcadDeg);?>&Classno=<?php echo($Classno);?>&SecID=<?php echo($SecID);?>&GId=<?php echo($GId);?>',false,'scrollbars=yes');">
								<img border="0" src="Background/update.gif" width="15" height="15" align="right" alt="&#1578;&#1601;&#1575;&#1589;&#1610;&#1604; &#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578; &#1576;&#1607;&#1584;&#1575;&#1575;&#1604;&#1586;&#1605;&#1606;">
						</a>
					<?php
					}
					else
						echo("&nbsp;");
					?>
		 		</div>

		 	</td>
		 	<td bordercolor="#003366" align="center" width="4%" height="28" bordercolorlight="#003366" bordercolordark="#003366" dir="rtl">
			<?php
				$avTime=$slot[8];
				$status9="";
				$display9="";

				//check the type of Subject[lecture]||[lab]
				//$BId=CheckSubjectType($year,$mday,$avTime,$LectureName,$Sem);
				$BId=$op;

					if ((!CheckTime2($BId,$year,$LectureName,$mday,$avTime,$GId,$uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem,$op,$msub,$mteach,$SecID) || !CheckTeacher($uncode1,$CollegeCode1,$year,$mday,$mteach,$avTime,$Sem)))
				{
					$status9='disabled';

		 		 	if($BId==1)
		 		 	{
		 		 		$color9='#FF0000'; //red:Lecture
		 		 	}
		 		 	else
		 		 	if($BId==2)
					{
						$color9='orange'; //green:Lab
		 		 	}
		 		 	$display9=1;
				}
			?>
		 		<input type="checkbox" name="C9" value="ON" tabindex="9"  <?php echo($status9);?> style="background-color:<?php echo($color9);?>" <?php if($_POST['C9']) { echo('checked');}?>>
		 	<div align="center">
		 			<?php
		 			if($display9==1)
		 			{
		 			?>
		 				<a onclick="window.open('showDetail.php?BId=<?php echo($op);?>&year=<?php echo($year);?>&LN=<?php echo($LectureName);?>&mday=<?php echo($mday);?>&avt=<?php echo($avTime);?>&sem=<?php echo($Sem);?>&curteach=<?php echo($mteach);?>&uncode=<?php echo($uncode1);?>&Coll=<?php echo($CollegeCode1);?>&DeptNo=<?php echo($DeptNo);?>&AcadDeg=<?php echo($AcadDeg);?>&Classno=<?php echo($Classno);?>&SecID=<?php echo($SecID);?>&GId=<?php echo($GId);?>',false,'scrollbars=yes');">
							<img border="0" src="Background/update.gif" width="15" height="15" align="right" alt="&#1578;&#1601;&#1575;&#1589;&#1610;&#1604; &#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578; &#1576;&#1607;&#1584;&#1575;&#1575;&#1604;&#1586;&#1605;&#1606;">
					</a>
					<?php
					}
					else
						echo("&nbsp;");
					?>
		 		</div>

		 	</td>
		 	<td bordercolor="#003366" align="center" width="4%" height="28" bordercolorlight="#003366" bordercolordark="#003366" dir="rtl">
			<?php
				$avTime=$slot[9];
				$status10="";
				$display10="";

				//check the type of Subject[lecture]||[lab]
				//$BId=CheckSubjectType($year,$mday,$avTime,$LectureName,$Sem);
				$BId=$op;

					if ((!CheckTime2($BId,$year,$LectureName,$mday,$avTime,$GId,$uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem,$op,$msub,$mteach,$SecID) || !CheckTeacher($uncode1,$CollegeCode1,$year,$mday,$mteach,$avTime,$Sem)))
				{
					$status10='disabled';

		 		 	if($BId==1)
		 		 	{
		 		 		$color10='#FF0000'; //red:Lecture
		 		 	}
		 		 	else
		 		 	if($BId==2)
					{
						$color10='orange'; //green:Lab
		 		 	}
		 		 	$display10=1;
				}
			?>
		 		<input type="checkbox" name="C10" value="ON" tabindex="10"  <?php echo($status10);?> style="background-color:<?php echo($color10);?>" <?php if($_POST['C10']) { echo('checked');}?>>
		 	<div align="center">
		 			<?php
		 			if($display10==1)
		 			{
		 			?>
		 				<a onclick="window.open('showDetail.php?BId=<?php echo($op);?>&year=<?php echo($year);?>&LN=<?php echo($LectureName);?>&mday=<?php echo($mday);?>&avt=<?php echo($avTime);?>&sem=<?php echo($Sem);?>&curteach=<?php echo($mteach);?>&uncode=<?php echo($uncode1);?>&Coll=<?php echo($CollegeCode1);?>&DeptNo=<?php echo($DeptNo);?>&AcadDeg=<?php echo($AcadDeg);?>&Classno=<?php echo($Classno);?>&SecID=<?php echo($SecID);?>&GId=<?php echo($GId);?>',false,'scrollbars=yes');">
							<img border="0" src="Background/update.gif" width="15" height="15" align="right" alt="&#1578;&#1601;&#1575;&#1589;&#1610;&#1604; &#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578; &#1576;&#1607;&#1584;&#1575;&#1575;&#1604;&#1586;&#1605;&#1606;">
					</a>
					<?php
					}
					else
						echo("&nbsp;");

					?>
		 		</div>
		 	</td>
		 	
		 	<td bordercolor="#003366" align="center" width="4%" height="28" bordercolorlight="#003366" bordercolordark="#003366" dir="rtl">
			<?php
				$avTime=$slot[10];
				$status11="";
				$display11="";

				//check the type of Subject[lecture]||[lab]
				//$BId=CheckSubjectType($year,$mday,$avTime,$LectureName,$Sem);
				$BId=$op;

					if ((!CheckTime2($BId,$year,$LectureName,$mday,$avTime,$GId,$uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem,$op,$msub,$mteach,$SecID) || !CheckTeacher($uncode1,$CollegeCode1,$year,$mday,$mteach,$avTime,$Sem)))
				{
					$status11='disabled';

		 		 	if($BId==1)
		 		 	{
		 		 		$color11='#FF0000'; //red:Lecture
		 		 	}
		 		 	else
		 		 	if($BId==2)
					{
						$color11='orange'; //green:Lab
		 		 	}
		 		 	$display11=1;
				}
			?>
		 		<input type="checkbox" name="C11" value="ON" tabindex="11"  <?php echo($status11);?> style="background-color:<?php echo($color11);?>" <?php if($_POST['C11']) { echo('checked');}?>>
		 	<div align="center">
		 			<?php
		 			if($display11==1)
		 			{
		 			?>
		 				<a onclick="window.open('showDetail.php?BId=<?php echo($op);?>&year=<?php echo($year);?>&LN=<?php echo($LectureName);?>&mday=<?php echo($mday);?>&avt=<?php echo($avTime);?>&sem=<?php echo($Sem);?>&curteach=<?php echo($mteach);?>&uncode=<?php echo($uncode1);?>&Coll=<?php echo($CollegeCode1);?>&DeptNo=<?php echo($DeptNo);?>&AcadDeg=<?php echo($AcadDeg);?>&Classno=<?php echo($Classno);?>&SecID=<?php echo($SecID);?>&GId=<?php echo($GId);?>',false,'scrollbars=yes');">
							<img border="0" src="Background/update.gif" width="15" height="15" align="right" alt="&#1578;&#1601;&#1575;&#1589;&#1610;&#1604; &#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578; &#1576;&#1607;&#1584;&#1575;&#1575;&#1604;&#1586;&#1605;&#1606;">
					</a>
					<?php
					}
					else
						echo("&nbsp;");

					?>
		 		</div>

		 	</td>
		 	
		 	<td bordercolor="#003366" align="center" width="4%" height="28" bordercolorlight="#003366" bordercolordark="#003366" dir="rtl">
			<?php
				$avTime=$slot[11];
				$status12="";
				$display12="";

				//check the type of Subject[lecture]||[lab]
				//$BId=CheckSubjectType($year,$mday,$avTime,$LectureName,$Sem);
				$BId=$op;

					if ((!CheckTime2($BId,$year,$LectureName,$mday,$avTime,$GId,$uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem,$op,$msub,$mteach,$SecID) || !CheckTeacher($uncode1,$CollegeCode1,$year,$mday,$mteach,$avTime,$Sem)))
				{
					$status12='disabled';

		 		 	if($BId==1)
		 		 	{
		 		 		$color12='#FF0000'; //red:Lecture
		 		 	}
		 		 	else
		 		 	if($BId==2)
					{
						$color12='orange'; //green:Lab
		 		 	}
		 		 	$display12=1;
				}
			?>
		 		<input type="checkbox" name="C12" value="ON" tabindex="12"  <?php echo($status12);?> style="background-color:<?php echo($color12);?>" <?php if($_POST['C12']) { echo('checked');}?>>
		 	<div align="center">
		 			<?php
		 			if($display12==1)
		 			{
		 			?>
		 				<a onclick="window.open('showDetail.php?BId=<?php echo($op);?>&year=<?php echo($year);?>&LN=<?php echo($LectureName);?>&mday=<?php echo($mday);?>&avt=<?php echo($avTime);?>&sem=<?php echo($Sem);?>&curteach=<?php echo($mteach);?>&uncode=<?php echo($uncode1);?>&Coll=<?php echo($CollegeCode1);?>&DeptNo=<?php echo($DeptNo);?>&AcadDeg=<?php echo($AcadDeg);?>&Classno=<?php echo($Classno);?>&SecID=<?php echo($SecID);?>&GId=<?php echo($GId);?>',false,'scrollbars=yes');">
							<img border="0" src="Background/update.gif" width="15" height="15" align="right" alt="&#1578;&#1601;&#1575;&#1589;&#1610;&#1604; &#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578; &#1576;&#1607;&#1584;&#1575;&#1575;&#1604;&#1586;&#1605;&#1606;">
					</a>
					<?php
					}
					else
						echo("&nbsp;");

					?>
		 		</div>

		 	</td>


			<td bordercolor="#003366" align="center" width="4%" height="28" bordercolorlight="#003366" bordercolordark="#003366" dir="rtl">
			<?php
				$avTime=$slot[12];				
				$status13="";
				$display13="";

				//check the type of Subject[lecture]||[lab]
				//$BId=CheckSubjectType($year,$mday,$avTime,$LectureName,$Sem);
				$BId=$op;

					if ((!CheckTime2($BId,$year,$LectureName,$mday,$avTime,$GId,$uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem,$op,$msub,$mteach,$SecID) || !CheckTeacher($uncode1,$CollegeCode1,$year,$mday,$mteach,$avTime,$Sem)))
				{
					$status13='disabled';

		 		 	if($BId==1)
		 		 	{
		 		 		$color13='#FF0000'; //red:Lecture
		 		 	}
		 		 	else
		 		 	if($BId==2)
					{
						$color13='orange'; //green:Lab
		 		 	}
		 		 	$display13=1;
				}
			?>
		 		<input type="checkbox" name="C13" value="ON" tabindex="13"  <?php echo($status13);?> style="background-color:<?php echo($color13);?>" <?php if($_POST['C13']) { echo('checked');}?>>
		 	<div align="center">
		 			<?php
		 			if($display13==1)
		 			{
		 			?>
		 				<a onclick="window.open('showDetail.php?BId=<?php echo($op);?>&year=<?php echo($year);?>&LN=<?php echo($LectureName);?>&mday=<?php echo($mday);?>&avt=<?php echo($avTime);?>&sem=<?php echo($Sem);?>&curteach=<?php echo($mteach);?>&uncode=<?php echo($uncode1);?>&Coll=<?php echo($CollegeCode1);?>&DeptNo=<?php echo($DeptNo);?>&AcadDeg=<?php echo($AcadDeg);?>&Classno=<?php echo($Classno);?>&SecID=<?php echo($SecID);?>&GId=<?php echo($GId);?>',false,'scrollbars=yes');">
							<img border="0" src="Background/update.gif" width="15" height="15" align="right" alt="&#1578;&#1601;&#1575;&#1589;&#1610;&#1604; &#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578; &#1576;&#1607;&#1584;&#1575;&#1575;&#1604;&#1586;&#1605;&#1606;">
					</a>
					<?php
					}
					else
						echo("&nbsp;");

					?>
		 		</div>

		 	</td>
			
			<td bordercolor="#003366" align="center" width="4%" height="28" bordercolorlight="#003366" bordercolordark="#003366" dir="rtl">
			<?php
				$avTime=$slot[13];
				
				$status14="";
				$display14="";

				//check the type of Subject[lecture]||[lab]
				//$BId=CheckSubjectType($year,$mday,$avTime,$LectureName,$Sem);
				$BId=$op;

					if ((!CheckTime2($BId,$year,$LectureName,$mday,$avTime,$GId,$uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem,$op,$msub,$mteach,$SecID) || !CheckTeacher($uncode1,$CollegeCode1,$year,$mday,$mteach,$avTime,$Sem)))
				{
					$status14='disabled';

		 		 	if($BId==1)
		 		 	{
		 		 		$color14='#FF0000'; //red:Lecture
		 		 	}
		 		 	else
		 		 	if($BId==2)
					{
						$color14='orange'; //green:Lab
		 		 	}
		 		 	$display14=1;
				}
			?>
		 		<input type="checkbox" name="C14" value="ON" tabindex="14"  <?php echo($status14);?> style="background-color:<?php echo($color14);?>" <?php if($_POST['C14']) { echo('checked');}?>>
		 	<div align="center">
		 			<?php
		 			if($display14==1)
		 			{
		 			?>
		 				<a onclick="window.open('showDetail.php?BId=<?php echo($op);?>&year=<?php echo($year);?>&LN=<?php echo($LectureName);?>&mday=<?php echo($mday);?>&avt=<?php echo($avTime);?>&sem=<?php echo($Sem);?>&curteach=<?php echo($mteach);?>&uncode=<?php echo($uncode1);?>&Coll=<?php echo($CollegeCode1);?>&DeptNo=<?php echo($DeptNo);?>&AcadDeg=<?php echo($AcadDeg);?>&Classno=<?php echo($Classno);?>&SecID=<?php echo($SecID);?>&GId=<?php echo($GId);?>',false,'scrollbars=yes');">
							<img border="0" src="Background/update.gif" width="15" height="15" align="right" alt="&#1578;&#1601;&#1575;&#1589;&#1610;&#1604; &#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578; &#1576;&#1607;&#1584;&#1575;&#1575;&#1604;&#1586;&#1605;&#1606;">
					</a>
					<?php
					}
					else
						echo("&nbsp;");

					?>
		 		</div>

		 	</td>


			<td bordercolor="#003366" align="center" width="4%" height="28" bordercolorlight="#003366" bordercolordark="#003366" dir="rtl">
			<?php
				$avTime=$slot[14];

				$status15="";
				$display15="";

				//check the type of Subject[lecture]||[lab]
				//$BId=CheckSubjectType($year,$mday,$avTime,$LectureName,$Sem);
				$BId=$op;

					if ((!CheckTime2($BId,$year,$LectureName,$mday,$avTime,$GId,$uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem,$op,$msub,$mteach,$SecID) || !CheckTeacher($uncode1,$CollegeCode1,$year,$mday,$mteach,$avTime,$Sem)))
				{
					$status15='disabled';

		 		 	if($BId==1)
		 		 	{
		 		 		$color15='#FF0000'; //red:Lecture
		 		 	}
		 		 	else
		 		 	if($BId==2)
					{
						$color15='orange'; //green:Lab
		 		 	}
		 		 	$display15=1;
				}
			?>
		 		<input type="checkbox" name="C15" value="ON" tabindex="15"  <?php echo($status15);?> style="background-color:<?php echo($color15);?>" <?php if($_POST['C15']) { echo('checked');}?>>
		 	<div align="center">
		 			<?php
		 			if($display15==1)
		 			{
		 			?>
		 				<a onclick="window.open('showDetail.php?BId=<?php echo($op);?>&year=<?php echo($year);?>&LN=<?php echo($LectureName);?>&mday=<?php echo($mday);?>&avt=<?php echo($avTime);?>&sem=<?php echo($Sem);?>&curteach=<?php echo($mteach);?>&uncode=<?php echo($uncode1);?>&Coll=<?php echo($CollegeCode1);?>&DeptNo=<?php echo($DeptNo);?>&AcadDeg=<?php echo($AcadDeg);?>&Classno=<?php echo($Classno);?>&SecID=<?php echo($SecID);?>&GId=<?php echo($GId);?>',false,'scrollbars=yes');">
							<img border="0" src="Background/update.gif" width="15" height="15" align="right" alt="&#1578;&#1601;&#1575;&#1589;&#1610;&#1604; &#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578; &#1576;&#1607;&#1584;&#1575;&#1575;&#1604;&#1586;&#1605;&#1606;">
					</a>
					<?php
					}
					else
						echo("&nbsp;");

					?>
		 		</div>

		 	</td>

			<td bordercolor="#003366" align="center" width="4%" height="28" bordercolorlight="#003366" bordercolordark="#003366" dir="rtl">
			<?php
				$avTime=$slot[15];
		
				$status16="";
				$display16="";

				//check the type of Subject[lecture]||[lab]
				//$BId=CheckSubjectType($year,$mday,$avTime,$LectureName,$Sem);
				$BId=$op;

					if ((!CheckTime2($BId,$year,$LectureName,$mday,$avTime,$GId,$uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem,$op,$msub,$mteach,$SecID) || !CheckTeacher($uncode1,$CollegeCode1,$year,$mday,$mteach,$avTime,$Sem)))
				{
					$status16='disabled';

		 		 	if($BId==1)
		 		 	{
		 		 		$color16='#FF0000'; //red:Lecture
		 		 	}
		 		 	else
		 		 	if($BId==2)
					{
						$color16='orange'; //green:Lab
		 		 	}
		 		 	$display16=1;
				}
			?>
		 		<input type="checkbox" name="C16" value="ON" tabindex="16"  <?php echo($status16);?> style="background-color:<?php echo($color16);?>" <?php if($_POST['C16']) { echo('checked');}?>>
		 	<div align="center">
		 			<?php
		 			if($display16==1)
		 			{
		 			?>
		 				<a onclick="window.open('showDetail.php?BId=<?php echo($op);?>&year=<?php echo($year);?>&LN=<?php echo($LectureName);?>&mday=<?php echo($mday);?>&avt=<?php echo($avTime);?>&sem=<?php echo($Sem);?>&curteach=<?php echo($mteach);?>&uncode=<?php echo($uncode1);?>&Coll=<?php echo($CollegeCode1);?>&DeptNo=<?php echo($DeptNo);?>&AcadDeg=<?php echo($AcadDeg);?>&Classno=<?php echo($Classno);?>&SecID=<?php echo($SecID);?>&GId=<?php echo($GId);?>',false,'scrollbars=yes');">
							<img border="0" src="Background/update.gif" width="15" height="15" align="right" alt="&#1578;&#1601;&#1575;&#1589;&#1610;&#1604; &#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578; &#1576;&#1607;&#1584;&#1575;&#1575;&#1604;&#1586;&#1605;&#1606;">
					</a>
					<?php
					}
					else
						echo("&nbsp;");

					?>
		 		</div>

		 	</td>

			<td bordercolor="#003366" align="center" width="4%" height="28" bordercolorlight="#003366" bordercolordark="#003366" dir="rtl">
			<?php
				$avTime=$slot[16];

				$status17="";
				$display17="";

				//check the type of Subject[lecture]||[lab]
				//$BId=CheckSubjectType($year,$mday,$avTime,$LectureName,$Sem);
				$BId=$op;

					if ((!CheckTime2($BId,$year,$LectureName,$mday,$avTime,$GId,$uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem,$op,$msub,$mteach,$SecID) || !CheckTeacher($uncode1,$CollegeCode1,$year,$mday,$mteach,$avTime,$Sem)))
				{
					$status17='disabled';

		 		 	if($BId==1)
		 		 	{
		 		 		$color17='#FF0000'; //red:Lecture
		 		 	}
		 		 	else
		 		 	if($BId==2)
					{
						$color17='orange'; //green:Lab
		 		 	}
		 		 	$display17=1;
				}
			?>
		 		<input type="checkbox" name="C17" value="ON" tabindex="17"  <?php echo($status17);?> style="background-color:<?php echo($color17);?>" <?php if($_POST['C17']) { echo('checked');}?>>
		 	<div align="center">
		 			<?php
		 			if($display17==1)
		 			{
		 			?>
		 				<a onclick="window.open('showDetail.php?BId=<?php echo($op);?>&year=<?php echo($year);?>&LN=<?php echo($LectureName);?>&mday=<?php echo($mday);?>&avt=<?php echo($avTime);?>&sem=<?php echo($Sem);?>&curteach=<?php echo($mteach);?>&uncode=<?php echo($uncode1);?>&Coll=<?php echo($CollegeCode1);?>&DeptNo=<?php echo($DeptNo);?>&AcadDeg=<?php echo($AcadDeg);?>&Classno=<?php echo($Classno);?>&SecID=<?php echo($SecID);?>&GId=<?php echo($GId);?>',false,'scrollbars=yes');">
							<img border="0" src="Background/update.gif" width="15" height="15" align="right" alt="&#1578;&#1601;&#1575;&#1589;&#1610;&#1604; &#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578; &#1576;&#1607;&#1584;&#1575;&#1575;&#1604;&#1586;&#1605;&#1606;">
					</a>
					<?php
					}
					else
						echo("&nbsp;");

					?>
		 		</div>

		 	</td>

			<td bordercolor="#003366" align="center" width="4%" height="28" bordercolorlight="#003366" bordercolordark="#003366" dir="rtl">
			<?php
				$avTime=$slot[17];

				$status18="";
				$display18="";

				//check the type of Subject[lecture]||[lab]
				//$BId=CheckSubjectType($year,$mday,$avTime,$LectureName,$Sem);
				$BId=$op;

					if ((!CheckTime2($BId,$year,$LectureName,$mday,$avTime,$GId,$uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem,$op,$msub,$mteach,$SecID) || !CheckTeacher($uncode1,$CollegeCode1,$year,$mday,$mteach,$avTime,$Sem)))
				{
					$status18='disabled';

		 		 	if($BId==1)
		 		 	{
		 		 		$color18='#FF0000'; //red:Lecture
		 		 	}
		 		 	else
		 		 	if($BId==2)
					{
						$color18='orange'; //green:Lab
		 		 	}
		 		 	$display18=1;
				}
			?>
		 		<input type="checkbox" name="C18" value="ON" tabindex="18"  <?php echo($status18);?> style="background-color:<?php echo($color18);?>" <?php if($_POST['C18']) { echo('checked');}?>>
		 	<div align="center">
		 			<?php
		 			if($display18==1)
		 			{
		 			?>
		 				<a onclick="window.open('showDetail.php?BId=<?php echo($op);?>&year=<?php echo($year);?>&LN=<?php echo($LectureName);?>&mday=<?php echo($mday);?>&avt=<?php echo($avTime);?>&sem=<?php echo($Sem);?>&curteach=<?php echo($mteach);?>&uncode=<?php echo($uncode1);?>&Coll=<?php echo($CollegeCode1);?>&DeptNo=<?php echo($DeptNo);?>&AcadDeg=<?php echo($AcadDeg);?>&Classno=<?php echo($Classno);?>&SecID=<?php echo($SecID);?>&GId=<?php echo($GId);?>',false,'scrollbars=yes');">
							<img border="0" src="Background/update.gif" width="15" height="15" align="right" alt="&#1578;&#1601;&#1575;&#1589;&#1610;&#1604; &#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578; &#1576;&#1607;&#1584;&#1575;&#1575;&#1604;&#1586;&#1605;&#1606;">
					</a>
					<?php
					}
					else
						echo("&nbsp;");

					?>
		 		</div>

		 	</td>

			<td bordercolor="#003366" align="center" width="4%" height="28" bordercolorlight="#003366" bordercolordark="#003366" dir="rtl">
			<?php
				$avTime=$slot[18];
				$status19="";
				$display19="";

				//check the type of Subject[lecture]||[lab]
				//$BId=CheckSubjectType($year,$mday,$avTime,$LectureName,$Sem);
				$BId=$op;

					if ((!CheckTime2($BId,$year,$LectureName,$mday,$avTime,$GId,$uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem,$op,$msub,$mteach,$SecID) || !CheckTeacher($uncode1,$CollegeCode1,$year,$mday,$mteach,$avTime,$Sem)))
				{
					$status19='disabled';

		 		 	if($BId==1)
		 		 	{
		 		 		$color19='#FF0000'; //red:Lecture
		 		 	}
		 		 	else
		 		 	if($BId==2)
					{
						$color19='orange'; //green:Lab
		 		 	}
		 		 	$display19=1;
				}
			?>
		 		<input type="checkbox" name="C19" value="ON" tabindex="19"  <?php echo($status19);?> style="background-color:<?php echo($color19);?>" <?php if($_POST['C19']) { echo('checked');}?>>
		 	<div align="center">
		 			<?php
		 			if($display19==1)
		 			{
		 			?>
		 				<a onclick="window.open('showDetail.php?BId=<?php echo($op);?>&year=<?php echo($year);?>&LN=<?php echo($LectureName);?>&mday=<?php echo($mday);?>&avt=<?php echo($avTime);?>&sem=<?php echo($Sem);?>&curteach=<?php echo($mteach);?>&uncode=<?php echo($uncode1);?>&Coll=<?php echo($CollegeCode1);?>&DeptNo=<?php echo($DeptNo);?>&AcadDeg=<?php echo($AcadDeg);?>&Classno=<?php echo($Classno);?>&SecID=<?php echo($SecID);?>&GId=<?php echo($GId);?>',false,'scrollbars=yes');">
							<img border="0" src="Background/update.gif" width="15" height="15" align="right" alt="&#1578;&#1601;&#1575;&#1589;&#1610;&#1604; &#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578; &#1576;&#1607;&#1584;&#1575;&#1575;&#1604;&#1586;&#1605;&#1606;">
					</a>
					<?php
					}
					else
						echo("&nbsp;");

					?>
		 		</div>

		 	</td>
		
			<td bordercolor="#003366" align="center" width="4%" height="28" bordercolorlight="#003366" bordercolordark="#003366" dir="rtl">
			<?php
				$avTime=$slot[19];

				$status20="";
				$display20="";

				//check the type of Subject[lecture]||[lab]
				//$BId=CheckSubjectType($year,$mday,$avTime,$LectureName,$Sem);
				$BId=$op;

					if ((!CheckTime2($BId,$year,$LectureName,$mday,$avTime,$GId,$uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem,$op,$msub,$mteach,$SecID) || !CheckTeacher($uncode1,$CollegeCode1,$year,$mday,$mteach,$avTime,$Sem)))
				{
					$status20='disabled';

		 		 	if($BId==1)
		 		 	{
		 		 		$color20='#FF0000'; //red:Lecture
		 		 	}
		 		 	else
		 		 	if($BId==2)
					{
						$color20='orange'; //green:Lab
		 		 	}
		 		 	$display20=1;
				}
			?>
		 		<input type="checkbox" name="C20" value="ON" tabindex="20"  <?php echo($status20);?> style="background-color:<?php echo($color20);?>" <?php if($_POST['C20']) { echo('checked');}?>>
		 	<div align="center">
		 			<?php
		 			if($display20==1)
		 			{
		 			?>
		 				<a onclick="window.open('showDetail.php?BId=<?php echo($op);?>&year=<?php echo($year);?>&LN=<?php echo($LectureName);?>&mday=<?php echo($mday);?>&avt=<?php echo($avTime);?>&sem=<?php echo($Sem);?>&curteach=<?php echo($mteach);?>&uncode=<?php echo($uncode1);?>&Coll=<?php echo($CollegeCode1);?>&DeptNo=<?php echo($DeptNo);?>&AcadDeg=<?php echo($AcadDeg);?>&Classno=<?php echo($Classno);?>&SecID=<?php echo($SecID);?>&GId=<?php echo($GId);?>',false,'scrollbars=yes');">
							<img border="0" src="Background/update.gif" width="15" height="15" align="right" alt="&#1578;&#1601;&#1575;&#1589;&#1610;&#1604; &#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578; &#1576;&#1607;&#1584;&#1575;&#1575;&#1604;&#1586;&#1605;&#1606;">
					</a>
					<?php
					}
					else
						echo("&nbsp;");

					?>
		 		</div>

		 	</td>

			<td bordercolor="#003366" align="center" width="4%" height="28" bordercolorlight="#003366" bordercolordark="#003366" dir="rtl">
			<?php
				$avTime=$slot[20];

				$status21="";
				$display21="";

				//check the type of Subject[lecture]||[lab]
				//$BId=CheckSubjectType($year,$mday,$avTime,$LectureName,$Sem);
				$BId=$op;

					if ((!CheckTime2($BId,$year,$LectureName,$mday,$avTime,$GId,$uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem,$op,$msub,$mteach,$SecID) || !CheckTeacher($uncode1,$CollegeCode1,$year,$mday,$mteach,$avTime,$Sem)))
				{
					$status21='disabled';

		 		 	if($BId==1)
		 		 	{
		 		 		$color21='#FF0000'; //red:Lecture
		 		 	}
		 		 	else
		 		 	if($BId==2)
					{
						$color21='orange'; //green:Lab
		 		 	}
		 		 	$display21=1;
				}
			?>
		 		<input type="checkbox" name="C21" value="ON" tabindex="21"  <?php echo($status21);?> style="background-color:<?php echo($color21);?>" <?php if($_POST['C21']) { echo('checked');}?>>
		 	<div align="center">
		 			<?php
		 			if($display21==1)
		 			{
		 			?>
		 				<a onclick="window.open('showDetail.php?BId=<?php echo($op);?>&year=<?php echo($year);?>&LN=<?php echo($LectureName);?>&mday=<?php echo($mday);?>&avt=<?php echo($avTime);?>&sem=<?php echo($Sem);?>&curteach=<?php echo($mteach);?>&uncode=<?php echo($uncode1);?>&Coll=<?php echo($CollegeCode1);?>&DeptNo=<?php echo($DeptNo);?>&AcadDeg=<?php echo($AcadDeg);?>&Classno=<?php echo($Classno);?>&SecID=<?php echo($SecID);?>&GId=<?php echo($GId);?>',false,'scrollbars=yes');">
							<img border="0" src="Background/update.gif" width="15" height="15" align="right" alt="&#1578;&#1601;&#1575;&#1589;&#1610;&#1604; &#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578; &#1576;&#1607;&#1584;&#1575;&#1575;&#1604;&#1586;&#1605;&#1606;">
					</a>
					<?php
					}
					else
						echo("&nbsp;");

					?>
		 		</div>

		 	</td>

			<td bordercolor="#003366" align="center" width="4%" height="28" bordercolorlight="#003366" bordercolordark="#003366" dir="rtl">
			<?php
				$avTime=$slot[21];

				$status22="";
				$display22="";

				//check the type of Subject[lecture]||[lab]
				//$BId=CheckSubjectType($year,$mday,$avTime,$LectureName,$Sem);
				$BId=$op;

					if ((!CheckTime2($BId,$year,$LectureName,$mday,$avTime,$GId,$uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem,$op,$msub,$mteach,$SecID) || !CheckTeacher($uncode1,$CollegeCode1,$year,$mday,$mteach,$avTime,$Sem)))
				{
					$status22='disabled';

		 		 	if($BId==1)
		 		 	{
		 		 		$color22='#FF0000'; //red:Lecture
		 		 	}
		 		 	else
		 		 	if($BId==2)
					{
						$color22='orange'; //green:Lab
		 		 	}
		 		 	$display22=1;
				}
			?>
		 		<input type="checkbox" name="C22" value="ON" tabindex="22"  <?php echo($status22);?> style="background-color:<?php echo($color22);?>" <?php if($_POST['C22']) { echo('checked');}?>>
		 	<div align="center">
		 			<?php
		 			if($display22==1)
		 			{
		 			?>
		 				<a onclick="window.open('showDetail.php?BId=<?php echo($op);?>&year=<?php echo($year);?>&LN=<?php echo($LectureName);?>&mday=<?php echo($mday);?>&avt=<?php echo($avTime);?>&sem=<?php echo($Sem);?>&curteach=<?php echo($mteach);?>&uncode=<?php echo($uncode1);?>&Coll=<?php echo($CollegeCode1);?>&DeptNo=<?php echo($DeptNo);?>&AcadDeg=<?php echo($AcadDeg);?>&Classno=<?php echo($Classno);?>&SecID=<?php echo($SecID);?>&GId=<?php echo($GId);?>',false,'scrollbars=yes');">
							<img border="0" src="Background/update.gif" width="15" height="15" align="right" alt="&#1578;&#1601;&#1575;&#1589;&#1610;&#1604; &#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578; &#1576;&#1607;&#1584;&#1575;&#1575;&#1604;&#1586;&#1605;&#1606;">
					</a>
					<?php
					}
					else
						echo("&nbsp;");

					?>
		 		</div>

		 	</td>

			<td bordercolor="#003366" align="center" width="4%" height="28" bordercolorlight="#003366" bordercolordark="#003366" dir="rtl">
			<?php
				$avTime=$slot[22];
				$status23="";
				$display23="";

				//check the type of Subject[lecture]||[lab]
				//$BId=CheckSubjectType($year,$mday,$avTime,$LectureName,$Sem);
				$BId=$op;

					if ((!CheckTime2($BId,$year,$LectureName,$mday,$avTime,$GId,$uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem,$op,$msub,$mteach,$SecID) || !CheckTeacher($uncode1,$CollegeCode1,$year,$mday,$mteach,$avTime,$Sem)))
				{
					$status23='disabled';

		 		 	if($BId==1)
		 		 	{
		 		 		$color23='#FF0000'; //red:Lecture
		 		 	}
		 		 	else
		 		 	if($BId==2)
					{
						$color23='orange'; //green:Lab
		 		 	}
		 		 	$display23=1;
				}
			?>
		 		<input type="checkbox" name="C23" value="ON" tabindex="23"  <?php echo($status23);?> style="background-color:<?php echo($color23);?>" <?php if($_POST['C23']) { echo('checked');}?>>
		 	<div align="center">
		 			<?php
		 			if($display23==1)
		 			{
		 			?>
		 				<a onclick="window.open('showDetail.php?BId=<?php echo($op);?>&year=<?php echo($year);?>&LN=<?php echo($LectureName);?>&mday=<?php echo($mday);?>&avt=<?php echo($avTime);?>&sem=<?php echo($Sem);?>&curteach=<?php echo($mteach);?>&uncode=<?php echo($uncode1);?>&Coll=<?php echo($CollegeCode1);?>&DeptNo=<?php echo($DeptNo);?>&AcadDeg=<?php echo($AcadDeg);?>&Classno=<?php echo($Classno);?>&SecID=<?php echo($SecID);?>&GId=<?php echo($GId);?>',false,'scrollbars=yes');">
							<img border="0" src="Background/update.gif" width="15" height="15" align="right" alt="&#1578;&#1601;&#1575;&#1589;&#1610;&#1604; &#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578; &#1576;&#1607;&#1584;&#1575;&#1575;&#1604;&#1586;&#1605;&#1606;">
					</a>
					<?php
					}
					else
						echo("&nbsp;");

					?>
		 		</div>

		 	</td>

			<td bordercolor="#003366" align="center" width="4%" height="28" bordercolorlight="#003366" bordercolordark="#003366" dir="rtl">
			<?php
				$avTime=$slot[23];
				$status24="";
				$display24="";

				//check the type of Subject[lecture]||[lab]
				//$BId=CheckSubjectType($year,$mday,$avTime,$LectureName,$Sem);
				$BId=$op;

					if ((!CheckTime2($BId,$year,$LectureName,$mday,$avTime,$GId,$uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem,$op,$msub,$mteach,$SecID) || !CheckTeacher($uncode1,$CollegeCode1,$year,$mday,$mteach,$avTime,$Sem)))
				{
					$status24='disabled';

		 		 	if($BId==1)
		 		 	{
		 		 		$color24='#FF0000'; //red:Lecture
		 		 	}
		 		 	else
		 		 	if($BId==2)
					{
						$color24='orange'; //green:Lab
		 		 	}
		 		 	$display24=1;
				}
			?>
		 		<input type="checkbox" name="C24" value="ON" tabindex="24"  <?php echo($status24);?> style="background-color:<?php echo($color24);?>" <?php if($_POST['C24']) { echo('checked');}?>>
		 	<div align="center">
		 			<?php
		 			if($display24==1)
		 			{
		 			?>
		 				<a onclick="window.open('showDetail.php?BId=<?php echo($op);?>&year=<?php echo($year);?>&LN=<?php echo($LectureName);?>&mday=<?php echo($mday);?>&avt=<?php echo($avTime);?>&sem=<?php echo($Sem);?>&curteach=<?php echo($mteach);?>&uncode=<?php echo($uncode1);?>&Coll=<?php echo($CollegeCode1);?>&DeptNo=<?php echo($DeptNo);?>&AcadDeg=<?php echo($AcadDeg);?>&Classno=<?php echo($Classno);?>&SecID=<?php echo($SecID);?>&GId=<?php echo($GId);?>',false,'scrollbars=yes');">
							<img border="0" src="Background/update.gif" width="15" height="15" align="right" alt="&#1578;&#1601;&#1575;&#1589;&#1610;&#1604; &#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578; &#1576;&#1607;&#1584;&#1575;&#1575;&#1604;&#1586;&#1605;&#1606;">
					</a>
					<?php
					}
					else
						echo("&nbsp;");

					?>
		 		</div>
		 	</td>
		 	
			</tr>
			</table>
			</td>
			</tr>
		 	<td bordercolor="#003366" align="center" width="35%" height="55" bgcolor="#5A74A0" bordercolorlight="#003366" bordercolordark="#003366">

						<table border="0" width="84%" id="table19" cellspacing="0">
							<tr>
								<td width="10%" bordercolor="#003366">
								<input type="checkbox" name="C13" value="ON" disabled style="background-color: #FF0000"></td>
								<td>
								<p align="center">
								<img border="0" id="img72" src="Depart_Files/Mheader1.jpg" height="26" width="130" alt="&#1575;&#1604;&#1575;&#1586;&#1605;&#1606;&#1577; &#1575;&#1604;&#1605;&#1582;&#1589;&#1589;&#1577; &#1604;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 12; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0; fp-orig: 0" fp-title="&#1575;&#1604;&#1575;&#1586;&#1605;&#1606;&#1577; &#1575;&#1604;&#1605;&#1582;&#1589;&#1589;&#1577; &#1604;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578;" align="right"></td>
							</tr>
							<tr>
								<td width="10%" bordercolor="#003366" height="28">
								<input type="checkbox" name="C14" value="ON" disabled style="background-color: #FF9933"></td>
								<td height="28">
								<img border="0" id="img73" src="Depart_Files/Mheader2.jpg" height="26" width="130" alt="&#1575;&#1604;&#1575;&#1586;&#1605;&#1606;&#1577; &#1575;&#1604;&#1605;&#1582;&#1589;&#1589;&#1577; &#1604;&#1604;&#1605;&#1593;&#1575;&#1605;&#1604;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 12; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0; fp-orig: 0" fp-title="&#1575;&#1604;&#1575;&#1586;&#1605;&#1606;&#1577; &#1575;&#1604;&#1605;&#1582;&#1589;&#1589;&#1577; &#1604;&#1604;&#1605;&#1593;&#1575;&#1605;&#1604;"></td>
							</tr>
						</table>
			</td>
		 	<td bordercolor="#003366" align="center" width="22%" height="55" bgcolor="#5A74A0" bordercolorlight="#003366" bordercolordark="#003366">

						<input name="submit" type="submit" value="   &#1581;&#1601;&#1592;    "  tabindex="13" style="color: #FFFFFF; font-size: 14pt; font-weight: bold; font-family: Traditional Arabic; vertical-align: middle; letter-spacing: 2; border: 3px inset #B0CCFF; ; background-color:#5A74A0" dir="rtl"></td>
		 	<td bordercolor="#003366" align="center" width="35%" height="55" bgcolor="#5A74A0" bordercolorlight="#003366" bordercolordark="#003366">
			&nbsp;</td>
			</tr>
		</table>
		</div>
			</td>
		<?php
		}//end of if slot!=""
		else
		{
			//Time Not specified on the max year
				echo("<div align='center'><p align='center' style='color:yellow; font-size:14pt; font-style:bold; font-family:Times New Roman'><font color='yellow' size='4' face='Traditional Arabic'><b><a href='ConfigNewYear.php?uncode=$uncode1&CollegeCode=$CollegeCode1&value=5'>");

				echo("&#1604;&#1605; &#1610;&#1578;&#1605; &#1578;&#1581;&#1583;&#1610;&#1583; &#1586;&#1605;&#1606; &#1575;&#1604;&#1576;&#1583;&#1575;&#1610;&#1577; &#1604;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578; &#1576;&#1607;&#1584;&#1575; &#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609;");
			
			echo("</a></b></font></p></div>");
		}
		?>
			</tr>

		</table>

	</div>
	</form>
	<?php
	} //end of if
	else
	{
		echo("error..");
	}
}

//*********************************************************************
// Managing Methods
// check avaliable Time
function CheckTime($BId,$year,$LectureName,$mday,$avTime)
{
	// check Building
	//Lecture
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
	//$conn = db_connect();
	/*$Mang_query = "select count(MTimes) from ManagingLec where
	AcadYNo='$year' and
	MDays ='$mday' and
	MTimes='$avTime' and
	BId='$op' and
	SubBId='$LectureName' and
	UniversityCode='$uncode1' and
	CollegeCode='$CollegeCode1' and
	DeptNo='$DeptNo' and
	AcadDegreeId='$AcadDeg' and
	ClassNo='$Classno' and
	SemNo='$Sem' ";*/

	$Mang_query = "select count(MTimes) from ManagingLec where
		AcadYNo='$year' and
		MDays ='$mday' and
		MTimes='$avTime' and
		BId='$BId' and
		SubBId='$LectureName'";
    $Mresult=mysqli_query($mysqli,$Mang_query);

	$mrow=mysqli_fetch_row($Mresult);
	if ($mrow[0]==0)

		return true; //available Time
	else

		return false; // un avialable
}


// check  Techer avialable on this Time

function CheckTeacher($uncode1,$CollegeCode1,$year,$mday,$mteach,$avTime,$Sem)
{
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
//	$conn = db_connect();
	//check Teaher on another college
	
	 //$rest=mysqli_query("select ");

	//Lecture

	if($mteach==-1)
		return true; //available Time
	else
	{
		$Mang_querys = "select count(MTimes) from ManagingLec where
		AcadYNo='$year' and
		MDays ='$mday' and
		MTimes='$avTime' and
		UniversityCode='$uncode1' and
		TeacherId='$mteach' and 
		SemNo='$Sem'";

    	//CollegeCode='$CollegeCode1' and
    	$Mresults=mysqli_query($mysqli,$Mang_querys);

		$mrows=mysqli_fetch_row($Mresults);
		if ($mrows[0]==0)

			return true; //available Time
		else

			return false; // un avialable
	}//end of else
}

// check the dept not found on each lab and lecture at the same time
function Checkdept($uncode1,$CollegeCode1,$AcadDeg,$DeptNo,$Classno,$Sem,$year,$mday,$avTime,$BId,$LectureName,$SecID)
{
	// check Depart
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
//	$conn = db_connect();
	$Mang_querys = "select count(MTimes) from ManagingLec where
	AcadYNo='$year' and
	MDays ='$mday' and
	MTimes='$avTime' and
	UniversityCode='$uncode1' and
	CollegeCode='$CollegeCode1' and
	DeptNo='$DeptNo' and
	AcadDegreeId='$AcadDeg' and
	ClassNo='$Classno' and
	SecID='$SecID' and
	SemNo='$Sem' and
	BId='$BId' and
	SubBId='$LectureName'";

    $Mresults=mysqli_query($mysqli,$Mang_querys);

	$mrows=mysqli_fetch_row($Mresults);
	if ($mrows[0]==0)

		return true; //available Time
	else

		return false; // un avialable
}

// return the Build Id

function GetBId($LectureName,$year,$mday,$Sem,$avTime,$Classno,$uncode1,$CollegeCode1)
{

	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
//	$conn = db_connect();

	$Mang_query1 = "select BId from ManagingLec where
	AcadYNo='$year' and
	MDays ='$mday' and
	MTimes='$avTime' and
	SemNo='$Sem' and
	ClassNo='$Classno'";


	$Mresult1=mysqli_query($mysqli,$Mang_query1);

	$mrow=mysqli_fetch_row($Mresult1);

	//variable
	$BId=$mrow[0];

   return $BId;

}

// Check all subject inserted on ManagingLec Table

function CheckNoSubject($table,$uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem,$op)
{
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
	$MaxYear=GetMaxYear();
	//$conn = db_connect();
	if(strcmp($table,"ManagingLec")==0)
	{
	$sqls_queryd = "select count(SubCode) from ManagingLec where
	AcadYNo='$MaxYear' and
	UniversityCode='$uncode1' and
	CollegeCode='$CollegeCode1' and
	DeptNo='$DeptNo' and
	AcadDegreeId='$AcadDeg' and
	ClassNo='$Classno' and
	SemNo='$Sem' ";
	
	$resultsd=mysqli_query($mysqli,$sqls_queryd);
	$rowsd=mysqli_fetch_row($resultsd);

	return $rowsd[0];
	}
	else
	{
	$sum=0;
	//CollegeSubject
	$sqls_queryd = "select SubHour ,SubTHour from CollegeSubject where
	AcadYNo='$MaxYear' and
	UniversityCode='$uncode1' and
	CollegeCode='$CollegeCode1' and
	DeptNo='$DeptNo' and
	AcadDegreeId='$AcadDeg' and
	ClassNo='$Classno' and
	SemNo='$Sem' and
	SubType='$op' order by SubCode";

	$resultsd=mysqli_query($mysqli,$sqls_queryd);
	while($rowsd=mysqli_fetch_row($resultsd))
	{
		$sum=$sum+$rowsd[0]+$rowsd[1];
	}
	return $sum;
	}
	

}

//
function CheckGroupOnBId($BId,$year,$LectureName,$mday,$avTime,$uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem,$SecID)
{
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
//	$conn = db_connect();

	$Mang_query = "select SubBId from ManagingLec where
			AcadYNo='$year' and
			MDays ='$mday' and
			MTimes='$avTime' and
			UniversityCode='$uncode1' and
			CollegeCode='$CollegeCode1' and
			DeptNo='$DeptNo' and
			AcadDegreeId='$AcadDeg' and
			ClassNo='$Classno' and
			SecID='$SecID' and
			SemNo='$Sem' and
			BId='$BId' and
			SubBId='$LectureName'and
			GId!=0";
	$Mresult=mysqli_query($mysqli,$Mang_query);

	//$mrow=mysqli_fetch_row($Mresult);

	if(mysqli_num_rows($Mresult)==0)
		return true;
	else
		return false;


}

//----------------------------------------------------------------------------------------------------------------
//Modified on 6-October-2008

//[1] Check Group
function CheckGroup($year,$mday,$avTime,$uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem,$GId,$SecID)
{
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
//	$conn = db_connect();

	$Mang_query = "select GId from ManagingLec where
			AcadYNo='$year' and
			MDays ='$mday' and
			MTimes='$avTime' and
			UniversityCode='$uncode1' and
			CollegeCode='$CollegeCode1' and
			DeptNo='$DeptNo' and
			AcadDegreeId='$AcadDeg' and
			ClassNo='$Classno' and
			SecID='$SecID' and
			SemNo='$Sem' and
			GId='$GId'";
			
	$Mresult=mysqli_query($mysqli,$Mang_query);

	//$mrow=mysqli_fetch_row($Mresult);

	if(mysqli_num_rows($Mresult)==0)
		return true;
	else
		return false;


}//end of method

function CheckOpenLab($year,$mday,$avTime,$uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem,$SecID,$mteach)
{
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
//	$conn = db_connect();
	
	$Mang_query = "select GId from ManagingLec where
			AcadYNo='$year' and
			MDays ='$mday' and
			MTimes='$avTime' and
			UniversityCode='$uncode1' and
			CollegeCode='$CollegeCode1' and
			DeptNo='$DeptNo' and
			AcadDegreeId='$AcadDeg' and
			ClassNo='$Classno' and
			SecID='$SecID' and
			SemNo='$Sem' and
			GId !='0' and
			TeacherId='-1'";
			
	$Mresult=mysqli_query($mysqli,$Mang_query);
			
	if(mysqli_num_rows($Mresult)==0)
		
		return true;
	else
		
		return false;

}//end of method


//[2]Check Lecture
function CheckLectureRoom($year,$mday,$avTime,$uncode1,$Sem,$BId,$LectureName)
{
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
	$conn = db_connect();

	$Mang_query = "select BId,SubBId from ManagingLec where
			AcadYNo='$year' and
			MDays ='$mday' and
			MTimes='$avTime' and
			UniversityCode='$uncode1' and
			SemNo='$Sem' and
			BId='$BId' and 
			SubBId='$LectureName'";
			
	$Mresult=mysqli_query($mysqli,$Mang_query);

	if(mysqli_num_rows($Mresult)==0)
		return true;
	else
		return false;

}//end of method

//[3]Check ClassYear

function CheckClassYear($year,$mday,$avTime,$uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem,$SecID)
{
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
//	$conn = db_connect();

	$Mang_query = "select * from ManagingLec where
			AcadYNo='$year' and
			MDays ='$mday' and
			MTimes='$avTime' and
			UniversityCode='$uncode1' and
			CollegeCode='$CollegeCode1' and
			DeptNo='$DeptNo' and
			AcadDegreeId='$AcadDeg' and
			ClassNo='$Classno' and
			SecID='$SecID' and
			SemNo='$Sem' and GId='0'"; 
			
			
	$Mresult=mysqli_query($mysqli,$Mang_query);
	
	if(mysqli_num_rows($Mresult)==0)
		return true;
	else
		return false;

}//end of method

//[4] Modified CheckTime2
function CheckTime2($BId,$year,$LectureName,$mday,$avTime,$GId,$uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem,$op,$msub,$mteach,$SecID)
{
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
    $flag=true;
//	$conn = db_connect();
	$Mang_query = "select UniversityCode,CollegeCode,DeptNo,AcadDegreeId,ClassNo,SemNo,SubType,GId,BId,SubBId,SubCode,TeacherId,SecID from ManagingLec where
			AcadYNo='$year' and
			MDays ='$mday' and
			MTimes='$avTime' and
			SemNo='$Sem'";

	$Mresult=mysqli_query($mysqli,$Mang_query);

	//get num of row return
	$c=mysqli_num_rows($Mresult);
	/*
	 UniversityCode=$mrow[0],
	 CollegeCode=$mrow[1],
	 DeptNo=$mrow[2],
	 AcadDegreeId=$mrow[3],
	 ClassNo=$mrow[4],
	 SemNo=$mrow[5],
	 SubType=$mrow[6],
	 GId=$mrow[7],
	 BId=$mrow[8],
	 SubBId=$mrow[9],
	 SubCode=$mrow[10],
	 TeacherId=$mrow[11],
	 SecID=$mrow[12];
	*/
	
  if($c>=1)
  {
  	
  	while($mrow=mysqli_fetch_row($Mresult))
  	{
		
		//[1.1] check if there is any Lecture on this Building in the same Location of college
		if( !CheckLectureRoom($year,$mday,$avTime,$uncode1,$Sem,$BId,$LectureName))
		{
			return false;
		}
		else
		if( (intval($mrow[8])==$op)&&(intval($mrow[9])==$LectureName)&& (intval($mrow[0])==$uncode1) &&( intval($mrow[5])==$Sem) )
		{
			
			return false;
		}
		else
		if($GId==0)
		{
			//[1.2] Check if there any lecture of this college on any Departs or [no open lab ]
				if( !CheckClassYear($year,$mday,$avTime,$uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem,$SecID)|| !CheckOpenLab($year,$mday,$avTime,$uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem,$SecID,$mteach))
			{
				return false;
			}
			else
			{
				return true;
			}
		}
		else
		if( ($GId > 0) && (!CheckClassYear($year,$mday,$avTime,$uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem,$SecID)) )
		{
				return false;
		}
		else
		if( ($GId>0) && (!CheckGroup($year,$mday,$avTime,$uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem,$GId,$SecID)) )
		{
			return false;
		}	
		else
		if((($mrow[0]==$uncode1)&&($mrow[1]==$CollegeCode1))&&(($mrow[2]==$DeptNo)&&($mrow[3]==$AcadDeg)))
		{
			//[2] check if it same class and sem
			if( ($mrow[4]==$Classno)&& ($mrow[5]==$Sem)&& ($mrow[12]==$SecID))
			{
				//check if it the same Building or not
				//Then : check if it the same group or not
				
				//[3]--- Check Groups && ClassYear -----
				 
				if ( !CheckClassYear($year,$mday,$avTime,$uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem,$SecID))
				{
					return false;	

				}
				else
				if (($mrow[7]==0)&&($mrow[6]==1))
				{
					//if the ManageGroup==0 and type==Lecture
						return false;	
				}
				else
				if($mrow[7]>0)
				{
					 	//[4] If ManageGroup > 0 
					 	//if we want to manage Lecture(SubType==1) we have to check that [NO Group has a lecture on this Time]
						if(($GId==0)&&($op==1))
						{
							return false;
						}
						
						//[5]Check if group has lecture on this time or not
						else
						if( ($GId>0) && (!CheckGroup($year,$mday,$avTime,$uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem,$GId,$SecID)) )
						{
							return false;
						}
						
						//[6] check Group on Specified Building
						
						$flag=CheckGroupOnBId($op,$year,$LectureName,$mday,$avTime,$uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem,$SecID);
					 	
						//echo("mgroup=".$mrow[7]."</br>Gid =".$GId);
						//echo("</br>chgroup=".$flag);

						if(($mrow[8]==1)&&($BId==1))
						{
						   //if (ManageBId==1)&($currentBId==1)
						   if($flag)
						   {
								
								if( ($mrow[7]!=$GId) &&($mteach!=$mrow[11]) )

									return true; //  avialable

						   		else

									return false; // un avialable
						   }
						   else
						   {
								
								return false;//unavailable

						   }

						}
						else
						if(($mrow[8]==2)&&($BId==2))
						{
						   //if (ManageBId==2)&($currentBId==2)

						   if($flag)
						   {
								if( $mrow[7]==$GId )
									
									return false; // un avialable

								else
								if( ($mrow[7]!=$GId) &&($mteach!=$mrow[11]) )

									return true; //  avialable

								else

									return false; // un avialable
							}
							else
							{
								
								return false;//unavailable

							}
						}
				 	 
				 }//end of GId>0
			}
		    else
		    {
				//different ClassNo
						
				if(!CheckLectureRoom($year,$mday,$avTime,$uncode1,$Sem,$BId,$LectureName))
				{
					return false;
				}
				
					if((Checkdept($uncode1,$CollegeCode1,$AcadDeg,$DeptNo,$Classno,$Sem,$year,$mday,$avTime,$BId,$LectureName,$SecID))||(CheckTeacher($uncode1,$CollegeCode1,$year,$mday,$mteach,$avTime,$Sem)))

					return true;

				else
					return false;

		    }

		}//end of Different Colleges
		else
		{
			//different Depart
			
			if(!CheckLectureRoom($year,$mday,$avTime,$uncode1,$Sem,$op,$LectureName))
			{
				return false;
			}
							
				if((Checkdept($uncode1,$CollegeCode1,$AcadDeg,$DeptNo,$Classno,$Sem,$year,$mday,$avTime,$BId,$LectureName,$SecID))||(CheckTeacher($uncode1,$CollegeCode1,$year,$mday,$mteach,$avTime,$Sem)))

				return true;

			else
				return false;
		}//end of else

	 }//end of while

  }//end of main if
 else
	{
		return true;
	}

}//end of method
//----------------------------------------------------------------------------------------------------------------------------------

//***********************************
// Important: Use to Control Groups

function CheckSubCodeIns($uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem,$op,$GId,$SubCode,$shour,$SecID)
{
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
	$Maxyear=$_SESSION['year'];
	//$conn = db_connect();
	$sqls_queryd = "select count(SubCode) from ManagingLec where
	AcadYNo='$Maxyear' and
	UniversityCode='$uncode1' and
	CollegeCode='$CollegeCode1' and
	DeptNo='$DeptNo' and
	AcadDegreeId='$AcadDeg' and
	ClassNo='$Classno' and SecID='$SecID' and
	SemNo='$Sem' and
	SubCode='$SubCode' and
	SubType='$op' and GId!=0 and
	GId='$GId'";

	$resultsd=mysqli_query($mysqli,$sqls_queryd);
	$rowsd=mysqli_fetch_row($resultsd);

	return $rowsd[0];

}


// check the Type of Subject [lecture]||[Lab]
function CheckSubjectType($year,$mday,$avTime,$LectureName,$Sem)
{
	// check Lecture Type
	// First get the SubCode
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
	$year=$_SESSION['year'];
//	$conn = db_connect();

	$Mang_query1 = "select BId from ManagingLec where
	AcadYNo='$year' and
	MDays ='$mday' and
	MTimes='$avTime' and
	SemNo='$Sem'";

	$Mresult=mysqli_query($mysqli,$Mang_query1);

	$mrow=mysqli_fetch_row($Mresult);

	//variable
	$stype=$mrow[0];

	return $stype;
}

//check Lecture



//Display Details of Cell on Table
function DisplayDetails($BId,$year,$LectureName,$mday,$avTime,$Sem,$SecID)
{
	// Display contains:
	// CollegeName:
	// ClassNo:
	// SubjectName:
			//> if(GId==0): Lecture
			//> if(GId>0)and(SubType==1):Tutorial
			//> if(GId>0)and(SubType==2):Lab
	// TeacherName:
	//echo("Bid=".$BId."lno=".$LectureName."day=".$mday."time=".$avTime);
	// first return the Building ($BId and $LectureName)
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
//	$conn = db_connect();

	$Mang_query1 = "select UniversityCode,CollegeCode,DeptNo,AcadDegreeId,ClassNo,SubCode,TeacherId,GId,BId,SubBId,SubType from ManagingLec where
	AcadYNo='$year' and
	MDays ='$mday' and
	MTimes='$avTime' and
	SemNo='$Sem'";

	//SubBId='$LectureName' and
	$Mresult1=mysqli_query($mysqli,$Mang_query1);

    while($mrow1=mysqli_fetch_row($Mresult1))
   {
	$uncode1=$mrow1[0];

	$CollegeCode1=$mrow1[1];

	$DeptNo=$mrow1[2];

	$AcadDeg=$mrow1[3];

	$Classno=$mrow1[4];

	// display CollegeName
	$CollegeName=GetCollegeName($uncode1,$CollegeCode1)."( &nbsp;";

	//echo($CollegeName);

	//Display ClassName
	$ClassName="\n".GetClassName($uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem)."&nbsp;";

	echo($ClassName."\n");

	//Display SubjectName

	$SubCode=$mrow1[5];

	$SubjectName=GetSubjectName($CollegeCode1,$uncode1,$DeptNo,$AcadDeg,$Sem,$Classno,$SubCode);


	//Display TeacherName

	$TeacherId=$mrow1[6];

	$TeacherName=GetTeacherName($CollegeCode1,$uncode1,$TeacherId);

	echo("&#1575;&#1604;&#1575;&#1587;&#1578;&#1575;&#1584;:".$TeacherName."\n");


	//Return GroupName

	$GId=$mrow1[7];
	$type=$mrow1[10];

	if($GId>0)
	{
		$GroupName=GetGroup($CollegeCode1,$uncode1,$DeptNo,$AcadDeg,$Sem,$Classno,$year,$GId,$SecID);

		echo("&#1575;&#1604;&#1605;&#1575;&#1583;&#1577;:".$SubjectName."-".$GroupName."\n");
	}
	else
	{
		echo("&#1575;&#1604;&#1605;&#1575;&#1583;&#1577;:".$SubjectName."\n");

	}

	// Check the Type Of Lecture

	if (($type==1)&&($GId==0))
	{
		//
		//$BuildingName=GetBuildingName($CollegeCode1,$uncode1,$BId);
		echo("[ &nbsp; &#1605;&#1581;&#1575;&#1590;&#1585;&#1577; &nbsp;]");
	}
	else
	if (($type==1)&&($GId>0))
	{
		echo("[ &nbsp; &#1578;&#1605;&#1575;&#1585;&#1610;&#1606; &nbsp;]");
	}
	else
	if(($type==2)&&($GId>0))
	{
		echo("[ &nbsp; &#1605;&#1593;&#1605;&#1604; &nbsp; ] &nbsp;");
	}

	$qBId=$mrow1[8];
	$LectureName=$mrow1[9];
	$BName=GetBuildingName($CollegeCode1,$uncode1,$qBId,$LectureName);

	echo("[ &nbsp;&nbsp;".$BName."]". "\n");
	echo("---------------------------------------------------------");

  }//end while

}

// Display Final Details

function FinalDetails($year,$mday,$avTime,$uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem,$f,$SecID,$BId)
{
	// Display contains:
	// SubjectName:
			//> if(GId==0): Lecture
			//> if(GId>0)and(SubType==1):Tutorial
			//> if(GId>0)and(SubType==2):Lab
	// TeacherName:
	// Building Lecture:

	// first return the Building ($BId and $LectureName)
   //echo("year=".$year."day=".$mday."time=".$avTime);
  	//echo("uinv=".$uncode1."coll=".$CollegeCode1."dept=".$DeptNo."Acad=".$AcadDeg."class=".$Classno."sem=".$Sem);

	$details="&nbsp;";
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
//	$conn = db_connect();

	$Mang_query1 = "select SubCode,TeacherId,GId,BId,SubBId from ManagingLec where
	AcadYNo='$year' and
	MDays ='$mday' and
	MTimes='$avTime' and
	SemNo='$Sem' and
	UniversityCode='$uncode1' and
	CollegeCode='$CollegeCode1' and
	DeptNo='$DeptNo' and
	AcadDegreeId='$AcadDeg' and
	ClassNo='$Classno' and SecID='$SecID'";

	$Mresult1=mysqli_query($mysqli,$Mang_query1);

    while($mrow1=mysqli_fetch_row($Mresult1))
   {

	//Display SubjectName

	$SubCode=$mrow1[0];

	$SubjectName=GetSubjecttName($CollegeCode1,$uncode1,$DeptNo,$AcadDeg,$Sem,$Classno,$SubCode,$year,$SecID);

	//Display TeacherName

		$TeacherId=$mrow1[1];

		$TeacherName=GetTeacherName($CollegeCode1,$uncode1,$TeacherId);

	//Return GroupName

	$GId=$mrow1[2];

	if($GId>0)
	{
		$GroupName=GetGroup($CollegeCode1,$uncode1,$DeptNo,$AcadDeg,$Sem,$Classno,$year,$GId,$SecID);

		$details=$details."<div>".$SubjectName."-".$GroupName."&nbsp;";
	}
	else
	{
		$details=$details."<div>".$SubjectName."&nbsp; ";

	}

	// Check the Type Of Lecture

	if (($BId==1)&&($GId==0))
	{
		//
		//$BuildingName=GetBuildingName($CollegeCode1,$uncode1,$BId);
		$details=$details."[ &#1605;&#1581;&#1575;&#1590;&#1585;&#1577;] "."</div>";
	}
	else
	if (($BId==1)&&($GId>0))
	{
		$details=$details."[ &#1578;&#1605;&#1575;&#1585;&#1610;&#1606;]"."</div>";
	}
	else
	if($BId==2)
	{
		$details=$details."[  &#1605;&#1593;&#1605;&#1604;] "."</div>";
	}

	$qBId=$mrow1[3];
	$LectureName=$mrow1[4];
	$BName=GetBuildingName($CollegeCode1,$uncode1,$qBId,$LectureName);


	$details=$details."<div>".$TeacherName."</div>";
	$details=$details."<div >"."[".$BName."] "."</div>";

  	if($f!=1)
  	{
  	$details=$details."<div><b><font size='2' face='Traditional Arabic' color='red'>".
	"<a title='Delete Subject' href='deleteLec.php?AcadDeg=$AcadDeg&Class=$Classno&Sem=$Sem&uncode=$uncode1&CollegeCode=$CollegeCode1&Dept=$DeptNo&avTime=$avTime&mday=$mday&year=$year&BId=$qBId&SubBId=$LectureName&GId=$GId&TeacherId=$TeacherId&SubCode=$SubCode&flag=1&SecID=$SecID'>&#1581;&#1584;&#1601;</a></font></b></div>";
	}


  }//end while

	return $details;
}

//*******************************************************************************
//FinalReport: Display to Guest
//
function FinalReports($year,$mday,$avTime,$uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem,$SecID,$BId)
{

	// Display contains:
	// SubjectName:
			//> if(GId==0): Lecture
			//> if(GId>0)and(SubType==1):Tutorial
			//> if(GId>0)and(SubType==2):Lab
	// TeacherName:
	// Building Lecture:

	$details="&nbsp;";
	
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
	//$conn = db_connect();

	$Mang_query1 = "select SubCode,TeacherId,GId,BId,SubBId from ManagingLec where
	AcadYNo='$year' and
	MDays ='$mday' and
	MTimes='$avTime' and
	SemNo='$Sem' and
	UniversityCode='$uncode1' and
	CollegeCode='$CollegeCode1' and
	DeptNo='$DeptNo' and
	AcadDegreeId='$AcadDeg' and
	ClassNo='$Classno' and SecID='$SecID'";

	$Mresult1=mysqli_query($mysqli,$Mang_query1);

    while($mrow1=mysqli_fetch_row($Mresult1))
   {

	//Display SubjectName

	$SubCode=$mrow1[0];

	$SubjectName=GetSubjecttName($CollegeCode1,$uncode1,$DeptNo,$AcadDeg,$Sem,$Classno,$SubCode,$year,$SecID);

	//Display TeacherName

		$TeacherId=$mrow1[1];

		$TeacherName=GetTeacherName($CollegeCode1,$uncode1,$TeacherId);

	//Return GroupName

	$GId=$mrow1[2];

	if($GId>0)
	{
		$GroupName=GetGroup($CollegeCode1,$uncode1,$DeptNo,$AcadDeg,$Sem,$Classno,$year,$GId,$SecID);

		$details=$details."<div>".$SubjectName."-".$GroupName."&nbsp;";
	}
	else
	{
		$details=$details."<div>".$SubjectName."&nbsp; ";

	}

	// Check the Type Of Lecture

	if (($BId==1)&&($GId==0))
	{
		//
		//$BuildingName=GetBuildingName($CollegeCode1,$uncode1,$BId);
		$details=$details."[ &#1605;&#1581;&#1575;&#1590;&#1585;&#1577;] "."</div>";
	}
	else
	if (($BId==1)&&($GId>0))
	{
		$details=$details."[ &#1578;&#1605;&#1575;&#1585;&#1610;&#1606;]"."</div>";
	}
	else
	if($BId==2)
	{
		$details=$details."[  &#1605;&#1593;&#1605;&#1604;] "."</div>";
	}

	$qBId=$mrow1[3];
	$LectureName=$mrow1[4];
	$BName=GetBuildingName($CollegeCode1,$uncode1,$qBId,$LectureName);


	$details=$details."<div>".$TeacherName."</div>";
	$details=$details."<div >"."[".$BName."] "."</div>";


  }//end while

	return $details;
}
///
// use in delete

function DeleteDetails($year,$mday,$avTime,$uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem,$TeacherId,$f,$SecID,$BId)
{
	// Display contains:
	// SubjectName:
			//> if(GId==0): Lecture
			//> if(GId>0)and(SubType==1):Tutorial
			//> if(GId>0)and(SubType==2):Lab
	// TeacherName:
	// Building Lecture:

	// first return the Building ($BId and $LectureName)
   //echo("year=".$year."day=".$mday."time=".$avTime);
  	//echo("uinv=".$uncode1."coll=".$CollegeCode1."dept=".$DeptNo."Acad=".$AcadDeg."class=".$Classno."sem=".$Sem);

	$details="&nbsp;";
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
	$conn = db_connect();

	$Mang_query1 = "select SubCode,TeacherId,GId,BId,SubBId from ManagingLec where
	AcadYNo='$year' and
	MDays ='$mday' and
	MTimes='$avTime' and
	SemNo='$Sem' and
	UniversityCode='$uncode1' and
	CollegeCode='$CollegeCode1' and
	DeptNo='$DeptNo' and
	AcadDegreeId='$AcadDeg' and
	ClassNo='$Classno' and SecID='$SecID' and
	TeacherId='$TeacherId'";

	$Mresult1=mysqli_query($mysqli,$Mang_query1);

    if($mrow1=mysqli_fetch_row($Mresult1))
   {

	//Display SubjectName

	$SubCode=$mrow1[0];

	$SubjectName=GetSubjectName($CollegeCode1,$uncode1,$DeptNo,$AcadDeg,$Sem,$Classno,$SubCode);

	//Display TeacherName

		$TeacherId=$mrow1[1];

		$TeacherName=GetTeacherName($CollegeCode1,$uncode1,$TeacherId);

		//echo("<p>"."&#1575;&#1604;&#1575;&#1587;&#1578;&#1575;&#1584;:".$TeacherName."</p>");

	//Return GroupName

	$GId=$mrow1[2];

	if($GId>0)
	{
		$GroupName=GetGroup($CollegeCode1,$uncode1,$DeptNo,$AcadDeg,$Sem,$Classno,$year,$GId,$SecID);

		$details=$details."<div>"."&#1575;&#1604;&#1605;&#1575;&#1583;&#1577;:".$SubjectName."-".$GroupName."&nbsp;&nbsp;";
	}
	else
	{
		$details=$details."<div>"."&#1575;&#1604;&#1605;&#1575;&#1583;&#1577;:".$SubjectName."&nbsp; &nbsp;";

	}

	// Check the Type Of Lecture

	if (($BId==1)&&($GId==0))
	{
		//
		//$BuildingName=GetBuildingName($CollegeCode1,$uncode1,$BId);
		$details=$details."[ &nbsp; &#1605;&#1581;&#1575;&#1590;&#1585;&#1577; &nbsp;] "."</div>";
	}
	else
	if (($BId==1)&&($GId>0))
	{
		$details=$details."[ &nbsp; &#1578;&#1605;&#1575;&#1585;&#1610;&#1606; &nbsp;]"."</div>";
	}
	else
	if($BId==2)
	{
		$details=$details."[ &nbsp; &#1605;&#1593;&#1605;&#1604; &nbsp; ] &nbsp;"."</div>";
	}

	$qBId=$mrow1[3];
	$LectureName=$mrow1[4];
	$BName=GetBuildingName($CollegeCode1,$uncode1,$qBId,$LectureName);


	$details=$details."<div>"."&#1575;&#1604;&#1575;&#1587;&#1578;&#1575;&#1584;:".$TeacherName."</div>";
	$details=$details."<div>"."[ &nbsp;&nbsp;".$BName."] &nbsp;&nbsp;"."</div>";

  	if($f!=1)
  	{
  	$details=$details."<div><b><font size='2' face='Traditional Arabic' color='red'>".
	"<a title='Delete Subject' href='deleteLec.php?AcadDeg=$AcadDeg&Class=$Classno&Sem=$Sem&uncode=$uncode1&CollegeCode=$CollegeCode1&Dept=$DeptNo&avTime=$avTime&mday=$mday&year=$year&BId=$qBId&SubBId=$LectureName&GId=$GId&TeacherId=$TeacherId&SubCode=$SubCode&flag=1&SecID=$SecID'>&#1581;&#1584;&#1601;</a></font></b></div>";
	}


  }//end while

	return $details;

}//end of method

//---------------------------------

//Modified on :05/10/2008

//This Method used to Get SubCode from ManagingLec 

function SubCodeFromManaging($year,$mday,$uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$Classno,$Sem)
{
	
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
	//$conn = db_connect();

	$Mquery = "select SubCode from ManagingLec where
	AcadYNo='$year' and
	MDays ='$mday' and
	SemNo='$Sem' and
	UniversityCode='$uncode1' and
	CollegeCode='$CollegeCode1' and
	DeptNo='$DeptNo' and
	AcadDegreeId='$AcadDeg' and
	ClassNo='$Classno'";

	$Mresult=mysqli_query($mysqli,$Mquery);

    while($mrow=mysqli_fetch_row($Mresult))
	{
		echo(" ".$mrow[0]." > ".$mrow[1]."</br>");
	}

}


//--------------------------------
//modified:Thr 25-09-2008
//Insert Academin Program

function AddAcadProgram($uncode,$CollegeCode,$AcadProgName,$NoofSem)
{
?>
<div align="center">
<?php
$href="AddAcadProg.php?uncode=$uncode&CollegeCode=$CollegeCode";
?>
<form action="<?php echo($href);?>" method="post">
	<table border="0" width="78%" id="table17">
		<tr>
			<td>
			<div align="center">
			<table border="2" width="95%" bordercolorlight="#003366" bordercolordark="#003366" id="table18" bordercolor="#003366">
				<tr >
					<td bordercolor="#003366" align="right" bgcolor="#2F446F" height="16">
					<b><font color="#FFFFFF" size="5" face="Traditional Arabic">
					<!--&#1578;&#1587;&#1580;&#1610;&#1604; &#1575;&#1604;&#1576;&#1585;&#1575;&#1605;&#1580; &#1575;&#1604;&#1575;&#1603;&#1575;&#1583;&#1610;&#1605;&#1610;&#1577;-->
							&#1578;&#1587;&#1580;&#1610;&#1604; &#1575;&#1604;&#1576;&#1585;&#1575;&#1605;&#1580; &#1575;&#1604;&#1575;&#1603;&#1575;&#1583;&#1610;&#1605;&#1610;&#1577;

					</font></b>
					</td>
				</tr>
				<tr>
					<td bordercolor="#003366" align="right" bgcolor="#5A74A0" height="15" bordercolorlight="#B0CCFF" bordercolordark="#B0CCFF">
					<table border="0" width="100%" id="table19">
					<tr>
					   <td height="28%" width="76%">
						<p align="right">
								<input type="text" size="33" name="T1" value="<?php echo($AcadProgName);?>" dir="rtl" style="color: #003366; font-family: Traditional Arabic; font-size: 12pt; font-weight: bold" tabindex="1"/>
						</p>
						</td>
					
						<td height="28%" width="22%">
							<p align="center">
							<font face="Traditional Arabic" size="4" color="#FFFFFF"><b>
								<span lang="ar-sa">
										&#1575;&#1604;&#1576;&#1585;&#1606;&#1575;&#1605;&#1580; &#1575;&#1604;&#1575;&#1603;&#1575;&#1583;&#1610;&#1605;&#1610;
								</span></b></font>
							</p>
						</td>
				   </tr>
					
					<tr>
					   <td height="28%" width="76%">
						<p align="right">
								<input type="text" size="20" name="T2" value="<?php echo($NoofSem);?>" dir="rtl" style="color: #003366; font-family: Traditional Arabic; font-size: 12pt; font-weight: bold" tabindex="1"/>
						</p>
						</td>
					
						<td height="28%" width="22%">
							<p align="center">
							<font face="Traditional Arabic" size="4" color="#FFFFFF"><b>
								<span lang="ar-sa">
										&#1593;&#1583;&#1583; &#1575;&#1604;&#1601;&#1589;&#1608;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1610;&#1577;
								</span></b></font>
							</p>
						</td>
				   </tr>
				    </table>
					</td>
					</tr>
					<tr>
						<td bordercolor="#003366" align="center" width="93%" bgcolor="#2F446F" bordercolorlight="#2F446F" bordercolordark="#2F446F">
						<input type="submit" value="   &#1581;&#1601;&#1592;  " name="B2" style="color: #FFFFFF; font-family: Traditional Arabic; font-size: 14pt; font-weight: bold; background-color: #5A74A0" tabindex="3"></td>
					</tr>
				</table>
				</div>
			</div>
			</td>
		</tr>
	</table>
</form>
</div>
</div>
<?php
}//end of method


//Register Depart Sections
//Modified on 07/November/2008 

function DeptSection_Form($CollegeCode,$uncode,$DeptNo,$SecName,$ClassNo,$FlagSec,$do)
{
	
?>
		<form  name="f1" method="POST" action="DeptSecResult.php?uncode=<?php echo($uncode);?>&CollegeCode=<?php echo($CollegeCode);?>&do=<?php echo($do);?>">
		<div align="center">

				  <table border="2" width="51%" bordercolorlight="#003366" bordercolordark="#003366" id="table1" bordercolor="#003366" bgcolor="#5A74A0" height="142">
				<?php
				if (($do==1)||($do==2))
				{
				}
				else
				{
				?>
				<tr>
						<td bordercolor="#003366" align="right" bgcolor="#B0CCFF" height="43" colspan="2" bordercolorlight="#003366" bordercolordark="#003366">
					    <img border="0" id="img46" src="Depart_Files/DeptSections.jpg" height="29" width="147"  fp-style="fp-btn: Embossed Capsule 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 18; fp-font-color-normal: #FFFFFF; fp-font-color-hover: #FFFFFF; fp-font-color-press: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #B0CCFF" alt="&#1578;&#1581;&#1583;&#1610;&#1583; &#1575;&#1604;&#1578;&#1582;&#1589;&#1589;&#1575;&#1578;" fp-title="&#1578;&#1581;&#1583;&#1610;&#1583; &#1575;&#1604;&#1578;&#1582;&#1589;&#1589;&#1575;&#1578;"></td>
				</tr>
	 			<?php
	 			}
	 			?>
	 			<tr>
						<td bordercolor="#5A74A0" align="right" width="71%" bgcolor="#5A74A0" height="31" bordercolorlight="#003366" bordercolordark="#003366">
						<p align="right">
							<select size="1" name="D1" dir="rtl" style="font-family: Traditional Arabic; font-size: 12pt; color: #003366; font-weight: bold" onchange="javascript:document.f1.action='DeptSecResult.php?uncode=<?php echo($uncode);?>&CollegeCode=<?php echo($CollegeCode);?>&chit=1';javascript:document.f1.submit();">
						<!-- $DeptName-->
						<?php
							
							$DeptNo=$_POST['D1'];
							//Display all Departs
							$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
							$conn = db_connect();
							
								$result=mysqli_query($mysqli,"select DeptNo,DeptName from Departments where UniversityCode='$uncode' and  CollegeCode='$CollegeCode'");
								
							if(mysqli_num_rows($result)>0)
							{
								$ch=1;
								while($row=mysqli_fetch_row($result))
								{
						?>
								<option <?php if( (strcmp($DeptNo,$row[0])==0 )||($ch==1)){?> selected <?php }?> value="<?php echo($row[0]);?>">
								<?php 
									//depart name
									echo($row[1]);
									$ch++;
								?>
								</option>
						<?php
								}//end of while
							}//end of if
						?>
						</select>
					</td>
						
				
						<td bordercolor="#5A74A0" align="right" width="26%" bgcolor="#5A74A0" height="31" bordercolorlight="#003366" bordercolordark="#003366">
						<p align="center">
							<img border="0" id="img48" src="InsertDept/button4E.jpg" height="27" width="135"  fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" ></td>
				</tr>
	 			
	 			<tr>
					<td align="center" width="70%" valign="bottom" bordercolorlight="#003366" bordercolordark="#003366" bgcolor="#5A74A0">					
						<p align="right">					
						<select size="1" name="D2" dir="rtl" style="font-family: Traditional Arabic; font-size: 12pt; color: #003366; font-weight: bold" onchange="javascript:document.f1.action='DeptSecResult.php?uncode=<?php echo($uncode);?>&CollegeCode=<?php echo($CollegeCode);?>&chit=1';javascript:document.f1.submit();">
							
					<?php
					$FlagSec=$_POST['D2'];
					$selected1="";
					$selected2="";
					if($FlagSec==0)
						$selected1="selected";
					else
					if($FlagSec==1)
						$selected2="selected";
						
					?>
						<option <?php echo($selected1);?> value="0">
								&#1604;&#1575;&#1610;&#1608;&#1580;&#1583; &#1578;&#1582;&#1589;&#1589;&#1575;&#1578; &#1576;&#1575;&#1604;&#1587;&#1606;&#1577; &#1575;&#1604;&#1606;&#1607;&#1575;&#1574;&#1610;&#1577;
						</option>
						
						<option <?php echo($selected2);?> value="1">
								&#1575;&#1583;&#1582;&#1575;&#1604; &#1575;&#1604;&#1578;&#1582;&#1589;&#1589;&#1575;&#1578; &#1576;&#1575;&#1604;&#1587;&#1606;&#1577; &#1575;&#1604;&#1606;&#1607;&#1575;&#1574;&#1610;&#1577;
						</option>
					
					</select>
					</p>
				</td>
			
					<td bordercolor="#003366" align="right" width="26%" bgcolor="#5A74A0" bordercolorlight="#003366" bordercolordark="#003366">
					&nbsp;</td>
				</tr>
	 			<?php
	 			if($_POST['D2'])
	 			{
	 			?>
	 			<tr>
					<td align="center" width="70%" bordercolorlight="#003366" bordercolordark="#003366" bgcolor="#5A74A0">
						<p align="right">
								<input type="text" name="T1" value="<?php echo($SecName);?>" size="30" style="color:#003366; font-family:Traditional Arabic; font-weight:bold; font-size:12pt" tabindex="3" dir="rtl" />
						</p>
					</td>

					<td bordercolor="#003366" align="right" width="26%" bgcolor="#5A74A0" bordercolorlight="#003366" bordercolordark="#003366">
						<p align="center"><b>
							<font color="#FFFFFF" face="Traditional Arabic" size="4">
							<?php
							//get ClassName
							$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
							//$conn = db_connect();
							$resclass=mysqli_query($mysqli,"select ClassName from ClassYear where ClassNo='$ClassNo'");
							$row=mysqli_fetch_row($resclass);							
							echo("<span dir='rtl'>".$row[0]." / &#1578;&#1582;&#1589;&#1589;"."</span>");
							?>
							</font></b>
					</td>
				</tr>
	 			<?php
	 			}//end of submilt [D2]
	 			?>	  
	 			<tr>
						<td bordercolor="#003366" align="center" width="92%" valign="bottom" colspan="2" bgcolor="#B0CCFF" bordercolorlight="#003366" bordercolordark="#003366">

						<?php
						if($do==1)
						{
							//do update
						?>					
								<input name="B1" type="submit" value="   &#1578;&#1593;&#1583;&#1610;&#1604;    "  tabindex="3" style="color: #FFFFFF; font-size: 14pt; font-weight: bold; font-family: Traditional Arabic; vertical-align: middle; letter-spacing: 2; border: 3px inset #B0CCFF; ; background-color:#5A74A0" dir="rtl">
						<?php
						}
						else
						if($do==2)
						{
							//do Delete
						?>
						
								<input name="B2" type="submit" value="   &#1581;&#1584;&#1601;    "  tabindex="3" style="color: #FFFFFF; font-size: 14pt; font-weight: bold; font-family: Traditional Arabic; vertical-align: middle; letter-spacing: 2; border: 3px inset #B0CCFF; ; background-color:#5A74A0" dir="rtl">

						<?php
						}
						else
						{
						//save
						?>
								<input name="B3" type="submit" value="   &#1581;&#1601;&#1592;    "  tabindex="3" style="color: #FFFFFF; font-size: 14pt; font-weight: bold; font-family: Traditional Arabic; vertical-align: middle; letter-spacing: 2; border: 3px inset #B0CCFF; ; background-color:#5A74A0" dir="rtl">

						<?php
						}//end of else
						?>
					</td>
				</tr>
				
				</table>
					</div>

	</form>

<?php
}//end of method


?>