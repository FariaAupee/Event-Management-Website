<?php

include "connection.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        *{
    margin: 0%;
    padding: 0%;
    box-sizing: border-box;
}
body
{
     font-family: sans-serif;
     display: flex;
     flex-wrap: wrap;
     justify-content: center;
}
.menu-bar
{
    /*background-color: #8080ff;*/
    /*background-color: #00cccc;*/
    width: 100%;
    background-color:  #ffffcc;
    text-align: center;
    height: 100px;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}
.menu-bar ul
{
    display: flex;
    flex-wrap: wrap;
    list-style: none;
    color: #fff;
}
.menu-bar ul li
{   
    display: flex;
    flex-wrap: wrap;
    width: 135px;
    margin: 30px;
    padding: 15px;
}
.menu-bar ul li a
{
    text-decoration: none;
    /*color: #fff;*/
    color: black;
}
.menu-bar ul li:hover
{
    /*background: #ccccff;*/
    /*background: #008080;*/
    background: #ffffb3;
    border-radius: 3px; 
}
.sub-menu-1
{
    display: none;
    border-radius: 6px;
}
.menu-bar ul li:hover .sub-menu-1
{
    display: block;
    position: absolute;
    /*background-color: #8080ff;*/
    /*background-color: #00cccc;*/
    background-color: #ffffb3;
    margin-top: 15px;
    margin-left: -15px;
}
.menu-bar ul li:hover .sub-menu-1 ul
{
    display: block;
    margin: 10px;
}
.menu-bar ul li:hover .sub-menu-1 ul li
{
    width: 150px;
    padding: 0;
    border-bottom: 1px dotted black;
    background: transparent;
    border-radius: 0;
    text-align: left;
}
.menu-bar ul li:hover .sub-menu-1 ul li:last-child
{
    border-bottom: none;
}
.menu-bar ul li:hover .sub-menu-1 ul li a:hover
{
    /*color: #008080;*/
    background-color: #ffffcc;
}
.logo
{
    margin-top: 0px;
    margin-left: -200px;
    width: 150px;
    height: 100px;
    padding: 15px;
}
/*.show{
    visibility:hidden;
}
.shopping:hover .show{
    visibility: visible;
    display: flex;
    justify-content: center;
    height: 200px;
    width:  100px;
    background-image: url("pictures/wp35.jpg");
    background-size:  cover;
    background-position: center;
    position: absolute;
    background-color: black;
    }*/
/*.logo:hover
{
    transform: scale(1.5);
}*/

</style>
</head>
<body>
            <?php $user = $_SESSION['username']; $email = $_SESSION['email'];?>
            <div class="menu-bar">
                <ul>
                    <a href="#"><img src="pictures/wp17.jpg" class="logo"></a>
                    <li><a href = "home.php"><i class="fa fa-home"></i> HOME </a></li>
                    <li><a href="#"><i class="fa fa-clone"></i> SERVICES </a>
                    <div class="sub-menu-1">
                    <ul>
                    <li><a href="wedding.php"> Weddings </a></li>
                    <li><a href="bday.php"> Birthdays </a></li>
                    <li><a href="decor.php"> Home decor </a></li>
                    </ul>
                    </div>
            
                    <li><a href="#"><i class="fa fa-picture-o"></i> GALLERY </a>
                    <div class="sub-menu-1">
                    <ul>
                    <li><a href="gallery_wedding.php"> Weddings </a></li>
                    <li><a href="gallery_bday.php"> Birthdays </a></li>
                    <li><a href="gallery_decor.php"> Home decor </a></li>
                    </ul>
                    </div>
        
                    <li><a href="#"><i class="fa fa-phone"></i> CONNECT </a></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out"></i> LOGOUT </a></li>
                    <li><a href="profile.php"><i class="fa fa-user-circle"></i> <?php echo "{$user}"; ?> </a></li>
                </ul>
            </div>
</body>
</html>