<?php
  @session_start();
	include 'db-conn.php';
	$message = "";
     $firstName=$secondName=$NId=$email=$password_1=$password_2=$error="";
   
    
	
	if(isset($_POST['save'])){
        $firstName=$con->real_escape_string($_POST['first_name']);
        $secondName=$con->real_escape_string($_POST['second_name']);
        $email=$con->real_escape_string($_POST['email']);
        $NId=$con->real_escape_string($_POST['national_id']);
		    $password_1=$con->real_escape_string($_POST['password_1']);
        $password_2=$con->real_escape_string($_POST['password_2']);
		    $roles=$con->real_escape_string($_POST['role']);
            $dob=$con->real_escape_string($_POST['dob']);
            $county=$con->real_escape_string($_POST['county']);
            $city=$con->real_escape_string($_POST['city']);
            $estate=$con->real_escape_string($_POST['estate']);
            $postal_code=$con->real_escape_string($_POST['postal_code']);
            $profession=$con->real_escape_string($_POST['profession']);
            $brief_desc=$con->real_escape_string($_POST['brief_desc']);
            $image=$con->real_escape_string($_POST['image']);
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
                $query = "INSERT INTO `users` (`c_id`, `first_name`, `other_names`, `email`, `national_id`, `password`, `role`,'dob','county','city','estate','postal_code','profession','brief_desc','image') 
                VALUES (NULL, '$firstName', '$secondName', '$email', '$NId', '$password', '$roles','$dob','$county','$city','$estate','$postal_code','$profession','$brief_desc','$image')";
     
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