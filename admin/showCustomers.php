<?php
    include("connection.php");
    include("links.php");
    if(isset($_POST["query"]))
    {
        $search = mysqli_real_escape_string($conn, $_POST["query"]);
        $query = "
        SELECT * FROM customers 
        WHERE cus_name LIKE '%".$search."%'
        OR cus_address LIKE '%".$search."%' 
        OR cus_phone LIKE '%".$search."%' 
        OR cus_type LIKE '%".$search."%' 
        ";
    }
    else
    {
        $query = "
        SELECT * FROM customers ORDER BY cus_id
        ";
    }
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0)
    { ?>
        <div class="table-responsive">
            <table class="table table-striped table-condensed table-hover table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Phone number</th>
                    <th>Address</th>
                    <th>Customer Type</th>
                    <th>Registered By</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
        <?php
            while($row = mysqli_fetch_array($result)){ ?>
                <tr>
                    <td><?php echo $row["cus_id"] ?></td>
                    <td><?php echo $row["cus_name"] ?></td>
                    <td><?php echo $row["cus_phone"] ?></td>
                    <td><?php echo $row["cus_address"] ?></td>
                    <td><?php echo $row["cus_type"] ?></td>
                    <td><?php echo $row["cus_register"] ?></td>
                    <td><?php echo $row["cus_description"] ?></td>
                    <td>
                        <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#edit-<?php echo $row['cus_id']; ?>"><i class="fa fa-pencil fa-lg"></i> Edit</button>
                        <div class="modal fade" role="dialog" id="edit-<?php echo $row['cus_id']; ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" style="color:white;">&times;</button>
                                        <h3 id="">Update customer</h3>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post">
                                            <input type="hidden" name="cusId" id="#edit-<?php echo $row['cus_id']; ?>" class="form-control" value="<?php echo $row['cus_id']; ?>">                                            
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label for="name">Customer name</label>
                                                    <input type="text" name="cusName" id="#edit-<?php echo $row['cus_id']; ?>" class="form-control" value="<?php echo $row['cus_name']; ?>"><br>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="phone">Customer Phone</label>
                                                    <input type="text" name="cusPhone" id="#edit-<?php echo $row['cus_id']; ?>" class="form-control" value="<?php echo $row['cus_phone']; ?>"><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label for="address">Customer Address</label>
                                                    <input type="text" name="cusAddress" id="#edit-<?php echo $row['cus_id']; ?>" class="form-control" value="<?php echo $row['cus_address']; ?>"><br>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="type">Customer Type</label>
                                                    <select name="cusType" id="#edit-<?php echo $row['cus_id']; ?>" class="form-control">
                                                        <option value="<?php echo $row['cus_type']; ?>"><?php echo $row['cus_type']; ?></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label for="registered">Registered by</label>
                                                    <select name="cusRegister" id="#edit-<?php echo $row['cus_id']; ?>" class="form-control">
                                                        <option value="<?php echo $row['cus_register']; ?>"><?php echo $row['cus_register']; ?></option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-offset-6"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <label for="description">Customer Description</label>
                                                    <textarea class="form-control" name="cusDescription" id="#edit-<?php echo $row['cus_id']; ?>" cols="30" rows="3"><?php echo $row['cus_description']; ?></textarea>
                                                </div>
                                            </div><br>
                                            <a href="?update_customer=<?php echo $row['cus_id'] ?>"><button type="submit" class="btn btn-success" name="update_customer">Update Customer</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary btn-lg">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="?idDelete=<?php echo $row['cus_id'] ?>"><button name="idDelete" type="submit" class="btn btn-danger"><i class="fa fa-trash fa-lg"></i> Delete</button></a>
                    </td>
                </tr>
                <?php 
            }
    }
else
{
 echo 'Data Not Found';
}
?>
</table></div>