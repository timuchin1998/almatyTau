<?php
session_start();
include "../../config/db.php";
include "../../config/base_url.php";

$user_id = $_SESSION["id"];

if (isset($_POST["email"], $_POST["full_name"], $_POST["discription"]) &&
    strlen($_POST["email"]) > 0 && strlen($_POST["full_name"]) > 0 
    && strlen($_POST["discription"]) > 0) {

    $email = $_POST["email"];
    $full_name = $_POST["full_name"];
    $discription = $_POST["discription"];

    $profile_query = mysqli_query($conn, "SELECT * FROM users WHERE id='$user_id'");
    $profile_result = mysqli_fetch_assoc($profile_query);
    if (mysqli_num_rows($profile_query) == 0 || $profile_result["email"] == $email) {


        if (isset($_FILES["image"]) && strlen($_FILES["image"]["name"]) > 0) {
            $file_name = time(); // 166889441

            $file_ext = end(explode(".", $_FILES["image"]["name"]));  // "abc.png"  => ["abc", "png"]  =>  "png"

            $file_full_name = $file_name . "." . $file_ext; // "166889441.png"

            move_uploaded_file($_FILES["image"]["tmp_name"], "../../images/avatars/$file_full_name"); // откуда, куда

            mysqli_query($conn, "UPDATE users
                                 SET email='$email', full_name='$full_name', discription='$discription', image='$file_full_name'
                                 WHERE id=$user_id");

            $_SESSION["image"] = $file_full_name;            

        } else {
            mysqli_query($conn, "UPDATE users
                                 SET email='$email', full_name='$full_name', discription='$discription'
                                 WHERE id=$user_id");
        }


        $_SESSION["email"] = $email;
        $_SESSION["full_name"] = $full_name;
        $_SESSION["profile_desc"] = $discription;
        

        header("Location: $BASE_URL/views/profile.php");

    } else {
        header("Location: $BASE_URL/views/edit-profile.php?error=2");
    }

} else {
    header("Location: $BASE_URL/views/edit-profile.php?error=1");
}

?>