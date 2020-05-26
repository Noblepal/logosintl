<?php

include("./includes/functions.php")

?>

<!DOCTYPE html>
<html lang="en">
<?php include("./includes/head.php"); ?>

<body class="sb-nav-fixed">
  <?php include("./includes/navbar.php") ?>
  <div id="layoutSidenav">
    <?php include("./includes/sidebar.php"); ?>
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid">
          <?php include('more-actions.php'); ?>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">View Courses</li>
          </ol>
          <?php if (isset($_GET['success'])) {
            $s = $_GET['success'];
            if ($s == 0) {
          ?>
              <div class="alert alert-danger mt-3" role="alert">
                <?php echo $_GET['message']; ?>
              </div>
            <?php
            } else if ($s == 1) {
            ?>
              <div class="alert alert-success mt-3" role="alert">
                <?php echo $_GET['message']; ?>
              </div>
          <?php
            }
          } ?>
          <div class="card mb-4">
            <div class="card-header text-success"><i class="fas fa-info-circle text-success mr-1"></i>All Courses</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th scope="col">No.</th>
                      <th scope="col">Title</th>
                      <th scope="col">Teacher</th>
                      <th scope="col">Duration</th>
                      <th scope="col">Topics</th>
                      <th scope="col">Featured</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    getCoursesForTableData();
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
      </main>
      <?php include("./includes/footer.php"); ?>
    </div>
  </div>
  <?php include("./includes/scripts.php"); ?>
</body>

</html>