<?php
    include("connection.php");
    include("server.php");
    if(isset($_GET['idDeleteProduct'])){
        $idDeleteItem = $_GET['idDeleteProduct'];
        $sql = "delete from products where product_id='$idDeleteProduct'";
        if($conn->query($sql)===true) {
            header("location: products.php");
        }
        else { ?>
            <script>
                alert("failed to delete");
                window.location.href='products.php';
            </script>
            <?php
            echo "failed to delete";
        }
    }
    if(isset($_POST['update_product'])) {
        $updateID = $_POST['productId'];
        $productName = "";
        $productPrice = "";
        $productDescription = "";
        $productName = $_POST['productName'];
        $productPrice = $_POST['productPrice'];
        $productDescription = $_POST['productDescription'];
        $sql = "UPDATE products SET product_name= '$productName', product_price= '$productPrice', product_description='$productDescription' WHERE product_id = '$updateID'";
        if($conn->query($sql)===TRUE) {?>
            <script>
            alert("sucessfull updated");
            </script><?php
            header("location: products.php");
        }
        else {?>
            <script>
            alert("Failed to update");
            </script><?php
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="wagad/js/bootstrap.min.js"></script>
    <?php include("connection.php"); ?>
    
    <?php include("dashboardLinks.php"); ?>
    <?php include("links.php"); ?>
    <style>
        .head {
            text-align:center;
            font-size:18pt;
        }
        #panel {
            background-color: #0C2D4E;
        }
        #btn-right {
            float:right;
        }
        .table th {
            background-color: #0C2D4E;
            color: #fff;
            text-align: center;
        }
        .modal-body {
            background-color: #F0F0F0;
        }
        .modal-header {
            background-color: #0C2D4E;
            color: white;
            text-align: center;
        }
    </style>
</head>
<body class="hold-transition skin-red sidebar-mini" onload="timing()">
    <div class="wrapper">
        <?php include("header.php"); ?>
    <?php include("menu.php"); ?>
    <?php include("dashboardContent.php"); ?>
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-sm-12">
                <a href="additem.php" id="btn-right"><button class="btn btn-info"><i class=" fa fa-plus-circle fa-lg"></i> Add Product</button></a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <?php include("searchProduct.php"); ?>
            </div> 
        </div>
        
    </div>
    
    </div>
    <?php include("dashboardContentFooter.php"); ?>
    <?php include("footer.php"); ?>  
</body>

</html>