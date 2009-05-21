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
	    	    <h1>Welcome</h1>        
		
    		    <p>Yearning to pick up a new sport? Itching to find a place to play
                badminton? Need a way to relieve stress from your academic studies? 
                Want an opportunity to meet new friends? If you answered 'yes' to
                any of the above questions, then come join the UBC Badminton Club!</p>

	    	    <img id="imgFloor" src="imgs/floor.jpg" alt="UBC Badminton Club" />
			
	    	    <p>We welcome players of every skill level so there is no need to fret
        		about finding someone to play with or against. Whether your school
        		budget prevents you from purchasing a badminton racquet or your
                badminton racquets costs more than your tuition, we have a place for you!</p>
    	    </div>

            <div id="rightcontent">
	        	<h2>Summer Break</h2>
                <span class="date">May 2, 2009</span>
                School's Out! Thanks for a wonderful badminton-filled year. Be sure to drop by our sign-up booth during Club Days in September! 
                <p></p>

            </div>

        </div>
        <div class="clear"></div>
    </div>
    <?php
    require_once (dirname(__FILE__) . '\include\footer.php');
    ?>

</div>
</body>
</html>
