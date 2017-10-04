<?php
    if(isset($_GET["item"])){
        include("connection.php");
        $invoicesID = $_GET["item"];
        $sql = "select product_price from products where product_name = '$invoicesID'";
        $do = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($do);
        if($count > 0) {
            while($row = mysqli_fetch_array($do)) {
                echo $row["product_price"];
            }
        }
    }
?>