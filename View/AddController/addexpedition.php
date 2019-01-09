<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add expedition</title>
    <link rel="stylesheet" href="View/AddController/AddExpedition/style.css" type="text/css"/>
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
        <div id="addexpedition">
            <form action="?page=addexpedition" method="POST">
                Enter the date of the trip:<br>
                <input name="date" type="date" required/><br>
                Enter the place of fishing:<br>
                <input name="pleace" placeholder="river, lake, s..." type="text" required/><br>
                Add comment:</br>
                <input name="comment" placeholder="[optional]" type="text"/><br>

                <input type="submit" value="Add expedition"/>
            </form>
            <a href="?page=usermenu" class="tilelink">
                <div class="back">
                    back
                </div>
            </a>
        </div>
    </div>

    <div class="rectangle">
        2019 &copy fishbook created by Jan Szewczyk
    </div>
</div>


</body>

</html>