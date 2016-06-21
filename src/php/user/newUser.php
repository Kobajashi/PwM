<?php
/**
 * Created by IntelliJ IDEA.
 * User: Marco
 * Date: 19.06.2016
 * Time: 21:39
 */
    require_once("user.php");

    $user = new user();

    $setUser_Result = $user->setUser($_POST['username'], $_POST['password']);

    if($setUser_Result == true){
        echo "User successful created<br>back to main page in 5 sec.";
        sleep(5);
        header("location: http://localhost/PwM/src/php/");
    } elseif($setUser_Result == "403"){
        echo "You are not alowed to create user<br>back to main page in 5 sec.";
        sleep(5);
        header("location: http://localhost/PwM/src/php/");
    } elseif($setUser_Result == false) {
        echo "User already exists<br>back to create user in 5 sec.";
        sleep(5);
        header("location: http://localhost/PwM/src/layout/newUser.html");
    }

