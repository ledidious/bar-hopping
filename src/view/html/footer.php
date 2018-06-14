<!---------------------------------------->
<!-- Page specific -->
<!---------------------------------------->

<?php isset($sPageName) or exit("Page title (\$sPageTitle) was not set!"); ?>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<!-- Global js -->
<script src="../js/global.js"></script>

<!-- Javascript -->
<?php if (file_exists($sJsFile = "../js/{$sPageName}.js")) { ?>

    <!-- JS source (self named to page name) -->
    <script src="<?php echo $sJsFile ?>"></script>

<?php } ?>
