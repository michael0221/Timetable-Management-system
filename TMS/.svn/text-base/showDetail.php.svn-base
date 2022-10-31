<?php

session_start();

require_once('main.php');

//Page Title

Display_Title();

Background_Page();

//Filter Lectuer depend on :

$year = $_GET['year'];

$mday= $_GET['mday'];

$avTime= $_GET['avt'];

$Sem = $_GET['sem'];
$Sem=intval($Sem);

//Get Current Values from Lecture-Form:

$curuncode = $_GET['uncode'];
$curuncode=intval($curuncode);

$curCollegeCode = $_GET['Coll'];
$curCollegeCode=intval($curCollegeCode);

$curDeptNo = $_GET['DeptNo'];
$curDeptNo=intval($curDeptNo);


$curAcadDeg = $_GET['AcadDeg'];
$curAcadDeg=intval($curAcadDeg);


$curClassno = $_GET['Classno'];
$curClassno=intval($curClassno);

$curSecID = $_GET['SecID'];
$curSecID=intval($curSecID);

$curBId = $_GET['BId'];
$curBId=intval($curBId);

$mLectureName= $_GET['LN'];

//Current Teacher
$curteach = $_GET['curteach'];
$curteach=intval($curteach);

//Current Group
$curGId= $_GET['GId'];
$curGId=intval($curGId);


	
//echo("curBID=".$curBId);


switch($mday)
{
	case '1': {
				$days='&#1575;&#1604;&#1587;&#1576;&#1578;';
				break;
			  }
	case '2': {
				$days='&#1575;&#1604;&#1575;&#1581;&#1583;';
				break;}
	case '3': {
				$days='&#1575;&#1604;&#1575;&#1579;&#1606;&#1610;&#1606;';
				break;}
	case '4': {
				$days='&#1575;&#1604;&#1579;&#1604;&#1575;&#1579;&#1575;&#1569;';
				break;}
	case '5': {
				$days='&#1575;&#1604;&#1575;&#1585;&#1576;&#1593;&#1575;&#1569;';
				break;}
	case '6': {
				$days='&#1575;&#1604;&#1582;&#1605;&#1610;&#1587;';
				break;}

	default: $days='';
}

