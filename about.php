<?php

include './includes/functions.php';

?>
<!DOCTYPE html>
<html lang="en">

<?php
include './includes/head.php';
?>

<body>

  <?php include './includes/navbar.php'; ?>
  <!-- page title -->
  <section class="page-title-section overlay" data-background="images/logos_intl/logos_02.jpg">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <ul class="list-inline custom-breadcrumb">
            <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="@@page-link">About Us</a></li>
            <li class="list-inline-item text-white h3 font-secondary @@nasted"></li>
          </ul>
          <p class="text-lighten">Our courses offer a good compromise between the continuous assessment favoured by some universities and the emphasis placed on final exams by others.</p>
        </div>
      </div>
    </div>
  </section>
  <!-- /page title -->

  <!-- about -->
  <section class="section">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <img class="img-fluid w-100 mb-4" src="images/logos_intl/logos_03.jpg" alt="about image">
          <h2 class="section-title">ABOUT OUR JOURNEY</h2>
          <p>A Logos International Bible University (online) We follow the steps of the greatest teacher of all times who is Jesus Christ He Taught His disciple about the Kingdom of God.
            Join our Institution where you will be taught All about Apologetics, Hermeneutics, Homiletics and Much More. Distance Learning is provided at a very affordable cost.
          </p>
          <p>Email us logosintlbibleuniversity@gmail.com</p? </div> </div> </div> </section> <!-- /about -->

            <!-- funfacts -->
            <section class="section-sm bg-primary">
              <div class="container">
                <div class="row">
                  <!-- funfacts item -->
                  <div class="col-md-4 col-sm-6 mb-4 mb-md-0">
                    <div class="text-center">
                      <h2 class="count text-white" data-count="3">0</h2>
                      <h5 class="text-white">TEACHERS</h5>
                    </div>
                  </div>
                  <!-- funfacts item -->
                  <div class="col-md-4 col-sm-6 mb-4 mb-md-0">
                    <div class="text-center">
                      <h2 class="count text-white" data-count="12">0</h2>
                      <h5 class="text-white">COURSES</h5>
                    </div>
                  </div>
                  <!-- funfacts item -->
                  <div class="col-md-4 col-sm-6 mb-4 mb-md-0">
                    <div class="text-center">
                      <h2 class="count text-white" data-count="103">0</h2>
                      <h5 class="text-white">STUDENTS</h5>
                    </div>
                  </div>

                </div>
              </div>
            </section>
            <!-- /funfacts -->

            <!-- teachers -->
            <section class="section">
              <div class="container">
                <div class="row justify-content-center">
                  <div class="col-12">
                    <h2 class="section-title">Our Teachers</h2>
                  </div>
                  <!-- teacher -->
                  <?php
                  $teachers = getAllTeachers();
                  foreach ($teachers as $teacher) {
                  ?>
                    <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
                      <div class="card border-0 rounded-0 hover-shadow">
                        <img class="card-img-top rounded-0" src="<?php echo $teacher['image_url'];?>" alt="teacher">
                        <div class="card-body">
                          <a href="#teacher-single.html">
                            <h4 class="card-title"><?php echo $teacher['name']; ?></h4>
                          </a>
                          <div class="d-flex justify-content-between">
                            <span>Teacher</span>
                            <ul class="list-inline">
                              <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-facebook"></i></a></li>
                              <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-twitter-alt"></i></a></li>
                              <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-google"></i></a></li>
                              <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-linkedin"></i></a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php
                  }
                  ?>

                </div>
              </div>
            </section>
            <!-- /teachers -->



            <?php include './includes/modals.php'; ?>

            <?php include './includes/footer.php' ?>

            <?php include './includes/scripts.php' ?>

</body>

</html>