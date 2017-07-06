<?php
//////////////////////////////////
//
// Generic MySQL connection script
//
//////////////////////////////////

function dbConnect() {
    $host = 'localhost';
    $user = 'root';
    $pwd = 'root';
    $db = 'human_fund';


    // create connection object
    $conn =  new mysqli($host, $user, $pwd, $db);
    if ($conn->connect_error) {
        exit($conn->connect_error);
    }
    return $conn;
}

