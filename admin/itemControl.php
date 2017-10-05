<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Driver Items</title>    
    <script src="wagad/js/bootstrap.min.js"></script>
    <?php include("connection.php"); ?>
    <?php include("server.php"); ?>
    <?php include("dashboardLinks.php"); ?>
    <?php include("links.php"); ?>
    <?php include("driverDB.php"); ?>
    <style>
        
    </style>
</head>
<body class="hold-transition skin-green sidebar-mini" onload="timing()">
    <div class="wrapper">
        <?php include("header.php"); ?>
        <?php include("menu.php"); ?>
        <?php include("dashboardContent.php"); ?>
        <div class="row">
            <div class="col-sm-offset-1 col-sm-10 col-sm-offset-1">
                <div class="panel panel-primary">
                    <div class="panel-heading" id="panel">
                        <h3 class="head">Driver Items</h3>
                    </div>
                    <div class="panel-body">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="Quantity">Item quantity</label>
                                    <input type="number" name="Quantity" id="Quantity" class="form-control" />
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-sm-offset-4 col-sm-4 col-sm-4">
                                    <button type="submit" name="btnSave" id="btnSave" class="btn btn-danger btn-lg btn-block">Save</button>
                                </div>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script>
    $(document).ready(function(){
        $("#Quantity").change(function(){
            var qty = $(this).val();
            if(qty != ''){
                $.ajax({
                    url:"driverDB.php",
                    method:"POST",
                    data:{qty:qty},
                    success:function(data){
                        alert(data);
                    }
                })
            }
        })
    });
</script>