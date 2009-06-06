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
		    <h1>FAQ</h1>
		
    		<ul>
                <li>
                    <a href="#" id="faq_content1-title">What's the difference between the UBC Badminton Club and SRC drop-in?</a>
                    <span id="faq_content1" class="switchgroup">
                        <p>The UBC Badminton Club is administered and organized by a group of
            	    	passionate badminton players who are committed to promoting the sport.
            		    Our gym nights are filled with like-minded individuals who enjoy the
    		            cornucopia of perks that the UBC Badminton Club has to offer.</p>
            	    	<p>Badminton drop-in at the SRC, on the otherhand, is organized by UBC
                		Rec and is not affliated in any way with the UBC Badminton Club.</p>
                    </span>
                </li>
                <li>
                    <a href="#" id="faq_content2-title" class="handCursor">I am <u>not</u> a member, can I still play during the scheduled gym times?</a>
                    <span id="faq_content2" class="switchgroup">
                        <p>Everyone is welcome to play badminton at the scheduled gym times.
                        Check out the <a href="membership.php">membership</a> page for drop-in
                		fees.</p>
                    </span>
                </li>
                <li>
                    <a href="#" id="faq_content3-title" class="handCursor">I don't have any of the necessary equipment to	play badminton (i.e. badminton racket and/or birds). What can I do?</a>
                    <span id="faq_content3" class="switchgroup">
            		<p>No problemo! We have extra racquets and we provide plastic birds!
	            	Just be sure to bring a piece of I.D. to temporarily exchange for the
        		    rental racquet.</p>
                    </span>
                </li>
                <li>
                    <a href="#" id="faq_content4-title" class="handCursor">Oh No! Registration for the club is full. What can I do now?</a>
                    <span id="faq_content4" class="switchgroup">
                    <p>Unfortunately, due to the limited gym space, we are only able to accept a
            		certain number of members. If membership is full, you can place your
        	    	name on a waiting list and wait for an opening in membership.</p>
        		    <p>Otherwise, you are welcome to 'drop-in' during the scheduled gym
            		times.</p>
                    </span>
                </li>
                <li>
                    <a href="#" id="faq_content5-title" class="handCursor">What are the rules of badminton?</a>
                    <span id="faq_content5" class="switchgroup">
            		<p>The game of badminton is pretty simple to learn. <a
          			href="http://en.wikipedia.org/wiki/Badminton">Wikipedia</a> is a good
            		place to start. You can also drop in during the scheduled gym times and
        	    	our executives will be glad to give you an introduction to the beautiful game
        		    of badminton.</p>
                    </span>
                </li>
                <li>
                    <a href="#" id="faq_content6-title" class="handCursor">How does the 21-point scoring system work?</a>
                    <span id="faq_content6" class="switchgroup">
            		<p>Ack! What on earth is this 21-pt system?!?! </p>
        	    	<p>The International Badminton Federation (IBF) officially adopted the
        		    21-point scoring system to replace the 15-point rally system. As such,
            		all games played at the UBC Badminton Club should be scored using the
        	    	21-point system.</p>
        		    <p>The rules of the 21-point system can be found <a href="pdf/21-point.pdf">here</a>.</p>
                    </span>
                </li>
            </ul>

            <script type="text/javascript">
                var faq_content=new switchcontent("switchgroup", "span") //Limit scanning of switch contents to just "p" elements
                faq_content.collapsePrevious(false) //Allow more than 1 content to be open simultanously
                faq_content.setPersist(false)
                faq_content.collapsePrevious(true)
                faq_content.defaultExpanded(0)
                faq_content.init()
            </script>

    	</div>
	</div>
    <?php
    require_once (dirname(__FILE__) . '\include\footer.php');
    ?>

</div>
</body>
</html>
