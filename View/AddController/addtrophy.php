<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add trophy</title>
    <link rel="stylesheet" href="View/AddController/AddTrophy/style.css" type="text/css"/>
</head>
<body>

<div id="container">
    <div class="rectangle">
        <a href="?page=index" class="tilelink">
            <img src="Resources/Homepage/logo.png">
        </a>
    </div>
    <div style="clear: both"></div>

    <div class="rectangle">
        <div id="addtrophy">
            <form action="?page=addtrophy" method="POST">
                <label for="fish">Choose FISH</label><br>
                <select id="fish" name="fish">
                    <?php
                    if(isset($_SESSION['fishList'])) {
                        foreach ($_SESSION['fishList'] as $fish) {
                            echo "
                    <option value=\"{$fish['id']}\">{$fish['name']}</option>
                ";
                        }
                    }
                    unset($_SESSION['fishList']);
                    ?>
                </select>

                Enter the size fish:<br>
                <input name="length" placeholder="cm" type="number" required/><br>
                Enter the weight:<br>
                <input name="weight" placeholder="g" type="number" required/><br>

                <?php
                if(isset($_SESSION['e_length'])){
                    echo '<div class="error">'.$_SESSION['e_length'].'</div>';
                    unset($_SESSION['e_length']);
                }

                if(isset($_SESSION['e_weight'])){
                    echo '<div class="error">'.$_SESSION['e_weight'].'</div>';
                    unset($_SESSION['e_weight']);
                }
                ?>

                <input type="submit" value="Add fish"/>
            </form>
            <?php

            echo "
                <a href=\"?page=expedition&id_expedition={$_SESSION['expedition']['id']}\" class=\"tilelink\">
                    <div class=\"back\">
                        back
                    </div>
                </a>
            ";
            ?>
        </div>
    </div>

    <div class="rectangle">
        2019 &copy fishbook created by Jan Szewczyk
    </div>


</div>











</body>

</html>