<?php

header('Content-type: application/json'); 
session_start();

// the database connection     	   	
include("../../includes/connect.inc.php");
include("../../includes/form_validator.inc.php");
include("../../includes/functions.php");


$fname = $_POST["fullname"];
$femail = $_POST["email"];
$fcategory = $_POST["category"];

$token = $_SESSION["lm_token"];

$fullname = form_process($fname);
$email = form_process($femail);
$category = form_process($fcategory);


$sql = "SELECT * FROM pupils WHERE email = '$email' AND token != '$token'";
$result = $conn->query($sql);

if ($result->num_rows > 0) { 
    echo json_encode(array('status' => 400, 'msg' => 'Email not available'));
}
else {

    $sql = "UPDATE pupils SET fullname = '$fullname', email = '$email', category = '$category' WHERE token = '$token'";
    $result = $conn->query($sql);

    $_SESSION["lm_fullname"] = $fullname;
    $_SESSION["lm_category"] = $category;
    $_SESSION["lm_email"] = $email;

    echo json_encode(array('status' => 200, 'msg'=> 'success'));
   
    $conn->close();

}

?>