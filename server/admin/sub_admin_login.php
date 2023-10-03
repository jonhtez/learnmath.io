<?php

header('Content-type: application/json'); 
session_start();

// the database connection     	   	
include("../../includes/connect.inc.php");
include("../../includes/form_validator.inc.php");
include("../../includes/functions.php");


$email = $_POST["email"];
$pass = $_POST["pass"];


$email = form_process($email);
$date = date("d-M-Y");




$sql = "SELECT * FROM admin WHERE email = '$email' AND password = '$pass'";
$result = $conn->query($sql);

if ($result->num_rows > 0) { 
    $row = $result->fetch_assoc();

    $_SESSION["lm_admin_id"] = $row["id"];
    $_SESSION["lm_admin_email"] = $row["email"];
    $_SESSION["lm_admin_token"] = $row["token"];

    $data[] = array('email' => $row["email"], 'token'=> $row["token"]);

    echo json_encode(array('status' => 200, 'msg' => 'Record found', 'data' => $data));
}
else {

    echo json_encode(array('status' => 400, 'msg' => 'Record not found'));

}



?>