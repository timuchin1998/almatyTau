<?php
session_start();
include "../config/base_url.php";
include "../config/db.php";

$user_id = $_SESSION["id"];

$profile_details_query = mysqli_query($conn, "SELECT * FROM users WHERE id=$user_id");
$profile = mysqli_fetch_assoc($profile_details_query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Редактировать профиль</title>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=$BASE_URL ?>/styles/all.css">
</head>
<body>
<?php include "../views/header.php" ?>

<div class="container" style="margin-top:100px">
    <h2>Редактировать профиль</h2>
    <form class="" action="<?=$BASE_URL?>/api/auth/update.php" method='POST'" enctype="multipart/form-data">
        <div class="form-group row mt-5">    
            <div class="col-xs-2 ">
                <label for="ex3">Полное имя</label>
                <input class="form-control" type="text" name="full_name" placeholder="Полное имя" value="<?=$profile['full_name']?>">
            </div>
            <div class="col-xs-2 mt-3">      
                <label for="inputlg">Почта</label>
                <input class="form-control" type="text" name="email" placeholder="Почта" value="<?=$profile['email']?>">
            </div>
            <div class="col-xs-2 mt-3">    
                <label for="inputlg">Фото профиля</label><br>
                <input class="form-control" type="file" name="image">
            </div>
            <div class="col-xs-3 mt-3">  
                <label for="inputlg">Описание</label>
                <input class="form-control" type="text" name="discription" placeholder="Описание" value="<?=$profile['discription']?>">
            </div>
        </div>    
            <button type="submit" class="btn btn-success mt-3">Сохранить</button>
            
    </form>
    <?php
        if(isset($_GET["error"]) && $_GET["error"] == 1){
            echo '<script>alert("Ваши данные не валидны")</script>';
        }else if(isset($_GET["error"]) && $_GET["error"] == 2){
            echo '<script>alert("Email уже зарегистриван")</script>';
        }else if(isset($_GET["error"]) && $_GET["error"] == 3){
            echo '<script>alert("Пароль не совпадают")</script>';
        }
    ?>
     
</div>


</body>
</html>
