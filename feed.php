<?php
    session_start();
    
    $servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $database = "c9";
    $dbport = 3306;

    $db = new mysqli($servername, $username, $password, $database, $dbport);
    
    
    if(empty($_SESSION['username'])) {
        header("Location: login.php");
    }
?>

<html>
    <link rel="stylesheet" href="style.css">
    <title>Feed</title>
    
    <div class="column-container">
        <div id="primary-feed-stuff">
            <h2>Welcome back, <?php print($_SESSION["username"]); ?> !</h2>
            <form method="POST">
                <input name="title" type="title" placeholder="Title..." /><br>
                <textarea name="content" rows="5" cols="50" id="post-box" placeholder="Content..."></textarea><br>
                <input name="submit" type="submit" Value="Post" />
            </form>
        </div>
        
        <div id="post-container">
            <?php
                $query="SELECT * FROM Posts";
                $results = mysqli_query($db, $query);
            
                while ($row = mysqli_fetch_array($results)) {
                    echo "<div class='post'>";
                    print($row[1]);
                    echo "</div>";
                }
            ?>
        </div>
    </div>
    
</html>