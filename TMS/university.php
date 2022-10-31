<?php

session_start();

require_once('main.php');

//Page Title

Display_Title();

Background_Page();


$id = $_GET['id'];
$value=intval($id);


if (strcmp($_SESSION['username'],"")!=0)
{

  if($value==1)
{
	include("header.php");
	$href="welcomeAdmin.php";
	Href($href);
	$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
//	$conn = db_connect();

?>

 <body>
 <div align="center">
  <table border="0" width="80%" id="table1" height="219" >
    <tr>
	<td height="55" colspan="2">&nbsp;
	<div align="center">
	<table border="2" width="95%" bordercolorlight="#003366" bordercolordark="#003366" id="table2" bordercolor="#003366"  cellpadding="5" cellspacing="5">
	  <tr>
	  	  <td bordercolor="#003366" align="right" bgcolor="#5A74A0" height="31" colspan="4" bordercolorlight="#003366" bordercolordark="#003366">
	  	  <img border="0" id="img44" src="university_Page/university.jpg" height="27" width="135" alt="&#1575;&#1604;&#1580;&#1575;&#1605;&#1593;&#1575;&#1578;" fp-style="fp-btn: Embossed Capsule 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 20; fp-font-color-normal: #FFFFFF; fp-font-color-hover: #FFFFFF; fp-font-color-press: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1575;&#1604;&#1580;&#1575;&#1605;&#1593;&#1575;&#1578;"></td>
	  </tr>
	  <tr>

	  <?php
	 	$sql = "select UniversityName,UniversityCode,Logo from Universities order by UniversityCode";
		$result = mysqli_query($mysqli,$sql);
		if (mysqli_num_rows($result)>0 )
		{
		 ?>
		  <td align="center" height="25" width="28%" bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF">
		        &nbsp;</td>
		  <td bordercolor="#5A74A0" align="center" bgcolor="#5A74A0" height="25" width="37%" bordercolorlight="#003366" bordercolordark="#003366">
		        <img border="0" id="img46" src="university_Page/button18.jpg" height="18" width="90" alt="&#1575;&#1587;&#1605; &#1575;&#1604;&#1580;&#1575;&#1605;&#1593;&#1577;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0; fp-orig: 0" fp-title="&#1575;&#1587;&#1605; &#1575;&#1604;&#1580;&#1575;&#1605;&#1593;&#1577;"></td>
		  <td width="15%" bordercolor="#5A74A0" align="center" bgcolor="#5A74A0" height="25" bordercolorlight="#003366" bordercolordark="#003366">
		  	 	<p align="center" dir="rtl">
		  	 	<img border="0" id="img26" src="university_Page/button17.jpg" height="17" width="85" alt="&#1603;&#1608;&#1583; &#1575;&#1604;&#1580;&#1575;&#1605;&#1593;&#1577;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1603;&#1608;&#1583; &#1575;&#1604;&#1580;&#1575;&#1605;&#1593;&#1577;">
		  </td>
		  <td width="15%" bordercolor="#5A74A0" align="center" bgcolor="#5A74A0" height="25" bordercolorlight="#003366" bordercolordark="#003366">
		  	 	<p align="center" dir="rtl">
		  	 	<img border="0" id="img25" src="university_Page/button16.jpg" height="17" width="85" alt="&#1588;&#1593;&#1575;&#1585; &#1575;&#1604;&#1580;&#1575;&#1605;&#1593;&#1577;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1588;&#1593;&#1575;&#1585; &#1575;&#1604;&#1580;&#1575;&#1605;&#1593;&#1577;">
		  </td>
		  </tr>
		  <tr>

	   <?php
	   	 while($row=mysqli_fetch_row($result))
	   	  {
	    ?>
	      <td bordercolor="#003366" align="center" width="28%" bgcolor="#5A74A0">
	           <table border="0" width="79%" id="table3">
				<tr>
					<td>
					<?php $op=2;?><a href="updateUniv.php?op=<?php echo($op); ?>"><img border="0" alt="&#1581;&#1584;&#1601;" src="university_Page/delete.jpg" width="33" height="26" align="center" style="color: #003366; border: 1px solid #003366; background-color: #003366"></a></td>
					<td width="35">
					<?php $uncode=$row[1];?><?php $op=1;?><a href="updateUniv.php?op=<?php echo($op); ?>&uncode=<?php echo($uncode);?>"><img border="0" alt="&#1578;&#1593;&#1583;&#1610;&#1604;" src="university_Page/update.jpg" width="33" height="26" style="color: #003366; border: 1px solid #003366; background-color: #003366"></a></td>
					<td width="75">

					<a href="UnivLocation.php?uncode=<?php echo($uncode);?>">
					<img border="0" id="img47" src="Colleges-PAGE/addLoc.jpg" height="15" width="75" alt="&#1601;&#1585;&#1608;&#1593; &#1575;&#1604;&#1580;&#1575;&#1605;&#1593;&#1577;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 11; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1601;&#1585;&#1608;&#1593; &#1575;&#1604;&#1580;&#1575;&#1605;&#1593;&#1577;"></a></td>
				</tr>
				</table>

		   </td>

	      <td bordercolor="#003366" align="center" width="37%">
	        <span lang="ar-sa">

		   <font face="Traditional Arabic" size="3" color="#FFFFFF">
		   <a href='university.php?id=<?php echo($id)?>&uncode=<?php echo($uncode);?>#college'>
		   <font color="#FFFFFF">
		   <?php
		   echo($row[0]);?>
		   </font></a></font></span>

	       </td>

		   <td width="15%" bordercolor="#003366" align="center">
			<font color="#FFFFFF" face="Times New Roman" size="3">
			<?php echo($row[1]);?>
			</font>
		   </td>
		   <td width="15%" bordercolor="#003366" align="center">
			<p dir="rtl">
			<?php
			  $logo=$row[2];
			  if(strcmp($logo,"")!=0)
			  {
			?>
				<img src="<?php echo($row[2]);?>" width="53" height="40" style="color: #003366; border: 1px solid #003366; background-color: #003366">
			<?php
			 }
			?>
		   </td>
		   </tr>
	         <tr>
	         <?php
		   }//end of while
	          } //end of if
	       else
 			{
 			?>

 		   <td bordercolor="#003366" align="center" width="73%" bgcolor="#5A74A0" colspan="4" height="78">
		     <img border="0" id="img42" src="university_Page/button3.jpg" height="40" width="200" alt="&#1604;&#1605; &#1610;&#1578;&#1605; &#1573;&#1583;&#1582;&#1575;&#1604; &#1571;&#1609; &#1580;&#1575;&#1605;&#1593;&#1577;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1604;&#1605; &#1610;&#1578;&#1605; &#1573;&#1583;&#1582;&#1575;&#1604; &#1571;&#1609; &#1580;&#1575;&#1605;&#1593;&#1577;">
		   </td>
		   </tr>
		   <?php
			}
			?>
	   </tr>
	   </table>
	   </div>
	   </td>
	</tr>
	<tr>
	    <td width="17%">
	    	<p align="center"><a href="UniversityForm.php">
	    	<img border="0" id="img43" src="InsertUniversity_file/buttonIns.jpg" height="20" width="100" alt="&#1575;&#1590;&#1575;&#1601;&#1577; &#1580;&#1575;&#1605;&#1593;&#1577;" onmouseover="FP_swapImg(1,0,/*id*/'img43',/*url*/'InsertUniversity_file/buttonBb.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img43',/*url*/'InsertUniversity_file/buttonAb.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img43',/*url*/'InsertUniversity_file/buttonCb.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img43',/*url*/'InsertUniversity_file/buttonBb.jpg')" fp-style="fp-btn: Braided Column 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 14; fp-font-color-normal: #FFFFFF; fp-font-color-hover: #FFFFFF; fp-font-color-press: #FFFFFF; fp-bgcolor: #5A74A0" fp-title="&#1575;&#1590;&#1575;&#1601;&#1577; &#1580;&#1575;&#1605;&#1593;&#1577;"></a><a href="insertCollege.php">
	    	</a>
	     </td>
	     <td width="73%">&nbsp;</td>
	</tr>
</table>
</div>

<?php
print('</body>');
}//end of if
else
{
	include("ErrorPage.php");
}


$uncode1 = $_GET['uncode'];
$uncode11=intval($uncode1);


if($uncode11>0)
{
 ?>
 	<a name="college">
	<?php
 	include("Colleges.php");
	?>
	</a>
<?php
} //end of if
}//end of if
else
{
	include("ErrorPage.php");
}
?>
</html>