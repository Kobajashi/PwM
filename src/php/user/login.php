<?php
/**
 * Created by IntelliJ IDEA.
 * User: MrFibunacci
 * Date: 18.06.2016
 * Time: 10:16
 */
    require_once("user.php");
    require_once("../AES/AESclass.php");

    $server     = new server();
    $aes        = new AES($server->getAESKey());
    $user       = new user();

    $res = $user->getUser($_POST['username'], crypt(md5($_POST['password']), $server->getSalt()));

    if(isset($res)){
        session_start();
        $_SESSION['login'] = true;
        $_SESSION['user'] = $_POST['username'];
        $_SESSION['userID'] = $res['id'];
    }

    header("location: /");