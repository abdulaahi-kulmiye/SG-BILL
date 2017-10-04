<?php 
    include("connection.php");
    if(isset($_GET["no"])) {
        $sql = "SELECT invoice_no FROM invoices ORDER BY invoice_id DESC LIMIT 1";
        $do = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($do);
        if($count > 0) {
            while($row = mysqli_fetch_array($do)) {
                echo $row["invoice_no"];
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoices</title>    
    <script src="wagad/js/bootstrap.min.js"></script>
    <?php include("connection.php"); ?>
    <?php include("server.php"); ?>
    <?php include("dashboardLinks.php"); ?>
    <?php include("links.php"); ?>
    <?php include("priceSearch.php"); ?>
    <?php include("scripts.php"); ?>
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
<body>
    <body class="hold-transition skin-green sidebar-mini" onload="timing()">
    <div class="wrapper">
        <?php include("header.php"); ?>
        <?php include("menu.php"); ?>
        <?php include("dashboardContent.php"); ?>
        <div class="row">
            <div class="col-sm-offset-1 col-sm-10 col-sm-offset-1">
                <div class="panel panel-primary">
                    <div class="panel-heading" id="panel">
                        <h3 class="head">Invoices</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post">
                            <div class="row">
                                <div class="col-sm-offset-7 col-sm-3">
                                    <label for="invoiceDate">Date</label>
                                    <div class="form-group">
                                        <div class='input-group date' id='datetimepicker1' data-date-format="yyyy-mm-dd">
                                            <input type="text" name="invoiceDate" autocomplete="off" id="datepicker" class="form-control">        
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <script type="text/javascript">
                                        $(function () {
                                            $('#datetimepicker1').datetimepicker();
                                        });
                                    </script>
                                </div>
                                <div class="col-sm-2">
                                    <label for="invoiceNo">Invoice NO</label>
                                    <input type="text" name="invoiceNo" autocomplete="off" id="invoiceNo" class="form-control" />
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-sm-7">
                                    <label for="invoiceName">Customer Name</label>
                                    <input type="text" name="invoiceName" autocomplete="off" id="invoiceName" class="form-control">
                                    <div id="invoiceNameList"></div>
                                </div>
                                <div class="col-sm-offset-5">
                                </div>
                            </div><br>
                            <script>
                                /// waa midka sameynaya dropdown items-ka
                                /*$(document).ready(function(){
                                    $("#invoiceItem").on("change", function(){
                                        var ItemID = $(this).val();
                                        if(ItemID){
                                            $.get(
                                                "priceSearch.php",
                                                {invoiceItem: ItemID},
                                                function(data){
                                                    $("#invoicePrice").val(data);
                                                }
                                            );
                                            
                                        }
                                        else{
                                            $("#invoicePrice").html("enter");
                                        }
                                    });
                                });*/
                            </script>
                            <!-- <div class="row">
                                <div class="col-sm-5">
                                    <label for="invoiceItem">Item name</label>
                                    <select name="invoiceItem" id="invoiceItem" class="form-control">
                                        </*?php
                                            $sql = "select product_name from products";
                                            $result = $conn->query($sql);
                                            if($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) { ?>*/
                                            <option value="<//?php echo $row['product_name']; ?>"><//?php echo $row['product_name']; ?></option>
                                            <//?php }
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <label for="invoiceQty">Quantity</label>
                                    <input type="number" name="invoiceQty" autocomplete="off" id="invoice" class="form-control">
                                </div>
                                <div class="col-sm-2">
                                    <label for="invoicePrice">Price</label>
                                    <input type="number" name="invoicePrice" autocomplete="off" id="invoicePrice" class="form-control" min="0">
                                </div>
                                <div class="col-sm-3">
                                    <label for="invoiceTotal">Total</label>
                                    <input type="number" name="invoiceTotal" autocomplete="off" id="invoiceTotal" class="form-control disable" min="0">
                                </div>
                            </div><br> -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered" id="crud_table">
                                        <tr>
                                            <th>Item Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Total</th>
                                            <th></th>
                                        </tr>
                                        <tr id="bb">
                                            <td contenteditable="true" name="itemName" class="itemName" id="itemSearch"></td>
                                            <td contenteditable="true" id="invoiceQty" class="itemQty"></td>
                                            <td contenteditable="true" id="invoicePrice" class="itemPrice"></td>
                                            <td contenteditable="true" id="invoiceTotal" class="itemTotal"></td>
                                        </tr>
                                        
                                    </table>
                                    <div id="NameCustomerList" style="background-color:red; color:white; width: 300px;"></div>
                                    <div align="right">
                                        <button type="button" id="addMore" class="btn btn-warning">Add More</button>
                                    </div>
                                    <div align="center">
                                        <!-- <button type="button" id="save" name="save" class="btn btn-primary">Save</button> -->
                                    </div>
                                </div>                                
                            </div><br><br>
                            <div class="row">
                                <div class="col-sm-offset-6 col-sm-2">
                                    <button type="submit" name="invoiceSave" id="invoiceSave" class="btn btn-success btn-block">Save & Close</button>
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" name="invoiceSave" id="invoiceNew" class="btn btn-info btn-block">Save & New</button>
                                </div>
                                <div class="col-sm-2">
                                    <button type="reset" name="invoiceReset" class="btn btn-danger btn-block">Clear</button>
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

<script>
    /* for outocomplete the customer name */
    $(document).ready(function(){
    /* wuxuu soo taxayaa liiska macaamiisha diiwan gishan */
        $("#invoiceName").keyup(function(){
            var query = $(this).val();
            if(query != ''){
                $.ajax({
                    url:"searchInvoiceCustomer.php",
                    method: "POST",
                    data:{query:query},
                    success:function(data){
                        $("#invoiceNameList").fadeIn();
                        $("#invoiceNameList").html(data);
                    }
                });
            }
        });
         $(document).on("click", "#customer", function(){
            $("#invoiceName").val($(this).text());
            $("#invoiceNameList").fadeOut();
        });
        $(document).on("click", function(){
            $("#invoiceNameList").fadeOut();
        });
    /* halkan buu ku dhamaada code-ka customers-ka soo akhrinaya
    /*=====================================================================*/
    /**************************************************************************/
    /*=====================================================================*/

    /* wuxuu soo taxayaa liiska alaabta diiwan gishan */
        $(".itemName").keyup(function(){
            var searchs = $(this).text();
            if(searchs != ''){
                $.ajax({
                    url:"scripts.php",
                    method: "POST",
                    data:{searchs:searchs},
                    success:function(data){
                        $("#NameCustomerList").fadeIn();
                        $("#NameCustomerList").html(data);
                    }
                });
            }
        });
        $(document).on("click", "#item", function(){
            $("#itemSearch").text($(this).text());
            $("#NameCustomerList").fadeOut();
        });
        $(document).on("click", function(){
            $("#NameCustomerList").fadeOut();
        });

        //$("#invoiceItem").on("change", function(){
        $("document").on("click", "#item", function(){
            //var ItemID = $(this).text();
            var ItemID = $("#itemSearch").text($(this).text());
            alert("hjhj");
            if(ItemID){
                $.get(
                    "priceSearch.php",
                    {item: ItemID},
                    function(data){
                        //$(".itemPrice").text(data);
                        alert(data);
                    }
                );
                
            }
            else{
                $("#invoicePrice").html("enter");
            }
        });
        /* halkan buu ku dhamaada code-ka items-ka soo akhrinaya*/
    /*=====================================================================*/
    /**************************************************************************/
    /*=====================================================================*/

        /* to multiply qty and price and produce result */
        /*$("input").change(function(){
            var product = 0;
            $("input[name=invoiceQty]").each(function(){
                //product = product - parseFloat($(this).val());
                product = parseFloat($("input[name=invoiceQty").val()) * parseFloat($("input[name=invoicePrice").val());
            });
            $("input[name=invoiceTotal").val(product);
        });*/
        /*================================================*/

        /* save and close, save and new the generating code */
        $('#invoiceSave').click(function() {
            window.location.href = 'invoices.php';
            return false;
        });
    
        $('#invoiceNew').click(function() {
            window.location.href = 'addInvoice.php';
            return false;
        });
        $("td[name=itemName]").click(function(){
            var num = $(this).text();
            alert(num);
        })
/* ********************************************************************** */
    /* for increasing the number of rows in table of items */
        var tirin = 1;
        $("#addMore").click(function(){
            tirin = tirin + 1;
            var query_code = "<tr id='row" + tirin + "'>";
            query_code += "<td contenteditable='true' name='itemName' class='itemName'  id='itemSearch'></td>";
            query_code += "<td contenteditable='true' class='itemQty'></td>";
            query_code += "<td contenteditable='true' class='itemPrice'></td>";
            query_code += "<td contenteditable='true' class='itemTotal'></td>";
            query_code += "<td><button type='button' name='remove' data-row='row" + tirin + "' class='btn btn-danger btn-xs'>x</button></td>";
            query_code += "</tr>";
            $("#crud_table").append(query_code);
        });

        $(document).on('click', '.remove', function(){
            var deleteRow = $(this).data("row");
            $('#' + deleteRow).remove();
        });
        $('button[name=invoiceSave]').click(function(){
            var invoiceName = $("#invoiceName").val();
            var invoiceNo = $("#invoiceNo").val();
            var invoiceDate = $("#datepicker").val();            
            var itemName = $(".itemName").text();
            var itemQty = $(".itemQty").text();
            var itemPrice = $(".itemPrice").text();
            var itemTotal = $(".itemTotal").text();

            /*$('.itemName').each(function(){
                itemName.push($(this).text());
            });
            $('.itemQty').each(function(){
                itemQty.push($(this).text());
            });
            $('.itemPrice').each(function(){
                itemPrice.push($(this).text());
            });
            $('.itemTotal').each(function(){
                itemTotal.push($(this).text());
            });*/
            $.ajax({
                url:"insert.php",
                method:"POST",
                data:{invoiceName:invoiceName, invoiceNo:invoiceNo, invoiceDate:invoiceDate, itemName:itemName, itemQty:itemQty, itemPrice:itemPrice, itemTotal:itemTotal},
                success:function(data){
                    $("td[contentEditable='true']").text("");
                    /*for(var i=2; i<=tirin; i++){
                        $('tr#'+i+'').remove();
                    }*/
                }
            });
        });
        $("#crud_table").keydown(function(){
            var txt = 0;
            $(".itemQty").each(function(){     
                txt = parseFloat($(".itemQty").text()) * parseFloat($(".itemPrice").text());
            });
            $(".itemTotal").text(txt);
        });
    });
</script>
