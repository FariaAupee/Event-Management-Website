<?php
include "menu.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table tr td{
            justify-content:center;
            border: 1px solid black;
            border-collapse: collapse;
        }
        th,td{
            padding: 5px;
        }
    </style>
</head>
<body>
    <?php
        $pr_name="";$quantity="";$price="";
        $var = "SELECT cust_name,order_id,prod_name,quantity,price FROM confirm_order ORDER BY order_id";
        $qry = mysqli_query($connect,$var);
        if(!$qry){
            die("query failed" . mysqli_error());
        }
        
        $x = "";
        while($val = mysqli_fetch_assoc($qry)){
            $order_id = $val['order_id'];
            $var2 = "SELECT cust_name,order_id,prod_name,quantity,price FROM confirm_order WHERE order_id = '$order_id'";
            $qry2 = mysqli_query($connect,$var2);
            if(!$qry2){
                die("query failed" . mysqli_error());
            }
            if($order_id == $x) continue;
            echo "<div class='table'>";
            echo "<table><tr><th>Order ID</th><th>Customer Name</th><th>Product Name</th><th>Quantity</th><th>Price</th></tr>";
            while($val2 = mysqli_fetch_assoc($qry2)){
                echo "<tr><td>" .$val2['order_id']. "</td><td>"  .$val2['cust_name'].  "</td><td>" .$val2['prod_name']. "</td><td>" .$val2['quantity']. "</td><td>" .$val2['price']. "</td></tr>";
                /*echo $val2['cust_name'];echo "<br>";
                echo $val2['order_id'];echo "<br>";
                echo $val2['prod_name'];echo "<br>";
                echo $val2['quantity'];echo "<br>";
                echo $val2['price'];echo "<br>";*/
                echo "<br>";
                $x=$order_id;
            }
            echo "</div>";    
        }
    ?>
</body>
</html>