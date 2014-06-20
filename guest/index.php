<?php
// Unifi Hotspot intergration with Wordpress by Tom Lincoln
// This file is for handeling the initial connection from the hotspot user and directing them to the wordpress install
// Its important to keep the Query_string intact so the unifi-session data can be grabbed by the codeblock on the wordpress site.

if ($_GET['id'])			//check the user came here via a Unifi AP
{
  $_SESSION['id'] = $_GET['id'];	//user's mac address
}
else
{
  echo "Direct Access is not allowed";	//ERROR user tried to access the page directly
  exit();
}
header('Location: http://unifi-server/index.php?'.$_SERVER['QUERY_STRING'].'&unifi=portal'); // Added unifi=portal for checks on the WP site
exit;
?>