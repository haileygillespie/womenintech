<?php
    session_start();

    $servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $database = "c9";
    $dbport = 3306;

    $db = new mysqli($servername, $username, $password, $database, $dbport);

    /** Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    } 
    echo "Connected successfully (".$db->host_info.")";
    **/
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $myemail = mysqli_real_escape_string($db,$_POST['email']);
        $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
        $myusername = mysqli_real_escape_string($db,$_POST['username']); 
      
        $sql = "INSERT INTO Users (ID, Username, Password, Email) VALUES (NULL, $myusername, $mypassword, $myemail)";
        $result = mysqli_query($db,$sql);
        
        header('Location: login.php');
   }
?>

<html>
    <title>Login</title>
    <h1>Sign Up...</h1>
    <form method="post">
        <input type="email" name="email" placeholder="Email..." /><br>
        <input type="username" name="username" placeholder="Username..." /><br>
        <input type="password" name="password" placeholder="Password..." /><br>
        <input type="submit" name="submit" Value="Sign In!" />
    </form>
</html>