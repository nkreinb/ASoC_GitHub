<?php
	include_once('include/utils.php');
	include_once('include/db.php');
	function error($m){
		$_SESSION['survey_email']="";
		$_SESSION['survey_impressed']="";
		die('<div style="color:red;font-family:Tahoma;
		font-size:12px;padding:10px;font-weight:bold">'.$m.'
		<br><br><br><br><br><br><br><br><br><br><br><br><br></div>');
	}
	
	if($_SERVER['REQUEST_METHOD']!="POST"){
		die("This page only accepts POST requests");
	}
		
	$request=new AjaxRequestHandler();
	$page=$request->GetParameter("target_page");
	session_start();
	//validation
	switch($page){
		case 3: 
			$email=$request->GetParameter("email");
			if(!$email) error("No e-mail specified");
			$c=new Connection();
			$c->connect();
			$result=mysql_query("select * from surveys where email='$email'");    
			$c->close();
			if($result && mysql_num_rows($result)) error("The e-mail specified already exists in our database");
			$_SESSION['survey_email']=$email;
			break;
		case 4: $impressed=$request->GetParameter("impressed");
			
			if($impressed!=1 && $impressed!=0) 
				error("Please specify if you were impressed or not");
			$_SESSION['survey_impressed']=$impressed;
			$c=new Connection();
			$c->connect();
			$result=mysql_query("select * from surveys where email='".$_SESSION['survey_email']."'");
			if($result && mysql_num_rows($result)) error("The e-mail specified already exists in our database");
			mysql_query(" INSERT INTO `surveys` ( `email` , `impressed` ) 
			VALUES ('".$_SESSION['survey_email']."', '".$_SESSION['survey_impressed']."') ");
			$err=mysql_error($c->handle);
			$c->close();
			if($err!="") error($err);
			setcookie("survey_done","true");
			break;			
	}
	
	//presentation
?>
<form id="survey_form" style="padding:10px;">

<?
	
	switch($page){
		case 1: 
			?>
			<h1><span id="_ctl0__ctl0_Content_Main_lblTitle">&nbsp;&nbsp;&nbsp;Win an iPod!</span></h1>
    		<span id="_ctl0__ctl0_Content_Main_lblContent"><p>Please complete our customer survey, you have an opportunity to win an iPod.  Would you like to continue?<br></p><ul><li>
    		<a style="cursor:pointer" onclick="survey_next()"><u>Yes</u></a></li><li>
    		<a  style="cursor:pointer" onclick="hide_nav_frame();document.cookie='survey_done=true'"><u>No</u></a></li></ul></span>	
    		<input type="hidden" id="target_page" name="target_page" value="2">
			<?
			
			break;
		case 2: 
			?>
			<br><br>
			Please enter your e-mail address:
			<br><br><br>
			<input type="text" name="email">
			<br><br><br>
			<input type="button" value="Next" onclick="survey_next()">
			<input type="button" value="Cancel" onclick="hide_nav_frame()">
			<input type="hidden" id="target_page" name="target_page" value="3">
			<?
			break;	
		case 3: 
			?>
			<br><br>
			Please tell us if you were impressed with the new look of the site<br>
			<br><br>
			<select name="impressed">
				<option value="1">Yes</option>
				<option value="0">No</option>
			</select>
			<br><br><br>
			<input type="button" value="Next" onclick="survey_next()">
			<input type="button" value="Cancel" onclick="hide_nav_frame()">
			<input type="hidden" id="target_page" name="target_page" value="4">
			<?
			
			break;			
		case 4: 
			?>
			<br><br>
			Thank you for your feedback. The following information was added to our records
			<br><br>
			E-mail address:<?=$_SESSION['survey_email']?><br><br>
			<br><br>
			We will contact you soon to let you know if you won.
			<? 
			
			break;		
	
	}
		
?><p align="right"><img src="images/iPod.jpeg"></p>
</form> 
