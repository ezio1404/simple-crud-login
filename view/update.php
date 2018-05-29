<?php
session_start();
include '../model/dbconn.php'; 
if($_SESSION){
    $row=getProd($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/datatable.css">
</head>
<body>
                <div class="container">
                    <form action="../controller/updateProd.php" method="post">
                        <input type="number" class="form-control" name="id" id="id" placeholder="Product id" value=<?php echo $row['prod_id'];?>>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Product name" value=<?php echo $row['prod_name'];?>>
                        <input type="text" class="form-control" name="desc" id="desc" placeholder="Product Description" value=<?php echo $row['prod_desc'];?>>
                        <input type="number" class="form-control" name="price" id="price" placeholder="Product Price" value=<?php echo $row['prod_price'];?>>
                        <input type="number" class="form-control" name="Status" id="Status" placeholder="Product Status" value=<?php echo $row['prod_status'];?>>
                        <input type="submit" class="btn btn-primary" value="Add Product" name="updateProd">
                    </form>
                </div>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/datatable.js"></script>
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>
<?php
}else{
    header("location:../index.php?Please_login");
}?>