<?php require_once('connections/userConn.php'); ?>
<?php

$CustID = $_COOKIE["user"];

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_profile = "-1";
if (isset($_GET['CustID'])) {
  $colname_profile = $_GET['CustID'];
}
mysql_select_db($database_cpDatabase, $cpDatabase);
$profile = mysql_query("SELECT * FROM customers WHERE UserName = '$CustID'");
$row_profile = mysql_fetch_array($profile);


	//if(!isset($_COOKIE["user"])) {
	//header('Location: ../index.php');
	//}
?>
<!doctype html>
<html>
<head>
	
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Guest</title>
	<link href="stylesheets/ssProfile.css" rel="stylesheet" type="text/css" media="screen">
	<script type="text/javascript">
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
    </script>
</head>

<body>
	
	<div id="wrapper">
   
   		<table>
			<tr>
        		<td><a href="MainPage.php"><img src="images/logo.png"/></a>
            	</td>
            	<td class = "Name">C E N T R A L <br> P O I N T S
            	</td>
            	<td class = "jumpMenu">
                	<form name="form" id="form">
                		Welcome <?php echo $row_profile['CustomerName']; ?> !
                		<img src="images/profilepic.png" / class = "align-right">
                		<select name="jumpMenu" id="jumpMenu" onChange="MM_jumpMenu('parent',this,0)">
                		<option value="MainPage.php">Home</option>
             	    	<option value="Profile.php" selected>My Profile</option>
           	   		 	<option value="Settings.php">Settings</option>
          	         	<option value="../index.php">Log out</option>
         	         	</select>
           		  </form>
            	</td>
        	</tr> 
			<tr>
        	<td class = "social-media-table">
				<table>
            		<tr>
						<td>
							<a href="http://www.facebook.com"><img src="images/social_icons/FaceBook-icon.png"/></a> 
                		</td>
                		<td>
               				<a href="http://www.twitter.com"><img src="images/social_icons/Twitter-icon.png"/></a> 
                		</td>
                		<td>
              				<a href="http://www.youtube.com"><img src="images/social_icons/Youtube-icon.png"/></a> 
                		</td>
                		<td>
              				<a href="#"><img src="images/social_icons/Feed-icon.png"/></a> </li>
                		</td>
             		</tr>
				</table>
         	</td>
         	</tr>
      	</table>	
      
     	<div id = "banner">
      		<img src="images/banner.png" width="1000" height="14" />
      	</div>
        
        <div id = "bodybackground">
        
       
          <table class = "profileTable" align="center" >
      		  <tr>
      		    <td width="262"></td>
      		    <td width="326">&nbsp;</td>
   		      </tr> 
              <tr>
      		    <td><img src="images/Male.png" width="262" height="222"/></td>
      		    <td class = "Name"><?php echo $row_profile['CustomerName']; ?></td>
   		      </tr>
      		  <tr>
      		    <td>&nbsp;</td>
      		    <td class = "Name2"> <?php echo $row_profile['UserName']; ?></td>
   		      </tr>
      		  <tr>
      		    <td>&nbsp;</td>
      		    <td class = "Name2"><?php echo $row_profile['Address']; ?></td>
   		      </tr>
      		  <tr>
      		    <td >&nbsp;</td>
      		     <td class = "Name2"><?php echo $row_profile['Phone']; ?></td>
   		      </tr>
      		  <tr>
      		    <td>&nbsp;</td>
      		    <td class = "Name2"> <?php echo $row_profile['Email']; ?></td>
        	</td>
   		      </tr>
      		  <tr>
      		    <td>&nbsp;</td>
      		    <td>&nbsp;</td>
   		      </tr>
      		  <tr>
      		    <td>&nbsp;</td>
      		    <td>&nbsp;</td>
   		      </tr>
   		  </table>

        </div>
        
        <div id = "footer">
          CentralPoints &copy 2012 All Rights Reserved RAID0rs
        </div>

 	</div>
</body>

</html>