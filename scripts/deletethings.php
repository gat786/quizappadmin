<?php 
    $id=$_GET["id"];
    $table_name=$_GET["table"];

    include "config.php";

    $sql="delete from $table_name where id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
?>