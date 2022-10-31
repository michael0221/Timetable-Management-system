<?php
require_once('db_fns.php');
require_once('main.php');

//insert the Locaions belong to universities

function insert_University_Locations($univCode)
{

?>
<form method="POST" action="UnivLocation.php?uncode=<?php echo($univCode);?>">
 <div align="center">
	<table border="0" width="57%" id="table1">
	<tr>
		<td>
		   <input name="T1" size="30" style="float: right; color: #003366; font-family: Traditional Arabic; font-size: 12pt; font-weight: bold" tabindex="1" dir="rtl"></td>
		<td width="156" bgcolor="#5A74A0">
			<p align="center">
			<img border="0" id="img1" src="Colleges-PAGE/Locations.jpg" height="30" width="150"  fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0"></td>
	</tr>
	<tr>
		<td align="center" colspan="2">
			<input type="submit" value="  &#1581;&#1601;&#1592;  " name="submit" tabindex="3" style="color: #FFFFFF; font-size: 14pt; font-family: Traditional Arabic; font-weight: bold; background-color: #5A74A0"></td>
	</tr>
	</table>
</div>
</form>

<?php
}
//Check Duplicated Entery of Location

function SerachForLoc($location,$univCode)
{
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');

 	$flag=true;
 	//$conn = db_connect();

	$sql = "select UnLoc from UnivLoc where UniversityCode='$univCode' and UnLoc='$location'";
	$result = mysqli_query($mysqli,$sql);

	if (mysqli_num_rows($result)>0 )
	  {
		  while($row=mysqli_fetch_row($result))
		  {
		    if(strcmp($location,$row[0])==0)
		    {
		    	$flag=false;
		    	break;
		    }
		   }
	   }
	else
		{
			$flag=true;
		}
  return $flag;
}

?>