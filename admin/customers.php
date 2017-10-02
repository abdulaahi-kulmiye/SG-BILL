<?php
    include("connection.php");
    include("server.php");
    if(isset($_GET['idDelete'])){
        $idDelete = $_GET['idDelete'];
        $sql = "delete from customers where cus_id='$idDelete'";
        if($conn->query($sql)===true) {
            header("location: customers.php");
        }
        else { ?>
            <script>
                alert("failed to delete");
                window.location.href='customers.php';
            </script>
            <?php
            echo "failed to delete";
        }
    }
    if(isset($_POST['update_customer'])) {
        $updateID = $_POST['cusId'];
        $cusName = "";
        $cusPhone = "";
        $cusAddress = "";
        $cusType = "";
        $cusRegister = "";
        $cusDescription = "";
        $cusName = $_POST['cusName'];
        $cusPhone = $_POST['cusPhone'];
        $cusAddress = $_POST['cusAddress'];
        $cusType = $_POST['cusType'];
        $cusRegister = $_POST['cusRegister'];
        $cusDescription = $_POST['cusDescription'];
        $sql = "UPDATE customers SET cus_name= '$cusName', cus_phone= '$cusPhone', cus_address= '$cusAddress', 
        cus_type='$cusType', cus_register='$cusRegister', cus_description='$cusDescription' WHERE cus_id = '$updateID'";
        if($conn->query($sql)===TRUE) {?>
            <script>
            alert("sucessfull updated");
            </script><?php
            header("location: customers.php");
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
                <a href="addCustomer.php" id="btn-right"><button class="btn btn-info"><i class=" fa fa-plus-circle fa-lg"></i> Add Customer</button></a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <?php include("searchCustomer.php"); ?>
            </div> 
        </div>
    </div>
    </div>
    <?php include("dashboardContentFooter.php"); ?>
    <?php include("footer.php"); ?>  
</body>

</html>