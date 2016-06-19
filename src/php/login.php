<?php
/**
 * Created by IntelliJ IDEA.
 * User: MrFibunacci
 * Date: 18.06.2016
 * Time: 10:16
 */
    require_once("user.php");
    require_once("AES/AESclass.php");

    $aes = new AES(server::getInstance()->getAESKey());

    $res = user::getInstance()->getUser($_POST['username'], $aes->encrypt($_POST['password']));

    if(isset($res)){
        session_start();
        $_SESSION['login'] = true;
        $_SESSION['user'] = $_POST['username'];
        $_SESSION['userID'] = $res['id'];
    }

    header("location: http://localhost/PwM/src/php/");