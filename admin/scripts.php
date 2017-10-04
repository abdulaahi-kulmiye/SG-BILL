<?php
    include("connection.php");
    if(isset($_POST["searchs"])) {
        $output = "";
        $sql = "select product_name from products where product_name like '%".$_POST["searchs"]."%'";
        $result = $conn->query($sql);
        $output = '<ul class="list-unstyled">';
        if($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()){
                $output .= '<li id="item">'.$row["product_name"].'</li>';
            }
        }
        else{
            $output .= '</li>no data found</li>';
        }
        $output .='</ul>';
        echo $output;
    }
?>