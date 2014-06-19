<?php
//Generate vouchers for use with Wordpress / Unifi intergration

require_once("config.php");
function gencode($quantity, $minuets)
{
    global $dbServer;
    global $dbName;
    global $dbUser;
    global $dbPassword;
    
    mysql_connect($dbServer, $dbUser, $dbPassword) or die(mysql_error());
    mysql_select_db($dbName) or die(mysql_error());
    
    for ($i = 1; $i <= $quantity; $i++) {
        $random = substr(number_format(time() * rand(),0,'',''),0,10);
        $t = time();
        while (checkdb($random)){
            $random = substr(number_format(time() * rand(),0,'',''),0,10);
            $t = time();
        }
               mysql_query('INSERT INTO vouchers (code, duration, create-time) VALUES ($random, $minuets, $t)');
    }
}

function checkdb($code)
{
    global $dbServer;
    global $dbName;
    global $dbUser;
    global $dbPassword;
    
    mysql_connect($dbServer, $dbUser, $dbPassword) or die(mysql_error());
    mysql_select_db($dbName) or die(mysql_error());
    
        $result = mysql_query('SELECT code FROM vouchers WHERE vouchers="'.$code.'"');
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
  $quantity = $_POST['quantity']);
  $minuets = $_POST['mins'];
  if (gencode($quantity, $minuets));
    {
        echo "codes created n such";
    }
}
?>
