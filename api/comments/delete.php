<?php
session_start();
include "../../config/db.php";
include "../../config/base_url.php";

$comment_id = $_GET["id"];

$blog_id_query = mysqli_query($conn, "SELECT blog_id FROM comments WHERE id=$comment_id");
$blog_id = mysqli_fetch_assoc($blog_id_query)["blog_id"];

mysqli_query($conn, "DELETE FROM comments WHERE id=$comment_id");
header("Location: $BASE_URL/blog-details.php?id=$blog_id");

?>