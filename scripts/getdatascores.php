<?php
    $q="score";

    $servername = "localhost";
    $username = "ganesh";
    $password = "123456";

    $conn = new mysqli($servername,$username,$password,"trivia_db");

    if($conn->connect_error)
    {
        die("Connection Failed".$conn->connect_error);
    }

    echo "$q";
    $sql="select * from $q";

    $result=$conn->query($sql);
    echo "<table> <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Score</th>
            </tr>
            ";
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<td>" . $row["id"].
                    "</td><td>" . $row["username"]. 
                    "</td><td>" . $row["user_score"]. 
                    "</td></tr>"  ;
        }
    } else {
        echo "0 results";
    }

    echo "</table>"

?>