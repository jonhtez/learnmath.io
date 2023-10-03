<?php

function form_process($data) {
	$data = trim($data);
	//$data = mysql_real_escape_string($data);
	//$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
  }

?>
	

