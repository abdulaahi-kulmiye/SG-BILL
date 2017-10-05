<?php
    include("connection.php");
    if(isset($_POST["driverbtnNew"])){
        $data = array();
        function getInfo(){
            $data[0] = $_POST['driverName'];
            $data[1] = $_POST['driverDate'];
            $data[2] = $_POST['driveritemName'];
            $data[3] = $_POST['driveritemQty'];
            $data[4] = $_POST['driveritemPrice'];
            $data[5] = $_POST['driveritemTotal'];
            return $data;
        }
        $info = getInfo();
        $sql = "insert into driverinvoice (di_name, di_date, di_item, di_qty, di_price, di_total) values ('$info[0]', '$info[1]', 
        '$info[2]', '$info[3]', '$info[4]', '$info[5]')";
        if($conn->query($sql) === true){
            location.header("driverInventory.php");
        }
        else{
            echo "failed to upload";
        }
    }
    if(isset($_POST['query'])){
        $driverName = $_POST['query'];
        $output = '';
        $sql = 'select driver_name from drivers where driver_name like "%'.$driverName.'%"';
        $output = '<ul class="list-unstyled">';
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $output .= '<li class="drive">'.$row["driver_name"].'</li>';
            }
        }
        else{
            $output .= '<li>no data found</li>';
        }
        $output .= '</ul>';
        echo $output;
    }
   /* if(isset($_POST['qty'])){
        $qty = $_POST['qty'];
        $sql = 'select di_qty from driverinvoice where di_id = 3';
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $check = $row["di_qty"];
            }
        }
        
    }*/
    if(isset($_POST["btnSave"])){
        $Quantity = "";
        $total = "";
        $Quantity = $_POST["Quantity"];
        $db = "SELECT di_qty FROM driverinvoice WHERE di_id = 2";
        $result = $conn->query($db);
        if($result->num_rows > 0 ){
            while($row = $result->fetch_assoc()){
                $bal = $row["di_qty"];
            }
        }
        $total = $bal - $Quantity;
        $sql = "update driverinvoice set di_qty = '.$total.' where di_id = 2";
        if($conn->query($sql) === true){
            echo "successfull updated";
        }
        else{
            echo "no update available";
        }
    }
?>