<?php
    include("connection.php");
    include("server.php");
    if(isset($_GET['idDeleteItem'])){
        $idDeleteItem = $_GET['idDeleteItem'];
        $sql = "delete from items where item_id='$idDeleteItem'";
        if($conn->query($sql)===true) {
            header("location: items.php");
        }
        else { ?>
            <script>
                alert("failed to delete");
                window.location.href='items.php';
            </script>
            <?php
            echo "failed to delete";
        }
    }
    if(isset($_POST['update_item'])) {
        $updateID = $_POST['itemId'];
        $itemName = "";
        $itemQty = "";
        $itemPrice = "";
        $itemDescription = "";
        $itemName = $_POST['itemName'];
        $itemPhone = $_POST['itemQty'];
        $itemPhone = $_POST['itemPrice'];
        $itemDescription = $_POST['itemDescription'];
        $sql = "UPDATE items SET item_name= '$itemName', item_qty= '$itemQty', item_price= '$itemPrice',item_description='$itemDescription' WHERE item_id = '$updateID'";
        if($conn->query($sql)===TRUE) {?>
            <script>
            alert("sucessfull updated");
            </script><?php
            header("location: items.php");
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
                <a href="additem.php" id="btn-right"><button class="btn btn-info"><i class=" fa fa-plus-circle fa-lg"></i> Add Item</button></a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <?php include("searchItem.php"); ?>
            </div> 
        </div>
        
    </div>
    
    </div>
    <?php include("dashboardContentFooter.php"); ?>
    <?php include("footer.php"); ?>  
</body>

</html>