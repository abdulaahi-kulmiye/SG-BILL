<?php
    include("connection.php");
    include("links.php");
    if(isset($_POST["query"]))
    {
        $search = mysqli_real_escape_string($conn, $_POST["query"]);
        $query = "
        SELECT * FROM drivers 
        WHERE driver_name LIKE '%".$search."%'
        OR driver_phone LIKE '%".$search."%' 
        ";
    }
    else
    {
        $query = "
        SELECT * FROM drivers ORDER BY driver_id
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
                    <th>Description</th>
                    <th>Action</th>
                </tr>
        <?php
            while($row = mysqli_fetch_array($result)){ ?>
                <tr>
                    <td><?php echo $row["driver_id"] ?></td>
                    <td><?php echo $row["driver_name"] ?></td>
                    <td><?php echo $row["driver_phone"] ?></td>
                    <td><?php echo $row["driver_description"] ?></td>
                    <td>
                        <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#edit-<?php echo $row['driver_id']; ?>"><i class="fa fa-pencil fa-lg"></i> Edit</button>
                        <div class="modal fade" role="dialog" id="edit-<?php echo $row['driver_id']; ?>">
                            <div class="modal-dialog" style="width:900px;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 id="">Update Driver</h3>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post">
                                            <input type="hidden" name="driverId" id="#edit-<?php echo $row['driver_id']; ?>" class="form-control" value="<?php echo $row['driver_id']; ?>">                                            
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label for="name">Driver name</label>
                                                    <input type="text" name="driverName" id="#edit-<?php echo $row['driver_id']; ?>" class="form-control" value="<?php echo $row['driver_name']; ?>"><br>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="phone">Driver Phone</label>
                                                    <input type="text" name="driverPhone" id="#edit-<?php echo $row['driver_id']; ?>" class="form-control" value="<?php echo $row['driver_phone']; ?>"><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <label for="description">Driver Description</label>
                                                    <textarea class="form-control" name="driverDescription" id="#edit-<?php echo $row['driver_id']; ?>" cols="30" rows="10"><?php echo $row['driver_description']; ?></textarea>
                                                </div>
                                                <div class="col-sm-offset-4"></div>
                                            </div><br>
                                            <div class="row">
                                                <div class="col-sm-offset-3 col-sm-6 col-sm-offset-3">
                                                    <a href="?update_driver=<?php echo $row['driver_id']; ?>"><button type="submit" class="btn btn-success btn-block" name="update_driver">Update driver</button></a>
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
                        <a href="?idDeleteDriver=<?php echo $row['driver_id'] ?>"><button name="idDeleteDriver" type="submit" class="btn btn-danger"><i class="fa fa-trash fa-lg"></i> Delete</button></a>
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