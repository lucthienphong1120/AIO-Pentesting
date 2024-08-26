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
    session_start();
    include "dbconnect.php";
    if ($_COOKIE["_CSRF"] == $_REQUEST["_csrf"]) {
        $email = $_REQUEST['email'];
        $username = $_SESSION['user'];
        $password = $_SESSION['password'];
        $query = "UPDATE users SET Email='$email' WHERE UserName='$username' AND Password='$password'";
        $result = mysqli_query($con, $query) or die(mysql_error);
        $_SESSION['email'] = $_REQUEST['email'];
        echo '<div class="container" id="container" style=" width: 372px; " >
        <div class="form-container sign-in-container"  >
            <form action="Change.php" method="post" style=" width: 372px; ">
                <h1>Change Email</h1>
                <p>Email : ' . $_SESSION['email'] . '</p>
                <input type="email" name="email" placeholder="Email" />
                <input type="hidden" name="_csrf" value=' . $_SESSION["_csrf"] . '>
                <button >Change</button>
                <a href="logout.php">Log out</a>
                <a href="https://edd3-2a09-bac1-7ac0-50-00-246-6b.ap.ngrok.io/hack/">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQMweSAxAGXzsOx_RS8YHu8cX429fyLHZQfAQ&usqp=CAU" style="
                width: 149px;">
                </a>
                
            </form>
        </div>
    </div>';
    } else {
        echo '<div class="container" id="container" style=" width: 372px; " >
        <div class="form-container sign-in-container"  >
            <form action="Change.php" method="post" style=" width: 372px; ">
                <h1>Change Email</h1>
                <p>Email : ' . $_SESSION['email'] . '</p>
                <input type="email" name="email" placeholder="Email" />
                <input type="hidden" name="_csrf" value=' . $_SESSION["_csrf"] . '>
                <p>Anti CSRF token is missing or wrong</p>
                <button >Change</button>
                <a href="logout.php">Log out</a>
            </form>
        </div>
    </div>';
    }
    ?>
</body>

</html>