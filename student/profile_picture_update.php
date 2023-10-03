<?php
    error_reporting(0);
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

    include("../includes/connect.inc.php");

    $pid = $_SESSION["lm_id"];

    $sql = "SELECT * FROM pupils WHERE id = '$pid'";
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();
    
?>

<script>

jQuery.noConflict()(function ($) { // this was missing for me
    $(document).ready(function (e) {
    $("#proform").on('submit',(function(e) {
        e.preventDefault();
        $.ajax({
                url: "../server/students/update_profile_picture.php",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
                    cache: false,
            processData:false,
            beforeSend : function()
            {
                    $("#submit").css("opacity", "0.4");
                    $("#submit").css("pointer-events", "none");
            },
            success: function(data){
                
                alert(data.msg);
                $("#answer").val('');
                $("#proimage").val('');

                $("#submit").css("opacity", "1");
                $("#submit").css("pointer-events", "auto");
            }      
        });
     }));

    });
});

</script>

 
 <div class="container c-ban2" style="margin-top:0px; background:white;">
        <div style="text-align:center; padding:30px 0;">
            <h3 class="head-title2" style="color:#73a73c;">Update Profile Picture</h3>

            <div class="row">
                <div class="col-md-6" style="text-align:left;">
                    <p><a href="home.php">Back</a></p>
                </div>
                <div class="col-md-6" style="text-align:right;">
                
                </div>
            </div>


            <div style="padding:40px 0;">
            
                <div style="width:600px; margin:auto; border-radius:8px; padding:20px; margin-top:70px;">
                    <form id="proform" name="proform" method="post" enctype="multipart/form-data">
                        
                        <div class="mb-3">
                            <label class="form-label">Upload new picture</label>
                            <input type="file" name="proimage" id="proimage" name="proimage"/>
                        </div>
                        
                        <input type="submit" name="submit" id="submit" class="btn btn-block" style="width:100%; background:#ed4131; color:white;" value="upload"/>
                       
                    </form>
                </div>

            </div>

        </div>
    </div>

</div>
    
    