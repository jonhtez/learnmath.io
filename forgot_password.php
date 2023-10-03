<?php

    session_start();

    $title = 'Login to Learn Maths';
    require_once 'includes/header.php';


    if(isset($_SESSION["lm_lastpage"])){
        if($_SESSION["lm_lastpage"] == 'classroom'){
            $last_page = $_SESSION["lm_lastpage"];
            $last_class = $_SESSION["lm_lastclass"];
            $last_id = $_SESSION["lm_lastid"];
        }
        else {
            $last_page = "Nil";
            $last_class = "Nil";
            $last_id = "Nil";
        }
    }
?>
   
<script>
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; 

    function subPass(){
        var email = $("#email").val();
        var category = $("#category").val();
        var password = $("#password").val();
        var cpassword = $("#cpassword").val();
        
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
        else if (!valemail){
            $("#email").css('border', '1px solid #f1263e');
            alert('Email is not valid');
            $("#loginBtn").css("opacity", "1");
            $("#loginBtn").css("pointer-events", "auto");
        }
        
        else if (category == 'Select...'){
            $("#category").css('border', '1px solid #f1263e');
            alert('Select valid category');
            $("#loginBtn").css("opacity", "1");
            $("#loginBtn").css("pointer-events", "auto");
        }
        else if (password == ''){
            $("#password").css('border', '1px solid #f1263e');
            alert('Password is required');
            $("#loginBtn").css("opacity", "1");
            $("#loginBtn").css("pointer-events", "auto");
        }
        else if (cpassword == ''){
            $("#cpassword").css('border', '1px solid #f1263e');
            alert('Confirm Password is required');
            $("#loginBtn").css("opacity", "1");
            $("#loginBtn").css("pointer-events", "auto");
        }
        else if (password !== cpassword){
            $("#cpassword").css('border', '1px solid #f1263e');
            alert('Password not match');
            $("#loginBtn").css("opacity", "1");
            $("#loginBtn").css("pointer-events", "auto");
        }
        else {
            var url = "server/sub_forgot_password.php";
        $.ajax({
            type: "POST",
            url: url,
            data: {'email':email, 'category':category, 'pass':password}, 
            dataType: 'JSON',
            beforeSend: function(){
                $("#loginBtn").css("opacity", "0.4");
                $("#loginBtn").css("pointer-events", "none");
            }, 
            success: function(response)
            {   
               
                if (response.status == 200){

                    alert(response.msg);
                    $("#email").val('');
                    $("#category").val('');
                    $("#password").val('');
                    $("#cpassword").val('');
                    
                }
                else if (response.status == 400){
                    alert(response.msg);
                }
                else {
                    var msg = "Technical problem occur while login";
                    alert(msg);
                }
            },
            complete: function(){
                $("#loginBtn").css("opacity", "1");
                $("#loginBtn").css("pointer-events", "auto");
            }
        });
    }
}
</script>
    
    <div style="width:400px; background:#0098ff; margin:auto; border-radius:8px; padding:20px; margin-top:70px;">
        <h3 class="head-title2" style="color:white; text-align:center; padding-bottom:30px;">Reset Password</h3>
       
         <input type="hidden" id="last_page" name="last_page" value="<?php echo $last_page;?>"/>
         <input type="hidden" id="last_id" name="last_id" value="<?php echo $last_id;?>"/>
         <input type="hidden" id="last_class" name="last_class" value="<?php echo $last_class;?>"/>

        <form>
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" id="email" name="email" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Category</label>
                <select class="form-select" id="category" name="category" aria-label="Default select example">
                    <option selected>Select...</option>
                    <option value="Class 1">Class 1</option>
                    <option value="Class 2">Class 2</option>
                    <option value="Class 3">Class 3</option>
                    <option value="Class 4">Class 4</option>
                </select>
                
            </div>
            <div class="mb-3">
                <label class="form-label">Write New Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="cpassword" id="cpassword">
            </div>
            <a href="javascript://" onclick="subPass()"><button type="button" id="loginBtn" name="loginBtn" class="btn btn-block" style="width:100%; background:#ed4131; color:white;" >Submit</button></a>
        </form>

        <div class="row" style="margin-top:30px;">
            <div class="col-md-6">
                <p><a href="index.php" style="color:white;">Home Page</a></p>
            </div>
            <div class="col-md-6" style="text-align:right;">
                 <p><a href="login.php" style="color:white;">Login</a></p>
            </div>
        </div>
    </div>
    
   