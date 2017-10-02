<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SAHAL GAS | ADD ITEM</title>
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
                        <h4 class="head">Add Item</h4>
                    </div>
                    <div class="panel-body">         
                        <form action="addItem.php" method="post">
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for="itemname">Item Name:</label>
                                    <input type="text" id="itemname" name="itemname" class="form-control input-group-lg" placeholder="enter item name" >
                                </div>
                                <div class="col-sm-4">
                                    <label for="itemqty">Quantity:</label>
                                    <input type="number" min="0" class="form-control" id="itemqty" name="itemqty" placeholder="enter quantity" />
                                </div>
                                <div class="col-sm-3">
                                    <label for="itemprice">Price:</label>
                                    <input type="number" min="0" class="form-control" id="itemprice" name="itemprice" placeholder="enter price" />
                                </div>
                            </div><br>
                            <div class="form-group">
                                <label for="itemdescription">Item Description:</label>
                                    <textarea name="itemdescription" class="form-control" id="itemdescription" cols="50" rows="10"></textarea>
                            </div><br>
                            <div class="row">
                                <div class="col-sm-offset-3 col-sm-6 col-sm-offset-3">
                                    <button class="btn btn-lg btn-success btn-block" id="btn-save" name="itemregister"><i class="fa fa-save fa-lg"></i> Register</button>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-sm-offset-3 col-sm-6 col-sm-offset-3">
                                    <button type="Reset" class="btn btn-lg btn-danger btn-block" name="itemclear"><i class="fa fa-trash fa-lg"></i> Clear</button>
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