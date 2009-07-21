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
        	<div id="centercontent">
		
    	    	<h1>Photo Gallery</h1>
	    	    <p>The UBC Badminton Club boasts a year full of events and activities.
    		    Browse our photo gallery for a glimpse into the club and view the
        		variety of our events that we offer.</p>
                
                <ul>
                    <li>
                        <a href="#" class="photoGroup" id="photo08-title">2008/2009</a>
                        <span class="switchgroup" id="photo08"> 
                        <a href="photo_redirect.php?year=08-09&event=open_tourney">
                        Open Tournament</a> <span class="date">February 20-22, 2008</span>
                        </span>
                    </li>
                    <li>
                        <a href="#" class="photoGroup" id="photo07-title">2007/2008</a>
                        <span class="switchgroup" id="photo07">
                        <a href="photo_redirect.php?year=07-08&event=open_tourney">Open
                        Tournament</a> <span class="date">February 15-17, 2008</span>
                        </span>
                    </li>
                    <li>
                        <a href="#" class="photoGroup" id="photo06-title">2006/2007</a>
                        <span class="switchgroup" id="photo06">
                        <a href="photo_redirect.php?year=06-07&event=open_tourney">Open
                        Tournament</a> <span class="date">February 2007</span>
                        </span>
	                </li>
                    <li>    
                        <a href="#" class="photoGroup" id="photo05-title">2005/2006</a>
                        <span class="switchgroup" id="photo05">
    	    	        <a href="photo_redirect.php?year=05-06&event=open_tourney">Open
                        Tournament</a> <span class="date">March 23-24, 2006</span>
                        </span>
                    </li>
                    <li>
                        <a href="#" class="photoGroup" id="misc-title">Miscellaneous</a>
                        <span class="switchgroup" id="misc">
                        <a href="photo_redirect.php?year=misc&event=fun_times">Let the good times roll...</a>
                        </span>
                    </li>
                </ul>

                <script type="text/javascript">
                    var photo_content=new switchcontent("switchgroup", "span") //Limit scanning of switch contents to just "p" elements
                    photo_content.collapsePrevious(false) //Allow more than 1 content to be open simultanously
                    photo_content.setPersist(false)
                    photo_content.collapsePrevious(true)
                    photo_content.defaultExpanded(0)
                    photo_content.init()
                </script>

        	</div>
    
            <div id="rightcontent">
                <h2>Photos!</h2>
                <p>If you have any UBC Badminton Club related photos, send them our way and we'll post them up for all the world to see!</p>
            </div>
        </div>

    </div>
    <?php
    require_once ('include/footer.php');
    ?>

</div>
</body>
</html>
