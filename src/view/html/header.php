<!DOCTYPE html>

<?php
require_once __DIR__ . "/../../controller/session.controller.php";
require_once __DIR__ . "/../../controller/user.controller.php";

if (isSessionNeeded() && getUser() === null) {
    header("Location: /src/view/html/login.php");
    die();
}
?>

<!-- Encoding -->
<meta charset="UTF-8">

<!-- Google icon pack -->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>

<!-- Global css -->
<link rel="stylesheet" href="../css/global.css"/>

<!---------------------------------------->
<!-- Page specific -->
<!---------------------------------------->

<?php isset($sPageName) or exit("Page title (\$sPageTitle) was not set!"); ?>

<!-- Please keep these links at the bottom of this file
     to make it possible to overwrite f.ex. css styles of external resources -->

<!-- Page specific resources -->
<?php if (file_exists($sCssFile = "../css/{$sPageName}.css")) { ?>

    <!-- CSS source -->
    <link rel="stylesheet" type="text/css" href="<?php echo $sCssFile; ?>">
<?php } ?>
