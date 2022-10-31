<?php

function db_connect()
{
	//Connect to Database
	//---------------------
	//DB Name:managetime;
	//username:TMS;
	//passwd:  TMS;
	//--------------------
 
   $result =mysqli_connect('localhost', 'TMS', 'TMS', 'managetime', '3306') or die ("cannot make the connection");

   $db=mysqli_select_db($result, "managetime") or die ("cannot connect to DB ");

   


   }

?>
