<?php
session_start();
include "../../config/db.php";
include "../../config/base_url.php";

$blog_id = $_GET["id"];
$blog_data_query = mysqli_query($conn, "SELECT * FROM blogs WHERE id=$blog_id");
$blog_data = mysqli_fetch_assoc($blog_data_query);

if (isset($_POST["title"], $_POST["text"], $_POST["category_id"]) &&
    strlen($_POST["title"]) > 0 && strlen($_POST["text"]) > 0) {

    $title = $_POST["title"];
    $text = $_POST["text"];
    $category_id = $_POST["category_id"];
    // $text = $_POST["text"];

    mysqli_query($conn, "UPDATE blogs
                         SET title='$title', text='$text', category_id='$category_id'
                         WHERE id=$blog_id");

    if (isset($_FILES["image"]) && strlen($_FILES["image"]["name"]) > 0) {
        $file_name = time(); // 166889441

        $file_ext = end(explode(".", $_FILES["image"]["name"]));  // "abc.png"  => ["abc", "png"]  =>  "png"

        $file_full_name = $file_name . "." . $file_ext; // "166889441.png"

        move_uploaded_file($_FILES["image"]["tmp_name"], "../../images/blogs/$file_full_name"); // откуда, куда
        unlink("../../images/blogs/" . $blog_data["blog_image"]);

        mysqli_query($conn, "UPDATE blogs SET blog_image='$file_full_name' WHERE id='$blog_id'");
    }

    header("Location: $BASE_URL/views/profile.php");

} else {
    header("Location: $BASE_URL/views/editblog.php?error=1&id=$blog_id");
}

?>