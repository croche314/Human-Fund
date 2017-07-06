<?php

$host = 'localhost';
$user = 'root';
$pwd = 'root';
$db = 'human_fund';
$sql = 'SELECT * FROM members ORDER BY name';

// create connection object
$conn =  new mysqli($host, $user, $pwd, $db);
if ($conn->connect_error) {
    exit($conn->connect_error);
}

// store MYSQLi_Result object in $result
$result = $conn->query($sql);
// if query fails, create and store error message
if (!$result) {
    $error = $conn->error;
// if query succeeds, store the number of rows in $numRows
} else {
    $numRows = $result->num_rows;
}
?>

    <?php 
    require_once '../includes/admin_header.php'; 
    renderHeader('Human Fund Members');
    ?>
    
    <?php
    // if an action has been completed, display correct message
    if (isset($_GET['created'])) {
        echo "<h3 class='center'><span class='label label-default'>User successfully created</span></h3>";
    }
    if (isset($_GET['updated'])) {
        echo "<h3 class='center'><span class='label label-default'>User successfully updated</span></h3>";
    }
    if (isset($_GET['deleted'])) {
        echo "<h3 class='center'><span class='label label-default'>User successfully deleted</span></h3>";
    }
    ?>

    <!-- display query result in an HTML table -->
    <div class="row">
    <div class="col-sm-10 col-sm-offset-1">
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>id(email)</th>
                <th>name</th>
                <th>password</th>
                <th>receive promo emails?</th>
                <th></th>
                <th></th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['name']; ?></td>
                <td><?= $row['pwd']; ?></td>
                <td><?= $row['receive_promo_email']; ?></td>
                <td><a href="update_user.php?id=<?= $row['id'] ?>">Update</a></td>
                <td><a href="delete_user.php?id=<?= $row['id'] ?>">Delete</a></td>
            </tr>
            <?php } ?>
        </table>
    </div>
    </div> <!-- .row --> 
    <?php
    if (isset($error)) {
            echo "<p>$error</p>";
        } else {
            echo "<p>$numRows records were found.</p>";
        }
    ?>
<?php include_once '../includes/admin_footer.php'; ?>