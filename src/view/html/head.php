<!DOCTYPE html>

<!-- Encoding -->
<meta charset="UTF-8">

<!-- Google icon pack -->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

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

<!-- Best practices for loading javascript is to load it at the end of the 
     file inside the body-tag -->
<?php if (file_exists($sJsFile = "../js/{$sPageName}.js")) { ?>

    <!-- JS source -->
    <script type="javascript" src="<?php echo $sJsFile ?>"></script>

<?php } ?>


