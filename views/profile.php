<?php
session_start();
include "../config/base_url.php";
include "../config/db.php";

$user_id = $_SESSION["id"];
if(!isset($user_id)){
    header("Location: $BASE_URL/views/almatytau.php");
}
// $profile_desc = $_SESSION["discription"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/profile.css">
    <title>Мои Блоги</title>
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
                <h4>Мои блоги</h4>
            </div>
            <div>
                <a href="<?=$BASE_URL?>/views/newblog.php" class="btn btn-success " tabindex="-1" role="button" aria-disabled="true">Новый блог</a>
            </div>
        </div>
        <div class="blogs">
            <?php
            $blogs_query = mysqli_query($conn, "SELECT * FROM blogs WHERE user_id=$user_id");
            if (mysqli_num_rows($blogs_query) == 0) {
                echo '<h2 class="no_blogs">Пока нет постов!</h2>';
            } else {
                while ($row = mysqli_fetch_assoc($blogs_query)) {
            ?>
            <div class="container mt-5 ">
                <div class="d-flex justify-content-around gy-5">    
                    <span class="link">
                        <img src="../images/date.svg" alt="">
                        <?=$row["created_at"]?>
                    </span> 
                    <span class="">
                        <div class="container">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal">
                            <img src="<?=$BASE_URL?>/images/dots.svg" alt="">
                                Еще
                            </button>  
                        </div>
                             <div class="modal" id="myModal">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title"></h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                    Вы можете редактировать или удалить пост
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <a href="<?=$BASE_URL?>/views/editblog.php?id=<?=$row["id"]?>"><button type="button" class="btn btn-success">Редактировать</button></a>
                                        <a href="<?=$BASE_URL?>/api/blogs/delete.php?id=<?=$row["id"]?>" class="danger"><button type="button" class="btn btn-danger ">Удалить</button></a>
                                    </div>

                                    </div>
                                </div>
                            </div>     
					</span>
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
    </div>
        <div class="col-3 col-md">
                        <div>
                            <img class="img-thumbnail" src="../images/avatars/<?=$_SESSION['image'] ?>" alt="">
                            <h1><?=$_SESSION["full_name"] ?></h1>
                            <h2><?=$_SESSION["profile_desc"] ?></h2>
                            <p>Постов за все время : <?=mysqli_num_rows($blogs_query) ?> </p>
                            <a href="<?=$BASE_URL ?>/views/edit-profile.php" class="btn btn-success " tabindex="-1" role="button" aria-disabled="true">Редактировать</a>
                        </div>
        </div>       
    </div>      
</div>  
</body>
</html>