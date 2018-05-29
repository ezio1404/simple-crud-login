
<?php
include '../model/dbconn.php'; 

if(isset($_POST['logout'])){
session_destroy();
unset($_SESSION['user_id']);
unset($_SESSION['user_info']);
header("location:../index.php");
}
?>