<?php
    session_start();
    error_reporting(0);

    $page = $_GET["page"];
    $cat = $_GET["cat"];
    $id = $_GET["id"];
    $attendance = "No";

    if(!isset($_SESSION["lm_token"])){
        $_SESSION["lm_lastpage"] = "classroom";
        $_SESSION["lm_lastclass"] = $cat;
        $_SESSION["lm_lastid"] = $id;

        if(headers_sent()){
	        echo "<script  type = 'text/javascript'> location.href = 'login.php'; </script>";
        }
        else{
	        header("Location:login.php");
	    } 
    }

    include("includes/connect.inc.php");

    $pid = $_SESSION["lm_id"];
    $item = 'week';


    $sql = "SELECT * FROM settings WHERE item = '$item'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $wk = $row["rate"];

    $sql = "SELECT * FROM activities WHERE week = '$wk' AND pupil_id = '$pid' AND status = 'Pass'";
    $result2 = $conn->query($sql);

    if ($result2->num_rows > 0) { 
        $attendance = 'Yes';
        echo '<script>alert("You\'ve passed the quiz for the week already so your result will not be recorded");</script>';
    }


    $sql2 = "SELECT * FROM lectures WHERE id = '$id'";
    $result2 = $conn->query($sql2);
    $row2 = $result2->fetch_assoc();
    $wk = $row2["week"];

    $sql = "SELECT * FROM quiz WHERE lecture_id = '$id'";
    $result = $conn->query($sql);

    while($row = $result->fetch_array()) { 
        $rowx[] = $row; 
    } 
    shuffle($rowx);

    //Top 10 of the lesson

    $sql3 = "SELECT * FROM activities WHERE category = '$cat' AND week = '$wk' ORDER BY result DESC, date ASC";
    $result3 = $conn->query($sql3);
    $counter = 0;

    while($row3 = $result3->fetch_array()) { 
       if($counter <= 10){
            $rows3[] = $row3; 
       }
    }


    $title = 'Welcome to Kiddies Quiz';
    require_once 'includes/header.php';

    require_once 'includes/navbar.php';
?>

<script>
    
    function submitQuiz(){
       
        var result = 0;
        var status = 'Fail';
        var attendance = $("#attendance").val();
        var lecture_id = $("#lecture_id").val();
        var pupil_id = $("#pupil_id").val();
        var wk = $("#wk").val();
        var cat = $("#cat").val();
        var date = $("#date").val();

        var counter = 0;

        while(counter < 5){
            counter += 1

            //Question 1
            var a1 = $("#ans"+counter).val();
            var answer1 = $("#answer"+counter).val();

            if(a1 == answer1){
                //console.log("Pass: "+counter);
                result += 1;
            }
            
        }

        if (result > 2){
            status = 'Pass';
        }

        if(attendance === 'Yes'){

            if (status == 'Fail'){
                alert("You failed the quiz, you can go back to the lesson and try the quiz again. You scored "+result)
            }
            else {
                alert("Congratulations! You passed the quiz and your scored "+result);
            }
        }
       else {
            var url = "server/sub_quiz_result.php";
            $.ajax({
                type: "POST",
                url: url,
                data: {'lecture_id':lecture_id, 'pupil_id':pupil_id, 'week':wk, 'category': cat, 'result':result, 'status':status, 'date':date}, 
                dataType: 'JSON',
                beforeSend: function(){
                    $("#regBtn").css("opacity", "0.4");
                    $("#regBtn").css("pointer-events", "none");
                    }, 
                success: function(response)
                {   
                    if (status == 'Fail'){
                        alert("You failed the quiz, you can go back to the lesson and try the quiz again. You scored "+result)
                    }
                    else {
                        alert("Congratulations! You passed the quiz and your scored "+result);
                    }
                    //header("Location:classroom.php?page=classroom&cat="+cat+"&id="+lecture_id);
                    window.location.replace("classroom.php?page=classroom&cat="+cat+"&id="+lecture_id);
                },
                complete: function(){
                    $("#regBtn").css("opacity", "1");
                    $("#regBtn").css("pointer-events", "auto");
                }
            });
       }
       
      
    };	

</script>
   

