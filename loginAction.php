<?php

if (isset($_POST['login'])) {
    include 'config.php';
    $input_username = $_POST['l_username'];
    $input_pass = $_POST['l_pass'];

    echo "1";

    $authCheck = mysqli_query($conn, "SELECT * FROM `register` 
        WHERE db_username = '$input_username' And db_password = '$input_pass'");
echo "2";
    if (mysqli_num_rows($authCheck) > 0) {
        echo "3";
        session_start();
        echo "4";
        $_SESSION['db_username'] = $input_username;
        echo "<script>location.href='product.php'</script>";
    } else {
        echo "<script>alert('Invalid Username & Password')</script>";
        echo "<script> location.href = 'login.php' </script>";
    }
}

?>