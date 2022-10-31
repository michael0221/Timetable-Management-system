<?php

$sname= "localhost";
$unmae= "TMS";
$password = "TMS";

$db_name = "managetime";

$conn = mysqli_connect($sname, $username, $Passwd, $db_name);

if (!$conn) {
	echo "Connection failed!";
}