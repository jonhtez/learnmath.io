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

   
    $sql = "SELECT * FROM settings";
    $result = $conn->query($sql);

    //$rows[] = array();

    while($row = $result->fetch_array()) { 
        $rows[] = $row; 
    }
?>

<script>

    function delSettings(id){
        
        var url = "../server/admin/delete_settings.php"; 
        var string = 'settings_id='+id;
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
            <h3 class="head-title2" style="color:#73a73c;">Settings</h3>

            <div class="row">
                <div class="col-md-6" style="text-align:left;">
                    <p><a href="home.php">Back</a></p>
                </div>
                <div class="col-md-6" style="text-align:right;">
                    <p><a href="settings_add.php">+Add</a></p>
                </div>
            </div>

            <div class="row" style="padding:40px 0; text-align:left;">
               
                
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Keys</th>
                        <th scope="col">Values</th>
                        <th scope="col"></th>
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
                            <td><?php echo $row["item"];?></td>
                            <td><?php echo $row["rate"];?></td>
                            <td><a href="javascript://" onclick="delSettings(<?php echo $row['id'];?>)">Delete </a></td>
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
    
    