<?php
$title = 'Dashboard';
include 'header.php';
session_start();



//htmlspecialchars()
     var_dump($_POST);

    if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
         $_username = $_POST['username'];
         $_email = $_POST['email'];
         $_password = $_POST['password'];

    }else {
        $_username = $_GET['username'];
        $_email = $_GET['email'];
        $_password = $_GET['password'];
    }

        $_SESSION['correctUsername'] = 'gute_Kartoffel';
        $_SESSION['correctEmail'] = 'natalieschoefecker@gmx.at';
        $_SESSION['correctPassword'] = '1234';

        if ($_SESSION['correctUsername']== $_username && $_SESSION['correctEmail'] == $_email && $_SESSION['correctPassword'] == $_password) {
            $_SESSION['username'] = $_username;
            header("Location: home.php");
            exit();

        }else {
            header("Location: login.php");
        }


?>

<div class = "process" >
<?php

//cho 'Vorname: '.$_firstname.' <br>';
//echo 'Nachname: '.$_lastname.'<br>';

echo 'Username: '.$_username.'<br>'; // wird nicht gespeichert
echo 'Username: '.$_SESSION['username'].'<br>';
echo 'Email: '.$_email.'<br>';
echo 'Email: '.$_SESSION['email'].'<br>';
echo 'Password: '.$_password.'<br>';
echo 'Password: '.$_SESSION['password'].'<br>';

    ?>

</div>

