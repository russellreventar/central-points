<?php
    session_start();
    if(isset($_SESSION["logs"])){
        $_SESSION["logs"]++;
        $_SESSION["hits"]++;
    } else {
        $_SESSION["logs"]=0;
        $_SESSION["hits"]=0;
    }
    
    if(isset($_GET["signout"]) && $_GET["signout"] == 1) {
		setcookie("user", "", time()-36000);
		setcookie("guest", "", time()-36000);
    }
	
	if(isset($_COOKIE["user"])) {
		header('Location : User/MainPage.php');
	}
	
?>

<!doctype html>
<html>
<head>
	
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <link href="Stylesheets/Log-in.css" rel="stylesheet" type="text/css" media="screen" />
    <link rel="shortcut icon" href="../images/credi.ico">

    <title>Log in</title>

</head>

<body>
	<table class= "outerTable">
  		<tr>
    		<td class = "welcomeCell"> Welcome!</td>
  		</tr>
  		<tr>
    		<td height="461"><img src="images/credi.png" width="427" height="414" class="center"></td>
  		</tr>
  		<tr>
    		<td class = "nameCell">C E N T R A L&nbsp;&nbsp; P O I N T S</td>
  		</tr>
  		<tr>
    		<td class = "description">all your reward points in one central location
        	</td>
  		</tr>
        <tr><td class ="seperator1"></td>
  		<tr>
    		<td align= "center">
            	<?php
						$dbname = "databases_p3";
						$host = "localhost";
						$conusr = "root";
						
						$con = new PDO("mysql:dbname=$dbname;host=$host", $conusr, ""); //connect to database
						$con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
						
						if(empty($_POST["usr"]) && empty($_POST["pwd"])) {
							echo '<form name="input" action="index.php" method="post">';
							echo '<br><input type="text" id="user" class="textInput" name="usr">';
							echo '<br><input type="password" id="pass" class="textInput" name="pwd">';
							echo '<p><input type="submit" value="" id="button" class="Button" />';
							echo '</form>';
						
						} else {
							$usr = $_POST["usr"];
							$pwd = $_POST["pwd"];

							$login = $con->prepare("SELECT * FROM customers WHERE UserName= :name AND Password= :pwd");
							$login->execute(array(':name'=>$usr,':pwd'=>$pwd));
							$row = $login->fetch(); //fetch login

							if(empty($row[5])) {
								echo '<form name="input" action="index.php" method="post">';
								echo '<br><input type="text" id="user" class="textInput" name="usr">';
								echo '<br><input type="password" id="pass" class="textInput" name="pwd">';
								echo '<p><input type="submit" value="" id="button" class="Button" />';
								echo '</form>';
								echo htmlspecialchars($usr, ENT_QUOTES, 'UTF-8') . " is an invalid username.";
						
							} else {
								if($row[6]==$pwd){
									echo "Login Successful!";
									setcookie("user", $usr, time()+60*60*24*30*12);
									header('Location: User/MainPage.php');
								} else {
									echo "Invalid username/password.";
						
								}
							}
						}
						$con = NULL;
					
				?>
        	</td>
        </tr>
        <tr><td class ="seperator3"></td></tr>
      	<tr>
        	<td class = "loginSubtext">
        		Forgot password? | <a href="User/MainPage.php?guest=1">Log in as Guest</a>
                <p>Signup Here! | <a href="Login/Registration.php">Registry</a>
            </td>
      	</tr>
        <tr>
        	<td class ="seperator1"></td>
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
</body>
</html>
