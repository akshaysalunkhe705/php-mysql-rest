<?php
require_once "include/rest.class.php";

class Myclass extends Restphpmysql
{
	function __construct()
	{
		$this->dbname = "DATABASE_NAME";
		$this->username = "root";
		$this->password = "";

        parent::__construct(get_class_methods($this));
	}

	function getAdmins($params)
	{
		print_r($params);
		//$jsonD = $this->getJson("SELECT * FROM TABLE_NAME");
		//print_r($jsonD);
	}
	function getUsers()
	{
		$jsonD = $this->getJson("SELECT * FROM TABLE_NAME");
		print_r($jsonD);
	}
}
$Obj2 = new Myclass();
?>