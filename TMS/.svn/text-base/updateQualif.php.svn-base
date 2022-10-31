<?php	
	
require_once('main.php');

//Page Title

Display_Title();

$conn = db_connect();

$year=GetMaxYear();
$count=1;

while($count <= 9)
{
	switch($count)
	{
		case 1:{
				 //Austaz
				 $TeacherQualif="&#1575;&#1587;&#1578;&#1575;&#1584;";
				 
				 $results=mysql_query("update Teachers set Qualif='1' where Qualif='$TeacherQualif' and AcadYNo='$year'");
				 break;
			   }
		
		case 2:{
				// Co.Austaz
				 $TeacherQualif="&#1575;&#1587;&#1578;&#1575;&#1584; &#1605;&#1588;&#1575;&#1585;&#1603;";
				 
				 $results=mysql_query("update Teachers set Qualif='2' where Qualif='$TeacherQualif' and AcadYNo='$year'");

				 break;
			   }
		
		case 3:{
				// Assistant.Austaz
				$TeacherQualif="&#1575;&#1587;&#1578;&#1575;&#1584; &#1605;&#1587;&#1575;&#1593;&#1583;";
				
				$results=mysql_query("update Teachers set Qualif='3' where Qualif='$TeacherQualif' and AcadYNo='$year'");

				 break;
			   }
		
		case 4:{
				// Lectural
				$TeacherQualif="&#1605;&#1581;&#1575;&#1590;&#1585;";
				
				$results=mysql_query("update Teachers set Qualif='4' where Qualif='$TeacherQualif' and AcadYNo='$year'");

				 break;
			   }
		
		case 5:{
				// Teaching Assistant
				$TeacherQualif="&#1605;&#1587;&#1575;&#1593;&#1583; &#1578;&#1583;&#1585;&#1610;&#1587;";
				
				$results=mysql_query("update Teachers set Qualif='5' where Qualif='$TeacherQualif' and AcadYNo='$year'");

				 break;
			   }
		case 6:{
				// Kapeer.Teacher[Modares] 
				$TeacherQualif="&#1603;&#1576;&#1610;&#1585; &#1605;&#1583;&#1585;&#1587;&#1610;&#1606;";
				
				$results=mysql_query("update Teachers set Qualif='6' where Qualif='$TeacherQualif' and AcadYNo='$year'");

				 break;
			   }
		
		case 7:{
				// First.Teacher[Modares] 
				$TeacherQualif="&#1605;&#1583;&#1585;&#1587; &#1571;&#1608;&#1604;";
				
				$results=mysql_query("update Teachers set Qualif='7' where Qualif='$TeacherQualif' and AcadYNo='$year'");

				 break;
			   }
			   
		case 8:{
				// Teacher[Modares] 
				$TeacherQualif="&#1605;&#1583;&#1585;&#1587;";
				
				$results=mysql_query("update Teachers set Qualif='8' where Qualif='$TeacherQualif' and AcadYNo='$year'");

				 break;
			   }
		
		case 9:{
				// Technical Lectural
				$TeacherQualif="&#1605;&#1581;&#1575;&#1590;&#1585; &#1578;&#1603;&#1606;&#1608;&#1604;&#1608;&#1580;&#1609;";
				
				$results=mysql_query("update Teachers set Qualif='9' where Qualif='$TeacherQualif' and AcadYNo='$year'");

				 break;
			   }

	}//end of switch
	
	if($results==true)
	{	
		echo("</br> Successfully update ". $TeacherQualif ." with ".$count."</br>");		
		$count++;		
		
	}
	else
	{
		echo("not update .. </br>");		
		break;
	}
		
}//end of while
	
	
//Change Table Structure
	
	$result2=mysql_query("ALTER TABLE `teachers` CHANGE `Qualif` `Qualif` INT( 2 ) NOT NULL ");
	
	if($result2)
	{
		echo("</br>Successfully Update tabble Structure .. </br>");	
 	}
 	else
 	{
		echo(".. not change table structure ....</br>"); 	
 	}



?>