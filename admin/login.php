<?php
    session_start();
    $title = 'Admin Area';
    require_once '../includes/header.php';
?>
   
<script>
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; 

    function subAdminLogin(){
        var email = $("#email").val();
        var password = $("#password").val();
        
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
        
        else if (password == ''){
            $("#password").css('border', '1px solid #f1263e');
            alert('Password is required');
            $("#loginBtn").css("opacity", "1");
            $("#loginBtn").css("pointer-events", "auto");
        }

        else {
            var url = "../server/admin/sub_admin_login.php";
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
                    
                    window.location.href = "home.php";
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

    
    <div style="width:400px; background:#ed4131; margin:auto; border-radius:8px; padding:20px; margin-top:70px;">
        <h3 class="head-title2" style="color:white; text-align:center; padding-bottom:30px;">Admin Login</h3>

        <form>
            <div class="mb-3">
                <label class="form-label" style="color:white;">Email address</label>
                <input type="email" id="email" name="email" class="form-control">
                
            </div>
            <div class="mb-3">
                <label class="form-label" style="color:white;">Password</label>
                <input type="password" id="password" name="password" class="form-control">
            </div>
            <a href="javascript://" onclick="subAdminLogin()"><button type="button" id="loginBtn" name="loginBtn" class="btn btn-block" style="width:100%; background:#f3a222; color:white;" >Login</button></a>
        </form>

        <div class="row" style="margin-top:30px;">
            <div class="col-md-6">
                <!-- <p style="color:white;"><a href="javascript://">back to user login </a></p> -->
            </div>
            <div class="col-md-6" style="text-align:right;">
                 
            </div>
        </div>
    </div>
