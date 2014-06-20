<?php
//Generate vouchers for use with Wordpress / Unifi intergration
require_once("config.php");
function gencode($quantity, $minuets, $type, $note){
    global $dbServer;
    global $dbName;
    global $dbUser;
    global $dbPassword;

    
    mysql_connect($dbServer, $dbUser, $dbPassword) or die(mysql_error());
    mysql_select_db($dbName) or die(mysql_error());
    
    for ($i = 1; $i <= $quantity; $i++) {
        $random = substr(number_format(time() * rand(),0,'',''),0,10);
        while (checkdb($random)){
            $random = substr(number_format(time() * rand(),0,'',''),0,10);
        }
        mysql_query('INSERT INTO vouchers (code, duration, type, note, valid) VALUES ('.$random.', '.$minuets.', "'.$type.'", "'.$note.'", "1")') or die(mysql_error());
    }
}

function checkdb($code){
    global $dbServer;
    global $dbName;
    global $dbUser;
    global $dbPassword;
    
    mysql_connect($dbServer, $dbUser, $dbPassword) or die(mysql_error());
    mysql_select_db($dbName) or die(mysql_error());
    
        $result = mysql_query('SELECT code FROM vouchers WHERE code="'.$code.'"') or die(mysql_error());
        $count = mysql_num_rows($result);
        $row = mysql_fetch_row($result);
        $t = time();
        
        if ($count == 1 && ($row[0] > $t)){
            return true;
        }
    return false;
}

if ($_POST)
{
  $quantity = $_POST['quantity'];
  $time = $_POST['time'];
  $type = $_POST['type'];
  $note = $_POST['note'];

  if ($time == "8 hours") {
    $minuets = "480";
} elseif ($time == "24 hours") {
    $minuets = "1440";
} elseif ($time == "2 days") {
    $minuets = "2880";
} elseif ($time == "3 days") {
    $minuets = "4320";
} elseif ($time == "4 days") {
    $minuets = "5760";
} elseif ($time == "7 days") {
    $minuets = "10080";
}

if ($type == "Single Use"){
    $type = "single";
} else {
    $type = "multi";
}

  if (gencode($quantity, $minuets, $type, $note));
    {
        header('Location: manager.php?created=true');
    }
}
?>