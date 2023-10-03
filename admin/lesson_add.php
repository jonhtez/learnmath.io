<?php
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

    //$id = $_GET["id"];
?>

<script>

    function subLesson(){
        var category = $("#category").val();
        var topic = $("#topic").val();
        var week = $("#week").val();
        var note = $("#note").val();
        //var lecture_id = $("#lecture_id").val();
        
        
        if (category == 'Select...'){
            $("#category").css('border', '1px solid #f1263e');
            alert('Select a valid category');
            $("#regBtn").css("opacity", "1");
            $("#regBtn").css("pointer-events", "auto");
        }
        else if (topic == ''){
            $("#topic").css('border', '1px solid #f1263e');
            alert('Topic is required');
            $("#regBtn").css("opacity", "1");
            $("#regBtn").css("pointer-events", "auto");
        }
        else if (week == 'Select...'){
            $("#week").css('border', '1px solid #f1263e');
            alert('Select a valid week');
            $("#regBtn").css("opacity", "1");
            $("#regBtn").css("pointer-events", "auto");
        }
        else if (note == ''){
            $("#note").css('border', '1px solid #f1263e');
            alert('Note is required');
            $("#regBtn").css("opacity", "1");
            $("#regBtn").css("pointer-events", "auto");
        }
        else {
            var url = "../server/admin/sub_lesson.php";
        $.ajax({
            type: "POST",
            url: url,
            data: {'category':category, 'topic':topic, 'week':week, 'note':note}, 
            dataType: 'JSON',
            beforeSend: function(){
                $("#regBtn").css("opacity", "0.4");
                $("#regBtn").css("pointer-events", "none");
                }, 
            success: function(response)
            {   
               
                if (response.status == 200){
                    alert("Registration successful");
                }
                else {
                    var msg = "Technical problem";
                    alert(msg);
                }

                $("#category").val('');
                $("#topic").val('');
                $("#week").val('');
                $("#note").val('');
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
        <h3 class="head-title2" style="color:#73a73c;">Add New Lesson</h3>

        <div class="row">
            <div class="col-md-6" style="text-align:left;">
                <p><a href="home.php">Back</a></p>
            </div>
            <div class="col-md-6" style="text-align:right;">
               
            </div>
        </div>

        <div class="row" style="padding:40px 0; text-align:left;">
            
            <div style="width:600px;  margin:auto; border-radius:8px; padding:20px; margin-top:70px;">

                <form>
                

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
                        <label class="form-label">Topic</label>
                        <input type="text" name="topic" class="form-control" id="topic">
                        
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Week</label>
                        <select class="form-select" id="week" name="week" aria-label="Default select example">
                            <option selected>Select...</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Note</label>
                        <textarea class="form-control" id="note" name="note"></textarea>
                    </div>

                    <a href="javascript://" onclick="subLesson()"><button type="button" id="regBtn" name="regBtn" class="btn btn-block" style="width:100%; background:#ed4131; color:white;" >Submit</button></a>
                </form>
    
            </div>

        </div>

    </div>

</div>
    
    