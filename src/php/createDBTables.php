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

        //TODO: if you add tables to DB add them here too

        $sql = "CREATE TABLE IF NOT EXISTS `PwM`.`cont` (
                `id` INT NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (`id`),
                `nameOfPlattform` VARCHAR(64) NOT NULL ,
                `username` VARCHAR(64) NULL ,
                `pw` VARCHAR(128) NULL ,
                `email` VARCHAR(64) NULL ,
                `name` VARCHAR(32) NULL
            ) ENGINE = InnoDB;";

        mysqli_query($db, $sql);
    }
}