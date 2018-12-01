<?php
    require 'connect.php';
?>

<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    </head>
    <body>
        <div id="nav">
            <div id="nav-align-left">
                <h1><a href="index.php"><i>Women In Tech</i></a></h1>
            </div>
            <div id="nav-align-right">
                <a href="feed.php">Feed</a>
                <a href="signup.php">Sign-Up!</a>
                <a href="login.php">Login</a>
                <?php
                    if (isset($_SESSION['username'])) {
                        print("<a href='logout.php'>Log-Out</a>");
                    } 
                ?>
            </div>
        </div>
    </body>
</html>