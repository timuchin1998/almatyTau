<?php

session_start();
include "../../config/db.php";
include "../../config/base_url.php";

$blog_id = $_GET["blog_id"];

if (isset($_GET["blog_id"], $_POST["text"]) && strlen($_POST["text"]) > 0) {

    $user_id = $_SESSION["id"];
    $text = $_POST["text"];

    mysqli_query($conn, "INSERT INTO comments(user_id, blog_id, text)
                         VALUES ($user_id, $blog_id, '$text')");

    header("Location: $BASE_URL/views/blog-details.php?id=$blog_id");

} else {
    header("Location: $BASE_URL/views/blog-details.php?error=1&id=$blog_id");
}


?>