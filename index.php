<?php
require_once "include/rest.class.php";

$Obj = new main();
 
$Obj->dbname = "marketious";
$Obj->username = "root";
$Obj->password = "";
$Obj->connectMysql();
$Obj->query = "SELECT * FROM admins";
$jsonD = $Obj->getData();
print_r($jsonD);
?>