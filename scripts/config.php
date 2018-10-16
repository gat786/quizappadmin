<?php

    $servername = "159.89.161.122";
    $username = "ganesh";
    $password = "hotMAIL123@";

    $conn = new mysqli($servername,$username,$password,"trivia_db");

    if($conn->connect_error)
    {
        die("Connection Failed".$conn->connect_error);
    }
?>
