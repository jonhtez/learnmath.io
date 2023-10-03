<?php

header('Content-type: application/json'); 
session_start();

// the database connection     	   	
include("../../includes/connect.inc.php");
include("../../includes/form_validator.inc.php");
include("../../includes/functions.php");

$token = $_SESSION["lm_token"];



    $dd= date("d-M-Y-his");
    $rand = rand('000000000', '999999999');
    $file2 = "../../upload/profile/".$dd."-".$rand;
    $file = "upload/profile/".$dd."-".$rand;

    if ($_FILES['proimage']['type'] == "image/jpg" || $_FILES['proimage']['type'] == "image/jpeg" || $_FILES['proimage']['type'] == "image/png" ) {

        if ($_FILES['proimage']['type'] == "image/jpeg"){
            $file2 = $file2.".jpg";
            $file = $file.".jpg";
        }
        else if ($_FILES['proimage']['type'] == "image/jpg"){
            $file2 = $file2.".jpg";
            $file = $file.".jpg";
        }
        else {
            $file2 = $file2.".png";
            $file = $file.".png";
        }

        
         
        if (move_uploaded_file($_FILES["proimage"]["tmp_name"], $file2)) {

            $sql = "UPDATE pupils SET picture = '$file' WHERE token = '$token'";
            if ($conn->query($sql)) {
                
                echo json_encode(array('status' => 200, 'msg'=> 'Updated successfully'));
            }
            else if ($conn->errno) {
                
                echo json_encode(array('status' => 501, 'msg' => 'err'));
            }
            $conn->close();

        } else {
            echo json_encode(array('status' => 501, 'msg' => 'Server Error'));
        }

    }
    else {
        echo json_encode(array('status' => 400, 'msg' => 'Invalid image type'));
    }

   
?>