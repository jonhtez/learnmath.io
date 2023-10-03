<?php
session_start();

    session_unset();

    if(headers_sent()){
        echo "<script  type = 'text/javascript'> location.href = 'index.php'; </script>";
    }
    else{
        header("Location:index.php");
    } 

?>   