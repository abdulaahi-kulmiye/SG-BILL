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
                                <script>
                                    /* xoogaa error ah baa haysta
                                     * marka waaa laxalin xilaga ay munaasibka noqoto
                                     * ciladu waa in uusan database-ka ka soo akhrinayn xogta
                                     * ka dibna uu ka soo muujinayn field-ga loo baneeyay
                                     * marka hada waxaa sii isticmaalayna isaga oo ah
                                     * increment + 1
                                     */
                                    /*$(document).ready(function(){
                                        //$(window).on("load", function(){
                                            $("input[name=invoiceNo]").load("addInvoice.php", function(){
                                            // no means invoice No
                                            var no = $(this).val();
                                            if(no){
                                                $.get(
                                                    "addInvoice.php",
                                                    {no: no},
                                                    function(data){
                                                        $("#invoiceNo").val(data);
                                                        alert(data);
                                                    }
                                                );
                                            }
                                        //});
                                            });
                                        
                                    });*/

                                   /* $(document).ready(function(){
                                        $("#invoiceNew").on("click", function(){
                                            $("input[name=invoiceQty]").val()+1;
                                            window.location.href='addInvoice.php';
                                        });
                                        
                                    })*/
                                    

                                </script>
                            </div><br>
                            <div class="row">
                                <div class="col-sm-7">
                                    <label for="invoiceName">Customer Name</label>
                                    <input type="text" name="invoiceName" autocomplete="off" id="invoiceName" class="form-control">
                                    <div id="invoiceNameList"></div>
                                    <!-- <select name="invoiceName" id="invoiceName" class="form-control">
                                        </*?php
                                            $sql = "select cus_name from customers";
                                            $result = $conn->query($sql);
                                            if($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) { ?*/>
                                            <option value="<//?php echo $row['cus_name']; ?>"><//?php echo $row['cus_name']; ?></option>
                                            </*?php }
                                            }
                                        ?*/>
                                    </select> -->
                                </div>
                                <div class="col-sm-offset-5">
                                </div>
                            </div><br>
                            <script>
                                /// waa midka sameynaya dropdown items-ka
                                $(document).ready(function(){
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
                                });
                            </script>
                            <table  id="dynamic_field">  
                                <tr>  
                                    <td>
                                       <div class="class="name_list"" name="name[]">
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <label for="invoiceItem">Item name</label>
                                                    <select name="invoiceItem" id="invoiceItem" class="form-control">
                                                        <?php
                                                            $sql = "select product_name from products";
                                                            $result = $conn->query($sql);
                                                            if($result->num_rows > 0) {
                                                                while($row = $result->fetch_assoc()) { ?>
                                                            <option value="<?php echo $row['product_name']; ?>"><?php echo $row['product_name']; ?></option>
                                                            <?php }
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
                                                <script>
                                                    
                                                </script>
                                            </div>
                                        </div><br>
                                        </td>  
                                         <td><button type="button" name="add" id="add" class="btn btn-warning" style="margin-left:20px">Add More</button></td>  
                                    </tr>  
                               </table> 
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
                                            <td contenteditable="true" class="itemName" id="itemSearch"></td>
                                            <td contenteditable="true" id="invoiceQty" class="itemQty"></td>
                                            <td contenteditable="true" id="invoicePrice" class="itemPrice"></td>
                                            <td contenteditable="true" id="invoiceTotal" class="itemTotal"></td>
                                        </tr>
                                    </table>
                                    <div align="right">
                                        <button type="button" id="addMore" class="btn btn-warning">Add More</button>
                                    </div>
                                    <div align="center">
                                        <button type="button" id="save" name="save" class="btn btn-primary">Save</button>
                                    </div>
                                </div>                                
                            </div><br><br>
                            <div class="row">
                                <div class="col-sm-offset-6 col-sm-2">
                                    <button type="submit" name="invoiceSave" id="invoiceSave" class="btn btn-success btn-block">Save & Close</button>
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" name="invoiceNew" id="invoiceNew" class="btn btn-info btn-block">Save & New</button>
                                </div>
                                <div class="col-sm-2">
                                    <button type="reset" name="invoiceReset" class="btn btn-danger btn-block">Clear</button>
                                </div>
                                
                            </div>
                        </form><button id="riix">riix</button>
                        <script>
                            $(document).ready(function(){
                                var sum;
                                parseInt($("input[name=invoiceNo]").val()) += sum;
                                $("#riix").on("click", function(){
                                    sum++;
                                $("input[name=invoiceNo]").val(sum);
                                   // alert("fsd");
                                });
                            });
                        </script>
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
        $("#itemSearch").keyup(function(){
            var searchs = $(this).val();
            if(searchs != ''){
                $.ajax({
                    url:"searchInvoiceCustomer.php",
                    method: "POST",
                    data:{searchs:searchs},
                    success:function(data){
                        //$("#invoiceNameList").fadeIn();
                        //$("#invoiceNameList").html(data);
                        alert(data);
                    }
                });
            }
        });
        $(document).on("click", "li", function(){
            $("#invoiceName").val($(this).text());
            $("#invoiceNameList").fadeOut();
        });
        $(document).on("click", function(){
            $("#invoiceNameList").fadeOut();
        });
        /*===========================================*/

        /* to multiply qty and price and produce result */
        $("input").change(function(){
            var product = 0;
            $("input[name=invoiceQty]").each(function(){
                //product = product - parseFloat($(this).val());
                product = parseFloat($("input[name=invoiceQty").val()) * parseFloat($("input[name=invoicePrice").val());
            })
            $("input[name=invoiceTotal").val(product);
        });
        /*================================================*/

        /* save and close, save and new the generating code */
        $('#invoiceSave').click(function() {
            window.location.href = 'invoices.php';
            return false;
        });
    
        $('#invoiceNew').click(function() {
            window.location.href = 'addInvoice.php';
            var sum = 1;
            $("input[name=invoiceQty]").val("45");
            return false;
        });

/* ********************************************************************** */
    /* for increasing the number of rows in table of items */
        var tirin = 1;
        $("#addMore").click(function(){
            tirin = tirin + 1;
            var query_code = "<tr id='row" + tirin + "'>";
            query_code += "<td contenteditable='true' class='itemName'></td>";
            query_code += "<td contenteditable='true' class='itemQty'></td>";
            query_code += "<td contenteditable='true' class='itemPrice'></td>";
            query_code += "<td contenteditable='true' class='itemTotal'></td>";
            query_code += "<td><button type='button' name='remove' data-row='row" + tirin + "' class='btn btn-danger btn-xs'>x</button></td>";
            query_code += "</tr>";
            $("#crud_table").append(query_code);
        });

        $(document).on('click', '.remove', function(){
            //alert("ghghj");
            var deleteRow = $(this).data("row");
            $('#' + deleteRow).remove();
        });
        $('#save').click(function(){
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

        /*$("td").change(function(){
            var mult = 0;
            alert("hjhh");
            $("#invoiceQty").each(function(){
                //product = product - parseFloat($(this).val());
                mult = parseFloat($("#invoiceQty").text()) * parseFloat($("#invoicePrice").text());
            })
            alert(mult);
            $("#invoiceTotal").text(mult);
        });*/
/* ********************************************************************** */        
    });
        
</script>
    

    $(document).ready(function(){  
        var i=1;  
        $('#add').click(function(){  
            i++;  
            $('#dynamic_field').append('<tr id="row'+i+'"><td><div class="name_list"" name="name[]"><div class="row"  ><div class="col-sm-5"><select name="invoiceItem" id="invoiceItem" class="form-control"><?php$sql = "select product_name from products";$result = $conn->query($sql);if($result->num_rows > 0) {while($row = $result->fetch_assoc()) { echo '<option value="$row['product_name']">$row['product_name'];</option>}}</select></div><div class="col-sm-2"><input type="number" name="invoiceQty" id="invoice" class="form-control"></div><div class="col-sm-2"><input type="number" name="invoicePrice" id="invoicePrice" class="form-control" min="0"></div><div class="col-sm-3"><input type="number" name="invoiceTotal" id="invoiceTotal" class="form-control disable" min="0"></div></div><br></div></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
        });  
        $(document).on('click', '.btn_remove', function(){  
            var button_id = $(this).attr("id");   
            $('#row'+button_id+'').remove();  
        });  
        
 });  
</script>