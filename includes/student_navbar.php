
<div class="container" style="padding:0;">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="../index.php" ><img src="../images/logo.png" class="logo" /></a>
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
        
       
      </ul>
      <ul class="navbar-nav mr-auto mb-2 mb-lg-0 align-items-center">
        <li class="nav-item desktop" style="margin-right:20px;">
            <div style="padding-top:20px;">
              <a href="home.php"><p><?php echo $_SESSION["lm_fullname"];?></a>
            </div>
        </li>
        <li class="nav-item desktop" style="margin-right:20px;">
            <a href="../logout.php"><button class="btn take-class-btn">Logout</button></a>
        </li>
      </ul>

      <!-- <span class="navbar-text">
        Navbar text with an inline element
      </span> -->
    </div>
  </div>
</nav>
    
</div>
