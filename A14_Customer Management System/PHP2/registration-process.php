<?php
session_start();
global $conn;
$title = 'Registration';
include_once 'PDO_Connection.php';
include 'header.php';


$_username = $_POST['username'];
$_email = $_POST['email'];
$_password = $_POST['password'];
$_verify = $_POST['password-confirm'];

if (empty($_username) || empty($_email) || empty($_password) || empty($_verify)) {
    $_SESSION['message'] = 'Bitte alle Felder ausfüllen.';
    header("Location: registration.php");
    exit();
}

// Prüfen ob Passwörter übereinstimmen
if ($_password !== $_verify) {
    $_SESSION['message'] = 'Passwörter stimmen nicht überein.';
    header("Location: registration.php");
    exit();
}

// Prüfen ob E-Mail bereits existiert
try {
    $stmt = $conn->prepare("SELECT COUNT(*) FROM `users` WHERE `email` = ?");
    $stmt->execute([$_email]);
    $emailExists = $stmt->fetchColumn();

    if ($emailExists) {
        $_SESSION['message'] = 'Diese E-Mail-Adresse ist bereits registriert.';
        header("Location: registration.php");
        exit();
    } else {
        // Benutzer registrieren
        $stmt = $conn->prepare("INSERT INTO `users`(`user_name`, `email`, `password`) VALUES (?, ?, ?)");
        $stmt->execute([$_username, $_email, password_hash($_password, PASSWORD_DEFAULT)]);
        $_SESSION['message'] = "Registrierung erfolgreich. Bitte loggen Sie sich ein.";
        header("Location: login.php");
        exit();
    }
} catch (PDOException $e) {
    $_SESSION['message'] = 'Datenbankfehler: ' . $e->getMessage();
    header("Location: registration.php");
    exit();
}
?>
