<?php
error_reporting(0);
session_start();

if (!isset($_SESSION["lm_admin_token"])) {

    if (headers_sent()) {
        echo "<script  type='text/javascript'> location.href = 'login.php'; </script>";
    } else {
        header("Location:login.php");
    }
}

$title = 'Admin Area';
require_once '../includes/header.php';
require_once '../includes/admin_navbar.php';

include("../includes/connect.inc.php");

$sql = "SELECT * FROM pupils";
$result = $conn->query($sql);

while ($row = $result->fetch_array()) {
    $rows[] = $row;
}
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    function delPupil(id) {

        var url = "../server/admin/delete_pupil.php";
        var string = 'pupil_id=' + id;
        $.ajax({
            type: "GET",
            url: url,
            data: string,
            cache: false,
            success: function () {
                alert("Deleted");
                $("#" + id).slideUp('slow', function () {
                    $("#" + id).remove();
                });
            }
        });
    };
</script>

<div class="container c-ban2" style="margin-top:0px; background:white;">
    <div style="text-align:center; padding:30px 0;">
        <h3 class="head-title2" style="color:#73a73c;">PUPILS</h3>

        <div class="row">
            <div class="col-md-6" style="text-align:left;">
                <p><a href="home.php">Back</a></p>
            </div>
            <div class="col-md-6" style="text-align:right">

            </div>
        </div>

        <div class="row" style="padding:40px 0;">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Fullname</th>
                        <th scope="col">Email</th>
                        <th scope="col">Category</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($rows as $row) {
                    ?>

                        <tr id="<?php echo $row['id']; ?>">
                            <th scope="row"><img src="../../<?php echo $row["picture"]; ?>" style="width:50px;" /></th>
                            <td valign="middle"><?php echo $row["fullname"]; ?></td>
                            <td valign="middle"><?php echo $row["email"]; ?></td>
                            <td valign="middle"><?php echo $row["category"]; ?></td>
                            <td><a href="javascript:void(0);" onclick="delPupil(<?php echo $row['id'];?>)">Delete </a></td>
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
