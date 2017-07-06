<?php require_once './includes/header.php'; ?>

<h1 class="center page-title"> <?= $title; ?> </h1>

<!-- 'Become a Member' form -->
<div class="row">
<form action="./includes/validate.php" name="member_form" method="post" class="form-horizontal col-sm-10 col-sm-offset-1">
    <!-- Name -->
    <div class="form-group">
        <label for="name" class="col-sm-2 col-sm-offset-1 control-label">Name</label>
        <div class="col-sm-6">
            <input type="text" name="name" class="form-control" required
            value="<?php if((isset($_SESSION['valid'])) && ($_SESSION['valid'] == 'no')) {echo $_SESSION['name'];} ?>"       
            >
        </div>
    </div>
    
    <!-- Email -->
    <div class="form-group">
        <label for="email" class="col-sm-2 col-sm-offset-1 control-label">Email</label>
        <div class="col-sm-6">
            <input type="text" name="email" class="form-control" required
            value="<?php if((isset($_SESSION['valid'])) && ($_SESSION['valid'] == 'no')) {echo $_SESSION['email'];} ?>">
            <?php
            if ((isset($_SESSION['btn_submit'])) && ($_SESSION['email_error'] == "yes")) {
                echo "<span class='warning'>*Please enter a valid email address</span>";
            } ?>
        </div>
    </div>
    
    <!-- Password -->
    <div class="form-group">
        <label for="pwd" class="col-sm-2 col-sm-offset-1 control-label">Password</label>
        <div class="col-sm-4">
            <input type="password" name="pwd" class="form-control" required>
        </div>
    </div>
    <div class="form-group">
        <label for="pwd2" class="col-sm-2 col-sm-offset-1 control-label">Confirm Password</label>
        <div class="col-sm-4">
            <input type="password" name="pwd2" class="form-control" required>
            <?php
        if ((isset($_SESSION['btn_submit'])) && ($_SESSION['pwd_error'] == "yes")) {
                echo "<span class='warning'>*Passwords must match!</span>";
            } ?>
        </div>
        
    </div>
    
    <br>
    
    <!-- Promotional Emails Checkbox -->
    <div class="form-group center">
        <label for="promo_email_yes" class="col-sm-3 control-label">Yes, send me promotional emails please!</label>
        <div class="col-sm-1">
            <input type="checkbox" name="promo_email_yes" class="form-control">
        </div>
    </div>
   
    <br>
    <br>
    
    <div class="col-sm-6 col-sm-offset-3 col-xs-12">
        <button type="submit" name="btn_submit" class="btn btn-primary btn-lg btn-block center">Join</button>
    </div>
</form>
</div> <!-- end .row -->
<?php
    
?>


<?php require_once './includes/footer.php'; ?>
