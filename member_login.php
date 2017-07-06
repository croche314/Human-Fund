<?php
// if btn_login is set, verify id/password match
if (isset($_POST['btn_login'])) {
    $host = 'localhost';
    $user = 'root';
    $pwd = 'root';
    $db = 'human_fund';
    $sql = "SELECT * FROM members WHERE id='" . $_POST['email'] . "'";
    // create connection object
    $conn =  new mysqli($host, $user, $pwd, $db);
    if ($conn->connect_error) {
        exit($conn->connect_error);
    }
    // store MYSQLi_Result object in $result
    $result = $conn->query($sql);
    // if query fails, create and store error message
    if ($result == false) {
        $error = "invalid_login";
        header("Location: ./member_login.php?fail&error=$error");
    // if query succeeds, compare db values with $_POST values
    } else {
        $user = $result->fetch_assoc();
        if ($user['id'] == $_POST['email'] && $user['pwd'] == $_POST['pwd']) {
            $id = $user['id'];
            header("Location: ./member_login.php?success&id=$id");
        } else {
            $error = "no_match";
            header("Location: ./member_login.php?fail&error=$error");
        }
    }
}

// if login failed, display message
if (isset($_GET['fail'])) {
    $error = $_GET['error'];
}
// if login succeeded, redirect to homepage
if (isset($_GET['success'])) {
    if (isset($_SESSION)) {
        session_unset();
        session_destroy();
        $_SESSION = array();
    }
    $id = $_GET['id'];
    header("Location: index.php?id=$id");
}
?>
<?php require_once './includes/header.php'; ?>

<h1 class="center page-title"> <?= $title; ?> </h1>

<p class="center warning">
<?php 
if (isset($error)) {
    if ($error == "no_match") {
        $message = "Email / password combination not found.";
    } else if ($error == "invalid_login") {
        $message = "User not found.";
    } else {
        $message = "Invalid Login ID and/or password.";
    }
    echo $message;
} 
?>
</p>

<!-- 'Member Login' form -->
<div class="row">
<form action="" method="post" class="form-horizontal col-sm-10 col-sm-offset-1">
    <!-- Email (id) -->
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
    
    <div class="col-sm-6 col-sm-offset-3 col-xs-12">
        <button type="submit" name="btn_login" class="btn btn-primary btn-lg btn-block center">Login</button>
    </div>
</form>
</div> <!-- end .row -->

<?php require_once './includes/footer.php'; ?>

