<?php
include '../db/mysql.php';
if (session_status() === PHP_SESSION_NONE) session_start();
session_unset();

// check user input
if (!$_POST['name'] && !$_POST['password']) {
    $_SESSION['error'] = "Login Failed";
    header('Location: /profiles.php');
}
// connect to db
$mysql = new mysql(
  'localhost',
  'ph',
  'TnEOeUJ3pGcKqF^JBP76'
);
$mysql -> connect();

if (!$mysql -> isConnect()) {
  die("Connection failed: " . $conn->connect_error);
  $_SESSION['error'] = "Server Error";
  header('Location: /profiles.php');
}

// set up the query statement
$sql = 'SELECT * FROM ph.users WHERE name=\''
  . $_POST['name']
  . '\' and password=\''
  .$_POST['password'].'\';';

// execute query
$result = $mysql -> query($sql);

// check query search result
if (!$result) {
    $_SESSION['error'] = "Login Failed";
    header('Location: /profiles.php');
}

$mysql -> close();

$_SESSION['user'] = $result;
header('Location: /profiles.php');
?>
