<?php

require_once('db_fns.php');
require_once('main.php');


echo('<head>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	</head>');


if (isset($_POST['username']) && isset($_POST['passwd'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$username = validate($_POST['username']);
	$passwd = validate($_POST['passwd']);

	if (empty($username)) {
		header("Location: TMS-College.php?error=User Name is required");
	    exit();
	}else if(empty($passwd)){
        header("Location: TMS-College.php?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM loginadmin WHERE Username='$username' AND Passwd='$Passwd'";

		$result = mysqli_query($mysqli, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['Username'] === $username && $row['passwd'] === $Passwd) {
            	$_SESSION['Username'] = $row['Username'];
            	
            	header("Location: index.php");
		        exit();
            }else{
				header("Location: TMS-College.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: TMS-College.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}
/*function Checkuser($username,$Passwd)
{
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
// $conn = db_connect();

$sql = "select * from LoginAdmin where UserName='$username' and Passwd='$Passwd'";
$result = mysqli_query($mysqli,$sql);

if (mysqli_num_rows($result)>0 )

   	return true;

else
   return false;

 }*/

 // Check all Fields Inserted
 function filled_out($form_vars)
 {
   // test that each variable has a value
   foreach ($form_vars as $key => $value)
   {
      if (!isset($key) || ($value == ''))
         return false;
   }
   return true;
 }

//check LectureName

function checkLName($LName,$univcode,$value,$Loc)
{
	//Check if Lecture Room already Registered or Not
	{
		$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');	
//	$conn = db_connect();
	
	$sql3="select SubBName from SubBuildingSeminar where UniversityCode='$univcode' and  BId='$value' and UnLoc='$Loc'";
	
	$result3 = mysqli_query($mysqli,$sql3);
	
	//echo("no of row=".mysql_num_rows($result3) );
	
	if (mysqli_num_rows($result3)>0 )
	  {
		 while($row3=mysqli_fetch_row($result3))
		  {
		    if(preg_match($LName,$row3[0])) //match 
		    { 	
		    	$flag=false;
		    	break;
		    }
		  }//end of while
	   }
	else
		{
			$flag=true;
		}
	
  return $flag;
}

//
//Get Location Name

function GetLocName($LectureName,$univcode,$value,$Bid)
{
	{
		$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
//	$conn = db_connect();
	$sql2="select UnLoc from SubBuildingSeminar where UniversityCode='$univcode' and BId='$value' and SubBId='$Bid'";
	$result2 = mysqli_query($mysqli,$sql2);
	$LocName=mysqli_fetch_row($result2);
	return $LocName[0];

}

///

//check the University Code

function checkUniversityCode($univCode)
{
	{
		$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
	//db_connect();
	$sql_query="select UniversityCode from Universities where UniversityCode='$univCode'";//
	$result2=mysqli_query($mysqli,$sql_query);
	if(mysqli_num_rows($result2)==1)
	{
		$flag=true;
	}
	else
	{
		$flag=false;
	}
	return $flag;
}

function checkUniversityName($univName)
{
	{
		$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
//	db_connect();
	$sql_query="select UniversityName from Universities where UniversityName='$univName'";//
	$result2=mysqli_query($mysqli,$sql_query);
	if(mysqli_num_rows($result2)==1)
	{
		$flag=true;
	}
	else
	{
		$flag=false;
	}
	return $flag;
}
//

function DoUpdate($univcode,$value,$LabName,$Capacity,$Loc)
{
	{
		$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
//$conn = db_connect();
$sql1="select count(SubBId) from SubBuildingSeminar where UniversityCode='$univcode' and BId='$value'";
$result1 = mysqli_query($mysqli,$sql1);
if (mysqli_num_rows($result1)>0 )
	{
		$row=mysqli_fetch_row($result1);
		$id=$row[0]+1;
	}
else
	{
		$id=1;
	}

	//(2)Insert Data to Table
	{

	//echo($univcode."</br> ".$id."</br> ".$LabName."</br> ".$Capacity."</br> ".$Loc);
		$sql2 = "insert into SubBuildingSeminar (UniversityCode,BId,SubBId,SubBName,Capacity,UnLoc) values ($univcode,2,$id,'$LabName',$Capacity,'$Loc')";
	$result2 = mysqli_query($mysqli,$sql2);
	if ($result2)
		{

		}
}
}}}}}}?>