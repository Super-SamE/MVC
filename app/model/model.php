<?php

    class model {
        
        public function login($auth_post, $login_post, $password_post) {

            if (isset($_SESSION['user'])) {
                header('Location: ?class=Maincontroller&option=tasklist');
            }

            global $pdo;

            if(isset($auth_post)) {
                if(!empty($login_post) && !empty($password_post)) {
                    $login = htmlspecialchars($login_post);
                    $password = htmlspecialchars(md5($password_post));
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
                        header('Location: ?class=Maincontroller&option=tasklist');
                    } else {
                        $login = htmlspecialchars($login_post);
                        $password = htmlspecialchars($password_post);
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
                            header('Location: ?class=Maincontroller&option=tasklist');
                        }
                    }
                } else {
                    $_SESSION['message'] = 'Такой логин уже существует.';
                    //header('Location: signin.php');
                }
            }

        }

    }
    