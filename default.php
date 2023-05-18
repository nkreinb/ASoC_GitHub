<?
	include_once("include/config.php");
	include_once("include/masters.php");
	
	$master=new HomeMaster();
	
	$master->OpenPage();
	
    $content=$_GET['content'];
    
    	if($content=="") $content="default.htm";	
    	if(file_exists("static/$content"))
    		include("static\\$content");
    
    
    $master->ClosePage();
    
    ?>

    