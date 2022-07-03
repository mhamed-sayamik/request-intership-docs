<?php
class db{

    protected $connection;
	public function __construct($dbhost = 'localhost', $dbuser = 'root', $dbpass = '', $dbname = '', $charset = 'utf8') {
		$this->connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
		if ($this->connection->connect_error) {
			die('Impossible de se connecter à la base de données !' . $this->connection->connect_error);
		}
		$this->connection->set_charset($charset);
	}

    public function normal_query($query) {
        $result = $this->connection->query($query);
        return $result;
    }
	public function result_query($query) {
        $row = $this->normal_query($query);
		$result = mysqli_fetch_assoc($row);
        return $result;
    }
	public function close(){
		return $this->connection->close();
	}
}
