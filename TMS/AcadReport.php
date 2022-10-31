<?php

require_once('main.php');

//Page Title

Display_Title();
$mysqli = new mysqli('localhost', 'TMS', 'TMS', 'managetime', '3306');

//$conn = db_connect();

$CollegeCode = $_GET['CollegeCode'];
$CollegeCode1=intval($CollegeCode);

$uncode=$_GET['uncode'];
$uncode1=intval($uncode);

//DeptNo

$DeptNo = $_GET['Dept'];
$DeptNo=intval($DeptNo);

$AcadDeg = $_GET['AcadDeg'];
$AcadDeg=intval($AcadDeg);

//if ($f==1)> Administrator
//if ($f==2)> users
$f=$_GET['f'];
$f=intval($f);

if((($uncode1>0)&&($CollegeCode1>0))&&(($AcadDeg>0)&&($DeptNo>0)))
	{
		//
	   	//(1)get NO of Semester
	   	$sql3 = "select NoOfSemester,AcadDegreeName,AcadProgType from AcadDegree where
	   	AcadDegreeId='$AcadDeg'";
	 	$result3 = mysqli_query($mysqli,$sql3);
	  	$row3=mysqli_fetch_row($result3);


	   	//(2) Get No of Yearsin the Depart
	   	$NoOFYear=$row3[0]/2;

		
	   		$sql11 = "select ClassName,ClassNo from ClassYear where ClassNo<='$NoOFYear'";
	   		$result11 = mysqli_query($mysqli,$sql11);
			if (mysqli_num_rows($result11)>0 )
			{
			?>
			<div align="center">
			<table border="0" width="80%" id="table12">
			<tr>
			   <td>
			   <div align="center">
			   <table border="2" width="80%" bordercolorlight="#003366" bordercolordark="#003366" id="table13" bordercolor="#003366" cellpadding="5" cellspacing="5">
				<tr>
				 	<td bordercolor="#5A74A0" align="center" bgcolor="#5A74A0"  bordercolorlight="#003366" bordercolordark="#003366" colspan="2">
				 	<div align="right">
				 	<font size="4" face="Traditional Arabic" color="#FFFF00">
				 	<b>
				 	<?php
					$deptname=GetDeptName($uncode1,$CollegeCode1,$DeptNo);
				 	$msg=$deptname."&nbsp;- &nbsp;".$row3[1];
					echo($msg);
					//DisplayHeader($msg);
				 	?>
				 	</b></font></div>
				 	</td>
				 </tr>
				 
				 <?php
				 //Check ProgType
				 //1 > BC.s
				 //2 > Master
				 if($row3[2]==2)	
				 {
				 ?>
				 	<tr>
					 	<td colspan="2" bordercolor="#5A74A0" align="center" bgcolor="#5A74A0" height="31" width="53%" bordercolorlight="#003366" bordercolordark="#003366">
					 			<img border="0" id="img67" src="Depart_Files/ClassYear.jpg" height="27" width="135" alt="&#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609;">
					 	</td>
					</tr>
				  <?php
				  }//end of if
				  else
				  {
				  ?>
				  	<tr>
					 	<td bordercolor="#5A74A0" align="center" bgcolor="#5A74A0" height="31" width="53%" bordercolorlight="#003366" bordercolordark="#003366">
					 			<img border="0" id="img67" src="Depart_Files/ClassYear.jpg" height="27" width="135" alt="&#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609;">
					 	</td>
					 	<td width="44%" bordercolor="#5A74A0" align="center" bgcolor="#5A74A0" height="31" bordercolorlight="#003366" bordercolordark="#003366">
							<p align="center" dir="rtl">
								<img border="0" id="img66" src="Depart_Files/AcadminYears.jpg" height="27" width="135" alt="&#1575;&#1604;&#1587;&#1606;&#1577; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1610;&#1577;" fp-style="fp-btn: Simple Text 1; fp-font: Traditional Arabic; fp-font-style: Bold; fp-font-size: 16; fp-font-color-normal: #FFFFFF; fp-img-hover: 0; fp-img-press: 0; fp-preload: 0; fp-bgcolor: #5A74A0" fp-title="&#1575;&#1604;&#1587;&#1606;&#1577; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1610;&#1577;">
						</td>
				  </tr>
				  <?php
				  }//end of else
				  ?>
				  <tr>
				  <?php
				  while($row11=mysqli_fetch_row($result11))
				  {
					$SemName="";
				  	$sql22 = "select SemName,SemNo from Semester where ClassNo='$row11[1]'";
				  	$result22 = mysqli_query($mysqli,$sql22);
				  	
				  	//check if there any Section on this depart 
				  	if(CheckDeptSection($uncode1,$CollegeCode1,$DeptNo,$AcadDeg,$row11[1]))
					{
							//Display Sections on this depart
							
							$checksec=1;
							$result44=mysqli_query($mysqli,"select SecID,SecName from DeptSection where 
    		 									UniversityCode='$uncode1' and CollegeCode='$CollegeCode1' and 
    		 									DeptNo='$DeptNo' and AcadDegreeId='$AcadDeg' and ClassNo='$row11[1]' ");
    
    						while($row44=mysqli_fetch_row($result44))
    						{
    							
    							$SecName=$SecName.$row44[1]."</br></br>";
    							
    							$sql22 = "select SemName,SemNo from Semester where ClassNo='$row11[1]'";
				  				$result22 = mysqli_query($mysqli,$sql22);
    							
    							while($row22=mysqli_fetch_row($result22))
				  				{
    								if($f==2) //users
				  					{
				  							$SemName=$SemName."<a onclick="."window.open('displayttable.php?AcadDeg=$AcadDeg&Class=$row11[1]&Sem=$row22[1]&uncode=$uncode1&CollegeCode=$CollegeCode1&Dept=$DeptNo&f=2&frep=2&SecID=$row44[0]&ProgType=$row3[2]','','resizable=yes,scrollbars=yes,menubar=yes,width=600,height=500');"."align='center' title='&#1575;&#1587;&#1578;&#1593;&#1585;&#1575;&#1590; &#1580;&#1583;&#1608;&#1604; &#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578;' style='cursor: pointer' dtarget='_BLANK' width='80' height='60'>".$row22[0]."</a>"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				  					}
				  					else
				  					if($f==1)//administrator
				  					{
				  							$SemName=$SemName."<a href='selectYear.php?AcadDeg=$AcadDeg&Class=$row11[1]&Sem=$row22[1]&uncode=$uncode1&CollegeCode=$CollegeCode1&Dept=$DeptNo&f=1&frep=0&SecID=$row44[0]&ProgType=$row3[2]' align='center' title='&#1575;&#1587;&#1578;&#1593;&#1585;&#1575;&#1590; &#1580;&#1583;&#1608;&#1604; &#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578;' style='cursor: pointer' target='_BLANK' width='80' height='60'>".$row22[0]."</a>"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				  					}
				  				}//end of while
				  				
				  				$SemName=$SemName."</br></br>";
    						}//end of while
					}//end of if checkSections
				    else
				    {
				  		while($row22=mysqli_fetch_row($result22))
				  		{
				  			if($f==2) //users
				  			{
	
				  					$SemName=$SemName."<a onclick="."window.open('displayttable.php?AcadDeg=$AcadDeg&Class=$row11[1]&Sem=$row22[1]&uncode=$uncode1&CollegeCode=$CollegeCode1&Dept=$DeptNo&f=2&frep=2&ProgType=$row3[2]','','resizable=yes,scrollbars=yes,menubar=yes,width=600,height=500');"." align='center' title='&#1575;&#1587;&#1578;&#1593;&#1585;&#1575;&#1590; &#1580;&#1583;&#1608;&#1604; &#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578;' style='cursor: pointer' target='_BLANK' width='100' height='600'>".$row22[0]."</a>"."</br>"."</br>";
				  			}
				  			else
				  			if($f==1)//administrator
				  			{
				  					$SemName=$SemName."<a href='selectYear.php?AcadDeg=$AcadDeg&Class=$row11[1]&Sem=$row22[1]&uncode=$uncode1&CollegeCode=$CollegeCode1&Dept=$DeptNo&f=1&frep=0&ProgType=$row3[2]' align='center' title='&#1575;&#1587;&#1578;&#1593;&#1585;&#1575;&#1590; &#1580;&#1583;&#1608;&#1604; &#1575;&#1604;&#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578;' style='cursor: pointer' target='_BLANK' width='80' height='60'>".$row22[0]."</a>"."</br>"."</br>";
				  			}
				  			
				  		 }//end while2
				  		 
				  	}//end of else
				  	
				  	//Display Details
					if($checksec==0)
					{
						if($row3[2]==2) //Master
						{
					?>
					 	<td  colspan="2" bordercolor="#003366" align="center" width="53%" height="35" >
					 		<font face="Traditional Arabic" color="#FFFFFF" size="3">
					 		<b>
					 		<?php echo($SemName);?>
					 		</b></font>
					 	</td>
					 	<?php 
					 	}//end of if 
					 	else
					 	{
					 	?>
					 		<td bordercolor="#003366" align="center" width="53%" height="35" >
					 			<font face="Traditional Arabic" color="#FFFFFF" size="3"><b>
					 				<?php 
					 						echo($SemName);
					 				?>
					 			</b></font>
					 		</td>
					 		<td width="44%" bordercolor="#003366" align="center" height="35">
					 			<b><font face="Traditional Arabic" color="#FFFFFF" size="3">
								<b><?php echo($row11[0]);?></b></font>
					 		</td>
					 	<?php
					 	}//end of else
					 	?>
					 </tr>
					 <?php
					 }//end of $checksec==0
					 else
					 if($checksec==1)
					 {
					 	//display Sections
					?>		 
				  		<tr>
				
					 			<td bordercolor="#003366" align="center" width="97%" height="35"  colspan="2">
					 			<p  align="center">
					 			<b>
					 				<font face="Traditional Arabic" color="#FFFFFF" size="3">
					 					<?php echo($row11[0]);?>
					 			</font></b>
					 			</p>
					 			</td>
					 	</tr>
				  		<tr>

					 		<td bordercolor="#003366" align="center" width="53%" height="35">
					 		<b>
					 			<font face="Traditional Arabic" color="#FFFFFF" size="3">

					 		<?php
					 			//display Semester
					 			echo($SemName);
					 		?>
					 		</font></b>
					 	</td>
					 	<td width="44%" bordercolor="#003366" align="center" height="35">
					 	<b>
					 		<font face="Traditional Arabic" color="#FFFFFF" size="3">

					 	<?php
					 		//Display Sections
					 		echo($SecName);
					 	?>
					 	</font></b>
					 	</td>
					 	</tr>
					 
					<?php

					}//end of if checksec==1
					
			    }//end while1
			
			?>
			</tr>
			</table>
			</div>
			</td>

			</tr>

			</table>
			</div>
			<?php
		 }//end of if

		

		$CollegeCode = $_GET['CollegeCode'];
		$CollegeCode1=intval($CollegeCode);

		$uncode=$_GET['uncode'];
		$uncode1=intval($uncode);

		$AcadDeg = $_GET['AcadDeg'];
		$AcadDeg=intval($AcadDeg);

		$DeptNo = $_GET['Dept'];
		$DeptNo=intval($DeptNo);

		$Classno = $_GET['Class'];
		$Classno=intval($Classno);

		$Sem = $_GET['Sem'];
		$Sem=intval($Sem);
		
		$SecID = $_GET['SecID'];
		$SecID=intval($SecID);



		if((($uncode1>0)&&($CollegeCode1>0))&&(($AcadDeg>0)&&($DeptNo>0)))
			{
			 if(($Classno>0)&&($Sem>0))
				{
					//include("Subject.php");
				}
			}
			else
			{
				include("ErrorPage.php");
			}


}//end of if (username)
else
{
	include("ErrorPage.php");
}
?>