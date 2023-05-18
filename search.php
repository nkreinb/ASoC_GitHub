<?php
	include_once 'include/utils.php';
	$request=new AjaxRequestHandler();
	$search=$request->GetParameter("Search");
?>

<div class="fl" style="width: 99%;">

<h1>&nbsp;&nbsp;Search Results</h1>

<p>No results were found for the query:<br><br>
<span id="_ctl0__ctl0_Content_Main_lblSearch"><?=$search?></span></p>

<br><br><br><br><br><br><br><br><br><br>
</div>


