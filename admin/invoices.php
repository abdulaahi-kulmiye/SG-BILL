<?php
    include("connection.php");
    include("server.php");
    if(isset($_GET['idDeleteInvoice'])){
        $idDelete = $_GET['idDeleteInvoice'];
        $sql = "delete from invoices where invoice_id='$idDelete'";
        if($conn->query($sql)===true) {
           // header("location: invoices.php");
        }
        else { ?>
            <script>
                alert("failed to delete");
                //window.location.href='invoices.php';
            </script>
            <?php
            echo "failed to delete";
        }
    }
    if(isset($_POST['update_invoice'])) {
        $updateID = $_POST['invoiceId'];
        $invoiceName = "";
        $invoiceDate = "";
        $invoiceNo = "";
        $invoiceItem = "";
        $invoiceQty = "";
        $invoicePrice = "";
        $invoiceTotal = "";
        $invoiceName = $_POST['invoiceName'];
        $invoiceDate = $_POST['invoiceDate'];
        $invoiceNo = $_POST['invoiceNo'];
        $invoiceItem = $_POST['invoiceItem'];
        $invoiceQty = $_POST['invoiceQty'];
        $invoicePrice = $_POST['invoicePrice'];
        $invoiceTotal = $_POST['invoiceTotal'];
        $sql = "UPDATE invoices SET cus_name= '$invoiceName', invoice_no= '$invoiceNo', item_name= '$invoiceItem', 
        item_quantity='$invoiceQty', item_price='$invoicePrice', item_total='$invoiceTotal', invoice_date='$invoiceDate' WHERE invoice_id = '$updateID'";
        if($conn->query($sql)===TRUE) {?>
            <script>
            alert("sucessfull updated");
            </script><?php
            //header("location: invoices.php");
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
        .list-unstyled {
            background-color: #666B98;
            color: #fff;
            cursor: pointer;
        }
        .list-unstyled li {
            padding: 12px;
        }
        .list-unstyled li:hover {
            background-color: #fff;
            color: #666B98;
        }
    </style>
</head>
<body class="hold-transition skin-green sidebar-mini" onload="timing()">
    <div class="wrapper">
        <?php include("header.php"); ?>
    <?php include("menu.php"); ?>
    <?php include("dashboardContent.php"); ?>
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-sm-12">
                <a href="addInvoice.php" id="btn-right"><button class="btn btn-info"><i class=" fa fa-plus-circle fa-lg"></i> Add Invoice</button></a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <?php include("searchInvoice.php"); ?>
            </div> 
        </div>
    </div>
    </div>
    <?php include("dashboardContentFooter.php"); ?>
    <?php include("footer.php"); ?>  
</body>

</html>