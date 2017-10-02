<?php
    include("connection.php");
    include("links.php");
    //$total = array();
    $grandTotal = 0;
    if(isset($_POST["query"]))
    {
        $search = mysqli_real_escape_string($conn, $_POST["query"]);
        $query = "
        SELECT * FROM products 
        WHERE product_name LIKE '%".$search."%' 
        ";
    }
    else
    {
        $query = "
        SELECT * FROM products ORDER BY product_id
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
                    <th>Price</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
        <?php
            while($row = mysqli_fetch_array($result)){ ?>
                <tr>
                    <td><?php echo $row["product_id"] ?></td>
                    <td><?php echo $row["product_name"] ?></td>
                    <td style="font-weight: bold; text-align:right;"><?php echo "$" . $row["product_price"] ?></td>
                    <td><?php echo $row["product_description"] ?></td>
                    <td>
                        <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#edit-<?php echo $row['product_id']; ?>"><i class="fa fa-pencil fa-lg"></i> Edit</button>
                        <div class="modal fade" role="dialog" id="edit-<?php echo $row['product_id']; ?>">
                            <div class="modal-dialog" style="width:900px;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 id="">Update Product</h3>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post">
                                            <input type="hidden" name="productId" id="#edit-<?php echo $row['product_id']; ?>" class="form-control" value="<?php echo $row['product_id']; ?>">                                            
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label for="productname">product name</label>
                                                    <input type="text" id="productname" name="productName" id="#edit-<?php echo $row['product_id']; ?>" class="form-control" value="<?php echo $row['product_name']; ?>"><br>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="productprice">Price</label>
                                                    <input type="number" id="productprice" name="productPrice" id="#edit-<?php echo $row['product_id']; ?>" class="form-control" value="<?php echo $row['product_price']; ?>"><br>
                                                </div>
                                            </div><br>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <label for="productdescription">product Description</label>
                                                    <textarea class="form-control" id="productdescription" name="productDescription" id="#edit-<?php echo $row['product_id']; ?>" cols="30" rows="10"><?php echo $row['product_description']; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-offset-3 col-sm-6 col-sm-offset-3">
                                                    <a href="?update_product=<?php echo $row['product_id']; ?>"><button type="submit" class="btn btn-success" name="update_product">Update product</button></a>
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
                        <a href="?idDeleteProduct=<?php echo $row['product_id'] ?>"><button name="idDeleteProduct" type="submit" class="btn btn-danger"><i class="fa fa-trash fa-lg"></i> Delete</button></a>
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