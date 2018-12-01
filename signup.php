<?php
    require 'connect.php';
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $myemail = mysqli_real_escape_string($db,$_POST['email']);
        $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
        $myusername = mysqli_real_escape_string($db,$_POST['username']); 
      
        $sql = "INSERT INTO `Users` VALUES (NULL, '$myusername', '$mypassword', '$myemail');";
        $result = mysqli_query($db,$sql);
        
        header('Location: login.php');
   }
?>

<html>
    <head>
        <title>Sign Up...</title>
        <?php require 'header.php'; ?>
    </head>
    
    <body>
        <?php require 'nav.php'; ?>
        
        <div class="log-box">
            <h1>Sign Up...</h1>
            <form method="post">
                <input type="email" name="email" placeholder="Email..." /><br>
                <input type="username" name="username" placeholder="Username..." /><br>
                <input type="password" name="password" placeholder="Password..." /><br><br>
                <input type="submit" name="submit" Value="Sign Up!" />
            </form>
        </div>
    </body>
</html>