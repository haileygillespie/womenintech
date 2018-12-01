<?php
    require 'connect.php';
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $myemail = mysqli_real_escape_string($db,$_POST['email']);
        $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
        $sql = "SELECT * FROM `Users` WHERE Email = '$myemail' and Password = '$mypassword'";
        $result = mysqli_query($db,$sql);
        if ($row = mysqli_fetch_row($result)) {
        
            $_SESSION['username'] = $row[1];
            $_SESSION['id'] = $row[0];
        
            header('Location: feed.php');
        } else {
            echo "<script type='text/javascript'>alert('Incorrect Login Info!')</script>";
        }
   }
?>

<html>
    <head>
        <?php require 'header.php'; ?>
        <title>Login</title>
    </head>
    
    <body>
        <?php require 'nav.php'; ?>
        
        <div class="log-box">
            <h1>Login...</h1>
            <form method="post">
                <input type="email" name="email" placeholder="Email..." /><br>
                <input type="password" name="password" placeholder="Password..." /><br>
                <input type="submit" name="submit" Value="Sign In!" />
            </form>
        </div>
    </body>
</html>