<?php
/**
 * Created by IntelliJ IDEA.
 * User: MrFibunnacci
 * Date: 19.06.2016
 * Time: 15:08
 */

session_start();
session_destroy();
header("location: /");