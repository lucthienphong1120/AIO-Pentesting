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
    session_id($_GET['session_id']);
    session_start();
    include "dbconnect.php";
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $username = $_SESSION['user'];
        $query = "UPDATE users SET Email='$email' WHERE UserName='$username'";
        $result = mysqli_query($con, $query);
        $_SESSION['email'] = $email;


    } ?>
    <div class="container" id="container" style=" width: 372px; ">
        <div class="form-container sign-in-container">
            <form action="Change.php?session_id=<?php echo session_id(); ?>" method="post" style=" width: 372px; ">
                <h1>Change Email</h1>
                <?php echo "<p>Email : " . $_SESSION['email'] . "</p>" ?>
                <input type="email" name="email" placeholder="Email" />
                <button type="submit" name="submit">Change</button>
                <a href="logout.php">Log out</a>
                </a>

            </form>
        </div>
    </div>
</body>

</html>