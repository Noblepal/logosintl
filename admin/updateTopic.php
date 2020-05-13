<?php

include("./includes/functions.php");
$topic = $_SESSION['topic'];
if(isset($_GET['topic_id'])){
  $topic_id = $_GET['topic_id'];
  getTopicName($topic_id);

}

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
                          <li class="breadcrumb-item active">Update Topic</li>
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
                      <h3 class="mt-3 text-danger">Update topic is currently unavailable</h3>

                      <!-- <form class="" action="" method="post">
                        <div class="row">
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="exampleFormControlSelect1">Select Course</label>
                              <select class="form-control" name="course_id" id="exampleFormControlSelect1" required>
                                <option value="" selected disabled>Select Course</option>
                                <?php #getCourses(); ?>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-9">
                            <div class="form-group">
                              <label>Topic Title</label>
                              <input type="text" name="topic_name" class="form-control" placeholder="Topic Title" value="">
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <label>Topic Content</label>
                          <textarea name="topic_content" rows="8" cols="80"  value=""></textarea>
                        </div>
                        <div class="form-group form-inline">
                          <button name="saveDraft" class="btn btn-secondary">Save Draft</button>
                          &nbsp;
                          <button name="createTopic" class="btn btn-primary">Publish Topic</button>
                        </div>

                      </form> -->
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
