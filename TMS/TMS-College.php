
<head>
<meta http-equiv="Content-Language" content="en-us">

</head>
<body>
<?php
	
 include('header2.php');

 include("abstractCollege.php");

 require_once('main.php');

 

 //Page Title

 Display_Title();


 Background_Page();
 

  //Display LoginForm	
?>
</br>
</br>
<div align="center">

<table border="0" width="100%" id="table1">

	<tr>
		<td height="155">

		<?php
		
DisplayLoginForm($year);
		?>
		<p>&nbsp;</td>
	</tr>
	<tr>
		<td>
<div align="right">
	<table border="0" width="31%" id="table4" height="26">
		<tr>
			<?php

				Diplay_Date();
			?>
			</td>
		</tr>
	</table>
</div>
		</td>
	</tr>
	</table>

</div>
</body>