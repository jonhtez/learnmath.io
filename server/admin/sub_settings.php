<?php

header('Content-type: application/json'); 
session_start();

// the database connection     	   	
include("../../includes/connect.inc.php");
include("../../includes/form_validator.inc.php");
include("../../includes/functions.php");

$item = $_POST["item"];
$rate = $_POST["rate"];


$date = date("d-M-Y");

$sql = "INSERT INTO settings ".
               "(item, rate, date) "."VALUES ".
               "('$item', '$rate', '$date')";
           
if ($conn->query($sql)) {
    
    echo json_encode(array('status' => 200, 'msg'=> 'Record created'));
}
else if ($conn->errno) {
    
    echo json_encode(array('status' => 501, 'msg' => 'Server error'));
}
$conn->close();

?>