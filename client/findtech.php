<?php
session_start();
if($_SESSION['client'])
{
  include '../includes/db-conn.php';
  // include 'functions/actions.php';
  // $obj=new DataOperations();
  $success=$error='';
  $email=$_SESSION['admin'];

  $results = mysqli_query($con, "SELECT * FROM users WHERE role='Technician'");

  $user = mysqli_query($con, "SELECT * FROM users WHERE `email`='$email'");
  while($get_user = mysqli_fetch_assoc($user))
  {
      $fname=$get_user['first_name'];
      $sname=$get_user['other_names'];
      $role=$get_user['role'];
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

    <?php include '../includes/ClientNav.php'; ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
        <?php include '../includes/ClientTop.php'; ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <div class="card">
            <h5 class="card-header h5">List of All Technicians</h5>
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
                  <button type='button' class='btn btn-outline-success btn-sm m-0 waves-effect' data-toggle='modal' data-target="#ViewUser<?= $row['c_Id'];?>"><i class='fas fa-fw fa-eye'"></i></button>
                </td>
              </tr>
                        
                        <!-- View Technician Modal -->
                <div class="modal fade" id="ViewUser<?= $row['c_Id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header text-center success-color-dark text-white">
                        <h4 class="modal-title w-100 font-weight-bold">Profile Information</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body mx-3">
                        <div class=" mb-5">
                        <div class="avatar mx-auto">
                          <img src="<?php echo $row['image'];?>" class="rounded-circle z-depth-1 img-fluid"
                            alt="Image Unavailabe">
                        </div>
                        <h5 class="font-weight-bold mt-4 mb-3"><?=$row['first_name'].$row['other_names'];?></h5>
                        <p class="text-uppercase blue-text"><strong><?= $row['Profession']; ?></strong></p>
                        <p class="grey-text"><?= $row['brief_desc']; ?></p>
                        <ul class="list-unstyled mb-0">
                          <!-- Facebook -->
                          <a class="p-2 fa-lg fb-ic">
                            <i class="fab fa-facebook-f blue-text"> </i>
                          </a>
                          <!-- Twitter -->
                          <a class="p-2 fa-lg tw-ic">
                            <i class="fab fa-twitter blue-text"> </i>
                          </a>
                          <!-- Instagram -->
                          <a class="p-2 fa-lg ins-ic">
                            <i class="fab fa-instagram blue-text"> </i>
                          </a>
                        </ul>
                      </div>

                      </div>
                      <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-unique">Assign Job<i class="fas fa-paper-plane-o ml-1"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
                        <!-- View Technician Modal -->
                        <?php
  }
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
  <!-- Page level plugins -->
  <script src="../Admin/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../Admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script>
    $(document).ready(function () {
    $('#dataTable').DataTable();
    $('.dataTables_length').addClass('bs-select');
    });
  </script>
</html>