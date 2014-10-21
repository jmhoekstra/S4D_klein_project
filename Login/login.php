<?php
        
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $login = $_POST['login'];
    $pass = md5($_POST['pass']);
    
    $connect = mysqli_connect("localhost", "root", "root", "Login") or die('geen database verbinding');
    
    $query = "SELECT pass FROM Login WHERE login='$login'";
    $result = mysqli_query($connect, $query)
    or die ('Gadver, niet gelukt');
    $row = mysqli_fetch_array($result);  

    
    $key = rand();
    
    setcookie("key", $key);
    setcookie("user", $login);
    
    $query = "UPDATE Login SET sleutel=$key WHERE login='$login'";
    $update = mysqli_query($connect, $query)
    or die(mysqli_error($connect));
    
    if ($row['pass'] == $pass){
        header ('Location: geheim.php');    
    } else {
        echo 'You suck!';
    }
?>