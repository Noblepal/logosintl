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
          <h3 class="mt-3">Add Student</h3>
          <form class="" action="" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="form-group col-md-6">
                <label>Name of Student</label>
                <input type="text" name="student_name" class="form-control" placeholder="Student's name" required>
              </div>
              <div class="form-group col-md-6">
                <label>Phone</label>
                <input type="tel" id="phone" name="student_phone" class="form-control" placeholder="Example 254700123456" pattern="[0-9]{3}[0-9]{3}[0-9]{6}" required>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="signupGender">Gender</label>
                <select name="student_gender" class="form-control" id="signupGender">
                  <option value="" disabled selected>Select Gender</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                </select>
              </div>

              <div class="form-group col-md-6">
                <label>Email</label>
                <input type="email" name="student_email" class="form-control" placeholder="Enter email address" required>
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-6">
                <label for="signupPassword">Password</label>
                <input type="password" class="form-control mb-3" id="signupPassword" name="student_password" placeholder="Password" required>
              </div>
            </div>

            <div class="form-group form-inline">
              <!-- <button name="saveDraft" class="btn btn-secondary">Save Draft</button> -->
              &nbsp;
              <button name="createStudent" class="btn btn-success">Add Student</button>
            </div>

          </form>
          <!-- <form action="" method="post" class="row">
            <div class="row">
              <div class="form-group col-6">
                <label for="signupPhone"></label>
                <input type="tel" class="form-control mb-3" id="signupPhone" name="phone" placeholder="Phone Number" required>
              </div>
              <div class="col-6">
                <label for="signupName"></label>
                <input type="text" class="form-control mb-3" id="signupName" name="name" placeholder="Full Name" required>
              </div>
            </div>

            <div class="col-12">
              <label for="signupEmail"></label>
              <input type="email" class="form-control mb-3" id="signupEmail" name="email" placeholder="Email Address" required>
            </div>
            <div class="col-12">
              <label for="signupGender">Gender</label>
              <select name="gender" class="form-control" id="signupGender">
                <option value="" disabled selected>Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
              </select>
            </div>
            <div class="col-12">
              <label for="signupName"></label>
              <input type="password" class="form-control mb-3" id="signupPassword" name="password" placeholder="Password" required>
            </div>
            <div class="col-12">
              <button type="submit" name="registerUser" class="btn btn-primary">SIGN UP</button>
            </div>
          </form> -->
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