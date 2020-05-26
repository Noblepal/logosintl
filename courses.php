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
  <section class="page-title-section overlay" data-background="images/logos_intl/logos_09.jpg">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <ul class="list-inline custom-breadcrumb">
            <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="courses.html">Our Courses</a></li>
            <li class="list-inline-item text-white h3 font-secondary "></li>
          </ul>
          <p class="text-lighten">Our courses offer a good compromise between the continuous assessment favoured by some universities and the emphasis placed on final exams by others.</p>
        </div>
      </div>
    </div>
  </section>
  <!-- /page title -->

  <!-- courses -->
  <section class="section">
    <div class="container">
      <!-- course list -->
      <div class="row justify-content-center">
        <!-- course item -->
        <?php
        $courses = getAllCourses();
        foreach ($courses as $course) {
        ?>
          <div class="col-lg-4 col-sm-6 mb-5">
            <div class="card p-0 border-primary rounded-0 hover-shadow">
              <img class="card-img-top rounded-0" src="images/logos_intl/theological_studies.svg" alt="course thumb">
              <div class="card-body">
                <ul class="list-inline mb-2">
                  <li class="list-inline-item"><i class="ti-calendar mr-1 text-color"></i><?php echo $course['duration']; ?> Weeks</li>
                  <li class="list-inline-item"><a class="text-color" href="#"><?php echo $course['title']; ?></a></li>
                </ul>
                <a href="#course-single.html">
                  <h4 class="card-title"><?php echo $course['title']; ?></h4>
                </a>
                <p class="card-text mb-4">
                  <?php echo $course['course_description']; ?>
                </p>
                <a href="#course-single.html" class="btn btn-primary btn-sm">Apply now</a>
              </div>
            </div>
          </div>
        <?php
        }
        ?>

      </div>
      <!-- /course list -->
    </div>
  </section>
  <!-- /courses -->

  <?php include './includes/modals.php'; ?>

  <?php include './includes/footer.php' ?>

  <?php include './includes/scripts.php' ?>

</body>

</html>