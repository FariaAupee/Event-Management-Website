<?php

session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
    <link rel="stylesheet"href="stylehome.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php $user =  $_SESSION['username']; $email = $_SESSION['email']; ?>
    <div class="container">
    <div class="photodiv"></div>
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
    </div>
    <section class="aboutus">
        <div>
        <h2 class="text-center">About Us</h2>
        </div>
        <div class="container-fluid">
            <div class="picture">
                <img src="pictures/wp7.jpg">
            </div>
            <div class="writing">
                <h2>Make your dream event come alive with us.</h2>
                <br>
                <p class="py-5"> We bring a fresh, unique approach to the event management industry. We are not party planners.
                    We are strategic event management company. We understand that a properly executed event can be
                    leveraged to support an organization’s strategic vision,
                    incorporated into a company’s marketing plan, or used to build networks and client loyalty.
                    We approach every project with meticulous attention to detail and precision. Regardless of size and scope, 
                    we treat your event like a business with clear strategic goals, defined milestones, 
                    and a comprehensive plan to ensure that your event is delivered on time and on budget.
                     At Spark, we put your organization first. We learn about your business, 
                     we focus on your challenges, and we plan events to support your goals.
                    Laser sharp focus, unparalleled professionalism and exceptional service means 
                    clients can trust that their event is in capable hands.</p>
                    <br><br>
                <a href="about.php" class="btn btn-success">Check More</a>
            </div>
        </div>
    </section>
</body>
</html>