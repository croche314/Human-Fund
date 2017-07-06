<?php 
if (!isset($_SESSION)) {
    session_start(); 
}
?>
<!doctype html>
<html>

<head>

    <meta charset="UTF-8">

    <?php include './includes/title.php'; ?>
    <title>The Human Fund | <?= $title ?> </title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="img/human.png">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">

    <!-- Custom Styles -->
    <link href="css/main.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Walter+Turncoat' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Architects+Daughter' rel='stylesheet' type='text/css'>

	
</head>

<body>

<!-- jQuery -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Bootstrap js -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<div class="container-fluid">

<!-- Row 1: Header -->
    <div class="row header">
        <header>
            <div class="col-sm-1 col-xs-1 hidden-xs">
                <img src="img/human.png" alt="logo" >
            </div>
            <div class="col-sm-3 col-xs-5 hidden-xs">
                <h1>The Human Fund</h1>
                <p><i>"For Humanity..."</i></p>
            </div>
        </header>

        <div class="top-nav col-sm-8 col-xs-12 hidden-xs">
            <nav>
                <ul>
                    <a href="index.php" <?php if ($title == "Home") { echo "class='current-link'"; } ?> ><li>Home</li></a>
                    <a href="donate.php" <?php if ($title == "Donate") { echo "class='current-link'"; } ?>><li>Donate</li></a>
                    <a href="initiatives.php" <?php if ($title == "Initiatives") { echo "class='current-link'"; } ?>><li>Initiatives</li></a>
                    <a href="become_a_member.php" <?php if ($title == "Become A Member") { echo "class='current-link'"; } ?>><li>Volunteer</li></a>
                    <?php 
                        if (isset($_SESSION['current_user'])) { 
                            $page = basename($_SERVER['PHP_SELF']);
                    ?>
                    <li class="current_user"><?= $_SESSION['current_user']; ?></li>
                    <a href='./includes/member_logout.php?page=<?= $page; ?>'><li>Logout</li></a>
                    <?php } else { ?>
                    <a href='member_login.php' <?php if ($title == "Member Login") { echo "class='current-link'"; } ?>><li>Member Login</li></a>
                    <?php } // end if(isset($_SESSION) ?>
                </ul>
            </nav>
        </div>

        <!-- Mobile Navigation -->
        <!-- Appears only when screen size is 'xs' -->
        <nav class="navbar navbar-default col-xs-12 visible-xs" role="navigation">
        
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">
                    <img src="img/human.png" alt="logo">
                    <h1>Human Fund</h1>
                </a>
            </div> <!-- end .navbar-header -->

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="donate.php">Donate</a>
                    </li>
                    <li>
                        <a href="initiatives.php">Initiatives</a>
                    </li>
                    <li>
                        <a href="become_a_member.php">Volunteer</a>
                    </li>
                    <li>
                        <a href="member_login.php">Member Login</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
          <!-- /.container-fluid -->
        </nav> <!-- end Mobile Navigation -->
    </div> <!-- End Row 1 -->

<div class="main-content">
           <!-- <pre>
            <?php
           /* if(isset($_SESSION)){
                foreach ($_SESSION as $key => $value) {
                   echo $key . "  =>  " . $value . "<br>";                          
                }
                echo "session_status: " . session_status() . "<br>";
                echo "session_id: " . session_id() . "<br>";
                echo SID . "<br>";
            }
            
                
                foreach ($_COOKIE as $key => $value) {
                   echo $key . "  =>  " . $value . "<br>";                          
                }
            */
            ?>
            </pre> -->