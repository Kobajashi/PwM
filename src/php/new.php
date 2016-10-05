<?php
/**
 * Created by IntelliJ IDEA.
 * User: MrFibunacci
 * Date: 17.06.2016
 * Time: 19:50
 */
require_once("server.php");

$server = new server();

session_start();
$server->setDataFrom(
	'pws',
	[
		"userId"          => $_SESSION['userID'],
		"nameOfPlattform" => $_POST['nameOfPlattform'],
		"username"        => $_POST['username'],
		"pw"              => $_POST['pw'],
		"email"           => $_POST['email'],
		"name"            => $_POST['name'],
	]
);

header("location: /");