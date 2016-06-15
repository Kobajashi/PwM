<?php
/**
 * Created by IntelliJ IDEA.
 * User: MrFibunacci
 * Date: 15.06.2016
 * Time: 18:29
 */

class server{
    private static $instance = null;

    private $database_host = "localhost";
    private $database_name = "PwM";
    private $database_user = "admin";
    private $database_pass = "Kuchen123";

    public static function getInstance(){
        if(!self::$instance){
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function connect(){
        $db = mysqli_connect($this->$database_host, $this->$database_user, $this->$database_pass);
        if($db === FALSE){
            die("<p>Keine verbindung mit Datanbank</p><p>".  mysqli_connect_error() ."</p>");
        }

        $database = mysqli_select_db($db, $this->$database_name);

        if(!$database){
            echo "Kann die Datenbank nicht benutzen : " . mysqli_connect_error();
            mysqli_close($db);
            exit;
        }

        return $db;
    }
} 