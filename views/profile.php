<?php
session_start();
include "../config/base_url.php";
include "../config/db.php";

$user_id = $_SESSION["id"];
$profile_desc = $_SESSION["discription"];
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
     
     <!-- <div class="d-flex p-2 mt-5">
            <div class="d-flex justify-content-between">
                <div>
                    <h4>Мой Блок</h4>
                </div>
                <div>
                    <button type="submit" class="btn btn-outline-success">Новый блог</button>
                </div>
            </div>
            
    </div> -->
    <div class="row text-center" style="margin-top: 100px;">
        <div class="col-9 col-md" >
            <div class="d-flex justify-content-around">
                <div>
                    <h4>Мои блоги</h4>
                </div>
                <div>
                    <button type="submit" class="btn btn-outline-success">Новый блог</button>
                </div>
            </div>
        <h2 style="margin-top: 30px;">Обзор Report Manager от Webix</h2>           
        </div>
        <div class="col-3 col-md">
            <div>
                <img class="img-thumbnail" src="../images/avatars/<?=$_SESSION['image']?>" alt="">
                <h1><?=$_SESSION["full_name"] ?></h1>
                <h2><?=$_SESSION["profile_desc"] ?></h2>
                <h1>описание тут должно быть</h1>
                <p>0 постов за все время</p>
                <a href="<?=$BASE_URL ?>/views/edit-profile.php" class="btn btn-success " tabindex="-1" role="button" aria-disabled="true">Редактировать</a>
            </div>
        </div>
           
    </div>
    
   <!-- <?php
        include "footer.php"
    ?> -->
</body>
</html>