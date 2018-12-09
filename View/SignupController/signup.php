<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>fishbook Sign up</title>

    <style>
        .error
        {
            color: red;
            margin-top: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <form action="?page=signup" method="POST">
        <input name="name" placeholder="imie" type="text" required/><br>
        <?php
            if(isset($_SESSION['e_name'])){
                echo '<div class="error">'.$_SESSION['e_name'].'</div>';
                unset($_SESSION['e_name']);
            }
        ?>
        <input name="surname" placeholder="nazwisko" type="text" required/><br>
        <?php
            if(isset($_SESSION['e_surname'])){
                echo '<div class="error">'.$_SESSION['e_surname'].'</div>';
                unset($_SESSION['e_surname']);
            }
        ?>
        <input name="email" placeholder="email" type="text" required/><br>
        <?php
            if(isset($_SESSION['e_email'])){
                echo '<div class="error">'.$_SESSION['e_email'].'</div>';
                unset($_SESSION['e_email']);
            }
        ?>
        <input name="password1" placeholder="hasło" type="password" required/><br>
        <?php
            if(isset($_SESSION['e_password'])){
            echo '<div class="error">'.$_SESSION['e_password'].'</div>';
            unset($_SESSION['e_password']);
        }
        ?>
        <input name="password2" placeholder="powtórz hasło" type="password" required/><br>
        <label>
            <input type="checkbox" name="reg"/>Akceptuję regulamin<br>
        </label>
        <?php
            if(isset($_SESSION['e_reg'])){
                echo '<div class="error">'.$_SESSION['e_reg'].'</div>';
                unset($_SESSION['e_reg']);
            }
        ?>
        <input type="submit" value="Resestracja"/>
    </form>

</body>

</html>