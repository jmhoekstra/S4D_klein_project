<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $connect = mysqli_connect("localhost", "root", "root", "Login") or die('geen database verbinding');
    
    $login = $_POST['login'];
    $pass = md5($_POST['pass']);
    
    $query = "INSERT INTO Login (login, pass) VALUES ('$login', '$pass')";
    $result = mysqli_query($connect, $query)
    or die ('Ja, shit man, niet gelukt');
    
    header('Location: index.php');

?>