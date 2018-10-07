<?php 
    include "config.php";

    $table_name=$_GET["table"];
    $id=$_GET["id"];

    $type=$_GET["type"];

    if ($type=="multiple"){
        $question=$_GET["question"];
        $option1=$_GET["option1"];
        $option2=$_GET["option2"];
        $option3=$_GET["option3"];
        $answer=$_GET["answer"];

        echo "question is $question \n option1 is $option1 \n option2 is $option2 \n option 3 is $option3 \n answer is $answer
            \n id is $id  \n table name is $table_name";

        $sql="UPDATE $table_name SET question='$question', option1='$option1', option2='$option2', option3='$option3', answer='$answer' WHERE id=$id";
        
        if($conn->query($sql)===TRUE){
            echo "Updated Successfully";
        }
        else{
            echo "Updating Failed " + $conn->error;
        }
    }elseif($type=="boolean"){
        $question=$_GET["question"];
        $answer=$_GET["answer"];

        $sql="UPDATE $table_name SET question='$question' , answer='$answer' WHERE id=$id";

        if($conn->query($sql)===TRUE){
            echo "Updated Successfully";
        }
        else{
            echo "Updating Failed " + $conn->error;
        }
    }elseif($type=="user"){
        $username=$_GET["username"];
        $email=$_GET["email"];
        $password=$_GET["password"];

        $sql="UPDATE $table_name SET username='$username' , email='$email' , password='password' WHERE id=$id";

        echo "$sql";
        
        if($conn->query($sql)===TRUE){
            echo "Updated Successfully";
        }
        else{
            echo "Update Failed " + $conn->error;
        }
    }
?>