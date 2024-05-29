<?php
session_start();
$title = 'Dashboard';
include 'header.php';
if (isSet($_SESSION['username'])) {


?>
<div class="container">
    <h2>Guten Tag <?php echo $_SESSION['username'] ?></h2>

    <section class="content">
        <img src="content.gif">
    </section>

    <form action="logout.php" method="post">

        <button type="submit" class="button">LOGOUT</button>

    </form>
</div>

<?php
include 'footer.php';
}else {
    header('Location: login.php');
}
?>



