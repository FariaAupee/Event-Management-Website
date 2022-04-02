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
    .flex-container > div {
        background-color: #f1f1f1;
        margin: 10px;
        padding: 0px;
        font-size: 20px;
        height: 400px;
        width: 250px;
        justify-content: center;
        align-items: center;
    }
    .card:hover
    {
        transform: scale(1.1);
    }
    .container
    {
        text-align: center;
    }
    .container a
    {
        text-decoration: none;
        color: black;
    }
    </style>
</head>
<body>
    <div class="flex-container">
        <?php 
            //$criteria = $_SESSION['crt'];
            $query = "SELECT category,image FROM event_category WHERE event_id = 1;";
            $result = mysqli_query($connect,$query);
            //$_SESSION['var'] = $result;
            if(!$result){
                die("query failed" . mysqli_error());
            }
            while($data = mysqli_fetch_assoc($result)){

                $catname = $data['category'];
                $c_id = "SELECT cat_id,event_id FROM event_category WHERE category = '$catname';";
                $con = mysqli_query($connect, $c_id);
                $cidata = mysqli_fetch_assoc($con);
                $catid =  $cidata['cat_id'];echo"<br>";
                $eveid = $cidata['event_id'];

                echo "<div class = 'card'>";
                echo "<a href='details.php?var=" . $catid ."'> <img src='pictures/" . $data['image'] . "'width = '100%' height = '300' > </a>";
                echo "<div class = 'container'>";
                echo "<a href='details.php?var=" . $catid ."'> <h4>{$data['category']}</h4> </a>";
                echo "</div>";
                echo "</div>";
                //echo $catid;echo "<br>";
            }
        ?>
    </div>
</body>
</html>