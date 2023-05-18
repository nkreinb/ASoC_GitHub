<?php
	include_once("include/config.php");
	include_once("include/masters.php");
	include_once("include/utils.php");
	include_once("include/db.php");
	$post_data="";

	if($_SERVER['REQUEST_METHOD']=="POST"){
		$request=new AjaxRequestHandler();
		$txtEmail=$request->GetParameter("txtEmail");
		$conn=new Connection();
		$conn->connect();
		mysql_query("INSERT INTO `email` (`email`) VALUES ('$txtEmail')",$conn->handle);
		$err=mysql_error($conn->handle);
		$conn->close();
		if($err=="") echo "Thank you. Your email $txtEmail has been accepted";
		else echo $err;	
		die();
	}
	
	
	$master=new HomeMaster();
	$master->OpenPage();
?>

<script>

function display_response(response){
	//show_nav_frame("&nbsp;&nbsp;Thank you for your feedback!",response);
	document.getElementById('message').innerHTML=response;
}

function doSubscribe(){
	
	SendRequest('<?=SITE_ROOT?>/subscribe.aspx',
			SerializeForm(document.getElementById('subscribe')),display_response);
}

</script>

<div class="fl" id="content" style="width: 99%;">

<h1>Subscribe</h1>

<p>We recognize that things are always evolving and changing here at Altoro Mutual.
Please enter your email below and we will automatically notify of noteworthy events.</p>

<form action="subscribe.aspx" method="post" name="subscribe" id="subscribe" onsubmit="return confirmEmail(txtEmail.value);">
  <table>
    <tbody><tr>
      <td colspan="2">

        <span id="message" style="color: Red; font-size: 12pt; font-weight: bold;"></span>
      </td>
    </tr>
    <tr>
      <td>
        Email:
      </td>
      <td>
        <input id="txtEmail" name="txtEmail" value="" style="width: 150px;" type="text">

      </td>
    </tr>
    <tr>
        <td></td>
        <td>
          <input name="btnSubmit" value="Subscribe" type="button" onclick="doSubscribe()">
        </td>
      </tr>
  </tbody></table>

</form>

<script>
function confirmEmail(sEmail) {
  var msg = null;
  if (sEmail != "") {
    var emailFilter=/^[\w\d\.\%-]+@[\w\d\.\%-]+\.\w{2,4}$/;
    if (!(emailFilter.test(sEmail))) {
      var illegalChars= /[^\w\d\.\%\-@]/;
      if (sEmail.match(illegalChars)) {
          msg = "Your email can only contain alphanumeric\ncharacters and the following:  @.%-\n\n";
      } else {
        msg = "The email does not appear to be valid.  Please enter it again.\n\n";
      }
    }
  } else {
    msg = "Please enter an email address.\n\n";
  }
  if (msg != null) {
      alert(msg);
      return false;
  } else {
      return true;
  }
}
</script>

</div>
<?php 
	$master->ClosePage();
?>
