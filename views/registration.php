<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=$BASE_URL ?>/styles/all.css">
    <title>Регистрация</title>
</head>
<body>

    <?php
    include "header.php";
    ?>

<div class="modal fade" id="ReiconModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header justify-content-between ">
                            <div>
                            <h5 class="modal-title" id="ReiconModal">Log Up</h5>
                            </div>
                            <div>
                                <button class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>  
                            </div>
                        </div>
                        <div class="modal-body">
                            <form action="<?=$BASE_URL ?>/api/auth/signup.php" method="POST">
                                <div class="row mb-3">
                                    <label for=inputEmail"" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" name="email" class="form-control" id="inputEmail">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for=inputName"" class="col-sm-2 col-form-label">Full Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="full_name" class="form-control" id="inputText">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for=inputPass"" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="password" class="form-control" id="inputPass">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for=ReinputPass"" class="col-sm-2 col-form-label">Repeat password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="re_password" class="form-control" id="inputPass">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">register</button>  
                                    
                                </div>
                                <?php
                                    if(isset($_GET["error"]) && $_GET["error"] == 1){
                                        echo '<script>alert("Ваши данные не валидны")</script>';
                                    }else if(isset($_GET["error"]) && $_GET["error"] == 2){
                                        echo '<script>alert("Email уже зарегистриван")</script>';
                                    }else if(isset($_GET["error"]) && $_GET["error"] == 3){
                                        echo '<script>alert("Пароль не совпадают")</script>';
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
            <h1>Регистрация</h1>
            <form class="d-flex flex-column mt-3 gap-3" action="<?=$BASE_URL ?>/api/auth/signin.php" method="POST">
                <input type="text" name="email" placeholder="Email ....">
                <input type="text" name="full_name" placeholder="Полное имя ....">
                <input type="password" name="password" placeholder="Пароль ....">
                <input type="password" name="re_password" placeholder="Введите пароль ....">
                <button type="submit" class="btn btn-success">Зарегистриваться</button>
            </form>
        </section>
    </div> -->
</body>
</html>

