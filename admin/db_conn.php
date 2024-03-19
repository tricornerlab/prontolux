<?php
session_start();

$db = 'prontolux';
//$db_conn = mysqli_connect('localhost:3306', 'root', '', "prontolux");
$db_conn = mysql_connect('sxb1plcpnl0054.prod.sxb1.secureserver.net', 'prontolux', 'Pronto2011');

//if(!$db_conn){echo 'not ok';}

mysql_select_db($db);

?>