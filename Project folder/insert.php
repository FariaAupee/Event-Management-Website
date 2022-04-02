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
        form 
        {
            display: flex;
            flex-wrap: wrap;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-left: 20px;
            width: 100%;
        }
        fieldset
        {
            display: flex;
            align-items: center;
            margin-top: 20px;
            width: 90%;
            flex-direction: column;
            flex-shrink: 3;
            flex-wrap: wrap;
        }
        .upload
        {
            display: flex;
            flex-wrap: wrap;
            width: 10%;
            justify-content: center;
        }
        .product
        {
            display: inline-flex;
            flex-direction: row;
        }
    </style>
</head>
<body>
        <form method="post" action="" enctype="multipart/form-data">
        <fieldset>
            <legend>Insert Details:</legend><br>
            <label for="Criteria" >Criteria for insertion:</label><br>
                <input list="Criteria" name="criteria" required>
                <datalist id=Criteria>
                    <option value="Services">
                    <option value="Gallery">
                </datalist><br><br>
                <label for="events" >Choose Event/Decor:</label><br>
                <input list="events" name="event_name" required>
                <datalist id="events">
                    <option value="Wedding">
                    <option value="Birthdays">
                    <option value="Home Decor">
                    <option value="Gallery">
                </datalist><br><br>
            <label for="category" >Existing Category:</label><br>
                <input list="categories" name="cat_name" required>
                <datalist id="categories">
                    <option value="Flowers">
                    <option value="catering">
                    <option value="Wedding Cakes">
                    <option value="Table Setting">
                    <option value="Stage">
                    <option value="Birthday Cakes">
                    <option value="Balloons">
                    <option value="Themes">
                    <option value="Lights">
                    <option value="Decorative Pieces">
                    <option value="Paintings">
                </datalist><br><br>
                <input type="text" name="prod_name" placeholder="Name of the item" class="product"/><br>
                <input type="number" name="price" placeholder="Price" class="product"/><br>
                <input type="number" name="quantity" placeholder="Quantity" class="product"/><br>
        </fieldset><br>
        Select image to upload:<br><br>
        <input type="file" name="image" class="upload" required/><br>
        <input type="submit" name="submit" class="upload" value="Upload" required/><br>
        </form>
    <?php
      if(isset($_POST['submit'])){
        $eve_name = $_POST["event_name"];
        $catname = $_POST["cat_name"];
        $pr_name = $_POST['prod_name'];
        $price = $_POST["price"];
        $quantity = $_POST["quantity"];
        $crt = $_POST['criteria'];
        //echo $pid;
        echo "<br>";
        $filename = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];    
        $folder = "pictures/$filename";
            //Insert image content into database
            /*$e_id = "SELECT event_id FROM event_names WHERE name = '$eve_name';";
            $qr = mysqli_query($connect,$e_id);
            $res = mysqli_fetch_assoc($qr);
            $eveid =  $res['event_id'];echo"<br>";*/

            $c_id = "SELECT cat_id FROM event_category WHERE category = '$catname';";
            $con = mysqli_query($connect, $c_id);
            $data = mysqli_fetch_assoc($con);
            $catid =  $data['cat_id'];echo"<br>";
            if(!$con){
                die("query failed" . mysqli_error());
            }  
            if($crt == "Services"){
                $var = "1";
            if($pr_name == NULL){
                $update = "UPDATE event_category SET image='$filename' WHERE category = '$catname';";
                $result = mysqli_query($connect, $update);
            }
            else{
                $insert = "INSERT INTO details (cat_id,img,prod_name,price,quantity)";
                $insert .= "VALUES ('$catid','$filename','$pr_name','$price','$quantity')";
                $result = mysqli_query($connect, $insert);
            }
            }
            else if($crt == "Gallery"){
                $var = "2";
            if($pr_name == NULL){
                $update = "UPDATE gallery_category SET image='$filename' WHERE cat_name = '$catname';";
                $result = mysqli_query($connect, $update);
            }
            else{
                $insert = "INSERT INTO gallery_details (cat_id,img,prod_name)";
                $insert .= "VALUES ('$catid','$filename','$pr_name')";
                $result = mysqli_query($connect, $insert);
            }
            }
            $_SESSION['crt'] = $var;
            if(!$result){
                die("query failed" . mysqli_error());
            }

            if(move_uploaded_file($tempname, $folder)){
                echo "File uploaded successfully.";
            }else{
                echo "File upload failed, please try again.";
            }
        }
?>
        <script>
                function show(){
                    window.location.href = "showOrders.php";
                }
        </script>
</body>
</html>
