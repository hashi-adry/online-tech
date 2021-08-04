<?php
$firstName=$secondName=$NId=$email=$password=$roles=$error="";
$conn = mysqli_connect('localhost', 'root', '', 'gft');
  if(isset($_POST['save_admin'])){
    $firstName=$con->real_escape_string($_POST['first_name']);
    $secondName=$con->real_escape_string($_POST['second_name']);
    $email=$con->real_escape_string($_POST['email']);
    $NId=$con->real_escape_string($_POST['national_id']);
    $password_1=$con->real_escape_string($_POST['password']);
    $roles="Admin";

  $password = md5($password_1);
  $query = "INSERT INTO `users` (`c_id`, `first_name`, `other_names`, `email`, `national_id`, `password`, `role`) 
  VALUES (NULL, '$firstName', '$secondName', '$email', '$NId', '$password', '$roles')";

  $run_query=mysqli_query($con,$query);
      if ($run_query){
        $msg = "GFT Admin added successfuly";
        $css_cls = "alert-success";
    } else{
        $msg = "Admin registration failed";
        $css_cls = "alert-danger";
    }
}

?>