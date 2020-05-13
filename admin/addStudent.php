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
                          <li class="breadcrumb-item active">Add Student</li>
                      </ol>
                      <?php if (isset($_GET['success'])) {
                        $s = $_GET['success'];
                        if ($s == 0) {
                          ?>
                          <div class="alert alert-danger mt-3" role="alert">
                            <?php echo $_GET['message'];?>
                          </div>
                          <?php
                        } else if ($s == 1) {
                          ?>
                          <div class="alert alert-success mt-3" role="alert">
                            <?php echo $_GET['message'];?>
                          </div>
                          <?php
                        }
                      } ?>
                      <h3 class="mt-3 text-danger">Add Student is currently unavailable</h3>
                    </div>
                </main>
                <?php include("./includes/footer.php"); ?>
            </div>
        </div>
        <script>
             CKEDITOR.replace( 'topic_content' );
         </script>

        <?php include("./includes/scripts.php"); ?>
    </body>
</html>
