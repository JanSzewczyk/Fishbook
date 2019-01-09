<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title> all expedition</title>
    <link rel="stylesheet" href="View/UserController/AllExpedition/style.css" type="text/css"/>
    <link rel="stylesheet" href="View/UserController/AllExpedition/Fontello/css/fontello.css" type="text/css"/>

</head>

<body>

<div id="container">
    <div class="rectangle">
        <a href="?page=index" class="tilelink">
            <div id="logo">
                <img src="Resources/Homepage/logo.png">
            </div>
        </a>
        <a href="?page=usermenu" class="tilelink">
            <div class="back">
                <i class="icon-reply"></i>
                BACK
            </div>
        </a>
        <div style="clear: both"></div>
    </div>

    <div class="description">
        YOUR EXPEDITIONS
    </div>

    <div class="square">
        <?php
        foreach ($_SESSION['listAllExped'] as $expedition){
            echo "
                <a href=\"?page=expedition&id_expedition={$expedition['id']}\" class=\"tilelink\">
                    <div class=\"expedition\">
                        <div class=\"component\">
                            <i class=\"icon-calendar\"></i> 
                            <br>
                            {$expedition['date']} 
                        </div>
                        <div class=\"component\">
                            <i class=\"icon-location\"></i>
                             <br>
                            {$expedition['pleace']} 
                        </div>
                    </div>
                </a>
            ";
        }
        unset($_SESSION['listAllExped']);
        ?>

    </div>


    <div style="clear: both"></div>
    <div class="rectangle">2019 &copy fishbook created by Jan Szewczyk </div>

</div>

</body>
</html>
