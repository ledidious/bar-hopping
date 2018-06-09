<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">

    <title>index</title>

    <!-- Header -->
    <?php
    require_once __DIR__ . "/../../controller/session.controller.php";
        allowWithoutSession();

    $sPageName = basename(__FILE__, ".php");
    require_once "header.php"
    ?>
</head>
<body>
<br>
<br>
<br>
<fieldset>

    <img id="logo" src="../../../img/logo.png" alt="Bar Hopping" title="Bar Hopping" /><br>
    &copy; seit 2018
    <br>
    <br>
    <img id="cit" src="../../../img/quote.png" alt="quote" title="quote" />
    <cite><strong>Realität ist eine Illusion, die sich aus Mangel an Drinks einstellt.</strong></cite>
    <br>
    <br>
    <h2>Login</h2>
    <p>
    <form method="post" action="../../router/user.router.php">
    <img id="two" src="../../../img/user.png" height="25px" width="25px"/>
    <input type="text" name="username" size="30" maxlength="40" placeholder="Benutzername"/></p>
    <p>
    <p><img id="tree" src="../../../img/lock.gif" height="25px" width="25px"/>
        <input type="password" name="password" size="30" maxlength="40" placeholder="Passwort"/></p>
    <p><input id="five" type="submit" onclick="return check(this.form)" placeholder="Anmelden"></p>
    <!--add onClick[...}-->
    <p>
        <button id="seven" type="button" name="Zurück" onclick="self.location.href='register.php'" placeholder="Zurück">
            Zurück
        </button>
    </p>
        </form>
    <br>
    Du hast dein Passwort vergessen? Dann klicke <a href="reset_password.php"> hier</a>.
</fieldset>

<!-- Footer -->
<?php require_once "footer.php" ?>
</body>
</html>
