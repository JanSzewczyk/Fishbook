<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>expedition</title>

    <link rel="stylesheet" href="View/UserController/Expedition/Fontello/css/fontello.css" type="text/css"/>
    <link rel="stylesheet" href="View/UserController/Expedition/style.css" type="text/css"/>
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
        YOUR EXPEDITION
    </div>

    <div class="square">
        <div class="info">
            <?php
            if(isset($_SESSION['expedition'])) {
                $info = $_SESSION['expedition'];
                echo "
                    <div class=\"componentinfo\">
                        <i class=\"icon-calendar\"></i><br>
                        {$info['date']}
                    </div>
                    <div class=\"componentinfo\">
                        <i class=\"icon-location\"></i><br>
                        {$info['pleace']}
                    </div>
                    <div style=\"clear: both\"></div>
                    
                    <div class=\"commentinfo\">
                        {$info['comment']}
                    </div>
                ";
            }
            //unset($_SESSION['expedition']);
            ?>
        </div>
        <div style="clear: both"></div>
        <div class="add">
            <i class="icon-plus"></i><br>
            add Fish
        </div>
        <div class="tile2">
            <i class="icon-trash"></i><br>
            Delete Adventure
        </div>
        <div style="clear: both"></div>
    </div>

    <div class="square">
        <?php
        if(isset($_SESSION['listTrophy'])) {
            $info = $_SESSION['expedition'];
            foreach ($_SESSION['listTrophy'] as $fish) {
                echo "
                <div class=\"fish\">
                    <div class=\"component\">
                        <i class=\"icon-grooveshark\"></i>
                        {$fish['name']}
                    </div>
                    <div class=\"component\">
                        <i class=\"icon-shop\"></i>
                        {$fish['weight']} g
                    </div>
                    <div class=\"component\">
                        <i class=\"icon-resize-horizontal\"></i>
                        {$fish['length']} cm
                    </div> 
                    <a href=\"?page=deletetrophy&id_trophy={$fish['id']}&id_expedition={$info['id']}\" class=\"tilelink\">
                        <div class=\"delete\">
                            <i class=\"icon-cancel\"></i>
                            Delete
                        </div>     
                    </a>
                    <div style=\"clear: both\"></div>      
                </div>
            ";
            }
            unset($_SESSION['listTrophy']);
        }
        ?>
    </div>
    <div style="clear: both"></div>
    <div class="rectangle">2019 &copy fishbook created by Jan Szewczyk </div>

</div>

</body>
</html>
