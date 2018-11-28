<?php

class Main
{
	protected $_conn;
	public $host;
	public $dbname;
	public $username;
	public $password;
	public $query;

	public function connectMysql()
	{
		// Create connection
		$this->_conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);

		// Check connection
		if ($this->_conn->connect_error) {
		    die("Connection failed: " . $this->_conn->connect_error);
		}
	}

	public function getData()
	{
		$abcd = array();
		$json = array();
		$result = $this->_conn->query($this->query);
		if ($result->num_rows > 0)
		{
		    while($row = $result->fetch_assoc())
		    {
		    	$json[] = $row;
		    }
		    return json_encode($json);
		}
		else
		{
			$json[] = ["error"=>"Somtheing is wrong"];
		    return json_encode($json);
		}
	}
}

?>