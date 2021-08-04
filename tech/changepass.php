<?php
session_start();
include '../includes/db-conn.php';
$email=$_SESSION['tech'];
if($_SESSION['tech'])
{
        if(isset($_POST['submit']))
        {
          $password_1=$con->real_escape_string($_POST['password1']);
          $password_2=$con->real_escape_string($_POST['password2']);
          if($password_1!=$password_2){		
            echo $error="
              <div class='alert alert-warning alert-dismissible fade show' role='alert'>The two password are not matching 
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                </button>
              </div>";
            }	
          else{
              $password = md5($password_1);
              $query = "UPDATE users SET password='$password' WHERE email='$email'";
              $run_query=mysqli_query($con,$query);
            
            if($run_query){
              $msg_del = "New Password Set Succesfully";
              $del_css_cls = "alert-success";
            }
            else{
              $msg_del = "Unable to change password! Try again later.";
              $del_css_cls = "alert-warning";
            }
            }
        }
      }
else{
    header('location:../login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>GFT - Change Account Password</title>
  <!-- Custom fonts for this template-->
  <link href="../Admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="../bootstrap-4.2.1-dist/css/mdb.min.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../Admin/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="../Admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

  <?php include '../includes/TechNav.php'; ?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
        <?php include '../includes/TechTop.php'; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
                <?php if(!empty($msg_del)): ?>
                <div class="alert <?php echo $del_css_cls; ?>"><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                  <?php echo $msg_del; ?>
                </div>
                <?php endif; ?> 
          <!-- Change Password body -->
          <form method="post">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Change Your Account Password</h4>
                  </div>
                  <div class="modal-body mx-3">
                    <div class="md-form mb-5">
                      <i class="fas fa-lock prefix grey-text"></i>
                      <input type="password" id="orangeForm-email" class="form-control validate" placeholder="Your new Password" name="password1">
                    </div>

                    <div class="md-form mb-4">
                      <i class="fas fa-lock prefix grey-text"></i>
                      <input type="password" id="orangeForm-pass" class="form-control validate" placeholder="Confirm your new password" name="password2">
                    </div>

                  </div>
                  <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" name="submit" class="btn btn-outline-success">Save Password</button>
                  </div>
                </div>
              </div>
            </form>  
            <!-- End of Change Password body -->

      </div>
      <!-- End of Main Content -->

    <?php include '../includes/AdminFoot.php'; ?>

    </div>
    <!-- End of Content Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
</body>
  <!-- Bootstrap core JavaScript-->
  <script src="../Admin/vendor/jquery/jquery.min.js"></script>
  <script src="../Admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../Admin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../Admin/js/sb-admin-2.min.js"></script>
</html>