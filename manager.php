<?php
// Management Interface for generating Access Codes
if (isset($_GET['created'])) {
   $created = $_GET['created'];
   if ($created){
    echo "<script type='text/javascript'>alert('Codes Created')</script>";
  }
}
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title>Wireless Hotspot Manager</title>
  </head>
  <body>
    <div id="page" align="left">
      <div id="header">
        <div id="companyname" align="left">Generate Vouchers</div>
      </div>
      <br />
      <form method=POST action="generatevoucher.php">
        Quantity: <input name="quantity" type="number"/>
        <br />
        Valid for: <select name="time"> <option>8 hours<option selected>24 hours<option>2 days<option>3 days<option>4 days<option>7 days</select>
        <br />
        Type: <select name="type"> <option selected>Single Use<option>Multi Use</select>
        <br />
        Note: <input name="note" type="text"/>
        <br />
        <input name="submit" type="submit" value="Generate">
      </form>
    </div>
  </body>
</html>