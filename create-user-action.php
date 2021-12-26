<?php

require_once 'debug.php';
require_once 'db_connect.php';

require 'header.php';


if (empty($_POST['user']) || empty($_POST['password'])) die('Needs a user');

$user = $_POST['user'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT, $options = ['cost' => 12]);

$db = new DB;

$sth = $db->pdo->prepare('INSERT INTO users (username, password)
					  VALUES (:user, :password)');

$sth->bindValue(':user', $user, PDO::PARAM_STR);
$sth->bindValue(':password', $password, PDO::PARAM_STR);

if ($sth->execute()) {
	echo "Added user";

}
else {
	echo "Failed to add user.";
}

require 'footer.php';