<?php 

// if $_POST['btn_create'] is set, add user to database
if (isset($_POST['btn_create'])) {
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
    $sql = "INSERT INTO members (id, name, pwd, receive_promo_email) VALUES ('$email', '$name', '$pwd', '$promo_email_yes')";
    
    if ($conn->query($sql)) {
        $message = "User successfully added.";
    } else {
        $message = "Error: " . $conn->error;
    }
    header("Location: ./user_list.php?created");
}
require_once '../includes/admin_header.php';
renderHeader('Create User');

if (isset($message)) {
    echo $message;
}
?>

<br>
<div class="row">
<form action="" name="create_user_form" method="post" class="form-horizontal col-sm-10 col-sm-offset-1">
    <!-- Name -->
    <div class="form-group">
        <label for="name" class="col-sm-2 col-sm-offset-1 control-label">Name</label>
        <div class="col-sm-6">
            <input type="text" name="name" class="form-control" required>
        </div>
    </div>
    
    <!-- Email -->
    <div class="form-group">
        <label for="email" class="col-sm-2 col-sm-offset-1 control-label">Email</label>
        <div class="col-sm-6">
            <input type="text" name="email" class="form-control" required>
        </div>
    </div>
    
    <!-- Password -->
    <div class="form-group">
        <label for="pwd" class="col-sm-2 col-sm-offset-1 control-label">Password</label>
        <div class="col-sm-4">
            <input type="password" name="pwd" class="form-control" required>
        </div>
    </div>
    
    <br>
    
    <!-- Promotional Emails Checkbox -->
    <div class="form-group">
        <label for="promo_email_yes" class="col-sm-2 col-sm-offset-1 control-label">Promotional emails</label>
        <div class="col-sm-1">
            <input type="checkbox" name="promo_email_yes" class="form-control" style="text-align: left">
        </div>
    </div>
   
    <br>
    
    <div class="col-sm-8 col-sm-offset-2">
        <button type="submit" name="btn_create" class="btn btn-primary btn-md btn-block">Create User</button>
    </div>
    
</form>
</div> <!-- end row -->

<?php include_once '../includes/admin_footer.php'; ?>
