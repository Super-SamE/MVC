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
                                        <form id="form1" method="POST" action="?class=Maincontroller&option=tasklist">
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
                            
                                require_once 'app/view/outtask.php';
                                
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>