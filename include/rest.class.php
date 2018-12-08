<?php

class Restphpmysql
{
	protected $_conn;
	protected $host;
	protected $dbname;
	protected $username;
	protected $password;

	function __construct($childClassFunctions)
	{
		$this->connectMysql();
		$functionName = $this->getRoute();
		$this->runFunction($childClassFunctions,$functionName);
	}

	public function connectMysql()
	{
		$this->_conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);

		if ($this->_conn->connect_error) {
		    die("Connection failed: " . $this->_conn->connect_error);
		}
	}

	public function getJson($query)
	{
		try
		{
			$abcd = array();
			$json = array();
			
			$query = preg_replace('/\\\\/', '', $query);
			$query = preg_replace('--', '', $query);
			$query = stripslashes($query);

			$result = $this->_conn->query($query);
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
				$json = ["error"=>"TABLE EMPTY..."];
			    return json_encode($json);
			}
		}catch(Exception $e){
			throw new Exception("Something is wrong", 1);
		}
	}

	private function getRoute()
	{
		$urls = explode('\\', getcwd());
		$currentDir = $urls[count($urls)-1];

		$param = explode('/', $_SERVER['REQUEST_URI']);
		$functionName = $param[count($param)-1];
		
		return $functionName;
	}

	private function runFunction($childClassFunctions,$currentFunctionName)
	{
		if(in_array($currentFunctionName, $childClassFunctions))
		{
			$this->{$currentFunctionName}();			
		}else{
			$json = ["error"=>"This Route is Not Available..."];
		    print_r(json_encode($json));
		}
	}

}

?>