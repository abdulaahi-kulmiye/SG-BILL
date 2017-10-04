<?php
    include("connection.php");
    include("links.php");
    if(isset($_POST["query"]))
    {
        $search = mysqli_real_escape_string($conn, $_POST["query"]);
        $query = "
        SELECT * FROM invoices 
        WHERE cus_name LIKE '%".$search."%'
        OR item_name LIKE '%".$search."%' 
        ";
    }
    else
    {
        $query = "
        SELECT * FROM invoices ORDER BY invoice_id DESC
        ";
    }
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0)
    { ?>
        <div class="table-responsive">
            <table class="table table-striped table-condensed table-hover table-bordered">
                <tr>
                    <th>Customer Name</th>
                    <th>Invoice No</th>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Invoice Date</th>
                    <th>Action</th>
                </tr>
        <?php
            while($row = mysqli_fetch_array($result)){ ?>
                <tr>
                    <td><?php echo $row["cus_name"] ?></td>
                    <td><?php echo $row["invoice_no"] ?></td>
                    <td><?php echo $row["item_name"] ?></td>
                    <td><?php echo $row["item_quantity"] ?></td>
                    <td><?php echo $row["item_price"] ?></td>
                    <td><?php echo $row["item_total"] ?></td>
                    <td><?php echo $row["invoice_date"] ?></td>
                    <td>
                        <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#edit-<?php echo $row['invoice_id']; ?>"><i class="fa fa-pencil fa-lg"></i> Edit</button>
                        <div class="modal fade" role="dialog" id="edit-<?php echo $row['invoice_id']; ?>">
                            <div class="modal-dialog" style="width:800px;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
                                        <h3 id="">Update Invoice</h3>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post">
                                            <input type="hidden" name="invoiceId" id="#edit-<?php echo $row['invoice_id']; ?>" class="form-control" value="<?php echo $row['invoice_id']; ?>">                                            
                                            <div class="row">
                                                <div class="col-sm-7">
                                                    <label for="invoiceName">Customer name</label>
                                                    <input type="text" name="invoiceName" autocomplete = "off" id="#edit-<?php echo $row['invoice_id']; ?>" class="form-control" value="<?php echo $row['cus_name']; ?>"><br>
                                                    <div id="invoiceNameList"></div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label for="invoiceDate">Date</label>
                                                    <div class="form-group">
                                                        <div class='input-group date' id='datetimepicker1' data-date-format="yyyy-mm-dd">
                                                            <input type="text" name="invoiceDate" autocomplete = "off" id="#edit-<?php echo $row['invoice_id']; ?>" class="form-control" value="<?php echo $row['invoice_date']; ?>">
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
                                                    <label for="invoiceNo">Invoice No</label>
                                                    <input type="text" name="invoiceNo" autocomplete = "off" id="#edit-<?php echo $row['invoice_id']; ?>" class="form-control" value="<?php echo $row['invoice_no']; ?>"><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <label for="invoiceItem">Item Name</label>
                                                    <input type="text" name="invoiceItem" autocomplete = "off" id="#edit-<?php echo $row['invoice_id']; ?>" class="form-control" value="<?php echo $row['item_name']; ?>">
                                                </div>
                                                <div class="col-sm-2">
                                                    <label for="invoiceQty">Quantity</label>
                                                    <input type="number" name="invoiceQty" autocomplete = "off" id="#edit-<?php echo $row['invoice_id']; ?>" class="form-control" value="<?php echo $row['item_quantity']; ?>">
                                                </div>
                                                <div class="col-sm-2">
                                                    <label for="invoicePrice">Price</label>
                                                    <input type="number" name="invoicePrice" autocomplete = "off" id="#edit-<?php echo $row['invoice_id']; ?>" class="form-control" value="<?php echo $row['item_price']; ?>">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label for="invoiceTotal">Invoice No</label>
                                                    <input type="number" name="invoiceTotal" autocomplete = "off" id="#edit-<?php echo $row['invoice_id']; ?>" class="form-control" value="<?php echo $row['item_total']; ?>"><br>
                                                </div>
                                            </div><br>
                                            <div class="row">
                                                <div class="col-sm-offset-3 col-sm-6 col-sm-offset-3">
                                                    <a href="?update_invoice=<?php echo $row['invoice_id']; ?>"><button type="submit" class="btn btn-success btn-block btn-lg" name="update_invoice">Update invoice</button></a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="?idDeleteInvoice=<?php echo $row['invoice_id'] ?>"><button name="idDeleteInvoice" type="submit" class="btn btn-danger"><i class="fa fa-trash fa-lg"></i> Delete</button></a>
                    </td>
                </tr>
                <?php 
            }
    }
else
{
 echo 'Data Not Found';
}
echo "</table></div>";
?>
<script>

/* selects the price of the products in dropdown */
    $(document).ready(function(){
        $("#invoiceItem").on("change", function(){
            var ItemID = $(this).val();
            if(ItemID){
                $.get(
                    "priceSearch.php",
                    {invoiceItem: ItemID},
                    function(data){
                        $("input[name=invoicePrice]").val(data);
                    }
                );
                
            }
                else{
                    $("#invoicePrice").html("enter");
                }
        });

        $("input").change(function(){
            var product = 0;
            $("input[name=invoiceQty]").each(function(){
                product = parseFloat($("input[name=invoiceQty").val()) * parseFloat($("input[name=invoicePrice").val());
            })
            $("input[name=invoiceTotal").val(product);
        });

        $("input[name=invoiceName]").keyup(function(){
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
        $(document).on("click", "li", function(){
            $("input[name=invoiceName]").val($(this).text());
            $("#invoiceNameList").fadeOut();
        })

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