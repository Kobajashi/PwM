<?php
/**
 * Created by IntelliJ IDEA.
 * User: MrFibunnacci
 * Date: 19.06.2016
 * Time: 15:08
 */

    session_start();
    $_SESSION['login']  = false;
    $_SESSION['user']   = null;
    $_SESSION['userID'] = null;

    header("location: http://localhost/PwM/src/php/");