<?php
require_once "include/rest.class.php";

$Obj = new main();
$Obj->dbname = "DATABASE_NAME";
$Obj->username = "root";
$Obj->password = "";
$Obj->connectMysql();
$Obj->query = "SELECT * FROM TABLE_NAME";
$jsonD = $Obj->getData();
print_r($jsonD);
?>