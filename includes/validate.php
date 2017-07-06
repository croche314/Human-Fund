<?php
session_start();
// turn all $_POST variables into $_SESSION variables
foreach ($_POST as $key => $value) {
    $_SESSION[$key] = $value;
}
//echo "<pre>";
//print_r($_SESSION);

// validate email
$valid_email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
if ($valid_email == false) {
    $_SESSION['email_error'] = "yes";
} else {
    $_SESSION['email_error'] = "no";
}

// validate password
if ($_SESSION['pwd'] !== $_SESSION['pwd2']) {
    $_SESSION['pwd_error'] = "yes";
} else {
    $_SESSION['pwd_error'] = "no";
}

//  If the form is OK, add user to database and redirect to welcome page (new_member.php)
if (($_SESSION['email_error'] == 'no') && ($_SESSION['pwd_error'] == 'no')) {
    $_SESSION['valid'] = 'yes';
    
    $host = 'localhost';
    $user = 'root';
    $pass = 'root';
    $db = 'human_fund';
    
    // turn $_SESSION values into more concise variables
    foreach ($_SESSION as $key => $value) {
        ${$key} = $value;
    }
    if (isset($_SESSION['promo_email_yes'])) {
        $promo_email_yes = 1;
    } else {
        $promo_email_yes = 0;
    }
    
    // create connection object
    $conn =  new mysqli($host, $user, $pass, $db);
    if ($conn->connect_error) {
        exit($conn->connect_error);
    }
    
    $sql = "INSERT INTO members (id, name, pwd, receive_promo_email) VALUES ('$email', '$name', '$pwd', '$promo_email_yes')";
    
    if ($conn->query($sql)) {
        $message = "User successfully added.";
        $_SESSION['current_user'] = $email;
        header('Location: ../new_member.php');
    } else {
        $message = "Error: " . $conn->error;
    }
    
    
// If the form contained errors, go back to become_a_member.php
} else {
    $_SESSION['valid'] = 'no';
    header('Location: ../become_a_member.php');
}

?>