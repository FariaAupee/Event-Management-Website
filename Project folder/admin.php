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
        body{
            background-image: url("pictures/wp25.jpg");
            background-size: cover;
            background-position: center;
        }
        .button{
            display: inline-block;
            padding: 5px 10px;
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
        .button:hover {background-color: #ffffcc}

        .button:active {
            background-color: #ffff66;
            box-shadow: 0 5px #666;
            transform: translateY(4px);
        }
        .button a{
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
            <a href="insert.php"><button type="submit" class="button">GO TO EDIT</button></a>
            <a href="showOrders.php"><button type="submit" class="button">SHOW ORDER DETAILS</button></a>
    </div>
    <script>
        function ins(){
            window.location.href= "insert.php";
        }
        function show(){
            window.location.href= "showOrders.php";
        }
    </script>
</body>
</html>