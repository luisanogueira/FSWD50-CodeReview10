<?php 

class Media {

	public $ID;
	public $title = '';
	public $image = '';

	function __construct($title, $image){
		$this->title = $title;
		$this->image = $image;
	}

	public function writeDatabase(){
		include_once "dbconnect.php";
		$db = new Database();
		$conn = $db->connectDB();

		$query = "INSERT INTO media (
			title, 
			image)
			VALUES (
			'$this->title',
			'$this->image')";

		$result = mysqli_query($conn, $query);

		$mediaId = mysqli_insert_id($conn);

		//close connection
		mysqli_close($conn);

		return $mediaId;	
	}
}

?>
