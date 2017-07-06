<?php
// if page is being accessed manually, redirect
if (!$_GET && !$_POST) {
    header('Location: ./user_list.php');
}

// if $_POST['btn_update'] is set, update db record using $_POST values
if (isset($_POST['btn_update'])) {
    // turn $_POST values into more concise variables
    foreach ($_POST as $key => $value) {
        ${$key} = $value;
    }
    if (isset($_POST['promo_email_yes'])) {
        $promo_email_yes = 1;
    } else {
        $promo_email_yes = 0;
    }
    
    $host = 'localhost';
    $user = 'root';
    $pass = 'root';
    $db = 'human_fund';
    // create connection object
    $conn =  new mysqli($host, $user, $pass, $db);
    if ($conn->connect_error) {
        exit($conn->connect_error);
    }
    
    // prepare SQL string
    $sql = "UPDATE members SET id='$email', name='$name', pwd='$pwd', receive_promo_email='$promo_email_yes' WHERE id='$id'";
    
    // execute SQL query and redirect
    if ($conn->query($sql)) {
        $message = "User successfully updated.";
        header("Location: ./user_list.php?updated");
    } else {
        $message = "Error: " . $conn->error;
        echo $error;
    }
    
} // end if $_POST['btn_update']

// if $_GET['id]' is set, display user info in form
if (isset($_GET['id'])) {
    $host = 'localhost';
    $user = 'root';
    $pass = 'root';
    $db = 'human_fund';
    
    // create connection object
    $conn =  new mysqli($host, $user, $pass, $db);
    if ($conn->connect_error) {
        exit($conn->connect_error);
    }
    
    // retrieve user's info from db, store in $user[]
    $sql = "SELECT id, name, pwd, receive_promo_email FROM members WHERE id = '" . $_GET['id'] ."'";
    
    $result = $conn->query($sql);
    
    if (!$result) {
        $error = $conn->error;
    } else {
        $user = $result->fetch_assoc();
    }
} // end if $_GET['id]'

// display page
require_once '../includes/admin_header.php';
renderHeader("Update User");

if (isset($message)) {
    echo $message;
}
?>

<h3 class="center"><span class="label label-default"><?= $_GET['id']; ?></span></h3>

<br>
<div class="row">
<form action="" name="update_user_form" method="post" class="form-horizontal col-sm-10 col-sm-offset-1">
    <!-- Name -->
    <div class="form-group">
        <label for="name" class="col-sm-2 col-sm-offset-1 control-label">Name</label>
        <div class="col-sm-6">
            <input type="text" name="name" class="form-control" required
                   value="<?= htmlentities($user['name']); ?>">
        </div>
    </div>
    
    <!-- Email -->
    <div class="form-group">
        <label for="email" class="col-sm-2 col-sm-offset-1 control-label">Email</label>
        <div class="col-sm-6">
            <input type="text" name="email" class="form-control" required
                   value="<?= htmlentities($user['id']); ?>">
        </div>
    </div>
    
    <!-- Password -->
    <div class="form-group">
        <label for="pwd" class="col-sm-2 col-sm-offset-1 control-label">Password</label>
        <div class="col-sm-4">
            <input type="text" name="pwd" class="form-control" required
                   value="<?=htmlentities($user['pwd']); ?>">
        </div>
    </div>
    
    <br>
    
    <!-- Promotional Emails Checkbox -->
    <div class="form-group center">
        <label for="promo_email_yes" class="col-sm-2 col-sm-offset-1 control-label">Promotional emails</label>
        <div class="col-sm-1">
            <input type="checkbox" name="promo_email_yes" class="form-control" style="text-align: left"
                   <?php 
                   if ($user['receive_promo_email'] == true) {
                       echo " checked";
                   } else if ($user['receive_promo_email'] == false) { 
                       echo "unchecked";
                   }
                   ?>>
        </div>
    </div>
   
    <br>
    
    <div class="col-sm-8 col-sm-offset-2">
        <button type="submit" name="btn_update" class="btn btn-primary btn-md btn-block">Update User</button>
    </div>
    
    <!-- Post id(email) with the form so the correct record can be still be selected if the id has been changed -->
    <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
</form>
</div> <!-- end row -->
<?php include_once '../includes/admin_footer.php'; ?>
