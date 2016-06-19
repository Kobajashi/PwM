<?php
/**
 * Created by IntelliJ IDEA.
 * User: MrFibunacci
 * Date: 18.06.2016
 * Time: 10:16
 */
    require_once("user.php");

    $res = user::getInstance()->getUser($_POST['username']);

    var_dump($res);
    /*$username = $_POST['username'];
    $password = $_POST['password'];

    $db = server::getInstance()->connect();

    $sql = "SELECT * FROM user WHERE
                unsername='$username' AND
                pw='$password'
            LIMIT 1";

    $res = mysqli_query($db, $sql);
    $res = mysqli_fetch_array($res);

    if(isset($res)){
        session_start();
        $_SESSION['login'] = true;
        $_SESSION['user'] = $username;
    }

    header("location: http://localhost/PwM/src/php/");*/