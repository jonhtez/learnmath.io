<?php
session_start();
header('Content-type: application/json'); 


// the database connection     	   	
include("../includes/connect.inc.php");
include("../includes/form_validator.inc.php");
include("../includes/functions.php");

$femail = $_POST["email"];
$fcategory = $_POST["category"];
$fpass = $_POST["pass"];


$email = form_process($femail);
$category = form_process($fcategory);
$passa = form_process($fpass);
$date = date("d-M-Y");

$pword = md5($passa);

$sql = "SELECT * FROM pupils WHERE email = '$email' AND category = '$category'";
$result = $conn->query($sql);

if ($result->num_rows < 1) { 
    echo json_encode(array('status' => 400, 'msg' => 'Account not found'));
}
else {


    $sql = "UPDATE pupils SET password = '$pword' WHERE email = '$email'";
    if ($conn->query($sql)) {
        //printf("Record inserted successfully.<br />");
        echo json_encode(array('status' => 200, 'msg'=> 'Password reset successfully'));
    }
    if ($conn->errno) {
        //printf("Could not insert record into table: %s<br />", $conn->error);
        echo json_encode(array('status' => 501, 'msg' => 'Server error'));
    }
    $conn->close();

}

?>