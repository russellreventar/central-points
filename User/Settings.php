<!doctype html>
<html>
<head>
	
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Guest</title>
	<link href="../Stylesheets/Main.css" rel="stylesheet" type="text/css" media="screen">
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
        		<td><a href="MainPage.php"><img src="../images/logo.png"/></a>
            	</td>
            	<td class = "Name">C E N T R A L <br> P O I N T S
            	</td>
            	<td class = "jumpMenu">
                	<img src="../images/profilepic.png" / class = "align-right" />
                	<?php
							echo 'Welcome, ' . $_COOKIE["user"] . '!';
                    ?>
                    
                	<form name="form" id="form">
                		<select name="jumpMenu" id="jumpMenu" onChange="MM_jumpMenu('parent',this,0)">
                		<option value="MainPage.php" selected>Home</option>
             	    	<option value="Profile.php">My Profile</option>
           	   		 	<option value="Settings.php">Settings</option>
          	         	<option value="../index.php?signout=1">Log out</option>
         	         	</select>
            		</form>
            	</td>
        	</tr> 
			<tr>
        	<td class = "social-media-table">
				<table>
            		<tr>
						<td>
							<a href="http://www.facebook.com"><img src="../images/social_icons/FaceBook-icon.png"/></a> 
                		</td>
                		<td>
               				<a href="http://www.twitter.com"><img src="../images/social_icons/Twitter-icon.png"/></a> 
                		</td>
                		<td>
              				<a href="http://www.youtube.com"><img src="../images/social_icons/Youtube-icon.png"/></a> 
                		</td>
                		<td>
              				<a href="#"><img src="../images/social_icons/Feed-icon.png"/></a> </li>
                		</td>
             		</tr>
				</table>
         	</td>
         	</tr>
      	</table>	
      
     	<div id = "banner">
      		<img src="../images/banner.png" width="1000" height="14" />
      	</div>

        
        <div id = "bodybackground2">
        
        
        
        
        THIS PAGE IS UNDER CONSTRUCTION. (NOT ACTUALLY USED)
        
        
        
        
        
        </div>
        
        <div id = "footer">
          CentralPoints &copy 2012 All Rights Reserved RAID0rs
        </div>

 	</div>
</body>

</html>