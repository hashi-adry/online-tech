<?php
  @session_start();
  if($_SESSION['admin'])
  {
      include '../includes/db-conn.php';
      include 'functions/upload.php';
      $email=$_SESSION['admin'];

      $user = mysqli_query($con, "SELECT * FROM users WHERE `email`='$email'");
      while($get_user = mysqli_fetch_assoc($user))
      {
          $fname=$get_user['first_name'];
          $sname=$get_user['other_names'];
          $role=$get_user['role'];
          $prof=$get_user['Profession'];
          $bio=$get_user['brief_desc'];
          $names = $fname.' '.$sname;
          $url = $get_user['image'];
      }
  }
  else{
      header('location:../login.php');
  }

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>GFT - Settings</title>
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="../bootstrap-4.2.1-dist/css/mdb.min.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

      <?php include '../includes/adminnav.php'; ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
        <?php include '../includes/AdminTop.php'; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-4 card">
              <div class="card-body">
                <form action="settings.php" method="post" enctype="multipart/form-data">
                <h3 class="text-center">Create Profile</h3>
                <?php if(!empty($msg)): ?>
                <div class="alert <?php echo $css_cls; ?>"><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                  <?php echo $msg; ?>
                </div>
                <?php endif; ?>
                  <div class="form-group">
                    <label for="Profile Image">Profile Image</label>
                    <input type="file" name="ProfileImage" id="ProfileImage" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label for="bio">Bio</label>
                    <textarea name="bio" id="bio" rows="3" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <button type="submit" name="save-details" class="btn btn-info btn-block my-4">Save Details</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php include '../includes/AdminFoot.php'; ?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


</body>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
</html>
