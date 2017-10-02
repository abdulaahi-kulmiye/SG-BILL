<?php
    session_start();
    $username = "";
    $email = "";
    $errors = array();
    //connection creation
    $conn = mysqli_connect("localhost", "root", "", "sahal_gas");

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
        header ('location: login.php');
    }
?>