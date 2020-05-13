<?php

session_start();

$con = mysqli_connect('localhost', 'favoure1_favoure1', '6Ktx$hw41L*k', 'favoure1_logosintl');

if(isset($_POST['loginAdmin'])){
  loginAdmin($_POST);
}

function loginAdmin($post){
  global $con;
  extract($post);
  $stmt=$con->prepare("SELECT username, email, password FROM admin WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->store_result();
  $stmt->bind_result($username, $email, $hashed_password);
  $stmt->fetch();

  if($stmt->num_rows > 0){
    if(password_verify($password, $hashed_password)){
      $_SESSION['isAdmin']= true;
      $_SESSION['name']= $username;
      $_SESSION['logged_in'] = true;
      $_SESSION['email']=$email;
      header('location: login.php?logged_in=1&message=Login successful. Redirecting...');
    } else {
      header('location: login.php?logged_in=0&message=Incorrect password');
    }
  } else {
    header('location: login.php?logged_in=0&message=Username not found');
  }
  $stmt->free_result();
  $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
    <?php include('./includes/head.php'); ?>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header d-flex justify-content-center"> <img src="../images/logoman.png" width="70" height="70" alt=""> <h3 class="text-center font-weight-light my-4">Administrator Login</h3></div>
                                    <div class="card-body">
                                      <?php
                                      if(isset($_GET['logged_in'])){
                                        $s = $_GET['logged_in'];
                                        if ($s == 0) {
                                          ?>
                                          <div class="alert alert-danger mt-3" role="alert">
                                            <?php echo $_GET['message'];?>
                                          </div>
                                          <?php
                                        } else if($s == 1){
                                          ?>
                                          <div class="alert alert-success mt-3" role="alert">
                                            <?php echo $_GET['message'];?>
                                          </div>
                                          <script>
                                            setTimeout(function(){
                                              window.location.replace("index.php");
                                            }, 2000);

                                          </script>
                                          <?php
                                        }
                                      }
                                      ?>
                                        <form action="" method="post">
                                            <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Email</label>
                                              <input class="form-control py-4" id="inputEmailAddress" name="email" type="email" placeholder="Enter email address" required/>
                                            </div>
                                            <div class="form-group"><label class="small mb-1" for="inputPassword">Password</label>
                                              <input class="form-control py-4" id="inputPassword" name="password" type="password" placeholder="Enter password" required/>
                                            </div>
                                            <!-- <div class="form-group">
                                                <div class="custom-control custom-checkbox"><input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" /><label class="custom-control-label" for="rememberPasswordCheck">Remember password</label></div>
                                            </div> -->
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                              <!-- <a class="small " href="password.html">Forgot Password?</a> -->
                                              <button type="submit" name="loginAdmin" class="btn btn-primary">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- <div class="card-footer text-center">
                                        <div class="small"><a href="register.html">Need an account? Sign up!</a></div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <!-- <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-dark mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2019</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div> -->
        </div>
        <?php include('scripts.php'); ?>
    </body>
</html>
