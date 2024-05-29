<?php
$title = 'Dashboard';
include 'header.php';
?>

<div class="container">
    <a id="contact" class="sprung"></a>
    <h2>Registrierung</h2>
    <form method="POST" action="process.php">
        <div class="form-group anrede">
            <label for="anrede" >Anrede:</label>
            <div>
                <input type="radio" id="herr" name="anrede" value="Herr">
                <label for="herr">Herr</label>
            </div>
            <div>
                <input type="radio" id="frau" name="anrede" value="Frau">
                <label for="frau">Frau</label>
            </div>
        </div>
        <div class="formular">
            <label for="vorname">Vorname:</label>
            <input type="text" id="vorname" name="vorname" required>
        </div>
        <div class="form-group">
            <label for="nachname">Nachname:</label>
            <input type="text" id="nachname" name="nachname" required>
        </div>
        <div class="form-group">
            <label for="telefon">Telefonnummer:</label>
            <input type="tel" id="telefon" name="telefon">
        </div>
        <div class="form-group">
            <label for="email">Emailadresse:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="firma">Geschäftlich</label>
            <input type="checkbox" />
            <label for="firma">Privat</label>
            <input type="checkbox" />

        </div>
        <div class="form-group">
            <label for="firma">Firma:</label>
            <input type="text" id="firma" name="firma">
        </div>
        <div class="form-group">
            <label for="betreff">Betreff:</label>
            <input type="text" id="betreff" name="betreff">
        </div>
        <div class="form-group">
            <label for="nachricht">Nachricht:</label>
            <textarea id="nachricht" name="nachricht"></textarea>
        </div>
    </form>
</div>
<div class="container">

    <h2>User erstellen:</h2>
    <form action="login.php" method="POST">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Passwort:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="password">Passwort:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit" class="button">Absenden</button>

    </form>
</div>

<?php
include 'footer.php';
?>


<?php

$number = 3;
$string = "Hello your favorite number is $number";
echo $string . "<br>";
var_dump($number);


?>
