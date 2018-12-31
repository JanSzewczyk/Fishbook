<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Show expedition</title>

    <link rel="stylesheet" href="View/UserController/Expedition/style.css" type="text/css"/>
</head>
<body>

    <h1>Adventures</h1>
    <?php
    if(isset($_SESSION['listTrophy'])) {
        foreach ($_SESSION['listTrophy'] as $fish) {
            echo "
                <div class=\"addexpedition\">
                    {$fish['name']} <br>
                    {$fish['weight']}<br>
                    {$fish['length']}
                </div>
            ";
        }
        unset($_SESSION['listExped']);
    }
    ?>

</body>
</html>
