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
            <div style="clear: both"></div>
        </div>

        <div class="square">
            <div class="info">
            Jan Szewczyk
            </div>
        </div>

        <div class="square">
        </div>
        <div style="clear: both"></div>

        <div class="rectangle">2019 &copy fishbook created by Jan Szewczyk </div>
    </div>



<?php
//echo "Witaj ".$_SESSION["email"]." rola: ".$_SESSION["role"]." !!!";
?>
<br/>
<br/>
<a href="?page=logout">[WYLOGUJ]</a>


    <div class="container">
        <header>
            elo czy działa to gówno ??
        </header>
        <main>
            <article>
                <table>
                    <thead>
                    <tr><th colspan="2">Rekordy</th></tr>
                    <tr><th>ID</th></tr><tr><th>Email</th></tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($_SESSION['listUsers'] as $user){
                        echo "<tr><td>{$user['id']} i mail {$user['email']}</td></tr><tr><td>elo</td></tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </article>
        </main>
    </div>

</body>
</html>
