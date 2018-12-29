<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sign up</title>
</head>
<body>

<form action="?page=addexpedition" method="POST">
    Enter the date of the trip:<br>
    <input name="date" type="date" required/><br>
    Enter the place of fishing:<br>
    <input name="pleace" placeholder="river, lake, s..." type="text" required/><br>
    Add comment:</br>
    <input name="comment" placeholder="[optional]" type="text"/><br>

    <input type="submit" value="Add fish"/>
</form>

</body>

</html>