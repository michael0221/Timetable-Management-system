<?php
session_start();
require_once('main.php');
require_once('University_Method.php');

//Page Title

Display_Title();

Background_Page();

$username=$_SESSION['username'];

if($username)
{

	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
//	$conn = db_connect();
	$op = $_GET['op'];
	$opv=intval($op);

	$uncode1 = $_GET['uncode'];
	$univCode=intval($uncode1);

	//echo("opv=".$opv);

	if($opv==4)
	{
		$LocId = $_GET['LocId'];
		$LId=intval($LocId);
		//echo("IDloc=".$LocId);

		//DELETE LOCATION

		//(1) delete from SubBuilding Seminar
		//(2) delete Colleges which belong to Location
		//(3) delete UnivLoc (main table)

		db_connect();
		//(1)
			$sql_query2="select UnLoc from UnivLoc where LocId='$LId' and UniversityCode='$univCode'";
			$result2=mysqli_query($mysqli,$sql_query2);
			$row2=mysqli_fetch_row($result2);

			$sql_query3="delete from SubBuildingSeminar where UnLoc='$row2[0]' and UniversityCode='$univCode'";
			$result3=mysqli_query($mysqli,$sql_query3);
		//(2)

		//(3)
			$sql_query2="delete from UnivLoc where LocId='$LId' and UniversityCode='$univCode'";
			$result2=mysqli_query($mysqli,$sql_query2);

	}

	$sql = "select UnLoc,LocId from UnivLoc where UniversityCode='$univCode'";
	$result = mysqli_query($mysqli,$sql);
	?>
	<div align="center">

		<table border="2" width="100%" id="table22" style="border-color: #5A74A0">
		<tr>
	<?php

	if (mysqli_num_rows($result)>0 )
	{
	?>

			<td bordercolor="#003366" align="center" bgcolor="#5A74A0" height="31" width="95%" bordercolorlight="#003366" bordercolordark="#003366" style="border-color: #003366" colspan="2">
			<p dir="rtl">
			<img border="0" id="img56" src="Colleges-PAGE/locnames.jpg" height="20" width="100" fp-style="fp-btn: Simple Arrow 4; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 14; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" align="right">
			</td>
		</tr>

		<?php
		while($row=mysqli_fetch_row($result))
	   	  {
			$UnName=$row[0];
			?>
			<tr>
				<td bordercolor="#003366" align="center" width="4%" bordercolorlight="#5A74A0" bordercolordark="#5A74A0" style="border-color: #003366" bgcolor="#003366" height="30">
				<?php
					$Lid=$row[1];
				?><a href="display_Loc.php?op=4&LocId=<?php echo($Lid);?>&uncode=<?php echo($univCode);?>"><img border="0" alt="&#1581;&#1584;&#1601;" src="delete.jpg" width="31" height="26">
				</a></td>
				<td bordercolor="#003366" align="center" width="92%" bordercolorlight="#5A74A0" bordercolordark="#5A74A0" style="border-color: #003366" height="30">
				<b>
				<font color="#FFFFFF" face="Traditional Arabic">
				<?php

	   	  		echo($row[0]);
	   	  		?>
				</font></b></td>
			</tr>
		 <?php

	   	  }//end of while
	}//end of if
	else
	{//there is no data to show
	?>

		<td bordercolor="#003366" align="center" width="93%" bordercolorlight="#5A74A0" bordercolordark="#5A74A0" style="border-color: #003366" bgcolor="#5A74A0" height="30" colspan="2">
		 <img border="0" id="img57" src="Colleges-PAGE/LocNotInsert.jpg" height="24" width="119"  fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 12; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" ></td>
	</tr>
	<?php
	}
	?>
	</table>
	</div>
<?php
}
else
{
	include("ErrorPage.php");
}


?>
</body>