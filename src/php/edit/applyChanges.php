<?php
/**
 * Created by IntelliJ IDEA.
 * User: MrFibunacci
 * Date: 22.06.2016
 * Time: 20:34
 */
require_once("../server.php");
require_once("../AES/AESclass.php");

$server = new server;
$aes = new AES($server->getAESKey());

session_start();

$sql = "UPDATE `pws` SET ";

$c = 0;
$total = count($_POST);
foreach($_POST as $key => $value)
{
	$c++;
	if($key == "pw")
	{
		$sql .= " `" . $key . "`='" . $aes->encrypt($value) . "' ";
		if($c != $total)
			$sql .= ', ';
	}
	else if($key != 'id')
	{
		$sql .= " `" . $key . "`='" . $value . "' ";
		if($c != $total)
			$sql .= ', ';
	}
}

$sql .= " WHERE `id`=" . $_POST['id'];
$db = $server->connect();
mysqli_query($db, $sql);
//mysqli_query($db, $sql);

header("Location: /");