<?php
include '../model/dbconn.php';

if(isset($_POST['addProd'])){
    $name=htmlentities($_POST['name']);
    $desc=htmlentities($_POST['desc']);
    $price=htmlentities($_POST['price']);
    // $test = $_POST;
    // foreach($test as $key){
    //     if($key!="")
    //     $flag=true;
    // }

    // $name="nails";
    // $desc="1/2 inches";
    // $price=10.50;

    $data=array($name,$desc,$price);
    insertProd($data);
    header("Location:../view/product.php");
}