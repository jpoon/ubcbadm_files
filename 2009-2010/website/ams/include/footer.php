<script type="text/javascript">
    $(document).ready(function(){
        $("#footer").click(function(){
            $("#dialog").dialog({
                bgiframe: true,
                modal: true,
                buttons: {
                    Ok: function() {
                        $(this).dialog('close');
                    }
                }
            });
        });
    });
</script>

<div id="dialog" style="display:none;" title="Contact Us">  
    <p>
     If you think the badminton club is <i>absolutely-most-indefinitely-the-most-fun-and-awesomely-awesome-club-ever</i>!
     or if you have any ideas or suggestions on how we might better ourselves, feel free to let us know. 
    </p>

    <p>Email: <a href="mailto: ubc.badm@gmail.com">ubc.badm@gmail.com</a></p>
    <p><a href="http://www.facebook.com/group.php?gid=17284952088">Facebook Group</a></p>
</div> 

<div id="footer">
    <div id="footerTxt"><a href="#">Contact Us</a></div>
</div>
