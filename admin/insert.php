<?php
    $connect = mysqli_connect("localhost", "root", "", "sahal_gas");
    //include("connection.php");
    if(isset($_POST["itemName"])){
        $invoiceDate = $_POST["invoiceDate"];
        $invoiceNo = $_POST["invoiceNo"];
        $invoiceName = $_POST["invoiceName"];
        $itemName = $_POST["itemName"];
        $itemQty = $_POST["itemQty"];
        $itemPrice = $_POST["itemPrice"];
        $itemTotal = $_POST["itemTotal"];
        $query = '';
        for($count=0; $count<count($itemName); $count++){
            //if($itemname != ''){
                $query .= 'INSERT INTO invoices (cus_name, invoice_no, invoice_date,item_name, item_quantity, item_price, item_total) VALUES ("'.$invoiceName.'", "'.$invoiceNo.'", "'.$invoiceDate.'", "'.$itemName.'", "'.$itemQty.'", "'.$itemPrice.'", "'.$itemTotal.'")';
                
            //}
        }
        //if(query != ''){
            if(mysqli_multi_query($connect, $query)){
                //echo '<script>alert("one row inserted");</script>';
                 echo 'successfull inserted';
                //echo "<script>alert('fsdfsd');</script>";
            }
            else{
                //echo "<script>alert('fsdfsd');</script>";
            }
        //}
       // else {
           // echo "ALL Fields are Important";
       // }
    }
?>