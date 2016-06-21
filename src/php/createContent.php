<?php
/**
 * Created by IntelliJ IDEA.
 * User: MrFibunacci
 * Date: 15.06.2016
 * Time: 21:30
 */

    require_once("server.php");
    include_once("AES/AESclass.php");

class createContent{
    private static $z = "5j@mKRRVHT6w6MKZqMk?49v6X^jNXjE7";

    public function replaceMarkers($markers, $origContent){
        $content = $origContent;

        foreach ($markers as $key => $value) {
            $content = str_replace('###'.$key.'###', $value, $content);
        }

        return $content;
    }

    public function generateContent(){
        $server = new server();

        session_start();
        $dbContent = $server->getDataFrom("cont".$_SESSION['userID']);

        $content = "";

        $aes = new AES(self::$z);

        foreach($dbContent as $key1 => $value1){

            $content .= "<div><ul>";

            foreach($dbContent[$key1] as $key2 => $value2){
                switch($key2){
                    case "nameOfPlattform":{
                        if($key2 === "nameOfPlattform") {
                            $content .= "<li><h2>" . $value2 . " <a href='#' style='font-size: 15px;'>edit</a></h2></li>";
                        }
                    }break;

                    case "username":{
                        $content .= "<li><b>Username: </b>".$value2."</li>";
                    }break;

                    case "pw":{
                        $content .= "<li><b>Password: </b>".$aes->decrypt($value2)." </li>";
                    }break;

                    case "email":{
                        if($value2){
                            $content .= "<li><b>E-Mail: </b>".$value2."</li>";
                        }
                    }break;

                    case "name":{
                        if($value2){
                            $content .= "<li><b>Name/Names: </b>".$value2."</li>";
                        }
                    }break;
                }
            }

            $content .= "</div></ul>";
        }

        return $content;
    }
} 