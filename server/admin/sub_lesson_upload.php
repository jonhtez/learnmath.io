<?php

header('Content-type: application/json'); 
session_start();

// the database connection     	   	
include("../../includes/connect.inc.php");
include("../../includes/form_validator.inc.php");
include("../../includes/functions.php");

$lecture_id = $_POST["lecture_id"];
$name = $_POST["name"];


$name = form_process($name);

$date = date("d-M-Y");





//if (isset ($_FILES["proimage"]["name"])){
    $dd= date("d-M-Y-his");
    $rand = rand('000000000', '999999999');
    $file2 = "../../upload/".$dd."-".$rand;
    $file = "upload/".$dd."-".$rand;

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
            //echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
            $sql = "INSERT INTO lecture_upload ".
                "(lecture_id, name, upload, date) "."VALUES ".
                "('$lecture_id', '$name', '$file', '$date')";
            
            if ($conn->query($sql)) {
                
                echo json_encode(array('status' => 200, 'msg'=> 'ok'));
                //echo "ok";
            }
            else if ($conn->errno) {
                
                echo json_encode(array('status' => 501, 'msg' => 'err'));
                //echo '<script> alert("Server error")</script>';
                //header("Location:../../admin/lesson_upload_list.php?id=".$lecture_id);
                //echo "err";
            }
            $conn->close();

        } else {
            echo json_encode(array('status' => 501, 'msg' => 'err'));
            //echo '<script> alert("Server error")</script>';
            //header("Location:../../admin/lesson_upload_list.php?id=".$lecture_id);
            //echo "err";
        }

    }
    else {
        echo json_encode(array('status' => 400, 'msg' => 'invalid'));
        //echo '<script> alert("File not supported")</script>';
        //header("Location:../../admin/lesson_upload_list.php?id=".$lecture_id);
        //echo "invalid";
    }

   

//}
?>