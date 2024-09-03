<?php

require "connection.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>The Hope | Log In</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="icon" href="logo/icon.png" type="icon">
</head>

<body class=" container-fluid imgBack vh-100">
  <div class=" col-12">
    <div class="row">
      <div class="col-lg-6 d-lg-flex d-xl-flex d-xxl-flex d-none d-md-none vh-100  justify-content-center align-items-center ">
        <div class="col-6 d-lg-flex">
          <div class="row">
            <div class="col-12 logo"></div>
            <div class="description col-12">
              <p class="text1SignUp">
                "Welcome to The Hope. Secure access to your compassionate journey. Join us—where
                kindness transforms lives. Start your journey now!"
              </p>
            </div>
          </div>
        </div>
        <div class="col-6">

        </div>

      </div>
      <div class="col-lg-6 col-sm-12 col-md-12 vh-100  d-flex justify-content-center align-items-center ">
        <div class="row">
          <div class="signInBox  border-5 rounded-1 border-primary " id="signInBox">
            <div class="col-12 ">
              <p class="signInText">Sign In to The Hope</p>


              <?php

              $email = "";
              $password = "";

              if (isset($_COOKIE["email"])) {
                $email = $_COOKIE["email"];
              }

              if (isset($_COOKIE["password"])) {
                $password = $_COOKIE["password"];
              }

              ?>


              <label class=" form-label">Email</label>
              <Input class="form-control" placeholder=" Enter Valid Email" id="emailIn" value="<?php echo $email?>" />
              <label class=" form-label">Password</label>
              <div class="row">
                <div class="input-pair">
                  <input type="password" class="form-control col-12" placeholder="Enter Password" id="passwordIn" value="<?php echo $password?>">
                  <i class="bi bi-eye" style=" margin-left: 10px; cursor: pointer;" id="e1" onclick="showPassword1();"></i>
                </div>
              </div>

              <div class="row">
                <div class="checkbox-pair">
                  <input type="checkbox" id="rememberme">
                  <label>Remember Me</label>
                  <a href="#" onclick="forgotPassword();">Forget Password</a>
                </div>
              </div>
              <div class="row">
                <div class="checkbox-pair">
                  <button class="btn btn-outline-dark" onclick="signIn();">Sign In</button>
                  <button class=" btn btn-dark" style="margin-left:20%;" onclick="changeView();"> New Donor's Register Now</button>
                </div>
              </div>

            </div>

          </div>

          <div class="signUpBox  border-5 rounded-1 border-primary d-none" style="width: 100%;" id="signUpBox">
            <div class="col-12 ">
              <p class="signInText">Register with Us</p>

              <label class=" form-label">First Name</label>
              <Input class="form-control" placeholder=" Enter your first name" id="fname" />
              <label class=" form-label">Last Name</label>
              <Input class="form-control" placeholder=" Enter tour last name" id="lname" />
              <label class=" form-label">Email</label>
              <Input class="form-control" placeholder=" Enter Valid Email" id="emailUp" />
              <label class=" form-label">Password</label>
              <div class="row">
                <div class="input-pair">
                  <input type="password" class="form-control col-12" placeholder="Enter Password" id="passwordUp">
                  <i class="bi bi-eye" style=" margin-left: 10px; cursor: pointer;" id="e2" onclick="showPassword2();"></i>
                </div>
              </div>


              <div class="row">
                <div class="checkbox-pair" style=" width: 100%;">
                  <button class="btn btn-outline-dark d-grid" onclick="signUp();">Register</button>
                  <button class=" btn btn-dark d-grid" style="margin-left:20%;" onclick="changeView();">Past Donor's Log In</button>
                </div>
              </div>

            </div>

          </div>

        </div>


      </div>

      <div class="modal" tabindex="-1" id="forgotPasswordModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Reset Password</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row g-3">

                <div class="col-6">
                  <label class="form-label">New Password</label>
                  <div class="input-group mb-3">
                    <input type="password" class="form-control" id="np" />
                    <button class=" btn btn-primary" type="button" id="np" onclick="showPassword3();">Show</button>
                  </div>
                </div>

                <div class="col-6">
                  <label class="form-label">Re-type Password</label>
                  <div class="input-group mb-3">
                    <input type="password" class="form-control" id="rnp" />
                    <button class=" btn btn-primary " type="button" id="rnp" onclick="showPassword4();">Show</button>
                  </div>
                </div>

                <div class="col-12">
                  <label class="form-label">Verification Code</label>
                  <input type="text" class="form-control" id="vc" />
                </div>

              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" onclick="resetPassword();">Reset Password</button>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  </div>
  <script src="script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>