<?php
session_start();
include "dbconnect.php";
if (isset($_POST['submit'])) {
    if ($_POST['submit'] == "Sign In") {
        $email = $_POST['login_email'];
        $password = $_POST['login_password'];
        $query = "SELECT * from users where Email ='$email' AND Password='$password'";
        $result = mysqli_query($con, $query);
        $currentCookieParams = session_get_cookie_params();
        $sidvalue = session_id();
        setcookie(
            'PHPSESSID',
            //name  
            $sidvalue,
            //value  
            0, //expires at end of session  
            $currentCookieParams['path'], //path  
            $currentCookieParams['domain'],
            //domain  
            true,
            true //secure  
        );
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['user'] = $row['UserName'];
            $_SESSION['email'] = $row['Email'];
            $_SESSION['password'] = $row['Password'];
        } else {
            print '
              <script type="text/javascript">alert("Incorrect Username Or Password!!");</script>
                  ';
        }
    } else if ($_POST['submit'] == "Sign Up") {
        $email = $_POST['register_email'];
        $username = $_POST['register_username'];
        $password = $_POST['register_password'];
        $query = "select * from users where Email = '$email'";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) > 0) {
            print '
               <script type="text/javascript">alert("Email is taken");</script>
                    ';

        } else {
            $query = "INSERT INTO users VALUES ('$username','$email','$password')";
            $result = mysqli_query($con, $query);
            print '
                <script type="text/javascript">
                 alert("Successfully Registered!!!");
                </script>
               ';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    if (!isset($_SESSION['user'])) { ?>
        <div class="container" id="container">
            <div class="form-container sign-up-container">
                <form action="index.php" method="post">
                    <h1>Create Account</h1>
                    <input type="text" name="register_username" placeholder="Name" />
                    <input type="email" name="register_email" placeholder="Email" />
                    <input type="password" name="register_password" placeholder="Password" />
                    <button type="submit" name="submit" value="Sign Up">Sign Up</button>
                </form>
            </div>
            <div class="form-container sign-in-container">
                <form action="index.php" method="post">
                    <h1>Sign in</h1>
                    <input type="email" name="login_email" placeholder="Email" />
                    <input type="password" name="login_password" placeholder="Password" />
                    <a href="#">Forgot your password?</a>
                    <button type="submit" name="submit" value="Sign In">Sign In</button>
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>Welcome Back!</h1>
                        <p>To keep connected with us please login with your personal info</p>
                        <button class="ghost" id="signIn">Sign In</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1>Hello, Friend!</h1>
                        <p>Enter your personal details and start journey with us</p>
                        <button class="ghost" id="signUp">Sign Up</button>
                    </div>
                </div>
            </div>
        </div>
        <script src="animation.js"></script>';
    <?php } else { ?>
        <div class="container" id="container" style=" width: 372px; ">
            <div class="form-container sign-in-container">
                <form action="Change.php?session_id=<?php echo session_id(); ?>" method="post" style=" width: 372px; ">
                    <h1>Change Email</h1>
                    <?php echo "<p>Email : " . $_SESSION['email'] . "</p>"; ?>
                    <?php if (isset($_GET['email'])) {
                        echo '<input required type="email" name="email" value=' . $_GET['email'] . '>';
                    } else {
                        echo '<input required type="email" name="email">';
                    } ?>
                    <button type="submit" name="submit">Change</button>
                    <a href="logout.php">Log out</a>
                </form>
            </div>
        </div>
    <?php } ?>

</body>

</html>