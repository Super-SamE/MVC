<?php

    class model {
        
        public function login($auth_post, $login_post, $password_post) {

            if (isset($_SESSION['user'])) {
                $link="1";
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
                        $link="2";
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
                            $link="3";
                        }
                    }
                } else {
                    $_SESSION['message'] = 'Такой логин уже существует.';
                    
                }
            }
            return $link;
        }

        public function addtasks($userid, $nametask, $addtask) {

            global $pdo;

            if(isset($addtask)) {
                $nametask = htmlspecialchars($nametask);
                $new_addtask = "INSERT INTO `tasks`(`user_id`, `description`, `created_at`, `status`) VALUES (:userid, :nametask, '1', '0')";
                $newtask = $pdo->prepare($new_addtask);
                $newtask->execute(['userid' => $userid, 'nametask' => $nametask]);
            }

        }

        public function ready() {

            global $pdo;

            $task_readyall = "UPDATE `tasks` SET `status` = '1' WHERE `tasks`. `id` = :ready";
            $task_ready = $pdo->prepare($task_readyall);
            $task_ready->execute(['ready' => $ready]);

        }

        public function remove() {

            global $pdo;

            $task_removeall = "UPDATE `tasks` SET `status` = '0' WHERE `tasks`. `id` = :remove";
            $task_remove = $pdo->prepare($task_removeall);
            $task_remove->execute(['remove' => $remove]);

        }

        public function delidtask() {

            global $pdo;

            $task_del = "DELETE FROM `tasks` WHERE `tasks`.`id` = :delidtask";
            $delete = $pdo->prepare($task_del);
            $delete->execute(['delidtask' => $delidtask]);

        }

        public function readyall() {

            global $pdo;

            if(isset($readyall)) {
                $readyupdate = "UPDATE `tasks` SET `status` = '1' WHERE `user_id` = :userid";
                $update = $pdo->prepare($readyupdate);
                $update->execute(['userid' => $_SESSION['user']['id']]);
            }

        }

        public function removeall() {

            global $pdo;

            if(isset($removeall)) {
                $removetask = "DELETE FROM `tasks` WHERE `tasks`.`user_id` = :userid";
                $remove = $pdo->prepare($removetask);
                $remove->execute(['userid' => $_SESSION['user']['id']]);
            }

        }

        public function outtask() {

            global $pdo;
            
            $outtask = "SELECT * FROM `tasks` WHERE `user_id` = :userid";
            $usertask = $pdo->prepare($outtask);
            $usertask->execute(['userid' => $_SESSION['user']['id']]);
            $usertaskout = $usertask;
            return $usertaskout;

        }

    }
    