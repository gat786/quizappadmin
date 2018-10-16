<?php 
    include "./config.php";
    $type="";
    $type=$_GET["type"];

    if ($type==="boolean"){
        echo "boolean selected";
        $q="suggestsingle";
        $sql="select * from $q";

        $result=$conn->query($sql);
        echo "<table class=\"data-returned\" style=\"display:block\"> <tr>
                <th>Id</th>
                <th>Question</th>
                <th>Answer</th>
                <th>Subject</th>
                <th>Delete</th>
                <th>Add</th>
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
                        "</td>$td" . $row["subject"]. 
                        "</td>$td<button id=\"delete\" onclick=\"deleteUser($id,'$q')\"> Delete </button>".
                        "</td>$td<button id=\"update\" onclick=\"addQuestion()\"> Add </button>".
                        "</td></tr>"  ;
            }
        } else {
            echo "0 results";
        }

        echo "</table>";
    }

    else if($type==="multiple"){
        echo "multiple selected";
        $q="suggestmultiple";
        $sql="select * from $q";

        $result=$conn->query($sql);
        echo "<table class=\"data-returned\" style=\"display:block\"> <tr>
                <th>Id</th>
                <th>Question</th>
                <th>Option 1</th>
                <th>Option 2</th>
                <th>Option 3</th>
                <th>Answer</th>
                <th>Subject</th>
                <th>Delete</th>
                <th>Add</th>
                </tr>
                ";
        
                $tr="<tr class=\"table-data\">";
                $td="<td class=\"data-container-td\">";
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $id=$row["id"];
                $question=$row["question"];
                $answer=$row["answer"];
                $op1=$row["option1"];
                $op2=$row["option2"];
                $op3=$row["option3"];
                echo "$tr $td" . $row["id"].
                        "</td>$td" . $row["question"]. 
                        "</td>$td" . $row["option1"]. 
                        "</td>$td" . $row["option2"]. 
                        "</td>$td" . $row["option3"]. 
                        "</td>$td" . $row["answer"]. 
                        "</td>$td" . $row["subject"]. 
                        "</td>$td<button id=\"delete\" onclick=\"deleteUser($id,'$q')\"> Delete </button>".
                        "</td>$td<button id=\"update\" onclick=\"addQuestion()\"> Add </button>".
                        "</td></tr>" . ""  ;
            }
        } else {
            echo "0 results";
        }
        echo "</table>";
    }
?>