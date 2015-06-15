<?php
	if(!isset($_COOKIE["guest"])) {
		if(!isset($_COOKIE["user"])) {
			header('Location: ../index.php');
		}
	}
?>

<!doctype html>
<html>
<head>
	
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Your Points</title>
	<link href="../Stylesheets/Main.css" rel="stylesheet" type="text/css" media="screen">
    <link href="../Stylesheets/Points.css" rel="stylesheet" type="text/css" media="screen">
    
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
							if(isset($_COOKIE["guest"])) {
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
        
        <table class ="navBar" align="center">
                <tr>
                    <td class="leftmenuCell"> 
                        <div class = "image">
                            <a href="MainPage.php"><img src="../images/lb1.png" onMouseOver="this.src='../images/lb2.png';" onmouseout=		
                            "this.src='../images/lb1.png';" />
                            <div class="text1">
                                HOME
                            </div></a>
                        </div> 
                    </td>    
                    <td class="midmenuCell"> 
                        <div class = "image">
                            <a href="myPoints.php"><img src="../images/mb1.png" onMouseOver="this.src='../images/mb2.png';" onmouseout=
                            "this.src='../images/mb1.png';" />
                            <div class="text2set">
                                My Points
                            </div></a>
                      </div>
                    </td>
                    <td class= "rightmenuCell"> 
                        <div class = "image">
                            <a href="Explore.php"><img src="../images/rb1.png" onMouseOver="this.src='../images/rb2.png';" onmouseout=
                            "this.src='../images/rb1.png';" />
                            <div class="text3">
                                Explore
                            </div></a>
                        </div>
                    </td>
                </tr>
            </table>	
       	
        <table align="center"> 
            <tr>
				<td class="lightbeam"></td>
				<td class="lightbeam"><img src="../images/banner.png" width="50" height="2"/ class="center"></td>
				<td class="lightbeam"></td>
        	</tr>    
        </table>
        
        <div id = "bodybackground">
        
			<?php
				$flag = 0;
				if(isset($_COOKIE["guest"])) {
					echo '<a class="register" href="../Login/Registration.php"><div id="compName">This section is reserved for members only. Register today!</div></a>';
				} else {
					$con = mysql_connect('localhost', 'root');
					if(!$con) {
						die("Could not connect: " . mysql_error());	
					}
					mysql_select_db("databases_p3", $con);
					
					$completeurl = "XML/companies.xml";
					$xml = simplexml_load_file($completeurl);
					$companies = $xml->company;
					$usr = $_COOKIE["user"];
					for($i=0; $i<6; $i++) {
						$name = $companies[$i]->companyInfo->companyName;
						$dbname = $companies[$i]->companyInfo->dbname;
						$points = $companies[$i]->companyInfo->points;
						$dbpoints = $companies[$i]->companyInfo->dbpoints;
						$logo = $companies[$i]->companyInfo->companyLogo;
						$getbalance = mysql_query("SELECT * FROM $dbname WHERE CustomerID =(SELECT CustomerID FROM customers WHERE UserName='$usr')");
						if(!$getbalance) {
						} else {
							$balance = mysql_fetch_array($getbalance);
							if($balance) {
								echo '<p /><div id="compName">' . $name . '<img class="cLogo" src="XML/' . $logo . '" /></div>';
								echo '<div id="compInfo"> ' . $points . ': ';
								echo $balance[2] . '</div>';
								$flag++;
							}
						}
					}
					
					if($flag == 0) {
						echo '<a class="register" href="Explore.php"><div id="compName">You are currently not a member of any customer rewards systems. Click Explore to apply today!</div></a>';
					}
				}
            ?>

        </div>
        
        <div id = "footer">
          CentralPoints &copy 2012 All Rights Reserved RAID0rs
        </div>

 	</div>
</body>

</html>