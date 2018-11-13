<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow" rel="stylesheet">

    <title>Big Library</title>
  </head>
  <body id="all">
    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
      <a class="navbar-brand">Big Library
        <i class="fas fa-book"></i>
      </a>
      <div>
        <button type="button" class="btn btn-info p-2 text-center" id="insertBtn">Insert</button>
      </div>
    </nav>
    
    <div class="container">
      <div class="hero-image">
        <img src="img/library2.jpg" alt="books">
      </div>
      
      <h2 class="text-center pt-3">Our Collection of Media</h2>
      <?php

        include_once "dbconnect.php";
          $db = new Database();
          $conn = $db->connectDB();

          $query = "SELECT media.ID, media.title, media_info.ISBN, media_info.description, media_info.publish_date, media_info.type, media_info.status, author.name, author.surname, publisher.name AS
            publisher_name
            FROM media 
            LEFT JOIN media_info ON media.ID = media_info.media_ID
            LEFT JOIN author ON author.ID = media_info.author_ID
            LEFT JOIN publisher ON publisher.ID = media_info.publisher_ID";

          $result = mysqli_query($conn, $query);

              if ($result->num_rows > 0) {
                  echo "<table class='table table-striped col-12 mt-3'><thead class='thead-dark'><tr><th>Media ID</th><th>Title</th><th>ISBN</th><th>Description</th><th>Publish Date</th><th>Type</th><th>Status</th><th>Author name</th><th>Author surname</th><th>Publisher</th><th></th><th></th></tr></thead>";
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                      echo "<tr><td>".$row["ID"]."</td><td>".$row["title"]."</td><td>".$row["ISBN"]."</td><td>".$row["description"]."</td><td>".$row["publish_date"]."</td><td>".$row["type"]."</td><td>".$row["status"]."</td><td>".$row["name"]."</td><td>".$row["surname"]."</td><td>".$row["publisher_name"]."</td><td><button type='button' class='btn btn-info p-2 text-center'><a href='update.php?mediaId={$row['ID']}'>Update</a></button></td><td><button type='button' class='btn btn-info p-2 text-center'><a href='delete.php?mediaId={$row['ID']}'>Delete</a></button></td></tr>";

                  }
                  echo "</table>";
                } else {
                  echo "0 results";
              }

          //close connection
          mysqli_close($conn);
      ?>

      <form action="index.php" method="POST" accept-charset="utf-8" id="insertForm">
        <div class ="row">
          <div class="col-6 p-4">
              <div class="form-group">
                <label>Title</label>
                <input class="form-control" type="text" name="title" placeholder="Title">
              </div>
              <div class="form-group">
                <label>Image</label>
                <input class="form-control" type="text" name="image" placeholder="Image">
              </div>
              <div class="form-group">
                <label>Author name</label>
                <input class="form-control" type="text" name="author_name" placeholder="Author Name">
              </div>
              <div class="form-group">
                <label>Publisher name</label>
                <input class="form-control" type="text" name="publisher_name" placeholder="Publisher name">
              </div>
              <div class="form-group">
                <label>Publisher address</label>
                <input class="form-control" type="text" name="address" placeholder="Publisher address">
              </div>
              <div class="form-group">
                <label>Publisher size</label>
                <input class="form-control" type="text" name="size" placeholder="Publisher size">
              </div>
            </div>

            <div class="col-6 p-4">
              <div class="form-group">
                <label>ISBN</label>
                <input class="form-control" type="text" name="ISBN" placeholder="ISBN">
              </div>
              <div class="form-group">
                <label>Description</label>
                <input class="form-control" type="text" name="description" placeholder="Description">
              </div>
              <div class="form-group">
                <label>Publish date</label>
                <input class="form-control" type="text" name="publish_date" placeholder="Publish date">
              </div>
              <div class="form-group">
                <label>Type</label>
                <input class="form-control" type="text" name="type" placeholder="Type">
              </div>
              <div class="form-group">
                <label>Status</label>
                <input class="form-control" type="text" name="status" placeholder="Status">
              </div>
            </div>
          </div>
            <input class="btn btn-info p-2 m-3 text-center col-2" type="submit" name="submit" id="btn">
          </form>
        

        <?php 
        include "media.php";
        include "media_info.php";
        include "author.php";
        include "publisher.php";

        if(isset($_POST["submit"])){
          $newMedia = new Media(
            $_POST["title"], 
            $_POST["image"]);

          $mediaId = $newMedia->writeDatabase();

          $authorName = explode( " ", $_POST["author_name"], 2);
          $newAuthor = new Author(
            $authorName[0],
            $authorName[1]);

          $authorId = $newAuthor->writeDatabase();

          $newPublisher = new Publisher(
            $_POST["publisher_name"], 
            $_POST["address"],
            $_POST["size"]);

          $pubId = $newPublisher->writeDatabase();

          $newMediaInfo = new MediaInfo(
            $_POST["ISBN"], 
            $_POST["description"], 
            $_POST["publish_date"], 
            $_POST["type"],
            $authorId,
            $pubId,
            $mediaId,
            $_POST["status"]);

          $newMediaInfo->writeDatabase();
        }

        ?>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <!-- Optional JavaScript -->

    <script type="text/javascript">
      $("#insertBtn").click(function(){
        $("#insertForm").toggle();
      })
      $("#insertForm").submit(function() {
        $("#insertForm").toggle();
      })
    </script>

  </body>
</html>