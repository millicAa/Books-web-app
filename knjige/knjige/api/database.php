<?php
class Database {
	private $hostname = "localhost";
	private $username = "root";
	private $password = "";
	private $dbname = "knjige";
	private $dblink;
	private $result = true;
	private $records;
	private $affectedRows;


	function __construct($dbname)
	{
		$this->$dbname = $dbname;
		$this->Connect();
	}

	public function getResult()
	{
		return $this->result;
	}

	function __destruct()
	{
		$this->dblink->close();
	}


	function Connect()
	{
		$this->dblink = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
		if($this->dblink->connect_errno)
		{
			printf("Konekcija neuspesna: %s\n",  $mysqli->connect_error);
			exit();
		}
		$this->dblink->set_charset("utf8");
	}

	function novaOcena($data) {
		$mysqli = new mysqli("localhost", "root", "", "knjige");
		$razlog = mysqli_real_escape_string($mysqli,$data["razlog"]);
		$visina = mysqli_real_escape_string($mysqli,$data["visina"]);
		$knjigaID = mysqli_real_escape_string($mysqli,$data["knjigaID"]);

		$sql = "INSERT INTO ocena (razlog,visina,knjigaID) VALUES ('$razlog','$visina','$knjigaID')";

		if($mysqli->query($sql))
		{
			$this ->result = true;
		}
		else
		{
			$this->result = false;
		}
		$mysqli->close();
	}



	function vratiZanrove() {
		$mysqli = new mysqli("localhost", "root", "", "knjige");
		$q = 'SELECT * FROM zanr ';
		$this ->result = $mysqli->query($q);
		$mysqli->close();
	}

	function vratiKnjige() {
		$mysqli = new mysqli("localhost", "root", "", "knjige");
		$q = 'SELECT * FROM knjiga k join zanr z on k.zanrID=z.zanrID ';
		$this ->result = $mysqli->query($q);
		$mysqli->close();
	}


	function ExecuteQuery($query)
	{
		if($this->result = $this->dblink->query($query)){
			if (isset($this->result->num_rows)) $this->records         = $this->result->num_rows;
				if (isset($this->dblink->affected_rows)) $this->affected        = $this->dblink->affected_rows;
					return true;
		}
		else{
			return false;
		}
	}
}
?>
