<?php
session_start();

// the database connection     	   	
include("../../includes/connect.inc.php");


$d_id = $_GET["lesson_id"];

$sql = "DELETE FROM lectures WHERE id = '$d_id'";
$result = $conn->query($sql);

$sql2 = "DELETE FROM lecture_upload WHERE lecture_id = '$d_id'";
$result2 = $conn->query($sql2);

?>