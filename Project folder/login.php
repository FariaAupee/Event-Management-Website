<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login and Registration page</title>
    <link rel = "stylesheet" href = "style.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="inner_box" id="card">
                <div class="card_front">
                    <h2>LOGIN</h2>
                    <form action="validation.php" method="post">
                        <?php
                        if(isset($_COOKIE['username'])!=NULL && isset($_COOKIE['password'])!=NULL && isset($_COOKIE['email'])){
                            $name = $_COOKIE['username'];
                            $pass = $_COOKIE['password'];
                            $email = $_COOKIE['email'];
                            echo "<input type='text' name='user' class='input-box'placeholder='User Name'required value=".$name.">";
                            echo "<input type='email' name='mail' class='input-box' placeholder='Your Email ID'required value=".$email.">";
                            echo "<input type='password' name='pass' class='input-box' placeholder='Password' required value=".$pass.">";
                            echo "<button type='submit' class='submit-btn'>Submit</button>";
                            echo "<input type='checkbox' name='remember_me' value='1'><span>Remember Me</span>";
                                
                        }

                        else{
                        echo "<input type='text' name='user' class='input-box' placeholder='User Name' required>";
                        echo "<input type='email' name='mail' class='input-box' placeholder='Your Email ID' required>";
                        echo "<input type='password' name='pass' class='input-box' placeholder='Password' required>";
                        echo "<button type='submit' class='submit-btn'>Submit</button>";
                        echo "<input type='checkbox' name='remember_me' value='1'><span>Remember Me</span>";
                        }
                        ?>
                        <?php
if (isset($_SESSION['message'])){
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}
?>
                    </form>
                    <button type="button" class="btn" onclick="openRegister()">I'm new here</button>
                    <a href="">Forgot Password?</a>
                </div>
                <div class="card_back">
                    <h2>REGISTER</h2>
                    <form action="registration.php" method="post">
                    <?php
                    if(isset($_COOKIE['username'])!=NULL && isset($_COOKIE['password'])!=NULL && isset($_COOKIE['email'])){
                        echo "<input type='text' name='user' class='input-box' placeholder='User Name' required>";
                        echo "<input type='email' name='mail' class='input-box' placeholder='Your Email ID' required>";
                        echo "<input type='password' name='pass' class='input-box' placeholder='Password' required>";
                        echo "<button type='submit' class='submit-btn'>Submit</button>";
                        echo "<input type='checkbox' name='remember_me' value='1'><span>Remember Me</span>";
                        }
                    ?>
                    </form>
                    <button type="button" class="btn" onclick="openLogin()">I already have an account</button>
                    <a href="">Forgot Password?</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        var card = document.getElementById("card");
        function openRegister(){
            card.style.transform = "rotateY(-180deg)";
        }
        function openLogin(){
            card.style.transform = "rotateY(0deg)";
        }
    </script>

</body>
</html>