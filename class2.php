<?php
    error_reporting(0);
    session_start();
    include("includes/connect.inc.php");

    $cat = "Class 2";

    $sql = "SELECT * FROM lectures WHERE category = '$cat'";
    $result = $conn->query($sql);

    //$rows[] = array();

    while($row = $result->fetch_array()) { 
        $rows[] = $row; 
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
    <div class="container" style="padding:0; background:#ff3b00;">
        <div class="row" style="align-items: center;">
            <div class="col-md-6">
                <div style="padding:30px; text-align:center;">
                    <h1 class="align-middle head-title" style="color:white;">Class Two</h1>
                    <p style="color:white;">This is the category for the pupils in the year 3-5 in school and the curriculum has been designed with their general school lesson note </p>
                   
                </div>
            </div>
            <div class="col-md-6 desktop">
                <img src="images/ban1.png" width="100%" style="padding:20px 20px 0 20px;"/>
            </div>
        </div>
    </div>

    <div class="container" style="padding:0; background:white;">
        <div class="row" style="align-items: center;">
            <div class="col-md-5">
                <div style="padding:30px; text-align:center;">
                    <img src="images/bookpile.png" width="100%" style="padding:20px 20px 0 20px;"/>
                </div>
            </div>
            <div class="col-md-7">
                <div style="padding:20px;">
                    <h3 class="align-middle head-title2" style="">Class Curriculum</h3>
            
                    <p style="">The lessons have been divided into weeks and every pupil will have to take the class week by week. Pupils will have to read and study the 
                        lessons for the week as many times as they want until they are satisfied and ready to take the quiz for the lesson. However, every student is expected to take the test before the end of the week <br><br>

                        The best student for the week in each class will have their pictures and profile displayed on our website's hall of fame column and also feature in many academic magazines with some other prizes to be won
                    <br><br>
                
                  <!-- <button type="submit" class="btn take-class-btn" style="background:#ff3b00;">Enter Class for the week</button> -->
                  <div class="row">
                    <?php
                        foreach($rows as $row)
                            {
                    ?>

                        <div class="col-md-3">
                            <strong>Week <?php echo $row["week"];?>: </strong>
                        </div>
                        <div class="col-md-9">
                            <p><a href="classroom.php?cat=Class 2&id=<?php echo $row["id"];?>"><?php echo $row["topic"];?></p></a>
                        </div>

                    <?php } ?>

                    </div>
                
                </p>
                    
                </div>
            </div>
        </div>
    </div>

   

<?php
    require_once 'includes/footer.php';
?>
   