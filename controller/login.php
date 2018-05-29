<?php
include '../model/dbconn.php'; 

if(isset($_POST['login'])){
    $user=htmlentities($_POST['user']);
    $pass=htmlentities($_POST['pass']);
    // $user="test";
    // $pass="test";
    $data=array($user,$pass);
    $ok=login($data);
    if($ok){
        header("Location:../view/product.php?id=".$_SESSION['user_id']."?user=".$_SESSION['user_info']);
    }
    else{
        header("Location:../index.php?Invalid_Credentials");
    }
}