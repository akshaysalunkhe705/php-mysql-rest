<?php
require_once "include/rest.class.php";

class Myclass extends Restphpmysql
{
	function __construct()
	{
		$this->dbname = "marketious";
		//$this->dbname = "DATABASE_NAME";
		$this->username = "root";
		$this->password = "";

        parent::__construct(get_class_methods($this));
	}

	function getAdmins($val1,$val2)
	{
		$jsonD = $this->getJson("SELECT * FROM admins");
		print_r($jsonD);
	}
	function getUsers()
	{
		$jsonD = $this->getJson("SELECT * FROM admins");
		print_r($jsonD);
	}
}
$Obj2 = new Myclass();
?>