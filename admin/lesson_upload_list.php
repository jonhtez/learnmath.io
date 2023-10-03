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

    $sql = "SELECT * FROM lecture_upload WHERE lecture_id = '$id'";
    $result = $conn->query($sql);


    while($row = $result->fetch_array()) { 
        $rows[] = $row; 
    }
?>

<script>

    function delLessonUpload(id, upload){
        
        var url = "../server/admin/delete_lesson_upload.php"; 
        var string = 'lesson_upload_id='+id;
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
            <h3 class="head-title2" style="color:#73a73c;">Lesson Uploads</h3>

            <div class="row">
                <div class="col-md-6" style="text-align:left;">
                    <p><a href="lessons.php">Back</a></p>
                </div>
                <div class="col-md-6" style="text-align:right;">
                <p><a href="lesson_upload_add.php?id=<?php echo "$id";?>">+Add</a></p>
                </div>
            </div>


            <div class="row" style="padding:40px 0;">
            
            <table class="table">
            <thead>
                <tr>
                <th scope="col">Name</th>
                <th scope="col">Date</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($rows as $row)
                	{
                ?>

                <tr id="<?php echo $row['id'];?>">
                    <td><?php echo $row["name"];?></td>
                    <td><?php echo $row["date"];?></td>
                    <td><a href="javascript://" onclick="delLessonUpload(<?php echo $row['id'];?>, '<?php echo $row['upload'];?>')">Delete </a></td>
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
    
    