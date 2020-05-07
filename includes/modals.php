<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content rounded-0 border-0 p-4">
        <div class="modal-header border-0">
          <h3>Register</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="login">
            <form action="" method="post" class="row">
              <div class="col-12">
                <input type="tel" class="form-control mb-3" id="signupPhone" name="phone" placeholder="Phone Number" required>
              </div>
              <div class="col-12">
                <input type="text" class="form-control mb-3" id="signupName" name="name" placeholder="Full Name" required>
              </div>
              <div class="col-12">
                <input type="email" class="form-control mb-3" id="signupEmail" name="email" placeholder="Email Address" required>
              </div>
              <div class="col-12">
                <input type="password" class="form-control mb-3" id="signupPassword" name="password" placeholder="Password" required>
              </div>
              <div class="col-12">
                <button type="submit" name="registerUser" class="btn btn-primary">SIGN UP</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content rounded-0 border-0 p-4">
        <div class="modal-header border-0">
          <h3>Login</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" method="post" class="row">
            <div class="col-12">
              <input type="text" name="email" class="form-control mb-3" id="loginName" placeholder="Email address" required>
            </div>
            <div class="col-12">
              <input type="password" name="password" class="form-control mb-3" id="loginPassword" placeholder="Password" required>
            </div>
            <div class="col-12">
              <button type="submit" name="loginUser" class="btn btn-primary">LOGIN</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>