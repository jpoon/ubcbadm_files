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
    		<h1>How to Join</h1>
	    	<img src="imgs/serve.jpg" id="imgServe" alt="UBC Badminton" />            
		    <p>Drop by the UBC Badminton Club booth during Club Week to join! Club
    		Week typically occurs in <u>late September</u>.</p>
	    	<p>Annual membership costs are listed below:</p>
		    <table border="1">
			    <tr>
				    <td width="150px">New Members:</td>
    				<td width="50px">$50</td>
	    		</tr>
		    	<tr>
			    	<td>Returning Members:</td>
				    <td>$40</td>
    			</tr>
	    	</table>
		    <p>Membership fills up quickly, so early registration is recommended.</p>

    		<h1>Membership Benefits</h1>
	    	<p>The UBC Badminton Club offers its members a plethora of benefits
		    including:</p>
    		<ul type="circle">
	    		<li>pizza/pop nights</li>
		    	<li>plastic birdies are supplied</li>
			    <li>feather nights</li>
                <li>members-only tournament</li>
                <li>discount registration fees for open tournaments</li>
    			<li>recreational and competitive touraments for all levels of play</li>
	    		<li>meet new people in a friendly, social atmosphere</li>
    			<li>organized queue board system allowing you to view other players' levels</li>
	    		<li>over 40 gym nights throughout the year</li>
    			<li>skill clinics</li>
	    	</ul>
    		<h1>Drop-Ins</h1>
	    	<p>Not a member? Drop-ins are welcome! The drop-in fees are as follows:</p>

    		<table border="1">
	    		<tr>
		    		<td width="150px">Monday/Tuesdays:</td>
			    	<td width="50px">$5</td>
    			</tr>
	    		<tr>
		    		<td>Fridays:</td>
			    	<td>$8</td>
    			</tr>
            </table>

    		<p>Please note that the amount of drop-ins will be limited if the gym
	    	night is deemed too full. Additionally, there are no drop-ins for the
		    first two weeks of the season.</p>
        </div>
    </div>
<?php
require_once (dirname(__FILE__) . '\include\footer.php');
?>

</div>
</body>
</html>
