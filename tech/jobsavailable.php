<?php
session_start();
include '../includes/db-conn.php';
include 'functions/action.php';
$email=$_SESSION['tech'];
if($_SESSION['tech'])
{

$user = mysqli_query($con, "SELECT * FROM users WHERE `email`='$email'");
while($get_user = mysqli_fetch_assoc($user))
      {
          $prof=$get_user['Profession'];
      }

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Obadiah Waweru">
  <title>GFT - Search for Technicians Near You!</title>
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
  <?php include '../includes/TechNav.php';?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
        <?php include '../includes/TechTop.php'; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

        <!-- Begin Page Content -->
        <div class="container-fluid">

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <div class="card">
            <h5 class="card-header h5">Jobs Not Completed</h5>
                <?php if(!empty($msg_del)): ?>
                <div class="alert <?php echo $del_css_cls; ?>"><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                  <?php echo $msg_del; ?>
                </div>
                <?php endif; ?>
          <div class="card-body">
          <table id="dataTable" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
            <thead>
              <tr>
              <th class="th-sm">Job</th>
              <th class="th-sm">Job Description</th>
              <th class="th-sm">Assigned By</th>
              <th class="th-sm">Payment method</th>
              <th class="th-sm">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                  $jobcompleted = mysqli_query($con, "SELECT * FROM job WHERE job_status=0 AND skill_needed='$prof'");
                  while ($row = mysqli_fetch_array($jobcompleted)) {
                    
              ?>

              <tr>
                <td><?php echo $row['job_name'] ;?></td>
                <td><?php echo $row['job_description'] ;?></td>
                <td><?php echo $row['assigned_by'] ;?></td>
                <td><?php echo $row['payment_method'] ;?></td>
                <td class='text-center'>
                  <button type='button' class='btn btn-outline-primary btn-sm m-0 waves-effect' data-toggle='modal' data-target="#apply<?= $row['J_Id'];?>">Apply <i class='fas fa-fw fa-check'></i></button>
                </td>
              </tr>
                <!-- Central Modal Small -->
                <div class="modal fade" id="apply<?= $row['J_Id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                  aria-hidden="true">

                  <!-- Change class .modal-sm to change the size of the modal -->
                  <div class="modal-dialog modal-sm" role="document">


                    <div class="modal-content">
                      <div class="modal-header secondary-color-dark text-white">
                        <h4 class="modal-title w-100" id="myModalLabel"><?= $row['job_name'];?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span class="text-white" aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                      <strong>Job Description : </strong><?= $row['job_description'];?><br>
                      <strong>Payment Method : </strong><?= $row['payment_method'];?><br>
                      <strong>Skill Needed : </strong><?= $row['skill_needed'];?>
                      </div>
                      <div class="modal-footer">
                      <form method="post">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm" name="submit" value="<?= $row['J_Id'];?>">Submit Application</button>
                      </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Central Modal Small -->
              <?php 
              $apply=$row['J_Id'];  
            }
          ?>              
            </tbody>
            <tfoot>
              <tr>
              <th class="th-sm">Job</th>
              <th class="th-sm">Job Description</th>
              <th class="th-sm">Assigned By</th>
              <th class="th-sm">Payment Method</th>
              <th class="th-sm">Action</th>
              </tr>
            </tfoot>
          </table>

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      <?php

}
else{
  header('location:../login.php');
}
      ?>

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
  <script src="../Admin/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../Admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script>
    $(document).ready(function () {
    $('#dataTable').DataTable();
    $('.dataTables_length').addClass('bs-select');
    });
  </script>
</html>