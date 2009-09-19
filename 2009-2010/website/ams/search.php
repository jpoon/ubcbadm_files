<?php
require_once ('include/html_head.php');
?>
<body>
<div id="container">
    <?php
    require_once ('include/header.php');
    ?>

    <div id="contentContainer">

        <?php
        require_once ('include/navigation.php');
    	?>	

        <div id="content">
            <div id="cse-search-results" style="overflow:hidden;"></div>
            <script type="text/javascript">
                var googleSearchIframeName = "cse-search-results";
                var googleSearchFormName = "cse-search-box";
                var googleSearchFrameWidth = 756;
                var googleSearchDomain = "www.google.com";
                var googleSearchPath = "/cse";
            </script>
            <script type="text/javascript" src="scripts/googleSearchResults.js"></script>
        </div>
        <div class="clear"></div>
    </div>
    <?php
    require_once ('include/footer.php');
    ?>

</div>
</body>
</html>
