<?php
session_start();
    function dbconn(){
        try{
            return new PDO("mysql:hostname=localhost;dbname=product_db","root","");
        }catch(PDOExecption $e){
            echo $e->getMessage();
        } 
    }//end dbconn()

    function destroy(){
        return null;
    }//end destroy()

    function login($data){
        $dbconn=dbconn();
        $flag=false;
        $sql="SELECT * FROM tbl_admin where user=? AND pass=?";
        $stmt = $dbconn->prepare($sql);
        $stmt->execute($data);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);     
        if($stmt->rowCount() > 0){
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_info'] = $row['user'];
            $flag=true;
        }else{
           echo "<script> alert('Error'); </script>";
        }
        $dbconn = destroy();
        return $flag;
    }

    function insertProd($data){
        $dbconn=dbconn();
        $sql="INSERT INTO tbl_product(prod_name,prod_desc,prod_price) VALUES(?,?,?)";
        $stmt=$dbconn->prepare($sql);
        $stmt->execute($data);
        $dbconn=destroy();
    }//end insertProduct()

    function getAllProd(){
        $dbconn=dbconn();
        $sql="SELECT * FROM tbl_product WHERE prod_status=1 ";
        $stmt=$dbconn->prepare($sql);
        $stmt->execute();
        $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $dbconn=destroy();
        return $rows;
    }//end getAllprod()

    function getProd($data){
        $dbconn=dbconn();
        $sql="SELECT * FROM tbl_product WHERE prod_id=? AND prod_status=1";
        $stmt=$dbconn->prepare($sql);
        $stmt->execute(array($data));
        $row=$stmt->fetch();
        $dbconn=destroy();
        return $row;
    }//end getProd()

    function updateProd($data){
        $dbconn=dbconn();
        $sql="UPDATE tbl_product SET prod_name=?,prod_desc=?,prod_price=?,prod_status=? WHERE prod_id=?";
        $stmt=$dbconn->prepare($sql);
        $stmt->execute($data);
        $dbconn=destroy();
    }//end updateProd()

    function deleteProd($data){
        $dbconn=dbconn();
        $sql="DELETE FROM tbl_product WHERE prod_id=?";
        $stmt=$dbconn->prepare($sql);
        $stmt->execute($data);
        $dbconn=destroy();
    }//end deleteProd()

    // function offProd($data){
    //     $dbconn=dbconn();
    //     $sql="UPDATE tbl_product SET prod_status=? WHERE prod_id=?";
    //     $stmt=$dbconn->prepare($sql);
    //     $stmt->execute($data);
    //     $dbconn=destroy();
    // }//end offProd()