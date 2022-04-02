<?php
include "connection.php";

$name = $_POST['user'];
$email = $_POST['mail'];
$pass = $_POST['pass'];
$remember_me = $_POST['remember_me'];

$check = "SELECT * FROM loginform WHERE Name = '$name' && Password = '$pass';";
$result = mysqli_query($connect, $check);
$num = mysqli_num_rows($result);
if($num == 1){
    if($remember_me=='1' || $remember_me=='on')
                    {
                    $hour = time() + 3600 * 24 * 30;
                    setcookie('username', $name, $hour);
                    setcookie('password', $pass, $hour);
                    setcookie('email',$email,$hour);
                    }
    $_SESSION['username'] = $name;
    $_SESSION['password'] = $pass;
    $_SESSION['email'] = $email;
    if($_SESSION['username'] == "admin" && $_SESSION['email'] == "admin@gmail.com"){
        header('location:admin.php');
    }
    else{
    header('location:home.php');
    }
   
}
else{
    //echo "Login failed. Incorrect password or username";
    //$_SESSION['message'] = 'Login failed. Incorrect password or username';
    $_SESSION['username'] = NULL;
    $_SESSION['password'] = NULL;
    ?>
    <script>
    alert("Sorry,wrong username or password");
    setTimeout("location.href = 'login.php';");
    </script>
    <?php
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
</body>
</html>