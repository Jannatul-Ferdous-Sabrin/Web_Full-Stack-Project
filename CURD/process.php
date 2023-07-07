<?php
include('connect.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $_POST["title"];
    $author = $_POST["author"];
    $type = $_POST["type"];
    $description = $_POST["description"];

    $sqlInsert = "INSERT INTO books (title, author, type, description) VALUES ('$title', '$author', '$type', '$description')";

    if (mysqli_query($conn, $sqlInsert)) {
        session_start();
        $_SESSION["create"] = "Book Added Successfully!";
        header("Location:index.php");
       
    } else {
        die("Something Went wrong: " . mysqli_error($conn));
    }
}



if (isset($_POST["edit"])) {

    $title = $_POST["title"];
    $type = $_POST["type"];
    $author = $_POST["author"];
    $description = $_POST["description"];
    $id = $_POST["id"];

    $sqlUpdate = "UPDATE books SET title = '$title', type = '$type', author = '$author', description = '$description' WHERE id = '$id'";

    if (mysqli_query($conn, $sqlUpdate)) {
        session_start();
        $_SESSION["update"] = "Book Updated Successfully!";
        header("Location: index.php");
        exit();
    } else {
        die("Something went wrong");
    }
}

?>
