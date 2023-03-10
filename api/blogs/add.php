<?php
session_start();
include "../../config/db.php";
include "../../config/base_url.php";

$user_id = $_SESSION["id"];

if (isset($_POST["title"], $_POST["category_id"], $_POST["text"]) && 
    strlen($_POST["title"]) > 0 && strlen($_POST["text"]) > 0 && $_POST["category_id"] > 0) {

    $title = $_POST["title"];
    $category_id = $_POST["category_id"];
    $text = $_POST["text"];

    if (isset($_FILES["image"]) && strlen($_FILES["image"]["name"]) > 0) {
        $file_name = time(); // 166889441

        $file_ext = end(explode(".", $_FILES["image"]["name"]));  // "abc.png"  => ["abc", "png"]  =>  "png"

        $file_full_name = $file_name . "." . $file_ext; // "166889441.png"

        move_uploaded_file($_FILES["image"]["tmp_name"], "../../images/blogs/$file_full_name"); // откуда, куда           

    } else {
        $file_full_name = "";
    }
   
    mysqli_query($conn, "INSERT INTO blogs(user_id, blog_image, title, text, category_id)
                         VALUES ($user_id, '$file_full_name', '$title', '$text', $category_id)");
    
    header("Location: $BASE_URL/views/profile.php");

} else {
    header("Location: $BASE_URL/views/newblog.php?error=1");
}

?>