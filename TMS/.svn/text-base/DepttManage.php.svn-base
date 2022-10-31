<?php
session_start();
require_once('main.php');

$conn = db_connect();

//Page Title

Display_Title();

Background_Page();

$username=$_SESSION['username'];

//Page Title
Display_Title();

if($username)
{
	include("header2.php");

	//get variables
	$AcadDeg = $_GET['AcadDeg'];
	$AcadDeg=intval($AcadDeg);

	$Classno = $_GET['Class'];
	$Classno=intval($Classno);

	$CollegeCode = $_GET['CollegeCode'];
	$CollegeCode1=intval($CollegeCode);

	$uncode=$_GET['uncode'];
	$uncode1=intval($uncode);

	$DeptNo = $_GET['Dept'];
	$DeptNo=intval($DeptNo);

	$Sem = $_GET['Sem'];
	$Sem=intval($Sem);

	$op=$_GET['op'];
	$op=intval($op);

	$s=$_GET['s'];
	$s=intval($s);
	
	$SecID=$_GET['SecID'];
	$SecID=intval($SecID);
	
	//get Post value

	$year= $_POST['D1'];
	//echo($year);

	$LectureName= $_POST['D2'];

	$mday=$_POST['D3'];

	//$mtime=$_POST['D4'];

	if(($op==1)&&($s==1))
	{
		$msub=$_POST['D4'];
	}
	else
	{
		$StudGroup=substr($_POST['D8'],0,1);
		$msub=substr($_POST['D8'],2);

	}

	$mteach=$_POST['D5'];

	if((($op==1)&&($s==2)) ||($op==2))
	{

		$StudGroup=$_POST['D8'];

	}
	else
	if(($op==1)&&($s==1))
	{
		$StudGroup=0;
	}


	if(GetNumberOfClasses($AcadDeg)>= $Classno)
	{
		//Get Checkbox value from hidden input
		
		$numbox=$_POST['numbox'];
		
		$checknum=0; //just used to check 
	
		//echo("box=".$numbox."</br>");
		
		for($i=0;$i<$numbox;$i++)
		{
			$Sec='Sec'.$i;
			$Sec2='Secv'.$i;
			
			if($_POST[$Sec]=="ON")
			{
				$otherDept[$i]=$_POST[$Sec2];
				$checknum++;
				
				//echo($otherDept[$i].",");
			}
			else
			{
				$otherDept[$i]=-1;
				//echo($otherDept[$i].",");
			}
		}//end of for
		
	}
	$flag=true;

	//College header
	Display_welcomeHeader_College($_SESSION['collegename']);

	//Deptartment Header

	$deptName=GetDeptName($uncode1,$CollegeCode1,$DeptNo);

	//Subject Header

	$href="CollegeManage.php?AcadDeg=$AcadDeg&uncode=$uncode1&CollegeCode=$CollegeCode1&Dept=$DeptNo#AcadDeg";


	//op=1 when we clicked on Lectuer
		if(($op==1)&&($s==1))
		{
			$header=$deptName."&nbsp;&gt; &nbsp;"."&#1580;&#1583;&#1608;&#1604;&#1577; &#1575;&#1604;&#1602;&#1575;&#1593;&#1575;&#1578;"."&nbsp;&nbsp; - &#1605;&#1581;&#1575;&#1590;&#1585;&#1575;&#1578;";
		}
		else
		//op=1 when we clicked on Tuotorial
		if(($op==1)&&($s==2))
		{
			$header=$deptName."&nbsp;&gt; &nbsp;"."&#1580;&#1583;&#1608;&#1604;&#1577; &#1575;&#1604;&#1602;&#1575;&#1593;&#1575;&#1578;"."&nbsp;&nbsp;- &#1578;&#1605;&#1575;&#1585;&#1610;&#1606;";
		}
		else
		//op=2 when we clicked on Lab
		if($op==2)
		{
			$header=$deptName."&nbsp;&gt; &nbsp;"."&#1580;&#1583;&#1608;&#1604;&#1577; &#1575;&#1604;&#1605;&#1593;&#1575;&#1605;&#1604;";
		}
	Href2($href,$header);

	if((($uncode1>0)&&($CollegeCode1>0))&&(($AcadDeg>0)&&($DeptNo>0)))
	  {
		if(($Classno>0)&&($Sem>0))
		 {
			echo("</br>");
			if (!filled_out($_POST))
			{
				$msg='&#1601;&#1590;&#1604;&#1575; &#1602;&#1605; &#1576;&#1575;&#1583;&#1582;&#1575;&#1604; &#1580;&#1605;&#1610;&#1593; &#1575;&#1604;&#1576;&#1610;&#1575;&#1606;&#1575;&#1578;';
				Display_error_msg($msg);
				DeptLec_Form($uncode1,$CollegeCode1,$AcadDeg,$DeptNo,$Classno,$Sem,$op,$s,$year,$LectureName,$mday,$msub,$mteach,$StudGroup,$SecID);
				$flag=false;
			}

			if($flag==true)
			{
				DeptLec_Form($uncode1,$CollegeCode1,$AcadDeg,$DeptNo,$Classno,$Sem,$op,$s,$year,$LectureName,$mday,$msub,$mteach,$StudGroup,$SecID);
				///echo("</br>"."lec=".$LectureName."</br>"."day=".$mday."</br>"."sub=".$msub."</br>"."teach=".$mteach);

				// include SubForm to select the Times
				?>
				<a name="#subform">
				<div align="center">
					<iframe name="F1"
					src="subForm.php?AcadDeg=<?php echo($AcadDeg);?>
					&Class=<?php echo($Classno);?>&Sem=<?php echo($Sem);?>
					&uncode=<?php echo($uncode1);?>&CollegeCode=<?php echo($CollegeCode1);?>
					&Dept=<?php echo($DeptNo);?>&op=<?php echo($op);?>&s=<?php echo($s);?>
					&year=<?php echo($year);?>&LecNo=<?php echo($LectureName);?>
						&mday=<?php echo($mday);?>&msub=<?php echo($msub);?>&mteach=<?php echo($mteach);?>&GId=<?php echo($StudGroup);?>&numbox=<?php echo($numbox);?>&SecID=<?php echo($SecID);?>"
					width="100%" height="65%" frameborder="0" scrolling="no" align="center" border="0">
					Your browser does not support inline frames or is currently configured not to display inline frames.
					</iframe>
					<?php $_SESSION['otherDept']=$otherDept;?>
				</div>
				</a>
				<p>&nbsp;</p>

				<?php

			}

		 }
	  }
	else
		{
		  include("ErrorPage.php");
		}
}
else
{
	include("ErrorPage.php");
}
?>