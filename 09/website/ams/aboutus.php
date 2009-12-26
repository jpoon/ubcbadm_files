<?php

require_once 'savant/Savant3.php';
$tpl = new Savant3();

$content= array(
    array(
        'title' => 'About Us',
        'text'  => '<p>The University of British Columbia (UBC) Badminton Club is a registered 
                    AMS club at the University of British Columbia in Vancouver, British 
                    Columbia, Canada. The club is wholly administered and organized by a group
                    of passionate badminton players who are commited to promoting and
                    encouraging the sport of badminton.</p>'
    ),
    array(
        'title' => 'Executives',
        'text'  => '<img src="imgs/execs.jpg" id="img07Execs" alt="2007 Execs" />

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
                    </div>'
    )
);

$tpl->content = $content;
$tpl->display('template.php');

?>
