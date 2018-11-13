<?php
include_once "dbconnect.php";
$db = new Database();
$conn = $db->connectDB();

if($_POST) {
	$mediaId = $_POST['mediaId'];
	$authorId = $_POST['authorId'];
	$pubId = $_POST['pubId'];
	$title = $_POST['title'];
	$image = $_POST['image'];
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$pub_name = $_POST['publisher_name'];
	$address = $_POST['address'];
	$size = $_POST['size'];
	$ISBN = $_POST['ISBN'];
	$description = $_POST['description'];
	$date = $_POST['publish_date'];
	$type = $_POST['type'];
	$status = $_POST['status'];

	$sql1 = "UPDATE media_info SET ISBN='".$ISBN."', description='".$description."', publish_date='".$date."', type='".$type."', status='".$status."' WHERE media_ID='".$mediaId."'";

	$sql2 = "UPDATE media SET title='".$title."', image='".$image."' WHERE ID='".$mediaId."'";

	$sql3 = "UPDATE author SET name='".$name."', surname='".$surname."' WHERE ID='".$authorId."'";

	$sql4 = "UPDATE publisher SET name='".$pub_name."', address='".$address."', size='".$size."' WHERE ID='".$pubId."'";

	if($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE && $conn->query($sql3) === TRUE && $conn->query($sql4) === TRUE) {
		echo "<p>Succcessfully Updated</p>";

        echo "<a href='update.php?id=".$mediaId."'><button type='button'>Back</button></a>";
        echo "<a href='index.php'><button type='button'>Home</button></a>";

    } else {
        echo "Error while updating record : ". $conn->error;
    }    
}

if($_GET) {
    $mediaId = $_GET['mediaId'];
    $query = "SELECT media.ID, media.title, media.image, media_info.ISBN, media_info.description, media_info.publish_date, media_info.type, media_info.status, author.ID AS author_ID, author.name, author.surname, publisher.address, publisher.size, publisher.name AS publisher_name, publisher.ID AS publisher_ID
            FROM media 
            LEFT JOIN media_info ON media.ID = media_info.media_ID
            LEFT JOIN author ON author.ID = media_info.author_ID
            LEFT JOIN publisher ON publisher.ID = media_info.publisher_ID
            WHERE media_ID= {$mediaId}";
    $result = $conn->query($query);
    $data = $result->fetch_assoc();
?>

	<form action="update.php" method="POST" accept-charset="utf-8" id="insertForm">
		<input type="hidden" name="mediaId" value="<?php echo $data['ID']?>">
		<input type="hidden" name="authorId" value="<?php echo $data['author_ID']?>">
		<input type="hidden" name="pubId" value="<?php echo $data['publisher_ID']?>">
	    <div class ="row">
	        <div class="col-6 p-4">
	              <div class="form-group">
	                <label>Title</label>
	                <input class="form-control" type="text" name="title" value="<?php echo $data['title']?>">
	              </div>
	              <div class="form-group">
	                <label>Image</label>
	                <input class="form-control" type="text" name="image" value="<?php echo $data['image']?>">
	              </div>
	              <div class="form-group">
	                <label>Author name</label>
	                <input class="form-control" type="text" name="name" value="<?php echo $data['name']?>">
	              </div>
	              <div class="form-group">
	                <label>Author surname</label>
	                <input class="form-control" type="text" name="surname" value="<?php echo $data['surname']?>">
	              </div>
	              <div class="form-group">
	                <label>Publisher</label>
	                <input class="form-control" type="text" name="publisher_name" value="<?php echo $data['publisher_name']?>">
	              </div>
	              <div class="form-group">
	                <label>Address</label>
	                <input class="form-control" type="text" name="address" value="<?php echo $data['address']?>">
	              </div>
	              <div class="form-group">
	                <label>Publisher size</label>
	                <input class="form-control" type="text" name="size" value="<?php echo $data['size']?>">
	              </div>
	            </div>

	            <div class="col-6 p-4">
	              <div class="form-group">
	                <label>ISBN</label>
	                <input class="form-control" type="text" name="ISBN" value="<?php echo $data['ISBN']?>">
	              </div>
	              <div class="form-group">
	                <label>Description</label>
	                <input class="form-control" type="text" name="description" value="<?php echo $data['description']?>">
	              </div>
	              <div class="form-group">
	                <label>Publish date</label>
	                <input class="form-control" type="text" name="publish_date" value="<?php echo $data['publish_date']?>">
	              </div>
	              <div class="form-group">
	                <label>Type</label>
	                <input class="form-control" type="text" name="type" value="<?php echo $data['type']?>">
	              </div>
	              <div class="form-group">
	                <label>Status</label>
	                <input class="form-control" type="text" name="status" value="<?php echo $data['status']?>">
	              </div>
	            </div>
	        </div>
	    <button type="submit">Save Changes</button>
	    <button type="button"><a href="index.php">Back</a></button>
	</form>

<?php
	}
    $conn->close();
?>

