<?php

class Restphpmysql
{
	protected $_conn;
	protected $host;
	protected $dbname;
	protected $username;
	protected $password;
	protected $query;

	function __construct()
	{
		$this->connectMysql();
		$method = $this->getUrl();
		$this->{$method}();
	}

	public function connectMysql()
	{
		$this->_conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);

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

	public function getUrl()
	{
		$urls = explode('\\', getcwd());
		$currentDir = $urls[count($urls)-1];

		$param = explode('/', $_SERVER['REQUEST_URI']);
		$currentParam = $param[count($param)-1];
		
		return $currentParam;
	}
}

?>