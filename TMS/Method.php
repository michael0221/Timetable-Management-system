<?php
require_once('main.php');
function display_password_form()
{
?>
   <body>

   <form action='change_passwd.php' method='post'>
<div align="center">
  <p>
  </center>
	</p>
	<table border="1" width="42%" id="table1" cellspacing="8" cellpadding="8">
		<tr>
			<td width="207" align="right" bgcolor="#003366">
			<input type="password" name="old_passwd" size="21" maxlength=16 style="color: #003366; font-size:12pt; font-weight:bold; font-family:Times New Roman" dir="rtl" tabindex="1"></td>
			<td bgcolor="#5A74A0">
			<p align="center">
			<img border="0" id="img23" src="changePasswd/button16.jpg" height="21" width="104" alt="&#1603;&#1604;&#1605;&#1577; &#1575;&#1604;&#1605;&#1585;&#1608;&#1585; &#1575;&#1604;&#1587;&#1575;&#1576;&#1602;&#1577;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 14; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1603;&#1604;&#1605;&#1577; &#1575;&#1604;&#1605;&#1585;&#1608;&#1585; &#1575;&#1604;&#1587;&#1575;&#1576;&#1602;&#1577;"></td>
		</tr>
		<tr>
			<td width="207" align="right" bgcolor="#003366">
			<input type="password" name="new_passwd" size="21" maxlength=16 style="color: #003366; font-size:12pt; font-weight:bold; font-family:Times New Roman" dir="rtl" tabindex="2"></td>
			<td bgcolor="#5A74A0">
			<p align="center">
			<img border="0" id="img24" src="changePasswd/button1B.jpg" height="21" width="104" alt="&#1603;&#1604;&#1605;&#1577; &#1575;&#1604;&#1605;&#1585;&#1608;&#1585; &#1575;&#1604;&#1580;&#1583;&#1610;&#1583;&#1577;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 14; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1603;&#1604;&#1605;&#1577; &#1575;&#1604;&#1605;&#1585;&#1608;&#1585; &#1575;&#1604;&#1580;&#1583;&#1610;&#1583;&#1577;"></td>
		</tr>
		<tr>
			<td width="207" align="right" bgcolor="#003366">
			<input type="password" name="renew_passwd" size="21" maxlength=16 style="color: #003366; font-size:12pt; font-family:Times New Roman; font-weight:bold" dir="rtl" tabindex="3"></td>
			<td bgcolor="#5A74A0">
                  <p align="center">
					<img border="0" id="img25" src="changePasswd/button1E.jpg" height="21" width="104" alt="&#1578;&#1571;&#1603;&#1610;&#1583; &#1603;&#1604;&#1605;&#1577; &#1575;&#1604;&#1605;&#1585;&#1608;&#1585;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 14; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1578;&#1571;&#1603;&#1610;&#1583; &#1603;&#1604;&#1605;&#1577; &#1575;&#1604;&#1605;&#1585;&#1608;&#1585;"></td>
		</tr>
	</table>
</div>

<p align="center">&nbsp;
<input type="submit" value="  &#1578;&#1594;&#1610;&#1610;&#1585;    " name="B1" style="color: #FFFFFF; font-family: Traditional Arabic; font-size: 14pt; font-weight: bold; border: 1px outset #003366; background-color: #5A74A0"></p>

 <?php
}

function change_password($username,$old_password,$new_password)
{
 	//change password for username/old_password to new_password
 	//return true or false

  	// if the old password is right
  	// change the password to new_password and return true
  	// else throw an exception
  	
	$f=Checkuser($username, $old_password);
	if($f)
	{
		$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');
	 	$conn = db_connect();
 		$sql_query= "update Loginadmin
                            set Passwd = '$new_password'
                            where UserName = '$username'";
		$result=mysqli_query($mysqli,$sql_query);
	 	if (!$result)
   				die('Password could not be changed.');
 		else
 	  			return true;  // changed successfully
	}//end of if
}
//--------------------------------------------------------------------------

function Display_error_msg($msg)
{
?>
<div align="right">

<table border="0" width="58%" id="table2">
	<tr>
		<td dir="ltr" width="100%">
		<p align="right"><b><span lang="ar-sa">
		<font size="4" face="Times New Roman">
		<?php echo($msg);?>
		</font></span></b></td>
		<td dir="ltr" width="5%">
		<p align="center"><b>
		<font color="#FFFFFF" size="4" face="Traditional Arabic">
		<img border="0" src="icon_err.gif" width="16" height="16" align="left"></font></b></td>
		<td width="8%" dir="ltr">
		&nbsp;</td>
	</tr>
</table>

<?php
}

function Display_msg($msg1,$path1)
{
?>

<p align="center">&nbsp;</p>
<div align="center">
	<table border="0" width="74%" id="table1">
		<tr>

			<td align="center" width="427"><![if !vml]><img border=0 width=147 height=37
src="<? echo($path1);?>" alt="<?php echo($msg1);?>" v:shapes="_x0000_s1026"><![endif]></td>
		</tr>
	</table>
</div>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>

<?php
}
//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
function DisplayHeader($msg)
{
?>
<div align="right">

<table border="0" width="58%" id="table3">
	<tr>
		<td>
		<p align="right">
		<b><font size="5" face="Traditional Arabic" color="#FFFFFF">

		<?php echo($msg);?>
		</font></b>
		</td>
		<td width="8%">
		&nbsp;</td>
	</tr>
</table>

</div>

<?php
}

