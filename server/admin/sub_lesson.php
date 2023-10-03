<?php

header('Content-type: application/json'); 
session_start();

// the database connection     	   	
include("../../includes/connect.inc.php");
include("../../includes/form_validator.inc.php");
include("../../includes/functions.php");

$category = $_POST["category"];
$week = $_POST["week"];
$topic = $_POST["topic"];
$note = $_POST["note"];


$topic = form_process($topic);
$note = form_process($note);

$date = date("d-M-Y");

$sql = "INSERT INTO lectures ".
               "(category, week, topic, note, date) "."VALUES ".
               "('$category', '$week', '$topic', '$note', '$date')";
           
if ($conn->query($sql)) {
    
    echo json_encode(array('status' => 200, 'msg'=> 'Record created'));
}
else if ($conn->errno) {
    
    echo json_encode(array('status' => 501, 'msg' => 'Server error'));
}
$conn->close();

?>