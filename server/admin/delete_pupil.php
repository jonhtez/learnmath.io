<?php
session_start();

// the database connection     	   	
include("../../includes/connect.inc.php");


$d_id = $_GET["pupil_id"];

$sql = "DELETE FROM pupils WHERE id = '$d_id'";
$result = $conn->query($sql);




?>