<?php
// if page is being accessed manually, redirect
if (!$_GET && !$_POST) {
    header('Location: ./user_list.php');
}

// if $_POST is set, delete record or just redirect
if ($_POST) {
    if (isset($_POST['btn_no'])) {
        header('Location: ./user_list.php');
    }
    if (isset($_POST['btn_yes'])) {
        $host = 'localhost';
        $user = 'root';
        $pass = 'root';
        $db = 'human_fund';
        $id = $_POST['id'];

        // create connection object
        $conn =  new mysqli($host, $user, $pass, $db);
        if ($conn->connect_error) {
            exit($conn->connect_error);
        }

        // prepare sql
        $sql = "DELETE FROM members WHERE id='$id'";
        
        $result = $conn->query($sql);
        
        if (!$result) {
            $error = $conn->error;
            echo "Error:" . $error;
        } else {
            header('Location: ./user_list.php?deleted');
        }
    }
}

// if $_GET['id'] is set, confirm deletion
if ($_GET['id']) {
    require_once '../includes/admin_header.php';
    renderHeader("Confirm");
?>    
<br>
<br>

<h3 class="center"><span class="label label-default"><?= $_GET['id']; ?></span></h3>
<br><br><br>

<p class='center warning'>Are you sure you want to delete this user?&nbsp;&nbsp;This action cannot be undone.</p>

<div class="row">
    <div class="col-sm-4 col-sm-offset-4">
    <form action="" method="post" name="form_delete">
        <br><br>
        <p>
            <button type="submit" name="btn_yes" class="btn btn-block btn-danger">Yes, delete it already</button>
            <button type="submit" name="btn_no" class="btn btn-block btn-primary">No, I changed my mind</button>
        </p>
    </div>

    <!-- store id in hidden field so it can POST with form -->
    <input type="hidden" name="id" value="<?= $_GET['id']; ?>">

    </form>
</div>

<?php 
include_once '../includes/admin_footer.php';
} // end if $_GET['id']

?>

