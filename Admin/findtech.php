<?php
  @session_start();
  if($_SESSION['admin'])
  {
      include '../includes/db-conn.php';
      include_once '../includes/addTech.php';
      // include 'functions/actions.php';
      // $obj=new DataOperations();
      $success=$error='';
      $email=$_SESSION['admin'];

      $results = mysqli_query($con, "SELECT * FROM users WHERE role='Technician'");
      $cat = mysqli_query($con, "SELECT * FROM job_category");
      $user = mysqli_query($con, "SELECT * FROM users WHERE `email`='$email'");
      while($get_user = mysqli_fetch_assoc($user))
      {
          $fname=$get_user['first_name'];
          $sname=$get_user['other_names'];
          $role=$get_user['role'];
          $names = $fname.' '.$sname;
      }
      if(isset($_POST['delete']))
      {
        // sql to delete a record
        $delete_id = $_POST['delete'];
        $sql = "DELETE FROM users WHERE c_Id='$delete_id' ";
        $run_del=mysqli_query($con,$sql);
        if ($run_del) {
          //   echo '<script>window.location.href="client.php"</script>';
            $msg_del = "Technician Deleted Succesfully";
            $del_css_cls = "alert-danger";
        } else {
            echo "Error deleting record: " . $con->error;
            $msg_del = "Failure Deleting Technician";
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

  <title>GFT - Find Technician</title>
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
            <h5 class="card-header h5">List of All Technicians</h5>
            <div class="text-right">
              <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalRegisterForm"><i class="fas fa-magic mr-1"></i> Add New</button>
            </div>
          <div class="card-body">
          <!-- Message to display -->
                <?php if(!empty($msg_del)): ?>
                <div class="alert <?php echo $del_css_cls; ?>"><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                  <?php echo $msg_del; ?>
                </div>
                <?php endif; ?>
          <!-- Message to display -->
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
                  <button type='button' class='btn btn-outline-success btn-sm m-0 waves-effect'><i class='fas fa-fw fa-eye' data-toggle='modal' data-target="#ViewUser<?= $row['c_Id'];?>"></i></button>
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
                                      <p>Are you sure you want to delete <?php echo $row['first_name'];?> </p>
                                    </div>
                                  </div>

                                  <div class='modal-footer justify-content-center'>
                                      <form action=" " method="post">
                                          <input type="hidden" value="<?=$row['first_name'].$row['other_names']?>" name="a_name">
                                          <button type='submit' class='btn btn-danger' name='delete' value="<?php echo $row['c_Id'];?>" >Delete Now <i class='far fa-gem ml-1 text-white'></i></button>
                                      </form>
                                    <button type='button' class='btn btn-outline-danger waves-effect' data-dismiss='modal'>No, thanks</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                        <!-- Delete Modal -->
                        
                        <!-- View Technician Modal -->
                  <div class="modal fade" id="ViewUser<?= $row['c_Id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Technicians' Profile</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body mx-3">
                        <div class=" mb-5">
                        <div class="avatar mx-auto">
                          <img src="<?php echo $row['image'];?>" class="rounded-circle z-depth-1 img-fluid"
                            alt="No image uploaded">
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
                        <button class="btn btn-unique">Send <i class="fas fa-paper-plane-o ml-1"></i></button>
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

  </div>
  <!-- End of Page Wrapper -->
 <!-- Add user Modal -->
 <form method="post" action="">
<div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center elegant-color-dark text-white">
        <h4 class="modal-title w-100 font-weight-bold">Add New Technician</h4>
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
        <div class="form-group">
          <select class="browser-default custom-select" name="profession">
            <option value="" selected disabled>Select Profession</option>
            <?php
              while ($get_cat = mysqli_fetch_array($cat))
              {
            ?>
            <option value="<?= $get_cat['JC_name'];?>"><?= $get_cat['JC_name'];?></option>
              <?php } ?>
          </select>
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
