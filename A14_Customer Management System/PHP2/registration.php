<?php
session_start();
$title = 'PHP2';
include 'header.php';
?>


<div class="container mt-5">
    <h2>Registrierung</h2>
    <a id="contact" class="sprung"></a>
    <form action="registration-process.php" method="POST">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="email">Emailadresse:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Passwort:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="form-group">
            <label for="password-confirm">Passwort bestätigen:</label>
            <input type="password" class="form-control" id="password-confirm" name="password-confirm" required>
        </div>
        <button type="submit" class="btn btn-primary">Absenden</button>
    </form>
    <?php
    if (isset($_SESSION['message'])) {
        echo '<div class="alert alert-warning mt-3">'.htmlspecialchars($_SESSION['message']).'</div>';
        unset($_SESSION['message']);
    }
    ?>
</div>


<?php
include 'footer.php';
?>



