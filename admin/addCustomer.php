<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SAHAL GAS | ADD CUSTOMER</title>
    <script src="wagad/js/bootstrap.min.js"></script>
    <?php include("connection.php"); ?>
    <?php include("server.php"); ?>
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
        .form-control {
            border-color: #00B7C3;
        }
        .panel-body {
            background-color: #F0F0F0;
        }
        #btn-save {
            background-color: #0C2D4E;
            color: white;
        }
        #btn-save:hover {
            background-color: white;
            color: #0C2D4E;
            border: 2px solid #0C2D4E;
            font-weight: bold;
            -webkit-transition: linear 1s ;
            -moz-transition: linear 1s ;
            transition: linear 1s ;
        }
    </style>
</head>
<body class="hold-transition skin-red sidebar-mini" onload="timing()">
    <div class="wrapper">
    <?php include("header.php"); ?>
    <?php include("menu.php"); ?>
    <?php include("dashboardContent.php"); ?>
        <div class="row">
            <div class="col-sm-offset-1 col-sm-10 col-sm-offset-1">
                <div class="panel panel-primary">
                      <div class="panel-heading" id="panel">
                      <h4 class="head">Add customer</h4>
                    </div>
                    <div class="panel-body">         
                        <form action="addCustomer.php" method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                <label for="cusname">Customer Name:</label>
                                    <input type="text" id="cusname" name="cusname" class="form-control input-group-lg" placeholder="enter customer name" >
                                </div>
                                <div class="col-sm-6">
                                <label for="cusphone">Customer Phone:</label>
                                    <input type="tel" id="cusphone" class="form-control" name="cusphone" placeholder="enter customer phone">
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-sm-6">
                                <label for="cuscity">Customer City:</label>
                                    <input type="text" required id="cuscity" name="cuscity" class="form-control input-group-lg" placeholder="enter customer city" >
                                </div>
                                <div class="col-sm-6">
                                <label for="cuszone">Customer Zone:</label>
                                    <input type="tel" required id="cuszone" class="form-control" name="cuszone" placeholder="enter customer zone">
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="cusaddress">Customer Address:</label>
                                    <input type="text" required id="cusaddress" class="form-control" name="cusaddress" placeholder="enter customer address">
                                </div>
                                <div class="col-sm-6">
                                <label for="custype">Customer Type:</label>
                                    <select name="custype" id="" class="form-control">
                                        <option value="home use">Home use</option>
                                        <option value="business use">Business use</option>
                                    </select>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="cusregister">Registered by:</label>
                                        <select name="cusregistered" id="" class="form-control">
                                        <?php
                                            $sql = "select driver_name from drivers";
                                            $result = $conn->query($sql);
                                            if($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) { ?>
                                            <option value="<?php echo $row['driver_name']; ?>"><?php echo $row['driver_name']; ?></option>
                                            <?php }
                                            }
                                        ?>
                                        </select>
                                </div>
                                <div class="col-sm-offset-6">
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-sm-12">
                                    <label for="cusdesc">Customer Description:</label>
                                    <textarea id="cusdesc" required name="cusdesc" class="form-control" id="" cols="50" rows="5"></textarea>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-sm-offset-3 col-sm-6 col-sm-offset-3">
                                    <button id="btn-save" class="btn btn-lg btn-success btn-block" name="cusregister"><i class="fa fa-save fa-lg"></i> Register</button>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-sm-offset-3 col-sm-6 col-sm-offset-3">
                                    <button type="Reset" class="btn btn-lg btn-danger btn-block" name="cusclear"><i class="fa fa-trash fa-lg"></i> Clear</button>
                                </div>
                            </div>
                        </form> 
                    </div>
                  
                        

                </div>
            </div>
        </div>
    </div>
    <?php include("dashboardContentFooter.php"); ?>
    <?php include("footer.php"); ?>  
</body>
</html>