<?php
session_start();
// delete current session, redirect to previous page
$previous_page = $_GET['page'];
session_unset();
session_destroy();
$_SESSION = array();
session_regenerate_id();
header("Location: ../$previous_page");
