<?php
$conn = mysqli_connect('localhost', 'root', '', 'gft');
if(isset($_POST['block'])){
    $block="UPDATE `users` SET `blk_status`=[1] WHERE 1"

}
?>