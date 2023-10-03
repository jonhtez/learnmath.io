<?php
session_start();
header('Content-type: application/json'); 


// the database connection     	   	
include("../includes/connect.inc.php");
include("../includes/form_validator.inc.php");
include("../includes/functions.php");


$fname = $_POST["fullname"];
$femail = $_POST["email"];
$fcategory = $_POST["category"];
$fpass = $_POST["pass"];


$fullname = form_process($fname);
$email = form_process($femail);
$category = form_process($fcategory);
$passa = form_process($fpass);
$date = date("d-M-Y");

$fnamex = truncateString(strtolower($fullname), 3, "");
$rand = rand('000000000', '999999999');
$min = date("i");
$sec = date("s");

$pword = md5($passa);

if ($min < 10){
	$min = $min + 10;	
}
if ($sec < 10){
	$sec = $sec + 10;	
}
$token = $fnamex.$rand.$min.$sec;


$sql = "SELECT * FROM pupils WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) { 
    echo json_encode(array('status' => 400, 'msg' => 'Email not available'));
}
else {

    $sql = "INSERT INTO pupils ".
               "(fullname, email, category, password, picture, token) "."VALUES ".
               "('$fullname', '$email', '$category', '$pword', 'images/placeholder.png', '$token')";
           
    if ($conn->query($sql)) {
        //printf("Record inserted successfully.<br />");
        echo json_encode(array('status' => 200, 'msg'=> 'Record created'));
    }
    if ($conn->errno) {
        //printf("Could not insert record into table: %s<br />", $conn->error);
        echo json_encode(array('status' => 501, 'msg' => 'Server error'));
    }
    $conn->close();

}

?>