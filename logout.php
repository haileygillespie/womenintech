<?php
    require 'connect.php';

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $_SESSION = array();
        session_destroy();
        header("Location: index.php");
    }
?>

<html>
    <head>
        <title>Log Out...</title>
        <?php require 'header.php'; ?>
    </head>
    
    <body>
        <?php require 'nav.php'; ?>
        
        <div class="log-box">
            <h1>Log out...</h1>
            <form method="POST">
                <input type="submit" name="submit" Value="Log Out...">
            </form>
        </div>
    </body>
</html>