<?php
session_start();
if($_SESSION['tech'])
{
    unset($_SESSION['tech']);
    header('location:../login.php');
}
else
{
    header('location:../login.php');
}


?>