<?php
    session_start();
    $servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $database = "c9";
    $dbport = 3306;

    $db = new mysqli($servername, $username, $password, $database, $dbport);
?>