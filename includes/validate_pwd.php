<?php
if ($_POST['pwd'] !== $_POST['pwd2']) {
    echo "<span class='warning'>*Passwords must match!</span>";
    $_SESSION['pwd_error'] = "yes";
} else {
    $_SESSION['pwd_error'] = "no";
}
