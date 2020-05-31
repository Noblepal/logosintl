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
            <li class="breadcrumb-item active">Add Course</li>
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
          <h3 class="mt-3">Add New Course</h3>

          <form class="" action="" method="post">
            <div class="row">
              <div class="form-group col-md-6">
                <label>Name of course</label>
                <input type="text" name="title" class="form-control" placeholder="Topic Title" required>
              </div>

              <div class="form-group col-md-6">
                <label>Education Level</label>
                <select class="form-control" name="course_type" required>
                  <option value="diploma">Diploma</option>
                  <option value="bachelors">Bachelors</option>
                  <option value="masters">Masters</option>
                  <option value="doctorate">Doctorate</option>
                </select>
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-6">
                <label>Course Duration (Weeks)</label>
                <input type="number" name="course_duration" class="form-control" placeholder="Enter length of course"
                  required>
              </div>

              <div class="form-group col-md-6">
                <label>Number of topics</label>
                <input type="number" name="course_num_topics" class="form-control" placeholder="Enter number of topics"
                  required>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label>Course Description</label>
                <textarea name="course_description" class="form-control" placeholder="Enter course description"
                  required></textarea>
              </div>
              <div class="form-group col-md-6">
                <label>Teacher</label>
                <select class="form-control" name="teacher" required>
                  <?php $teachers = getTeachers();
                              foreach ($teachers as $teacher){
                                ?>
                  <option value="<?php echo $teacher['name'];?>"><?php echo $teacher['name'];?></option>
                  <?php
                              }
                              ?>
                </select>
              </div>

            </div>

            <div class="row">
              <div class="form-group col-md-6">
                <label>Course Picture</label>
                <input type="file" name="image" class="form-control" accept="image/*" required>
              </div>

              <div class="form-check my-3">
                <input type="checkbox" name="popular" value="yes" class="form-check-input" id="exampleCheck1">
                <label class="ml-2 form-check-label" for="exampleCheck1">Add to featured courses? <small>(will be
                    displayed on the home page)</small></label>
              </div>

            </div>

            <div class="form-group form-inline">
              <!-- <button name="saveDraft" class="btn btn-secondary">Save Draft</button> -->
              &nbsp;
              <button name="createCourse" class="btn btn-success">Publish Course</button>
            </div>

          </form>
        </div>
      </main>
      <?php include("./includes/footer.php"); ?>
    </div>
  </div>
  <script>
    CKEDITOR.replace('topic_content');
  </script>

  <?php include("./includes/scripts.php"); ?>
</body>

</html>