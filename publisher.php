<?php 

class Publisher {

	public $ID;
	public $publisher_name = '';
	public $address = '';
	public $size = '';

	function __construct($publisher_name, $address, $size){
		$this->publisher_name = $publisher_name;
		$this->address = $address;
		$this->size = $size;
	}

	public function writeDatabase(){
		include_once "dbconnect.php";
		$db = new Database();
		$conn = $db->connectDB();

		$query = "INSERT INTO publisher (
			name, 
			address,
			size)
			VALUES (
			'$this->publisher_name',
			'$this->address',
			'$this->size')";

		$result = mysqli_query($conn, $query);

		$pubId = mysqli_insert_id($conn);

		//close connection
		mysqli_close($conn);

		return $pubId;	
	}
}

?>