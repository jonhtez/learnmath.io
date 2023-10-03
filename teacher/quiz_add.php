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

    $id = $_GET["id"];

    // $sql = 'SELECT a.id, a.category, a.topic, a.week, a.date, b.question, b.answer, b.correction FROM lectures a, quiz b
    //  WHERE a.tutorial_author = b.tutorial_author';
    // $result = $conn->query($sql);

    $sql2 = "SELECT * FROM lectures WHERE id = '$id'";
    $result2 = $conn->query($sql2);
    $row2 = $result2->fetch_assoc();

    $sql = 'SELECT * FROM quiz WHERE lecture_id = id';
    $result = $conn->query($sql);


    while($row = $result->fetch_array()) { 
        $rows[] = $row; 
    }
?>

<script>

jQuery.noConflict()(function ($) { // this was missing for me
    $(document).ready(function (e) {
    $("#proform").on('submit',(function(e) {
        e.preventDefault();
        $.ajax({
                url: "../server/admin/sub_quiz.php",
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
        <h3 class="head-title2" style="color:#73a73c;">Quiz Upload</h3>

        <div class="row">
            <div class="col-md-6" style="text-align:left;">
                <p><a href="quiz.php?id=<?php echo $id;?>">Back</a></p>
            </div>
            <div class="col-md-6" style="text-align:right;">
               
            </div>
        </div>

        <div class="row" style="padding:40px 0; text-align:left;">
            <p><strong>Category: </strong> <?php echo $row2["category"];?></p>
            <p><strong>Topic: </strong> <?php echo $row2["topic"];?></p>
            <p><strong>Week: </strong> <?php echo $row2["week"];?></p>
            <br><br>
            
            <div style="width:600px; margin:auto; border-radius:8px; padding:20px; margin-top:70px;">

                <form id="proform" name="proform" method="post" enctype="multipart/form-data">
                    <input type="hidden" id="lecture_id" name="lecture_id" value="<?php echo $id;?>"/>

                    <div class="mb-3">
                        <label class="form-label">Question</label>
                        <input type="file" name="proimage" id="proimage" name="proimage"/>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Answer</label>
                        <textarea class="form-control" id="answer" name="answer"></textarea>
                    </div>
                    <!-- <div class="mb-3">
                        <label class="form-label">Correction</label>
                        <textarea class="form-control" id="correction" name="correction"></textarea>
                    </div> -->

                    <input type="submit" name="submit" id="submit" class="btn btn-block" style="width:100%; background:#ed4131; color:white;" value="upload"/>
                    
                </form>
    
            </div>

        </div>

    </div>

</div>
    
    