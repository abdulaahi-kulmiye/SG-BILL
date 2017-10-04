<?php
    include("connection.php");
    if(isset($_POST["query"])) {
        $output = "";
        $sql = "select cus_name from customers where cus_name like '%".$_POST["query"]."%'";
        $result = $conn->query($sql);
        $output = '<ul class="list-unstyled">';
        if($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()){
                $output .= '<li id="customer">'.$row["cus_name"].'</li>';
            }
        }
        else{
            $output .= '</li>no data found</li>';
        }
        $output .='</ul>';
        echo $output;
    }

    /*if(isset($_POST["searchs"])) {
        $output = "";
        $sql = "select cus_name from customers where cus_name like '%".$_POST["searchs"]."%'";
        $result = $conn->query($sql);
        $output = '<ul class="list-unstyled">';
        if($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()){
                $output .= '<li>'.$row["cus_name"].'</li>';
            }
        }
        else{
            $output .= '</li>no data found</li>';
        }
        $output .='</ul>';
        echo $output;
    }*/
?>