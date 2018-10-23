<?php
    include "./config.php";
    $q="users";
    $sql="select * from $q";
    ?>

    <div class="data-returned">
<?php

    $result=$conn->query($sql);
    echo "<table> <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Email</th>
            <th>Delete</th>
            <th>Update</th>
            </tr>
            ";

            
            $tr="<tr class=\"table-data\">";
            $td="<td class=\"data-container-td\">";
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $id=$row["id"];
            $table_name = $q;
            echo " $tr $td" . $row["id"].
                    "</td>$td" . $row["username"]. 
                    "</td>$td" . $row["email"]. 
                    "</td>$td<button id=\"delete\" onclick=\"deleteUser($id,'$q')\"> Delete </button>".
                    "</td>$td<button id=\"update\" onclick=\"updateUserModalDisplay($id,'$table_name','update')\"> Update </button>".
                    "</td></tr>"  ;
        }
    } else {
        echo "0 results";
    }

    echo "</table>"

?>
</div>