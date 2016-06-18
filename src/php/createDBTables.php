<?php
/**
 * Created by IntelliJ IDEA.
 * User: MrFibunacci
 * Date: 15.06.2016
 * Time: 18:23
 */
    require_once("server.php");

class createDBTables{
    private static $instance = null;

    public static function getInstance(){
        if(!self::$instance){
            self::$instance = new self();
        }
        return self::$instance;
    }

    function build(){
        // you need to create the DB called "PwM"
        $db = server::getInstance()->connect();

        $sql = "CREATE TABLE IF NOT EXISTS `cont` (
      `id` int(11) NOT NULL,
      `nameOfPlattform` varchar(64) NOT NULL,
      `username` varchar(64) DEFAULT NULL,
      `pw` varchar(128) DEFAULT NULL,
      `email` varchar(64) DEFAULT NULL,
      `name` varchar(32) DEFAULT NULL
      ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;";

        mysqli_query($db, $sql);

        $sql = "CREATE TABLE `PwM`.`user` ( `id` INT NOT NULL AUTO_INCREMENT , `unsername` VARCHAR(64) NOT NULL , `pw` VARCHAR(128) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";

        mysqli_query($db, $sql);
    }
}