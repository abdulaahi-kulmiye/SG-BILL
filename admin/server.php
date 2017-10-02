<?php
    include("connection.php");
    $soundfile = "test.mp3";
    $data = array();
    function getData() {
        $data[0] = $_POST['cusname'];
        $data[1] = $_POST['cusphone'];
        $data[2] = $_POST['cuscity'];
        $data[3] = $_POST['cuszone'];
        $data[4] = $_POST['cusaddress'];
        $data[5] = $_POST['custype'];
        $data[6] = $_POST['cusregistered'];
        $data[7] = $_POST['cusdesc'];
        return $data;
    }

    function getDriverData() {
        $data[0] = $_POST['drivername'];
        $data[1] = $_POST['driverphone'];
        $data[2] = $_POST['driverdescription'];
        return $data;
    }

    function getItemData() {
        $data[0] = $_POST['productname'];
        //$data[1] = $_POST['itemqty'];
        $data[1] = $_POST['productprice'];
        $data[2] = $_POST['productdescription'];
        return $data;
    }

    function setInvoiceData() {
        $data[0] = $_POST['invoiceName'];
        $data[1] = $_POST['invoiceNo'];
        $data[2] = $_POST['invoiceDate'];
        $data[3] = $_POST['invoiceItem'];
        $data[4] = $_POST['invoiceQty'];
        $data[5] = $_POST['invoicePrice'];
        $data[6] = $_POST['invoiceTotal'];
        return $data;
    }

    /* registers a new customer*/
    if(isset($_POST['cusregister'])) {
        $info = getData();
        $sql = "INSERT INTO customers (cus_name, cus_phone, cus_city, cus_zone, cus_address, cus_type, cus_register, cus_description) VALUES 
        ('$info[0]', '$info[1]', '$info[2]', '$info[3]', '$info[4]', '$info[5]', '$info[6]', '$info[7]')";
        if($conn->query($sql)===TRUE){
            header("location: customers.php");
            echo "Successfull inserted the " . $last_id = $conn->insert_id . "<sup>th</sup> row";
        }
        else {
            echo "<script>alert('wax xog ah lama xarayn!');</script>";
            echo $conn->error();
        }
        $conn->close();
    }

    /* registers a new driver*/
    if(isset($_POST['driverregister'])) {
        $info = getDriverData();
        $sql = "INSERT INTO drivers (driver_name, driver_phone, driver_description) VALUES 
        ('$info[0]', '$info[1]', '$info[2]')";
        if($conn->query($sql)===TRUE){
            header("location: drivers.php");
            //echo "Successfull inserted the " . $last_id = $conn->insert_id . "<sup>th</sup> row";
        }
        else {
            echo "ooooooooooooooooops failed";
        }
        $conn->close();
    }

    /* registers a new item*/
    if(isset($_POST['productregister'])) {
        $info = getItemData();
        $sql = "INSERT INTO products (product_name,product_price, product_description) VALUES 
        ('$info[0]', '$info[1]', '$info[2]')";
        if($conn->query($sql)===TRUE){
            header("location: products.php");
            //echo "Successfull inserted the " . $last_id = $conn->insert_id . "<sup>th</sup> row";
        }
        else {
            echo "<script>alert('wax xog ah lama xarayn!');</script>";
        }
        $conn->close();
    }

    /* new invoices code */
    if(isset($_POST["invoiceSave"]) || isset($_POST["invoiceNew"])) {
        $info = setInvoiceData();
        $sql = "INSERT INTO invoices (cus_name, invoice_no, invoice_date, item_name, item_quantity, item_price, item_total) VALUES ('$info[0]', '$info[1]',
         '$info[2]', '$info[3]', '$info[4]', '$info[5]', '$info[6]')";
        if($conn->query($sql)===TRUE) {
            //echo '<script>alert("successfull inserted"); </script>';
            //header("location: invoices.php");
            
        }
        else {
            echo "<h2>oooooooops failed to load</h2>";
        }
        
    }


    ///login and logout code
    session_start();
    $username = "";
    $email = "";
    $errors = array();
    //connection creation
    if (isset($_POST['register'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password1 = mysqli_real_escape_string($conn, $_POST['password1']);
        $password2 = mysqli_real_escape_string($conn, $_POST['password2']);

        //hubi in ay faaruq yihiin input box
        if(empty($username)) {
            array_push($errors, "Username required");
        }
        if(empty($password1)) {
            array_push($errors, "Password required");
        }
        //check whether the two password are same
        if($password1 != $password2) {
            array_push($errors, "The password did not mutch");
        }
        // if there is no error
        if(count($errors) == 0) {
            $password = md5($password1);
            $sql = "insert into users (user_name, user_password) values ('$username', '$password')";
            mysqli_query($conn, $sql);
            
        }
    }
    if (isset($_POST['login'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        
        //check what's wrong either username or password or both

        if(empty($username)) {
            array_push($errors, "Username invalid");
        }
        if(empty($password)) {
            array_push($errors, "Password invalid");
        }
        if(count($errors) == 0) {
            $password = md5($password);
            $query = "SELECT user_name, user_password FROM users WHERE user_name = '$username' AND user_password = '$password'";
            $result = mysqli_query($conn, $query);
            if(mysqli_num_rows($result) == 1){
                echo "Successfull loged in";
                $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header ('location: admin/index.php'); //waxa ay ku gayn home page-ka
            }
            else {
                echo "Failed to login";
            }
        }
    }

    //logout code
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header ('location: ../login.php');
    }
?>