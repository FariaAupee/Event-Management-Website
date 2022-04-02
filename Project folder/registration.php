<?php
include "connection.php";
header('location:home.php');

$name = $_POST['user'];
$email = $_POST['mail'];
$pass = $_POST['pass'];
$remember_me = $_POST['remember_me'];

$check = "SELECT * FROM loginform WHERE Name = '$name';";
$result = mysqli_query($connect, $check);
$num = mysqli_num_rows($result);
if($num == 1){
    ?>
    <script>
    alert("Sorry,Username already taken");
    setTimeout("location.href = 'registration.php';");
    </script>
    <?php
}
else{
    $reg = "INSERT INTO loginform(Name, Email, Password) VALUES('$name', '$email', '$pass');";
    mysqli_query($connect, $reg);
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
    header('location:home.php');
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