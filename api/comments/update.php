<?php
session_start();
include "../../config/db.php";
include "../../config/base_url.php";

$comment_id = $_GET["comment_id"];
$blog_id = $_GET["blog_id"];

if (isset($_POST["text"]) && strlen($_POST["text"]) > 0) {

    $text = $_POST["text"];
    mysqli_query($conn, "UPDATE comments SET text='$text' WHERE id=$comment_id");
    header("Location: $BASE_URL/views/blog-details.php?id=$blog_id");

} else {
    header("Location: $BASE_URL/views/blog-details.php?id=$blog_id&comment_id=$comment_id&error=1");
}

?>