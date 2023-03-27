<?php

include "../../config/db.php";
include "../../config/base_url.php";

$blog_id = $_GET["id"];
// echo "blog_id";

$blog_image_query = mysqli_query($conn, "SELECT blog_image FROM blogs WHERE id=$blog_id");
$image_name = mysqli_fetch_assoc($blog_image_query)["blog_image"];

unlink("../../images/blogs/$image_name");

mysqli_query($conn, "DELETE FROM blogs WHERE id=$blog_id");

var_dump($blog_id); die();

header("Location: $BASE_URL/views/profile.php");

?>