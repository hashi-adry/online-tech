<?php
$conn = mysqli_connect('localhost', 'root', '', 'Online-technician');
if(isset($_POST['block'])){
    $block="UPDATE `users` SET `blk_status`=[1] WHERE 1"

}
?>