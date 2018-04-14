<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>resetPassword</title>

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
            <img src="../../../img/quote.png" alt="quote" title="quote" height="30" width="20"/><cite><strong>Realität
                    ist
                    eine Illusion, die sich aus Mangel an Drinks einstellt.</strong></cite>
            <br>
            <br>
            <h2>Passwort zurücksetzen</h2>
            Wir können dir beim Zurücksetzen deines Passworts über die mit deinem Konto verknüpfte E-Mail-Adresse
            behilflich sein.
            <br>
            <br>
            <p><img id="one" src="../../../img/mail.png" height="25px" width="25px"/>
                <input type="text" name="E-Mail" size="30" maxlength="40" placeholder="E-Mail Adresse"/></p>
            <p><input id="six" type="submit" onclick="return check(this.form)" placeholder="Passwort zurücksetzen"></p>
            <!--add onClick[...}-->
            <p>
                <button type="button" name="Zurück" onclick="self.location.href='login.php'" placeholder="Zurück">
                    Zurück
                </button>
            </p>

            <!-- Footer -->
            <?php require_once "footer.php" ?>
    </body>
</html>
