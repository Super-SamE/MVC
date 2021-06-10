<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
        require 'public/vendor/links.php';
    ?>

    <title>ВХОД</title>
</head>
<body>
    <div class="block-wrap">
        <div class="sign-block">
            <form method="POST" action="?class=Maincontroller&option=getformauth">
                <button type="submit" class="btn-btn sign-btn">ВХОД</button>
            </form>
        </div>
    </div>
</body>
</html>