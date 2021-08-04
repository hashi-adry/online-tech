<?php
session_start();
$_SESSION['tech']='';
$_SESSION['admin']='';
$_SESSION['client']='';

if(isset($_POST['login'])){
    require 'includes/db-conn.php';
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $result = mysqli_query($con, "SELECT * FROM `users` WHERE `email`='$email' and `password`='$password'");
    if(mysqli_num_rows($result)>0){
        while($get_user=mysqli_fetch_assoc($result))
        {
            $role=$get_user['role'];
        }
        if($role == 'Client')
        {
            $_SESSION['client'] = $email;
            header('location:client/index.php');
        }
        if($role == 'Technician')
        {
            $_SESSION['tech'] = $email;
            header('location:tech/index.php');
        }
        if($role == 'Admin')
        {
            $_SESSION['admin'] = $email;
            header('location:Admin/index.php');
        }
    }
    else
        echo "
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>Account doesn't exist 
                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                  </button>
                </div>";
        echo mysqli_error($con);
}
if(isset($_GET['logout'])){
    session_unregister('email');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login as user</title>
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

    <!-- Outer Row -->
    <div class="row justify-content-center ">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5 wow fadeIn unique-color-dark">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block">
              	
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 white-text mb-4">Welcome Back!</h1>
                    <hr class="unique-color">
                  </div>
                  <form class="user" method="post" action="login.php">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email" required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password" required>
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label white-text" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <button class="btn unique-color btn-user btn-block white-text" type="submit" name="login">Log In</button>
                    <!-- <a href="index.html" class="btn btn-primary btn-user btn-block" type="submit" name="login">
                      Login
                    </a> -->
                    <!-- <hr>
                    <a href="#" class="btn btn-google btn-user btn-block">
                      <i class="fab fa-google fa-fw"></i> Login with Google
                    </a>
                    <a href="#" class="btn btn-facebook btn-user btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                    </a> -->
                  </form>
                  <hr class="unique-color">
                  <div class="text-center">
                    <a class="small white-text" href="forgot-password.php">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small white-text" href="register.php">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

</body>
    <!-- JQuery -->
    <script type="text/javascript" src="bootstrap-4.2.1-dist/js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="bootstrap-4.2.1-dist/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="bootstrap-4.2.1-dist/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <script type="text/javascript">
    // Animations initialization
    new WOW().init();

    </script>
    <script>
      $(".alert").alert('close')
    </script>
</html>