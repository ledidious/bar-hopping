<!-- todo load JQuery -->

<!---------------------------------------->
<!-- Page specific -->
<!---------------------------------------->

<?php isset($sPageName) or exit("Page title (\$sPageTitle) was not set!"); ?>

<!-- Javascript -->
<?php if (file_exists($sJsFile = "../js/{$sPageName}.js")) { ?>

    <!-- JS source -->
    <script src="<?php echo $sJsFile ?>"></script>

<?php } ?>
