<?php
require_once "include/rest.class.php";

class Myclass extends Restphpmysql
{
	function __construct()
	{
		$this->dbname = "marketious";
		$this->username = "root";
		$this->password = "";

        parent::__construct();
        $currentClass = get_class($this);
	}

	function getAdmins()
	{
		$this->query = "SELECT * FROM admins";
		$jsonD = $this->getData();
		print_r($jsonD);
	}
	function getUsers()
	{
		$this->query = "SELECT * FROM roles";
		$jsonD2 = $this->getData();
		print_r($jsonD2);
	}
}
$Obj2 = new Myclass();
?>