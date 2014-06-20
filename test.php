<?php
$count = "1";

for ($i = 1; $i <= $count; $i++) {
//    echo "---" . "\n";
//    echo "Voucher Number " . $i . " of " . $count . "\n";
    $random = substr(number_format(time() * rand(),0,'',''),0,10);
    $result[] = $random;
//    echo $random . "\n";
//    echo substr($random,0,5) . " - " . substr($random,5,10) . "\n";
}
print_r($result);
$t = time();
print_r($t);
echo time();
?>