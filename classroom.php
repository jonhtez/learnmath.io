<?php
    session_start();
    error_reporting(0);

    $cat = $_GET["cat"];
    $id = $_GET["id"];

    include("includes/connect.inc.php");

    $sql2 = "SELECT * FROM lectures WHERE id = '$id'";
    $result2 = $conn->query($sql2);
    $row2 = $result2->fetch_assoc();
    $wk = $row2["week"];

    $sql = "SELECT * FROM lecture_upload WHERE lecture_id = '$id'";
    $result = $conn->query($sql);

    while($row = $result->fetch_array()) { 
        $rows[] = $row; 
    } 

    //Top 10 of the lesson

    $sql3 = "SELECT * FROM activities WHERE category = '$cat' AND week = '$wk' ORDER BY result DESC, date ASC";
    $result3 = $conn->query($sql3);
    $count = 0;

    while($row3 = $result3->fetch_array()) { 
       if($count <= 10){
        $rows3[] = $row3; 
       }
    }


    $title = 'Welcome to Kiddies Quiz';
    require_once 'includes/header.php';

    require_once 'includes/navbar.php';
?>

   
    <!-- <div class="container" style="padding:0;"> 
        <div class="banner-pack">
            <div class="banner-title">
                <h1>Learn Mathematics</h1>
                <p>We help kids develop there skills in mathematics and prepare them for examinations</p>
            </div>
        </div>
    </div> -->
    <div class="container" style="padding:0; background:#449329;">
        <div style="text-align:center; padding:50px 10px;">
            <h1 class="align-middle head-title" style="color:white;">Classroom - <?php echo $cat;?></h1><br>
            <p style="color:white;"> <?php echo $row2["note"];?></p>
        </div>
    </div>

    <div class="container" style="padding:0; background:white;">
        <div class="row" style="">
            
            <div class="col-md-7">
                <div style="padding:20px;">
                                 
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
                        <div class="carousel-inner">

                            <?php
                                $count = 0;
                                foreach($rows as $row)
                                {
                                    $count++;
                                    if($count == 1){
                            ?>
                                <div class="carousel-item active">
                                    <img src="<?php echo $row["upload"];?>" class="d-block w-100" alt="<?php echo $row["name"];?>.">
                                </div>
                                <?php } else {?>    
                                
                                <div class="carousel-item">
                                    <img src="<?php echo $row["upload"];?>" class="d-block w-100" alt="<?php echo $row["name"];?>.">
                                </div>
                                <?php }?>  
                            <?php
                                }
                            ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div> 
                </div>   
                    
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
                        
                        <div class="row" style="margin-top:30px;">
                             <a href="quiz_room.php?page=classroom&id=<?php echo $id;?>&cat=<?php echo $cat;?>"><button type="button" class="btn btn-block" style="width:100%; background:#ed4131; color:white;" >I'm Ready for the quiz</button></a>
                        </div>

                    </div>
                    
                </div>
            </div>


        </div>
    </div>

   

<?php
    require_once 'includes/footer.php';
?>
   