function DisplaySuccHeader($msg)
{
?>
<div align="right">

<table border="0" width="100%" id="table3">
	<tr>
		<td>
		<p align="right">
		<b><font size="5" face="Traditional Arabic" color="#FFFF00">
		<?php echo($msg);?>
		</font></b>
		</td>
		<td >
		&nbsp;</td>
	</tr>
</table>

</div>


<?php
}
//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
function Href($href)
{
?>
<div align="left">
<table border="0" width="100%" id="table2" height="17">
	<tr>
		<td align="center" bgcolor="#5A74A0">
		<p align="center">
		<?php $flag=2;?><a href='<?php echo($href);?>?flag=<?php echo($flag);?>'><img border="0" id="img2" src="Success/button5D.jpg" height="22" width="111" alt="&#1585;&#1580;&#1608;&#1593;" onmouseover="FP_swapImg(1,0,/*id*/'img2',/*url*/'Success/button5E.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img2',/*url*/'Success/button5D.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img2',/*url*/'Success/button5F.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img2',/*url*/'Success/button5E.jpg')" fp-style="fp-btn: Braided Column 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-font-color-hover: #FFFFFF; fp-font-color-press: #FFFFFF; fp-bgcolor: #5A74A0; fp-orig: 0" fp-title="&#1585;&#1580;&#1608;&#1593;" align="left"></a><p align="right">&nbsp;</td>
	</tr>
</table>
</div>
<?php
}

// new method created on Sun 3/12/2006
function Href2($href,$header)
{
?>
<div align="left">
<table border="0" width="100%" id="table2" height="16">
	<tr>
		<td align="center" bgcolor="#5A74A0">
		<p align="right">
		<a href='<?php echo($href);?>'>
		<img border="0" id="img2" src="Success/button5D.jpg" height="22" width="111" alt="&#1585;&#1580;&#1608;&#1593;" onmouseover="FP_swapImg(1,0,/*id*/'img2',/*url*/'Success/button5E.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img2',/*url*/'Success/button5D.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img2',/*url*/'Success/button5F.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img2',/*url*/'Success/button5E.jpg')" fp-style="fp-btn: Braided Column 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-font-color-hover: #FFFFFF; fp-font-color-press: #FFFFFF; fp-bgcolor: #5A74A0; fp-orig: 0" fp-title="&#1585;&#1580;&#1608;&#1593;" align="left"></a><p align="right">
		<font color="yellow" face="Traditional Arabic" size="5"><b>

		<?php
			echo($header);
		?>
		</b></font></td>
	</tr>
</table>
</div>
<?php
}

// new method created on Friday 07/November/2008
function Href2Dept($href,$header)
{
?>
<div align="left">
<table border="0" width="100%" id="table2" height="16">
	<tr>
		<td align="center" bgcolor="#5A74A0">
		<p align="right">
			<a href='<?php echo($href);?>'>
				<img border="0" id="img2" src="Success/button5D.jpg" height="22" width="111" alt="&#1585;&#1580;&#1608;&#1593;" onmouseover="FP_swapImg(1,0,/*id*/'img2',/*url*/'Success/button5E.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img2',/*url*/'Success/button5D.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img2',/*url*/'Success/button5F.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img2',/*url*/'Success/button5E.jpg')" fp-style="fp-btn: Braided Column 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-font-color-hover: #FFFFFF; fp-font-color-press: #FFFFFF; fp-bgcolor: #5A74A0; fp-orig: 0" fp-title="&#1585;&#1580;&#1608;&#1593;" align="left"></a>
		</p>
		<p align="right">
			<a href="DeptSection.php?<?php echo($header);?>">	
					<img border="0" id="img75" src="Depart_Files/SectionOnDept.jpg" height="46" width="230" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 18; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0"  /><span style="text-decoration: none">
			</span>
			</a>
			
			<a href="InsertDept.php?<?php echo($header);?>">	
				<img border="0" id="img74" src="Depart_Files/RegisterDepart.jpg" height="46" width="230" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 18; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0"  />
			</a>
		</p>
	</td>
	</tr>
</table>
</div>
<?php
}
//

