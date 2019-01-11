<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>fishbook</title>

    <link rel="stylesheet" href="View/UserController/UserMenu/Fontello/css/fontello.css" type="text/css"/>
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
                    <i class="icon-logout"></i><br>
                </div>
            </a>
            <div style="clear: both"></div>
        </div>

        <div class="square">
            <div class="info">
                <?php
                    echo "
                        <div class=\"componentinfo\">
                            <i class=\"icon-user\"></i><br>
                            {$_SESSION['name']}
                        </div>
                        <div class=\"componentinfo\">
                            <i class=\"icon-mail\"></i><br>
                             {$_SESSION['email']}
                        </div>
                     ";
                ?>
            </div>
            <div style="clear: both"></div>

            <a href="?page=addexpedition" class="tilelink">
                <div class="addexpedition">
                    <i class="icon-plus"></i><br>
                    Add Expedition
                </div>
            </a>

            <a href="?page=allexpedition" class="tilelink">
                <div class="showall">
                    <i class="icon-list-bullet"></i><br>
                    Show All
                </div>
            </a>
            <div style="clear: both"></div>

            <?php
                if($_SESSION['role'] == "admin"){
                    echo "
                        <a href=\"?page=adminmenu\" class=\"tilelink\">
                            <div class=\"adminpanel\">
                                <i class=\"icon-address-book\"></i><br>
                                ADMIN PANEL
                            </div>
                        </a>
                    ";
                }
            ?>

        </div>

        <div class="square">
            <div class="description">
               YOUR LAST EXPEDITIONS
            </div>

            <?php
            foreach ($_SESSION['listExped'] as $user){
                echo "
            <a href=\"?page=expedition&id_expedition={$user['id']}\" class=\"tilelink\" >
                <div class=\"date\">
                    <div class=\"componentdate\">
                        <i class=\"icon-map\"></i><br>
                        {$user['pleace']}
                    </div>
                    <div class=\"componentdate\">
                        <i class=\"icon-calendar\"></i><br>
                        {$user['date']}
                    </div>
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
