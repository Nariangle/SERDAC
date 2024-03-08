<?php include("../../../Includes/DB.php"); ?>  
<?php require_once("../../../Includes/Functions.php"); ?>
<?php require_once("../../../Includes/Sessions.php"); ?>
<?php 
$_SESSION["TrackingURL"] = $_SERVER["PHP_SELF"];
Confirm_Login() ?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
<?php include("header.php")?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <h4 class="card-title"> <h3 class="font-weight-bold">Welcome <?php echo $_SESSION["AdminName"]; ?></h4>
                    <p class="card-description">
                      <h6 class="font-weight-normal mb-0">All systems are running smoothly!</h6>
                    </p>
              </div>
                </div>
               </div>
            <div class="col-lg-12 grid-margin stretch-card">
          
              <div class="card">
                <div class="card-body">
                <?php 
                          echo ErrorMessage(); #call errormessage
                          echo SuccessMessage();
                      ?>
                  <h4 class="card-title">Manage Existing Posts</h4>
                  <span>
                  <p class="card-description">
                    Add, delete or edit <code> existing posts!</code>
                  </p>
                  
                  <a href="add_posts.php"style="color:black;"><div class="add-new-post" style="float:right;">
                    <button type="button" class="btn btn-warning"> Add New Posts</button>
                  </div></a>
                </span>
                  <div class="table-responsive">
               <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                       ID
                          </th>
                            <th>
                       Category
                          </th>
                          <th>
                           Date and Time
                          </th>
                          <th>
                           Author
                          </th>
                           
                          <th>
                            Image
                          </th>
                          <th>
                            Content
                          </th>
                          <th>
                            View Count
                          </th>
                          <th style="text-align: center;">
                            Action
                          </th>
                          <th style="text-align: center;">
                            Action
                          </th>
                             <th style="text-align: center;">
                            Live Preview
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
            $sql  = "SELECT * FROM post WHERE category IN ('Editorial', 'Feature') ORDER BY id desc";
            $stmt = $ConnectingDB->query($sql);
         $i = 0;
         while($DataRows = $stmt->fetch()) {
           $id     =   $DataRows["id"];
           $datetime =   $DataRows["datetime"];
           $title =      $DataRows["title"];
           $category =      $DataRows["category"];
           $author =   $DataRows["author"];
           $image     =   $DataRows["image"];
           $date     =   $DataRows["date"];
           $post       = $DataRows["post"];
           $view_count = $DataRows["view"];
           
           $i++
       ?>
               
                        <tr>
                          <td class="py-1">
                           <?php echo $i?>
                          </td>
                          <td>
                           <?php echo $category?>
                          </td>
                          <td>
                          <?php echo $datetime?>
                          </td>
                          <td>
                           <?php echo $author?>
                          </td>
                          <td>
                          <img src="../../../Uploads/<?php echo $image ?>" style="border:radius: 0px; image-rendering: optimizeQuality;">
                          </td>
                          <td>
                          <?php if (strlen($post)>10){$post = substr($post,0,10);}
                                                    echo $post. "..."   ?>
                          </td>
                      
                         
                           <td>
                           <?php echo $view_count?>
                          </td>
                         
                          <td style="text-align: center;">
                            <a href="edit_posts.php?id=<?php echo $id?>" style="color:white"><button type="button" class="btn btn-info"> Edit </button></a> 
                          </td>
                           <td style="text-align: center;">
                            <button type="button" class="btn btn-danger" onclick="deletepost(<?php echo $id; ?>)">Delete</button>
                          </td>
                          <td>
                            <button type="button" class="btn btn-primary"><a href="../../../FullPost.php?id=<?php echo $id; ?>" target="_blank"><span class="btn btn-primary">Preview Post</span></a></button>
                          </td>
                        </tr>
                       
                          <script>
                                  // Function to confirm the deletion of an admin
                                  // eto rin yung parang modal nag ask if anjan kapa ba, sure kana ba?
                                  function deletepost(id) {
                                  Swal.fire({
                                      title: 'Are you sure to delete this?',
                                      text: "Please confirm your action",
                                      icon: 'warning',
                                      showCancelButton: true,
                                      confirmButtonColor: '#d33',
                                      cancelButtonColor: '#3085d6',
                                      confirmButtonText: 'Proceed with deletion.'
                                  }).then((result) => {
                                      if (result.isConfirmed) {
                                          window.location.href = `delete_post.php?id=${id}`;
                                      }
                                  });
                              }

                                </script>
                      </tbody>
                      <?php } ?>
                    </table>
                  </div>
                </div>
              </div>
            </div>
       
        
           
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
       
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.js"></script>
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html>
