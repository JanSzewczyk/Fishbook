<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>fishbook</title>
</head>
<body>

<?php
echo "Witaj ".$_SESSION["email"]." rola: ".$_SESSION["role"]." !!!";
?>
<br/>
<br/>
<a href="?page=logout">[WYLOGUJ]</a>

<main>
    <article>
        <table>

        </table>
    </article>
</main>
</body>
</html>
