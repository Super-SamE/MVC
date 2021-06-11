<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
        require 'public/vendor/links.php';
    ?>

    <title>Вход/Регистрация</title>
</head>
<body>
    <section class="reg-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="form-wrap">
                        <div class="reg-form">
                            <div>
                                <label>Вход/Регистрация</label>
                            </div>
                            <form method="POST" action="?class=Maincontroller&option=getformauth">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="login" name="login">
                                    <label for="floatingInput">login...</label>
                                </div>
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password..." name="password">
                                    <label for="floatingPassword">Password...</label>
                                </div>
                                <button type="submit" class="btnn btn-outline-dark" name="auth">Вход/Регистрация</button>
                            </form>
                            <?php

                                //if($_SESSION['message']) {
                                    //echo '<p class="msg">' . $_SESSION['message'] . '</p>';
                                //}
                                //unset($_SESSION['message']);

                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>