<?php 
// This code block is for loging into unifi, passes valuses to authorise.php
if(isset($_SESSION['unifi']) && !empty($_SESSION['unifi'])) { ?>
<html>
  <body>
    <div id="page" align="center">
      <div id="header">
        <div id="companyname" align="left">Welcome!</div>
      </div>
      <br />
      <form name="auth" method=POST action="/guest/authorized.php" onsubmit="return validateForm()">
        <br />
        First Name <input name="FirstName" id="fname" type="text" value="">
        <br>
        Last Name <input name="LastName" id="lname" type="text" value="">
        <br>
        Email Address <input name="email" id="email" type="email" value="">
        <br>
        Voucher <input name="voucher" id="voucher" type="text" value="">
        <br><br>
        By clicking submit you agree to the <a href="?page_id=25">terms of service</a> 
        <br>
        <input name="submit" type="submit" value="Submit">
      </form>
    </div>
  </body>
</html>

<script language="JavaScript" type="text/javascript">
function validateForm() {
    var x = document.forms["auth"]["FirstName"].value;
    if (x == null || x == "") {
        alert("First name must be filled out");
        document.getElementById("fname").focus();
        return false;
    }
        var x = document.forms["auth"]["LastName"].value;
    if (x == null || x == "") {
        alert("Last name must be filled out");
        document.getElementById("lname").focus();
        return false;
    }
    var x = document.forms["auth"]["email"].value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos< 1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        alert("Not a valid e-mail address");
        document.getElementById("email").focus();
        return false;
    }
            var x = document.forms["auth"]["voucher"].value;
    if (x == null || x == "") {
        alert("Voucher must be filled out");
        document.getElementById("voucher").focus();
        return false;
    }
}
</script>

<?php } else { ?>
Unfortunatly somthing has gone wrong,
Please close this page and try again.
<?php } ?>
