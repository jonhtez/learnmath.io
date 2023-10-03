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

    function subLogin(){
        var email = $("#email").val();
        var password = $("#password").val();
        var last_id= $("#last_id").val();
        var last_class = $("#last_class").val();
        var last_page = $("#last_page").val();
        
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
        
        else if (password == ''){
            $("#password").css('border', '1px solid #f1263e');
            alert('Password is required');
            $("#loginBtn").css("opacity", "1");
            $("#loginBtn").css("pointer-events", "auto");
        }

        else {
            var url = "server/sub_login.php";
        $.ajax({
            type: "POST",
            url: url,
            data: {'email':email, 'pass':password}, 
            dataType: 'JSON',
            beforeSend: function(){
                $("#loginBtn").css("opacity", "0.4");
                $("#loginBtn").css("pointer-events", "none");
            }, 
            success: function(response)
            {   
               
                if (response.status == 200){

                    if(last_page == 'classroom'){
                        window.location.href = "classroom.php?page=classroom&cat="+last_class+"&id="+last_id;
                        //header("Location:classroom.php?cat="+last_class+"&id="+last_id);
                    }
                    else {
                        window.location.href = "student/home.php";
                    }
                    
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
    
    <div style="width:400px; background:#f3a222; margin:auto; border-radius:8px; padding:20px; margin-top:70px;">
        <h3 class="head-title2" style="color:white; text-align:center; padding-bottom:30px;">Login to Portal</h3>
       
         <input type="hidden" id="last_page" name="last_page" value="<?php echo $last_page;?>"/>
         <input type="hidden" id="last_id" name="last_id" value="<?php echo $last_id;?>"/>
         <input type="hidden" id="last_class" name="last_class" value="<?php echo $last_class;?>"/>

        <form>
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" id="email" name="email" class="form-control">
                
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control">
            </div>
            <a href="javascript://" onclick="subLogin()"><button type="button" id="loginBtn" name="loginBtn" class="btn btn-block" style="width:100%; background:#ed4131; color:white;" >Login</button></a>
        </form>

        <div class="row" style="margin-top:30px; text-align:center;">
             <p><a href="forgot_password.php">Forgot Password?</a></p>
        </div>

        <div class="row" style="margin-top:15px;">
            <div class="col-md-6">
                <p><a href="index.php">Home Page</a></p>
            </div>
            <div class="col-md-6" style="text-align:right;">
                 <p><a href="register.php">New Member?</a></p>
            </div>
            <div class="col-md-6">
                <p><a href="admin/login.php">Admin</a></p>
            </div>
            <div class="col-md-6">
                <p><a href="teacher/login.php">teacher</a></p>
            </div>
        </div>
    </div>
    
   