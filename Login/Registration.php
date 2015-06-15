<?php 
 ?>
 
<!doctype html>
<html>
<head>

	<title>Log in</title>
	
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <link href="stylesheets/ssRegistration.css" rel="stylesheet" type="text/css" media="screen" />
    <link rel="shortcut icon" href="Login/images/favicon.png">
    <link href="js/SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
    <link href="js/SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css">
    <link href="js/SpryAssets/SpryValidationConfirm.css" rel="stylesheet" type="text/css">
	<script src="js/SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
	<script src="js/SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
	<script src="js/SpryAssets/SpryValidationConfirm.js" type="text/javascript"></script>
    
</head>

<body>
<table class= "outerTable">
		<tr>
    		<td class = "nameCell"><img src="images/credi.png" width="57" height="51"> 
           				C E N T R A L&nbsp;&nbsp; P O I N T S</td>
  		</tr>
        <tr>
    		<td class = "welcomeCell">Registration</td>
  		</tr>
        <tr>
        	<td class = "subHeader">Please fill out form.</td>
		</tr>
  		<tr>
         	<td class ="formfield" align ="center">
        		<form method = "post" action = "regProcessed.php">
        			<table width="600" border="0">
          				<tr>
            				<td class = "btext">Name:</td>
            				<td class = "textbox"><span id="sprytextfield1">
              									  <input type="text" name="nameID" id="nameID">
           										  <span class="textfieldRequiredMsg">A value is 
                                                  required.</span></span></td>
    					</tr>
          				<tr>
           					<td class = "btext">Username:</td>
            				<td class = "textbox"><span id="sprytextfield2">
              									  <input type="text" name="usernameID" id="usernameID">
            									  <span class="textfieldRequiredMsg">A value is 
                                                  required.</span></span></td>
        				</tr>
          				<tr>
            				<td class = "btext">Password:</td>
            				<td class = "textbox"><span id="sprypassword1">
            									  <input type="password" name="passwordID" id="passwordID">
            									  <span class="passwordRequiredMsg">A value is 
                                                  required.</span><span class="passwordMinCharsMsg">Minimum 
                                                  number of characters not met.</span></span></td>
         				</tr>
          				<tr>
            				<td class = "btext">Retype Password:</td>
            				<td class = "textbox"><span id="spryconfirm1">
              									  <input type="password" name="rpasswordID" id="rpasswordID">
            									  <span class="confirmRequiredMsg">A value is required.</span>
                                                  <span class="confirmInvalidMsg">The values don't match.</span></span></td>
    					</tr>
          				<tr>
            				<td class = "btext"> Address:</td>
            				<td class = "textbox"><span id="sprytextfield3">
              									  <input type="text" name="addressID" id="addressID">
           										  <span class="textfieldRequiredMsg">A value is required.</span></span></td>
         				</tr>
          				<tr>
            				<td class = "btext">Phone:</td>
            				<td class = "textbox"><span id="sprytextfield4">
            									  <input type="text" name="phoneID" id="phoneID">
            									  <span class="textfieldRequiredMsg">A value is required.</span></span></td>
      					</tr>
          				<tr>
            				<td class = "btext"> Email:</td>
            				<td class = "textbox"><span id="sprytextfield5">
            									  <input type="text" name="emailID" id="emailID">
            									  <span class="textfieldRequiredMsg">A value is required.</span>
                                                  <span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
      					</tr>
          				<tr>
            				<td>&nbsp;</td>
            				<td class = "textbox"><input name="submit" type="submit" value="Submit"></td>
    					</tr>
        			</table>
        		</form>
       		</td>
 		</tr>
        <tr>
    		<td align ="center">
        		<table>
            		<tr>
            			<td class = "info"> about us </td>
                        <td> | </td>
                        <td class = "info"> support </td>
            			<td> | </td>
            			<td class = "info">community </td>
            		</tr>
            	</table>
            </td>
  		</tr>
        <tr>
    		<td class = "footer">
        	    CentralPoints &copy 2012 All Rights Reserved RAID0rs
            </td>
  		</tr>
	</table>
    
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["blur"]});
var sprypassword1 = new Spry.Widget.ValidationPassword("sprypassword1", {minChars:6, validateOn:["blur"]});
var spryconfirm1 = new Spry.Widget.ValidationConfirm("spryconfirm1", "passwordID", {validateOn:["blur"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "none", {validateOn:["blur"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "none", {validateOn:["blur"]});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "email", {validateOn:["blur"]});
</script>
</body>
</html>
