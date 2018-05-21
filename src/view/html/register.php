<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!--für mobile Ansicht notwendig-->
    <title>index</title>


    <!-- Header -->
    <?php
    $sPageName = basename(__FILE__, ".php");
    require_once "header.php";
    /*require_once "user.controller.php";

    $regObj = new RegisterController();
    $regObj->addUser();*/
    ?>

</head>
<body>
<form method="post" action="../../router/user.router.php">
    <br>
    <br>

    <br>

    <fieldset>
        <img id="logo" src="../../../img/logo.png" alt="Bar Hopping" title="Bar Hopping"/><br>
        &copy; seit 2018
        <br>
        <br>
        <img id="cit" src="../../../img/quote.png" alt="quote" title="quote" height="30" width="20"/><cite><strong>Realität
                ist
                eine
                Illusion, die sich aus Mangel an Drinks einstellt.</strong></cite>
        <br>
        <br>
        <p>Kostenlosen Barhopping Account erstellen</p>
        <p><img id="one" src="../../../img/mail.png" height="25px" width="25px"/>
            <input type="text" name="mail" size="30" maxlength="40" placeholder="E-Mail Adresse"/></p>
        <p><img id="two" src="../../../img/user.png" height="25px" width="25px"/>
            <input type="text" name="name" size="30" maxlength="40" placeholder="Vollständiger Name"/>
        </p>
        <p><img id="two" src="../../../img/user.png" height="25px" width="25px"/>
            <input type="text" name="username" size="30" maxlength="40" placeholder="Benutzername"/></p>
        <p>
        <p><img id="tree" src="../../../img/lock.gif" height="25px" width="25px"/>
            <input type="password" name="password" size="30" maxlength="40" placeholder="Passwort"/></p>
        <p><input id="four" type="submit" onclick="return check(this.form)" placeholder="Anmelden"></p>
        <!--add onClick[...}-->
        Du hast ein Konto? <a href="login.php"> Melde dich hier an.</a>
    </fieldset>
</form>
<!-- Footer -->
<?php require_once "footer.php" ?>
</body>
</html>
