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
    private $database_user = "root";
    private $database_pass = "";

    public function getAESKey(){
        return self::$z;
    }

    public function getSalt()
    {
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

    public function getDataFrom($userId, $recordId = null){
        $db = self::connect();
        
        $sql = 'SELECT SQL_CALC_FOUND_ROWS pws.* FROM pws WHERE userId = ' . $userId . (($recordId != NULL) ? ' && id = ' . $recordId : '');
        $result = mysqli_query($db, $sql);

        /*$sqlCalcRow = 'SELECT FOUND_ROWS() AS rows;';
        $resultCalRow = mysqli_query($db, $sqlCalcRow);
        var_dump(mysqli_fetch_assoc($resultCalRow)); exit;*/

        $content = [];
        while($row = mysqli_fetch_assoc($result))
        {
            $content[] = $row;
        }

        return $content;
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
                    $sql .= "'".mysqli_real_escape_string($db, $value)."', ";
                } else {
                    $sql .= "'".mysqli_real_escape_string($db, $aes->encrypt($value))."', ";
                }
            } else {
                $sql .= "'".null."' ";
            }
        }
        $sql .= ")";

        $db->query($sql);
    }
}