<?php

header('Content-type: application/json'); 
session_start();

// the database connection     	   	
include("../../includes/connect.inc.php");
include("../../includes/form_validator.inc.php");
include("../../includes/functions.php");


$pass = $_POST["pass"];

$token = $_SESSION["lm_token"];

$pass = md5($pass);

$sql = "UPDATE pupils SET password = '$pass' WHERE token = '$token'";
$result = $conn->query($sql);

    echo json_encode(array('status' => 200, 'msg'=> 'success'));
   
    $conn->close()

?>