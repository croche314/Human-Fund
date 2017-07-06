<?php
$valid_email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
if ($valid_email == false) {
    echo "<span class='warning'>*Please enter a valid email address</span>";
    $_SESSION['email_error'] = "yes";
} else {
    $_SESSION['email_error'] = "no";
}
