<?php

session_start();
require_once('main.php');
$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
//$conn = db_connect();
//Page Title

Display_Title();

Background_Page();

$username=$_SESSION['username'];


if($username)
{
	//get variables

	$AcadDeg = $_GET['AcadDeg'];
	$AcadDeg=intval($AcadDeg);

	$Classno = $_GET['Class'];
	$Classno=intval($Classno);

	$CollegeCode = $_GET['CollegeCode'];
	$CollegeCode1=intval($CollegeCode);

	$uncode=$_GET['uncode'];
	$uncode1=intval($uncode);

	$DeptNo = $_GET['Dept'];
	$DeptNo=intval($DeptNo);

	$Sem = $_GET['Sem'];
	$Sem=intval($Sem);

	$op=$_GET['op'];
	$op=intval($op);

	// s refer to type of lectuer lec=1 and tuotorial=2

	$s=$_GET['s'];
	$s=intval($s);
	//echo("s=".$s);

	// values of First Form
	$year=$_GET['year'];

	$LecNo=$_GET['LecNo'];
	$LecNo=intval($LecNo);

	$mday=$_GET['mday'];
	$mday=intval($mday);

	$msub=$_GET['msub'];

	$mteach=$_GET['mteach'];
	$mteach=intval($mteach);

	$GId=$_GET['GId'];
	$GId=intval($GId);

	$SecID=$_GET['SecID'];
	$SecID=intval($SecID);

	//get Other Depart
	if(GetNumberOfClasses($AcadDeg)> $Classno)
	{

		$SecID=0;
		$otherDept=$_GET['otherDept'];
		
		$numbox=$_GET['numbox'];
		
	}
	else
	{
		//check if there any Sections
		//$SecID=$_POST['DSec'];
		
		if($SecID==0)
			$SecID=0;
		
		$otherDept=$_GET['otherDept'];
		
		$numbox=$_GET['numbox'];
		
	}
	
	//get College Time Slots
	
	$Timeslot=GetCollegeTimeSlot($uncode1,$CollegeCode1,$Sem,$year);
	//
	//echo("group=".$GId."  [op=".$op);
		//echo("</br>"."year=".$year."</br>"."lec=".$LecNo."</br>"."day=".$mday."</br>"."</br>"."sub=".$msub."</br>"."teach=".$mteach."</br>GID=".$StudGroup);

	if($_POST['submit'])
	{
		
		//check the No of Hours
		//*****************************
		$counter=0;
		$c=1;
		while($c<=24)	//before:12
		{
			$check='C'.$c;

			if($_POST[$check]=="ON")
			{
				$counter=$counter+1;

			}
			$c=$c+1;
			$check='';
		}
		//*********************************
		//echo('counter='.$counter);

		$shour=$_SESSION['subHour'];


		//echo('SubjectHours='.$shour);

		if (($shour>0)&&(($counter/2)<=$shour))
		 {
			// valid data(after validatin)
			// OUR GOAL >>insert data on table ManagingLec
		 	//echo('valid hours');

			$conn = db_connect();

			if($_POST['C1'])
			{	
					$ssql = "insert into ManagingLec (AcadYNo,MDays,MTimes,BId,SubBId,UniversityCode,CollegeCode,DeptNo,AcadDegreeId,SemNo,ClassNo,SecID,SubCode,SubType,GId,TeacherId) values
					('$year','$mday','$Timeslot[0]','$op','$LecNo','$uncode1','$CollegeCode1','$DeptNo','$AcadDeg','$Sem','$Classno','$SecID','$msub','$op','$GId','$mteach')";
				$results = mysqli_query($mysqli,$ssql);
				
				if (($results)&&($numbox>0))
		  		{
					//echo("Sucess");
		
					//insert other depart
					$otherDept=$_SESSION['otherDept'];
					
					//Insert same Lecture to another Depart 
						InsertOnOtherDepart($numbox,$otherDept,$year,$mday,$Timeslot[0],$op,$LecNo,$uncode1,$CollegeCode1,$Sem,$Classno,$SecID,$msub,$GId,$mteach,$AcadDeg,$DeptNo);
					
		 		}//end of result
		 	}

			if($_POST['C2'])
			{
					$ssql = "insert into ManagingLec (AcadYNo,MDays,MTimes,BId,SubBId,UniversityCode,CollegeCode,DeptNo,AcadDegreeId,SemNo,ClassNo,SecID,SubCode,SubType,GId,TeacherId) values
					('$year','$mday','$Timeslot[1]','$op','$LecNo','$uncode1','$CollegeCode1','$DeptNo','$AcadDeg','$Sem','$Classno','$SecID','$msub','$op','$GId','$mteach')";
				$results = mysqli_query($mysqli,$ssql);
				
				if (($results)&&($numbox>0))
				{
					//echo("Sucess");
					
					//insert other depart
					$otherDept=$_SESSION['otherDept'];

					//Insert same Lecture to another Depart 
						InsertOnOtherDepart($numbox,$otherDept,$year,$mday,$Timeslot[1],$op,$LecNo,$uncode1,$CollegeCode1,$Sem,$Classno,$SecID,$msub,$GId,$mteach,$AcadDeg,$DeptNo);
						
				}
		 	}

			if($_POST['C3'])
			{
				$ssql = "insert into ManagingLec (AcadYNo,MDays,MTimes,BId,SubBId,UniversityCode,CollegeCode,DeptNo,AcadDegreeId,SemNo,ClassNo,SecID,SubCode,SubType,GId,TeacherId) values
				('$year','$mday','$Timeslot[2]','$op','$LecNo','$uncode1','$CollegeCode1','$DeptNo','$AcadDeg','$Sem','$Classno','$SecID','$msub','$op','$GId','$mteach')";
				$results = mysqli_query($mysqli,$ssql);
				
				if (($results)&&($numbox>0))
		  		{
					//echo("Sucess");
		
					//insert other depart
					$otherDept=$_SESSION['otherDept'];
					
					//Insert same Lecture to another Depart 
						InsertOnOtherDepart($numbox,$otherDept,$year,$mday,$Timeslot[2],$op,$LecNo,$uncode1,$CollegeCode1,$Sem,$Classno,$SecID,$msub,$GId,$mteach,$AcadDeg,$DeptNo);
					
		 		}//end of result
		 	}

			if($_POST['C4'])
			{
				$ssql = "insert into ManagingLec (AcadYNo,MDays,MTimes,BId,SubBId,UniversityCode,CollegeCode,DeptNo,AcadDegreeId,SemNo,ClassNo,SecID,SubCode,SubType,GId,TeacherId) values
				('$year','$mday','$Timeslot[3]','$op','$LecNo','$uncode1','$CollegeCode1','$DeptNo','$AcadDeg','$Sem','$Classno','$SecID','$msub','$op','$GId','$mteach')";
				$results = mysqli_query($mysqli,$ssql);
				if (($results)&&($numbox>0))
		  		{
					//echo("Sucess");
		
					//insert other depart
					$otherDept=$_SESSION['otherDept'];
					
					//Insert same Lecture to another Depart 
						InsertOnOtherDepart($numbox,$otherDept,$year,$mday,$Timeslot[3],$op,$LecNo,$uncode1,$CollegeCode1,$Sem,$Classno,$SecID,$msub,$GId,$mteach,$AcadDeg,$DeptNo);
					
		 		}//end of result
		 	}

			if($_POST['C5'])
			{
				$ssql = "insert into ManagingLec (AcadYNo,MDays,MTimes,BId,SubBId,UniversityCode,CollegeCode,DeptNo,AcadDegreeId,SemNo,ClassNo,SecID,SubCode,SubType,GId,TeacherId) values
				('$year','$mday','$Timeslot[4]','$op','$LecNo','$uncode1','$CollegeCode1','$DeptNo','$AcadDeg','$Sem','$Classno','$SecID','$msub','$op','$GId','$mteach')";
				$results = mysqli_query($mysqli,$ssql);
				if (($results)&&($numbox>0))
		  		{
					//echo("Sucess");
		
					//insert other depart
					$otherDept=$_SESSION['otherDept'];
					
					//Insert same Lecture to another Depart 
						InsertOnOtherDepart($numbox,$otherDept,$year,$mday,$Timeslot[4],$op,$LecNo,$uncode1,$CollegeCode1,$Sem,$Classno,$SecID,$msub,$GId,$mteach,$AcadDeg,$DeptNo);
					
		 		}//end of result
		 	}

			if($_POST['C6'])
			{
				$ssql = "insert into ManagingLec (AcadYNo,MDays,MTimes,BId,SubBId,UniversityCode,CollegeCode,DeptNo,AcadDegreeId,SemNo,ClassNo,SecID,SubCode,SubType,GId,TeacherId) values
				('$year','$mday','$Timeslot[5]','$op','$LecNo','$uncode1','$CollegeCode1','$DeptNo','$AcadDeg','$Sem','$Classno','$SecID','$msub','$op','$GId','$mteach')";
				$results = mysqli_query($mysqli,$ssql);
				if (($results)&&($numbox>0))
		  		{
					//echo("Sucess");
		
					//insert other depart
					$otherDept=$_SESSION['otherDept'];
					
					//Insert same Lecture to another Depart 
						InsertOnOtherDepart($numbox,$otherDept,$year,$mday,$Timeslot[5],$op,$LecNo,$uncode1,$CollegeCode1,$Sem,$Classno,$SecID,$msub,$GId,$mteach,$AcadDeg,$DeptNo);
					
		 		}//end of result
		 	}

			if($_POST['C7'])
			{
				$ssql = "insert into ManagingLec (AcadYNo,MDays,MTimes,BId,SubBId,UniversityCode,CollegeCode,DeptNo,AcadDegreeId,SemNo,ClassNo,SecID,SubCode,SubType,GId,TeacherId) values
				('$year','$mday','$Timeslot[6]','$op','$LecNo','$uncode1','$CollegeCode1','$DeptNo','$AcadDeg','$Sem','$Classno','$SecID','$msub','$op','$GId','$mteach')";
				$results = mysqli_query($mysqli,$ssql);
				
				if (($results)&&($numbox>0))
		  		{
					//echo("Sucess");
		
					//insert other depart
					$otherDept=$_SESSION['otherDept'];
					
					//Insert same Lecture to another Depart 
						InsertOnOtherDepart($numbox,$otherDept,$year,$mday,$Timeslot[6],$op,$LecNo,$uncode1,$CollegeCode1,$Sem,$Classno,$SecID,$msub,$GId,$mteach,$AcadDeg,$DeptNo);
					
		 		}//end of result
		 	}

			if($_POST['C8'])
			{
				$ssql = "insert into ManagingLec (AcadYNo,MDays,MTimes,BId,SubBId,UniversityCode,CollegeCode,DeptNo,AcadDegreeId,SemNo,ClassNo,SecID,SubCode,SubType,GId,TeacherId) values
				('$year','$mday','$Timeslot[7]','$op','$LecNo','$uncode1','$CollegeCode1','$DeptNo','$AcadDeg','$Sem','$Classno','$SecID','$msub','$op','$GId','$mteach')";
				$results = mysqli_query($mysqli,$ssql);
				
				if (($results)&&($numbox>0))
		  		{
					//echo("Sucess");
		
					//insert other depart
					$otherDept=$_SESSION['otherDept'];
					
					//Insert same Lecture to another Depart 
						InsertOnOtherDepart($numbox,$otherDept,$year,$mday,$Timeslot[7],$op,$LecNo,$uncode1,$CollegeCode1,$Sem,$Classno,$SecID,$msub,$GId,$mteach,$AcadDeg,$DeptNo);
					
		 		}//end of result
		 	}

			if($_POST['C9'])
			{
				$ssql = "insert into ManagingLec (AcadYNo,MDays,MTimes,BId,SubBId,UniversityCode,CollegeCode,DeptNo,AcadDegreeId,SemNo,ClassNo,SecID,SubCode,SubType,GId,TeacherId) values
				('$year','$mday','$Timeslot[8]','$op','$LecNo','$uncode1','$CollegeCode1','$DeptNo','$AcadDeg','$Sem','$Classno','$SecID','$msub','$op','$GId','$mteach')";
				$results = mysqli_query($mysqli,$ssql);
				if (($results)&&($numbox>0))
		  		{
					//echo("Sucess");
		
					//insert other depart
					$otherDept=$_SESSION['otherDept'];
					
					//Insert same Lecture to another Depart 
						InsertOnOtherDepart($numbox,$otherDept,$year,$mday,$Timeslot[8],$op,$LecNo,$uncode1,$CollegeCode1,$Sem,$Classno,$SecID,$msub,$GId,$mteach,$AcadDeg,$DeptNo);
					
		 		}//end of result
		 	}

			if($_POST['C10'])
			{
				$ssql = "insert into ManagingLec (AcadYNo,MDays,MTimes,BId,SubBId,UniversityCode,CollegeCode,DeptNo,AcadDegreeId,SemNo,ClassNo,SecID,SubCode,SubType,GId,TeacherId) values
				('$year','$mday','$Timeslot[9]','$op','$LecNo','$uncode1','$CollegeCode1','$DeptNo','$AcadDeg','$Sem','$Classno','$SecID','$msub','$op','$GId','$mteach')";
				$results = mysqli_query($mysqli,$ssql);
				if (($results)&&($numbox>0))
		  		{
					//echo("Sucess");
		
					//insert other depart
					$otherDept=$_SESSION['otherDept'];
					
					//Insert same Lecture to another Depart 
						InsertOnOtherDepart($numbox,$otherDept,$year,$mday,$Timeslot[9],$op,$LecNo,$uncode1,$CollegeCode1,$Sem,$Classno,$SecID,$msub,$GId,$mteach,$AcadDeg,$DeptNo);
					
		 		}//end of result
		 	}

			if($_POST['C11'])
			{
				$ssql = "insert into ManagingLec (AcadYNo,MDays,MTimes,BId,SubBId,UniversityCode,CollegeCode,DeptNo,AcadDegreeId,SemNo,ClassNo,SecID,SubCode,SubType,GId,TeacherId) values
				('$year','$mday','$Timeslot[10]','$op','$LecNo','$uncode1','$CollegeCode1','$DeptNo','$AcadDeg','$Sem','$Classno','$SecID','$msub','$op','$GId','$mteach')";
				$results = mysqli_query($mysqli,$ssql);
				if (($results)&&($numbox>0))
		  		{
					//echo("Sucess");
		
					//insert other depart
					$otherDept=$_SESSION['otherDept'];
					
					//Insert same Lecture to another Depart 
						InsertOnOtherDepart($numbox,$otherDept,$year,$mday,$Timeslot[10],$op,$LecNo,$uncode1,$CollegeCode1,$Sem,$Classno,$SecID,$msub,$GId,$mteach,$AcadDeg,$DeptNo);
					
		 		}//end of result
		 	}

			if($_POST['C12'])
			{
				$ssql = "insert into ManagingLec (AcadYNo,MDays,MTimes,BId,SubBId,UniversityCode,CollegeCode,DeptNo,AcadDegreeId,SemNo,ClassNo,SecID,SubCode,SubType,GId,TeacherId) values
				('$year','$mday','$Timeslot[11]','$op','$LecNo','$uncode1','$CollegeCode1','$DeptNo','$AcadDeg','$Sem','$Classno','$SecID','$msub','$op','$GId','$mteach')";
				$results = mysqli_query($mysqli,$ssql);
				if (($results)&&($numbox>0))
		  		{
					//echo("Sucess");
		
					//insert other depart
					$otherDept=$_SESSION['otherDept'];
					
					//Insert same Lecture to another Depart 
						InsertOnOtherDepart($numbox,$otherDept,$year,$mday,$Timeslot[11],$op,$LecNo,$uncode1,$CollegeCode1,$Sem,$Classno,$SecID,$msub,$GId,$mteach,$AcadDeg,$DeptNo);
					
		 		}//end of result
		 	}
		 	
		 	//Continue 
		 	
		 	if($_POST['C13'])
			{
				$ssql = "insert into ManagingLec (AcadYNo,MDays,MTimes,BId,SubBId,UniversityCode,CollegeCode,DeptNo,AcadDegreeId,SemNo,ClassNo,SecID,SubCode,SubType,GId,TeacherId) values
				('$year','$mday','$Timeslot[12]','$op','$LecNo','$uncode1','$CollegeCode1','$DeptNo','$AcadDeg','$Sem','$Classno','$SecID','$msub','$op','$GId','$mteach')";
				$results = mysqli_query($mysqli,$ssql);
				if (($results)&&($numbox>0))
		  		{
					//echo("Sucess");
		
					//insert other depart
					$otherDept=$_SESSION['otherDept'];
					
					//Insert same Lecture to another Depart 
						InsertOnOtherDepart($numbox,$otherDept,$year,$mday,$Timeslot[12],$op,$LecNo,$uncode1,$CollegeCode1,$Sem,$Classno,$SecID,$msub,$GId,$mteach,$AcadDeg,$DeptNo);
					
		 		}//end of result
		 	}//end of $_Post
		 	
		 	if($_POST['C14'])
			{
				$ssql = "insert into ManagingLec (AcadYNo,MDays,MTimes,BId,SubBId,UniversityCode,CollegeCode,DeptNo,AcadDegreeId,SemNo,ClassNo,SecID,SubCode,SubType,GId,TeacherId) values
				('$year','$mday','$Timeslot[13]','$op','$LecNo','$uncode1','$CollegeCode1','$DeptNo','$AcadDeg','$Sem','$Classno','$SecID','$msub','$op','$GId','$mteach')";
				$results = mysqli_query($mysqli,$ssql);
				if (($results)&&($numbox>0))
		  		{
					//echo("Sucess");
		
					//insert other depart
					$otherDept=$_SESSION['otherDept'];
					
					//Insert same Lecture to another Depart 
						InsertOnOtherDepart($numbox,$otherDept,$year,$mday,$Timeslot[13],$op,$LecNo,$uncode1,$CollegeCode1,$Sem,$Classno,$SecID,$msub,$GId,$mteach,$AcadDeg,$DeptNo);
					
		 		}//end of result
		 	}//end of $_Post

			if($_POST['C15'])
			{
				$ssql = "insert into ManagingLec (AcadYNo,MDays,MTimes,BId,SubBId,UniversityCode,CollegeCode,DeptNo,AcadDegreeId,SemNo,ClassNo,SecID,SubCode,SubType,GId,TeacherId) values
				('$year','$mday','$Timeslot[14]','$op','$LecNo','$uncode1','$CollegeCode1','$DeptNo','$AcadDeg','$Sem','$Classno','$SecID','$msub','$op','$GId','$mteach')";
				$results = mysqli_query($mysqli,$ssql);
				if (($results)&&($numbox>0))
		  		{
					//echo("Sucess");
		
					//insert other depart
					$otherDept=$_SESSION['otherDept'];
					
					//Insert same Lecture to another Depart 
						InsertOnOtherDepart($numbox,$otherDept,$year,$mday,$Timeslot[14],$op,$LecNo,$uncode1,$CollegeCode1,$Sem,$Classno,$SecID,$msub,$GId,$mteach,$AcadDeg,$DeptNo);
					
		 		}//end of result
		 	}//end of $_Post

			if($_POST['C16'])
			{
				$ssql = "insert into ManagingLec (AcadYNo,MDays,MTimes,BId,SubBId,UniversityCode,CollegeCode,DeptNo,AcadDegreeId,SemNo,ClassNo,SecID,SubCode,SubType,GId,TeacherId) values
				('$year','$mday','$Timeslot[15]','$op','$LecNo','$uncode1','$CollegeCode1','$DeptNo','$AcadDeg','$Sem','$Classno','$SecID','$msub','$op','$GId','$mteach')";
				$results = mysqli_query($mysqli,$ssql);
				if (($results)&&($numbox>0))
		  		{
					//echo("Sucess");
		
					//insert other depart
					$otherDept=$_SESSION['otherDept'];
					
					//Insert same Lecture to another Depart 
						InsertOnOtherDepart($numbox,$otherDept,$year,$mday,$Timeslot[15],$op,$LecNo,$uncode1,$CollegeCode1,$Sem,$Classno,$SecID,$msub,$GId,$mteach,$AcadDeg,$DeptNo);
					
		 		}//end of result
		 	}//end of $_Post

			if($_POST['C17'])
			{
				$ssql = "insert into ManagingLec (AcadYNo,MDays,MTimes,BId,SubBId,UniversityCode,CollegeCode,DeptNo,AcadDegreeId,SemNo,ClassNo,SecID,SubCode,SubType,GId,TeacherId) values
				('$year','$mday','$Timeslot[16]','$op','$LecNo','$uncode1','$CollegeCode1','$DeptNo','$AcadDeg','$Sem','$Classno','$SecID','$msub','$op','$GId','$mteach')";
				$results = mysqli_query($mysqli,$ssql);
				if (($results)&&($numbox>0))
		  		{
					//echo("Sucess");
		
					//insert other depart
					$otherDept=$_SESSION['otherDept'];
					
					//Insert same Lecture to another Depart 
						InsertOnOtherDepart($numbox,$otherDept,$year,$mday,$Timeslot[16],$op,$LecNo,$uncode1,$CollegeCode1,$Sem,$Classno,$SecID,$msub,$GId,$mteach,$AcadDeg,$DeptNo);
					
		 		}//end of result
		 	}//end of $_Post


			if($_POST['C18'])
			{
				$ssql = "insert into ManagingLec (AcadYNo,MDays,MTimes,BId,SubBId,UniversityCode,CollegeCode,DeptNo,AcadDegreeId,SemNo,ClassNo,SecID,SubCode,SubType,GId,TeacherId) values
				('$year','$mday','$Timeslot[17]','$op','$LecNo','$uncode1','$CollegeCode1','$DeptNo','$AcadDeg','$Sem','$Classno','$SecID','$msub','$op','$GId','$mteach')";
				$results = mysqli_query($mysqli,$ssql);
				if (($results)&&($numbox>0))
		  		{
					//echo("Sucess");
		
					//insert other depart
					$otherDept=$_SESSION['otherDept'];
					
					//Insert same Lecture to another Depart 
						InsertOnOtherDepart($numbox,$otherDept,$year,$mday,$Timeslot[17],$op,$LecNo,$uncode1,$CollegeCode1,$Sem,$Classno,$SecID,$msub,$GId,$mteach,$AcadDeg,$DeptNo);
					
		 		}//end of result
		 	}//end of $_Post

			if($_POST['C19'])
			{
				$ssql = "insert into ManagingLec (AcadYNo,MDays,MTimes,BId,SubBId,UniversityCode,CollegeCode,DeptNo,AcadDegreeId,SemNo,ClassNo,SecID,SubCode,SubType,GId,TeacherId) values
				('$year','$mday','$Timeslot[18]','$op','$LecNo','$uncode1','$CollegeCode1','$DeptNo','$AcadDeg','$Sem','$Classno','$SecID','$msub','$op','$GId','$mteach')";
				$results = mysqli_query($mysqli,$ssql);
				if (($results)&&($numbox>0))
		  		{
					//echo("Sucess");
		
					//insert other depart
					$otherDept=$_SESSION['otherDept'];
					
					//Insert same Lecture to another Depart 
						InsertOnOtherDepart($numbox,$otherDept,$year,$mday,$Timeslot[18],$op,$LecNo,$uncode1,$CollegeCode1,$Sem,$Classno,$SecID,$msub,$GId,$mteach,$AcadDeg,$DeptNo);
					
		 		}//end of result
		 	}//end of $_Post


			if($_POST['C20'])
			{
				$ssql = "insert into ManagingLec (AcadYNo,MDays,MTimes,BId,SubBId,UniversityCode,CollegeCode,DeptNo,AcadDegreeId,SemNo,ClassNo,SecID,SubCode,SubType,GId,TeacherId) values
				('$year','$mday','$Timeslot[19]','$op','$LecNo','$uncode1','$CollegeCode1','$DeptNo','$AcadDeg','$Sem','$Classno','$SecID','$msub','$op','$GId','$mteach')";
				$results = mysqli_query($mysqli,$ssql);
				if (($results)&&($numbox>0))
		  		{
					//echo("Sucess");
		
					//insert other depart
					$otherDept=$_SESSION['otherDept'];
					
					//Insert same Lecture to another Depart 
						InsertOnOtherDepart($numbox,$otherDept,$year,$mday,$Timeslot[19],$op,$LecNo,$uncode1,$CollegeCode1,$Sem,$Classno,$SecID,$msub,$GId,$mteach,$AcadDeg,$DeptNo);
					
		 		}//end of result
		 	}//end of $_Post


			if($_POST['C21'])
			{
				$ssql = "insert into ManagingLec (AcadYNo,MDays,MTimes,BId,SubBId,UniversityCode,CollegeCode,DeptNo,AcadDegreeId,SemNo,ClassNo,SecID,SubCode,SubType,GId,TeacherId) values
				('$year','$mday','$Timeslot[20]','$op','$LecNo','$uncode1','$CollegeCode1','$DeptNo','$AcadDeg','$Sem','$Classno','$SecID','$msub','$op','$GId','$mteach')";
				$results = mysqli_query($mysqli,$ssql);
				if (($results)&&($numbox>0))
		  		{
					//echo("Sucess");
		
					//insert other depart
					$otherDept=$_SESSION['otherDept'];
					
					//Insert same Lecture to another Depart 
						InsertOnOtherDepart($numbox,$otherDept,$year,$mday,$Timeslot[20],$op,$LecNo,$uncode1,$CollegeCode1,$Sem,$Classno,$SecID,$msub,$GId,$mteach,$AcadDeg,$DeptNo);
					
		 		}//end of result
		 	}//end of $_Post


			if($_POST['C22'])
			{
				$ssql = "insert into ManagingLec (AcadYNo,MDays,MTimes,BId,SubBId,UniversityCode,CollegeCode,DeptNo,AcadDegreeId,SemNo,ClassNo,SecID,SubCode,SubType,GId,TeacherId) values
				('$year','$mday','$Timeslot[21]','$op','$LecNo','$uncode1','$CollegeCode1','$DeptNo','$AcadDeg','$Sem','$Classno','$SecID','$msub','$op','$GId','$mteach')";
				$results = mysqli_query($mysqli,$ssql);
				if (($results)&&($numbox>0))
		  		{
					//echo("Sucess");
		
					//insert other depart
					$otherDept=$_SESSION['otherDept'];
					
					//Insert same Lecture to another Depart 
						InsertOnOtherDepart($numbox,$otherDept,$year,$mday,$Timeslot[21],$op,$LecNo,$uncode1,$CollegeCode1,$Sem,$Classno,$SecID,$msub,$GId,$mteach,$AcadDeg,$DeptNo);
					
		 		}//end of result
		 	}//end of $_Post
		 	
		 	if($_POST['C23'])
			{
				$ssql = "insert into ManagingLec (AcadYNo,MDays,MTimes,BId,SubBId,UniversityCode,CollegeCode,DeptNo,AcadDegreeId,SemNo,ClassNo,SecID,SubCode,SubType,GId,TeacherId) values
				('$year','$mday','$Timeslot[22]','$op','$LecNo','$uncode1','$CollegeCode1','$DeptNo','$AcadDeg','$Sem','$Classno','$SecID','$msub','$op','$GId','$mteach')";
				$results = mysqli_query($mysqli,$ssql);
				if (($results)&&($numbox>0))
		  		{
					//echo("Sucess");
		
					//insert other depart
					$otherDept=$_SESSION['otherDept'];
					
					//Insert same Lecture to another Depart 
						InsertOnOtherDepart($numbox,$otherDept,$year,$mday,$Timeslot[22],$op,$LecNo,$uncode1,$CollegeCode1,$Sem,$Classno,$SecID,$msub,$GId,$mteach,$AcadDeg,$DeptNo);
					
		 		}//end of result
		 	}//end of $_Post
		 	
			if($_POST['C24'])
			{
				$ssql = "insert into ManagingLec (AcadYNo,MDays,MTimes,BId,SubBId,UniversityCode,CollegeCode,DeptNo,AcadDegreeId,SemNo,ClassNo,SecID,SubCode,SubType,GId,TeacherId) values
				('$year','$mday','$Timeslot[23]','$op','$LecNo','$uncode1','$CollegeCode1','$DeptNo','$AcadDeg','$Sem','$Classno','$SecID','$msub','$op','$GId','$mteach')";
				$results = mysqli_query($mysqli,$ssql);
				if (($results)&&($numbox>0))
		  		{
					//echo("Sucess");
		
					//insert other depart
					$otherDept=$_SESSION['otherDept'];
					
					//Insert same Lecture to another Depart 
						InsertOnOtherDepart($numbox,$otherDept,$year,$mday,$Timeslot[23],$op,$LecNo,$uncode1,$CollegeCode1,$Sem,$Classno,$SecID,$msub,$GId,$mteach,$AcadDeg,$DeptNo);
					
		 		}//end of result
		 	}//end of $_Post
		 	
		 	
		 
		$_SESSION['otherDept']="";
		 }//end of if
		else
		{
		?>
		<div align="right" style="color:yellow; font-size:14pt; font-style:bold">

		<?php
				echo("&#1601;&#1590;&#1604;&#1575; &#1593;&#1583;&#1583; &#1575;&#1604;&#1587;&#1575;&#1593;&#1575;&#1578; &#1575;&#1604;&#1605;&#1583;&#1582;&#1604;&#1577; &#1575;&#1603;&#1576;&#1585; &#1605;&#1606; &#1593;&#1583;&#1583; &#1575;&#1604;&#1587;&#1575;&#1593;&#1575;&#1578; &#1575;&#1604;&#1605;&#1581;&#1583;&#1583;&#1607; &#1604;&#1604;&#1605;&#1575;&#1583;&#1607;");
			//echo('invalid time , try again');
		?>
		</div>
		<?php
		}


	sub_Form($uncode1,$CollegeCode1,$AcadDeg,$DeptNo,$Classno,$Sem,$op,$s,$year,$LecNo,$mday,$msub,$mteach,$GId,$SecID);
	//echo('<meta http-equiv="refresh" content="5" />');

	}//end of if1
	else
	{
		sub_Form($uncode1,$CollegeCode1,$AcadDeg,$DeptNo,$Classno,$Sem,$op,$s,$year,$LecNo,$mday,$msub,$mteach,$GId,$SecID);
		//echo('<meta http-equiv="refresh" content="15" />');

	}
}
else
{
	include("ErrorPage.php");
}

?>