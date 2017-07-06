<?php 
function renderHeader($title) { ?>
    <!doctype html>
    <html>
    <head>
        <title><?= $title ?></title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/bootstrap-theme.css" rel="stylesheet">
        <style>
            .center {
                text-align: center;
            }
            .warning {
                color: red;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <!-- jQuery -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Bootstrap js -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <div class="container-fluid">

        <h1 class="center"><?= $title ?></h1>
        
        <p class="center">
            <a href="user_list.php" class="btn btn-md btn-default">Members List</a>
            <a href="create_user.php" class="btn btn-md btn-default">Create new user</a>
            <a href="../index.php" class="btn btn-md btn-default">HumanFund.org</a>
        </p>
     
<?php } ?>
