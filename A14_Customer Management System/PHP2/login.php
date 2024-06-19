<?php
global $conn;
$title = 'PHP2';
include_once 'PDO_Connection.php';
include 'header.php';
  session_start();
  if (!isSet($_SESSION["username"])) {

?>
      <div class="container mt-5">
          <a id="contact" class="d-block"></a>
          <h2 class="mb-4">Login</h2>
          <form method="POST" action="process.php">
              <div class="form-group">
                  <label for="email">Emailadresse:</label>
                  <input type="email" class="form-control" id="email" name="email" required>
              </div>
              <div class="form-group">
                  <label for="password">Passwort:</label>
                  <input type="password" class="form-control" id="password" name="password" required>
              </div>
              <button type="submit" class="btn btn-primary">Absenden</button>
          </form>



          <?php
          if (isset($_SESSION['message'])) {
          echo $_SESSION['message'];
          unset($_SESSION['message']);
          }
          ?>
      </div>


<?php
include 'footer.php';
  } else{
     header("Location: home.php") ;
  }
?>


<?php

?>