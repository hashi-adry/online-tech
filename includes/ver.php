<?php
  @session_start();
    include 'db-conn.php';
    $message = "";
    $firstName=$secondName=$NId=$email=$password=$confirm_password=$error="";
    $firstName_error=$secondName_error=$NId_error=$email_error=$password_error=$confirm_password_error=$error="";


if ($_SERVER['REQUEST_METHOD']=='POST') {
    $input_username=trim($_POST['username']);
    if (empty($input_username)) {
        $username_error="Username is required";
    }else{
        $sql="SELECT * FROM users WHERE username='$input_username'";
        $exQuery=mysqli_query($conn,$sql);

        if ($exQuery) {
            if (mysqli_num_rows($exQuery)>0) {
                $username_error="Username already exists";
            }else{
                $username=$input_username;
            }
        }else{
            echo "query failed";

        }
    }
    $input_NId=trim($_POST['national_id']);
if (empty($input_email)) {
    $NId_error="national id is required";
}else{
    $NId=$input_NId;
}
     $input_email=trim($_POST['email']);
if (empty($input_email)) {
    $email_error="email is required";
}else{
    $email=$input_email;
}

$input_password=trim($_POST['password']);
if (empty($input_password)) {
    $password_error="password is required";
}else{
    $password=$input_password;
}

$input_confirm_password=trim($_POST['confirm_password']);
if (empty($input_confirm_password)) {
    $confirm_password_error="confirm password is required";
}else{
    $confirm_password=$input_confirm_password;
    if (empty($password_error) && $password !=$confirm_password) {
        $confirm_password_error="Password do not match";
    }
    
}
if (empty($username_error) && empty($NId_error) && empty($email_error) && empty($password_error) && empty($confirm_password_error) && empty($gender_error) && empty($address_error) && empty($telephone_error)) {
    $hashed_password=password_hash($password, PASSWORD_DEFAULT);
    $sql="INSERT INTO users(username,email,password,gender,address,telephone) VALUES('$username','$email','$hashed_password','$gender','$address','$telephone')";
    if (mysqli_query($conn,$sql)) {
        header("location:client/index.php");
        exit();
    }else{
        echo "Error creating account" .mysqli_error($conn);
    }
}else{
    echo "Field errors";
}

}

   
    
    
    if(isset($_POST['save'])){
        $firstName=$con->real_escape_string($_POST['first_name']);
        $secondName=$con->real_escape_string($_POST['second_name']);
        $email=$con->real_escape_string($_POST['email']);
        $NId=$con->real_escape_string($_POST['national_id']);
            $password_1=$con->real_escape_string($_POST['password_1']);
        $password_2=$con->real_escape_string($_POST['password_2']);
            $roles=$con->real_escape_string($_POST['role']);
           

            
            if(empty($email && $password_1 )){          
                $error="Please fill in all fields";
            }
              if($password_1!=$password_2){     
              echo $error="
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>The two password are not matching 
                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                  </button>
                </div>";
              } 
                else{
                $password = md5($password_1);
                $query = "INSERT INTO `users` (`c_id`, `first_name`, `second_name`, `email`, `national_id`, `password`, `role`) 
                VALUES (NULL, '$firstName', '$secondName', '$email', '$NId', '$password', '$roles')";
     
                $run_query=mysqli_query($con,$query);
              
              if($run_query){
                  echo 'success';
                  $_SESSION['email']=$email;
                    $_SESSION['success']= "You have susseccully logged in";
                    header('location:client/index.php');
              }
              else{
                  echo $con->error;
              }
          
            
        
                }
    }
        
        //login
        if(isset($_POST['login'])){
            $email=$con->real_escape_string($_POST['email']);
            $password=$con->real_escape_string($_POST['password']);   
            if(empty($email && $password)){
                $error="Please fill in all fields";
           }
           else{
               $password=md5($password);
               $query="SELECT * FROM client WHERE email='$email' AND password='$password'";
               $result=mysqli_query($con, $query);
               if(mysli_num_rows($result)==1){

                $_SESSION['email']=$email;
                $_SESSION ['success']="Your are loggen in";
                header('location:client/index.php');
               }else{
                   $error="Unsuccesfull";
               }
           }
        }

        //logout
        if(isset($_GET['logout'])){
         session_destroy();
         unset($_SESSION['email']);
         header('location:index.php');

        }

?>
