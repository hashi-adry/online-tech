<?php
$conn = mysqli_connect('localhost', 'root', '', 'gft');

if(isset($_POST['delete'])){
    // sql to delete a record
    $delete_id = $_POST['delete_id'];
    $sql = "DELETE FROM users WHERE c_Id='$delete_id' ";
    if ($conn->query($sql) === TRUE) {
        echo '<script>window.location.href="index.php"</script>';
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>