<?php
    error_reporting(0);
    session_start();

    if(!isset($_SESSION["lm_admin_token"])){
       
        if(headers_sent()){
	        echo "<script  type = 'text/javascript'> location.href = 'login.php'; </script>";
        }
        else{
	        header("Location:login.php");
	    } 
    }
    
    $title = 'Admin Area';
    require_once '../includes/header.php';

    require_once '../includes/admin_navbar.php';
?>
 
 <div class="container c-ban2" style="margin-top:0px;">
        <div style="text-align:center; padding:30px 0;">
            <h3 class="head-title2" style="color:#1b30b0;"><STRong>Teacher Panel</STRong></h3>

            <div class="row" style="padding:40px 0;">
            
                <div class="col-md-4">
                    <div class="card" style="margin-bottom:20px;">
                        <div class="card-body">
                            <img src="../images/student.png" style="margin:auto; padding-bottom:20px;"/>
                            <h5 class="card-title">PUPILS</h5>
                            <p class="card-text">
                                All registered pupils for different categories
                            </p>
                            <a href="pupils.php" class="btn" style="background:#1b30b0; color:white;">List</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card" style="margin-bottom:20px;">
                        <div class="card-body">
                            <img src="../images/lesson.png" style="margin:auto; padding-bottom:20px;"/>
                            <h5 class="card-title">LESSONS</h5>
                            <p class="card-text">
                                All the lessons for different class categories
                            </p>
                            <a href="lessons.php" class="btn" style="background:#1b30b0; color:white;">List</a>  <a href="lesson_add.php" class="btn" style="background:#1b30b0; color:white;">+Add</a>
                        </div>
                    </div>
                </div>

                <!-- <div class="col-md-4">
                    <div class="card" style="margin-bottom:20px;">
                        <div class="card-body">
                            <img src="../images/settings.png" style="margin:auto; padding-bottom:20px;"/>
                            <h5 class="card-title">SETTINGS</h5>
                            <p class="card-text">
                                Set the necessary variables for the website
                            </p>
                            <a href="settings_list.php" class="btn" style="background:#ff3b00; color:white;">List</a>  <a href="settings_add.php" class="btn" style="background:#ff3b00; color:white;">+Add</a>
                        </div>
                    </div>
                </div> -->

            </div>

        </div>
    </div>

</div>
    
    