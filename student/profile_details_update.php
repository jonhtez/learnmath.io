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
        var email = $("#email").val();
        var fullname = $("#fullname").val();
        var category = $("#category").val();
        
        if(email.match(mailformat))  
        {  
        var valemail = true;
        }  
        else  
        {  
            var valemail = false; 
        } 
        
        if (email == ''){
            $("#email").css('border', '1px solid #f1263e');
            alert('Email is required');
            $("#loginBtn").css("opacity", "1");
            $("#loginBtn").css("pointer-events", "auto");
        }
        else {
            var url = "../server/students/update_profile_details.php";
        $.ajax({
            type: "POST",
            url: url,
            data: {'fullname':fullname, 'email':email, 'category':category}, 
            dataType: 'JSON',
            beforeSend: function(){
                $("#regBtn").css("opacity", "0.4");
                $("#regBtn").css("pointer-events", "none");
                }, 
            success: function(response)
            {   
               
                if (response.status == 200){
                    alert("Profile updated successfully");
                }
                else if (response.status == 400){
                    alert(response.msg);
                }
                else {
                    var msg = "Technical problem";
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
            <h3 class="head-title2" style="color:#73a73c;">Update Profile</h3>

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
                            <label class="form-label">Fullname</label>
                            <input type="text" name="fullname" id="fullname" class="form-control" value="<?php echo $row["fullname"];?>">
                            
                        </div>
                        <div class="mb-3" style="text-align:left;">
                            <label class="form-label">Email</label>
                            <input type="text" name="email" class="form-control" id="email" value="<?php echo $row["email"];?>">
                            
                        </div>
                        <div class="mb-3" style="text-align:left;">
                            <label class="form-label">Category</label>
                            <select class="form-select" id="category" name="category" aria-label="Default select example">
                                <option selected><?php echo $row["category"];?></option>
                                <option value="Class 1">Class 1</option>
                                <option value="Class 2">Class 2</option>
                                <option value="Class 3">Class 3</option>
                                <option value="Class 4">Class 4</option>
                            </select>
                            
                        </div>
                        
                        <a href="javascript://" onclick="subRegister()"><button type="button" id="regBtn" name="regBtn" class="btn btn-block" style="width:100%; background:#ed4131; color:white;" >Submit</button></a>
                    </form>
                </div>

            </div>

        </div>
    </div>

</div>
    
    