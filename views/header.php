<?php
    include "../config/base_url.php";
    include "../config/db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/all.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <title>header</title>
</head>
<body>
<nav class="navbar fixed-top  navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a href="<?=$BASE_URL ?>/views/almatytau.php" class="navbar-brand">Almaty Tau</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse justify-content-evenly" id="navbarContent">
                <ul class="navbar-nav mr-avto mb-2">
                    <li class="nav-item">
                        <a href="<?=$BASE_URL ?>/views/almatytau.php" class="nav-link">Home</a> 
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">About</a> 
                    </li>
                    <li class="nav-item">
                        <a id="" href="<?=$BASE_URL ?>/views/profile.php" class="nav-link">Blog</a> 
                    </li>
                    <li class="nav-item">
                        <a href="<?=$BASE_URL ?>/views/allblogs.php" class="nav-link">Blogs</a> 
                    </li>
                    <li class="nav-item">
                        <a href="<?=$BASE_URL ?>/views/contact.php" class="nav-link">Contact</a> 
                    </li>
                </ul>
                    <div class="d-flex" action="<?=$BASE_URL ?>/api/auth/signin.php" method="POST">
                        <?php 
                            if(isset($_SESSION["id"])){
                                echo '<img class="" style="height: 50px; width: 50px;" src="' . $BASE_URL . '/images/avatars/' . $_SESSION["image"] . '" alt="">';    
                                echo '<a href="../api/auth/logout.php" class="btn btn-outline-danger d-flex align-items-center" data-bs-toggle="modal" data-bs-target="">Log Out</a>';    
                            }else{
                                echo '<button type="submit" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#iconModal">Sign in</button>
                                    <button type="submit" class="btn btn-outline-danger " data-bs-toggle="modal" data-bs-target="#ReiconModal" style="margin-left: 4px;">Sign up</button>';
                            }
                        ?>
    
                    </div>
            </div>
    </div>
</nav>

<script src="../bootstrap/js/bootstrap.min.js"></script>    
 
</body>
</html>
