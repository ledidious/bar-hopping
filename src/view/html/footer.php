<!---------------------------------------->
<!-- Page specific -->
<!---------------------------------------->

<?php isset($sPageName) or exit("Page title (\$sPageTitle) was not set!"); ?>

<!-- Javascript -->
<?php if (file_exists($sJsFile = "../js/{$sPageName}.js")) { ?>

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <!-- JS source -->
    <script src="<?php echo $sJsFile ?>"></script>

    <!-- goole map -->
    <script src="../js/map.js" ></script>

<?php } ?>
