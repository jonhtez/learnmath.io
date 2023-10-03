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
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; 

    function subRegister(){
        var password = $("#password").val();
        var cpassword = $("#cpassword").val();
        
        if (password == ''){
            $("#password").css('border', '1px solid #f1263e');
            alert('Password is required');
            $("#regBtn").css("opacity", "1");
            $("#regBtn").css("pointer-events", "auto");
        }
        else if (cpassword == ''){
            $("#cpassword").css('border', '1px solid #f1263e');
            alert('Confirm Password is required');
            $("#regBtn").css("opacity", "1");
            $("#regBtn").css("pointer-events", "auto");
        }
        else if (password !== cpassword){
            $("#cpassword").css('border', '1px solid #f1263e');
            alert('Password not match');
            $("#regBtn").css("opacity", "1");
            $("#regBtn").css("pointer-events", "auto");
        }
        else {
            var url = "../server/students/update_profile_password.php";
        $.ajax({
            type: "POST",
            url: url,
            data: {'pass':password}, 
            dataType: 'JSON',
            beforeSend: function(){
                $("#regBtn").css("opacity", "0.4");
                $("#regBtn").css("pointer-events", "none");
                }, 
            success: function(response)
            {   
               
                if (response.status == 200){
                    alert("Password updated successfully");
                }
                else {
                    var msg = "Technical problem occured";
                    alert(msg);
                }
            },
            complete: function(){
                $("#regBtn").css("opacity", "1");
                $("#regBtn").css("pointer-events", "auto");
            }
        });
    }
}
</script>

 
 <div class="container c-ban2" style="margin-top:0px; background:white;">
        <div style="text-align:center; padding:30px 0;">
            <h3 class="head-title2" style="color:#73a73c;">Update Password</h3>

            <div class="row">
                <div class="col-md-6" style="text-align:left;">
                    <p><a href="home.php">Back</a></p>
                </div>
                <div class="col-md-6" style="text-align:right;">
                
                </div>
            </div>


            <div style="padding:40px 0;">
            
                <div style="width:600px; margin:auto; border-radius:8px; padding:20px; margin-top:70px;">
                    <form>
                        <div class="mb-3" style="text-align:left;">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <div class="mb-3" style="text-align:left;">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="cpassword" id="cpassword">
                        </div>
                        
                        <a href="javascript://" onclick="subRegister()"><button type="button" id="regBtn" name="regBtn" class="btn btn-block" style="width:100%; background:#ed4131; color:white;" >Submit</button></a>
                    </form>
                </div>

            </div>

        </div>
    </div>

</div>
    
    