<?php
session_start();

// the database connection     	   	
include("../../includes/connect.inc.php");


$d_id = $_GET["quiz_id"];

$sql = "DELETE FROM quiz WHERE id = '$d_id'";
$result = $conn->query($sql);




?>