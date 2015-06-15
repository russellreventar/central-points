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

<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Welcome! </title>
	
    <link href="Stylesheets/MainPage.css" rel="stylesheet" type="text/css" media="screen">
	
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
                		<div class="text1set">
                			HOME 
                		</div>
						</a>
                	</div> 
            	</td>    
            	<td class="midmenuCell"> 
            		<div class = "image">
               			<a href="myPoints.php"><img src="images/mb1.png" onMouseOver="this.src='images/mb2.png';" onmouseout=
                    	"this.src='images/mb1.png';" />
                		<div class="text2">
                			My Points
                		</div>
						</a>
                	</div>
       			</td>
				<td class= "rightmenuCell"> 
            		<div class = "image">
               			<a href="Explore.php"><img src="images/rb1.png" onMouseOver="this.src='images/rb2.png';" onmouseout=
                    	"this.src='images/rb1.png';" />
                		<div class="text3">
                			Explore
                		</div>
						</a>
                	</div>
           		</td>
        	</tr>
		</table>
        
        <table align="center"> 
            <tr>
				<td class="lightbeam"><img src="images/banner.png" width="50" height="2"/ class="center"></td>
				<td class="lightbeam"></td>
				<td class="lightbeam"></td>
        	</tr>    
        </table>
        
        <div id = "bodybackground">
			
             <h1> Choose which info to display: </h1>
            <form action="MainPage.php" method="post">
            <div class = "header">
				<select name = "view" class = "mainSelect">
					<option>Customer Count</option>
					<option>Ratio Comparison</option>
					<option>Average Money Spent</option>
					<option>Total Money Spent</option>
					<option>Industry Products</option>
					<option>Your Shoppers Information</option>
					<option>Your Best Buy Information</option>
					<option>Your PetroCanada Information</option>
                    <option>Your PharmaPlus Information</option>
					<option>Your Airmiles Information</option>
					<option>Your Ebay Information</option>
				</select>
                
				<input type="submit" / >
            </div>
			</form>
			<div class = "tabContain">
			<?php
				if(isset($_COOKIE["user"])) {
					$usr = $_COOKIE["user"];
				} else {
					$usr = "Guest";
				}
				$flag = false;
				if(!empty($_POST['co2'])){
					$flag = true;
				}
				$db = mysql_connect("localhost","root","");
				if(!$db){
					die('Could not connect: '.mysql_error());
				}else{
					$db_selected = mysql_select_db("databases_p3", $db);
					if(!$db_selected){
						die('Can\'t find blog posts: '.mysql_error());
					}else{
						if(!empty($_POST['view'])){
						switch($_POST['view']){
							
						case "Customer Count":
							echo "Points Members of Each Company";
							$query = "SELECT * FROM customercount";
							$result = mysql_query($query);
							echo "<table class=\"tables\">";
							echo "<thead><tr><th>Best Buy</th><th>PetroCanada</th><th>Shoppers Drug Mart</th></tr></thead>";
							echo "<tbody>";
							while($row = mysql_fetch_array($result)){
								echo "<tr>
								<td>".$row['BestBuy']."</td>
								<td>".$row['PetroCanada']."</td>
								<td>".$row['Shoppers']."</td>
								</tr>";
							}
							echo "</tbody>";
							echo "</table>";
							break;
							
						case "Ratio Comparison":
							$query = "SELECT CompanyName FROM companies";
							$result = mysql_query($query);
							if(!$result){
								echo "Query is using incorrect syntax<br />";
								echo $query;
							}else{
								echo "<form action='MainPage.php' method='post'>";
								echo "<select name='co1'>";
								while($row = mysql_fetch_array($result)){
									echo "<option>";
									echo $row['CompanyName'];
									echo "</option>";
								}
								echo "</select>";
								$result = mysql_query($query);
								echo "<select name='co2'>";
								while($row = mysql_fetch_array($result)){
									echo "<option>";
									echo $row['CompanyName'];
									echo "</option>";
								}
								echo "</select>";
								echo "<input type='submit' name='view' value='Ratio Comparison' / >";
								echo "</form>";
							
								if($flag){
									$query = "SELECT * FROM companies AS c, companyprograms AS cp, companypointssystem AS cps 
									WHERE c.OrganisationID=cp.OID AND cp.RewardProgramID=cps.RPID 
									AND (c.companyname='".$_POST['co1']."' OR c.companyname='".$_POST['co2']."')";
									$result = mysql_query($query);
									echo "<table class=\"tables\">";
									echo "<thead><tr><th>Company</th><th>Ratio</th></tr></thead>";
									echo "<tbody>";
									while($row = mysql_fetch_array($result)){
										echo "<tr>
										<td>".$row['CompanyName']."</td>
										<td>".$row['PointRatio']."</td>
										</tr>";
									}
									echo "</tbody>";
									echo "</table>";
								}
							}
						break;	
						case "Average Money Spent":
							echo "Average Points of Each Company";
							$query = "SELECT * FROM avgmoneyspent";
							$result = mysql_query($query);
							echo "<table class=\"tables\">";
							echo "<thead><tr><th>Best Buy</th><th>PetroCanada</th><th>Shoppers Drug Mart</th></tr></thead>";
							echo "<tbody>";
							while($row = mysql_fetch_array($result)){
								echo "<tr>
								<td>".$row['AVG(B.BestBuyMoneySpent)']."</td>
								<td>".$row['AVG(P.PetroMoneySpent)']."</td>
								<td>".$row['AVG(S.ShoppersMoneySpent)']."</td>
								</tr>";
							}
							echo "</tbody>";
							echo "</table>";
							break;
							
						case "Total Money Spent":
							echo "Total Money Spent in Each Company";
							$query = "SELECT * FROM totalmoneyspent";
							$result = mysql_query($query);
							echo "<table class=\"tables\">";
							echo "<thead><tr><th>Best Buy</th><th>PetroCanada</th><th>Shoppers Drug Mart</th></tr></thead>";
							echo "<tbody>";
							while($row = mysql_fetch_array($result)){
								echo "<tr>
								<td>".$row['(SELECT SUM(BestBuyMoneySpent) FROM bestbuy)']."</td>
								<td>".$row['(SELECT SUM(petromoneyspent) FROM petrocanada)']."</td>
								<td>".$row['(SELECT SUM(shoppersmoneyspent) FROM shoppers)']."</td>
								</tr>";
							}
							echo "</tbody>";
							echo "</table>";
							break;
							
						case "Industry Products":
							echo "Industry Products of Each Company";
							$query = "SELECT * FROM industryproducts";
							$result = mysql_query($query);
							echo "<table class=\"tables\">";
							echo "<thead><tr><th>Products</th></tr></thead>";
							echo "<tbody>";
							while($row = mysql_fetch_array($result)){
								echo "<tr>
								<td>".$row['Products']."</td>
								</tr>";
							}
							echo "</tbody>";
							echo "</table>";
							break;
							
						case "Your Shoppers Information":
							echo "Your Shoppers Information";
							$query = "SELECT * FROM shoppersinfo WHERE CustomerID = (SELECT CustomerID FROM customers WHERE UserName='$usr')";
							$result = mysql_query($query);
							echo "<table class=\"tables\">";
							echo "<thead><tr><th>CustomerID</th><th>CustomerName</th><th>ShoppersMoneySpent</th><th>ShoppersPoints</th></tr></thead>";
							echo "<tbody>";
							$row = mysql_fetch_array($result);							
							echo "<tr><td>".$row[0]."</td>";
							echo "<td>".$row[1]."</td>";
							echo "<td>".$row[2]."</td>";
							echo "<td>".$row[3]."</td></tr>";
							echo "</tbody>";
							echo "</table>";
							break;
							
						case "Your Best Buy Information":
							echo "Your BestBuy Information";
							$result = mysql_query("SELECT * FROM bestbuyinfo AS B WHERE CustomerID = (SELECT CustomerID FROM Customers WHERE UserName='$usr')");
							echo "<table class=\"tables\">";
							echo "<thead><tr><th>CustomerID</th><th>CustomerName</th><th>BestBuyMoneySpent</th><th>BestBuyPoints</th></tr></thead>";
							echo "<tbody>";
							$row = mysql_fetch_array($result);
							echo "<tr><td>".$row[0]."</td>";
							echo "<td>".$row[1]."</td>";
							echo "<td>".$row[2]."</td>";
							echo "<td>".$row[3]."</td></tr>";
							echo "</tbody>";
							echo "</table>";
							break;
							
						case "Your PetroCanada Information":
							echo "Your PetroCanada Information";
							$result = mysql_query("SELECT * FROM petrocanadainfo AS B WHERE CustomerID = (SELECT CustomerID FROM Customers WHERE UserName='$usr')");
							echo "<table class=\"tables\">";
							echo "<thead><tr><th>CustomerID</th><th>CustomerName</th><th>PetroMoneySpent</th><th>PetroPoints</th></tr></thead>";
							echo "<tbody>";
							$row = mysql_fetch_array($result);
							echo "<tr><td>".$row[0]."</td>";
							echo "<td>".$row[1]."</td>";
							echo "<td>".$row[2]."</td>";
							echo "<td>".$row[3]."</td></tr>";
							echo "</tbody>";
							echo "</table>";
							break;
							
						case "Your PharmaPlus Information":
							echo "Your PetroCanada Information";
							$result = mysql_query("SELECT * FROM pharmaplusinfo AS B WHERE CustomerID = (SELECT CustomerID FROM Customers WHERE UserName='$usr')");
							echo "<table class=\"tables\">";
							echo "<thead><tr><th>CustomerID</th><th>CustomerName</th><th>PharmaMoneySpent</th><th>PharmaPoints</th></tr></thead>";
							echo "<tbody>";
							$row = mysql_fetch_array($result);
							echo "<tr><td>".$row[0]."</td>";
							echo "<td>".$row[1]."</td>";
							echo "<td>".$row[2]."</td>";
							echo "<td>".$row[3]."</td></tr>";
							echo "</tbody>";
							echo "</table>";
							break;
							
						case "Your Airmiles Information":
							echo "Your PetroCanada Information";
							$result = mysql_query("SELECT * FROM airmilesinfo AS B WHERE CustomerID = (SELECT CustomerID FROM Customers WHERE UserName='$usr')");
							echo "<table class=\"tables\">";
							echo "<thead><tr><th>CustomerID</th><th>CustomerName</th><th>AirMoneySpent</th><th>Mileage</th></tr></thead>";
							echo "<tbody>";
							$row = mysql_fetch_array($result);
							echo "<tr><td>".$row[0]."</td>";
							echo "<td>".$row[1]."</td>";
							echo "<td>".$row[2]."</td>";
							echo "<td>".$row[3]."</td></tr>";
							echo "</tbody>";
							echo "</table>";
							break;
							
						case "Your Ebay Information":
							echo "Your PetroCanada Information";
							$result = mysql_query("SELECT * FROM ebayinfo AS B WHERE CustomerID = (SELECT CustomerID FROM Customers WHERE UserName='$usr')");
							echo "<table class=\"tables\">";
							echo "<thead><tr><th>CustomerID</th><th>CustomerName</th><th>EbayMoneySpent</th><th>EbayPoints</th></tr></thead>";
							echo "<tbody>";
							$row = mysql_fetch_array($result);
							echo "<tr><td>".$row[0]."</td>";
							echo "<td>".$row[1]."</td>";
							echo "<td>".$row[2]."</td>";
							echo "<td>".$row[3]."</td></tr>";
							echo "</tbody>";
							echo "</table>";
							break;
								}
							}
						}
					}
				?>
            </div>
        </div>
        
        <div id = "footer">
          CentralPoints &copy 2012 All Rights Reserved RAID0rs
        </div>
 	</div>
</body>

</html>
