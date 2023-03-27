<?php
session_start();
include "../config/base_url.php";
include "../config/db.php";

$blog_id = $_GET["id"];
$blog_details_query = mysqli_query($conn, "SELECT * FROM blogs WHERE id=$blog_id");
$blog_details = mysqli_fetch_assoc($blog_details_query);

$all_comments_query = mysqli_query($conn, "SELECT * FROM comments WHERE blog_id=$blog_id");

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Детали поста</title>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=$BASE_URL?>/styles/all.css">
</head>
<body>
    <?php
        include "header.php"
    ?>

<section class="row text-center" style="margin: 80px 10px;">
	<div class="page-content" >
		<div class="blogs">
		<h2>Мой Комментарии</h2>
			<div class="blog-item" style="">
				<img class="blog-item--img" src="<?=$BASE_URL?>/images/blogs/<?=$blog_details['blog_image']?>" alt="">

				<div class="blog-header">
					<h3><?=$blog_details["title"]?></h3>
				</div>

				<p class="blog-desc"><?=$blog_details["text"]?></p>

                <div class="d-flex align-items-center justify-content-evenly" style="margin-top: 50px;">
					<span class="link">
						<img src="../images/date.svg" alt="">
						<?=$blog_details["created_at"]?>
					</span>
					<span class="link">
						<img src="../images/visibility.svg" alt="">
						21
					</span>
					<a class="link">
						<img src="../images/comments.svg" alt="">
						<?=mysqli_num_rows($all_comments_query)?>
					</a>
					<span class="link">
						<img src="../images/forums.svg" alt="">
						<?php
						$category_query = mysqli_query($conn, "SELECT category_name FROM categories WHERE id=".$blog_details["category_id"]);
						echo mysqli_fetch_assoc($category_query)["category_name"];
						?>
					</span>
					<?php
					if (isset($_SESSION["id"]) && $blog_details['user_id'] == $_SESSION["id"]) {
						echo '<a class="link" href="<?=$BASE_URL?>/views/profile.php">';
					} else {
					    echo '<a class="link" href="' . $BASE_URL . '/views/other-profile.php?id=' . $blog_details['user_id'] . '">';
					}
					?>
						<img src="../images/person.svg" alt="">
						<?php
						$user_query = mysqli_query($conn, "SELECT full_name FROM users WHERE id=" . $blog_details["user_id"]);
						echo mysqli_fetch_assoc($user_query)["full_name"];
						?>	
					</a>
				</div>
			</div>
		</div>

        <div class="d-flex" style="justify-content: center; align-items: center; flex-direction: column;">
            <h2>
                Комментарии: <?=mysqli_num_rows($all_comments_query)?>
            </h2>
				<?php
				if (mysqli_num_rows($all_comments_query) == 0) {
					echo '<p class="text-info">Пока нет комментариев!</p>';
				} else {
					while ($row = mysqli_fetch_assoc($all_comments_query)) {
				?>
					<div class="d-flex-column justify-content-center">
						<div class="d-flex justify-content-evenly">
							<span>
								<?php
								$user_details_query = mysqli_query($conn, "SELECT * FROM users WHERE id=".$row["user_id"]);
								$user_details = mysqli_fetch_assoc($user_details_query);
								?>
								<img src="<?=$BASE_URL?>../images/avatars/<?=$user_details['image']?>" alt="" style="width: 50px;">
								<?=$user_details['full_name']?>
							</span>
							<?php
							if (isset($_SESSION["id"]) && $row["user_id"] == $_SESSION["id"]) {
							?>
								<span class="link">
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
                                                    Вы можете редактировать или удалить коментарии
                                                    </div>

                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <a href="<?=$BASE_URL?>../views/blog-details.php?id=<?=$blog_id?>&comment_id=<?=$row['id']?>"class="btn btn-success">Редактировать</a> 
                                                        <a href="<?=$BASE_URL?>../api/comments/delete.php?id=<?=$row['id']?>"class="btn btn-danger">Удалить</a>
                                                    </div>

                                            </div>
                                        </div>
                                    </div>
								</span>
							<?php
							}
							?>
						</div>
						<p>
							<?=$row['text']?>
						</p>
					</div>

				<?php
					}
				}
				if (isset($_SESSION["id"])) {
					if (isset($_GET["comment_id"])) {
						$action_link = "$BASE_URL../api/comments/update.php?blog_id=$blog_id&comment_id=" . $_GET['comment_id'];
						$comment_text_query = mysqli_query($conn, "SELECT text FROM comments WHERE id=".$_GET["comment_id"]);
						$comment_text = mysqli_fetch_assoc($comment_text_query)["text"];
					} else {
						$action_link = "$BASE_URL../api/comments/add.php?blog_id=$blog_id";
						$comment_text = "";
					}
				?>
					<form class="form-outline w-75 mb-4" action="<?=$action_link?>" method="POST">
						<textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="text" class="comment-textarea" placeholder="Введит текст комментария"><?=$comment_text?></textarea>
						<?php
						if (isset($_GET["error"]) && $_GET["error"] == 1) {
							echo '<p class="text-danger">Коментарий не может быть пустым!</p>';
						}
						?>
						<button class="btn btn-success" style="margin-top: 10px;">Отправить</button>
					</form>
				
				<?php
				} else {
				?>
					<span class="">
						Чтобы оставить комментарий <a href="<?=$BASE_URL?>/register.php">зарегистрируйтесь</a> , или  <a href="<?=$BASE_URL?>/login.php">войдите</a>  в аккаунт.
					</span>
				<?php
				}
				?>

        </div>
	</div>
	
</section>	
</body>
</html>