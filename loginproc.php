<?php

// Inialize session
session_start();

// Include database connection settings
include('config.inc');

// Retrieve username and password from database according to user's input

$login = mysql_query("SELECT * FROM user WHERE (username = '" . mysql_real_escape_string($_POST['username']) . "') and (password = '" . mysql_real_escape_string(md5($_POST['password'])) . "')");

// Check username and password match
echo $login;
if (mysql_num_rows($login) == 1) {
// Set username session variable
echo "i love india";
$_SESSION['username'] = $_POST['username'];
// Jump to secured page
header('Location: main.html');
}
else {

echo "Password not correct Or User does not exist";
header('Location: index.html');
}

?>