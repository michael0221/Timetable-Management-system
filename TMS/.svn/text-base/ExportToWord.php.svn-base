<?php

//Creation date: 18-APR-2009
//Author: GCCSIT
//--------------------------------------------------------
// These Methods used to Export Report to MS-Word Document  
//--------------------------------------------------------

//--------------------------------------------------------------------------------------------------------------
//[1] print report into Ms-Word Document
function ExportToMsWord($filename,$txt,$status=1)
{
    
    if($status==0)
    {
	  //overwrite file    
	  
    	    //echo("<div align='left'><a href='".$filename."' target='_blank'>&nbsp; Export to Word<img border='0' src='images/MsWord.bmp' width='27' height='29' align='baseline'/></a></div>");
    	
    	$fh = fopen($filename ,"w") or die ("Error :Can't open File to write");

    }
    else
    if($status ==1)
    {
    	//append to file
    	$fh = fopen($filename ,"a") or die ("Error :Can't open File to append");
    }
   
    //add text into file
    
    fwrite ($fh, $txt);
             
    fclose ($fh);
        
}//end of function

//---------------------------------------------------------------------------------------------------------------
//[3] Delete Tamplate Files from folder "PrintResult" 

function DeleteAllFiles($path)
{

	$dir_handle = @opendir($path) or die("Unable to open $path");

	while($file = readdir($dir_handle))
	{
		//check if subDirectory or file
		if(is_dir($file)) {

			continue;
		}

		else if($file != '.' && $file != '..')
		{
	 		//delete file
	 		unlink($path."/".$file);

		}//end of else

	}//end of while

	//closing the directory
	closedir($dir_handle);

}//end of function

//-----------------------------------------------------------------------------------------------------------------------

?>