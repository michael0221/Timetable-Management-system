<?php

	session_start();
	
	require_once('main.php');
	//Page Title and Background
	Display_Title();
	Background_Page();
	
	$flag = $_GET['flag'];
	$flag=intval($flag);
	
	//
	if($flag!=2)
	{
		$username=$_POST['T1'];
		
		$Passwd=$_POST['T2'];
		
		//
		if ((strcmp($username,"")!=0)&&(strcmp($Passwd,"")!=0))
		{
	
		 if (Checkuser($username,$Passwd))
		 {
		
			$_SESSION['username']=$username;
			$_SESSION['passwd']=$Passwd;
		
			include("header.php");
	
			Display_Admin_Menu1();
		
			Display_Admin_Menu2();
		
		 }//end if
		 else
		 {
			include("errorUser.php");
		 }
	   }//end of if
	   else
		{
			include("ErrorPage.php");
		}
	}
	else
	{
		if ( (strcmp($_SESSION['username'],"")!=0) && (strcmp($_SESSION['passwd'],"")!=0) )
		{
			include("header.php");
	
			Display_Admin_Menu1();
	
			Display_Admin_Menu2();
		}
		else
		{
			include("ErrorPage.php");
		}
	
	}
?>
