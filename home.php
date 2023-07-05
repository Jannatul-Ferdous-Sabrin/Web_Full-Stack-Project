<?php
    session_start();
    if(isset($_SESSION['l_username']))
    {
        echo "<h1> Welcome " .$_SESSION ['l_username']. " to Home page! <h1><br>";
        echo "<br><a href='logout.php'><input type='button' value='logout' name='logout'></a>";
    }
    else{
        echo "<script> location.href = alert('Do not access from url,Please Log In First')</script>";
        echo "<script> location.href = 'login.php' </script>";
    }
?>