<div class="container" style="padding:0; background:#449329;">
        <div style="text-align:center; padding:50px 10px;">
            <h1 class="align-middle head-title" style="color:white;">Quiz Room </h1><br>
            <p style="color:white;"><strong>Topic:</strong> <?php echo $row2["topic"];?></p>
        </div>
    </div>

    <div class="container" style="padding:0; background:white;">
        <div class="row" style="">
            
            <div class="col-md-7">

                <form>
                <div id="question-panel" style="padding:20px;">
                    
                    <?php
                        $count = 0;
                        foreach(array_slice($rowx,0,5) as $row){
                            $count++;
                    ?> 
                    <h3>#<? echo $count;?></h3>
                    <div class="card" style="background:#ff3b00; color:white; margin-bottom:20px;">
                        <div class="card-body">
                            <!-- <img src="<? echo $row["question"];?>" style="width:100%;" alt="<? echo $row["question"];?>"/> -->
                            <img src="<?php echo $row["question"]; ?>" style="width:100%;" alt="<?php echo $row["question"]; ?>"/>


                            <div class="mb-3">
                                <label class="form-label">Answer</label>
                                <input type="hidden" id="<?php echo $count;?>" name="<?php echo $count;?>" value="<?php echo $row["id"];?>"/>
                                <input type="hidden" id="ans<?php echo $count;?>" name="ans<?php echo $count;?>" value="<?php echo $row["answer"];?>"/>
                                <input type="hidden" id="question<?php echo $count;?>" name="question<?php echo $count;?>" value="<?php echo $row["question"];?>"/>
                                <input type="hidden" id="correction<?php echo $count;?>" name="correction<?php echo $count;?>" value="<?php echo $row["correction"];?>"/>
                                <textarea class="form-control" id="answer<?php echo $count;?>" name="answer<?php echo $count;?>" placeholder="Write answer to #<?php echo $count;?>"></textarea>
                            </div>

                        </div>
                    </div>
                    <?php
                        }
                    ?>

                    <div class="card" style="margin-bottom:20px;">
                        <div class="card-body">
                            <input type="hidden" id="attendance" name="attendance" value="<?php echo $attendance;?>"/>
                            <input type="hidden" id="wk" name="wk" value="<?php echo $wk;?>"/>
                            <input type="hidden" id="cat" name="cat" value="<?php echo $cat;?>"/>
                            <input type="hidden" id="lecture_id" name="lecture_id" value="<?php echo $id;?>"/>
                            <input type="hidden" id="pupil_id" name="pupil_id" value="<?php echo $_SESSION["lm_id"];?>"/>
                            <input type="hidden" id="date" name="date" value="<?php echo date("d-M-Y");?>"/>
                            <p> Submit your answers </p>
                            <a href="javascript://" onclick="submitQuiz()"><button type="button" id="regBtn" name="regBtn" class="btn btn-block" style="width:100%; background:#7c6cc6; color:white;" >Submit</button></a>

                        </div>
                    </div>

                </div>
                </form>

            </div>
            <div class="col-md-5">
                <div style="width:100%; padding:20px; margin-top:70px;">
                    <div style="background:#f3a222; padding:20px;">

                        <h3 class="head-title2" style="color:white; text-align:center; padding-bottom:30px;">Lesson's Top 10</h3>

                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col"></th>
                                <th scope="col">Name</th>
                                <th scope="col">Result</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $counters = 0;
                                    foreach($rows3 as $row3){
                                        $pid = $row3["pupil_id"];
                                        $sqlx = "SELECT * FROM pupils WHERE id = '$pid'";
                                        $resultx = $conn->query($sqlx);
                                        $rowx= $resultx->fetch_assoc();

                                        $counters++;
                                ?>

                                    <tr>
                                        <td width="2%" valign="middle"><?php echo $counters;?></td>
                                        <td width="20%"><img src="../<?php echo $rowx["picture"];?>" style="width:50px;"/></td>
                                        <td width="60%" valign="middle"><?php echo $rowx["fullname"];?></td>
                                        <td width="18%" valign="middle"><?php echo $row3["result"];?></td>
                                    </tr>
                                <?php 
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>


        </div>
    </div>
   

<?php
    require_once 'includes/footer.php';
?>
   