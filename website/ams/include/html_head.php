<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>
<?php
$htmlTitle = "UBC Badminton Club";
switch(basename($_SERVER['PHP_SELF'], ".php" )) {
    case "index":
        $htmlTitle .= " - Home";
        break;

    case "aboutus":
        $htmlTitle .= " - About Us";
        break;

    case "schedule":
        $htmlTitle .= " - Gym Schedule";
        break;

    case "membership":
        $htmlTitle .= " - Club Membership";
        break;

    case "tournament":
        $htmlTitle .= " - Open Tournament";
        break;

    case "photo":
        $htmlTitle .= " - Photo Gallery";
        break;    
}
echo $htmlTitle;
?>
</title>
<meta name="description" content="UBC Badminton Club - providing UBC students, faculty, and friends with an environment to play, learn, and practice the sport of badminton." />
<meta name="keywords" content="badminton, racket, racquet, shuttlecock, birdie, UBC, British Columbia, Vancouver, Osbourne, AMS" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="styles/main.css" type="text/css" />
<link rel="stylesheet" href="styles/lightbox.css" type="text/css" />
<link rel="shortcut icon" href="imgs/favicon.ico" type="image/x-icon" />
<script type="text/javascript" src="scripts/lightbox.js"></script>
<script type="text/javascript" src="scripts/autoExpand.js" ></script>
<?php # Google Analytics ?>
<script type="text/javascript">
    var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
    document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
    var pageTracker = _gat._getTracker("UA-5681575-1");
    pageTracker._trackPageview();
</script>
<meta name="verify-v1" content="DMbBhXhEJihaTOJHBNwQG2rx5SbKU62DlnUDY75xmuA=" >
</head>
