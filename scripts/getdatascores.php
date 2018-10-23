<?php
    include "config.php";
    $q="score";
    $sql="select * from $q";
    ?>
    <div class="data-returned">
<?php

    $result=$conn->query($sql);
    echo "<table> <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Score</th>
            <th>Delete</th>
            </tr>
            ";

            
            $tr="<tr class=\"table-data\">";
            $td="<td class=\"data-container-td\">";
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $id=$row["id"];
            $table_name='score';
            echo "$tr $td" . $row["id"].
                    "</td>$td" . $row["username"]. 
                    "</td>$td" . $row["score"]. 
                    "</td>$td<button id=\"delete\" onclick=\"deleteUser($id,'$table_name')\" > Delete </button>". 
                    "</td></tr>"  ;
        }
    } else {
        echo "0 results";
    }

    echo "</table>"

?>

</div>