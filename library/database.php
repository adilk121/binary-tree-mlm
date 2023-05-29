<?php require_once("constant.php"); ?>
<?php require_once("validate.php"); ?>
<?php 
class database
{
	var $new_conn;
	var $db_servername,$db_username,$db_password,$db_database;
	function open_connection ()
	{
		// Create connection
	 	$conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
	    // Check connection
 	    if ($conn->connect_error) 
    	{
    		die("Connection failed: " . $conn->connect_error);
	 	}
		$this->new_conn = $conn;
		$this->new_conn->query("SET time_zone = 'Asia/Kolkata'");
	}
	
	function real_escape($to_update)
	{
		return $this->new_conn->real_escape_string($to_update);
	}
	
	function close_connection()
	{
		//$this->new_conn->close();
	}
	
	function select_simple($fields,$table_name,$condition)
	{
		$this->open_connection();
		$query="select $fields from $table_name $condition";
		$sql=$this->new_conn->query($query);
		$this->close_connection();
		return $sql;
	}
	
	function insert_simple($table_name,$fields,$value)
	{
		$this->open_connection();
	echo	$insert_query="insert into $table_name ($fields) values ($value)";
		$SQL=$this->new_conn->query($insert_query);
		$this->close_connection();
		return $SQL;
	}
	function update_simple($table_name,$fields,$value,$condtion)
	{
		$update_query="update $table_name set ";
		for($i=0;$i<count($fields);$i++)
		{
			if($i==0)
			{
				$update_query.="$fields[$i]='$value[$i]'";
			}
			else
			{
				$update_query.=",$fields[$i]='$value[$i]'";
			}	
		}
		 $update_query.=" $condtion ";
		
		$SQL_UPDATE=$this->new_conn->query($update_query);
		return $SQL_UPDATE;
	}
	function delete_simple($table_name,$condition)
	{
		$this->open_connection();
		$delete_query="DELETE FROM $table_name $condition";
		$SQL=$this->new_conn->query($delete_query);
		$this->close_connection();
		return $SQL;
	}
	function insert_id()
	{
		return $this->new_conn->insert_id;
	}
	function affected_rows()
	{
		return $this->new_conn->affected_rows;
		
	}
	function START_TRANSATION()
	{
		return $this->new_conn->query("START TRANSACTION");
	}
	function rollback()
	{
		return $this->new_conn->rollback();
	}
	function commit()
	{
		return $this->new_conn->commit();
	}
	function simply_run_statement_passed($statement)
	{
		return $this->new_conn->query($statement);
		 
	}




}
?>