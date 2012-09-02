<?php 
//DB.class.php
class DB {
	
	protected $numRows = 0;
	protected $db_name;
	protected $db_user;
	protected $db_pass;
	protected $db_host;
	
	
	//Constructor is called whenever a new object is created.
	// Takes host, user, password and database name as arguments
	function __construct($host,$user,$pass,$dbname)
	{
		$this->db_name = $dbname;
		$this->db_host = $host;
		$this->db_user = $user;
		$this->db_pass = $pass;
	}
	
	//open a connection to the database. Make sure this is called
	// on every page that needs to use the database.
	public function connect() {
		$connection = mysql_connect($this->db_host,$this->db_user,$this->db_pass);
		if (!$connection) die("Unable to connect to MySQL: " . mysql_error());
		mysql_select_db($this->db_name);
		
		return true;
	}
	
	// takes a mysql row and returns an associative array, where the keys
	// in the array are the column names in the row set. if singleRow is set to 
	// true , then it will return a single row instead of an array of rows.
	public function processRowSet($rowSet,$singleRow=false)
	{
		$resultArray = array();
		while($row = mysql_fetch_assoc($rowSet))
		{
			array_push($resultArray,$row);
		}
		mysql_free_result($rowSet);
		if($singleRow == true)
			return $resultArray[0];
			
		return $resultArray;
	}
	
	// Select rows from the database.
	// returns a full row or rows from $table using $where as the where clause.
	// return value in an associative array with column names as keys.
	public function select($table,$where="1=1",$columns = "*")
	{
		$sql = "select $columns from $table where $where";
		//echo $sql."<br/>";
		$result = mysql_query($sql);
		$this->numRows = mysql_num_rows($result);
		if(mysql_num_rows($result) ==1)
			return $this->processRowSet($result,true);
		
		return $this->processRowSet($result);
	}
	
	// Updates a current row in the database.
	// takes an array of data, where the keys in the array are the column names
	// and the values are the data that will be inserted into those columns.
	// $table is the name of the table and $where is the sql where clause.
	public function update($data,$table,$where)
	{
		$sql = "update $table set ";
		$commas = 0;
		foreach($data as $column => $value)
		{
			$sql .= " $column = $value ";
			if($commas < (count($data) - 1))
			{
				$sql .= " , ";
				$commas++;
			}
			
			
		}
		$sql .= " where $where";
		//echo $sql."<br/>";
		mysql_query($sql) or die(mysql_error());
		
		return true;
	}
	
	// Inserts a new row into the database.
	// takes an array of data, where the keys in the array are the column names
	// and the values are the data that will be inserted into those columns.
	// $table is the mname of the table.
	public function insert($data,$table)
	{
		$columns = "";
		$values = "";
		foreach($data as $column => $value)
		{
			
			$columns .=($columns == "") ? "" : ", ";
			$columns .= $column;
			$values .= ($values == "") ? "" : ", ";
			$values .= $value;
			
		}
		
		$sql = "insert into $table ($columns) values ($values)";
		//echo $sql;
		mysql_query($sql) or die(mysql_error());
		
		//return the ID of the user in the database.
		return mysql_insert_id();
	}
	
	// Deletes a row in the database
	// $table is the name of the table and $where is the sql where clause
	public function delete($table,$where)
	{
		$sql = "delete from $table where $where";
		mysql_query($sql) or die(mysql_error());
		return true;
	}
	
	//Gets the number of rows returned by the query
	public function getnumRows()
	{
		return $this->numRows;
	}
	
	//Execute the given sql query
	public function execute($sql)
	{
		$result = mysql_query($sql) or die(mysql_error());
		$this->numRows = mysql_num_rows($result);
		if(mysql_num_rows($result) ==1)
			return $this->processRowSet($result,true);
		return $this->processRowSet($result);

	}
}

?>
