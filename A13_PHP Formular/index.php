<?php
$title = 'Dashboard';
include 'header.php';

session_start();
if (!isSet($_SESSION["username"])) {

    ?>
    <div class="container">
        <a id="contact" class="sprung"></a>
        <h2>Login</h2>
        <form method="POST" action="process.php">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">Emailadresse:</label>
                <input type="email" id="email" name="email" required>
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
} else{
    header("Location: home.php") ;
}
?>


<?php

?>