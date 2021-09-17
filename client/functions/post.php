<?php
  @session_start();
	include '../includes/db-conn.php';

//  $skillNeeded = $_POST('skill_needed');
  //$payment = $_POST('payment_method');

	$message = "";
     $jobName=$jobDescription=$skillNeeded=$payment=$status=$error="";

     $email=$_SESSION['client'];
     $user = mysqli_query($con, "SELECT * FROM users WHERE `email`='$email'");
     while($get_user = mysqli_fetch_assoc($user))
     {
         $fname=$get_user['first_name'];
         $sname=$get_user['second_name'];
         $names = $fname.' '.$sname;

     }

	if(isset($_POST['post'])){
        $jobName=$con->real_escape_string($_POST['job_name']);
        $jobDescription=$con->real_escape_string($_POST['job_description']);
        $skillNeeded=$con->real_escape_string($_POST['skill_needed']);
        $payment=$con->real_escape_string($_POST['payment_method']);
        $status=0;
            if(empty($jobName && $skillNeeded )){
                $error="Please fill in all fields";
            }
		        else{
                $query = "INSERT INTO `job` (`J_Id`, `job_name`, `job_description`, `skill_needed`, `assigned_by`, `assigned_to`, `payment_method`, `job_status`)
                VALUES (NULL, '$jobName', '$jobDescription', '$skillNeeded', '$names', '', '$payment', '$status')";

                $run_query=mysqli_query($con,$query);

              if($run_query){
                $msg = "Job Posted Successfully";
                $css_cls = "alert-success";
              }
              else{
                $msg = "Oop! Job failed to Upload. Try again later.";
                $css_cls = "alert-danger";
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
                $_SESSION ['success']="Your are logged in";
                header('location:client/index.php');
               }else{
                   $error="Unsuccessfull";
               }
           }
        }


?>
