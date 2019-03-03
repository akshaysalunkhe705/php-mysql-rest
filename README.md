<h1>Rest Api Mysql</h1>
<p>It is use to make api easy and relable.</p>

<h3>Steps</h3>
<ul>
  <li>Download and Import include/rest.class.php file.</li>
  <li>Extend the Restphpmysql class in your file as shown in index.php file.</li>
  <li>
    fill the following paramenter in constractor as shown in index.php file  
    function __construct()
    {
      $this->dbname = "DATABASE_NAME";
      $this->host = "localhost";
      $this->username = "root";
      $this->password = "";
          parent::__construct(get_class_methods($this));
    }
  </li>
  <li>
      endpoint name and functions name should be same
      for example if endpoint is getadmin then function name should be getadmin 
  </li>
  <li>
      "getJson($query)" this return the json 
      for example:- $this->getJson("SELECT * FROM admins"); //this will return all the rows from admins
  </li>
</ul>
