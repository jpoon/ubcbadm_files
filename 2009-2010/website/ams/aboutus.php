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
	    	<h1>About Us</h1>

            <p>The University of British Columbia (UBC) Badminton Club is a registered 
            AMS club at the University of British Columbia in Vancouver, British 
            Columbia, Canada. The club is wholly administered and organized by a group
            of passionate badminton players who are commited to promoting and
            encouraging the sport of badminton. </p>

    		<h1>Executives</h1>
	    	<img src="imgs/execs.jpg" id="img07Execs" alt="'07 Execs" />

            <script type="text/javascript">
              $(document).ready(function(){
                $("#accordion").accordion({
                    autoHeight:false,
                });
              });
            </script>

            <div id="accordion" style="width:300px;">
                <p><a href="#">President</a></p>
                <div>Jason Poon</div>
                <p><a href="#">Vice-President</a></p>
                <div>Bernard Cheung</div>
                <p><a href="#">Finance</a></p>
                <div>Nina Kao</div>
                <p><a href="#">Membership</a></p>
                <div>Patrick Shyong</div>
                <p><a href="#">Public Relations</a></p>
                <div>Andrew Li, Kiki Chan, Stephanie Lee</div>
                <p><a href="#">Special Events</a></p>
                <div>Andy Chow, Peter Liang, Zonghe Chua</div>
                <p><a href="#">Operations</a></p>
                <div>Alvin Tse, Justin Lew, Michelle Tran</div>
            </div>			
        </div>
    </div>
    <?php
    require_once ('include/footer.php');
    ?>
</div>
</body>
</html>

