<?php
    error_reporting(0);
    session_start();

    if(!isset($_SESSION["lm_token"])){

        if(headers_sent()){
	        echo "<script  type = 'text/javascript'> location.href = 'login.php'; </script>";
        }
        else{
	        header("Location:login.php");
	    } 
    }

    $title = 'Admin Area';
    require_once '../includes/header.php';

    require_once '../includes/student_navbar.php';

    include("../includes/connect.inc.php");

    $pid = $_SESSION["lm_id"];

    $sql = "SELECT * FROM activities WHERE pupil_id = '$pid'";
    $result = $conn->query($sql);


    while($row = $result->fetch_array()) { 
        $rows[] = $row; 
    }
?>

 
 <div class="container c-ban2" style="margin-top:0px; background:white;">
        <div style="text-align:center; padding:30px 0;">
            <h3 class="head-title2" style="color:#73a73c;">Results</h3>

            <div class="row">
                <div class="col-md-6" style="text-align:left;">
                    <p><a href="home.php">Back</a></p>
                </div>
                <div class="col-md-6" style="text-align:right;">
                
                </div>
            </div>


            <div class="row" style="padding:40px 0;">
            
            <table class="table">
            <thead>
                <tr>
                <th scope="col">Lesson Id</th>
                <th scope="col">Week</th>
                <th scope="col">Result</th>
                <th scope="col">Status</th>
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
                    <td><?php echo $row["lecture_id"];?></td>
                    <td><?php echo $row["week"];?></td>
                    <td><?php echo $row["result"];?></td>
                    <td><?php echo $row["status"];?></td>
                    <td><?php echo $row["date"];?></td>
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
    
    