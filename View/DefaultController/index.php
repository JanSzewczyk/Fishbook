<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>PAI - LAB4</title>
</head>

<body>

<h1>HOMEPAGE</h1>
<p>
    <?= $text ?>
</p>


<?php
if(isset($_SESSION))
    print_r($_SESSION);
?>
</body>
</html>