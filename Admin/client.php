<?php
  @session_start();
  if($_SESSION['admin'])
  {
      include '../includes/db-conn.php';
      include_once '../includes/addClient.php';
      // include_once 'functions/actions.php';
      // $obj=new DataOperations();
      $success=$error='';
      $email=$_SESSION['admin'];


      $results = mysqli_query($con, "SELECT * FROM users WHERE role='Client'");

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
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>GFT - Find Client</title>
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
            <h5 class="card-header h5">List of All Clients</h5>
            <div class="text-right">
            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalRegisterForm"><i class="fas fa-magic mr-1"></i> Add New</button>
          </div>
            <div class="card-body">
            <!-- Message to diplay -->
                <?php if(!empty($msg)): ?>
                <div class="alert <?php echo $css_cls; ?>"><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                  <?php echo $msg; ?>
                </div>
                <?php endif; ?>

                <?php if(!empty($msg_del)): ?>
                <div class="alert <?php echo $del_css_cls; ?>"><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                  <?php echo $msg_del; ?>
                </div>
                <?php endif; ?>
            <!-- Message to diplay -->
          <table id="dataTable" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th class="th-sm">Name
                </th>
                <th class="th-sm">County
                </th>
                <th class="th-sm">State
                </th>
                <th class="th-sm">Description
                </th>
                <th class="th-sm">Action
                </th>
              </tr>
            </thead>
            <tbody>
              <?php 

                  while ($row = mysqli_fetch_array($results)) {
                    
                 

          ?>

           <tr>
                <td><?php echo $row['first_name']." ".$row['other_names'] ;?></td>
                <td><?php echo $row['county'] ;?></td>
                <td><?php echo $row['estate'] ;?></td>
                <td class='text-truncate' style='max-width: 12px;'><?php echo $row['brief_desc'] ;?></td>
                <td class='text-center'>
                  <button type='button' class='btn btn-outline-success btn-sm m-0 waves-effect' data-toggle='modal' data-target="#ViewUser<?= $row['c_Id']; ?>"><i class='fas fa-fw fa-eye' ></i></button>
                  <button type='button' class='btn btn-outline-danger btn-sm m-0 waves-effect' data-toggle='modal' data-target="#DeleteUser<?= $row['c_Id'];?>"> <i class='fas fa-fw fa-trash'></i></button>
                </td>
              </tr>
              <!-- Delete Modal -->
                    <div class='modal fade' id="DeleteUser<?= $row['c_Id'];?>" tabindex='-1' role='dialog' aria-labelledby='myModalLabel'
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
                          <p>Are you sure you want to delete <strong><?php echo $row['first_name'];?></strong> completely from the system?</p>
                        </div>
                      </div>

                      <div class='modal-footer justify-content-center'>
                          <form action=" " method="post">
                              <input type="hidden" name="delete_id" value="<?= $row['c_Id']; ?>">
                              <input type="hidden" value="<?=$row['first_name'].$row['other_names']?>" name="a_name">
                              <button type='submit' class='btn btn-danger' name='delete' value="<?= $row['c_Id'];?>" >Delete Now <i class='far fa-gem ml-1 text-white'></i></button>
                          </form>
                        <button type='button' class='btn btn-outline-danger waves-effect' data-dismiss='modal'>No, thanks</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Delete Modal -->

                <!-- View User Modal -->
                <div class="modal fade" id="ViewUser<?= $row['c_Id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header text-center unique-color-dark">
                        <h4 class="modal-title w-100 font-weight-bold white-text">User Information</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body mx-3">
                        <div class=" mb-5">
                        <div class="avatar mx-auto">
                          <img src="<?= $row['image']; ?>" class="rounded-circle z-depth-1 img-fluid"
                            alt="No Image Uploaded">
                        </div>
                        <h5 class="font-weight-bold mt-4 mb-3"><?=$row['first_name'].$row['other_names'];?></h5>
                        <p class="text-uppercase blue-text"><strong><?= $row['Profession']; ?></strong></p>
                        <p class="grey-text"><?= $row['brief_desc']; ?></p>
                      </div>

                      </div>
                      <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-outline-unique waves-effect" data-dismiss='modal'>Close <i class="fas fa-times ml-1"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- View User Modal -->
          <?php
  }
              ?>
              
            </tbody>
            <tfoot>
              <tr>
                <th>Name
                </th>
                <th>County
                </th>
                <th>State
                </th>
                <th>Description
                </th>
                <th>Action
                </th>
              </tr>
            </tfoot>
          </table>
        </div>
        </div>
        <!-- End of card -->

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
  <!-- Add user Modal -->
<form method="post" action="">
<div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center elegant-color-dark text-white">
        <h4 class="modal-title w-100 font-weight-bold">Add New Client</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="orangeForm-name" class="form-control validate" placeholder="First name" name="first_name">
        </div>
        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="orangeForm-name" class="form-control validate" placeholder="Last name" name="second_name">
        </div>
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="email" id="orangeForm-email" class="form-control validate" placeholder="User Email" name="email">
        </div>
        <div class="md-form mb-5">
          <i class="far fa-address-card prefix grey-text"></i>
          <input type="number" id="orangeForm-nid" class="form-control validate" placeholder="National ID" name="national_id">
        </div>
        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="orangeForm-pass" class="form-control validate" placeholder="Password" name="password">
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn elegant-color-dark text-white" type="submit" name="addClient">Submit</button>
      </div>
    </div>
  </div>
</div>
</form>
<!-- End of Modal -->

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
