<?php
require_once (dirname( __FILE__ ) . '\include\html_head.php');
require_once (dirname( __FILE__ ) . '\include\PhotoGalleryXmlParser.php');
?>

<body>
<div id="container">
    <?php
    require_once (dirname( __FILE__ ) . '\include\header.php');
    ?>

    <div id="contentContainer">
        <?php
        require_once (dirname(__FILE__) . '\include\navigation.php');
    	?>	
        <div id="content">
            <div id="centercontent">
	        	<h1>Photo Gallery</h1>
                <div id="photoGallery">
                <?php
                // setup paths
	        	$year = @$_GET['year'];
		        $event = @$_GET['event'];
                $photoFolder = "photo_gallery/" . $year . "/" . $event;
                // "photo_gallery/$year/$event/"
                $path = $photoFolder . '/';
                // "/photo_gallery/$year/$event.xml"
                $sFilename = dirname(__FILE__) . '/' . $photoFolder . ".xml";

                $bFileExists = file_exists($sFilename);

                if ($bFileExists) {
                    $xmlParser = new PhotoGalleryXmlParser();
                    $photoGallery = $xmlParser->Parse($sFilename);

                    for ($i = 0; $i < sizeof($photoGallery->photos); $i++)
                    {
                        $photo = $photoGallery->photos[$i];

                        $fileLocation = $path . $photo->sFilename;
                        ?>
                            <a href="<?php echo $fileLocation; ?>" rel="lightbox" title="<?php echo $photo->sTitle; ?>">
                            <img src="<?php echo $fileLocation; ?>" alt="<?php echo $photo->sTitle; ?>">
                            </a>
                        <?php                        
                    }
                }
                ?>
                </div>
    		    <p class="clear">Back to <a href="photo.php">photo gallery directory</a>.</p>
    	    </div>
        <?php
        if ( $bFileExists == 1) {
        ?>
            <div id="rightcontent">
                <h2>
                    <?php echo $photoGallery->sTitle; ?>
                </h2>
                <span class="date">
                    <?php echo $photoGallery->sDate; ?>
                </span>
                <?php echo $photoGallery->sDescription; ?>
             </div>
        <?php
        }
        ?>
    </div>
</div>
    <?php
    require_once (dirname(__FILE__) . '\include\footer.php');
    ?>
</div>
</body>
</html>
