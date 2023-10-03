<?php
error_reporting(0);
session_start();
include("includes/connect.inc.php");

$item = "week";
$wk = 0;

$sql = "SELECT * FROM settings WHERE item = '$item'";
$result = $conn->query($sql);

if ($result->num_rows > 0) { 
    $row = $result->fetch_assoc();

    $wk = (int)$row["rate"];
    
    $sql = "SELECT * FROM activities WHERE week = '$wk' ORDER BY result DESC, date ASC";
    $result = $conn->query($sql);

    while($rowx = $result->fetch_array()) { 
        $rows[] = $rowx; 
    }
}

$title = 'Welcome to Kiddies Quiz';
require_once 'includes/header.php';

require_once 'includes/navbar.php';

?>

<div class="container c-ban1" style="padding: 0;">
    <div class="row" style="align-items: center;">
        <div class="col-md-6">
            <div style="padding: 30px; text-align: center;">
                <h1 class="align-middle head-title" style="color: white;">Learn Mathematics</h1>
                <p style="color: white;">This is the session that will test the pupils' counting skills. There are different exercises and questions for the students.</p>
                <!-- Add a link to the section with the class category -->
                <a href="#category" class="btn take-class-btn">Take the class</a>
            </div>
        </div>
        <div class="col-md-6">
            <img src="images/ban1.png" width="100%" style="padding: 20px 20px 0 20px;" />
        </div>
    </div>
</div>

<div class="container c-ban2" style="padding: 0;">
    <div class="row" style="align-items: center;">
        <div class="col-md-5">
            <div style="padding: 30px; text-align: center;">
                <img src="images/bookpile.png" width="100%" style="padding: 20px 20px 0 20px;" />
            </div>
        </div>
        <div class="col-md-7">
            <div style="padding: 20px;">
                <h3 class="align-middle head-title2" style="color: white;">How we help the kids</h3>
                <p style="color: white;">Learn Mathematics is helping the pupils learn and develop their interest in mathematics; introducing mathematics in a different way that is much more fun and interactive will change the pupils' perspective towards mathematics as a subject and hence improve their grades in school.<br><br>
                    <span class="tips" style="background: #806ec8;">1</span> We have categories for different classes<br><br>
                    <span class="tips" style="background: #f5a427;">2</span> We have quality learning materials on many topics for all class categories<br><br>
                    <span class="tips" style="background: #11a5ec;">3</span> Test and quiz for all topics covered with correction and tips to assist <br><br>
                    <span class="tips" style="background: #ed3e34;">4</span> There is a rating system to celebrate outstanding performance and participation<br><br>
                </p>
            </div>
        </div>
    </div>
</div>

<section id="category" class="category">
    <div class="container c-black" style="margin-top: 0px;">
        <div style="text-align: center; padding: 30px 0;">
            <h3 class="head-title2" style="color: white;">Our Classes category</h3>

            <div class="row" style="padding: 40px 0;">

                <div class="col-md-3">
                    <div class="card" style="background: #eb68ff; color: white; margin-bottom: 20px;">
                        <div class="card-body">
                            <h5 class="card-title cat-title">Class 1</h5>
                            <p class="card-text">This is the class suitable for classX to classY with a relevant curriculum. Subscribe to the class now</p>
                            <a href="class1.php" class="btn" style="color: #eb68ff; background: white;">Enter class</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card" style="background: #ff3b00; color: white; margin-bottom: 20px;">
                        <div class="card-body">
                            <h5 class="card-title cat-title">Class 2</h5>
                            <p class="card-text">This is the class suitable for classX to classY with a relevant curriculum. Subscribe to the class now</p>
                            <a href="class2.php" class="btn" style="color: #ff3b00; background: white;">Enter class</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card" style="background: #0098ff; color: white; margin-bottom: 20px;">
                        <div class="card-body">
                            <h5 class="card-title cat-title">Class 3</h5>
                            <p class="card-text">This is the class suitable for classX to classY with a relevant curriculum. Subscribe to the class now</p>
                            <a href="class3.php" class="btn" style="color: #0098ff; background: white;">Enter class</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card" style="background: #7c6cc6; color: white; margin-bottom: 20px;">
                        <div class="card-body">
                            <h5 class="card-title cat-title">Class 4</h5>
                            <p class="card-text">This is the class suitable for classX to classY with a relevant curriculum. Subscribe to the class now</p>
                            <a href="class4.php" class="btn" style="color: #7c6cc6; background: white;">Enter class</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

<div class="container c-ban2" style="margin-top: 0px;">
    <div style="text-align: center; padding: 30px 0;">
        <h3 class="head-title2" style="color: white;">Best Students of the month</h3>

        <div class="row" style="padding: 40px 0;">
            <?php
            foreach ($rows as $row) {
                $pid = $row["pupil_id"];
                $sqlx = "SELECT * FROM pupils WHERE id = '$pid'";
                $resultx = $conn->query($sqlx);
                $rowx = $resultx->fetch_assoc();
            ?>
                <div class="col-md-3">
                    <div class="card" style="margin-bottom: 20px;">
                        <div class="card-body">
                            <img src="<?php echo $rowx["picture"]; ?>" style="width: 80px; border-radius: 400px; margin: auto; padding-bottom: 20px;" />
                            <h5 class="card-title"><?php echo $rowx["fullname"]; ?></h5>
                            <p class="card-text">
                                <strong>Class</strong> - <?php echo $row["category"]; ?><br>
                                <strong>Week</strong> - <?php echo $row["week"]; ?><br>
                                <strong>Score</strong> - <?php echo $row["result"]; ?> Points<br>
                            </p>
                            <!-- <a href="#" class="btn" style="background:#ff3b00; color:white;">View Profile</a> -->
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>

        </div>

    </div>
</div>

<?php
require_once 'includes/footer.php';
?>
