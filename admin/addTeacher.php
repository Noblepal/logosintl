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
                          <li class="breadcrumb-item active">Add Teacher</li>
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
                      <h3 class="mt-3">Add Teacher</h3>

                      <form class="" action="" method="post">
                        <div class="row">
                          <div class="form-group col-md-6">
                            <label>Name of teacher</label>
                            <input type="text" name="teacher_name" class="form-control" placeholder="Teacher's name" required>
                          </div>
                          <div class="form-group col-md-6">
                            <label>Phone</label>
                            <input type="tel" id="phone" name="teacher_phone" class="form-control" placeholder="Example 254700123456" pattern="[0-9]{3}[0-9]{3}[0-9]{6}" required>
                        </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6">
                            <label>Age</label>
                            <input type="number" name="teacher_age" class="form-control" placeholder="Enter age" required>
                          </div>

                          <div class="form-group col-md-6">
                            <label>Email</label>
                            <input type="email" name="teacher_email"  class="form-control" placeholder="Enter email address" required>
                          </div>
                        </div>

                        <div class="form-group form-inline">
                          <!-- <button name="saveDraft" class="btn btn-secondary">Save Draft</button> -->
                          &nbsp;
                          <button name="createTeacher" class="btn btn-success">Add Teacher</button>
                        </div>

                      </form>
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
