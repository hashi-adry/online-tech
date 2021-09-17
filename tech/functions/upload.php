<?php
$msg = "";
$css_cls = "";
$email = $_SESSION['tech'];

$conn = mysqli_connect('localhost', 'root', '', 'Online-technician');
if (isset($_POST['save-details'])) {
  
    $bio = $_POST['bio'];
    $profileImage = time() . '_' . $_FILES['ProfileImage']['name'];
  
    $target = '../Images/' . $profileImage;
  
    if (move_uploaded_file($_FILES['ProfileImage']['tmp_name'], $target)) {
        // $sql = "INSERT INTO users (brief_desc, image) VALUES ('$bio', '$profileImage') WHERE c_Id=5";
        $sql = "UPDATE users SET brief_desc='$bio' ,image='$target' WHERE email='$email'";
        if (mysqli_query($conn, $sql)){
            $msg = "Profile Successfuly uploaded to Database";
            $css_cls = "alert-success";
        } else{
            $msg = "Failed to Upload Profile Picture";
            $css_cls = "alert-danger";
        }

    } else {

    }
  }
?>