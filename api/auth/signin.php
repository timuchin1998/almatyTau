<?php
session_start();
include "../../config/db.php";
include "../../config/base_url.php";

if(isset($_POST["email"],$_POST["password"]) 
    && strlen($_POST["email"]) > 0 
    && strlen($_POST["password"]) > 0){

    $email = $_POST["email"];
    $pass = $_POST["password"];

    $user_query = mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");
    
    if(mysqli_num_rows($user_query) > 0){
        $user_query_result = mysqli_fetch_assoc($user_query);

        if($user_query_result["password"] == sha1($pass)){
            $_SESSION["id"] = $user_query_result["id"];    
            $_SESSION["email"] = $user_query_result["email"];    
            $_SESSION["full_name"] = $user_query_result["full_name"];    
            $_SESSION["profile_desc"] = $user_query_result["discription"];    
            $_SESSION["image"] = $user_query_result["image"];    

            header("Location: $BASE_URL/views/almatytau.php"); 
            // header("Location: $BASE_URL/views/profile.php"); 
        }
        else{
            header("Location: $BASE_URL/views/login.php?error=3"); 
        }

    }else{
        header("Location: $BASE_URL/views/login.php?error=2"); 
    }
    
    
}else{
    header("Location: $BASE_URL/views/login.php?error=1"); 
}

?>