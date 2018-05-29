<?php
include '../model/dbconn.php';

if(isset($_POST['addProd'])){
    $name=htmlentities($_POST['name']);
    $desc=htmlentities($_POST['desc']);
    $price=htmlentities($_POST['price']);
    $data=array($name,$desc,$price);
    insertProd($data);
    header("Location:../view/product.php");
}
if(isset($_POST['updateProd'])){
    $id=$_GET['id'];
    $name=htmlentities($_POST['name']);
    $desc=htmlentities($_POST['desc']);
    $price=htmlentities($_POST['price']);
    $status=htmlentities($_PPOST['status']);
    $data=array($name,$desc,$price,$status,$id);
    updateProd($data);
    header("Location:../view/product.php");
}
