<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_cpDatabase = "localhost";
$database_cpDatabase = "databases_p3";
$username_cpDatabase = "root";
$password_cpDatabase = "";
$cpDatabase = mysql_pconnect($hostname_cpDatabase, $username_cpDatabase, $password_cpDatabase) or trigger_error(mysql_error(),E_USER_ERROR); 
?>