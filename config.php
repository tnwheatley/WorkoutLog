<?php // login.php

/* Database credentials. */
define('hn', 'localhost');
define('un', 'username');
define('pw', 'password');
define('db', 'database');

/* Attempt to connect to MySQL database */
$mysqli = new mysqli(hn, un, pw, db);

// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

//   $connection = new mysqli(hn, un, pw, db);
//        if ($connection->connect_error)
//                die("ERROR: Could not connect. " . $connection->connect_error);
?>
