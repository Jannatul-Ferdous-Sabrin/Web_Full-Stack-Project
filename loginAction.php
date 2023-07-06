 
  <?php
session_start();
$username="Sabrin";
$pass="Sabb";
$input_username = $_POST['l_username'];
$input_pass = $_POST['l_pass'];

if($input_username == $username && $input_pass==$pass)
{
    $_SESSION['l_username']=$username;
    echo "<script> location.href = 'home.php' </script>";
}
else{
    echo "<script> alert ('Username and Password is not matching!!')</script>";
    echo "<script> location.href = 'login.php' </script>";
}
?> 





