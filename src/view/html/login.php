<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>loginPage</title>

        <!-- Header -->
        <?php
            $sPageName = basename(__FILE__, ".php");
            require_once "header.php"
        ?>
    </head>
    <body>

        <br>
        <br>

        <br>

        <fieldset>
            <img src="../../../img/logo.png" alt="Bar Hopping" title="Bar Hopping" height="150" width="150"/><br>
            &copy; seit 2018
            <br>
            <img src="../../../img/quote.png" alt="quote" title="quote" height="30" width="20"/>
            <cite><strong>Realität ist eine Illusion, die sich aus Mangel an Drinks einstellt.</strong></cite>
            <br>
            <br>
            <h2>Login</h2>
            <p><img id="two" src="../../../img/user.png" height="25px" width="25px"/>
                <input type="text" name="Benutzername" size="30" maxlength="40" placeholder="Benutzername"/></p>
            <p>
            <p><img id="tree" src="../../../img/lock.gif" height="25px" width="25px"/>
                <input type="password" name="Passwort" size="30" maxlength="40" placeholder="Passwort"/></p>
            <p><input id="five" type="submit" onclick="return check(this.form)" placeholder="Anmelden"></p>
            <!--add onClick[...}-->
            <p>
                <button type="button" name="Zurück" onclick="self.location.href='register.php'" placeholder="Zurück">
                    Zurück
                </button>
            </p>
            <br>
            Du hast dein Passwort vergessen? Dann klicke <a href="reset_password.php"> hier</a>.

            <!-- Footer -->
            <?php require_once "footer.php" ?>
    </body>
</html>
