<?php
session_start();
header('Content-type: application/json'); 

// the database connection     	   	
include("../includes/connect.inc.php");
include("../includes/form_validator.inc.php");
include("../includes/functions.php");


$email = $_POST["email"];
$pass = $_POST["pass"];

$email = form_process($email);
$date = date("d-M-Y");


$pword = md5($pass);


$sql = "SELECT * FROM pupils WHERE email = '$email' AND password = '$pword'";
$result = $conn->query($sql);

if ($result->num_rows > 0) { 
    $row = $result->fetch_assoc();

    $_SESSION["lm_id"] = $row["id"];
    $_SESSION["lm_fullname"] = $row["fullname"];
    $_SESSION["lm_category"] = $row["category"];
    $_SESSION["lm_email"] = $row["email"];
    $_SESSION["lm_token"] = $row["token"];

    $data[] = array('id' => $row["id"], 'fullname' => $row["fullname"], 'email' => $row["email"], 'category' => $row["category"], 'token'=> $row["token"]);

    echo json_encode(array('status' => 200, 'msg' => 'Record found', 'data' => $data));
}
else {

    echo json_encode(array('status' => 400, 'msg' => 'Record not found'));

}



?>