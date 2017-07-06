<?php 
session_start();
require_once './includes/header.php'; 
if (isset($_SESSION['name'])) {
    $full_name = explode(" ", $_SESSION['name']);
    $first_name = ucfirst($full_name[0]);
}
?>

<h1 class="center">Welcome <?= $first_name ?>!</h1>
<p class="center">You should receive an email confirmation shortly at <b>
    <?php echo $_SESSION['email']; ?> </b></p>

<!--<p>
    Name: <?= $_SESSION['name']; ?>
    <br>
    Email: <?= $_SESSION['email']; ?>
    <br>
    Password1: <?= $_SESSION['pwd']; ?>
    <br>
    Password2: <?= $_SESSION['pwd2']; ?>
    <br>
    Receive promo emails?: <?= $_SESSION['promo_email_yes']; ?>
</p>-->

<div class="center">
        <a class="btn btn-primary btn-lg" href="index.php">Home Page</a>
</div>


<?php require_once './includes/footer.php';

