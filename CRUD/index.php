<?php
//INSERT INTO `bookish` (`serial no`, `Title`, `Description`, `Timestamp`) VALUES ('', 'Buy Book', 'I need to buy a book that I was looking for so long', current_timestamp());
$insert = false;
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "Bookish";

$conn = mysqli_connect($serverName, $userName, $password, $dbName);

if(!$conn){
    die("connection failed!!". mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $title = $_POST["title"];
  $description = $_POST["description"];


  $sql = "INSERT INFO `notes` SET (`title`,`description`) VALUES( '$title', 'description')";
  $result = mysqli_query($conn, $sql);
  
  if ($result) {
   $insert = true;
  } else {
      echo "Failed to update the record: " . mysqli_error($conn);
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


  <title>Boi-Ghor</title>
</head>
<!--navbar bootstrap-->

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">BoiGhor</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">HOME <span class="sr-only"></span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">ABOUT</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">CONTACT US</a>
        </li>
      </ul>



      <form class="form-inline my-2 my-lg-0">
        <div class="input-group">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </div>
      </form>
    </div>
  </nav>



  <?php
  if($insert){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your data has been inserted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
  <div class="container my-5">
    <h2>Add </h2>
    <form action = "/CRUD/index.php" method= "post">
      <div class="form-group">
        <label for="title" class="form-label">Book Title</label>
        <input type="text" class="form-control" id="title" aria-describedby="">
      </div>
</form>
      <div class="form-group">
        <label for="description">Book Description</label>
        <textarea class="form-control" id="description" rows="3"></textarea>
      </div>
      
      <div style="margin-top: 10px;"></div> 
      
      <button type="submit" class="btn btn-primary">Save</button>
      </form>
      </div>
      
  <div class="container">

    <!--Tables bootstrap -->
    <table class="table">
      <thead>
        <tr>
        <th scope="col">serial no</th>
          <th scope="col">Title</th>
          <th scope="col">Description</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
      <?php
$sql = "SELECT * FROM `bookish`";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
  echo "<tr>
          <th scope='row'>" . $row['serial no'] . "</th>
          <td>" . $row['Title'] . "</td>
          <td>" . $row['Description'] . "</td>
          <td>Actions</td>
        </tr>";
}

?>
      </tbody>
    </table>
  </div>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html> 