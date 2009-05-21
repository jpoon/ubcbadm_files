<?php
require_once (dirname( __FILE__ ) . '\include\html_head.php');
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
	    	    <p>The UBC Badminton Club boasts a year full of events and activities.
    		    Browse our photo gallery for a glimpse into the club and view the
        		variety of our events that we offer.</p>
        
    	    	<h2>2008/2009</h2>
                <a href="photo_redirect.php?year=08-09&event=open_tourney">
                Open Tournament</a> <span class="date">February 20-22, 2008</span> <br />
    
    	    	<h2>2007/2008</h2>
        		<a href="photo_redirect.php?year=07-08&event=open_tourney">Open
    	    	Tournament</a> <span class="date">February 15-17, 2008</span> <br />
				
        		<h2>2006/2007</h2>
    	    	<a href="photo_redirect.php?year=06-07&event=open_tourney">Open
        		Tournament</a> <span class="date">February 2007</span> <br />
		
	    	    <h2>2005/2006</h2>
    	    	<a href="photo_redirect.php?year=05-06&event=open_tourney">Open
        		Tournament</a> <span class="date">March 23-24, 2006</span> <br />

                <h2>Miscellaneous</h2>
                <a href="photo_redirect.php?year=misc&event=fun_times">Let the good times roll...</a> <br />
        	</div>
    
            <div id="rightcontent">
                <h2>Photographers Wanted!</h2>
                <p>If you have any UBC Badminton Club related photos, send them our way and we'll post them up for all the world to see!</p>
            </div>
        </div>

    </div>
    <?php
    require_once (dirname(__FILE__) . '\include\footer.php');
    ?>

</div>
</body>
</html>
