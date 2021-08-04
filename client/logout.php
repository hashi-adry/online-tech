<?php
session_start();
if($_SESSION['client'])
{
    unset($_SESSION['client']);
    header('location:../login.php');
}
else
{
    header('location:../login.php');
}


?>