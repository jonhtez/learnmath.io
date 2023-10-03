<div class="container" style="padding:0;">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php" ><img src="images/logo.png" class="logo" /></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <!-- <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Learn Maths</a>
        </li> -->
      </ul>

      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
         <li class="nav-item mobile">
            <a href="class1.php"><button class="btn take-class-btn" style="background:#eb68ff; margin-right:20px;">Class 1</button></a>  
            <a href="class2.php"><button class="btn take-class-btn" style="background:#ff3b00; margin-right:20px;">Class 2</button></a>   
            <a href="class3.php"><button class="btn take-class-btn" style="background:#0098ff; margin-right:20px;">Class 3</button></a>
            <a href="class4.php"><button class="btn take-class-btn" style="background:#7c6cc6; margin-right:20px;">Class 4</button></a>  
            <a href="login.php"><button class="btn take-class-btn">Sign In</button></a> <a href="register.php"><button class="btn take-class-btn">Signup</button></a>
        </li>
        <li class="nav-item desktop">
            <a href="class1.php"><button class="btn take-class-btn" style="background:#eb68ff; margin-right:20px;">Class 1</button></a>
        </li>
        <li class="nav-item desktop">
            <a href="class2.php"><button class="btn take-class-btn" style="background:#ff3b00; margin-right:20px;">Class 2</button></a>
        </li>
        <li class="nav-item desktop">
            <a href="class3.php"><button class="btn take-class-btn" style="background:#0098ff; margin-right:20px;">Class 3</button></a>
        </li>
        <li class="nav-item desktop">
            <a href="class4.php"><button class="btn take-class-btn" style="background:#7c6cc6; margin-right:20px;">Class 4</button></a>
        </li>

    </ul>
   
    <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
        <?php 
            if (isset($_SESSION["lm_token"])){
        ?>

        <li class="nav-item desktop" style="margin-right:20px;">
            <div style="padding-top:20px;">
              <a href="student/home.php"><p><?php echo $_SESSION["lm_fullname"];?></a>
            </div>
        </li>

        <li class="nav-item desktop" style="margin-right:20px;">
            <a href="logout.php"><button class="btn take-class-btn">Logout</button></a>
        </li>

        <?php } else { ?>

            <li class="nav-item desktop" style="margin-right:20px;">
            <a href="login.php"><button class="btn take-class-btn">Sign In</button></a>
            </li>
            <li class="nav-item desktop">
                <a href="register.php"><button class="btn take-class-btn">Signup</button></a>
            </li>
        
        <?php } ?>
        
      </ul>

      <!-- <span class="navbar-text">
        Navbar text with an inline element
      </span> -->
    </div>
  </div>
</nav>
    <!-- <nav class="navbar navbar-light bg-light" style="margin-bottom:0px;">
        <div class="container">
            <a class="navbar-brand" href="#">
            <img src="/docs/5.1/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
            Learn Maths
            </a>

            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Active</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Class 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Class 2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled">Class 3</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled">Class 4</a>
                </li>

                <li class="nav-item">
                    <button type="submit" class="btn take-class-btn">Take the class</button>
                </li>

            </ul>


        </div>
    </nav> -->
</div>
