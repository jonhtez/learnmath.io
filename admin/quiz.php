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


    $sql = "SELECT * FROM quiz WHERE lecture_id = '$id'";
    $result = $conn->query($sql);

    //$rows[] = array();

    while($row = $result->fetch_array()) { 
        $rows[] = $row; 
    }
?>

<script>

    function delQuiz(id){
        
        var url = "../server/admin/delete_quiz.php"; 
        var string = 'quiz_id='+id;
        $.ajax({
            type: "GET",
            url: url,
            data: string,
            cache: false,
            success: function(){
                alert("Deleted")
                $("#"+id).slideUp('slow', function() {$("#"+id).remove();});
            }
        });
    };	

</script>

 
 <div class="container c-ban2" style="margin-top:0px; background:white;">
        <div style="text-align:center; padding:30px 0;">
            <h3 class="head-title2" style="color:#73a73c;">Quiz</h3>

            <div class="row">
                <div class="col-md-6" style="text-align:left;">
                    <p><a href="lessons.php">Back</a></p>
                </div>
                <div class="col-md-6" style="text-align:right;">
                    <p><a href="quiz_add.php?id=<?php echo $id;?>">+Add</a></p>
                </div>
            </div>

            <div class="row" style="padding:40px 0; text-align:left;">
                <p><strong>Category: </strong> <?php echo $row2["category"];?></p>
                <p><strong>Topic: </strong> <?php echo $row2["topic"];?></p>
                <p><strong>Week: </strong> <?php echo $row2["week"];?></p>
                <br><br>
                
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col"></th>
                        <th scope="col">Question</th>
                        <th scope="col">Answer</th>
                        <th scope="col">Answer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 0;
                        foreach($rows as $row)
                            {
                                $count++;
                        ?>
                        <tr id="<?php echo $row['id'];?>">
                            <td><?php echo $count;?></td>
                            <td><?php echo $row["question"];?></td>
                            <td><?php echo $row["answer"];?></td>
                            <td><a href="javascript://" onclick="delQuiz(<?php echo $row['id'];?>)">Delete </a></td>
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
    
    