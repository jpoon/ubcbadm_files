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
	    	<h1>About Us</h1>

		    <img src="imgs/UBC logo.jpg" id="imgUbcLogo" alt="UBC Logo" />

          	<p>Whether you've just been introduced to the sport or you feel like
	        the badminton racquet is an extension of your arm, come out and join
            us at one of our many gym nights for hours of badminton fun!</p>

            <p>The University of British Columbia (UBC) Badminton Club is a registered 
            AMS club at the University of British Columbia in Vancouver, British 
            Columbia, Canada. The club is wholly administered by students whose aim is 
            to promote and encourage the sport of badminton. As such, players of all 
            skill-level are invited to join.</p>

    		<h1>Executives</h1>
		
	    	<img src="imgs/execs.jpg" id="img07Execs" alt="'07 Execs" />
				
    		<table border="1">		
	    		<tr>
		    		<td width="130px">President</td>
			    	<td>Jason Poon</td>
    			</tr>
	    		<tr>
		    		<td>Vice-President</td>
			    	<td>Bernard Cheung</td>
    			</tr>
	    		<tr>
		    		<td>Treasurer</td>
			    	<td>Nina Kao</td>
    			</tr>
	    		<tr>
		    		<td>Membership Director</td>
			    	<td>Patrick Shyong</td>
    			</tr>
	    		<tr>
		    		<td>IT/ Webmaster</td>
			    	<td>Kiki Chan</td>
    			</tr>
	    		<tr>
		    		<td rowspan="3" valign="top">Special Events</td>
			    </tr>
       			<tr>
	    			<td>Andy Chow</td>
    			</tr>
	    		<tr>
		    		<td>Zong Chua</td>
    			</tr>
    			<tr>
	    			<td rowspan="6" valign="top">Gym Manager</td>
    			</tr>
	    		<tr>
		    		<td>Andrew Li</td>
    			</tr>
	    		<tr>
		    		<td>Alvin Tse</td>
                </tr>
	    		<tr>
		    		<td>Justin Lew</td>
                </tr>
	    		<tr>
		    		<td>Michelle Tran</td>
                </tr>
	    		<tr>
		    		<td>Stephanie Lee</td>
			    </tr>
    			<tr>
	    			<td>Senior Advisor</td>
		    		<td>Peter Liang</td>
    			</tr>
            </table>

    		<h1>Contact Us</h1>
	    	<p>If you think the badminton club is
		    <i>absolutely-most-indefinitely-the-most-fun-and-awesomely-awesome-club-ever</i>!
            or if you have any ideas or suggestions feel free to let us know by speaking with
            one of our executives or if you prefer typing, you can either send us an 
            <a href="mailto: ubc.badm@gmail.com">email</a> or poke us on <a
			href="http://www.facebook.com/group.php?gid=17284952088">Facebook</a>.
    		</p>
        </div>
    </div>
	<?php
	require_once (dirname(__FILE__) . '\include\footer.php');
    ?>
</div>
</body>
</html>

