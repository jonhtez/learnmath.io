<?php
// the database connection     	   	
function truncateString($str, $maxChars = 40, $holder="..."){
	if (strlen($str) > $maxChars) {
		return trim (substr($str, 0, $maxChars)) . $holder;
	} else {
		return $str;
	}
}

?>  