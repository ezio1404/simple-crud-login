<?php
include '../model/dbconn.php';

$id = $_GET["id"];
deleteProd(array($id));
header("location:../view/product.php");

