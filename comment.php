<?php
	if($_SERVER['REQUEST_METHOD']!="POST"){
		die("This page only accepts POST requests");
	}

	include_once('include/utils.php');
	$request=new AjaxRequestHandler();
	
	$name=$request->GetParameter("name");
	$file_name=$request->GetParameter("cfile");
	$comment=$request->GetParameter("comments");
	$file=fopen($file_name,'a+');
	fwrite($file,$comment."\n\r\n\r");
	fclose($file);
	
?>

<div class="fl" style="width: 99%;">

 <h1>Thank You</h1>
 
 <p>Thank you for your comments,  <?=$name?>.  They will be reviewed by our Customer Service staff and
 given the full attention that they deserve.</p>

</div>

