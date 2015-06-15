<?php
	if(!isset($_COOKIE["guest"])) {
		if(!isset($_COOKIE["user"])) {
			header('Location: ../index.php');
		}
	}
	
	if(isset($_COOKIE["user"])) {
		setcookie("guest", "", time()-3600);
	}
	
	if(isset($_GET["guest"]) && $_GET["guest"]=1) {
		setcookie("guest", "Guest", time()+60*10);
	}
?>

<?php
$con = mysql_connect('localhost', 'root');
					if(!$con) {
						die("Could not connect: " . mysql_error());	
					}
					mysql_select_db("databases_p3", $con);
					
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

$query_allComp = "SELECT CompanyName, Industry, Products, Website, logo FROM companies";
$allComp = mysql_query($query_allComp) or die(mysql_error());
$row_allComp = mysql_fetch_assoc($allComp);
$totalRows_allComp = mysql_num_rows($allComp);
?>
<!doctype html>
<html>
<head>
	
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Guest</title>
	<link href="stylesheets/ssExplore.css" rel="stylesheet" type="text/css" media="screen">
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
        		<td><img src="images/logo.png"/>
            	</td>
            	<td class = "Name">C E N T R A L <br> P O I N T S
            	</td>
            	<td class = "jumpMenu">
                <img src="../images/profilepic.png" / class = "align-right" />
               		<?php
							if(isset($_COOKIE["guest"]) && $_GET["guest"]=1) {
								echo 'Welcome, Guest!';
							} else {
								echo 'Welcome, ' . $_COOKIE["user"] . '!';
							}
                    ?>
                	<form name="form" id="form">
               		  <select name="jumpMenu" id="jumpMenu" onChange="MM_jumpMenu('parent',this,0)">
                		<option value="MainPage.php" selected>Home</option>
             	    	<option value="Profile.php">My Profile</option>
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
        
			<table class="navBar" align="center">
      		<tr>
       			<td class="leftmenuCell"> 
             		<div class = "image">
               			<a href="MainPage.php"><img src="images/lb1.png" onMouseOver="this.src='images/lb2.png';" onmouseout=		
                    	"this.src='images/lb1.png';" />
                		<div class="text1">
                			HOME
                		</div></a>
                	</div> 
            	</td>    
            	<td class="midmenuCell"> 
            		<div class = "image">
               			<a href="myPoints.php"><img src="images/mb1.png" onMouseOver="this.src='images/mb2.png';" onmouseout=
                    	"this.src='images/mb1.png';" />
                		<div class="text2">
                			My Points
                		</div></a>
                	</div>
       			</td>
				<td class= "rightmenuCell"> 
            		<div class = "image">
               			<a href="Explore.php"><img src="images/rb1.png" onMouseOver="this.src='images/rb2.png';" onmouseout=
                    	"this.src='images/rb1.png';" />
                		<div class="text3set">
                			Explore
                		</div></a>
               	  </div>
           		</td>
        	</tr>
		</table>	
       	
   		      <table align="center"> 
            <tr>
				<td class="lightbeam"></td>
				<td class="lightbeam"></td>
				<td class="lightbeam"><img src="images/banner.png" width="50" height="2"/ class="center"></td>
        	</tr>    
        </table>
        
      <div id = "bodybackground">
         	
            <div id = "bodybackground2">
            	
              <h1> Check out more! </h1>

                <?php do { ?>
                <h2 class = "accordian"> <a href="#"><?php echo $row_allComp['CompanyName']; ?></a></h2>
            	<div class = "accContainer">
             		<div class = "block">
                		
                	<table width="500">
				 
                	    <td>
							<?php   $src = $row_allComp['logo']; 
									echo '<img src="'.$src.'"/  class = "logoBox">'; 
						    ?>
                        </td> 
                	    <td class = "Name"><?php  echo $row_allComp['CompanyName']; ?></td>
                        <td width="50px"><div class = "add"><a href="Explore.php?add=1">+</a></div>
                        </td>
                       <?php
						if(isset($_GET["add"]) && $_GET["add"] == 1) {
							echo '<div class="congrats">Congrats! You are now a member of this points system!</div>';
						}
                        ?>
              	    </tr>
                	  <tr>
                	    <td>&nbsp;</td>
                	    <td class = "Name2"><?php echo $row_allComp['Industry']; ?>
					</td>
              	    </tr>
                	  <tr>
                	    <td>&nbsp;</td>
                	    <td class = "Name2"><?php echo $row_allComp['Products']; ?></td>
              	    </tr> 
                	  <tr>
                	    <td>&nbsp;</td>
                	    <td class="Name2"> Visit: <?php   $link = $row_allComp['Website'];  $Sitename = $row_allComp['CompanyName']; 
											 echo '<a href="http://'.$link.'">'.$Sitename.'.com</a>.';
						    ?></td>
              	    </tr>
              	  </table>
             		</div>
        		</div>
                <?php } while ($row_allComp = mysql_fetch_assoc($allComp)); ?>
                
                
                
                
                
       
        	</div>
      </div>
        
        <div id = "footer">
          CentralPoints &copy 2012 All Rights Reserved RAID0rs
        </div>

 	</div>
    
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script src = "Explorescript.js"></script>
    
</body>

</html>
<?php
mysql_free_result($allComp);
?>
