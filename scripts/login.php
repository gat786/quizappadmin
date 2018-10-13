<?php 
    $name=$_POST["username"];
    $password=$_POST["password"];

    if ($password=="123456"){
        echo "Login Successfull";
    }
    else{
        echo "Login Failed";
    }
?>