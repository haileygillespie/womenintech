<?php
    require 'connect.php';
    
    $postid = mysqli_real_escape_string($db,$_GET['postid']);
    $query="SELECT * FROM `Posts` WHERE PostID = '$postid'";
    $results = mysqli_query($db, $query);
    $row = mysqli_fetch_array($results);
?>

<html>
    <head>
        <?php require 'header.php'; ?>
        <title><?php echo $row[2] ?></title>
    </head>
    <body>
        <div id="nav">
            <div id="nav-align-left">
                <h1><a href="index.php"><i>Women In Tech</i></a></h1>
            </div>
            <div id="nav-align-right">
                <a href="index.php">Home</a>
                <a href="stats.php">Stats</a>
                <a href="signup.php">Sign-Up!</a>
                <a href="login.php">Login</a>
                <?php
                    if (isset($_SESSION['username'])) {
                        print("<a href='logout.php'>Log-Out</a>");
                    } 
                ?>
            </div>
        </div>
        
        <button id="edit-button" onclick="location.href = 'feed.php';"><i class="fas fa-home"></i></button>
        <div></div>
        <button style="margin-top: 55px;"id="edit-button" onclick="">
            <!--1 spaces before, and then the 3 ellipsis, and then 1 spaces after-->
            &nbsp;
                <i class="fas fa-ellipsis-v"></i>
            &nbsp;
        </button>
        
        <div style="padding: 75px; width: 75%">
            <h1><?php echo $row[2] ?></h1>
            <p><?php echo $row[1] ?></p>
            <p><?php echo $row[3] ?></p>
        </div>
    </body>
</html>