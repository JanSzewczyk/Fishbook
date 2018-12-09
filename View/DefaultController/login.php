<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>fishbook</title>
    <link rel="stylesheet" href="View/DefaultController/Login/style.css" type="text/css"/>
</head>

<body>
    <div id="container">
        <div class="rectangle">
            <a href="?page=index" class="tilelink">
                <div id="logo">
                    <img src="Resources/Homepage/logo.png">
                </div>
            </a>
            <div style="clear: both"></div>
        </div>

        <div class="login">
            <div id="window">
                <form action="?page=login" method="POST">
                    <input name="email" placeholder="email" type="text" required/><br><br>
                    <input name="password" placeholder="password" type="password" required/><br><br>
                    <?php if(isset($message)): ?>
                        <?php foreach($message as $item): ?>
                            <div><?= $item ?></div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <input type="submit" value="Zaloguj"/>
                </form>
            </div>
        </div>

        <div class="rectangle">2019 &copy fishbook created by Jan Szewczyk </div>
    </div>

</body>
</html>