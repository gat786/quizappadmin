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

        $sql="insert into $table_name (question,option1,option2,option3,answer) values ($question,$option1,$option2,$option3,$answer)";
        
        if($conn->query($sql)===TRUE){
            echo "Inserted Successfully";
        }
        else{
            echo "Insertion Failed " + $conn->error;
        }
    }elseif($type="boolean"){
        $question=$_GET["question"];
        $answer=$_GET["answer"];

        $sql="insert into $table_name (question,answer) values ($question,$answer)";

        if($conn->query($sql)===TRUE){
            echo "Inserted Successfully";
        }
        else{
            echo "Insertion Failed " + $conn->error;
        }
    }elseif($type="user"){
        $username=$_GET["username"];
        $email=$_GET["email"];
        $password=$_GET["password"];

        $sql="insert into $table_name (username,email,password) values ($username,$email,$password)";

        
        if($conn->query($sql)===TRUE){
            echo "Inserted Successfully";
        }
        else{
            echo "Insertion Failed " + $conn->error;
        }
    }
?>