<?php
session_start();
if($_SESSION['tech'])
{
  include '../includes/db-conn.php';
  $success=$error='';
  $email=$_SESSION['tech'];

  $results = mysqli_query($con, "SELECT * FROM users");
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
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>GFT - Clients' Personal Information</title>
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
        <h4 class="py-4 text-center">Profile Information</h4>
        <div class="d-flex justify-content-center">
        <div class="col-lg-4 col-md-12 mb-4">
          <!--Card-->
          <div class="card card-cascade wider mb-4">

            <!--Card image-->
            <div class="view view-cascade">
              <img src="<?php echo $url; ?>" class="card-img-top">
              <a href="#!">
                <div class="mask rgba-white-slight"></div>
              </a>
            </div>
            <!--/Card image-->

            <!--Card content-->
            <div class="card-body card-body-cascade text-center">
              <!--Title-->
              <h4 class="card-title"><strong><?php echo $names; ?></strong></h4>
              <h5 class="indigo-text"><strong><?php echo $prof; ?></strong></h5>

              <p class="card-text"><?php echo $bio; ?> </p>


              <!--Linkedin-->
              <a class="btn btn-unique" href="settings.php"><i class="far fa-edit"> Edit</i></a>

            </div>
            <!--/.Card content-->

          </div>
          <!--/.Card-->
          </div>
          </div>
        </div>
    <!-- /.container-fluid -->

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