<?php
    include("connection.php");
    include("links.php");
    //$total = array();
    $grandTotal = 0;
    if(isset($_POST["query"]))
    {
        $search = mysqli_real_escape_string($conn, $_POST["query"]);
        $query = "
        SELECT * FROM items 
        WHERE item_name LIKE '%".$search."%' 
        ";
    }
    else
    {
        $query = "
        SELECT * FROM items ORDER BY item_id
        ";
    }
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0)
    { ?>
        <div class="table-responsive">
            <table class="table table-striped table-condensed table-hover table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <!-- <th>Total</th> -->
                    <th>Description</th>
                    <th>Action</th>
                </tr>
        <?php
            while($row = mysqli_fetch_array($result)){ ?>
                <?php   $qty =  $row["item_qty"];
                        $price = $row["item_price"];
                $total = array($qty * $price); ?>
                <tr>
                    <td><?php echo $row["item_id"] ?></td>
                    <td><?php echo $row["item_name"] ?></td>
                    <td><?php echo $row["item_qty"] ?></td>
                    <td style="font-weight: bold; text-align:right;"><?php echo "$" . $row["item_price"] ?></td>
                    <!-- <td style="font-weight: bold; text-align:right; font-size: 13pt;"><//?php echo "$". $total; ?></td> -->
                    <td><?php echo $row["item_description"] ?></td>
                    <td>
                        <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#edit-<?php echo $row['item_id']; ?>"><i class="fa fa-pencil fa-lg"></i> Edit</button>
                        <div class="modal fade" role="dialog" id="edit-<?php echo $row['item_id']; ?>">
                            <div class="modal-dialog" style="width:900px;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 id="">Update Item</h3>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post">
                                            <input type="hidden" name="itemId" id="#edit-<?php echo $row['item_id']; ?>" class="form-control" value="<?php echo $row['item_id']; ?>">                                            
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label for="itemname">item name</label>
                                                    <input type="text" id="itemname" name="itemName" id="#edit-<?php echo $row['item_id']; ?>" class="form-control" value="<?php echo $row['item_name']; ?>"><br>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label for="itemqty">Quantity</label>
                                                    <input type="number" id="itemqty" name="itemQty" id="#edit-<?php echo $row['item_id']; ?>" class="form-control" value="<?php echo $row['item_qty']; ?>"><br>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label for="itemprice">Price</label>
                                                    <input type="number" id="itemprice" name="itemPrice" id="#edit-<?php echo $row['item_id']; ?>" class="form-control" value="<?php echo $row['item_price']; ?>"><br>
                                                </div>
                                            </div><br>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <label for="itemdescription">item Description</label>
                                                    <textarea class="form-control" id="itemdescription" name="itemDescription" id="#edit-<?php echo $row['item_id']; ?>" cols="30" rows="10"><?php echo $row['item_description']; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-offset-3 col-sm-6 col-sm-offset-3">
                                                    <a href="?update_item=<?php echo $row['item_id']; ?>"><button type="submit" class="btn btn-success" name="update_item">Update item</button></a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary btn-lg">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="?idDeleteItem=<?php echo $row['item_id'] ?>"><button name="idDeleteItem" type="submit" class="btn btn-danger"><i class="fa fa-trash fa-lg"></i> Delete</button></a>
                    </td>
                </tr>
                <?php 
            }?>
            <tr>
                <td colspan="4">Total</td>
                <td><?php for($i=0; $i<=count($total); $i++) {
                    $grandTotal += $grandTotal[$i];}  
                    echo $grandTotal; ?>
                </td>
            </tr>
            <?php
    }
else
{
 echo 'Data Not Found';
}
echo "</table></div>";
?>