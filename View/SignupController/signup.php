<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sign up</title>
    <link rel="stylesheet" href="View/SignupController/Signup/style.css" type="text/css"/>

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
            <div id="signupwin">
                <form action="?page=signup" method="POST">
                    <input name="name" placeholder="imie" type="text" required/><br>
                    <?php
                    if(isset($_SESSION['e_name'])){
                        echo '<div class="error">'.$_SESSION['e_name'].'</div>';
                        unset($_SESSION['e_name']);
                    } else{
                        echo '<br>';
                    }
                    ?>
                    <input name="surname" placeholder="nazwisko" type="text" required/><br>
                    <?php
                    if(isset($_SESSION['e_surname'])){
                        echo '<div class="error">'.$_SESSION['e_surname'].'</div>';
                        unset($_SESSION['e_surname']);
                    } else{
                        echo '<br>';
                    }
                    ?>
                    <input name="email" placeholder="email" type="text" required/><br>
                    <?php
                    if(isset($_SESSION['e_email'])){
                        echo '<div class="error">'.$_SESSION['e_email'].'</div>';
                        unset($_SESSION['e_email']);
                    } else{
                        echo '<br>';
                    }
                    ?>
                    <input name="password1" placeholder="hasło" type="password" required/><br>
                    <?php
                    if(isset($_SESSION['e_password'])){
                        echo '<div class="error">'.$_SESSION['e_password'].'</div>';
                        unset($_SESSION['e_password']);
                    } else{
                        echo '<br>';
                    }
                    ?>
                    <input name="password2" placeholder="powtórz hasło" type="password" required/><br><br>
                    <label>
                        <input type="checkbox" name="reg"/>Akceptuję regulamin<br>
                    </label>
                    <?php
                    if(isset($_SESSION['e_reg'])){
                        echo '<div class="error">'.$_SESSION['e_reg'].'</div>';
                        unset($_SESSION['e_reg']);
                    } else{
                        echo '<br>';
                    }
                    ?>
                    <input type="submit" value="Resestracja"/>
                </form>
            </div>
        </div>

        <div class="rectangle">
            2019 &copy fishbook created by Jan Szewczyk
        </div>
    </div>



</body>

</html>