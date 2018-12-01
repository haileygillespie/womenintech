<?php
    require 'connect.php';
    if(empty($_SESSION['username'])) {
        header("Location: login.php");
    }
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $mytitle = mysqli_real_escape_string($db,$_POST['title']);
        $mycontent = mysqli_real_escape_string($db,nl2br($_POST['content'])); 
        $myusername = $_SESSION['username'];
      
        $mysql = "INSERT INTO `Posts` VALUES (NULL, '$myusername', '$mytitle', '$mycontent', CURRENT_TIMESTAMP())";
        $result = mysqli_query($db,$mysql);
        print(mysqli_error($db));
   }
?>

<html>
    <head>
        <?php require 'header.php'; ?>
        <title>Feed</title>
    </head>
    <body>
        <?php require 'nav.php'; ?>
        
        <div onClick="showPostBox();">
            <button id="edit-button"><i class="fas fa-pencil-alt"></i></button>
        </div>
       
       <button id="chat-button" onclick="location.href = 'chat.php';"><i class="fas fa-comment"></i></button>
       
        <br>
        <br>
       
       <h2 style="text-align: center">Welcome back, <?php print($_SESSION["username"]); ?> !</h2>
       
        <div id="feed-stuff-container">
            <div id="primary-feed-stuff">
                <h2>Create post...</h2>
                <form method="POST">
                    <textarea name="title" cols="50" id="post-box" placeholder="Title..."></textarea><br>
                    <br>
                    <textarea name="content" rows="10" cols="50" id="post-box" placeholder="Content..."></textarea><br>
                    <input name="submit" type="submit" Value="Post" />
                </form>
            </div>
        </div>
        <div id="post-container">
            <?php
                $query="SELECT * FROM Posts ORDER BY PostID DESC";
                $results = mysqli_query($db, $query);
            
                while ($row = mysqli_fetch_array($results)) {
                    echo "<div class='post'>";
                    print("<a style='text-decoration: none; color: black;' href='post.php?postid=" . $row[0] . "'>
                                <h1>
                                    <u>
                                        " . $row[2] . "
                                    </u>
                                </h1>
                            </a>");
                    print($row[1] . "<hr><br>");
                    print($row[3]);
                    echo "</div>";
                }
            ?>
        </div>
        <script src="myscript.js"></script>
    </body>
</html>