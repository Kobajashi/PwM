<?php
/**
 * Created by IntelliJ IDEA.
 * User: MrFibunacci
 * Date: 15.06.2016
 * Time: 18:29
 */
    include_once("AES/AESclass.php");

class server{
    private static $z = "5j@mKRRVHT6w6MKZqMk?49v6X^jNXjE7";

    private $database_host = "localhost";
    private $database_name = "PwM";
    private $database_user = "admin";
    private $database_pass = "Kuchen123";

    public function getAESKey(){
        return self::$z;
    }

    public function connect(){
        $db = mysqli_connect($this->database_host, $this->database_user, $this->database_pass);

        if($db === FALSE){
            die("<p>Keine verbindung mit Datanbank</p><p>".  mysqli_connect_error() ."</p>");
        }

        $database = mysqli_select_db($db, $this->database_name);

        if(!$database){
            echo "Kann die Datenbank nicht benutzen : " . mysqli_connect_error();
            mysqli_close($db);
            exit;
        }

        return $db;
    }

    public function getDataFrom($DB){
        $db = self::connect();

        $sql = "SELECT * FROM `".$DB."`";
        $numRows = mysqli_query($db, $sql);

        $i = 1;
        while(mysqli_num_rows($numRows) >= $i) {
            $sql = "SELECT * FROM `".$DB."` WHERE `id`=".$i;
            $res = mysqli_query($db, $sql);
            $res = mysqli_fetch_array($res, MYSQLI_BOTH);

            $dbContent[] = $res;

            ++$i;
        }

        return $dbContent;
    }

    public function setDataFrom($table, $data){
        $aes = new AES(self::$z);
        $db = self::connect();

        $sql = "INSERT INTO `".$table."` (";
        foreach($data as $key => $value){
            if($key != "name"){
                $sql .= "`".$key."`, ";
            } else {
                $sql .= "`".$key."` ";
            }
        }

        $sql .= ") VALUES (";
        foreach($data as $key => $value){
            if($key != "name"){
                if($key != "pw"){
                    $sql .= "'".$value."', ";
                } else {
                    $sql .= "'".$aes->encrypt($value)."', ";
                }
            } else {
                $sql .= "'".null."' ";
            }
        }
        $sql .= ")";

        $db->query($sql);
    }
}