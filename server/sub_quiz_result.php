<?php

header('Content-type: application/json'); 
session_start();

// the database connection     	   	
include("../includes/connect.inc.php");
include("../includes/form_validator.inc.php");
include("../includes/functions.php");


$lecture_id = $_POST["lecture_id"];
$pupil_id = $_POST["pupil_id"];
$wk = $_POST["week"];
$category = $_POST["category"];
$result = $_POST["result"];
$status = $_POST["status"];
$date = $_POST["date"];


$sql = "INSERT INTO activities ".
               "(lecture_id, pupil_id, result, week, category, status, date) "."VALUES ".
               "('$lecture_id', '$pupil_id', '$result', '$wk', '$category', '$status', '$date')";
           
    if ($conn->query($sql)) {
        //printf("Record inserted successfully.<br />");
        echo json_encode(array('status' => 200, 'msg'=> 'Record created'));
    }
    if ($conn->errno) {
        //printf("Could not insert record into table: %s<br />", $conn->error);
        echo json_encode(array('status' => 501, 'msg' => 'Server error'));
    }
    $conn->close();



?>