<?php
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $_SESSION = array();
        session_destroy();
        header("Location: index.php");
    }
?>

<html>
    <h1>Log out...</h1>
    <form method="POST">
        <input type="submit" name="submit" Value="Log Out...">
    </form>
</html>