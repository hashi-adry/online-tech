<?php
  @session_start();
  include 'db-conn.php';
  $msg_del=$del_css_cls=$msg=$css_cls=$firstName=$secondName=$NId=$email=$password=$error="";

  if(isset($_POST['addClient'])){
    $firstName=$con->real_escape_string($_POST['first_name']);
    $secondName=$con->real_escape_string($_POST['second_name']);
    $email=$con->real_escape_string($_POST['email']);
    $NId=$con->real_escape_string($_POST['national_id']);
    $prof=$con->real_escape_string($_POST['profession']);
    $password=$con->real_escape_string($_POST['password']);
    $roles="Technician";

    if(empty($email && $password )){			
        $error="Please fill in all fields";
    } else {
        $password = md5($password);
        $query = "INSERT INTO `users` (`c_id`, `first_name`, `other_names`, `email`, `national_id`, `Profession`, `password`, `role`) 
        VALUES (NULL, '$firstName', '$secondName', '$email', '$NId', '$prof', '$password', '$roles')";

        $run_query=mysqli_query($con,$query);
      
      if($run_query){
          $msg = "Client Added Successfuly";
          $css_cls = "alert-success";
      }
      else{
        $msg = "Registration Failed! Try again later.";
        $css_cls = "alert-danger";
      }
    }
}

if(isset($_POST['delete']))
{
  // sql to delete a record
  $delete_id = $_POST['delete_id'];
  $sql = "DELETE FROM users WHERE c_Id='$delete_id' ";
  $run_del=mysqli_query($con,$sql);
  if ($run_del) {
    //   echo '<script>window.location.href="client.php"</script>';
      $msg_del = "Client Deleted Succesfully";
      $del_css_cls = "alert-danger";
  } else {
      echo "Error deleting record: " . $con->error;
      $msg_del = "Failure Deleting Client";
      $del_css_cls = "alert-warning";
  }

}
?>