<?php
global $conn;
$title = 'PHP2';
include 'header.php';
include_once 'PDO_Connection.php';
session_start();

     var_dump($_POST);

    if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
        // $_username = $_POST['username'];
         $_email = $_POST['email'];
         $_password = $_POST['password'];

    }else {
     //   $_username = $_GET['username'];
        $_email = $_GET['email'];
        $_password = $_GET['password'];
    }

try {
    $stmt = $conn->prepare("SELECT * FROM `users` WHERE `email` = ?");
    $stmt->execute([$_email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        if (password_verify($_password, $user['password'])) {

            $_SESSION['username'] = $user['user_name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['user_ID'] = $user['user_ID'];


            header('Location: home.php');
            exit();
        } else {
            $_SESSION['message'] = "Falsche Eingabe";
        }
    } else {
        $_SESSION['message'] = "Benutzer mit dieser E-Mail-Adresse existiert nicht.";
    }
} catch (PDOException $e) {
    echo "Datenbankfehler: " . $e->getMessage();
}
?>




