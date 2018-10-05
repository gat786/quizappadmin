<?php 
    $id=$_GET["id"];
    $table_name=$_GET["table"];

    $servername = "localhost";
    $username = "ganesh";
    $password = "123456";
    $database_name = "trivia_db";

    $conn = new mysqli($servername,$username,$password,$database_name);

    if($conn->connect_error)
    {
        die("Connection Failed".$conn->connect_error);
    }

    $sql="delete from $table_name where id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
?>