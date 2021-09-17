<?php
  include 'includes/ver.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Create Account</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- Font Awesome -->
    <link href="Admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap core CSS -->
    <link href="bootstrap-4.2.1-dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <link href="Admin/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body class="unique-color">
  <div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5 unique-color-dark">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 white-text mb-4">Create an Account!</h1>
              </div>
              <form class="user" method="post">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="First Name" name="first_name" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Last Name" name="second_name" required>
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address" name="email" required>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="exampleInputId" placeholder="National Id Number" name="national_id" required>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password_1" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password" name="password_2" required>
                  </div>
                </div>
                
                <div class="form-group">
                  <select class="browser-default custom-select" name="role">
                    <option value="" selected disabled>Select your role</option>
                    <option value="Admin">Admin</option>
                    <option value="Client">Client</option>
                    <option value="Technician">Technician</option>
                  </select>
                </div>
                <button class="btn unique-color btn-user btn-block white-text" type="submit" name="save">Create Account</button>
                <hr>
                <!-- <a href="#" class="btn btn-google btn-user btn-block">
                  <i class="fab fa-google fa-fw"></i> Register with Google
                </a>
                <a href="#" class="btn btn-facebook btn-user btn-block">
                  <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                </a> -->
              </form>
              <hr>
              <div class="text-center">
                <a class="small white-text" href="forgot-password.php">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small white-text" href="login.php">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

<?php

?>
</body>
    <!-- JQuery -->
    <script type="text/javascript" src="bootstrap-4.2.1-dist/js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="bootstrap-4.2.1-dist/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="bootstrap-4.2.1-dist/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
</html>
