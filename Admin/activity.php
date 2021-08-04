<?php
  @session_start();
  if($_SESSION['admin'])
  {
      include '../includes/db-conn.php';

      $results = mysqli_query($con, "SELECT * FROM logs");
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

  <title>GFT - Activity Log</title>
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

    <?php include'../includes/adminnav.php' ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
        <?php include'../includes/AdminTop.php' ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <div class="card">
            <h5 class="card-header h5">Activity Logs</h5>
          <div class="card-body">
          <table id="dataTable" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
            <thead>
              <tr>
              <th class="th-sm">User</th>
              <th class="th-sm">Role</th>
              <th class="th-sm">Activity</th>
              <th class="th-sm">Time</th>
              <th class="th-sm">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 

                  while ($row = mysqli_fetch_array($results)) {
                    
              ?>

              <tr>
                <td><?php echo $row['user'] ;?></td>
                <td><?php echo $row['role'] ;?></td>
                <td><?php echo $row['activity'] ;?></td>
                <td><?php echo $row['time'] ;?></td>
                <td class='text-center'>
                  <button type='button' class='btn btn-outline-danger btn-sm m-0 waves-effect' data-toggle='modal' data-target="#DeleteUser<?php echo $row['c_Id'];?>"> <i class='fas fa-fw fa-trash'></i></button>
                </td>
              </tr>
            </tbody>
          <?php }
          ?>
            <tfoot>
              <tr>
              <th class="th-sm">User</th>
              <th class="th-sm">Role</th>
              <th class="th-sm">Activity</th>
              <th class="th-sm">Time</th>
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

<?php include'../includes/AdminFoot.php' ?>

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
