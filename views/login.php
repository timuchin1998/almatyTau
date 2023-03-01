<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=$BASE_URL ?>/styles/all.css">
    <title>Авторизация</title>
</head>
<body>

    <?php
    include "header.php";
    ?>

<div class="modal fade" id="iconModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header justify-content-between ">
                            <div>
                            <h5 class="modal-title" id="iconModal">Log In</h5>
                            </div>
                            <div>
                                <button class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>  
                            </div>
                        </div>
                        <div class="modal-body">
                            <form action="<?=$BASE_URL ?>/api/auth/signin.php" method="POST">
                                <div class="row mb-3">
                                    <label for=inputEmail"" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" name="email" class="form-control" id="inputEmail">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for=inputPass"" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="password" class="form-control" id="inputPass">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Sign In</button>  
                                   
                                </div>
                                <?php
                                    if(isset($_GET["error"]) && $_GET["error"] == 1){
                                        echo '<script>alert("Ваши данные не валидны")</script>';
                                    }else if(isset($_GET["error"]) && $_GET["error"] == 2){
                                        echo '<script>alert("Не верный Email")</script>';
                                    }else if(isset($_GET["error"]) && $_GET["error"] == 3){
                                        echo '<script>alert("Не верный пароль")</script>';
                                    }
                                   ?>
                            </form>
                          
                        </div>
                        <!-- <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Войти</button>  
                            <button class="btn btn-secondaty">Sign Up</button>
                        </div>   -->
                    </div>
                    
                </div>
            </div>




    <!-- <div class="d-flex justify-content-center align-items-center" style="height: calc(100vh - 100px);">
        <section>
            <h1>Войти</h1>
            <form class="d-flex flex-column mt-3 gap-3" action="<?=$BASE_URL ?>/api/auth/signin.php" method="POST">
                <input type="text" name="email" placeholder="Email ....">
                <input type="password" name="password" placeholder="Пароль ....">
                <button type="submit" class="btn btn-success">Войти</button>
                <?php
                                    if(isset($_GET["error"]) && $_GET["error"] == 1){
                                        echo '<p>Ваши данные не валидны</p>';
                                    }else if(isset($_GET["error"]) && $_GET["error"] == 2){
                                        echo '<p>asdasda</p>';
                                    }else if(isset($_GET["error"]) && $_GET["error"] == 3){
                                        echo '<p>sddfdfs</p>';
                                    }
                                   ?>
            </form>
        </section>
    </div> -->
</body>
</html>

