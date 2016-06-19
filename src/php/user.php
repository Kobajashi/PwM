<?php
/**
 * Created by IntelliJ IDEA.
 * User: MrFibunacci
 * Date: 19.06.2016
 * Time: 20:16
 */
    require_once("../php/server.php");

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

        public function getUser($name){
            $db = server::getInstance()->connect();

            $sql = "SELECT * FROM user WHERE
                    unsername='$name'
                LIMIT 1";

            $res = mysqli_query($db, $sql);

            return mysqli_fetch_array($res);
        }

        private function isUserExistent($name){

        }
    }