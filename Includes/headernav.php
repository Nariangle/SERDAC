
      <nav id="navbar" class="navbar" >
        
      <div  style="display: flex; align-items: center; justify-content: center;" class="container d-flex justify-content-between align-items-center;">
        <ul>
          <li><a class="<?php if(strpos($_SERVER['REQUEST_URI'], 'dashboard.php') !== false) echo 'active'; ?>" href="dashboard.php">Home</a></li>
          <div class="dropdown">
            <a class="btn dropdown-toggle" <?php if(strpos($_SERVER['REQUEST_URI'], 'articles.php') !== false) echo "style='color:#a2cce3'"; ?> id="btn" href="#news" role="button">News</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="articles.php">Articles</a></li>
            </ul>
          </div>
          <div class="dropdown">
          <a class="btn dropdown-toggle" id="btn" href="dashboard.php#services" role="button"  
          <?php if(strpos($_SERVER['REQUEST_URI'], 'data_analytics.php') !== false || strpos($_SERVER['REQUEST_URI'], 'galleries.php') !== false || strpos($_SERVER['REQUEST_URI'], 'data_bank.php') !== false)    
          echo "style='color:#a2cce3'"; ?>>Services</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item <?php if(strpos($_SERVER['REQUEST_URI'], 'data_analytics.php') !== false) echo 'active'; ?>" href="data_analytics.php">Data Analytics</a></li>
            <li><a class="dropdown-item <?php if(strpos($_SERVER['REQUEST_URI'], 'trainings.php') !== false) echo 'active'; ?>" href="trainings.php">Capability Trainings</a></li>
            <li><a class="dropdown-item <?php if(strpos($_SERVER['REQUEST_URI'], 'data_bank.php') !== false) echo 'active'; ?>" href="data_bank.php">Data Bank</a></li>
          </ul>
        </div>
        <!-- <div class="dropdown">
          <a class="btn dropdown-toggle" id="btn" href="#news" role="button">Features</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Categories</a></li>
        </div> -->
        <!-- <div class="dropdown">
          <a class="btn dropdown-toggle <?php if(strpos($_SERVER['REQUEST_URI'], 'dataset.php') !== false) echo 'active'; ?>" id="btn" href="dataset.php" role="button">Datasets</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Resource Fund</a></li>
            <li><a class="dropdown-item" href="#">Fund Projects</a></li>
          </ul>
        </div>
        <li><a class="<?php if(strpos($_SERVER['REQUEST_URI'], 'Galleries.php') !== false) echo 'active'; ?>" href="Galleries.php">Gallery</a></li> -->
        <div class="dropdown">
          <a class="btn dropdown-toggle" id="btn" href="about_us.php" role="button"<?php if(strpos($_SERVER['REQUEST_URI'], 'about_us.php') !== false 
          || strpos($_SERVER['REQUEST_URI'], 'about_us.php') !== false )    
          echo "style='color:#a2cce3'"; ?> >About-us</a>
          <ul class="dropdown-menu">
          <li><a class="dropdown-item <?php if(strpos($_SERVER['REQUEST_URI'], 'about_us.php#visionmission') !== false) echo 'active'; ?>" href="about_us.php">Vision and Mission</a></li>
            <li><a class="dropdown-item <?php if(strpos($_SERVER['REQUEST_URI'], 'about_us.php#team') !== false) echo 'active'; ?>" href="about_us.php#team">Team</a></li>
          </ul>
        </div>
        <div class="dropdown">
          <a class="btn dropdown-toggle" id="btn" href="#news" role="button">Contact</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="signup.php">Register Form</a></li>
            <li><a class="dropdown-item" href="dashboard.php#contact">Messages</a></li>
            <li><a class="dropdown-item" href="dashboard.php#contact">Location</a></li>
          </ul>

        </div>

          <?php if(!isset($_SESSION["user_id"])) { 
          

            echo"<li class='nav-item'>
              <a class='nav-link' href='login.php'>Login</a>
            </li>";
            }else {

            echo"<div class='dropdown'>
             <a class='btn dropdown-toggle' id='btn' href='#news' role='button'>Profile</a>
             <ul class='dropdown-menu'>
               <li><a class='dropdown-item' href='appointments.php'>Appointments</a></li>
               <li><a class='dropdown-item' href='data_bank.php'>Datasets</a></li>
               <li><a class='dropdown-item' href='user_logout.php'>Logout</a></li>
             </ul>
   
           </div>";
            } ?>
          
           
  
        
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
  </header>