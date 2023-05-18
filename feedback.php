<?php
	include_once("include/config.php");
	include_once("include/masters.php");
	
	$master=new HomeMaster();
	$master->OpenPage();
?>


<script>

function display_feedback_response(response){
	document.getElementById('content').innerHTML=response;
}

function doFeedback(){
	
	SendRequest('<?=SITE_ROOT?>/comment.php',
			SerializeForm(document.getElementById('cmt')),display_feedback_response);
}

</script>

<div class="fl" id="content" style="width: 99%;">

<h1>Feedback</h1>

<p>Our Frequently Asked Questions area will help you with many of your inquiries.<br>
If you can't find your question, return to this page and use the e-mail form below.</p>

<p><b>IMPORTANT!</b> This feedback facility is not secure.  Please do not send any <br>
account information in a message sent from here.</p>

<form name="cmt" id="cmt" method="post" action="comment.php">

<!--- Dave- Hard code this into the final script - Possible security problem.
  Re-generated every Tuesday and old files are saved to .bak format at L:\backup\website\oldfiles    -->
<input name="cfile" value="comments.txt" type="hidden">

<table border="0">
  <tbody><tr>
    <td align="right">To:</td>
    <td valign="top"><b>Online Banking</b> </td>
  </tr>

  <tr>
    <td align="right">Your Name:</td>
    <td valign="top"><input name="name" id="name" size="25" value=" " type="text"></td>
  </tr>
  <tr>
    <td align="right">Your Email Address:</td>
    <td valign="top"><input name="email_addr" id="email_addr" size="25" type="text"></td>
  </tr>

  <tr>
    <td align="right">Subject:</td>
    <td valign="top"><input name="subject" id="subject" size="25"></td>
  </tr>
  <tr>
    <td valign="top" align="right">Question/Comment:</td>
    <td><textarea cols="65" name="comments" id="comments" rows="8" wrap="PHYSICAL" align="top"></textarea></td>

  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input value=" Submit " name="submit" type="button" onclick="doFeedback()" >&nbsp;<input value=" Clear Form " name="reset" type="reset"></td>
  </tr>
</tbody></table>
</form>

<br><br>

<img src="http://www.altoromutual.com/bug.aspx" id="_ctl0__ctl0_Content_Main_bug" width="1" height="1">

</div>
<?
	$master->ClosePage();
?>