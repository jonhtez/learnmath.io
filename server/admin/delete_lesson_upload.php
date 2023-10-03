<?php
session_start();

// the database connection     	   	
include("../../includes/connect.inc.php");


$d_id = $_GET["lesson_upload_id"];

$sql = "DELETE FROM lecture_upload WHERE id = '$d_id'";
$result = $conn->query($sql);




?>