<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>fishbook</title>
</head>
<body>

<?php
echo "Witaj ".$_SESSION["id"]." rola: ".$_SESSION["role"]." !!!";


?>

<br/>
<br/>

<a href="?page=logout">[WYLOGUJ]</a>
</body>
</html>