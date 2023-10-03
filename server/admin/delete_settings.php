<?php
session_start();

// the database connection     	   	
include("../../includes/connect.inc.php");


$d_id = $_GET["settings_id"];

$sql = "DELETE FROM settings WHERE id = '$d_id'";
$result = $conn->query($sql);

?>