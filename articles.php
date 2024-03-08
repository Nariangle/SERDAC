<?php require_once("Includes/DB.php"); ?> <!--Require DB.php one time -->
<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>
<?php $msg=""?>

<!DOCTYPE html>
<html lang="en">

<?php include("Includes/user_header_nav.php"); ?>   
<body>
  <!-- Main -->

      <!-- Query for showing content -->
    <div class="container" style="margin-top: 100px;">
      <div class="row mt-4">
        <div class="col-sm-8">
          <h1>Articles</h1>
          <?php ?>
          <?php
              global $ConnectingDB;
              //SQL query when search button is active
              if (!isset($_GET["SearchButton"])  and  (!isset($_GET["page"])) 
              and (!isset($_GET["author"])) and (!isset($_GET['category']))
              and (!isset($_GET["sortAsc"])) and (!isset($_GET["sortDesc"])))  {
                echo"<h1 class='lead'> This page will only show all posts. </h1>";
              }
              if(isset($_GET["SearchButton"])) {
                $Search = $_GET["Search"];
                $sql = "SELECT * FROM post WHERE (datetime LIKE :search OR title LIKE :search) AND (category = 'Feature' OR category = 'Editorial')";
                
                // Prepare the SQL statement
                $stmt = $ConnectingDB->prepare($sql);

                // Bind the search term to the :search parameter
                $stmt->bindValue(':search', '%' .$Search. '%');

                //execute query
                $stmt->execute();
                echo"<h1 class='lead'> This page will only display posts containing the word: $Search </h1>";
              } 
          
                //Query when pagination is active
              elseif (isset($_GET["page"])) {
                $Page = (int) $_GET["page"]; //cast to int
                if ($Page==0||$Page<1) {
                  $ShowPostFrom=0;
                } else{
                  $ShowPostFrom=($Page*4)-4;
                }
                $sql  = "SELECT * FROM post WHERE category IN ('Editorial', 'Feature') ORDER BY id desc LIMIT $ShowPostFrom,4";

                $stmt = $ConnectingDB->query($sql);
                echo "Page: " . $Page;

              } else {
                // Default sql query
                $sql = "SELECT * FROM post WHERE category IN ('Editorial', 'Feature') ORDER BY id DESC LIMIT 4"; //fetch post in descending order from latest post
                $stmt = $ConnectingDB->query($sql);
              }
              if(isset($_GET["author"]))
              {
                $author = $_GET["author"];
                $sql = "SELECT * FROM post WHERE author = '$author' ";
                $stmt = $ConnectingDB->query($sql);
                $stmt->bindValue(':author', $author);
                $stmt->execute();
                echo"<h1 class='lead'> This page will only show posts under made by $author </h1>";
              }
              if (isset($_GET["category"])) {
                    $categories = array("Editorial", "Trainings", "Feature");
                    $sql = "SELECT * FROM post WHERE category IN (:categories)";
                    $stmt = $ConnectingDB->prepare($sql);
                    $stmt->bindValue(':categories', implode(",", $categories));
                    $stmt->execute();
                    // Rest of your code...
                }
              if(isset($_GET["sortAsc"])) {
                $date = $_GET["sortAsc"];
                $sql = "SELECT * FROM post WHERE category IN ('Editorial', 'Feature') ORDER BY datetime $date";
                $stmt = $ConnectingDB->query($sql);
                $stmt->execute();
                echo"<h1 class='lead'> This page will only show posts sorted in an ascending order </h1>";
              }
              if(isset($_GET["sortDesc"])) {
                $date = $_GET["sortDesc"];
                $sql = "SELECT * FROM post WHERE category IN ('Editorial', 'Feature') ORDER BY datetime $date";
                $stmt = $ConnectingDB->query($sql);
                $stmt->execute();
                echo"<h1 class='lead'> This page will only show posts sorted in an descending order </h1>";
              }
             
                while ($DataRows = $stmt->fetch()) {
                  $PostId             = $DataRows["id"];
                  $DateTime           = $DataRows["datetime"];
                  $PostTitle          = $DataRows["title"];
                  $Category           = $DataRows["category"];
                  $Admin              = $DataRows["author"];
                  $Image              = $DataRows["image"];
                  $PostDescription    = $DataRows["post"];
                  $views              = $DataRows["view"];
            ?>
         
          <?php echo ErrorMessage(); ?>
                      <style>
              /* for android to siya */
              @media (max-width: 768px) {
                .card {
                  flex-direction: column;
                  align-items: center;
                  text-align: center;
                }
                .card .col-md-4 {
                  width: 100%;
                }
              }
            
              .card-img {
                width: 100%;
                height: auto;
                object-fit: cover;
              }
            
              .card-title {
                font-size: 24px;
                margin-bottom: 10px;
              }
            
              .text-muted {
                font-size: 14px;
                margin-bottom: 5px;
              }
            
              .badge {
                font-size: 14px;
                margin-bottom: 10px;
              }
            
              .card-text {
                margin-bottom: 15px;
              }
            
              .btn {
                font-size: 14px;
              }
            </style>
                <div class="card mt-5">
              <div class="row no-gutters">
                <div class="col-md-4">
                  <img src="Uploads/<?php echo htmlentities($Image) ?>" class="img-fluid" alt="">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h4 class="card-title"><?php echo htmlentities($PostTitle) ?></h4>
                    <small class="text-muted">Posted By: <?php echo htmlentities($Admin) ?> On <?php echo htmlentities($DateTime) ?></small>
                    <span class="badge badge-dark text-dark float-right">Views: <?php echo $views?></span>
                    <hr>
                    <p class="card-text">
                      <?php 
                        if (strlen($PostDescription) > 150) {
                          $PostDescription = substr($PostDescription, 0, 150) . ". . .";
                        }
                        echo htmlentities($PostDescription);
                      ?>
                    </p>
                    <a href="FullPost.php?id=<?php echo $PostId; ?>" class="btn btn-info float-right">Read More</a>
                  </div>
                </div>
              </div>
            </div>

          <?php  }  ?>

 
        <nav>
          <ul class="pagination pagination-md">

          <!-- Create Backward button in pagination -->
          <?php if (isset($Page)){ 
            if ($Page>1) { ?>

          <li class="page-item">
            <a href="articles.php?page=<?php echo $Page-1; ?>" class="page-link">&laquo;</a>
          </li>
          
          <?php 
              } 
            } 
          ?>


              <!-- Create Pagination -->
            <?php
            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

            global $ConnectingDB;
            $sql = "SELECT COUNT(*) FROM post";
            $stmt=$ConnectingDB->query($sql);
            $RowPagination = $stmt->fetch();
            $TotalPosts = array_shift($RowPagination);

            $PostPage = $TotalPosts/4;
            $PostPage = ceil($PostPage);
            for ($i=1; $i <=$PostPage; $i++) {
              $activeClass = '';
              if($currentPage == $i){
                $activeClass = 'active';
              } 

            ?>
          <li class="page-item <?php echo $activeClass ?>">
            <a href="articles.php?page=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a>
          </li>
          <?php } ?>


          <!-- Create forward button in pagination -->
          <?php if (isset($Page)&&!empty($Page)){ 
            if ($Page+1<=$PostPage) { ?>

          <li class="page-item">
            <a href="articles.php?page=<?php echo $Page+1; ?>" class="page-link">&raquo;</a>
          </li>
          
          <?php 
              } 
            } 
          ?>
          </ul>
        </nav>

        </div>

        <!-- SIDEBAR -->
   
        <div class="col-sm-4" style="background-color:#F7E7CE; border-radius: 7px; border: 1px solid rgb(189, 187, 187);">
          <form class="form-inline d-none d-sm-block" action="articles.php">
              <div class="row d-flex align-items-center justify-content-center">
                <h5 style="margin-top: 20px; text-align:center;"><i class="bi bi-search Search"> Search</i> </h5>
                  <div class="col-sm-8">
                    <div class="searchbar-container">
                      <span> <input class="form-control mt-3" type="text" name="Search" placeholder="Search Article">
                    </div>
                  </div>
                  <div class="col-sm-1">
                    <div class="searchbar-container" style="margin-top:16px;"> 
                    <button class="btn btn-primary" class="search-bar" name="SearchButton"> <i class="bi bi-search"></i> </button> </span><br>
                  </div>
              </div>
              </form>
        <hr> 
          <br>
              <div class="date">
              <h5  style="text-align:center"> <i class='bx bx-calendar' ></i> Date </h5>
            </div>
              <div class="col-sm-5">
              <?php echo
                  "<p> <i class='bx bxs-sort-alt'></i> <a href='articles.php?sortAsc=ASC'> Ascending<i class='bx bx-up-arrow-alt' ></i> </p> </a>"
              ?>  
            </div>
              <div class="col-sm-5">
                <?php
                  echo
                  "<p> <i class='bx bxs-sort-alt'></i> <a href='articles.php?sortDesc=DESC'>Descending<i class='bx bx-down-arrow-alt' ></i> </p> </a>"
                  ?>
                  </div>
        </div>
      </div>
    </div>
      </div>
    </div>
 
  <!-- FOOTER -->
  <?php include("Includes/footer.php"); ?>
  
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/js/main.js"></script>
</html>

<style>

    .searchbar-container, .search-bar{
        display: block;
    }

 
    



</style>