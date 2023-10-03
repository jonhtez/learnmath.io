<?php

    session_start();
    error_reporting(0);

    $title = 'Login to Learn Maths';
    require_once 'includes/header.php';

    include("includes/connect.inc.php");
    //include("php/functions.php");
?>

<script>
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; 

    function subRegister(){
        var fullname = $("#fullname").val();
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
        
        if (fullname == ''){
            $("#fullname").css('border', '1px solid #f1263e');
            alert('Fullname is required');
            $("#regBtn").css("opacity", "1");
            $("#regBtn").css("pointer-events", "auto");
        }
        else if (email == ''){
            $("#email").css('border', '1px solid #f1263e');
            alert('Email is required');
            $("#regBtn").css("opacity", "1");
            $("#regBtn").css("pointer-events", "auto");
        }
        else if (!valemail){
            $("#email").css('border', '1px solid #f1263e');
            alert('Email is not valid');
            $("#regBtn").css("opacity", "1");
            $("#regBtn").css("pointer-events", "auto");
        }
        else if (category == 'Select...'){
            $("#category").css('border', '1px solid #f1263e');
            alert('Select valid category');
            $("#regBtn").css("opacity", "1");
            $("#regBtn").css("pointer-events", "auto");
        }
        else if (password == ''){
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
            var url = "server/sub_register.php";
            $.ajax({
                type: "POST",
                url: url,
                data: {'fullname':fullname, 'email':email, 'category':category, 'pass':password}, 
                dataType: 'JSON',
                beforeSend: function(){
                    $("#regBtn").css("opacity", "0.4");
                    $("#regBtn").css("pointer-events", "none");
                    }, 
                success: function(response)
                {   
                
                    if (response.status == 200){
                        alert("Registration successful");
                        window.location.href = "login.php";

                    }
                    else if (response.status == 501){
                        var msg = "Sorry! Account with same Email already registered";
                        alert(msg);
                    }
                    else {
                        var msg = "Technical problem occur while registering this account";
                        alert(msg);
                    }
                },
                complete: function(){
                    $("#fullname").val('');
                    $("#email").val('');
                    $("#category").val('');
                    $("#password").val('');
                    $("#cpassword").val('');

                    $("#regBtn").css("opacity", "1");
                    $("#regBtn").css("pointer-events", "auto");
                }
            });
        }
    }
</script>
   
    <!-- <div class="container" style="padding:0;"> 
        <div class="banner-pack">
            <div class="banner-title">
                <h1>Learn Mathematics</h1>
                <p>We help kids develop there skills in mathematics and prepare them for examinations</p>
            </div>
        </div>
    </div> -->
    <div style="width:400px; background:#8a7bcf; margin:auto; border-radius:8px; padding:20px; margin-top:70px;">
        <h3 class="head-title2" style="color:white; text-align:center; padding-bottom:30px;">New Member</h3>

        <form>
            <div class="mb-3">
                <label class="form-label">Fullname</label>
                <input type="text" name="fullname" id="fullname" class="form-control">
                
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" name="email" class="form-control" id="email">
                
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
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="cpassword" id="cpassword">
            </div>
            <a href="javascript://" onclick="subRegister()"><button type="button" id="regBtn" name="regBtn" class="btn btn-block" style="width:100%; background:#ed4131; color:white;" >Submit</button></a>
        </form>

        <div class="row" style="margin-top:30px;">
            <div class="col-md-6">
                <p><a href="index.php" style="color:white;">Home page</a></p>
            </div>
            <div class="col-md-6" style="text-align:right;">
                <p><a href="login.php" style="color:white;">Login</a></p>
            </div>
        </div>
    </div>
    
   