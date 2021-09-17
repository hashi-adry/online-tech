<?php
session_start();
if($_SESSION['client'])

{
  include_once 'functions/post.php';
}
else{
    header('location:../tech/jobsavailable.php');
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
  <title>GFT - Post a Job</title>
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

    <?php include '../includes/ClientNav.php'; ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
        <?php include '../includes/ClientTop.php'; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
        <form method="post">
          <div class="card">
            <h5 class="card-header h5">Enter Job Details</h5>
            <div class="card-body">
            <?php if(!empty($msg)): ?>
            <div class="alert <?php echo $css_cls; ?>">
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
              <?php echo $msg;?>
            </div>
            <?php endif; ?>
              <!-- Post Job -->
                <div class="input-group mb-3">
                <!-- <label for="basic-url">Enter Job Details</label> -->
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">Example: Sink Blocked</span>
                  </div>
                  <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="job_name">
                </div>
                <!-- Payment - Multi-select -->
                <div class="input-group mb-3">
                  <select class="custom-select" name="payment_method">
                    <option selected disabled>Method of Payment</option>
                   
                    <option value="Cash">Cash On Deliver</option>
                  </select>
                </div>
                <!-- Payment - Multi-select -->
                <!-- Profession - Multi-select -->
                <div class="input-group mb-3">
                  <select class="custom-select" name="skill_needed">
                    <option selected disabled>Select skill needed</option>
                    <?php
                      $prof = mysqli_query($con, "SELECT * FROM job_category");
                      while ($row = mysqli_fetch_array($prof)){
                        $mech = $row['JC_name'];
                    ?>
                    <option value="<?php echo $row['JC_name']; ?>"><?php echo $mech; ?></option>
                  <?php } ?>
                  </select>
                </div>
                <!-- Profession - Multi-select -->
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Job Description</span>
                  </div>
                  <textarea class="form-control" aria-label="With textarea" name="job_description"></textarea>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-outline-success" type="submit" name="post">Submit</button>
                </div>
              <!-- /Post Job -->
            </div>
            
          </div>
          </form>
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