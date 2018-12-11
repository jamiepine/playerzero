<?php /* 
****playerZero*****
TEMPLATE: header.php
Created by James Mathew Pine
*/
include('includes/core.php'); 
$siteurl = "http://hello.playerzero.co/dev";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/> <!--320-->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=VT323" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="style.css"/>  
    <link type="text/css" rel="stylesheet" href="responsive.css"/>   

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="includes/js/script.js"></script>
        <script type="text/javascript" src="includes/js/console.js"></script> 
        
        
    <title>playerZero</title>
</head>
<body>
<div id="maincontainer">

<!-- ***********************
	MOBILE NAVIGATION 	
*************************-->
<div id="mobileNav" class="mobileNav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeMobileNav()">&times;</a>
</div>

<!-- ***********************
	OPEN_DESKTOP_SIDEBAR_TAB  	
*************************-->
<!-- 	<a href="javascript:void(0)"><div onclick="openNav()" id="sidebar_open" class="logo popout">&#9776;</div></a>
-->
<!-- ***********************
	DESKTOP SIDEBAR	
*************************-->
<div id="sidebar">
	<div id="sidebar_content">
		<div class="innertube">
		


<div id="initialiser">
        <span class="line" id="line1"style="visibility:hidden;">[06:06:18+00:00] Aggragating AI sythesizers</span>
        <span class="line" id="line2"style="visibility:hidden;">[06:06:18+00:00] Analysing player metadata</span>  
        <span class="line" id="line3"style="visibility:hidden;">[06:06:18+00:00] Initilizing coreAI.py</span>  
        <span class="line" id="line4"style="visibility:hidden;">&nbsp&nbsp&nbsp Analysing player metadata</span>  
        <span class="line" id="line5"style="visibility:hidden;">[06:06:18+00:00] pZ.ai active</span>
</div> <!-- #initialiser -->



<div id="menu">
        <a href="<?php echo $siteurl;?>"><span class="line"id="menu1"style="visibility:hidden;">[program] Reinitialize</span></a>
        <a id="menu2" onclick="loadPage('live.php', '#menu2'); return false;" href="javascript:void(0)" class="line" style="visibility:hidden;">[dir] <span style="color:red"> [live]</span> Channel _01</a>
        <a href="#"><span class="line"id="menu3"style="visibility:hidden;">[dir] <span style="color:white"> </span>Channel _02</span></a>
        <a href="#"><span class="line"id="menu4"style="visibility:hidden;">[dir] <span style="color:white"> </span>Channel _03</span></a>
        <a href="#"><span class="line"id="menu5"style="visibility:hidden;">[dir] _VODS</span></a>
        <a href="#"><span class="line"id="menu6"style="visibility:hidden;">[dir] _Players</span></a>
        <a id="menu7" onclick="loadPage('images.php', '#menu7'); return false;" href="javascript:void(0)" class="line" style="visibility:hidden;">[dir] Images</a>
        <a onclick="loadPage('about.php'); return false;"href="#"><span class="line"id="menu8"style="visibility:hidden;">[dir] _About</span></br></a>
</div>

<div id="console"></div>

<form id="console_input" action="return.php" class="js-ajax-php-json" method="post" accept-charset="utf-8" style="visibility:hidden;">
        <span>guest$ </span> <input name="command" id="command" type="text" autocomplete="off">
        <input type="submit" style="position: absolute; left: -9999px; width: 1px; height: 1px;" tabindex="-1" />
</form><!-- #console_input -->

</div><!-- .innertube -->
</div><!-- #sidebar_content -->
</div><!-- #sidebar -->



<div id="contentwrapper" style="opacity: 0;">

<div id="pageHeader">
<a href="javascript:void(0)"><div onclick="openNav()" id="sidebar_open" class="sidebar_toggle">&#9776;</div></a>	
<a href="javascript:void(0)"><div onclick="closeNav()" id="sidebar_close" class="sidebar_toggle">&times;</div></a>	
<div onclick="openMobileNav()" id="logo" style="visibility:hidden;">
	<span class="logo">playerZero</span>
</div>
	
</div>