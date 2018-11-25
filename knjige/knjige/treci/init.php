<?php

require('db.php');
$db = new MysqliDb('localhost','root','','knjige');   
error_reporting(E_ALL | E_STRICT);
ini_set("display_errors", 0);
ini_set("log_errors", 1);
ini_set("error_log", "logovi.log");
?>