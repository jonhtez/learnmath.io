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

    include("../includes/connect.inc.php");

?>

<script>

    function subSettings(){
        var item = $("#item").val();
        var rate = $("#rate").val();
        
        if (item == ''){
            $("#item").css('border', '1px solid #f1263e');
            alert('Key is required');
            $("#btn").css("opacity", "1");
            $("#btn").css("pointer-events", "auto");
        }
        
        else if (rate == ''){
            $("#rate").css('border', '1px solid #f1263e');
            alert('Rate is required');
            $("#btn").css("opacity", "1");
            $("#btn").css("pointer-events", "auto");
        }

        else {
            var url = "../server/admin/sub_settings.php";
        $.ajax({
            type: "POST",
            url: url,
            data: {'item':item, 'rate':rate}, 
            dataType: 'JSON',
            beforeSend: function(){
                $("#btn").css("opacity", "0.4");
                $("#btn").css("pointer-events", "none");
                }, 
            success: function(response)
            {   
               
                if (response.status == 200){
                    alert("Record created successfully")
                }
                else {
                    var msg = "Technical problem";
                    alert(msg);
                }
            },
            complete: function(){
                $("#btn").css("opacity", "1");
                $("#btn").css("pointer-events", "auto");
            }
        });
    }
}
</script>
 
 <div class="container c-ban2" style="margin-top:0px; background:white;">
    <div style="text-align:center; padding:30px 0;">
        <h3 class="head-title2" style="color:#73a73c;">Set Settings</h3>

        <div class="row">
            <div class="col-md-6" style="text-align:left;">
                <p><a href="home.php">Back</a></p>
            </div>
            <div class="col-md-6" style="text-align:right;">
               
            </div>
        </div>

        <div class="row" style="padding:40px 0; text-align:left;">
            
            <div style="width:600px; margin:auto; border-radius:8px; padding:20px; margin-top:70px;">

                <form>

                    <div class="mb-3">
                        <label class="form-label">Key</label>
                        <input type="text" id="item" name="item" class="form-control">
                    </div>

                   <div class="mb-3">
                        <label class="form-label">Value</label>
                        <input type="text" id="rate" name="rate" class="form-control">
                    </div>

                    <a href="javascript://" onclick="subSettings()"><button type="button" id="btn" name="btn" class="btn btn-block" style="width:100%; background:#ed4131; color:white;" >Submit</button></a>
                    
                </form>
    
            </div>

        </div>

    </div>

</div>
    
    