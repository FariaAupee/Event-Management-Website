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
    </style>
</head>
<body>
    <?php
    if(isset($_SESSION['var'])){
    $pr_name = $_GET['pr_name'];
    $prc = $_GET['prc'];
    $ret = "SELECT * FROM order_table WHERE cust_name = '$user' && prod_name = '$pr_name';";
    $qry2 = mysqli_query($connect, $ret);
    if(!$qry2){
        die("query failed" . mysqli_error());
    }
    $num = mysqli_num_rows($qry2);
    if($num >= 1){
        $qnty = "0";
        while($calc = mysqli_fetch_assoc($qry2)){
        $qnty += $calc['quantity'];
        }
        $total = $qnty * $prc;
    }
    }
        unset($_SESSION['var']);
    $getsum = "SELECT SUM(price) AS sum FROM order_table WHERE cust_name = '$user';";
    $qry3 = mysqli_query($connect,$getsum);
    if(!$qry3){
        die("query failed" . mysqli_error());
    }
    $num1 = mysqli_num_rows($qry3);
    $fetch = mysqli_fetch_assoc($qry3);
    $grand_total = $fetch['sum'];
    
    echo $user;echo "<br>";
    //echo "$pr_name <br>";
    
    /*$getall = "SELECT *,COUNT(prod_name) FROM order_table WHERE cust_name = '$user' GROUP BY prod_name HAVING COUNT(prod_name)>=1;";
    $qry4 = mysqli_query($connect,$getall);
    if(!$qry4){
        die("query failed" . mysqli_error());
    }
    $num1 = mysqli_num_rows($qry4);*/
    $getall = "SELECT * FROM order_table WHERE cust_name = '$user';";
    $qry4 = mysqli_query($connect,$getall);
    if(!$qry4){
        die("query failed" . mysqli_error());
    }
    $num1 = mysqli_num_rows($qry4);
    if($num1 >=1 ){
        while($calc = mysqli_fetch_assoc($qry4)){
        //$pname = $calc['prod_name'];
        //$qnty += $calc['quantity'];
        
        echo "<br> Name: ";echo $calc['prod_name']; echo"<br>";
        echo "Quantity: "; echo $calc['quantity']; echo"<br>";
        echo "Price: "; echo $calc['price']; echo "TK";echo "<br><br>"; 
        }
    }
    if($grand_total == NULL)
    {
        echo "Total amount: 0TK;";
    }
    else{
        echo "Total amount: "; echo "$grand_total TK<br>";
    }
    ?>

</body>
</html>
