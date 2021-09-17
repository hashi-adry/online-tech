<?php

include '../includes/db-conn.php';
$email=$_SESSION['tech'];

$jobcompleted = mysqli_query($con, "SELECT * FROM job WHERE job_status=1");
while ($row = mysqli_fetch_array($jobcompleted)) 
{
    $apply=$row['J_Id'];
  }
    if(isset($_POST['unassign'])){
        $sql = "UPDATE job SET assigned_to='null' ,job_status='0' WHERE J_Id='$apply' ";
        $run_del=mysqli_query($con,$sql);
        if ($run_del) {
          //   echo '<script>window.location.href="client.php"</script>';
            $msg_del = "Job Removed Succesfully";
            $del_css_cls = "alert-danger";
        } else {
            echo "Error submiting record: " . $con->error;
            $msg_del = "Failure Deleting Job";
            $del_css_cls = "alert-warning";
        }
      }
      if(isset($_POST['complete']))
      {
        $sqlii = "UPDATE job SET job_status='2' WHERE J_Id='$apply' ";
        $run_delii=mysqli_query($con,$sqlii);
        if ($run_delii) {
          //   echo '<script>window.location.href="client.php"</script>';
            $msg_del = "Job marked as Complete";
            $del_css_cls = "alert-success";
        } else {
            echo "Error submiting record: " . $con->error;
            $msg_del = "Failed to mark as Complete";
            $del_css_cls = "alert-warning";
        }
      } 

$user = mysqli_query($con, "SELECT * FROM users WHERE `email`='$email'");
while($get_user = mysqli_fetch_assoc($user))
      {
          $fname=$get_user['first_name'];
          $sname=$get_user['second_name'];
          $role=$get_user['role'];
          $names=$fname.' '.$sname;
      }

$jobincomplete = mysqli_query($con, "SELECT * FROM job WHERE job_status=0");
while ($row = mysqli_fetch_array($jobincomplete)) 
      {
        $apply1=$row['J_Id'];  
      }
      if(isset($_POST['submit']))
      {
        $sqli = "UPDATE job SET assigned_to='$names',job_status='1' WHERE J_Id='$apply1' ";
        $run_deli=mysqli_query($con,$sqli);
        if ($run_deli) {
          //   echo '<script>window.location.href="client.php"</script>';
            $msg_del = "Job submited Succesfully";
            $del_css_cls = "alert-success";
        } else {
            echo "Error submiting record: " . $con->error;
            $msg_del = "Failure Deleting Job";
            $del_css_cls = "alert-warning";
        }
      } 

$jobincomplete = mysqli_query($con, "SELECT * FROM job WHERE job_status=2");
while ($row = mysqli_fetch_array($jobincomplete)) 
            {
              $apply2=$row['J_Id'];  
            }
      if(isset($_POST['delete']))
      {
        $sql2 = "UPDATE job SET job_status='3' WHERE J_Id='$apply2'";
        $run_del2=mysqli_query($con,$sql2);
        if ($run_del2) {
          //   echo '<script>window.location.href="client.php"</script>';
            $msg_del = "Job marked as Complete";
            $del_css_cls = "alert-success";
        } else {
            echo "Error submiting record: " . $con->error;
            $msg_del = "Failed to mark as Complete";
            $del_css_cls = "alert-warning";
        }
      }  




      
?>