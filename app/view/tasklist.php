<?php

    if(!isset($_SESSION['user'])){
        header('Location: ?class=Maincontroller&option=getformauth');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
        require 'public/vendor/links.php';
    ?>

    <title>Tasklist</title>
</head>
<body>
    <section class="task-list">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="content-block">
                        <div class="content">
                            <div>
                                <form method="POST" action="?class=Maincontroller&option=logout">
                                    <button class="btn btn-outline-dark" type="submit" name="logout">Выход</button>
                                </form>
                            </div>
                            <div class="title">
                                <label>Task list</label>
                            </div>
                            <div class="add-task">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <form id="form1" method="POST">
                                            <div class="roow">
                                                <input type="text" placeholder="Enter text..." class="form-controlo" name="nametask">
                                                <button type="submit" name="addtask" class="btn btn-darkk">Add Task</button>
                                            </div>
                                            <div class="btn-form1">
                                                <button type="submit" name="removeall" class="btn btn-outline-dark"><b>REMOVE ALL</b></button>
                                                <button type="submit" name="readyall" class="btn btn-outline-dark"><b>READY ALL</b></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php

                            /*    $addtask = $_POST['addtask'];
                                $nametask = $_POST['nametask'];
                                $readyall = $_POST['readyall'];
                                $removeall = $_POST['removeall'];

                                if(isset($addtask)) {
                                $nametask = htmlspecialchars($_POST['nametask']);
                                $new_addtask = "INSERT INTO `tasks`(`user_id`, `description`, `created_at`, `status`) VALUES (:userid, :nametask, '1', '0')";
                                $newtask = $pdo->prepare($new_addtask);
                                $newtask->execute(['userid' => $_SESSION['user']['id'], 'nametask' => $nametask]);
                                }

                                $readyidtask = $_GET['readyidtask'];
                                $delidtask = $_GET['delidtask'];
                                $ready = $_GET['ready'];
                                $remove = $_GET['remove'];

                                $task_removeall = "UPDATE `tasks` SET `status` = '0' WHERE `tasks`. `id` = :remove";
                                $task_remove = $pdo->prepare($task_removeall);
                                $task_remove->execute(['remove' => $remove]);

                                $task_readyall = "UPDATE `tasks` SET `status` = '1' WHERE `tasks`. `id` = :ready";
                                $task_ready = $pdo->prepare($task_readyall);
                                $task_ready->execute(['ready' => $ready]);

                                $task_del = "DELETE FROM `tasks` WHERE `tasks`.`id` = :delidtask";
                                $delete = $pdo->prepare($task_del);
                                $delete->execute(['delidtask' => $delidtask]);

                                $outtask = "SELECT * FROM `tasks` WHERE `user_id` = :userid";
                                $usertask = $pdo->prepare($outtask);
                                $usertask->execute(['userid' => $_SESSION['user']['id']]);
                                $usertaskout = $usertask->fetch();

                                if(isset($readyall)) {
                                    $readyupdate = "UPDATE `tasks` SET `status` = '1' WHERE `user_id` = :userid";
                                    $update = $pdo->prepare($readyupdate);
                                    $update->execute(['userid' => $_SESSION['user']['id']]);
                                }

                                if(isset($removeall)) {
                                    $removetask = "DELETE FROM `tasks` WHERE `tasks`.`user_id` = :userid";
                                    $remove = $pdo->prepare($removetask);
                                    $remove->execute(['userid' => $_SESSION['user']['id']]);
                                }

                                while($usertaskout = $usertask->fetch()) {
                                    if($usertaskout['status']==0) {
                                        echo "
                                            <div class='tasks'>
                                                <div class='row'>
                                                    <div class='col-lg-8 col-md-8'>
                                                        <div>
                                                            <label>$usertaskout[description]</label>
                                                        </div>
                                                        <div class='btn-form2'>
                                                            <a href=?ready=$usertaskout[id]><button type='submit' name='ready' class='btn btn-outline-dark'><b>READY</b></button></a>
                                                            <a href=?delidtask=$usertaskout[id]><button type='submit' name='deleteidtask' class='btn btn-outline-dark'><b>DELETE</b></button></a>
                                                        </div>
                                                    </div>
                                                    <div class='col-lg-4 col-md-4'>
                                                        <div class='circle'>
        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        ";
                                    } else {
                                        echo "
                                            <div class='tasks1'>
                                                <div class='row'>
                                                    <div class='col-lg-8 col-md-8'>
                                                        <div>
                                                            <label>$usertaskout[description]</label>
                                                        </div>                                                        
                                                        <div class='btn-form2'>
                                                            <a href=?remove=$usertaskout[id]><button type='submit' name='remove' class='btn btn-outline-dark'><b>UNREADY</b></button></a>
                                                            <a href=?delidtask=$usertaskout[id]><button type='submit' name='deleteidtask' class='btn btn-outline-dark'><b>DELETE</b></button></a>
                                                        </div>                                                        
                                                    </div>
                                                    <div class='col-lg-4 col-md-4'>
                                                        <div class='circle1'>
        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        ";
                                    }
                                }

                               */ 
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>