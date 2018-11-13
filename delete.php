<?php
include_once "dbconnect.php";
$db = new Database();
$conn = $db->connectDB();

if($_POST) {
	$mediaId = $_POST['mediaId'];
	$authorId = $_POST['authorId'];
	$pubId = $_POST['pubId'];

	$sql1 = "DELETE FROM media_info WHERE media_ID='".$mediaId."'";

	$sql2 = "DELETE FROM media WHERE ID='".$mediaId."'";

	$sql3 = "DELETE FROM author WHERE ID='".$authorId."'";

	$sql4 = "DELETE FROM publisher WHERE ID='".$pubId."'";

	if($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE && $conn->query($sql3) === TRUE && $conn->query($sql4) === TRUE) {
		echo "<p>Succcessfully Deleted</p>";
        echo "<a href='index.php'><button type='button'>Back</button></a>";

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

<!DOCTYPE html>
<html>
	<head>
	    <title>Delete</title>

	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	    <link rel="stylesheet" href="style.css">

	    <!-- Bootstrap CSS -->
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

	    <link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow" rel="stylesheet">
	</head>
	<body>
		<h3>Do you really want to delete this information?</h3>

		<form action="delete.php" method="post">
		    <input type="hidden" name="mediaId" value="<?php echo $data['ID']?>">
			<input type="hidden" name="authorId" value="<?php echo $data['author_ID']?>">
			<input type="hidden" name="pubId" value="<?php echo $data['publisher_ID']?>">

		    <button type="submit">Yes, delete it!</button>
		    <button type="button"><a href="index.php">No, go back!</a></button>

		</form>
	</body>

</html>

<?php
}
$conn->close();
?>