//Display Details

	$Mang_query1 = "select DeptNo,AcadDegreeId,ClassNo,SubCode,TeacherId,GId,SubType,UniversityCode,CollegeCode,BId,SubBId,SecID from ManagingLec where
	AcadYNo='$year' and
	MDays ='$mday' and
	MTimes='$avTime' and
	SemNo='$Sem'
	order by CollegeCode";

	//and TeacherId='$mteach' and BId='$BId' and SubBId='$LectureName'

	$Mresult1=mysql_query($Mang_query1);

   ?>
   <!--Display Tabel Header-->
   <div align="center">
	<table border="2" width="80%" id="table1" dir="rtl" cellpadding="2">
		<tr>
			<td width="40%" bgcolor="#5A74A0" style="border-style:solid; border-width:0px; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px">
			<b><span lang="ar-sa">
			<font size="4" face="Traditional Arabic" color="#FFFFFF">&#1575;&#1604;&#1610;&#1608;&#1605; : <?php echo($days);?></font></span></b></td>
			<td width="40%" bgcolor="#5A74A0" style="border-style:solid; border-width:0px; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px">
			<font face="Traditional Arabic" color="#FFFFFF"><b><span lang="ar-sa">
			<font size="4">&#1575;&#1604;&#1586;&#1605;&#1606;</font></span><font size="4">
			</font> <span lang="ar-sa"><font size="4">&nbsp;<?php echo("[".$avTime."]");?> 
			</font> </span></b></font></td>
		</tr>

   <?php
 
   while($mrow1=mysql_fetch_row($Mresult1))
   {
	
	$showdetail="";

	$DeptNo=$mrow1[0];

	$AcadDeg=$mrow1[1];

	$Classno=$mrow1[2];
	
	$SubCode=$mrow1[3];

	$TeacherId=$mrow1[4];
	
	$uncode=$mrow1[7];
	
	$CollegeCode=$mrow1[8];

	$BId=$mrow1[9];
	$LectureName=$mrow1[10];
	
	$SecID=$mrow1[11];

 	if ( (($curuncode==$uncode)&&($curBId==$BId)&&($mLectureName==$LectureName)) || (($curuncode==$uncode)&&($curteach==$TeacherId)&&($curteach >-1)) || (($curuncode==$uncode)&&($CollegeCode==$curCollegeCode)&&($DeptNo==$curDeptNo)&&($Classno==$curClassno)&&($AcadDeg==$curAcadDeg)&&($SecID==$curSecID)))	
 	{		
		//Display ClassName	
		
		$ClassName=GetClassName($uncode,$CollegeCode,$DeptNo,$AcadDeg,$Classno,$Sem)."&nbsp;";
		
		if (($curuncode==$uncode)&&($CollegeCode==$curCollegeCode)&&($DeptNo==$curDeptNo)&&($Classno==$curClassno)&&($AcadDeg==$curAcadDeg)&&($SecID==$curSecID))
		{
			$flag=1;
			$showdetail="<span style='background-color: #FFFF00'><font size='3' color='black'>".$ClassName."</font></span></br>";
		}
		else
			$showdetail=$ClassName."</br>";
		
		//Display SubjectName

		$SubjectName=GetSubjecttName($CollegeCode,$uncode,$DeptNo,$AcadDeg,$Sem,$Classno,$SubCode,$year,$SecID);

		//Display TeacherName

		if($TeacherId > -1)
		{
			$TeacherName=GetTeacherName($CollegeCode,$uncode,$TeacherId);
		
			if( ($curuncode==$uncode)&&($curteach==$TeacherId) )
			{
				$flag=2;				
					$showdetail=$showdetail."&#1575;&#1604;&#1575;&#1587;&#1578;&#1575;&#1584;:"."<span style='background-color: #FFFF00'><font size='3' color='black'>".$TeacherName."</font></span></br>";
			}
			else
				$showdetail=$showdetail."&#1575;&#1604;&#1575;&#1587;&#1578;&#1575;&#1584;:".$TeacherName."</br>";

		}
	
		//Return GroupName

		$GId=$mrow1[5];
		$type=$mrow1[6];

		if($GId>0)
		{
			$GroupName=GetGroup($CollegeCode,$uncode,$DeptNo,$AcadDeg,$Sem,$Classno,$year,$GId,$SecID);

			if($curGId == $GId)
			{	
				$flag=3;				
					$showdetail=$showdetail."&#1575;&#1604;&#1605;&#1575;&#1583;&#1577;:".$SubjectName."-"."<span style='background-color: #FFFF00'><font size='3' color='black'>".$GroupName."</font></span></br>";
			}
			else
				$showdetail=$showdetail."&#1575;&#1604;&#1605;&#1575;&#1583;&#1577;:".$SubjectName."-".$GroupName."</br>";
		}
		else
		{

			$showdetail=$showdetail."&#1575;&#1604;&#1605;&#1575;&#1583;&#1577;:".$SubjectName."</br>";

		}

		// Check the Type Of Lecture

		if (($type==1)&&($GId==0))
		{
			//
			//$BuildingName=GetBuildingName($CollegeCode,$uncode,$BId);
			$showdetail=$showdetail."[ &nbsp; &#1605;&#1581;&#1575;&#1590;&#1585;&#1577; &nbsp;]";
		}
		else
		if (($type==1)&&($GId>0))
		{
			$showdetail=$showdetail."[ &nbsp; &#1578;&#1605;&#1575;&#1585;&#1610;&#1606; &nbsp;]";
		}
		else
		if(($type==2)&&($GId>0))
		{
			//check if there is a teacher or not
			if($TeacherId == -1)
			{
				$showdetail=$showdetail."[ &nbsp; &#1605;&#1593;&#1605;&#1604; &#1605;&#1601;&#1578;&#1608;&#1581; &nbsp; ] &nbsp;";
			}
			else
				$showdetail=$showdetail."[ &nbsp; &#1605;&#1593;&#1605;&#1604; &nbsp; ] &nbsp;";
		}


		$BName=GetBuildingName($CollegeCode,$uncode,$BId,$LectureName);
		
		if( ($curuncode==$uncode)&&($curBId==$BId)&&($LectureName==$mLectureName))
		{
				$flag=4;
				$showdetail=$showdetail."[ &nbsp;&nbsp;"."<span style='background-color: #FFFF00'><font size='3' color='black'>".$BName."</font></span>"." &nbsp; ]". "</br>";
		}
		else
			$showdetail=$showdetail."[ &nbsp;&nbsp;".$BName." &nbsp; ]". "</br>";
	
	//check data
	if($flag > 0)
	{
	?>
	<tr align="right">
		<td width="80%" colspan="2" bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF" style="border-style:solid; border-width:1px; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px"><b>
		<font size="3" face="Traditional Arabic" ><b><?php echo($showdetail);?></b></font></b></td>
	</tr>
<?php
 		$flag=0;

 	}//end of check data
 	
  }//end of if

 }//end while
?>

</table>

</div>
