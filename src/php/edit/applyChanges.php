<?php
/**
 * Created by IntelliJ IDEA.
 * User: MrFibunacci
 * Date: 22.06.2016
 * Time: 20:34
 */
    require_once("../server.php");
    require_once("../AES/AESclass.php");

    $server = new server;
    $aes    = new AES($server->getAESKey());

    session_start();
    $contentOld = $server->getDataFrom("cont".$_SESSION['userID']);

    $contentOld = $contentOld[$_SESSION["editId"]];
    $contentOld['pw'] = $aes->decrypt($contentOld['pw']);

    foreach($_POST as $key => $value){
        if($value != $contentOld[$key]){
            $contentNew[$key] = $value;
        }
    }

    $sql = "UPDATE `cont".$_SESSION['userID']."` SET ";

    foreach($contentNew as $key => $value){
        end($contentNew);
        if($key === key($contentNew)){
            if($key == "pw") {
                $sql .= "`".$key."`='".$aes->encrypt($value)."' ";
            } else {
                $sql .= "`".$key."`='".$value."' ";
            }
        } else {
            if($key == "pw") {
                $sql .= "`".$key."`='".$aes->encrypt($value)."', ";
            } else {
                $sql .= "`".$key."`='".$value."', ";
            }
        }
    }

    $sql .= " WHERE `id`=".++$_SESSION['editId'];

    $db = $server->connect();
    $db->query($sql);
    //mysqli_query($db, $sql);

    var_dump($_POST, $contentOld, $sql, $contentNew, $_SESSION['editId']);

    header("Location: http://localhost/PwM/src/php/");