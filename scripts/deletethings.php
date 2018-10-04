<?php 
    $id=$_REQUEST["id"];
    $table_name=$_REQUEST["table"];

    $servername = "localhost";
    $username = "ganesh";
    $password = "123456";
    $table_name = "trivia_db";

    $conn = new mysqli($servername,$username,$password,$table_name);

    if($conn->connect_error)
    {
        die("Connection Failed".$conn->connect_error);
    }

    $sql="delete from $table_name where id = $id";

    $result=$conn->query($sql);

    echo("deleted successfully");
?>