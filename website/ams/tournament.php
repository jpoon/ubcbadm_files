<?php
require_once (dirname(__FILE__) . '\include\html_head.php');
?>
<body>
<div id="container">

    <?php
    require_once (dirname(__FILE__) . '\include\header.php');
    ?>

    <div id="contentContainer">

        <?php
        require_once (dirname(__FILE__) . '\include\navigation.php');
    	?>	

    <div id="content">
		<div id="centercontent">
		<h1>Open Tournament</h1>
		<p>Mark your calendars for the annual UBC Badminton Club Open Tournament! Play for the fun, play for the glory, play for the joy of playing.
		We encourage players of all levels to join as there will be a intermediate and advanced division but remember that space is limited! </p>
			
		<h2>Entry Costs</h2><br/>
		<table border="1">
			<tr>
				<td width="150px">Entry Cost For Each Subsequent Event</td>
				<td width="60px">1st Event</td>
				<td width="60px">2nd Event</td>
				<td width="60px">3rd Event</td>
			</tr>		
			<tr>
				<td>Members:</td>
				<td>$10</td>
				<td>$5</td>
				<td>free</td>
			</tr>
			<tr>
				<td>Non-Members:</td>
				<td>$13</td>
				<td>$10</td>
				<td>$7</td>
			</tr>
		</table>
		<br /> 
				
		<h2>Tentative Schedule</h2> 
		<p>Please note that the below schedule is tentative and is subject to change at the discretion of UBC Badminton Club.</p>

		<table border="1">
			<tr>
				<td width="60px">Date</td>
				<td width="75px">Time</td>
				<td width="200px">Events</td>
			</tr>
			<tr>
				<td>Feb. 20</td>
				<td>7pm-11pm</td>
				<td>Advanced Mixed Doubles</td>
			</tr>
			<tr>
				<td>Feb. 21</td>
				<td>1pm-11pm</td>
				<td>Advanced Women's Singles <br/>
					Intermediate Women's Doubles <br/>
					Intermediate Men's Singles <br/>
					Intermediate Men's Doubles <br/>
					Advance Men's Singles <br/>
					Intermediate Mixed Doubles </td>
			</tr>
			<tr>
				<td>Feb. 22</td>
				<td>10am-10pm</td>
				<td>Advanced Women's Doubles <br/>
					Advanced Men's Doubles <br/>
					Intermediate Men's Doubles </td>
			</tr>			
		</table>
		<br/>
		
		<h2>Tournament Format and Rules</h2>
		<ul>
			<li>Best 2 out of 3 games using rally point system of 21
			<li>Players are guaranteed 2 matches
			<li>Feather birds (2 per match) provided for advanced
			<li>Plastic birds (1 per match) provided for intermediate
			<li>15min default rule will be strictly adhered to
			<li>Please arrive at least 30 minutes before your first match to allow for warm-up and sign-in time
		</ul>

		<h2>Registration</h2>
		<p>The deadline for registration is February 13, 2009; first come, first serve. A waiting list will be set up if an event is full.</p>
		<p>Register for the tournament <a href="http://ubcbadminton.x10hosting.com/" target="_blank">here</a>.</p>
		
		</div>
		
		<div id="rightcontent">		
			<h2>Registration</h2>
			<p>Stay tunes for the 2010 version of the Club Open Tournament.</p>
		</div>
	</div>
    </div>

    <?php
    require_once (dirname(__FILE__) . '\include\footer.php');
    ?>

</div>
</body>
</html>
