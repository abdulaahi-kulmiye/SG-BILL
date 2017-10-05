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
        #DriverNameList{
            background-color: #333;
            color: white;
            cursor: pointer;
        }
        .drive{
            padding:5px;
        }
        .drive:hover{
            background-color: white;
            color: #333;
        }
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
                                <div class="col-sm-6 col-sm-offset-3">
                                    <label for="driverName">Driver Name</label>
                                    <input type="text" class="form-control" name="driverName" id="driverName" autocomplete="off" />
                                    <div id="DriverNameList"></div>
                                </div>
                                <div class="col-sm-3">
                                    <label for="driverDate">Date</label>
                                    <input type="date" class="form-control" name="driverDate" />
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-sm-5">
                                    <label for="driveritemName">Item Name</label>
                                    <input type="text" name="driveritemName" class="form-control" />
                                </div>
                                <div class="col-sm-2">
                                    <label for="driveritemQty"></label>
                                    <input type="number" class="form-control" name="driveritemQty" id="driveritemQty" />
                                </div>
                                <div class="col-sm-2">
                                    <label for="driveritemPrice"></label>
                                    <input type="number" class="form-control" name="driveritemPrice" id="driveritemPrice" />
                                </div>
                                <div class="col-sm-3">
                                    <label for="driveritemTotal"></label>
                                    <input type="number" class="form-control" name="driveritemTotal" id="driveritemTotal" />
                                </div>
                            </div><br><br>
                            <div class="row">
                                <div class="col-sm-offset-6 col-sm-2">
                                    <button type="submit" name="driverbtnNew" id="driverbtnNew" class="btn btn-success btn-block">Save & Close</button>
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" name="driverbtnSave" id="driverbtnSave" class="btn btn-info btn-block">Save & New</button>
                                </div>
                                <div class="col-sm-2">
                                    <button type="reset" name="driverbtnReset" class="btn btn-danger btn-block">Clear</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>
<script>
    $(document).ready(function(){
        $("input").change(function(){
            var mult = 0;
            $("#driveritemQty").each(function(){
                mult = parseFloat($("#driveritemQty").val()) * parseFloat($("#driveritemPrice").val());
            });
            $("#driveritemTotal").val(mult);
        });
        $("#driverName").keyup(function(){
            var query = $(this).val();
            if(query != ''){
                $.ajax({
                    url:"driverDB.php",
                    method:"POST",
                    data:{query:query},
                    success:function(data){
                        $("#DriverNameList").fadeIn();
                        $("#DriverNameList").html(data);
                    }
                });
            }
        });
        $(document).on("click", "li", function(){
            $("#driverName").val($(this).text());
            $("#DriverNameList").fadeOut();
        })
    });
</script>