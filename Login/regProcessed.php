<?php
include "connections/regConn.php";

//get users textbox inputs
$name = $_POST['nameID'];
$username = $_POST['usernameID'];
$password = $_POST['rpasswordID'];
$address = $_POST['addressID'];
$phone= $_POST['phoneID'];
$email = $_POST['emailID'];

//sql query to insert into database
$insert = 'INSERT into customers (CustomerName, Address, Phone, Email, Username, Password) 
			VALUES ("'.$name.'",
					"'.$address.'",
					"'.$phone.'",
					"'.$email.'",
					"'.$username.'",
					"'.$password.'")';
//insert		
mysql_query($insert);


?>


<!doctype html>
<html>
<head>
	
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <link href="stylesheets/ssRegProcess.css" rel="stylesheet" type="text/css" media="screen" />
    <link rel="shortcut icon" href="Login/images/favicon.png">

    <title>Log in</title>

</head>

<body>
	<table class= "outerTable">
  		<tr>
    		<td height="443"><img src="images/credi.png" width="395" height="379" class="center"></td>
  		</tr>
  		<tr>
    		<td class = "nameCell">Thank you!</td>
  		</tr>
  		<tr>
    		<td class = "acknowledge">you have been successfully registered
        	</td>
  		</tr>
        <tr><td class ="toIndex"> <a href="../index.php">click here to log in! </a></td>
  		
        <tr>
    		<td class = "footer2">
        	    CentralPoints &copy 2012 All Rights Reserved RAID0rs
            </td>
  		</tr>
  	</table>
    
</body>
</html>
