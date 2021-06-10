<?php

    require_once 'pdoconnect.php';

    if(isset($_POST['auth'])) {
        if(!empty($_POST['login']) && !empty($_POST['password'])) {
            $login = htmlspecialchars($_POST['login']);
            $password = htmlspecialchars(md5($_POST['password']));
            $query = "SELECT * FROM `users` WHERE `login` = :login AND `password`= :password";
            $auth_user = $pdo->prepare($query);
            $auth_user->execute(['login' => $login, 'password' => $password]);
            $real_user = $auth_user->rowCount();
            $numrows = $auth_user->fetch();
            if ($real_user==1) {
                $_SESSION['user'] = [
                    "id" => $numrows['id'],
                    "login" => $numrows['login'],
                    "password" => $numrows['password']
                ];
                header('Location: tasklist.php');
            } else {
                $login = htmlspecialchars($_POST['login']);
                $password = htmlspecialchars($_POST['password']);
                $password = md5($password);
                $reg = "INSERT INTO `users`(`login`, `password`, `created_at`) VALUES (:login, :password, '1')";
                $register = $pdo->prepare($reg);
                $register->execute(['login' => $login, 'password' => $password]);
                if($register) {
                    $query = "SELECT * FROM `users` WHERE `login` = :login AND `password`= :password";
                    $auth_user = $pdo->prepare($query);
                    $auth_user->execute(['login' => $login, 'password' => $password]);
                    $real_user = $auth_user->rowCount();
                    $numrows = $auth_user->fetch();
                    $_SESSION['user'] = [
                        "id" => $numrows['id'],
                        "login" => $numrows['login'],
                        "password" => $numrows['password']
                    ];                                                
                    header('Location: tasklist.php');
                }
            }
        } else {
            $_SESSION['message'] = 'Такой логин уже существует.';
            header('Location: signin.php');
        }
    }

?>