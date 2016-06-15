<?php
/**
 * Created by IntelliJ IDEA.
 * User: MrFibunacci
 * Date: 15.06.2016
 * Time: 18:23
 */

class createDBTables {
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