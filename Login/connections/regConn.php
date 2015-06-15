<?php

//registration connection to database

# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_dbConn = "localhost";
$database_dbConn = "databases_p3";
$username_dbConn = "root";
$password_dbConn = "";

$dbConn = mysql_pconnect($hostname_dbConn, $username_dbConn, $password_dbConn) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_select_db($database_dbConn,$dbConn);
?>