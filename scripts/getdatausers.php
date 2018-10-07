<?php
    include "./config.php";
    $q="users";
    echo "$q";
    $sql="select * from $q";

    $result=$conn->query($sql);
    echo "<table> <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Email</th>
            <th>Delete</th>
            <th>Update</th>
            </tr>
            ";
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $id=$row["id"];
            $table_name = $q;
            echo "<td>" . $row["id"].
                    "</td><td>" . $row["username"]. 
                    "</td><td>" . $row["email"]. 
                    "</td><td><input type=\"button\" value=\"Delete\" onclick=\"deleteUser($id,'$q')\">".
                    "</td><td><input type=\"button\" value=\"Update\" onclick=\"updateUserModalDisplay($id,'$table_name','update')\">".
                    "</td></tr>"  ;
        }
    } else {
        echo "0 results";
    }

    echo "</table>"

?>