<?php
/**
 * Created by IntelliJ IDEA.
 * User: Marco
 * Date: 19.06.2016
 * Time: 21:39
 */
    require_once("user.php");

    $user = new user();

    if($user->setUser($_POST['username'], $_POST['password'])){
        echo "User successful created<br>back to main page in 5 sec.";
        sleep(5);
        header("location: http://localhost/PwM/src/php/");
    } else {
        echo "User already exists<br>back to create user in 5 sec.";
        sleep(5);
        header("location: http://localhost/PwM/src/layout/newUser.html");
    }

