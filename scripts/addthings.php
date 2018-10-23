<?php 
    include "config.php";

    $table_name=$_GET["table"];

    $type=$_GET["type"];

    if ($type=="multiple"){
        $question=$_GET["question"];
        $option1=$_GET["option1"];
        $option2=$_GET["option2"];
        $option3=$_GET["option3"];
        $answer=$_GET["answer"];

        echo "question is $question \n answer is $answer \n option1 is $option1 \n option2 is $option2 \n option3 is $option3"; 

        $sql="insert into $table_name (question,option1,option2,option3,answer)
             values ('$question','$option1','$option2','$option3','$answer')";
        
        if($conn->query($sql)===TRUE){
            echo "Inserted Successfully";
        }
        else{
            echo "Insertion Failed " + $conn->error;
        }
    }elseif($type=="boolean"){
        
        $question=$_GET["question"];
        $answer=$_GET["answer"];

        echo "question is $question \n answer is $answer";

        $sql="insert into $table_name (question,answer) values ('$question','$answer')";

        if($conn->query($sql)===TRUE){
            echo "Inserted Successfully";
        }
        else{
            echo "Insertion Failed " + $conn->error;
        }
    }elseif($type=="user"){
        $username=$_GET["username"];
        $email=$_GET["email"];
        $password=$_GET["password"];

        $sql="insert into $table_name (username,email,password) values ('$username','$email','$password')";

        
        if($conn->query($sql)===TRUE){
            echo "Inserted Successfully";
        }
        else{
            echo "Insertion Failed " + $conn->error;
        }
    }elseif($type=="suggestion"){
        $qtype=$_GET["qtype"];
        if($qtype=="boolean"){
            $question=$_GET["question"];
            $answer=$_GET["answer"];

            $sql="insert into $table_name (question,answer) values ('$question','$answer')";

            
            if($conn->query($sql)===TRUE){
                echo "Inserted Successfully";
            }
            else{
                echo "Insertion Failed " + $conn->error;
            }

        }
        elseif($qtype=="multiple"){
            $question=$_GET["question"];
            $option1=$_GET["option1"];
            $option2=$_GET["option2"];
            $option3=$_GET["option3"];
            $answer=$_GET["answer"];

            $sql="insert into $table_name (question,option1,option2,option3,answer)
             values ('$question','$option1','$option2','$option3','$answer')";
            
            if($conn->query($sql)===TRUE){
                echo "Inserted Successfully";
            }
            else{
                echo "Insertion Failed " + $conn->error;
            }

        }
    }
?>