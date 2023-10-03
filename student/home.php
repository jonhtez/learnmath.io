<?php
    session_start();

    if(!isset($_SESSION["lm_token"])){

        if(headers_sent()){
	        echo "<script  type = 'text/javascript'> location.href = 'login.php'; </script>";
        }
        else{
	        header("Location:login.php");
	    } 
    }

    $title = 'Admin Area';
    require_once '../includes/header.php';

    require_once '../includes/student_navbar.php';
?>
 
 <div class="container c-ban2" style="margin-top:0px; background:#0098ff;">
        <div style="text-align:center; padding:30px 0;">
            <h3 class="head-title2" style="color:white;">My Area</h3>

            <div class="row" style="padding:40px 0;">
            
                <div class="col-md-6">
                    <div class="card" style="margin-bottom:20px;">
                        <div class="card-body">
                            <img src="../images/report.png" style="margin:auto; padding-bottom:20px;"/>
                            <h5 class="card-title">RESULT</h5>
                            <p class="card-text">
                                All quiz result and details
                            </p>
                            <a href="results.php" class="btn" style="background:#ff3b00; color:white; margin-bottom:10px;">List all results</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card" style="margin-bottom:20px;">
                        <div class="card-body">
                            <img src="../images/settings.png" style="margin:auto; padding-bottom:20px;"/>
                            <h5 class="card-title">PROFILE</h5>
                            <p class="card-text">
                                Update your details 
                            </p>
                            <a href="profile_details_update.php" class="btn" style="background:#ff3b00; color:white; margin-bottom:10px;">Update basic info.</a>  <a href="profile_password_update.php" class="btn" style="background:#ff3b00; color:white; margin-bottom:10px;">Update Password</a> <a href="profile_picture_update.php" class="btn" style="background:#ff3b00; color:white; margin-bottom:10px;">update Picture</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

</div>
    
    