<?php
    require 'connect.php';
    if(empty($_SESSION['username'])) {
        header("Location: login.php");
    }
    
    
    $myusername = $_SESSION['username'];
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $message = mysqli_real_escape_string($db,nl2br($_POST['message']));
        $sendto = mysqli_real_escape_string($db,$_POST['sendto']); 
      
        $mysql = "INSERT INTO `Messages` VALUES (CURRENT_TIMESTAMP(), NULL, '$myusername', '$sendto', '$message')";
        $result = mysqli_query($db,$mysql);
        print(mysqli_error($db));
   }
?>
<html>
    <head>
        <?php require 'header.php'; ?>
        <title>Chat</title>
    </head>
    <body>
        <?php require 'nav.php'; ?>
        
        <button id="edit-button" onclick="location.href = 'feed.php';"><i class="fas fa-home"></i></button>
        
        <div id="message-container">
            <h2>Messages:</h2>
            <?php
                $query = "SELECT * FROM `Messages` WHERE `SendTo`= '$myusername' ORDER BY Date DESC;";
                $results = mysqli_query($db, $query);
            
                while ($row = mysqli_fetch_array($results)) {
                    print("<div class='message'><u>From: " . $row[2] . "</u><br><br>" . $row[4] . "</div>");
                }
            ?>
            <br>
            <hr>
            <form method="POST">
                Reply/Send Message:<br>
                <input type="text" name="sendto" placeholder="To..." /><br><br>
                <textarea name="message" cols="50" id="message-box" placeholder="Type message here..."></textarea><br>
                <input type="submit" Value="Send..." />
            </form>
        </div>
        
    </body>
</html>