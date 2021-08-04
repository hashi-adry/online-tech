<?php
session_start();
include '../includes/db-conn.php';
include 'functions/action.php';
if($_SESSION['client'])
{
  $email=$_SESSION['client'];
  $user = mysqli_query($con, "SELECT * FROM users WHERE `email`='$email'");
  while($get_user = mysqli_fetch_assoc($user))
  {
      $fname=$get_user['first_name'];
      $sname=$get_user['other_names'];
      $names = $fname.' '.$sname;
      
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
  <title>GFT - All Completed Jobs</title>
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

          <div class="card">
            <h5 class="card-header h5">Acheived Jobs</h5>
            <?php if(!empty($msg_del)): ?>
                <div class="alert <?php echo $del_css_cls; ?>"><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                  <?php echo $msg_del; ?>
                </div>
                <?php endif; ?>  
          <div class="card-body">
          <table id="dataTable" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
            <thead>
              <tr>
              <th class="th-sm">Job Name</th>
              <th class="th-sm">Job Description</th>
              <th class="th-sm">Taken Up By</th>
              <th class="th-sm">Payment Method</th>
              <th class="th-sm">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                  $jobcompleted = mysqli_query($con, "SELECT * FROM job WHERE assigned_by='$names' AND job_status=2");
                  while ($row = mysqli_fetch_array($jobcompleted)) {
                    
              ?>

              <tr>
                <td><?php echo $row['job_name'] ;?></td>
                <td><?php echo $row['job_description'] ;?></td>
                <td><?php echo $row['assigned_to'] ;?></td>
                <td><?php echo $row['payment_method'] ;?></td>
                <td class='text-center'>
                  <button type='button' class='btn btn-outline-danger btn-sm m-0 waves-effect' data-toggle='modal' data-target="#delete<?= $row['J_Id'];?>"> <i class='fas fa-fw fa-trash'></i></button>
                </td>
              </tr>
              <!-- Delete Modal -->
              <div class="modal fade" id="delete<?= $row['J_Id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog modal-notify modal-danger" role="document">
                    <!--Content-->
                    <div class="modal-content">
                      <!--Header-->
                      <div class="modal-header">
                        <p class="heading lead">Delete This Job</p>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true" class="white-text">&times;</span>
                        </button>
                      </div>

                      <!--Body-->
                      <div class="modal-body">
                        <div class="text-center">
                          <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
                          <p>Are you sure you want to remove the <strong><?php echo $row['job_name'] ;?></strong> job?</p>
                        </div>
                      </div>

                      <!--Footer-->
                      <div class="modal-footer justify-content-center">
                      <form method="post">
                        <button type="submit" name="delete" class="btn btn-danger" value="<?= $row['J_Id']; ?>">Yes, Delete Now <i class="fas fa-trash ml-1 text-white"></i></button>
                        <a type="button" class="btn btn-outline-danger waves-effect" data-dismiss="modal">No, thanks</a>
                      </form>
                      </div>
                    </div>
                    <!--/.Content-->
                  </div>
                </div>
              <!-- Delete Modal -->
              <?php }
          ?>              
            </tbody>
            <tfoot>
              <tr>
              <th class="th-sm">Job Name</th>
              <th class="th-sm">Job Description</th>
              <th class="th-sm">Taken Up By</th>
              <th class="th-sm">Payment Method</th>
              <th class="th-sm">Action</th>
              </tr>
            </tfoot>
          </table>
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
  <script src="../Admin/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../Admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script>
    $(document).ready(function () {
    $('#dataTable').DataTable();
    $('.dataTables_length').addClass('bs-select');
    });
  </script>
</html>