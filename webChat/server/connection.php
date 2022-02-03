<?php

$DB=new Database();
$info=(object)[];

Class Database
{

	private $con;

	//construct
	function __construct()
	{

		$this->con = $this->connect();
	}

	//connect to db
	private function connect()
	{
		try
		{
			$DBUSER='root';
			$DBPASS='';
			$connection = new PDO('mysql:host=localhost;dbname=webchat',$DBUSER,$DBPASS);

            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			return $connection;

		}catch(PDOException $e)
		{
			echo  "Can't connect to the database". $e->getMessage();
			die;
		}

		return false;

	}

	//write to database
	public function write($query,$data )
	{

		$con = $this->connect();
		$statement = $con->prepare($query);
		$check = $statement->execute($data);

		if($check)
		{
			return true;
		}else {
			return false;
		}

		

	}

	//read from database
	public function read($sql,$log )
	{

		$con = $this->connect();
		$statement = $con->prepare($sql);
		$check = $statement->execute($log);

		if($check)
		{
			$result = $statement->fetchAll(PDO::FETCH_OBJ);
			if(is_array($result) && count($result) > 0)
			{
				return $result;
			}
			return false;
		}

		return false;

	}
	
	
	

	public function generateuserid($max)
	{

		$rand = "";
		$randCount = rand(4,$max);
		for ($i=0; $i < $randCount; $i++) { 
			
			$r = rand(0,9);
			$rand .= $r;
		}

		return $rand;
	}
}

?>



