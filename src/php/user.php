<?php
/**
 * Created by IntelliJ IDEA.
 * User: MrFibunacci
 * Date: 19.06.2016
 * Time: 20:16
 */
    require_once("server.php");
    require_once("AES/AESclass.php");

    class user {


        private static $instance = null;

        public static function getInstance(){
            if(!self::$instance){
                self::$instance = new self();
            }
            return self::$instance;
        }

        public function setUser($name, $password){

        }

        public function getUser($name, $pw){
            $db = server::getInstance()->connect();

            $sql = "SELECT * FROM user WHERE
                    unsername='$name' AND
                    pw='$pw'
                LIMIT 1";

            $res = mysqli_query($db, $sql);

            return mysqli_fetch_array($res);
        }

        public function createUser($name, $pw){
            $aes = new AES(server::getInstance()->getAESKey());

            $db = server::getInstance()->connect();

            $sql = "INSERT INTO `user` (`unsername`, `pw`) VALUES ('" .$name. "', '" .$aes->encrypt($pw). "')";

            $db->query($sql);

            $sql = "SELECT `id` FROM `user` WHERE `unsername`='".$name."'";

            $ID = mysqli_query($db, $sql);

            $ID = mysqli_fetch_array($ID);

            $sql = "CREATE TABLE IF NOT EXISTS `cont".$ID[0]."` (
                      `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                      `nameOfPlattform` varchar(64) NOT NULL,
                      `username` varchar(64) DEFAULT NULL,
                      `pw` varchar(128) DEFAULT NULL,
                      `email` varchar(64) DEFAULT NULL,
                      `name` varchar(32) DEFAULT NULL
                      ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;";
            mysqli_query($db, $sql);
        }

        private function isUserExistent($name){}
    }