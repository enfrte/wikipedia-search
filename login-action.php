<?php

require_once 'debug.php';
require_once 'db_connect.php';

require 'header.php';

if (empty($_POST['user']) || empty($_POST['password'])) die('Needs a user');

$user = $_POST['user'];
$password = $_POST['password'];

$db = new DB;
$sth = $db->pdo->prepare('SELECT * FROM users
						  WHERE username = :user');

$sth->bindValue(':user', $user, PDO::PARAM_STR);

if (!$sth->execute()) die('Failed to query the users');

$result = $sth->fetch();
//var_dump($result);

$hash = $result['password'];

if (!password_verify($password, $hash)) {
    die('Invalid password.');
}

echo 'Password is valid! Send the user to the app.';

require 'footer.php';