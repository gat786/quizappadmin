<?php
    include "config.php";
    $q=$_GET["q"];

    echo "$q";
    $sql="select * from $q";

    $result=$conn->query($sql);
    echo "<table> <tr>
            <th>Id</th>
            <th>Question</th>
            <th>Answer</th>
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
            echo "$tr $td" . $row["id"].
                    "</td>$td" . $row["question"]. 
                    "</td>$td" . $row["answer"]. 
                    "</td>$td<button id=\"delete\" onclick=\"deleteUser($id,'$q')\"> Delete </button>".
                    "</td>$td<button id=\"update\" onclick=\"updateBooleanModalDisplay($id,'$q','update')\"> Update </button>".
                    "</td></tr>"  ;
        }
    } else {
        echo "0 results";
    }

    echo "</table>"

?>