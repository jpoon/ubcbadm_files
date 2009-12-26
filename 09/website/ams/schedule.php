<?php

require_once 'savant/Savant3.php';
$tpl = new Savant3();

$content= array(
    array(
        'title' => 'Gym Schedule',
        'text'  => '<img src="imgs/osbourne.jpg" alt="Osbourne Gym" id="imgOsbourne" />

                    <p>Gym nights are held at the "Robert F. Osborne Gym A" which is
                    located next to Thunderbird Arenas at <a target="_blank" 
                    href="http://www.maps.ubc.ca/PROD/index_detail.php?show=y,y,y,y,y,y&bldg2Search=n&locat1=430&locat2=">6108
                    Thunderbird Boulevard</a>.</p>

                    <table border="1" cellpadding="5px">
                    <tr>
                        <td rowspan="2" valign="top" width="50px">Term 1</td>
                        <td width="50px">Tuesday</td>
                        <td>4:00 - 6:00 PM</td>
                    </tr>
                    <tr>
                        <td>Friday</td>
                        <td>6:30 - 11:00 PM</td>
                    </tr>
                    <tr>
                        <td rowspan="2" valign="top" width="50px">Term 2</td>
                        <td width="50px">Tuesday</td>
                        <td>5:30 - 7:30 PM</td>
                    </tr>
                    <tr>
                        <td>Friday</td>
                        <td>7:00 - 11:00 PM</td>
                    </tr>
                    </table>'
    ),
    array(
        'title' => 'Event Calendar',
        'text'  => '<iframe src="http://www.google.com/calendar/embed?showTitle=0&amp;height=450&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=ra82akobth6fn1qg7pbgnlj5vg%40group.calendar.google.com&amp;color=%235229A3&amp;ctz=America%2FVancouver" style=" border-width:0 " width="755" height="450" frameborder="0" scrolling="no"></iframe>'
    )
);

$tpl->content = $content;
$tpl->display('template.php');

?>
