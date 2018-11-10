<?php 
	class MediaInfo {

	public $ID;
	public $ISBN = '';
	public $description = '';
	public $publish_date = '';
	public $type = '';
	public $author_ID = '';
	public $publisher_ID = '';
	public $media_ID = '';
	public $status = '';

	function __construct($ISBN, $description, $publish_date, $type, $author_ID, $publisher_ID, $media_ID, $status){
		$this->ISBN = $ISBN;
		$this->description = $description;
		$this->publish_date = $publish_date;
		$this->type = $type;
		$this->author_ID = $author_ID;
		$this->publisher_ID = $publisher_ID;
		$this->media_ID = $media_ID;
		$this->status = $status;
	}

	public function writeDatabase(){
		include_once "dbconnect.php";
		$db = new Database();
		$conn = $db->connectDB();

		$sql_insert = "INSERT INTO media_info (
			ISBN, 
			description, 
			publish_date, 
			type,
			author_ID,
			publisher_ID,
			media_ID,
			status)";

		$sql_insert .= "VALUES (
			'$this->ISBN',
			'$this->description',
			'$this->publish_date',
			'$this->type',
			'$this->author_ID',
			'$this->publisher_ID',
			'$this->media_ID',
			'$this->status')";

		if (mysqli_query($conn, $sql_insert)) {
	   		echo "<script>alert('Data inserted successfully!');</script>";
		} else {
	  		echo "Error inserting data: " . mysqli_error($conn);
		}
		//close connection
		mysqli_close($conn);
	}
}
?>