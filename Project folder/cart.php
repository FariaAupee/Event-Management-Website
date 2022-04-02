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
        .container{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            width: 100%; 
        }
        .button{
            display:flex;
            flex-wrap: wrap;
            justify-content:center;
            align-items: center;
            flex-direction: column;
            width: 100%;
            height: 100vh;
        }
    .button1 {
    display: inline-block;
    padding: 15px 25px;
    font-size: 24px;
    cursor: pointer;
    text-align: center;
    text-decoration: none;
    outline: none;
    color: black;
    background-color: #ffffb3;
    border: none;
    border-radius: 15px;
    box-shadow: 0 7px #999;
    margin: 5px;
    }

    .button1:hover {background-color: #ffffcc}

    .button1:active {
    background-color: #ffff66;
    box-shadow: 0 5px #666;
    transform: translateY(4px);
    }
        .button1 a{
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            text-decoration:none;
            height: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
    <?php
     $catid = $_GET['catid'];
     //$eveid = $_GET['eve'];
     if(isset($_SESSION['var'])){
         if($catid == 1 || $catid == 2 || $catid ==3 || $catid == 6 || $catid == 7 || $catid ==9 || $catid == 10 || $catid ==11 ){
     $pr_name = $_GET['pr_name'];
     $prc = $_GET['p_price'];
     $pr_id = $_GET['pid'];
     $qnty = $_GET['qnty'];
     $total = $_GET['total'];
    }
     //echo $pr_name;echo "<br>";
     //echo $qnty;echo "<br>";
     //echo "$total TK";echo "<br>";
     //echo "$total TK";

    function func($con,$user,$pr_id,$pr_name,$qnt,$total){      
                $ord = "INSERT INTO order_table (cust_name,prod_id,prod_name,quantity,price)";
                $ord .= "VALUES ('$user','$pr_id','$pr_name','$qnt','$total')";
                        
                $qry = mysqli_query($con, $ord);
                if(!$qry){
                    die("query failed" . mysqli_error());
                    }
                }
            
        if($qnty>0){
                func($connect,$user,$pr_id,$pr_name,$qnty,$total);
        }
            echo "<div class='button'>";
            echo "<a href='retrieve2.php?pr_name=". $pr_name ." &prc= ".$prc." &pid=".$pr_id."'> <button type='submit' class='button1'>View My Cart</button></a>";
            echo "<a href='details.php?var=".$catid."'> <button type='submit' class='button1'>Go Back To Add More</button> </a>";
            echo "</div>";
    }
    else{
            echo "<div class='button'>";
            echo "<a href='retrieve2.php'> <button type='submit' class='button1'>View My Cart</button></a>";
            echo "<a href='details.php?var=".$catid."'> <button type='submit' class='button1'>Go Back To Add More</button> </a>";
            echo "</div>";
    }

    ?>  
    </div>
</body>
</html>

