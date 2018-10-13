<?php

    $servername = "*.*.*.*";
    $username = "*";
    $password = "*";

    $conn = new mysqli($servername,$username,$password,"trivia_db");

    if($conn->connect_error)
    {
        die("Connection Failed".$conn->connect_error);
    }
?>
