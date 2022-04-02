<?php
include "menu.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="1">
    <title>Document</title>
    <style>
    .container{
        display: flex;
        justify-content: center;
        flex-direction: column;
    }
    .retrieve{

    }
    .button{
            justify-content: center;
            align-items: center;
    }
    .button1{
            justify-content: center;
            align-items: center;
            color: black;
            background-color: #ffffb3;
            text-align: center;
    }
    .button1: hover{background-color: #ffffcc;}
    </style>
</head>
<body>
    <div class="container">
    <?php
    echo "<div class='retrieve'>";
    if(isset($_SESSION['var'])){
    $pr_name = $_GET['pr_name'];
    $prc = $_GET['prc'];
    $pr_id = $_GET['pid'];
    $ret = "SELECT * FROM order_table WHERE cust_name = '$user' && prod_name = '$pr_name';";
    $qry2 = mysqli_query($connect, $ret);
    if(!$qry2){
        die("query failed" . mysqli_error());
    }
    $num = mysqli_num_rows($qry2);
    /*if($num >= 1){
        $qnty = "0";
        while($calc = mysqli_fetch_assoc($qry2)){
        $qnty += $calc['quantity'];
        }
        $total = $qnty * $prc;
    }*/
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
    echo "</div>";
    echo "<div class='button'>";
    echo "<form action='' method='post'>";
    echo "<button type='submit' class='button1' name='sub'>Confirm Order</button>";
    echo "</form>";
    echo "</div>";
    if(isset($_POST['sub'])){
        $getall = "SELECT * FROM order_table WHERE cust_name = '$user';";
        $qry4 = mysqli_query($connect,$getall);
        if(!$qry4){
            die("query failed" . mysqli_error());
        }
            while($calc = mysqli_fetch_assoc($qry4)){
            $pid = $calc['prod_id'];
            $pname = $calc['prod_name'];
            $qt = $calc['quantity'];
            $pr = $calc['price'];
            $order_id = time();
            $ins = "INSERT INTO confirm_order(cust_name,order_id,prod_id,prod_name,quantity,price)";
            $ins .="VALUES('$user','$order_id','$pid','$pname','$qt','$pr')";
            $result = mysqli_query($connect,$ins);
            if(!$result){
                die("query failed" . mysqli_error());
            }

        }
            $del = "DELETE FROM order_table WHERE cust_name ='$user'";
            $qry5 = mysqli_query($connect,$del);
            if(!$qry5){
                die("query failed" . mysqli_error());
            }
            
    }
    ?>
    </div>

</body>
</html>
