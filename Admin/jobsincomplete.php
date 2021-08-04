<?php
  @session_start();
  if($_SESSION['admin'])
  {
      include '../includes/db-conn.php';
      // include 'functions/actions.php';
      // $obj=new DataOperations();
      $success=$error='';
      $email=$_SESSION['admin'];

      $results = mysqli_query($con, "SELECT * FROM job");

      $user = mysqli_query($con, "SELECT * FROM users WHERE `email`='$email'");
      while($get_user = mysqli_fetch_assoc($user))
      {
          $fname=$get_user['first_name'];
          $sname=$get_user['other_names'];
          $role=$get_user['role'];
          $names = $fname.' '.$sname;
      }
      if(isset($_POST['delete_id'])){
      // sql to delete a record
      $delete_id = $_POST['delete_id'];
      $sql = "DELETE FROM job WHERE J_Id='$delete_id' ";
      $run_del=mysqli_query($con,$sql);
      if ($run_del) {
        //   echo '<script>window.location.href="client.php"</script>';
          $msg_del = "Job Deleted Succesfully";
          $del_css_cls = "alert-danger";
      } else {
          echo "Error deleting record: " . $con->error;
          $msg_del = "Failure Deleting Job";
          $del_css_cls = "alert-warning";
      }
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

  <title>GFT - Completed Jobs</title>
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
          <div class="card">
            <h5 class="card-header h5">Jobs in Progress</h5>
          <div class="card-body">
            <!-- Message to Display -->
            <?php if(!empty($msg_del)): ?>
                <div class="alert <?php echo $del_css_cls; ?>"><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                  <?php echo $msg_del; ?>
                </div>
                <?php endif; ?>
            <!-- Message to Display -->
          <table id="dataTable" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
            <thead>
              <tr>
              <th class="th-sm">Job</th>
              <th class="th-sm">Job Description</th>
              <th class="th-sm">Skill Needed</th>
              <th class="th-sm">Payment Method</th>
              <th class="th-sm">Assigned By</th>
              <th class="th-sm">Assigned To</th>
              <th class="th-sm">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 

                $jobcompleted = mysqli_query($con, "SELECT * FROM job WHERE job_status=0");
                while ($row = mysqli_fetch_array($jobcompleted)) {
                    
              ?>

              <tr>
                <td><?php echo $row['job_name'] ;?></td>
                <td class='text-truncate' style='max-width: 12px;'><?php echo $row['job_description'] ;?></td>
                <td><?php echo $row['skill_needed'] ;?></td>
                <td><?php echo $row['payment_method'] ;?></td>
                <td></td>
                <td></td>
                <td class='text-center'>
                  <button type='button' class='btn btn-outline-danger btn-sm m-0 waves-effect' data-toggle='modal' data-target="#DeleteUser<?php echo $row['J_Id'];?>"> <i class='fas fa-fw fa-trash'></i></button>
                </td>
              </tr>
              <!-- Delete Modal -->
              <div class='modal fade' id="DeleteUser<?php echo $row['J_Id'];?>" tabindex='-1' role='dialog' aria-labelledby='myModalLabel'
                      aria-hidden='true'>
                  <div class='modal-dialog modal-notify modal-danger' role='document'>
                    <div class='modal-content'>
                      <div class='modal-header'>
                        <p class='heading lead'>Delete Job</p>

                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                          <span aria-hidden='true' class='white-text'>&times;</span>
                        </button>
                      </div>

                      <div class='modal-body'>
                        <div class='text-center'>
                          <i class='fas fa-check fa-4x mb-3 animated rotateIn'></i>
                          <p>Are you sure you want to delete <strong><?php echo $row['job_name'];?></strong> Job?? </p>
                        </div>
                      </div>

                      <div class='modal-footer justify-content-center'>
                          <form action=" " method="post">
                              <input type="hidden" name="delete_id" value="<?php echo $row['J_Id']; ?>">
                              <button type='submit' class='btn btn-danger' name='delete' value="<?php echo $row['J_Id'];?>" >Delete Now <i class='far fa-gem ml-1 text-white'></i></button>
                          </form>
                        <button type='button' class='btn btn-outline-danger waves-effect' data-dismiss='modal'>No, thanks</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Delete Modal -->
                <?php }
        ?>
            </tbody>
            <tfoot>
              <tr>
              <th class="th-sm">Job Description</th>
              <th class="th-sm">Skill Needed</th>
              <th class="th-sm">Payment Method</th>
              <th class="th-sm">Client in Need</th>
              <th class="th-sm">Assigned To</th>
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
  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script>
    $(document).ready(function () {
    $('#dataTable').DataTable();
    $('.dataTables_length').addClass('bs-select');
    });
  </script>
</html>
