<?php
include '../model/dbconn.php'; 
if($_SESSION){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/datatable.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <form action="../controller/logout.php" method="post">
               <input class="btn btn-danger" type="submit" name="logout" id="logout" value="Logout">
            </form>
        </div>
        <div class="row">
            <div class="col">
                <table class="table" id="myTable">
                    <thead>
                        <th>Product Id</th>
                        <th>Product Name</th>
                        <th>Product Desc</th>
                        <th>Product Price</th>
                        <th>Product Status</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                    <?php
                        $products=getAllProd();
                        foreach( $products as $prod){
                    ?>
                        <tr>
                        <?php
                            foreach($prod as $p){
                        ?>
                            <td><?php echo $p?></td>
                            <?php }?>
                            <td><a class="btn" href="update.php?id=<?php echo $prod['prod_id'];?>">Update</a>
                            <a class="btn" href="../controller/deleteProd.php?id=<?php echo $prod['prod_id'];?>">Delete</a></td>
                        </tr>
                    <?php
                        }
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="col">
                <div class="container">
                    <form action="../controller/addProd.php" method="post">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Product name">
                        <input type="text" class="form-control" name="desc" id="desc" placeholder="Product Description">
                        <input type="number" class="form-control" name="price" id="price" placeholder="Product Price">
                        <input type="submit" class="btn btn-primary" value="Add Product" name="addProd">
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/datatable.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
    </script>
</body>
</html>
<?php
}else{
    header("location:../index.php?Please_login");
}?>