function backto($href)
{
?>
<div align="left">
<table border="0" width="100%" id="table2" height="29">
	<tr>
		<td bgcolor="#5A74A0">
		<p align="center">
		<a href='<?php echo($href);?>'>
		<img border="0" id="img2" src="Success/button5D.jpg" height="22" width="111" alt="&#1585;&#1580;&#1608;&#1593;" onmouseover="FP_swapImg(1,0,/*id*/'img2',/*url*/'Success/button5E.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img2',/*url*/'Success/button5D.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img2',/*url*/'Success/button5F.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img2',/*url*/'Success/button5E.jpg')" fp-style="fp-btn: Braided Column 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-font-color-hover: #FFFFFF; fp-font-color-press: #FFFFFF; fp-bgcolor: #5A74A0; fp-orig: 0" fp-title="&#1585;&#1580;&#1608;&#1593;" align="left"></a><p align="right">
		<a href="welcomeAdmin.php?flag=2">
		<img border="0" id="img17" src="AdminMenu/button2.jpg" height="26" width="130" alt="&#1575;&#1604;&#1589;&#1601;&#1581;&#1577; &#1575;&#1604;&#1585;&#1574;&#1610;&#1587;&#1610;&#1577;" fp-style="fp-btn: Braided Row 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-font-color-hover: #FFFFFF; fp-font-color-press: #FFFFFF; fp-bgcolor: #5A74A0" fp-title="&#1575;&#1604;&#1589;&#1601;&#1581;&#1577; &#1575;&#1604;&#1585;&#1574;&#1610;&#1587;&#1610;&#1577;" onmouseover="FP_swapImg(1,0,/*id*/'img17',/*url*/'AdminMenu/button2.jpg')" onmouseout="FP_swapImg(0,0,/*id*/'img17',/*url*/'AdminMenu/button1.jpg')" onmousedown="FP_swapImg(1,0,/*id*/'img17',/*url*/'AdminMenu/button3.jpg')" onmouseup="FP_swapImg(0,0,/*id*/'img17',/*url*/'AdminMenu/button2.jpg')">
		</a></td>
	</tr>
</table>
</div>
<?php
}

function addLectures($href)
{
?>
<div align="left">
<table border="0" width="100%" id="table13" bgcolor="#5A74A0">
		<tr>
			<td align="right" bordercolorlight="#003366" bordercolordark="#003366" width="156">
			<p align="center">

			<a href="BuildingForm.php?id=2">
			<img border="0" id="img70" src="Success/buttoncan9.jpg" height="30" width="150" alt="&#1575;&#1604;&#1594;&#1575;&#1569; &#1593;&#1605;&#1604;&#1610;&#1577; &#1575;&#1604;&#1575;&#1583;&#1582;&#1575;&#1604; &#1604;&#1604;&#1605;&#1608;&#1575;&#1602;&#1593;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 14; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1575;&#1604;&#1594;&#1575;&#1569; &#1593;&#1605;&#1604;&#1610;&#1577; &#1575;&#1604;&#1575;&#1583;&#1582;&#1575;&#1604; &#1604;&#1604;&#1605;&#1608;&#1575;&#1602;&#1593;" align="left"></a><a href='<?php echo($href);?>'>

			</a>
			</p>
			</td>
			<td align="right" bordercolorlight="#003366" bordercolordark="#003366">
			&nbsp;</td>
			<td width="150" align="right" bordercolorlight="#003366" bordercolordark="#003366">
			<a href="<?php echo($href);?>">
			<img border="0" id="img71" src="Success/buttonadd15.jpg" height="30" width="150" alt="&#1575;&#1590;&#1575;&#1601;&#1577; &#1602;&#1575;&#1593;&#1575;&#1578;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 14; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1575;&#1590;&#1575;&#1601;&#1577; &#1602;&#1575;&#1593;&#1575;&#1578;"></a></td>
		</tr>
	</table>
	</div>
<?php
}

function addLabs($href)
{
?>
<div align="left">
<table border="0" width="100%" id="table14" bgcolor="#5A74A0">
		<tr>
			<td align="right" bordercolorlight="#003366" bordercolordark="#003366" width="156">
			<p align="center">

			<a href="BuildingForm.php?id=2">
			<img border="0" id="img72" src="Success/buttoncan9.jpg" height="30" width="150" alt="&#1575;&#1604;&#1594;&#1575;&#1569; &#1593;&#1605;&#1604;&#1610;&#1577; &#1575;&#1604;&#1575;&#1583;&#1582;&#1575;&#1604; &#1604;&#1604;&#1605;&#1608;&#1575;&#1602;&#1593;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 14; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0; fp-orig: 0" fp-title="&#1575;&#1604;&#1594;&#1575;&#1569; &#1593;&#1605;&#1604;&#1610;&#1577; &#1575;&#1604;&#1575;&#1583;&#1582;&#1575;&#1604; &#1604;&#1604;&#1605;&#1608;&#1575;&#1602;&#1593;" align="left"></a><a href='<?php echo($href);?>'>

			</a>
			</p>
			</td>
			<td align="right" bordercolorlight="#003366" bordercolordark="#003366">
			&nbsp;</td>
			<td width="150" align="right" bordercolorlight="#003366" bordercolordark="#003366">
			<a href="<?php echo($href);?>">
			<img border="0" id="img73" src="Success/buttonaddlab7.jpg" height="30" width="150" alt="&#1575;&#1590;&#1575;&#1601;&#1577; &#1605;&#1593;&#1605;&#1604;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 14; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1575;&#1590;&#1575;&#1601;&#1577; &#1605;&#1593;&#1605;&#1604;"></a></td>
		</tr>
	</table>
	</div>
<?php
}
?>