<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>fishbook</title>

    <link rel="stylesheet" href="View/UserController/UserMenu/style.css" type="text/css"/>
</head>
<body>

    <div id="container">
        <div class="rectangle">
            <a href="?page=index" class="tilelink">
                <div id="logo">
                    <img src="Resources/Homepage/logo.png">
                </div>
            </a>

            <a href="?page=logout" class="tilelink">
                <div class="logout">
                    [WYLOGUJ]
                </div>
            </a>
            <div style="clear: both"></div>
        </div>

        <div class="square">
            <div class="info">
            Jan Szewczyk info
            </div>
            <div style="clear: both"></div>

            <a href="?page=addexpedition" class="tilelink">
                <div class="addexpedition">
                    addd <br>
                    expedition
                </div>
            </a>

            <a href="?page=allexpedition" class="tilelink">
                <div class="showall">
                    show<br>
                    all
                </div>
            </a>
            <div style="clear: both"></div>

        </div>

        <div class="square">
            <div class="tile1">
               your adventures
            </div>

            <?php
            foreach ($_SESSION['listExped'] as $user){
                echo "
            <a href=\"?page=expedition&id_expedition={$user['id']}\" class=\"tilelink\" >
                <div class=\"date\">
                    {$user['date']} <br>
                    {$user['pleace']}
                </div>
            </a>
            ";
            }
            unset($_SESSION['listExped']);
            ?>

        </div>
        <div style="clear: both"></div>

        <div class="rectangle">2019 &copy fishbook created by Jan Szewczyk </div>
    </div>

</body>
</html>
