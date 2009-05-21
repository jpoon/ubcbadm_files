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
		
    		<ol>
                <li>
                    <a href="#faq_1">What's the difference between the UBC Badminton Club and SRC drop-in?</a>
                </li>
                <li>
                    <a href="#faq_2">I am <u>not</u> a member, can I still play during the scheduled gym times?</a>
                </li>
                <li>
                    <a href="#faq_3">I don't have any of the necessary equipment to	play badminton (i.e. badminton racket and/or birds). What can I do?</a>
                </li>
                <li>
                    <a href="#faq_4">Oh No! Registration for the club is full. What can I do now?</a>
                </li>
                <li>
                    <a href="#faq_5">What are the rules of badminton?</a>
                </li>
                <li>
                    <a href="#faq_6">How does the 21-point scoring system work?</a>
                </li>
	    	</ol>
		
    		<hr />
    
            <a name="faq_1"></a>
    		<h4>1. What's the difference between the UBC Badminton Club and	SRC drop-in?</h4>
    		<p>The UBC Badminton Club is administered and organized by a group of
	    	passionate badminton players who are committed to promoting the sport.
		    Our gym nights are filled with like-minded individuals who enjoy the
    		cornucopia of perks that the UBC Badminton Club has to offer.</p>
	    	<p>Badminton drop-in at the SRC, on the otherhand, is organized by UBC
    		Rec and is not affliated in any way with the UBC Badminton Club.</p>
		
	    	<hr />

    		<a name="faq_2"></a>
	    	<h4>2. I am <u>not</u> a member, can I still play during the scheduled gym
    		times?</h4>
	    	<p>Everyone is welcome to play badminton at the scheduled gym times.
		    Check out the <a href="membership.php">membership</a> page for drop-in
    		fees.</p>
		
	    	<hr />

    		<a name="faq_3"></a>
	    	<h4>3. I don't have any of the necessary equipment to play badminton (i.e.
		    badminton racket and/or birds). What can I do?</h4>
    		<p>No problemo! We have extra racquets and we provide plastic birds!
	    	Just be sure to bring a piece of I.D. to temporarily exchange for the
		    rental racquet.</p>
		
    		<hr />

    		<a name="faq_4"></a>
	    	<h4>4. Oh No! Registration for the club is full. What can I do now?</h4>
		    <p>Unfortunately, due to the limited gym space, we are only able to accept a
    		certain number of members. If membership is full, you can place your
	    	name on a waiting list and wait for an opening in membership.</p>
		    <p>Otherwise, you are welcome to 'drop-in' during the scheduled gym
    		times.</p>
		
	    	<hr />
		    <a name="faq_5"></a>
    		<h4>5. What are the rules of badminton?</h4>
    		<p>The game of badminton is pretty simple to learn. <a
  			href="http://en.wikipedia.org/wiki/Badminton">Wikipedia</a> is a good
    		place to start. You can also drop in during the scheduled gym times and
	    	our executives will be glad to give you an introduction to the beautiful game
		    of badminton.</p>
		
    		<hr />
	    	<a name="faq_6"></a>
		    <h4>6. How does the 21-point scoring system work?</h4>
    		<p>Ack! What on earth is this 21-pt system?!?! </p>
	    	<p>The International Badminton Federation (IBF) officially adopted the
		    21-point scoring system to replace the 15-point rally system. As such,
    		all games played at the UBC Badminton Club should be scored using the
	    	21-point system.</p>
		    <p>The rules of the 21-point system can be found <a href="pdf/21-point.pdf">here</a>.</p>
    	</div>
	</div>
    <?php
    require_once (dirname(__FILE__) . '\include\footer.php');
    ?>

</div>
</body>
</html>
