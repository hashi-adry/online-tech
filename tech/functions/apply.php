<?php
$email=$_SESSION['admin'];
        if(isset($_POST['submit'])){
          $sql = "UPDATE job SET `assigned_to`='$email',`job_status`='1' WHERE `J_Id`=`$apply` ";
          $run_del=mysqli_query($con,$sql);
          if ($run_del) {
            //   echo '<script>window.location.href="client.php"</script>';
              $msg_del = "Job submited Succesfully";
              $del_css_cls = "alert-danger";
          } else {
              echo "Error submiting record: " . $con->error;
              $msg_del = "Failure Deleting Job";
              $del_css_cls = "alert-warning";
          }
        }
      ?>