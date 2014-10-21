<?php
    $connect = mysqli_connect("localhost", "root", "root", "Login") or die('geen database verbinding');
    
    if (isset($_COOKIE['user'])) {
        $user = $_COOKIE['user'];  
        $sleutel = $_COOKIE['key'];
    } else {
        header('Location: index.php');
    }
    
    $query = "SELECT sleutel FROM Login WHERE login='$user'";
    $result = mysqli_query($connect, $query)
    or die(mysqli_error($connect));
    $row = mysqli_fetch_array($result);    
    if ($row['sleutel'] != $sleutel) {
        echo 'He, Druif!, ga is inloggen joh!<br>';
        echo '<a href="index.php">Hoppla</a>';
    }

?>