<?php
session_start();
include "../../config/base_url.php";
include "../../config/db.php";

$user_id = $_SESSION["id"];

if(isset($_POST["email"], $_POST["full_name"], $_POST["discription"]) &&
    strlen($_POST["email"]) > 0 && strlen($_POST["full_name"]) > 0 && strlen($_POST["discription"]) > 0 ) {

    $email = $_POST["email"];    
    $full_name = $_POST["full_name"];    
    $discription = $_POST["discription"]; 

    
    $user_count = mysqli_query($conn, "SELECT count(*) as users_count FROM users WHERE email = '$email' and id<>'$user_id'");
    $user_count = mysqli_fetch_assoc($user_count);
    $user_count = (int) $user_count['users_count'];

    if($user_count > 0 ){

        if(isset($_FILES["image"]) && strlen($_FILES["image"]["name"]) > 0){
            $_file_name = time(); // 121s
            $file_ext = end(explode(".", $_FILES["image"]["name"]));
            $file_full_name = $file_name . "." . $file_ext;

            move_uploaded_file($_FILES["image"]["tmp_name"], "../../img/avatars/$file_full_name");
            
            $_SESSION["image"]= $file_full_name;
            // var_dump($file_full_name); die;

            mysqli_query($conn, "UPDATE users
                            SET email='$email', full_name='$full_name', discription='$discription', image='$file_full_name'
                            WHERE id = $user_id");
                            
        }else{
            mysqli_query($conn, "UPDATE users
                            SET email='$email', full_name='$full_name', discription='$discription'
                            WHERE id = $user_id");
        }

        header("Location: $BASE_URL/views/edit-profile.php?error=2");
    }else{
        $profile_query = mysqli_query($conn, "SELECT * FROM users WHERE id='$user_id'");

        $profile_result = mysqli_fetch_assoc($profile_query);
        // var_dump($profile_result); die;
        if(mysqli_num_rows($profile_query) > 0){
    
           mysqli_query($conn, "UPDATE users
                            SET email='$email', full_name='$full_name', discription='$discription'
                            WHERE id = $user_id");
    
           $_SESSION["email"] = $email;
           $_SESSION["full_name"] = $full_name;
           $_SESSION["profile_desc"] = $discription;
                            
           header("Location: $BASE_URL/views/profile.php");
        }
    }
}else{
    header("Location: $BASE_URL/views/edit-profile.php?error=1");
}
?>