<?php
  @session_start();
  if($_SESSION['admin'])
  {
      include '../includes/db-conn.php';
      include_once 'functions/add_admin.php';
      $results = mysqli_query($con, "SELECT * FROM users WHERE role='Admin'");

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

  <title>GFT - Admin Dashboard</title>
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="../bootstrap-4.2.1-dist/css/mdb.min.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">


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
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Number of Clients</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">500</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Number of Technicians</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">1000</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Number of Jobs</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50</div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Jobs</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End of row -->
          <div class="card">
            <h5 class="card-header h5">System Administrators</h5>
                <?php if(!empty($msg)): ?>
                <div class="alert <?php echo $css_cls; ?>"><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                  <?php echo $msg; ?>
                </div>
                <?php endif; ?>

            <div class="text-right">
            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalRegisterForm"><i class="fas fa-magic mr-1"></i> Add New</button>
          </div>
            <div class="card-body">
          <!-- Content Row -->
                <table class="table">
                  <thead class="unique-color-dark white-text">
                    <tr>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                  while ($row = mysqli_fetch_array($results)) {
                    ?>
                    <tr>
                      <td><?php echo $row['first_name']." ".$row['second_name'] ;?></td>
                      <td><?php echo $row['email'] ;?></td>
                      <td>
                        <button type='button' class='btn btn-outline-danger btn-sm m-0 waves-effect' data-toggle='modal' data-target="#DeleteUser<?php echo $row['c_Id']; ?>"> <i class='fas fa-fw fa-trash'></i></button>
                      </td>
                    </tr>
                  </tbody>
                  <!-- Delete Modal -->
                  <div class='modal fade' id="DeleteUser<?php echo $row['c_Id']; ?>" tabindex='-1' role='dialog' aria-labelledby='myModalLabel'
                      aria-hidden='true'>
                  <div class='modal-dialog modal-notify modal-danger' role='document'>
                    <div class='modal-content'>
                      <div class='modal-header'>
                        <p class='heading lead'>Delete User</p>

                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                          <span aria-hidden='true' class='white-text'>&times;</span>
                        </button>
                      </div>

                      <div class='modal-body'>
                        <div class='text-center'>
                          <i class='fas fa-check fa-4x mb-3 animated rotateIn'></i>
                          <p>Are you sure you want to delete <?php echo $row['first_name'];?> </p>
                        </div>
                      </div>

                      <div class='modal-footer justify-content-center'>
                          <form action="delete.php" method="post">
                          <input type="hidden" name="delete_id" value="<?php echo $row['c_Id']; ?>">
                              <input type="hidden" value="<?=$row['first_name'].$row['other_names']?>" name="a_name">
                              <button type="submit" name="delete" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> YES</button>
                          </form>
                        <button type='button' class='btn btn-outline-danger waves-effect' data-dismiss='modal'>No, thanks</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Delete Modal -->
                <!-- Add user Modal -->
                <form method="post">
                <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header text-center elegant-color-dark text-white">
                        <h4 class="modal-title w-100 font-weight-bold">Add New User</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body mx-3">
                        <div class="md-form mb-5">
                          <i class="fas fa-user prefix grey-text"></i>
                          <input type="text" id="orangeForm-name" class="form-control validate" placeholder="First name" name="first_name" required>
                        </div>
                        <div class="md-form mb-5">
                          <i class="fas fa-user prefix grey-text"></i>
                          <input type="text" id="orangeForm-name" class="form-control validate" placeholder="Last name" name="second_name" required>
                        </div>
                        <div class="md-form mb-5">
                          <i class="fas fa-envelope prefix grey-text"></i>
                          <input type="email" id="orangeForm-email" class="form-control validate" placeholder="User Email" name="email" required>
                        </div>
                        <div class="md-form mb-5">
                          <i class="far fa-address-card prefix grey-text"></i>
                          <input type="number" id="orangeForm-id" class="form-control validate" placeholder="National ID" name="national_id" required>
                        </div>
                        <div class="md-form mb-4">
                          <i class="fas fa-lock prefix grey-text"></i>
                          <input type="password" id="orangeForm-pass" class="form-control validate" placeholder="Password" name="password" required>
                        </div>

                      </div>
                      <div class="modal-footer d-flex justify-content-center">
                        <button class="btn elegant-color-dark text-white" type="submit" name="save_admin">Submit</button>
                      </div>
                    </div>
                  </div>
                </div>
                </form>
                <!-- End of Modal -->
                <?php }
                ?>
                </table>
        </div>
      </div>

        </div>
        <!-- /.container-fluid -->

      </div><br>
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
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script type="text/javascript">
    $(document).ready(function () {
    $('#dataTable').DataTable();
    $('.dataTables_length').addClass('bs-select');
    });
  </script>
</html>
