<?php
    include("connection.php");
    include("server.php");
    if(isset($_GET['idDeleteDriver'])){
        $idDeleteDriver = $_GET['idDeleteDriver'];
        $sql = "delete from drivers where driver_id='$idDeleteDriver'";
        if($conn->query($sql)===true) {
            header("location: drivers.php");
        }
        else { ?>
            <script>
                alert("failed to delete");
                window.location.href='drivers.php';
            </script>
            <?php
            echo "failed to delete";
        }
    }
    if(isset($_POST['update_driver'])) {
        $updateID = $_POST['driverId'];
        $driverName = "";
        $driverPhone = "";
        $driverDescription = "";
        $driverName = $_POST['driverName'];
        $driverPhone = $_POST['driverPhone'];
        $driverDescription = $_POST['driverDescription'];
        $sql = "UPDATE drivers SET driver_name= '$driverName', driver_phone= '$driverPhone', driver_description='$driverDescription' WHERE driver_id = '$updateID'";
        if($conn->query($sql)===TRUE) {?>
            <script>
            alert("sucessfull updated");
            </script><?php
            header("location: drivers.php");
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
                <a href="adddriver.php" id="btn-right"><button class="btn btn-warning"><i class=" fa fa-plus-circle fa-lg"></i> Add Driver</button></a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <?php include("searchDriver.php"); ?>
            </div> 
        </div>
        
    </div>
    
    </div>
    <?php include("dashboardContentFooter.php"); ?>
    <?php include("footer.php"); ?>  
</body>

</html>