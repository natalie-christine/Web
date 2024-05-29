<?php
session_start();
echo $_SESSION ['username']; echo "<br>";
echo $_SESSION ['password']; echo "<br>";
echo $_SESSION ['email']; echo "<br>";


session_destroy();