<?php
    $q=$_REQUEST["q"];

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
            <th>Question</th>
            <th>Option 1</th>
            <th>Option 2</th>
            <th>Option 3</th>
            <th>Answer</th>
            </tr>
            ";
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<td>" . $row["id"].
                    "</td><td>" . $row["question"]. 
                    "</td><td>" . $row["option1"]. 
                    "</td><td>" . $row["option2"]. 
                    "</td><td>" . $row["option3"]. 
                    "</td><td>" . $row["answer"]. 
                    "</td></tr>"  ;
        }
    } else {
        echo "0 results";
    }

    echo "</table>"

?>