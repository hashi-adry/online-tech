<?php
  @session_start();
  if($_SESSION['admin'])
  {
      include '../includes/db-conn.php';

      $results = mysqli_query($con, "SELECT * FROM users WHERE role='Technician'");
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

  <title>GFT - Block Technicians</title>
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
            <h5 class="card-header h5">Block Technicians</h5>
          <div class="card-body">
          <table id="dataTable" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
            <thead>
              <tr>
              <th class="th-sm">Name</th>
              <th class="th-sm">County</th>
              <th class="th-sm">State</th>
              <th class="th-sm">Profession</th>
              <th class="th-sm">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 

                  while ($row = mysqli_fetch_array($results)) {
                    
              ?>

              <tr>
                <td><?php echo $row['first_name'].$row['other_names'] ;?></td>
                <td><?php echo $row['county'] ;?></td>
                <td><?php echo $row['estate'] ;?></td>
                <td><?php echo $row['Profession'] ;?></td>
                <td class='text-center'>
                  <button type='button' class='btn btn-outline-danger btn-sm m-0 waves-effect font-weight-bold' data-toggle='modal' data-target="#BlockUser<?php echo $row['c_Id'];?>"> Block</i></button>
                </td>
              </tr>
              <div class='modal fade' id="BlockUser<?php echo $row['c_Id'];?>" tabindex='-1' role='dialog' aria-labelledby='myModalLabel'
          aria-hidden='true'>
      <div class='modal-dialog modal-notify modal-danger' role='document'>
        <div class='modal-content'>
          <div class='modal-header'>
            <p class='heading lead'>Block User</p>

            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
              <span aria-hidden='true' class='white-text'>&times;</span>
            </button>
          </div>

          <div class='modal-body'>
            <div class='text-center'>
              <i class='fas fa-check fa-4x mb-3 animated rotateIn'></i>
              <p>Are you sure you want to block the user <?php echo $row['first_name'];?> </p>
            </div>
          </div>

          <div class='modal-footer justify-content-center'>
              <form action=" " method="post">
                  <input type="hidden" value="<?=$row['first_name'].$row['other_names']?>" name="a_name">
                  <button type='submit' class='btn btn-danger' value="<?php echo $row['c_Id'];?>" >Block Now <i class='far fa-gem ml-1 text-white'></i></button>
              </form>
            <button type='button' class='btn btn-outline-danger waves-effect' data-dismiss='modal'>No, thanks</button>
          </div>
        </div>
      </div>
    </div>
              <?php } 
          ?>
            </tbody>
            <tfoot>
              <tr>
              <th class="th-sm">Name</th>
              <th class="th-sm">County</th>
              <th class="th-sm">State</th>
              <th class="th-sm">Profession</th>
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
