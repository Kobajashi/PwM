<?php
/**
 * Created by IntelliJ IDEA.
 * User: Marco
 * Date: 19.06.2016
 * Time: 21:39
 */
    require_once("user.php");

    user::getInstance()->createUser($_POST['username'], $_POST['password']);