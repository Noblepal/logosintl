 <!-- header -->
 <header class="fixed-top header">
     <!-- top header -->
     <div class="top-header py-2 bg-white">
         <div class="container">
             <div class="row text-center justify-content-center">
                 <div class="alert col-md-12 alert-warning fade show" role="alert">
                     <strong>Info:</strong> Student platform is currently under maintenance
                 </div>

                 <?php
                    if (isset($_GET['login'])) {
                        $code = $_GET['login'];
                        $message = $_GET['message'];
                        if ($code == 1) {
                    ?>
                         <div class="alert dismiss_ col-md-6 alert-success alert-dismissible fade show" role="alert">
                             <strong><?php echo $message; ?></strong>
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                     <?php
                        } else if ($code == 0) {
                        ?>
                         <div class="alert dismiss_ col-md-6 alert-danger alert-dismissible fade show" role="alert">
                             <strong><?php echo $message; ?></strong>
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                     <?php
                        }
                    } else if (isset($_GET['register'])) {
                        $code = $_GET['register'];
                        $message = $_GET['message'];
                        if ($code == 1) {
                        ?>
                         <div class="alert dismiss_ col-md-6 alert-success alert-dismissible fade show" role="alert">
                             <strong><?php echo $message; ?></strong>
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                         <script>
                             setTimeout(function() {
                                 window.location.replace("index.php?login=1&message=Login successful");
                             }, 2000);
                         </script>
                     <?php
                        } else if ($code == 0) {
                        ?>
                         <div class="alert dismiss_ col-md-6 alert-danger alert-dismissible fade show" role="alert">
                             <strong><?php echo $message; ?></strong>
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                     <?php
                        }
                    } else if (isset($_GET['logout'])) {
                        $code = $_GET['logout'];
                        $message = $_GET['message'];
                        if ($code == 1) {
                        ?>
                         <div class="alert dismiss_ col-md-6 alert-info alert-dismissible fade show" role="alert">
                             <strong><?php echo $message; ?></strong>
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                 <?php
                        }
                    }

                    ?>

             </div>
             <div class="row no-gutters">
                 <div class="col-lg-4 text-center text-lg-left">
                     <a class="text-color mr-3" href="callto:+254720294629"><strong>CALL</strong> +254 720 294 629</a>
                     <ul class="list-inline d-inline">
                         <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="https://www.facebook.com/logosint/"><i class="ti-facebook"></i></a></li>
                         <!-- <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="#"><i class="ti-twitter-alt"></i></a></li>
                         <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="#"><i class="ti-linkedin"></i></a></li>
                         <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="#"><i class="ti-instagram"></i></a></li> -->
                     </ul>
                 </div>
                 <div class="col-lg-8 text-center text-lg-right">
                     <ul class="list-inline">
                         <li class="list-inline-item"><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="#notice.html">notice</a></li>
                         <li class="list-inline-item"><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="#research.html">research</a></li>
                         <li class="list-inline-item"><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="#scholarship.html">SCHOLARSHIP</a></li>

                     </ul>
                 </div>
             </div>
         </div>
     </div>
     <!-- navbar -->
     <div class="navigation w-100">
         <div class="container">
             <nav class="navbar navbar-expand-lg navbar-light p-0">
                 <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="logo"></a>
                 <button class="navbar-toggler rounded-0" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                 </button>

                 <div class="collapse navbar-collapse" id="navigation">
                     <ul class="navbar-nav ml-auto text-center">
                         <li class="nav-item active">
                             <a class="nav-link" href="index.php">Home</a>
                         </li>
                         <li class="nav-item @@about">
                             <a class="nav-link" href="about.php">About</a>
                         </li>
                         <li class="nav-item @@courses">
                             <a class="nav-link" href="courses.php">Courses</a>
                         </li>
                         <li class="nav-item @@contact">
                             <a class="nav-link" href="contact.php">CONTACT</a>
                         </li>
                         <?php
                            if (isset($_SESSION['logged_in'])) {
                                $isLoggedIn = $_SESSION['logged_in'];
                                if ($isLoggedIn) {
                            ?>
                                 <!-- Added this comment -->
                                 <li class="nav-item">
                                     <a class="nav-link" href="#"><?php echo $_SESSION['name'] ?></a>
                                 </li>
                                 <li class="nav-item">
                                     <a class="nav-link" href="logout.php">Logout</a>
                                 </li>
                             <?php
                                } else {
                                ?>
                                 <li class="nav-item">
                                     <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">login</a>
                                 </li>
                                 <li class="nav-item">
                                     <a class="nav-link" href="#" data-toggle="modal" data-target="#signupModal">register</a>
                                 </li>
                             <?php
                                }
                            } else {
                                ?>
                             <li class="nav-item">
                                 <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">login</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" href="#" data-toggle="modal" data-target="#signupModal">register</a>
                             </li>
                         <?php
                            }
                            ?>

                         <!-- <li class="nav-item @@events">
                            <a class="nav-link" href="#events.html">EVENTS</a>
                        </li>
                        <li class="nav-item @@blog">
                            <a class="nav-link" href="#blog.html">BLOG</a>
                        </li>
                        <li class="nav-item dropdown view">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Pages
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#teacher.html">Teacher</a>
                            <a class="dropdown-item" href="#teacher-single.html">Teacher Single</a>
                            <a class="dropdown-item" href="#notice.html">Notice</a>
                            <a class="dropdown-item" href="#notice-single.html">Notice Details</a>
                            <a class="dropdown-item" href="#research.html">Research</a>
                            <a class="dropdown-item" href="#scholarship.html">Scholarship</a>
                            <a class="dropdown-item" href="#course-single.html">Course Details</a>
                            <a class="dropdown-item" href="#event-single.html">Event Details</a>
                            <a class="dropdown-item" href="#blog-single.html">Blog Details</a>
                            </div>
                        </li> -->

                     </ul>
                 </div>
             </nav>
         </div>
     </div>
 </header>

 <!-- /header -->