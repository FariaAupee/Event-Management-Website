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
    .flex-container
    {
        display:flex;
        flex-wrap: wrap;
        flex-direction: row;
        justify-content: center;
        margin: 60px;
    }
    .flex-container .card {
        background-color: #f1f1f1;
        margin: 10px;
        padding: 0px;
        font-size: 20px;
        height: 380px;
        width: 270px;
        justify-content: center;
    }
    .container{
        background-color:  #ffffcc;
    }
    .container a
    {
        text-decoration: none;
        color: black;
        text-align: center;
    }
    .cart
    {
        flex-shrink: 10;
        margin: 2px;
        text-align: center;
    }
    .newbutton{
        /*background-color: #ffdb4d;*/
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 10px;
    }
    .button{
        background-color: #ffdb4d;
        width: 100px;
        text-align: center;
    }
    </style>
</head>
<body>
    <div class="flex-container">
        <?php 
       
            //$wed = $_SESSION['var'];
            //echo $catid;echo "<br>";
            //$pr_name="";$prc="";
            $catid = $_GET['var'];
            //$eveid = $_GET['eve'];
            //$eveid = $_SESSION['evd'];
            $query = "SELECT img,prod_id,prod_name,price,quantity FROM details WHERE cat_id = '$catid';";
            $result = mysqli_query($connect,$query);
                if(!$result){
                die("query failed" . mysqli_error());
            }
            
            while($data2 = mysqli_fetch_assoc($result)){
                echo "<div class = 'card'>";
                echo "<a href='#'> <img src='pictures/" . $data2['img'] . "'width = '100%' height = '300' > </a><br>";
                    echo "<div class = 'container'>";
                        echo "<a href='#'> <h6>Name: {$data2['prod_name']}</h6> </a>";
                        if ($catid == 1 || $catid == 2 || $catid ==3){
                        echo "<a href='#'> <h6>Price: {$data2['price']} TK</h6> </a>";
                        }
                        //echo "<a href='#'> <h6>Quantity: {$data2['quantity']}</h6> </a>";
                    echo "</div>";

                    echo "<div class = 'cart'>";
                    $pr_name = $data2['prod_name'];
                    $prc = $data2['price'];
                    $pr_id = $data2['prod_id'];
                    $quantity = "Qnty".$pr_id;
                    $dateid = "date".$pr_id;
                    if($catid == 1 || $catid == 2 || $catid ==3 || $catid == 6 || $catid == 7 || $catid ==9 || $catid == 10 || $catid ==11){
                    echo "<input type='number' class='cart' id='$quantity' placeholder='Quantity'>";
                    echo "<button type='submit' class='button' onclick='getNamePrice(\" $pr_name \", $prc, $quantity,$pr_id,$catid);'>Add to Cart</button>";
                    }
                    else{
                    echo "<input type='datetime-local' class='cart' id='$dateid' placeholder='Date'>";
                    echo "<button type='submit' class='button' onclick='getBooked(\" $pr_name \",$pr_id,$catid);'>Book</button>";
                    }
                    echo "</div>";
                echo "</div>";
            }
        ?>
    </div>
            <?php
                if($user =="admin" && $email="admin@gmail.com"){
                    echo "<div class='newbutton'";
                    echo "<form action='' method='post' enctype='multipart/form-data'>";
                        echo "<button type='submit' class='button' onclick='insert()'>Edit</button>";
                    echo "</form>";
                    echo "</div>";
                }
            ?>
    <script>
        function getNamePrice(pr_name,prc,quantity,pr_id,ctid){
                    //console.log(pr_name);
                    //console.log(prc);
                    var p_name = pr_name;
                    var price = prc;
                    var qnty =quantity.value;
                    var prid = pr_id;
                    //var qnt = document.getElementById('Qnty').value;
                    var total = price * qnty;
                    var catid = ctid;
                    <?php $_SESSION['var'] = "1"; ?>
                    console.log(qnty);
                    window.location.href = "cart.php?pr_name="+p_name+"&p_price="+price+"&qnty="+qnty+"&total="+total+"&pid="+prid+"&catid="+catid;
                }
        function getBooked(pr_name,pr_id,ctid){
                    var bname = pr_name;
                    var bid = pr_id;
                    var catid = ctid;
                    window.location.href = "cart.php?bname="+p_name+"&bid="+pr_id+"&catid="+catid;
        }
        function insert(){
                    window.location.href = "insert.php";
        }
    </script>
</body>
</html>