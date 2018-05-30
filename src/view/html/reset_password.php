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
        <form method="post" action="../../router/user.router.php">
        <fieldset>
            <img id="logo" src="../../../img/logo.png" alt="Bar Hopping" title="Bar Hopping" height="150" width="150"/><br>
            &copy; seit 2018
            <br>
            <br>
            <img id="cit" src="../../../img/quote.png" alt="quote" title="quote" height="30" width="20"/><cite><strong>Realität
                    ist
                    eine Illusion, die sich aus Mangel an Drinks einstellt.</strong></cite>
            <br>
            <br>
            <h2>Passwort zurücksetzen</h2>
            Wir können dir beim Zurücksetzen deines Passworts über den mit deinem Konto verknüpfte Benutzernamen
            behilflich sein.
            <br>
            <br>
            <p><img id="one" src="../../../img/user.png" height="25px" width="25px"/>
                <input type="text" name="username" size="30" maxlength="40" placeholder="Benutzername"/></p>
            <div id="reset" style="display: none">
                Ihr neues Password:
                <p><img id="tree" src="../../../img/lock.gif" height="25px" width="25px"/>
                    <input type="text" name="password" size="30" maxlength="40" placeholder="neues Password"/></p>
            </div>
            <p><input id="six" type="submit" onclick="return check(this.form)" style="display: none"></p>
            <p><button type="button" id="eight">Zurücksetzen</button></p>
            <!--add onClick[...}-->
            <p>
                <button id="seven" type="button" name="Zurück" onclick="self.location.href='login.php'" placeholder="Zurück">
                    Zurück
                </button>
            </p>
        </fieldset>
        </form>

            <!-- Footer -->
            <?php require_once "footer.php" ?>

        <script>
            $( "button" ).click(function() {
                $( "#reset" ).toggle();
            });
        </script>
    </body>
</html>
