<?php
session_start();
include "../config/base_url.php";
include "../config/db.php";

$blogs_per_page = 10;
if (isset($_GET["page"])) {
    $curr_page = $_GET["page"];
} else {
    $curr_page = 1;
}
$limit_start = ($curr_page - 1) * $blogs_per_page;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/profile.css">
    <title>Блоги в AlmatyTau</title>
</head>
<body>
<?php
        include "header.php"
    ?>
        <!-- Modal войти -->
    <?php
        include "login.php"
    ?>
        <!-- Modal -->
    <?php
        include "registration.php"
    ?>
?>     
<div class="row text-center" style="margin-top: 100px;">
    <div class="col-9 col-md">
        <div class="d-flex justify-content-around">
            <div>
                <h4>Блоги в AlmatyTau</h4>
            </div>
            <div>
                <a href="<?=$BASE_URL?>/views/newblog.php" class="btn btn-success " tabindex="-1" role="button" aria-disabled="true">Добавить блог</a>
            </div>
        </div>
        <div class="blogs">
            <?php

            if(isset($_GET["category_id"])){
                $blogs_query = mysqli_query($conn, "SELECT * FROM blogs WHERE category_id=" . $_GET["category_id"]);
            }else{
                $blogs_query = mysqli_query($conn, "SELECT * FROM blogs"); 
            }
            if (mysqli_num_rows($blogs_query) == 0) {
                echo '<h2 class="no_blogs">Пока нет постов!</h2>';
            } else {
                while ($row = mysqli_fetch_assoc($blogs_query)) {
            ?>
            <div class="container mt-5 ">
                <div class="d-flex justify-content-around gy-5">    
      
     
                </div>
                <h2>
                        <?=$row["title"]?>
                </h2>    
                    <img class="img-thumbnail" src="<?=$BASE_URL?>/images/blogs/<?=$row['blog_image']?>" alt="">
                    <p class="blog-desc">
                        <?=$row["text"]?>
                    </p>
                    <img src="../../images/" alt="">          
            </div>
            <div class="d-flex align-items-center justify-content-evenly" >
                      <span class="link">
                        <img src="../images/date.svg" alt="">
                        <?=$row["created_at"]?>
                    </span> 
                    <span class="link" >
                        <img src="../images/visibility.svg" alt="">
                        21
                    </span>
                    <a class="text-decoration-none" style="color:black" href="<?=$BASE_URL?>/views/blog-details.php?id=<?=$row['id']?>">
                        <img src="../images/comments.svg" alt="">
                        <?php
                                $comments_num_query = mysqli_query($conn, "SELECT id FROM comments WHERE blog_id=".$row['id']);
                                echo mysqli_num_rows($comments_num_query);
                        ?>
                    </a>
                    <span class="link">
                        <img src="../images/forums.svg" alt="">
                        <?php
                        $category_query = mysqli_query($conn, "SELECT category_name FROM categories WHERE id=" . $row["category_id"]);
                        echo mysqli_fetch_assoc($category_query)["category_name"];
                        ?>
                    </span>
                    <a href="<?=$BASE_URL ?>/views/profile.php"" class="text-decoration-none lead text-success">
                        <img src="../images/person.svg" alt="">
                        <?php
							$user_query = mysqli_query($conn, "SELECT full_name FROM users WHERE id=" . $row["user_id"]);
							echo mysqli_fetch_assoc($user_query)["full_name"];
						?>
                    </a>
            </div>    
                    
            <?php
                }
            }
            ?>
        </div>
        <nav aria-label=""> 
        <ul class="pagination justify-content-center">
                <?php
                if (isset($_GET["category_id"])) {
                    $num_rows = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM blogs WHERE category_id=" . $_GET["category_id"]));    
                } else {
                    $num_rows = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM blogs"));
                }
        
                for ($i = 1; $i <= ceil($num_rows / $blogs_per_page); $i++) {
                    if (isset($_GET["category_id"])) {
                        $pag_href = "$BASE_URL/views/allblogs.php/?page=$i&category_id=" . $_GET["category_id"];
                    } else {
                        $pag_href = "$BASE_URL/views/allblogs.php/?page=$i";
                    }

                    if ($i == $curr_page) {
                        echo '<li class="page-item"><a href="'.$pag_href.'" class="page-link pages-nav-btn-active">'. $i .'</a></li>';
                    } else {
                        echo '<li class="page-item"><a href="'.$pag_href.'" class="page-link">'. $i .'</a></li>';
                    }
                }
                ?>
            </ul>
        </nav>
    </div>
        <div class="col-3 col-md">
            <div class="d-flex align-items-center flex-column " style="gap:15px">
                <h2>Категории</h2>
                <?php
                $category_query = mysqli_query($conn, "SELECT * FROM categories");
                while ($row = mysqli_fetch_assoc($category_query)){
                    echo '<a class="link-success" style="text-decoration: none" href=" ' . $BASE_URL . '/views/allblogs.php'. '?category_id=' . $row["id"] . '">'. $row["category_name"] .'</a>';
                }
                ?>
            </div>    
        </div>       
    </div>      
</div>  
</body>
</html>