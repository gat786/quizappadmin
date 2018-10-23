

<?php 
    include "./config.php";
    $type="";
    $type=$_GET["type"];

    if ($type==="boolean"){
        $q="suggestsingle";
        $sql="select * from $q";
?>

<div class="data-returned">

<?php
        $result=$conn->query($sql);
        echo "<table> <tr>
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
                $subject_name=$row["subject"];
                $answer=$row["answer"];
                $question=$row["question"];
                $id=$row["id"];
                echo "$tr $td" . $row["id"].
                        "</td>$td" . $question. 
                        "</td>$td" . $answer. 
                        "</td>$td" . $subject_name. 
                        "</td>$td<button id=\"delete\" onclick=\"deleteUser($id,'$q')\"> Delete </button>".
                        "</td>$td<button id=\"update\" onclick=\"addQuestionBooleanSuggestion(
                            '$subject_name','$question','$answer','$id'
                        )\">
                         Add </button>".
                        "</td></tr>"  ;
            }
        } else {
            echo "0 results";
        }

        echo "</table>";
    }

    else if($type==="multiple"){
        $q="suggestmultiple";
        $sql="select * from $q";

        ?>
        <div class="data-returned">
<?php
        $result=$conn->query($sql);
        echo "<table> <tr>
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
                $subject_name=$row["subject"];
                echo "$tr $td" . $row["id"].
                        "</td>$td" . $question. 
                        "</td>$td" . $op1. 
                        "</td>$td" . $op2. 
                        "</td>$td" . $op3. 
                        "</td>$td" . $answer. 
                        "</td>$td" . $subject_name. 
                        "</td>$td<button id=\"delete\" onclick=\"deleteUser($id,'$q')\"> Delete </button>".
                        "</td>$td<button id=\"update\" onclick=\"addQuestionMultipleSuggestion(
                            '$subject_name','$question','$answer','$op1','$op2','$op3','$id'
                        )\"> Add </button>".
                        "</td></tr>" . ""  ;
            }
        } else {
            echo "0 results";
        }
        echo "</table>";
    }
?>

</div>