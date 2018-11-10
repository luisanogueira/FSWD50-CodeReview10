<?php 

class Author {

	public $ID;
	public $name = '';
	public $surname = '';

	function __construct($name, $surname){
		$this->name = $name;
		$this->surname = $surname;
	}

	public function writeDatabase(){
		include_once "dbconnect.php";
		$db = new Database();
		$conn = $db->connectDB();

		$query = "INSERT INTO author (
			name, 
			surname)
			VALUES (
			'$this->name',
			'$this->surname')";

		$result = mysqli_query($conn, $query);

		$authorId = mysqli_insert_id($conn);

		//close connection
		mysqli_close($conn);

		return $authorId;	
	}
}

?>