<?php
// Ubiquti Unifi Wordpress intergration by Tom Lincoln
// This code block is for grabbing the values passed by the unifi Access point when it connects to the portal server.
if ( !session_id() ) { session_start(); }

if (isset($_GET['id'])) {
   $_SESSION['id'] = $_GET['id'];		    //user's mac address
}   
if (isset($_GET['ap'])) {
	$_SESSION['ap'] = $_GET['ap'];          //AP's mac
}
if (isset($_GET['ssid'])) {
	$_SESSION['ssid'] = $_GET['ssid'];      //ssid the user is on (POST 2.3.2)
}
if (isset($_GET['t'])) {
	$_SESSION['time'] = $_GET['t'];         //time the user attempted a request of the portal
}
if (isset($_GET['url'])) {
 	$_SESSION['refURL'] = $_GET['url'];     //url the user attempted to reach
 }
if (isset($_GET['unifi'])) {
	$_SESSION['unifi'] = $_GET['unifi'];	//key to check if user came via /guest/index.php
}
?>
